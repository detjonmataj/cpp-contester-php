<?php

require_once 'core/BaseModel.php';

abstract class DbModel extends BaseModel
{
    /**
     * @return string - table name in the database for the model
     */
    abstract public function tableName(): string;

    /**
     * @return string - primary key in the database for each model
     * Usually is id but consider a Book model with ISBN as primary key
     */

    abstract public function primaryKey(): string;

    /**
     * @return true - whether saving the object was successful
     * Generic query to save DB models, you don't have to write a separate query for each model
     * Just make sure to define attributes correctly for each model
     */
    public function save(): string|false
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($x) => ":$x", $attributes);
        $sql = "insert into $tableName (" . implode(',', $attributes)
            . ") values (" . implode(",", $params) . ");";
        $stmt = self::prepare($sql);
        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }

        if ($stmt->execute()) {
            return self::lastInsertId();
        }
        return false;
    }

    public function update(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $sql = "update $tableName set " . implode(',', array_map(fn($x) => "$x = :$x", $attributes))
            . " where " . $this->primaryKey() . " = " . $this->{$this->primaryKey()};
        $stmt = self::prepare($sql);
        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }
        return $stmt->execute();
    }

    public function delete(): bool
    {
        $tableName = $this->tableName();
        $sql = "delete from $tableName where " . $this->primaryKey() . " = " . $this->{$this->primaryKey()};
        $stmt = self::prepare($sql);
        return $stmt->execute();
    }

    public static function prepare($sql): false|PDOStatement
    {
        return Application::$APP->getDb()->prepare($sql);
    }

    public static function lastInsertId(): false|string
    {
        return Application::$APP->getDb()->lastInsertId();
    }

    /**
     * @param array $where - an associative array containing query params you want to search
     * @param $tableName - table name
     * @return DbModel|null Generic query to search for a single row
     * Generic query to search for a single row
     * If you want to search for User with first name Foo and last name Bar pass $where = ['firstName'=>'Foo', 'lastName' => 'Bar']
     */
    public static function findOne(array $where, string $tableName): ?self
    {
        return self::findAll($where, ['limit', 1], $tableName)[0] ?? null;
    }

    /**
     * @param array $where - an associative array containing query params you want to search
     * @param $tableName - table name
     * @return DbModel|null Generic query to search for a single row
     * Generic query to search for a single row
     * If you want to search for User with first name Foo and last name Bar pass $where = ['firstName'=>'Foo', 'lastName' => 'Bar']
     */
    public static function findAll(array $where, array $extraClauses, string $tableName): ?array
    {
        $query = "select * from $tableName";

        if (!empty($where)) {
            $attributes = array_keys($where);
            $str = implode("and ", array_map(fn($x) => "$x = :$x", $attributes));
            $query .= " where $str ";
        }

        if (!empty($extraClauses)) {
            $query .= ' ' . implode(' ', $extraClauses);
        }

        $query .= ';';

        $stmt = self::prepare($query);
        foreach ($where as $k => $v) {
            $stmt->bindValue(":$k", $v);
        }

//        return [$stmt->queryString];

        $stmt->execute();
        $obj = @$stmt->fetchAll(PDO::FETCH_CLASS, static::class);
        return $obj ?: null;
    }
}