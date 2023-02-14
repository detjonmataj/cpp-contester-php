<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class UserController extends BaseController
{
    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/users/edit']);
    }

    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/users']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/users/create']);
    }
}