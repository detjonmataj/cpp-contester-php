<?php

require_once 'models/LinkModel.php';
require_once 'models/UListModel.php';

class NavbarItem
{
    private BaseModel $model;
    private string $type;
    private const TYPE_HEADER = 'header';
    private const TYPE_LINK = 'link';
    private const TYPE_DROPDOWN = 'dropdown';

    /**
     * @param BaseModel $model
     */

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
        $this->type = self::TYPE_LINK;
    }

    public function __toString(): string
    {
        return match ($this->type) {
            self::TYPE_HEADER => <<< EOF
                <a class="navbar-brand" href="{$this->model->attributes()['url']}">{$this->label()}</a>
            EOF,
            self::TYPE_LINK => <<< EOF
                <li class="nav-item">
                    <a class="nav-$this->type {$this->model->attributes()['classes']}" href="{$this->model->attributes()['url']}">{$this->label()}</a>
                </li>
            EOF,
            self::TYPE_DROPDOWN => <<< EOF
                <li class="nav-item dropdown" id="{$this->label()}">
                    <a class="nav-$this->type dropdown-toggle" href="#" role="button">
                        {$this->label()}
                   </a>
                   <ul class="dropdown-menu">
                     {${!${''} = implode('', $this->model->attributes()['items'])}}
                   </ul>
               </li>
            EOF,
        };
    }

    public function label(): string
    {
        return $this->model->getLabel('label');
    }

    public function header(): static
    {
        $this->type = self::TYPE_HEADER;
        return $this;
    }

    public function link(): static
    {
        $this->type = self::TYPE_LINK;
        return $this;
    }

    public function dropdown(): static
    {
        $this->type = self::TYPE_DROPDOWN;
        return $this;
    }


}