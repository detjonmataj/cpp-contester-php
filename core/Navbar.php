<?php

require_once 'core/NavbarItem.php';
class Navbar
{
    private NavbarItem $header;
    private array $items;

    /**
     * @param NavbarItem $header
     * @param array $items
     */
    public function __construct(NavbarItem $header, array $items)
    {
        $this->header = $header;
        $this->items = $items;
    }

    public function __toString(): string
    {
        ob_start(); // nothing gets outputted in the browser
        require_once "views/layouts/navbar.php";
        $navbar = ob_get_clean();// return the content of the buffer
        $navbar = str_replace('{{navbar_header}}', $this->header, $navbar);
        // implode() converts an array to a string
        $items = implode('', $this->items);
        return str_replace('{{navbar_items}}', $items, $navbar);
    }

}