<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class UserLevelController extends BaseController
{
    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels/edit']);
    }
}