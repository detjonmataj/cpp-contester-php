<?php
require_once 'core/Navbar.php';
require_once 'core/ListItem.php';

$navbar = new Navbar(
    (new NavbarItem(new LinkModel(Application::$APP->name(), '#', '', '')))->header(),
    [
        (new NavbarItem(new LinkModel('Home', '/', '', '')))->link(),
        (new NavbarItem(new UListModel('DropDown', '#', '', '', [
            (new ListItem(new LinkModel('Item1', '#', '', 'dropdown-item'))),
            (new ListItem(new LinkModel('Item2', '#', '', 'dropdown-item'))),
            (new ListItem(new LinkModel('Item3', '#', '', 'dropdown-item'))),
        ])))->dropdown(),
    ]
);

echo $navbar;