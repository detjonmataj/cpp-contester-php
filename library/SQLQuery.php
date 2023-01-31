<?php declare(strict_types=1);

#[AllowDynamicProperties]
class SQLQuery
{
    protected $_dbHandle;
    protected $_table;
    protected $_describe = array();

    function connect(): void
    {
        $dsn = "mysql:host={$_ENV["DATABASE_HOST"]};port={$_ENV["DATABASE_PORT"]};dbname={$_ENV['DATABASE_NAME']};charset={$_ENV['DATABASE_CHARSET']};";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->_dbHandle = new PDO($dsn, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'], $options);
    }

    function disconnect(): void
    {
        $this->_dbHandle = null;
    }

    function viewAll()
    {
        $query = 'SELECT * FROM `' . $this->_table . '`';
        $statement = $this->_dbHandle->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function view(int $id)
    {
        $query = 'SELECT * FROM `' . $this->_table . '` WHERE `id` = ?';
        $statement = $this->_dbHandle->prepare($query);
        if ($statement->execute([$id])) {
            return $statement->fetch(PDO::FETCH_ASSOC);
        } else {
            throw new RuntimeException('No record found with id ' . $id . ' in table ' . $this->_table . '.');
        }
    }

    function delete(int $id): void
    {
        $query = 'DELETE FROM `' . $this->_table . '` WHERE `id` = ?';
        $statement = $this->_dbHandle->prepare($query);
        if ($statement->execute([$id])) {
            echo "Record deleted successfully.";
        } else {
            throw new RuntimeException('No record found with id ' . $id . ' in table ' . $this->_table . '.');
        }
    }

    function save($id = NULL): void
    {
        $fields = '';
        $this->_dbHandle->beginTransaction();
        try {
            if (isset($id)) {
                $values = [];

                foreach ($this->_describe as $field) {
                    if ($this->$field) {
                        $fields .= '`' . $field . '` = ?, ';
                        $values[] = $this->$field;
                    }
                }

                $fields = substr($fields, 0, -1);
                $values[] = $id;

                $query = 'UPDATE ' . $this->_table . ' SET ' . $fields . ' WHERE `id`= ?';
                $statement = $this->_dbHandle->prepare($query);
                $statement->execute($values);
                $this->_dbHandle->commit();
            } else {
                $question_marks = '';
                $values = [];

                foreach ($this->_describe as $field) {
                    if ($this->$field) {
                        $fields .= '`' . $field . '`,';
                        $question_marks .= '?, ';
                        $values[] = $this->$field;
                    }
                }

                $fields = substr($fields, 0, -1);
                $question_marks = substr($question_marks, 0, -1);

                $query = 'INSERT INTO ' . $this->_table . ' (' . $fields . ') VALUES (' . $question_marks . ')';
                $statement = $this->_dbHandle->prepare($query);
                $statement->execute($values);
                $this->_dbHandle->commit();

                $this->_clear();
            }
        } catch (PDOException $e) {
            $this->_dbHandle->rollBack();
            throw new RuntimeException($e->getMessage());
        }
    }

    protected function _describe(): void
    {
        if (!$this->_describe) {
            $query = 'DESCRIBE ' . $this->_table;
            $statement = $this->_dbHandle->query($query);
            $result = $statement->fetchAll();

            foreach ($result as $column) {
                if ($column['Field'] != 'id') {
                    $this->_describe[] = $column['Field'];
                }
            }
        }

        $this->_clear();
    }

    protected function _clear(): void
    {
        foreach ($this->_describe as $field) {
            $this->$field = null;
        }
    }
}
