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

    public static function json(array $data): string
    {
        header('Content-Type: application/json');
        return json_encode($data);
    }

}