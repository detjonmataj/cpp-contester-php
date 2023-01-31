<?php declare(strict_types=1);

#[AllowDynamicProperties]
class Template
{
    protected array $variables = array();
    protected $_controller;
    protected $_action;

    function __construct($controller, $action)
    {
        $this->_controller = $controller;
        $this->_action = $action;
    }

    function set($name, $value): void
    {
        $this->variables[$name] = $value;
    }

    function render($doNotRenderHeader = 0): void
    {
        extract($this->variables);

        if ($doNotRenderHeader == 0) {

            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php')) {
                include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'header.php');
            } else {
                include(ROOT . DS . 'application' . DS . 'views' . DS . 'header.php');
            }
        }

        if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php')) {
            include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . $this->_action . '.php');
        }

        if ($doNotRenderHeader == 0) {
            if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php')) {
                include(ROOT . DS . 'application' . DS . 'views' . DS . $this->_controller . DS . 'footer.php');
            } else {
                include(ROOT . DS . 'application' . DS . 'views' . DS . 'footer.php');
            }
        }
    }
}
