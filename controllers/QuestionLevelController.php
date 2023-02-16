<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class QuestionLevelController extends BaseController
{
    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'question_levels']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/question_levels/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/question_levels/edit']);
    }
}