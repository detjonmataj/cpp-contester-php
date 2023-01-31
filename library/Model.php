<?php declare(strict_types=1);

#[AllowDynamicProperties]
class Model extends SQLQuery
{
    protected string $_model;

    function __construct()
    {
        $this->connect();
        $this->_model = get_class($this);
        $this->_table = strtolower(Inflection::pluralize($this->_model));
        if (!isset($this->abstract)) {
            $this->_describe();
        }
    }

    function __destruct()
    {
        $this->disconnect();
    }
}
