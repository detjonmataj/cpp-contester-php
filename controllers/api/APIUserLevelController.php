<?php declare(strict_types=1);

require_once 'core/BaseController.php';
require_once 'models/UserLevel.php';

class APIUserLevelController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to retrieve user levels.']);
            }

            if (!empty($_GET)) {
                $userLevel = UserLevel::findOne($_GET);
                if (is_null($userLevel)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'User level not found.']);
                }

                Response::setStatusCode(200);
                return Response::json($userLevel);
            }

            $user_levels = UserLevel::findAll([], []);
            Response::setStatusCode(200);
            return Response::json($user_levels);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving user levels.']);
        }
    }

    public function create(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to create user levels.']);
            }

            $user_level = new UserLevel();
            $user_level->loadData(Request::requestBody());

            $user_level_id = $user_level->save();
            if (!$user_level_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating user level.']);
            }

            $user_level->user_level_id = (int)$user_level_id;
            Response::setStatusCode(201);
            return Response::json($user_level);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating user level.']);
        }
    }

    public function update(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit user levels.']);
            }

            $request_user_level_id = (int)$_REQUEST['user_level_id'] ?? null;

            if (is_null($request_user_level_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit user level, user_level_id must be specified in the query parameters.']);
            }

            if (is_null(UserLevel::findOne(['user_level_id' => $request_user_level_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'User level with user_level_id ' . $request_user_level_id . ' not found.']);
            }

            $user_level = new UserLevel();
            $user_level->loadData(Request::requestBody());
            $user_level->user_level_id = $request_user_level_id;

            if (!$user_level->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing user level.']);
            }

            Response::setStatusCode(200);
            return Response::json($user_level);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing user level.']);
        }
    }

    public function delete(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete user levels.']);
            }

            $request_user_level_id = $_REQUEST['user_level_id'] ?? null;

            if (is_null($request_user_level_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete user level, user_level_id must be specified in the query parameters.']);
            }

            $user_level = UserLevel::findOne(['user_level_id' => $request_user_level_id]);

            if (is_null($user_level)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'User level with user_level_id ' . $request_user_level_id . ' not found.']);
            }

            if (!$user_level->delete()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Failed to delete user level.']);
            }

            Response::setStatusCode(200);
            return Response::json(['message' => 'User level deleted successfully !']);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting user level.']);
        }
    }
}