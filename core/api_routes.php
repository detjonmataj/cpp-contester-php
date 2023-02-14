<?php

require_once 'controllers/api/APIUserController.php';
require_once 'controllers/api/APIUserLevelController.php';

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