<?php
require_once 'core/BaseController.php';

class QuestionController extends BaseController {

    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'questions']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/user_levels/edit']);
    }

    // TODO: Eventually, move these in separate controllers when you implement their APIs to keep things clean
    public function categories(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'question_categories']);
    }

    public function levels(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'question_levels']);
    }
}