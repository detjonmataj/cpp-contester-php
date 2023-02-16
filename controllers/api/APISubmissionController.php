<?php declare(strict_types=1);

require_once 'models/Submission.php';
require_once 'core/BaseController.php';

class APISubmissionController extends BaseController
{
    public function get(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            if (!empty($_GET)) {
                $submission = Submission::findOne($_GET);

                if (is_null($submission)) {
                    Response::setStatusCode(404);
                    return Response::json(['message' => 'Submission not found.']);
                }

                if (Application::$APP->getUser()->isStudent() && $submission->user_id !== Application::$APP->getUser()->user_id) {
                    Response::setStatusCode(403);
                    return Response::json(['message' => 'You are not allowed to view other users\'s submissions.']);
                }

                Response::setStatusCode(200);
                return Response::json($submission);
            }

            if (Application::$APP->getUser()->isStudent()) {
                $submissions = Submission::findAll([], ['where user_id = ' . Application::$APP->getUser()->user_id]);
            } else {
                $submissions = Submission::findAll([], []);
            }

            Response::setStatusCode(200);
            return Response::json($submissions);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when retrieving submissions.']);
        }
    }

    public function create(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $submission = new Submission();
            $submission->loadData(Request::requestBody());

            $submission_id = $submission->save();
            if (!$submission_id) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when creating submission.']);
            }

            $submission->submission_id = (int)$submission_id;
            Response::setStatusCode(201);
            return Response::json($submission);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when creating submission.']);
        }
    }

    public function update(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $request_submission_id = (int)$_REQUEST['submission_id'] ?? null;

            if (is_null($request_submission_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to edit submission, submission_id must be specified in the query parameters.']);
            }

            if (is_null(Submission::findOne(['submission_id' => $request_submission_id]))) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Submission with submission_id ' . $request_submission_id . ' not found.']);
            }

            $submission = new Submission();
            $submission->loadData(Request::requestBody());

            if (Application::$APP->getUser()->isStudent() && $submission->user_id !== Application::$APP->getUser()->user_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to edit other users\'s submissions.']);
            }

            $submission->submission_id = $request_submission_id;

            if (!$submission->update()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when editing submission.']);
            }

            Response::setStatusCode(200);
            return Response::json($submission);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when editing submission.']);
        }
    }

    public function delete(): string|array|false
    {
        try {
            if (!Application::$APP->isAuthenticated()) {
                Response::setStatusCode(401);
                return Response::json(['message' => 'You are not logged in.']);
            }

            $request_submission_id = $_REQUEST['submission_id'] ?? null;

            if (is_null($request_submission_id)) {
                Response::setStatusCode(400);
                return Response::json(['message' => 'Failed to delete submission, submission_id must be specified in the query parameters.']);
            }

            $submission = Submission::findOne(['submission_id' => $request_submission_id]);

            if (is_null($submission)) {
                Response::setStatusCode(404);
                return Response::json(['message' => 'Submission with submission_id ' . $request_submission_id . ' not found.']);
            }

            if (Application::$APP->getUser()->isStudent() && $submission->user_id !== Application::$APP->getUser()->user_id) {
                Response::setStatusCode(403);
                return Response::json(['message' => 'You are not allowed to delete other users\'s submissions.']);
            }

            if (!$submission->delete()) {
                Response::setStatusCode(500);
                return Response::json(['message' => 'Something went wrong when deleting submission.']);
            }

            Response::setStatusCode(200);
            return Response::json(['message' => 'Submission deleted successfully !']);
        } catch (Exception|Error) {
            Response::setStatusCode(500);
            return Response::json(['message' => 'Something went wrong when deleting submission.']);
        }
    }
}