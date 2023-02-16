<?php declare(strict_types=1);

require_once 'core/BaseController.php';

class SubmissionController extends BaseController
{
    public function list(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/submissions']);
    }

    public function create(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/submissions/create']);
    }

    public function edit(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' => '/submissions/edit']);
    }
}