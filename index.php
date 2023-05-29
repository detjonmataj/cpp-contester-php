<?php declare(strict_types=1);

require_once 'core/Application.php';
require_once 'core/DatabaseBootstrap.php';
require_once 'core/utils/DotEnvParser.php';

use core\util\DotEnvParser;

DotEnvParser::parse(__DIR__ . DIRECTORY_SEPARATOR . '.env');

$dbConfig = [
    'dsn' => "mysql:host={$_ENV["DATABASE_HOST"]};post={$_ENV["DATABASE_PORT"]};dbname={$_ENV["DATABASE_NAME"]}",
    'user' => "{$_ENV["DATABASE_USER"]}",
    'password' => "{$_ENV["DATABASE_PASSWORD"]}",
];

DatabaseBootstrap::bootstrap();

global $app;

$app = Application::init($_ENV['APPLICATION_NAME'], $dbConfig);

require_once('core/front_routes.php');
require_once('core/api_routes.php');

$app->start();
