<?php declare(strict_types=1);

require_once 'models/QuestionLevel.php';
require_once 'core/BaseController.php';

class APIQuestionLevelController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $question_level = QuestionLevel::findOne($_GET);
                if (is_null($question_level)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'Question level not found.']);
                }

                Response::setStatusCode(200);
                return Response::json($question_level);
            }

            $question_levels = QuestionLevel::findAll([], []);
            Response::setStatusCode(200);
            return Response::json($question_levels);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving question levels.']);
        }
    }

    public function create(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (Application::$APP->getUser()->isStudent() ) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to create question levels.']);
            }

            $question_level = new QuestionLevel();
            $question_level->loadData(Request::requestBody());

            $question_level_id = $question_level->save();
            if (!$question_level_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating question level.']);
            }

            $question_level->question_level_id = (int)$question_level_id;
            Response::setStatusCode(201);
            return Response::json($question_level);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating question level.']);
        }
    }

    public function update(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (Application::$APP->getUser()->isStudent() ) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit question levels.']);
            }

            $request_question_level_id = (int)$_REQUEST['question_level_id'] ?? null;

            if (is_null($request_question_level_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit question level, question_level_id must be specified in the query parameters.']);
            }

            if (is_null(QuestionLevel::findOne(['question_level_id' => $request_question_level_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Question level with question_level_id ' . $request_question_level_id . ' not found.']);
            }

            $question_level = new QuestionLevel();
            $question_level->loadData(Request::requestBody());
            $question_level->question_level_id = $request_question_level_id;

            if (!$question_level->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing question level.']);
            }

            Response::setStatusCode(200);
            return Response::json($question_level);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing question level.']);
        }
    }

    public function delete(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (Application::$APP->getUser()->isStudent() ) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete question levels.']);
            }

            $request_question_level_id = $_REQUEST['question_level_id'] ?? null;

            if (is_null($request_question_level_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete question level, question_level_id must be specified in the query parameters.']);
            }

            $question_level = QuestionLevel::findOne(['question_level_id' => $request_question_level_id]);

            if (is_null($question_level)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Question level with question_level_id ' . $request_question_level_id . ' not found.']);
            }

            if (!$question_level->delete()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when deleting question level.']);
            }

            Response::setStatusCode(200);
            return Response::json(['message' => 'Question level deleted successfully !']);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting question level.']);
        }
    }
}