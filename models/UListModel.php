<?php

class UListModel extends LinkModel
{
    private array $items;
    public function __construct($label, $url, $icon, $classes, $items)
    {
        parent::__construct($label, $url, $icon, $classes);
        $this->items = $items;
    }

    public function attributes(): array
    {
        return parent::attributes()[] = ['items' => $this->items ];
    }

    public function createRules(): array
    {
        return [];
    }

    public function updateRules(): array
    {
        return [];
    }
}