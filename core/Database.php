<?php

class Database
{
    private PDO $pdo;
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($sql): false|PDOStatement
    {
        return Application::$APP->getDb()->pdo->prepare($sql);
    }

    public function lastInsertId(): false|string
    {
        return Application::$APP->getDb()->pdo->lastInsertId();
    }
}