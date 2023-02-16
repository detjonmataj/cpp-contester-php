<?php

require_once 'models/Question.php';

class APIQuestionController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $question = Question::findOne($_GET);
                if (is_null($question)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'Question not found.']);
                }

                Response::setStatusCode(200);
                return Response::json($question);
            }

            $questions = Question::findAll([], []);
            Response::setStatusCode(200);
            return Response::json($questions);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving questions.']);
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
                return Response::json(['message' => 'You are not allowed to create questions.']);
            }

            $question = new Question();
            $question->loadData(Request::requestBody());

            $question_id = $question->save();
            if (!$question_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating question.']);
            }

            $question->question_id = (int)$question_id;
            Response::setStatusCode(201);
            return Response::json($question);
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage()]);
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating question.']);
        }
    }

    public function update(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $request_question_id = (int)$_REQUEST['question_id'] ?? null;

            if (is_null($request_question_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit question.', 'errors' => ['question_id' => 'Question ID must be specified in the query parameters.']]);
            }

            if (!Application::$APP->getUser()->isAdmin() && !Application::$APP->getUser()->isTeacher()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit questions.']);
            }

            if (is_null(Question::findOne(['question_id' => $request_question_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Question with question_id ' . $request_question_id . ' not found.']);
            }

            $user = new Question();
            $user->loadData(Request::requestBody());
            $user->question_id = $request_question_id;

            if (!$user->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing question.']);
            }

            Response::setStatusCode(200);
            return Response::json($user);
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing question.']);
        }
    }

    public function delete(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $request_question_id = $_REQUEST['question_id'] ?? null;

            if (is_null($request_question_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete question.', 'errors' => ['question_id' => 'Question ID must be specified in the query parameters.']]);
            }

            if (!Application::$APP->getUser()->isAdmin() && !Application::$APP->getUser()->isTeacher()) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete questions.']);
            }

            $user = Question::findOne(['question_id' => $request_question_id]);

            if (is_null($user)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Question with question_id ' . $request_question_id . ' not found.']);
            }

            if ($user->delete()) {
                Response::setStatusCode(200);
                return Response::json(['message' => 'Question deleted successfully !']);
            } else {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Failed to delete question.']);
            }
        } catch (Exception) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting question.']);
        }
    }
}