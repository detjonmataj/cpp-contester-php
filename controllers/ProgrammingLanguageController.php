<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class ProgrammingLanguageController extends BaseController
{
    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/programming_languages']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/programming_languages/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/programming_languages/edit']);
    }
}