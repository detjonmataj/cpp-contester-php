<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class QuestionController extends BaseController
{
    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'questions']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/questions/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/questions/edit']);
    }

    // TODO: Eventually, move these in separate controllers when you implement their APIs to keep things clean
    public function categories(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'question_categories']);
    }
}