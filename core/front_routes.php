<?php declare(strict_types=1);

require_once 'controllers/SiteController.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/DemoController.php';
require_once 'controllers/AccountController.php';
require_once 'controllers/SettingController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/UserLevelController.php';
require_once 'controllers/QuestionController.php';
require_once 'controllers/QuestionLevelController.php';
require_once 'controllers/QuestionCategoryController.php';

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

// users
$app->getRouter()->get('/users', [UserController::class, 'list']);
$app->getRouter()->get('/users/create', [UserController::class, 'create']);
$app->getRouter()->get('/users/edit', [UserController::class, 'edit']);

// user_levels
$app->getRouter()->get('/user_levels', [UserLevelController::class, 'list']);
$app->getRouter()->get('/user_levels/create', [UserLevelController::class, 'create']);
$app->getRouter()->get('/user_levels/edit', [UserLevelController::class, 'edit']);

// questions
$app->getRouter()->get('/questions', [QuestionController::class, 'list']);
$app->getRouter()->get('/questions/create', [QuestionController::class, 'create']);
$app->getRouter()->get('/questions/edit', [QuestionController::class, 'edit']);

// question levels
$app->getRouter()->get('/question_levels', [QuestionLevelController::class, 'list']);
$app->getRouter()->get('/question_levels/create', [QuestionLevelController::class, 'create']);
$app->getRouter()->get('/question_levels/edit', [QuestionLevelController::class, 'edit']);

// question categories
$app->getRouter()->get('/question_categories', [QuestionCategoryController::class, 'list']);
$app->getRouter()->get('/question_categories/create', [QuestionCategoryController::class, 'create']);
$app->getRouter()->get('/question_categories/edit', [QuestionCategoryController::class, 'edit']);

// test_cases
$app->getRouter()->get('/test_cases', [TestCaseController::class, 'list']);
$app->getRouter()->get('/test_cases/create', [TestCaseController::class, 'create']);
$app->getRouter()->get('/test_cases/edit', [TestCaseController::class, 'edit']);