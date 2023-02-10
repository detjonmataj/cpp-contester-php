<?php declare(strict_types=1);

const DS = DIRECTORY_SEPARATOR;
define('ROOT', dirname(__FILE__, 2));

$url = $_GET['url'];

require_once(ROOT . DS . 'library' . DS . 'routing.php');
require_once(ROOT . DS . 'library' . DS . 'bootstrap.php');
require_once(ROOT . DS . 'library' . DS . 'helpers.php');