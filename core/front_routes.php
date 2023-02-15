<?php declare(strict_types=1);

require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/DemoController.php';
require_once 'controllers/QuestionController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/SettingController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/UserLevelController.php';

// misc
$app->getRouter()->get('/', [SiteController::class, 'home']);
$app->getRouter()->get('/about', [SiteController::class, 'about']);
$app->getRouter()->get('/account', [AccountController::class, 'account']);
$app->getRouter()->get('/settings', [SettingController::class, 'settings']);
$app->getRouter()->get('/demos', [DemoController::class, 'list']);

// auth
$app->getRouter()->get('/login', [AuthController::class, 'login']);
$app->getRouter()->post('/login', [AuthController::class, 'login']);
$app->getRouter()->get('/register', [AuthController::class, 'register']);
$app->getRouter()->post('/register', [AuthController::class, 'register']);
$app->getRouter()->get('/logout', [AuthController::class, 'logout']);

// questions
$app->getRouter()->get('/questions', [QuestionController::class, 'list']);
$app->getRouter()->get('/question_categories', [QuestionController::class, 'categories']);
$app->getRouter()->get('/question_levels', [QuestionController::class, 'levels']);

// users
$app->getRouter()->get('/users/edit', [UserController::class, 'edit']);
$app->getRouter()->get('/users', [UserController::class, 'list']);
$app->getRouter()->get('/users/create', [UserController::class, 'create']);

// user_levels
$app->getRouter()->get('/user_levels/edit', [UserLevelController::class, 'edit']);
$app->getRouter()->get('/user_levels', [UserLevelController::class, 'list']);
$app->getRouter()->get('/user_levels/create', [UserLevelController::class, 'create']);