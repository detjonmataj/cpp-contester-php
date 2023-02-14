<?php

class ListItem
{
    private BaseModel $model;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }

    public function __toString(): string
    {
        $url = $this->model->attributes()['url'];
        $label = $this->model->labels()['label'];
        $icon = $this->model->attributes()['icon'];
        $classes = $this->model->attributes()['classes'];

        $component = "<li class='$classes'>";

        if ($url) {
            $component .= "<a href='$url'>";
        }

        if ($icon) {
            $component .= "<i class='$icon'></i>";
        }

        $component .= $label;

        if ($url) {
            $component .= "</a>";
        }

        $component .= "</li>";

        return $component;

    }

}