<?php
require_once 'core/BaseController.php';

class SettingController extends BaseController {

    public function settings(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' =>'settings']);
    }

}