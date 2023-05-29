<?php

require_once 'core/BaseController.php';
require_once 'exceptions/UnauthorizedException.php';

class DemoController extends BaseController
{
    protected string $layout = 'demo';
    /**
     * @throws UnauthorizedException
     */
    public function list(): array|false|string
    {
        // protected route, you should be authenticated
        if(!Application::$APP->isAuthenticated()) {
            throw new UnauthorizedException();
        }

        $demos = ["foo", "bar", "baz"];
        return Application::$APP->getRouter()->renderView('demos', ['demos' => $demos]);
    }
}