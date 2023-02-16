<?php

require_once 'Router.php';
require_once 'BaseController.php';
require_once 'Database.php';
require_once 'models/User.php';

// Singleton Pattern

class Application {
    public static Application $APP; // keep an instance of itself, since there will be only one instance of Application at start
    private static string $applicationName;
    private ?BaseController $controller = null;
    private Router $router;
    private Database $db;
    private ?User $user = null;
    private static bool $instanceFlag = false;

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    private function __construct($applicationName, $dbConfig)
    {
        self::$APP = $this;
        self::$applicationName = $applicationName;
        $this->router = new Router();
        $this->db = new Database($dbConfig);
        if($this->isAuthenticated()) {
            $user_id = $_SESSION['user_id'];
            $this->user = User::findOne(['user_id' => $user_id]);
        }
    }



    /**
     * @return Database
     */
    public function getDb(): Database
    {
        return $this->db;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return BaseController|null
     */
    public function getController(): ?BaseController
    {
        return $this->controller;
    }

    /**
     * @param BaseController|null $controller
     */
    public function setController(?BaseController $controller): void
    {
        $this->controller = $controller;
    }

    public function start(): void
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            Response::setStatusCode((int)$e->getCode());
            echo $this->router->renderView('error', ['exception' => $e]);
        }
    }

    public function setUserData(User $user): void
    {
        if(!isset($_SESSION)) {
            session_start();
        }
        session_regenerate_id();
        $_SESSION['auth'] = true;
        $primary_key = $user->primaryKey();
        $_SESSION[$primary_key] = $user->{$primary_key};
        $this->user = $user; // save the user so that you can use it globally
    }

    public function clearUserData(): void {
        if(!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $this->user = null;
    }

    public function isAuthenticated(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
    }

    public static function name(): string
    {
        return self::$applicationName;
    }

    public static function init($applicationName, $dbConfig): Application
    {
        if(!self::$instanceFlag) {
            self::$instanceFlag = true;
            return new Application($applicationName, $dbConfig);
        } else {
            return self::$APP;
        }
    }

    public static function getInstance(): Application
    {
        return self::$APP;
    }

}