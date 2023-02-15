<?php declare(strict_types=1);

require_once 'core/BaseController.php';
require_once 'models/User.php';
require_once 'core/Response.php';

class APIUserController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $user = User::findOne($_GET);
                if (is_null($user)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'User not found.']);
                }

                unset($user->password);

                Response::setStatusCode(200);
                return Response::json($user);
            }

            $users = User::findAll([], []);
            foreach ($users as $user) {
                unset($user->password);
            }

            Response::setStatusCode(200);
            return Response::json($users);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving users.']);
        }
    }

    public function create(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (Application::$APP->getUser()->user_level_id !== 3) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to create users.']);
            }

            $user = new User();
            $user->loadData(Request::requestBody());

            if ($user->validate(ValidateMode::CREATE)) {
                $user->save();
                unset($user->password);
                Response::setStatusCode(201);
                return Response::json($user);
            } else {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to create user', 'errors' => $user->getErrors()]);
            }
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating user.']);
        }
    }

    public function update(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $request_user_id = $_REQUEST['user_id'] ?? null;

            if (is_null($request_user_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit user.', 'errors' => ['user_id' => 'User ID must be specified in the query parameters.']]);
            }

            if (Application::$APP->getUser()->user_level_id !== 3 && $request_user_id !== Application::$APP->getUser()->user_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit other users.']);
            }

            $user = User::findOne(['user_id' => $request_user_id]);

            if (is_null($user)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'User with user_id ' . $request_user_id . ' not found.']);
            }

            $user->loadData(Request::requestBody());

            if ($user->validate(ValidateMode::UPDATE)) {
                $user->update();
                unset($user->password);
                Response::setStatusCode(200);
                return Response::json($user);
            } else {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit user.', 'errors' => $user->getErrors()]);
            }
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing user.']);
        }
    }

    public function delete(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $request_user_id = $_REQUEST['user_id'] ?? null;

            if (is_null($request_user_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete user.', 'errors' => ['user_id' => 'User ID must be specified in the query parameters.']]);
            }

            if (Application::$APP->getUser()->user_level_id !== 3 && $request_user_id !== Application::$APP->getUser()->user_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete other users.']);
            }

            $user = User::findOne(['user_id' => $request_user_id]);

            if (is_null($user)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'User with user_id ' . $request_user_id . ' not found.']);
            }

            if ($user->delete()) {
                Response::setStatusCode(200);
                return Response::json(['message' => 'User deleted successfully !']);
            } else {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Failed to delete user.']);
            }
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting user.']);
        }
    }
}