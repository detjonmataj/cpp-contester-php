<?php

class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const PATCH = 'PATCH';
    public const DELETE = 'DELETE';

    public static function path() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function isGet(): bool
    {
        return self::method() === self::GET;
    }

    public static function isPost(): bool {
        return self::method() == self::POST;
    }

    public static function isPut(): bool
    {
        return self::method() === self::PUT;
    }

    public static function isPatch(): bool
    {
        return self::method() === self::PATCH;
    }

    public static function isDelete(): bool
    {
        return self::method() === self::DELETE;
    }

    /**
     * @return array|string - data being submitted
     * You may use $_GET and $_POST directly
     */
    public static function requestBody(): array|null
    {
        return match (self::method()) {
            self::GET => $_GET ?: null,
            self::POST => $_POST ?: null,
            self::PUT, self::PATCH, self::DELETE => json_decode(file_get_contents('php://input'), true),
            default => null
        };
    }
}