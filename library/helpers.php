<?php declare(strict_types=1);

function handleErrors(): void
{
    error_reporting(E_ALL);

    if (isset($_ENV["DEV_ENVIRONMENT"]) && $_ENV["DEV_ENVIRONMENT"]) {
        ini_set('display_errors', 'On');
    } else {
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }
}

function unregisterGlobals(): void
{
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

function callHook(): void
{
    global $url;
    global $default;

    $queryString = array();

    if (!isset($url)) {
        $controller = $default['controller'];
        $action = $default['action'];
    } else {
        $url = routeURL($url);
        $urlArray = explode("/", $url);
        $controller = $urlArray[0];
        array_shift($urlArray);
        if (isset($urlArray[0])) {
            $action = $urlArray[0];
            array_shift($urlArray);
        } else {
            $action = 'index'; // Default Action
        }
        $queryString = $urlArray;
    }

    $controllerName = ucfirst($controller) . 'Controller';

    $dispatch = new $controllerName($controller, $action);

    if ((int)method_exists($controllerName, $action)) {
        call_user_func_array(array($dispatch, "beforeAction"), $queryString);
        call_user_func_array(array($dispatch, $action), $queryString);
        call_user_func_array(array($dispatch, "afterAction"), $queryString);
    } else {
        /* Error Generation Code Here */
    }
}

function routeURL($url)
{
    global $routing;

    foreach ($routing as $pattern => $result) {
        if (preg_match($pattern, $url)) {
            return preg_replace($pattern, $result, $url);
        }
    }

    return ($url);
}

spl_autoload_register(function ($className) {
    if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'util' . DS . strtolower($className) . '.php');
    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
        require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
    } else {
        /* Error Generation Code Here */
    }
});

handleErrors();
unregisterGlobals();
callHook();
