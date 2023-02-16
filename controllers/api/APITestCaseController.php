<?php declare(strict_types=1);

require_once 'models/TestCase.php';
require_once 'core/BaseController.php';

class APITestCaseController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $test_case = TestCase::findOne($_GET);
                if (is_null($test_case)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'Test case not found.']);
                }

                Response::setStatusCode(200);
                return Response::json($test_case);
            }

            $test_cases = TestCase::findAll([], []);
            Response::setStatusCode(200);
            return Response::json($test_cases);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving test cases.']);
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
                return Response::json(['message' => 'You are not allowed to create test cases.']);
            }

            $test_case = new TestCase();
            $test_case->loadData(Request::requestBody());

            $question = Question::findOne(['question_id' => $test_case->question_id]);
            $question_creator_id = $question->user_id;

            if (Application::$APP->getUser()->isTeacher() && Application::$APP->getUser()->user_id !== $question_creator_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to create test cases for questions that you did not create.']);
            }

            $test_case_id = $test_case->save();
            if (!$test_case_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating test case.']);
            }

            $test_case->test_case_id = (int)$test_case_id;
            Response::setStatusCode(201);
            return Response::json($test_case);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating test case.']);
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
                return Response::json(['message' => 'You are not allowed to edit test cases.']);
            }

            $request_test_case_id = (int)$_REQUEST['test_case_id'] ?? null;

            if (is_null($request_test_case_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit test case, test_case_id must be specified in the query parameters.']);
            }

            if (is_null(TestCase::findOne(['test_case_id' => $request_test_case_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Test case with test_case_id ' . $request_test_case_id . ' not found.']);
            }

            $test_case = new TestCase();
            $test_case->loadData(Request::requestBody());

            $question = Question::findOne(['question_id' => $test_case->question_id]);
            $question_creator_id = $question->user_id;

            if (Application::$APP->getUser()->isTeacher() && Application::$APP->getUser()->user_id !== $question_creator_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit test cases for questions that you did not create.']);
            }

            $test_case->test_case_id = $request_test_case_id;

            if (!$test_case->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing test case.']);
            }

            Response::setStatusCode(200);
            return Response::json($test_case);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing test case.']);
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
                return Response::json(['message' => 'You are not allowed to delete test cases.']);
            }

            $request_test_case_id = $_REQUEST['test_case_id'] ?? null;

            if (is_null($request_test_case_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete test case, test_case_id must be specified in the query parameters.']);
            }

            $test_case = TestCase::findOne(['test_case_id' => $request_test_case_id]);

            if (is_null($test_case)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Test case with test_case_id ' . $request_test_case_id . ' not found.']);
            }

            $test_case = new TestCase();
            $test_case->loadData(Request::requestBody());

            $question = Question::findOne(['question_id' => $test_case->question_id]);
            $question_creator_id = $question->user_id;

            if (Application::$APP->getUser()->isTeacher() && Application::$APP->getUser()->user_id !== $question_creator_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete test cases for questions that you did not create.']);
            }

            if (!$test_case->delete()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when deleting test case.']);
            }

            Response::setStatusCode(200);
            return Response::json(['message' => 'Test case deleted successfully !']);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting test case.']);
        }
    }
}