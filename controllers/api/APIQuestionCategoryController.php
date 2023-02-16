<?php declare(strict_types=1);

require_once 'models/QuestionCategory.php';
require_once 'core/BaseController.php';

class APIQuestionCategoryController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $question_category = QuestionCategory::findOne($_GET);
                if (is_null($question_category)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'Question category not found.']);
                }

                Response::setStatusCode(200);
                return Response::json($question_category);
            }

            $question_categories = QuestionCategory::findAll([], []);
            Response::setStatusCode(200);
            return Response::json($question_categories);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving question categories.']);
        }
    }

    public function create(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin() && !Application::$APP->getUser()->isTeacher()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to create question categories.']);
            }

            $question_category = new QuestionCategory();
            $question_category->loadData(Request::requestBody());

            $question_category_id = $question_category->save();
            if (!$question_category_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating question category.']);
            }

            $question_category->question_category_id = (int)$question_category_id;
            Response::setStatusCode(201);
            return Response::json($question_category);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating question category.']);
        }
    }

    public function update(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin() && !Application::$APP->getUser()->isTeacher()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit question categories.']);
            }

            $request_question_category_id = (int)$_REQUEST['question_category_id'] ?? null;

            if (is_null($request_question_category_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit question category, question_category_id must be specified in the query parameters.']);
            }

            if (is_null(QuestionCategory::findOne(['question_category_id' => $request_question_category_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Question category with question_category_id ' . $request_question_category_id . ' not found.']);
            }

            $question_category = new QuestionCategory();
            $question_category->loadData(Request::requestBody());
            $question_category->question_category_id = $request_question_category_id;

            if (!$question_category->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing question category.']);
            }

            Response::setStatusCode(200);
            return Response::json($question_category);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing question category.']);
        }
    }

    public function delete(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!Application::$APP->getUser()->isAdmin() && !Application::$APP->getUser()->isTeacher()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete question categories.']);
            }

            $request_question_category_id = $_REQUEST['question_category_id'] ?? null;

            if (is_null($request_question_category_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete question category, question_category_id must be specified in the query parameters.']);
            }

            $question_category = QuestionCategory::findOne(['question_category_id' => $request_question_category_id]);

            if (is_null($question_category)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Question category with question_category_id ' . $request_question_category_id . ' not found.']);
            }

            if (!$question_category->delete()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when deleting question category.']);
            }

            Response::setStatusCode(200);
            return Response::json(['message' => 'Question category deleted successfully !']);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting question category.']);
        }
    }
}