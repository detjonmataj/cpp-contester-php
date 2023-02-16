<?php
require_once 'core/BaseController.php';

class SettingController extends BaseController {

    public function settings(): string|array|false
    {
        if (!Application::$APP->isAuthenticated()) {
            Response::redirect('/login');
            exit;
        }

        if (Application::$APP->getUser()->isAdmin()) {
            $this->layout = 'admin';
        } else if (Application::$APP->getUser()->isTeacher()) {
            $this->layout = 'teacher';
        } else {
            $this->layout = 'student';
        }

        return Application::$APP->getRouter()->renderView('init', ['endpoint' =>'settings']);
    }

}