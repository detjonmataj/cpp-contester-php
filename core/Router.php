<?php

require_once 'Request.php';
require_once 'Response.php';
require_once 'exceptions/NotFoundException.php';

class Router
{
    private array $routes = [];

    public function get($path, $callback): void
    {
        $this->routes[Request::GET][$path] = $callback; // register the given path as a get request
    }

    public function post($path, $callback): void
    {
        $this->routes[Request::POST][$path] = $callback; // register the given path as a post request
    }

    public function put($path, $callback): void
    {
        $this->routes[Request::PUT][$path] = $callback; // register the given path as a put request
    }

    public function patch($path, $callback): void
    {
        $this->routes[Request::PATCH][$path] = $callback; // register the given path as a patch request
    }

    public function delete($path, $callback): void
    {
        $this->routes[Request::DELETE][$path] = $callback; // register the given path as a delete request
    }

    public function resolve() {
        $path = Request::path();
        $method = Request::method();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            Response::setStatusCode(404);
            return $this->renderView('error', ['exception' => new NotFoundException()]);
        }
        $controller = new $callback[0]();
        $action = $callback[1];
        Application::$APP->setController($controller);
        Application::$APP->getController()->setAction($action);
        $callback[0] = Application::$APP->getController();
        return call_user_func($callback);
    }
    public function renderView(string $view, array $params = []): array|false|string
    {
        // in the params array, we can add variables that we want to use in the view
        $layout = $this->getLayoutContent();
        $viewContent = $this->getView($view, $params);
        // layouts will contain a string in order to replace it with the actual content of that page Eg: {{main_content}}
        $content = str_replace('{{main_content}}', $viewContent, $layout);
        $viewName = explode('.', $view);
        $title = Application::name() . ' | ' . ucfirst($viewName[0]);
        return str_replace('{{title}}', $title, $content);
    }

    private function getLayoutContent(): false|string
    {
        $layout = 'main';
        if(Application::$APP->getController())
            $layout = Application::$APP->getController()->getLayout();
        ob_start(); // nothing gets outputted in the browser
        $basePath = "views/layouts/";
        $filename = (file_exists($basePath . $layout . '.php')) ? $layout . '.php' : 'main.php';
        require_once $basePath . $filename;
        $content = ob_get_clean();
        $navbar = $this->getComponentContent("navbar.$layout") ?: $this->getComponentContent("navbar.main");
        $footer = $this->getComponentContent("footer.$layout") ?: $this->getComponentContent("footer.main");
        $content = str_replace('{{navbar}}', $navbar, $content);
        return str_replace('{{footer}}', $footer, $content);
    }

    public function getComponentContent(string $component, array $params = []): false|string
    {
        ob_start(); // nothing gets outputted in the browser
        @include_once "views/components/$component.php";
        return ob_get_clean();
    }

    private function getView(string $view, array $params): false|string
    {
        foreach ($params as $key => $value) {
            $$key = $value; // in order to create variables with the given keys
        }
        ob_start(); // nothing gets outputted in the browser
        require_once  "views/$view.php"; // supposing that you will keep all the views in the view directory
        // perhaps you can solve it differently
        return ob_get_clean();
    }


}