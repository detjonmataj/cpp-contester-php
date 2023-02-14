<?php declare(strict_types=1);


class DatabaseBootstrap
{
    public static function bootstrap(): void
    {
        $dsn = "mysql:host={$_ENV["DATABASE_HOST"]};port={$_ENV["DATABASE_PORT"]}charset={$_ENV['DATABASE_CHARSET']};";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($dsn, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'], $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

//        $pdo->beginTransaction();

        try {
            $sql = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'dev_db.sql');
            $sql = str_replace("{{admin_password}}", password_hash("admin", PASSWORD_DEFAULT), $sql);

            $pdo->exec($sql);
//            $pdo->commit();
        } catch (PDOException $e) {
//            $pdo->rollBack();
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        } finally {
            $pdo = null;
        }
    }
}