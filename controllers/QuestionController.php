<?php
require_once 'core/BaseController.php';

class QuestionController extends BaseController {

        public function list(): string|array|false
        {
            return Application::$APP->getRouter()->renderView('init', ['endpoint' => 'questions']);
        }

        public function categories(): string|array|false
        {
            return Application::$APP->getRouter()->renderView('init', ['endpoint' =>'question_categories']);
        }

        public function levels(): string|array|false
        {
            return Application::$APP->getRouter()->renderView('init', ['endpoint' =>'question_levels']);
        }

}