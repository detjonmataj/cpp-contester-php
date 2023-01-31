<?php declare(strict_types=1);

#[AllowDynamicProperties]
class Controller
{
    protected $_controller;
    protected $_action;
    protected $_template;

    public $doNotRenderHeader;
    public $render;

    function __construct($controller, $action)
    {
        $this->_controller = ucfirst($controller);
        $this->_action = $action;

        $this->doNotRenderHeader = 0;
        $this->render = 1;

        $model = ucfirst(Inflection::singularize($controller));
        $this->$model = new $model;

        $this->_template = new Template($controller, $action);
    }

    function set($name, $value): void
    {
        $this->_template->set($name, $value);
    }

    function __destruct()
    {
        if ($this->render) {
            $this->_template->render($this->doNotRenderHeader);
        }
    }
}
