<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class UserLevelController extends BaseController
{
    public function list(): string|array|false
    {
        if (!Application::$APP->isAuthenticated()) {
            Response::redirect('/login');
            exit;
        }

        if (!Application::$APP->getUser()->isAdmin()) {
            Response::redirect('/');
            exit;
        }

        $this->layout = 'admin';

        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels']);
    }

    public function create(): string|array|false
    {
        if (!Application::$APP->isAuthenticated()) {
            Response::redirect('/login');
            exit;
        }

        if (!Application::$APP->getUser()->isAdmin()) {
            Response::redirect('/');
            exit;
        }

        $this->layout = 'admin';

        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels/create']);
    }

    public function edit(): string|array|false
    {
        if (!Application::$APP->isAuthenticated()) {
            Response::redirect('/login');
            exit;
        }

        if (!Application::$APP->getUser()->isAdmin()) {
            Response::redirect('/');
            exit;
        }

        $this->layout = 'admin';


        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels/edit']);
    }
}