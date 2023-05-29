<?php declare(strict_types=1);

require_once 'core/BaseController.php';
require_once 'models/ProgrammingLanguage.php';

class APIProgrammingLanguageController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $programming_language = ProgrammingLanguage::findOne($_GET);
                if (is_null($programming_language)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'Programming Language not found.']);
                }

                Response::setStatusCode(200);
                return Response::json($programming_language);
            }

            $programming_languages = ProgrammingLanguage::findAll([], []);
            Response::setStatusCode(200);
            return Response::json($programming_languages);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving programming languages.']);
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
                return Response::json(['message' => 'You are not allowed to create programming languages.']);
            }

            $programming_language = new ProgrammingLanguage();
            $programming_language->loadData(Request::requestBody());

            $programming_language_id = $programming_language->save();
            if (!$programming_language_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating programming language.']);
            }

            $programming_language->programming_language_id = (int)$programming_language_id;
            Response::setStatusCode(201);
            return Response::json($programming_language);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating programming language.']);
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
                return Response::json(['message' => 'You are not allowed to edit programming languages.']);
            }

            $request_programming_language_id = (int)$_REQUEST['programming_language_id'] ?? null;

            if (is_null($request_programming_language_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit programming language, programming_language_id must be specified in the query parameters.']);
            }

            if (is_null(ProgrammingLanguage::findOne(['programming_language_id' => $request_programming_language_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Programming Language with programming_language_id ' . $request_programming_language_id . ' not found.']);
            }

            $programming_language = new ProgrammingLanguage();
            $programming_language->loadData(Request::requestBody());
            $programming_language->programming_language_id = $request_programming_language_id;

            if (!$programming_language->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing programming language.']);
            }

            Response::setStatusCode(200);
            return Response::json($programming_language);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing programming language.']);
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
                return Response::json(['message' => 'You are not allowed to delete programming languages.']);
            }

            $request_programming_language_id = $_REQUEST['programming_language_id'] ?? null;

            if (is_null($request_programming_language_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete programming language, programming_language_id must be specified in the query parameters.']);
            }

            $programming_language = ProgrammingLanguage::findOne(['programming_language_id' => $request_programming_language_id]);

            if (is_null($programming_language)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Programming Language with programming_language_id ' . $request_programming_language_id . ' not found.']);
            }

            if (!$programming_language->delete()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Failed to delete programming language.']);
            }

            Response::setStatusCode(200);
            return Response::json(['message' => 'Programming Language deleted successfully !']);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting programming language.']);
        }
    }
}