<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class UserController extends BaseController
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

        return Application::$APP->getRouter()->renderView('listUsers');
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

        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/users/create']);
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

        $userId = $_REQUEST['user_id'] ?? null;

        if (!isset($userId)) {
            Response::redirect('/users');
            exit;
        }

        $id = $_GET['user_id'];
        $user = User::findOne(['user_id' => $id]);
        $userLevels = array_map(fn($x) => [$x->user_level_id => $x->name], UserLevel::findAll([], []));

        return Application::$APP->getRouter()->renderView('editUsers', ['model' => $user, 'userLevels' => $userLevels]);
    }




}