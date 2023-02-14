<?php
require_once 'core/BaseController.php';

class AccountController extends BaseController {

    public function account(): string|array|false
    {
        return Application::$APP->getRouter()->renderView('init', ['endpoint' =>'account']);
    }

}