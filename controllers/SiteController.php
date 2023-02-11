<?php

require_once 'core/BaseController.php';

class SiteController extends BaseController
{
    public function home(): false|array|string
    {
        $data = ['name' => Application::$APP->name()];
        return Application::$APP->getRouter()->renderView('home', $data);
    }

    public function about(): false|array|string
    {
        $data = ['company' => Application::$APP->name()];
        return Application::$APP->getRouter()->renderView('about', $data);
    }
}