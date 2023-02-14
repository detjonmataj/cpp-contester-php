<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class APIUserLevelController extends BaseController
{
    public function get(): string|array|false
    {
        return 'get - user_levels';
    }

    public function getAll(): string|array|false
    {
        return 'getAll - user_levels';
    }

    public function create(): string|array|false
    {
        return 'create - user_levels';
    }

    public function update(): string|array|false
    {
        return 'update - user_levels';
    }

    public function delete(): string|array|false
    {
        return 'delete - user_levels';
    }
}