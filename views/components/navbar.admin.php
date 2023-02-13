<?php
require_once 'core/Navbar.php';

$navbar = new Navbar(
    (new NavbarItem(new LinkModel(Application::$APP->name(), '#', '', '')))->header(),
    [
        (new NavbarItem(new LinkModel('Home', '/', '', '')))->link(),
        (new NavbarItem(new LinkModel('Logout', '/logout', '', '')))->link(),
    ]
);

echo $navbar;