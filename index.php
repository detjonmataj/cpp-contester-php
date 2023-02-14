<?php declare(strict_types=1);

require_once 'core/Application.php';
require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/DemoController.php';
require_once 'controllers/QuestionController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/SettingController.php';
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

$app = Application::init($_ENV['APPLICATION_NAME'], $dbConfig);

$app->getRouter()->get('/', [SiteController::class, 'home']);
$app->getRouter()->get('/about', [SiteController::class, 'about']);
$app->getRouter()->get('/login', [AuthController::class, 'login']);
$app->getRouter()->post('/login', [AuthController::class, 'login']);
$app->getRouter()->get('/register', [AuthController::class, 'register']);
$app->getRouter()->post('/register', [AuthController::class, 'register']);
$app->getRouter()->get('/logout', [AuthController::class, 'logout']);
$app->getRouter()->get('/demos', [DemoController::class, 'list']);

$app->getRouter()->get('/questions', [QuestionController::class, 'list']);
$app->getRouter()->get('/question_categories', [QuestionController::class, 'categories']);
$app->getRouter()->get('/question_levels', [QuestionController::class, 'levels']);
$app->getRouter()->get('/account', [AccountController::class, 'account']);
$app->getRouter()->get('/settings', [SettingController::class, 'settings']);

$app->start();
