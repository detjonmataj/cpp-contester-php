<?php declare(strict_types=1);

namespace db;

use PDO;
use PDOException;

class DatabaseBootstrap
{
    public static function bootstrap(): void
    {
        $dsn = "mysql:host={$_ENV["DATABASE_HOST"]};port={$_ENV["DATABASE_PORT"]};dbname={$_ENV['DATABASE_NAME']};charset={$_ENV['DATABASE_CHARSET']};";
        echo $dsn;

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $pdo = new PDO($dsn, $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD'], $options);
            $sql = "
                CREATE DATABASE IF NOT EXISTS `{$_ENV['DATABASE_NAME']}`;
                
                USE `{$_ENV['DATABASE_NAME']}`;
                
                CREATE TABLE IF NOT EXISTS `rank` (
                  `rank_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(20) NOT NULL,
                  `minimum_question_count` INT NOT NULL UNIQUE,
                  PRIMARY KEY (`rank_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `question_category` (
                  `question_category_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) UNIQUE NOT NULL,
                  PRIMARY KEY (`question_category_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `user_level` (
                  `user_level_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) UNIQUE NOT NULL,
                  `description` TEXT,
                  PRIMARY KEY (`user_level_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `volume` (
                  `volume_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  PRIMARY KEY (`volume_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `faq` (
                  `faq_id` INT NOT NULL AUTO_INCREMENT,
                  `title` VARCHAR(50) NOT NULL,
                  `description` TEXT,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  PRIMARY KEY (`faq_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `announcement_category` (
                  `announcement_category_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  PRIMARY KEY (`announcement_category_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `question_level` (
                  `question_level_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  PRIMARY KEY (`question_level_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `contest` (
                  `contest_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `description` TEXT NOT NULL,
                  PRIMARY KEY (`contest_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `department` (
                  `department_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) UNIQUE NOT NULL,
                  `alias` VARCHAR(10) UNIQUE NOT NULL,
                  PRIMARY KEY (`department_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `language` (
                  `language_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) UNIQUE NOT NULL,
                  `prefix` VARCHAR(10) UNIQUE NOT NULL,
                  PRIMARY KEY (`language_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `theme` (
                  `theme_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) UNIQUE NOT NULL,
                  PRIMARY KEY (`theme_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `student_group` (
                  `student_group_id` INT NOT NULL AUTO_INCREMENT,
                  `code` VARCHAR(10) NOT NULL,
                  `study_year` VARCHAR(5) NOT NULL,
                  `department_id` INT,
                  FOREIGN KEY (`department_id`) REFERENCES `department`(`department_id`),
                  PRIMARY KEY (`student_group_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `group` (
                  `group_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  `student_group_id` INT,
                  `parent_group_id` INT,
                  PRIMARY KEY (`group_id`),
                  FOREIGN KEY (`student_group_id`) REFERENCES `student_group`(`student_group_id`),
                  FOREIGN KEY (`parent_group_id`) REFERENCES `group`(`group_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `contest_group` (
                  `group_id` INT NOT NULL,
                  `contest_id` INT NOT NULL,
                  PRIMARY KEY (`group_id`, `contest_id`),
                  FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`),
                  FOREIGN KEY (`contest_id`) REFERENCES `contest`(`contest_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `announcement` (
                  `announcement_id` INT NOT NULL AUTO_INCREMENT,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `title` VARCHAR(50) NOT NULL,
                  `description` TEXT NOT NULL,
                  `announcement_category_id` INT NOT NULL,
                  PRIMARY KEY (`announcement_id`),
                  FOREIGN KEY (`announcement_category_id`) REFERENCES `announcement_category`(`announcement_category_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `programming_language` (
                  `programming_language_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) UNIQUE NOT NULL,
                  `version` VARCHAR(20) NOT NULL,
                  `logo` BLOB NOT NULL,
                  `compiler_path` VARCHAR(255) NOT NULL,
                  PRIMARY KEY (`programming_language_id`)
                );
                
                CREATE TABLE IF NOT EXISTS user_setting (
                  `user_setting_id` INT NOT NULL AUTO_INCREMENT,
                  `language_id` INT NOT NULL,
                  `programming_language_id` INT,
                  `theme_id` INT NOT NULL,
                  PRIMARY KEY (`user_setting_id`),
                  FOREIGN KEY (`language_id`) REFERENCES `language`(`language_id`),
                  FOREIGN KEY (`programming_language_id`) REFERENCES `programming_language`(`programming_language_id`),
                  FOREIGN KEY (`theme_id`) REFERENCES `theme`(`theme_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `user` (
                  `user_id` INT NOT NULL AUTO_INCREMENT,
                  `first_name` VARCHAR(50) NOT NULL,
                  `last_name` VARCHAR(50) NOT NULL,
                  `birthday` DATE,
                  `username` VARCHAR(50) UNIQUE NOT NULL,
                  `password` VARCHAR(255) NOT NULL,
                  `email` VARCHAR(50) NOT NULL UNIQUE,
                  `questions_submitted` INT DEFAULT NULL,
                  `questions_solved` INT DEFAULT NULL,
                  `questions_rejected` INT DEFAULT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `created_by` VARCHAR(50) NOT NULL,
                  `user_level_id` INT NOT NULL,
                  `department_id` INT,
                  `user_setting_id` INT NOT NULL,
                  `rank_id` INT,
                  PRIMARY KEY (`user_id`),
                  FOREIGN KEY (`user_level_id`) REFERENCES `user_level`(`user_level_id`),
                  FOREIGN KEY (`department_id`) REFERENCES `department`(`department_id`),
                  FOREIGN KEY (`rank_id`) REFERENCES `rank`(`rank_id`),
                  FOREIGN KEY (`user_setting_id`) REFERENCES `user_setting`(`user_setting_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `course` (
                  `course_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  `code` VARCHAR(10) NOT NULL,
                  PRIMARY KEY(`course_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `assignment` (
                  `assignment_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  `description` TEXT NOT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `deadline` TIMESTAMP NULL,
                  `is_graded` BOOLEAN NOT NULL DEFAULT '0',
                  `user_id` INT NOT NULL,
                  `programming_language_id` INT,
                  `contest_id` INT,
                  `course_id` INT,
                  PRIMARY KEY (`assignment_id`),
                  FOREIGN KEY (`programming_language_id`) REFERENCES `programming_language`(`programming_language_id`),
                  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
                  FOREIGN KEY (`contest_id`) REFERENCES `contest`(`contest_id`),
                  FOREIGN KEY (`course_id`) REFERENCES `course`(`course_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `question` (
                  `question_id` INT NOT NULL AUTO_INCREMENT,
                  `title` VARCHAR(50) NOT NULL,
                  `description` TEXT NOT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `hint` TEXT,
                  `volume_id` INT,
                  `question_category_id` INT,
                  `user_id` INT NOT NULL,
                  `question_level_id` INT NOT NULL,
                  PRIMARY KEY (`question_id`),
                  FOREIGN KEY (`volume_id`) REFERENCES `volume`(`volume_id`),
                  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
                  FOREIGN KEY (`question_level_id`) REFERENCES `question_level`(`question_level_id`),
                  FOREIGN KEY (`question_category_id`) REFERENCES `question_category`(`question_category_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `assignment_question` (
                  `question_id` INT NOT NULL,
                  `assignment_id` INT NOT NULL,
                  `weight` DECIMAL NOT NULL,
                  FOREIGN KEY (`question_id`) REFERENCES `question`(`question_id`),
                  FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`assignment_id`),
                  PRIMARY KEY (`question_id`, `assignment_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `test_case` (
                  `test_case_id` INT NOT NULL AUTO_INCREMENT,
                  `input` TEXT NOT NULL,
                  `output` TEXT NOT NULL,
                  `question_id` INT NOT NULL,
                  PRIMARY KEY (`test_case_id`),
                  FOREIGN KEY (`question_id`) REFERENCES `question`(`question_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `attachement` (
                  `attachement_id` INT NOT NULL AUTO_INCREMENT,
                  `file` BLOB NOT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `assignment_id` INT NOT NULL,
                  PRIMARY KEY (`attachement_id`),
                  FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`assignment_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `submission` (
                  `submission_id` INT NOT NULL AUTO_INCREMENT,
                  `code` TEXT NOT NULL,
                  `status_name` VARCHAR(20) NOT NULL,
                  `error_message` TEXT NOT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `question_id` INT NOT NULL,
                  `user_id` INT NOT NULL,
                  `assignment_id` INT,
                  `programming_language_id` INT NOT NULL,
                  PRIMARY KEY (`submission_id`),
                  FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`assignment_id`),
                  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
                  FOREIGN KEY (`question_id`) REFERENCES `question`(`question_id`),
                  FOREIGN KEY (`programming_language_id`) REFERENCES `programming_language`(`programming_language_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `comment` (
                  `comment_id` INT NOT NULL AUTO_INCREMENT,
                  `title` VARCHAR(50) NOT NULL,
                  `description` TEXT NOT NULL,
                  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
                  `user_id` INT NOT NULL,
                  `question_id` INT NOT NULL,
                  `replies_to_id` INT,
                  PRIMARY KEY (`comment_id`),
                  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
                  FOREIGN KEY (`question_id`) REFERENCES `question`(`question_id`),
                  FOREIGN KEY (`replies_to_id`) REFERENCES `comment`(`comment_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `group_user` (
                  `group_id` INT NOT NULL,
                  `user_id` INT NOT NULL,
                  PRIMARY KEY (`group_id`, `user_id`),
                  FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`),
                  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `assignment_user` (
                  `points` DECIMAL NOT NULL,
                  `user_id` INT NOT NULL,
                  `assignment_id` INT NOT NULL,
                  PRIMARY KEY (`user_id`, `assignment_id`),
                  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
                  FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`assignment_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `assignment_group` (
                  `assignment_id` INT NOT NULL,
                  `group_id` INT NOT NULL,
                  PRIMARY KEY (`assignment_id`, `group_id`),
                  FOREIGN KEY (`assignment_id`) REFERENCES `assignment`(`assignment_id`),
                  FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `todo` (
                  `todo_id` INT NOT NULL AUTO_INCREMENT,
                  `name` VARCHAR(50) NOT NULL,
                  `description` TEXT,
                  `user_id` INT NOT NULL,
                  FOREIGN KEY(`user_id`) REFERENCES `user`(`user_id`),
                  PRIMARY KEY(`todo_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `todo_question` (
                  `todo_question_id` INT NOT NULL AUTO_INCREMENT,
                  `todo_id` INT NOT NULL,
                  `question_id` INT,
                  FOREIGN KEY(`todo_id`) REFERENCES `todo`(`todo_id`),
                  FOREIGN KEY(`question_id`) REFERENCES `question`(`question_id`),
                  PRIMARY KEY(`todo_question_id`)
                );
                
                CREATE TABLE IF NOT EXISTS `favourite_question` (
                  `favourite_question_id` INT NOT NULL AUTO_INCREMENT,
                  `question_id` INT NOT NULL,
                  `user_id` INT NOT NULL,
                  FOREIGN KEY(`user_id`) REFERENCES `user`(`user_id`),
                  FOREIGN KEY(`question_id`) REFERENCES `question`(`question_id`),
                  PRIMARY KEY(`favourite_question_id`)
                );
            ";
            $pdo->exec($sql);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}