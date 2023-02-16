<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class QuestionCategoryController extends BaseController
{
    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'question_categories']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/question_categories/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/question_categories/edit']);
    }
}