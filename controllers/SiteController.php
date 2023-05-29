<?php

require_once 'core/BaseController.php';

class SiteController extends BaseController
{
    public function home(): false|array|string
    {
        $data = ['name' => Application::$APP->name()];
        if(Application::$APP->isAuthenticated()) {
            if (Application::$APP->getUser()->isAdmin()) {
                $this->layout = 'admin';
            } else if (Application::$APP->getUser()->isTeacher()) {
                $this->layout = 'teacher';
            } else {
                $this->layout = 'student';
            }
            return Application::$APP->getRouter()->renderView('home.auth', $data);
        }
        return Application::$APP->getRouter()->renderView('home', $data);
    }

    public function about(): false|array|string
    {
        $data = ['company' => Application::$APP->name()];
        return Application::$APP->getRouter()->renderView('about', $data);
    }
}