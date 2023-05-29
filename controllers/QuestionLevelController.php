<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class QuestionLevelController extends BaseController
{
    public function list(): string|array|false
    {

        if (Application::$APP->isAuthenticated()) {
            if (Application::$APP->getUser()->isAdmin()) {
                $this->layout = 'admin';
            } else if (Application::$APP->getUser()->isTeacher()) {
                $this->layout = 'teacher';
            } else {
                $this->layout = 'student';
            }
        }

        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'question_levels']);
    }

    public function create(): string|array|false
    {

        if(!Application::$APP->isAuthenticated())
        {
            Response::redirect('/login');
            exit;
        }

        if (Application::$APP->getUser()->isAdmin()) {
            $this->layout = 'admin';
        } else if (Application::$APP->getUser()->isTeacher()) {
            $this->layout = 'teacher';
        } else {
            Response::redirect('/');
            exit;
        }

        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/question_levels/create']);
    }

    public function edit(): string|array|false
    {


        if(!Application::$APP->isAuthenticated())
        {
            Response::redirect('/login');
            exit;
        }

        if (Application::$APP->getUser()->isAdmin()) {
            $this->layout = 'admin';
        } else if (Application::$APP->getUser()->isTeacher()) {
            $this->layout = 'teacher';
        } else {
            Response::redirect('/');
            exit;
        }


        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/question_levels/edit']);
    }
}