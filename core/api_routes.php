<?php

require_once 'controllers/api/APIUserController.php';
require_once 'controllers/api/APIUserLevelController.php';
require_once 'controllers/api/APIQuestionController.php';
require_once 'controllers/api/APIQuestionLevelController.php';
require_once 'controllers/api/APIQuestionCategoryController.php';
require_once 'controllers/api/APITestCaseController.php';
require_once 'controllers/api/APIProgrammingLanguageController.php';
require_once 'controllers/api/APISubmissionController.php';

// users
$app->getRouter()->get('/api/users', [APIUserController::class, 'get']);
$app->getRouter()->post('/api/users/create', [APIUserController::class, 'create']);
$app->getRouter()->put('/api/users/update', [APIUserController::class, 'update']);
$app->getRouter()->delete('/api/users/delete', [APIUserController::class, 'delete']);

// user_levels
$app->getRouter()->get('/api/user_levels', [APIUserLevelController::class, 'get']);
$app->getRouter()->post('/api/user_levels/create', [APIUserLevelController::class, 'create']);
$app->getRouter()->put('/api/user_levels/update', [APIUserLevelController::class, 'update']);
$app->getRouter()->delete('/api/user_levels/delete', [APIUserLevelController::class, 'delete']);

// questions
$app->getRouter()->get('/api/questions', [APIQuestionController::class, 'get']);
$app->getRouter()->post('/api/questions/create', [APIQuestionController::class, 'create']);
$app->getRouter()->put('/api/questions/update', [APIQuestionController::class, 'update']);
$app->getRouter()->delete('/api/questions/delete', [APIQuestionController::class, 'delete']);

// question_levels
$app->getRouter()->get('/api/question_levels', [APIQuestionLevelController::class, 'get']);
$app->getRouter()->post('/api/question_levels/create', [APIQuestionLevelController::class, 'create']);
$app->getRouter()->put('/api/question_levels/update', [APIQuestionLevelController::class, 'update']);
$app->getRouter()->delete('/api/question_levels/delete', [APIQuestionLevelController::class, 'delete']);

// question_categories
$app->getRouter()->get('/api/question_categories', [APIQuestionCategoryController::class, 'get']);
$app->getRouter()->post('/api/question_categories/create', [APIQuestionCategoryController::class, 'create']);
$app->getRouter()->put('/api/question_categories/update', [APIQuestionCategoryController::class, 'update']);
$app->getRouter()->delete('/api/question_categories/delete', [APIQuestionCategoryController::class, 'delete']);

// test_cases
$app->getRouter()->get('/api/test_cases', [APITestCaseController::class, 'get']);
$app->getRouter()->post('/api/test_cases/create', [APITestCaseController::class, 'create']);
$app->getRouter()->put('/api/test_cases/update', [APITestCaseController::class, 'update']);
$app->getRouter()->delete('/api/test_cases/delete', [APITestCaseController::class, 'delete']);

// programming_languages
$app->getRouter()->get('/api/programming_languages', [APIProgrammingLanguageController::class, 'get']);
$app->getRouter()->post('/api/programming_languages/create', [APIProgrammingLanguageController::class, 'create']);
$app->getRouter()->put('/api/programming_languages/update', [APIProgrammingLanguageController::class, 'update']);
$app->getRouter()->delete('/api/programming_languages/delete', [APIProgrammingLanguageController::class, 'delete']);

// submissions
$app->getRouter()->get('/api/submissions', [APISubmissionController::class, 'get']);
$app->getRouter()->post('/api/submissions/create', [APISubmissionController::class, 'create']);
$app->getRouter()->put('/api/submissions/update', [APISubmissionController::class, 'update']);
$app->getRouter()->delete('/api/submissions/delete', [APISubmissionController::class, 'delete']);