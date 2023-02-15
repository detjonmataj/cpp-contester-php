<?php

class Response
{
    public static function setStatusCode(int $code): void
    {
        http_response_code($code);
    }

    public static function redirect(string $url): void
    {
        header('Location:' . $url);
    }

    public static function json(array $data): string|false
    {
        header('Content-Type: application/json');
        $encoded = json_encode($data);
        if (!$encoded){
            self::setStatusCode(500);
            return json_encode(['message' => 'Internal Server Error']);
        }
        return $encoded;
    }

}