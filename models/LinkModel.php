<?php

require_once 'core/BaseModel.php';
require_once 'models/User.php';

class LinkModel extends BaseModel
{
    private string $label;
    private string $url;
    private string $icon;
    private string $classes;

    public function __construct($label, $url, $icon, $classes)
    {
        $this->label = $label;
        $this->url = $url;
        $this->icon = $icon;
        $this->classes = $classes;
    }

    public function rules(): array
    {
        return [];
    }

    public function labels(): array
    {
        return [
            'label' => $this->label
        ];
    }

    public function attributes(): array
    {
        return [
            'url' => $this->url,
            'icon' => $this->icon,
            'classes' => $this->classes
        ];
    }
}