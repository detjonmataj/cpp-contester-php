<?php
require_once 'core/BaseController.php';

class AccountController extends BaseController {

    public function account(): string|array|false
    {
        if(!Application::$APP->isAuthenticated()) {
            Response::redirect('/login');
            exit;
        }

        if (Application::$APP->getUser()->isAdmin())
            $this->layout = 'admin';
        else if (Application::$APP->getUser()->isTeacher())
            $this->layout = 'teacher';
        else
            $this->layout = 'student';

        $user = Application::$APP->getUser();
        $userLevels = array_map(fn($x) => [$x->user_level_id => $x->name], UserLevel::findAll([], []));

        return Application::$APP->getRouter()->renderView('account', ['model' => $user, 'userLevels' => $userLevels]);
    }

}