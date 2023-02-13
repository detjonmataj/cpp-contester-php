<?php
require_once 'core/Navbar.php';

$navbar = new Navbar(
    (new NavbarItem(new LinkModel(Application::$APP->name(), '#', '', '')))->header(),
    [
        (new NavbarItem(new LinkModel('Home', '/', '', '')))->link(),
        (new NavbarItem(new LinkModel('About', '/about', '', '')))->link(),
        (new NavbarItem(new LinkModel('Contact', '/contact', '', '')))->link(),
        (new NavbarItem(new LinkModel('Login', '/login', '', '')))->link(),
        (new NavbarItem(new LinkModel('Register', '/register', '', '')))->link(),
    ]
);

echo $navbar;