<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class APIUserController extends BaseController
{
    public function get(): string|array|false
    {
        return 'get - users';
    }

    public function getAll(): string|array|false
    {
        return 'getAll - users';
    }

    public function create(): string|array|false
    {
        return 'create - users';
    }

    public function update(): string|array|false
    {
        return 'update - users';
    }

    public function delete(): string|array|false
    {
        return 'delete - users';
    }
}