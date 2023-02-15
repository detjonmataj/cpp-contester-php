<?php
require_once 'core/Navbar.php';
require_once 'core/ListItem.php';

$navbar = new Navbar(
    (new NavbarItem(new LinkModel(Application::$APP->name(), '/', '', '')))->header(),
    [
        (new NavbarItem(new LinkModel('Home', '/', '', '')))->link(),
        (new NavbarItem(new UListModel('Questions', '#', '', '', [
            (new ListItem(new LinkModel('All Questions', 'questions', '', 'dropdown-item'))),
            (new ListItem(new LinkModel('Categories', 'question_categories', '', 'dropdown-item'))),
            (new ListItem(new LinkModel('Levels', 'question_levels', '', 'dropdown-item'))),
        ])))->dropdown(),
        (new NavbarItem(new UListModel('Users', '#', '', '', [
            (new ListItem(new LinkModel('All Users', 'users', '', 'dropdown-item'))),
            (new ListItem(new LinkModel('User Levels', 'user_levels', '', 'dropdown-item'))),
        ])))->dropdown(),
        (new NavbarItem(new LinkModel(Application::$APP->getUser()?->getDisplayName(), '/account', '', '')))->link(),
        (new NavbarItem(new LinkModel('⚙', '/settings', '', '')))->link(),
        (new NavbarItem(new LinkModel('Logout', '/logout', '', '')))->link(),
    ]
);

echo $navbar;