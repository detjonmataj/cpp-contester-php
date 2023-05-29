CREATE
DATABASE IF NOT EXISTS `contesterpp_db`;

USE
`contesterpp_db`;

CREATE TABLE IF NOT EXISTS `ranks`
(
    `rank_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    20
) NOT NULL,
    `minimum_question_count` INT NOT NULL UNIQUE,
    PRIMARY KEY
(
    `rank_id`
)
    );

CREATE TABLE IF NOT EXISTS `question_categories`
(
    `question_category_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) UNIQUE NOT NULL,
    PRIMARY KEY
(
    `question_category_id`
)
    );

CREATE TABLE IF NOT EXISTS `user_levels`
(
    `user_level_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) UNIQUE NOT NULL,
    `description` TEXT,
    PRIMARY KEY
(
    `user_level_id`
)
    );

CREATE TABLE IF NOT EXISTS `volumes`
(
    `volume_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    PRIMARY KEY
(
    `volume_id`
)
    );

CREATE TABLE IF NOT EXISTS `faqs`
(
    `faq_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `title`
    VARCHAR
(
    50
) NOT NULL,
    `description` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    PRIMARY KEY
(
    `faq_id`
)
    );

CREATE TABLE IF NOT EXISTS `announcement_categories`
(
    `announcement_category_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    PRIMARY KEY
(
    `announcement_category_id`
)
    );

CREATE TABLE IF NOT EXISTS `question_levels`
(
    `question_level_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    PRIMARY KEY
(
    `question_level_id`
)
    );

CREATE TABLE IF NOT EXISTS `contests`
(
    `contest_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY
(
    `contest_id`
)
    );

CREATE TABLE IF NOT EXISTS `departments`
(
    `department_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) UNIQUE NOT NULL,
    `alias` VARCHAR
(
    10
) UNIQUE NOT NULL,
    PRIMARY KEY
(
    `department_id`
)
    );

CREATE TABLE IF NOT EXISTS `languages`
(
    `language_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) UNIQUE NOT NULL,
    `prefix` VARCHAR
(
    10
) UNIQUE NOT NULL,
    PRIMARY KEY
(
    `language_id`
)
    );

CREATE TABLE IF NOT EXISTS `themes`
(
    `theme_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) UNIQUE NOT NULL,
    PRIMARY KEY
(
    `theme_id`
)
    );

CREATE TABLE IF NOT EXISTS `student_groups`
(
    `student_group_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `code`
    VARCHAR
(
    10
) NOT NULL,
    `study_year` VARCHAR
(
    5
) NOT NULL,
    `department_id` INT,
    FOREIGN KEY
(
    `department_id`
) REFERENCES `departments`
(
    `department_id`
),
    PRIMARY KEY
(
    `student_group_id`
)
    );

CREATE TABLE IF NOT EXISTS `groups`
(
    `group_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    `student_group_id` INT,
    `parent_group_id` INT,
    PRIMARY KEY
(
    `group_id`
),
    FOREIGN KEY
(
    `student_group_id`
) REFERENCES `student_groups`
(
    `student_group_id`
),
    FOREIGN KEY
(
    `parent_group_id`
) REFERENCES `groups`
(
    `group_id`
)
    );

CREATE TABLE IF NOT EXISTS `contest_groups`
(
    `group_id`
    INT
    NOT
    NULL,
    `contest_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    `group_id`,
    `contest_id`
),
    FOREIGN KEY
(
    `group_id`
) REFERENCES `groups`
(
    `group_id`
),
    FOREIGN KEY
(
    `contest_id`
) REFERENCES `contests`
(
    `contest_id`
)
    );

CREATE TABLE IF NOT EXISTS `announcements`
(
    `announcement_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `created_at`
    TIMESTAMP
    DEFAULT
    CURRENT_TIMESTAMP
    NOT
    NULL,
    `title`
    VARCHAR
(
    50
) NOT NULL,
    `description` TEXT NOT NULL,
    `announcement_category_id` INT NOT NULL,
    PRIMARY KEY
(
    `announcement_id`
),
    FOREIGN KEY
(
    `announcement_category_id`
) REFERENCES `announcement_categories`
(
    `announcement_category_id`
)
    );

CREATE TABLE IF NOT EXISTS `programming_languages`
(
    `programming_language_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) UNIQUE /*TODO: This should not be unique because there can be different versions of the same programming language*/ NOT NULL,
    `version` VARCHAR
(
    20
) NOT NULL,
    `logo` BLOB NOT NULL,
    `compiler_path` VARCHAR
(
    255
) NOT NULL,
    PRIMARY KEY
(
    `programming_language_id`
)
    );

CREATE TABLE IF NOT EXISTS `user_settings`
(
    `user_setting_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `language_id`
    INT
    NOT
    NULL,
    `programming_language_id`
    INT,
    `theme_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    `user_setting_id`
),
    FOREIGN KEY
(
    `language_id`
) REFERENCES `languages`
(
    `language_id`
),
    FOREIGN KEY
(
    `programming_language_id`
) REFERENCES `programming_languages`
(
    `programming_language_id`
),
    FOREIGN KEY
(
    `theme_id`
) REFERENCES `themes`
(
    `theme_id`
)
    );

CREATE TABLE IF NOT EXISTS `users`
(
    `user_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `first_name`
    VARCHAR
(
    50
) NOT NULL,
    `last_name` VARCHAR
(
    50
) NOT NULL,
    `birthday` DATE,
    `username` VARCHAR
(
    50
) UNIQUE NOT NULL,
    `password` VARCHAR
(
    255
) NOT NULL,
    `email` VARCHAR
(
    50
) NOT NULL UNIQUE,
    `questions_submitted` INT DEFAULT NULL,
    `questions_solved` INT DEFAULT NULL,
    `questions_rejected` INT DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `created_by` VARCHAR
(
    50
) NOT NULL,
    `user_level_id` INT NOT NULL,
    FOREIGN KEY
(
    `user_level_id`
) REFERENCES `user_levels`
(
    `user_level_id`
),
    PRIMARY KEY
(
    `user_id`
)
    );

CREATE TABLE IF NOT EXISTS `courses`
(
    `course_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    `code` VARCHAR
(
    10
) NOT NULL,
    PRIMARY KEY
(
    `course_id`
)
    );

CREATE TABLE IF NOT EXISTS `assignments`
(
    `assignment_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    `description` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `deadline` TIMESTAMP NULL,
    `is_graded` BOOLEAN NOT NULL DEFAULT '0',
    `user_id` INT NOT NULL,
    `programming_language_id` INT,
    `contest_id` INT,
    `course_id` INT,
    PRIMARY KEY
(
    `assignment_id`
),
    FOREIGN KEY
(
    `programming_language_id`
) REFERENCES `programming_languages`
(
    `programming_language_id`
),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    FOREIGN KEY
(
    `contest_id`
) REFERENCES `contests`
(
    `contest_id`
),
    FOREIGN KEY
(
    `course_id`
) REFERENCES `courses`
(
    `course_id`
)
    );

CREATE TABLE IF NOT EXISTS `questions`
(
    `question_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `title`
    VARCHAR
(
    50
) NOT NULL,
    `description` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `hint` TEXT,
    `volume_id` INT,
    `question_category_id` INT,
    `user_id` INT NOT NULL,
    `question_level_id` INT NOT NULL,
    PRIMARY KEY
(
    `question_id`
),
    FOREIGN KEY
(
    `volume_id`
) REFERENCES `volumes`
(
    `volume_id`
),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    FOREIGN KEY
(
    `question_level_id`
) REFERENCES `question_levels`
(
    `question_level_id`
),
    FOREIGN KEY
(
    `question_category_id`
) REFERENCES `question_categories`
(
    `question_category_id`
)
    );

CREATE TABLE IF NOT EXISTS `assignment_questions`
(
    `question_id`
    INT
    NOT
    NULL,
    `assignment_id`
    INT
    NOT
    NULL,
    `weight`
    DECIMAL
    NOT
    NULL,
    FOREIGN
    KEY
(
    `question_id`
) REFERENCES `questions`
(
    `question_id`
),
    FOREIGN KEY
(
    `assignment_id`
) REFERENCES `assignments`
(
    `assignment_id`
),
    PRIMARY KEY
(
    `question_id`,
    `assignment_id`
)
    );

CREATE TABLE IF NOT EXISTS `test_cases`
(
    `test_case_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `input`
    TEXT
    NOT
    NULL,
    `output`
    TEXT
    NOT
    NULL,
    `question_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    `test_case_id`
),
    FOREIGN KEY
(
    `question_id`
) REFERENCES `questions`
(
    `question_id`
)
    );

CREATE TABLE IF NOT EXISTS `attachments`
(
    attachment_id
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `file`
    BLOB
    NOT
    NULL,
    `created_at`
    TIMESTAMP
    DEFAULT
    CURRENT_TIMESTAMP
    NOT
    NULL,
    `assignment_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    attachment_id
),
    FOREIGN KEY
(
    `assignment_id`
) REFERENCES `assignments`
(
    `assignment_id`
)
    );

CREATE TABLE IF NOT EXISTS `submissions`
(
    `submission_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `code`
    TEXT
    NOT
    NULL,
    `status_name`
    VARCHAR
(
    20
) NOT NULL,
    `error_message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `question_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `assignment_id` INT,
    `programming_language_id` INT NOT NULL,
    PRIMARY KEY
(
    `submission_id`
),
    FOREIGN KEY
(
    `assignment_id`
) REFERENCES `assignments`
(
    `assignment_id`
),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    FOREIGN KEY
(
    `question_id`
) REFERENCES `questions`
(
    `question_id`
),
    FOREIGN KEY
(
    `programming_language_id`
) REFERENCES `programming_languages`
(
    `programming_language_id`
)
    );

CREATE TABLE IF NOT EXISTS `comments`
(
    `comment_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `title`
    VARCHAR
(
    50
) NOT NULL,
    `description` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    `user_id` INT NOT NULL,
    `question_id` INT NOT NULL,
    `replies_to_id` INT,
    PRIMARY KEY
(
    `comment_id`
),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    FOREIGN KEY
(
    `question_id`
) REFERENCES `questions`
(
    `question_id`
),
    FOREIGN KEY
(
    `replies_to_id`
) REFERENCES `comments`
(
    `comment_id`
)
    );

CREATE TABLE IF NOT EXISTS `group_users`
(
    `group_id`
    INT
    NOT
    NULL,
    `user_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    `group_id`,
    `user_id`
),
    FOREIGN KEY
(
    `group_id`
) REFERENCES `groups`
(
    `group_id`
),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
)
    );

CREATE TABLE IF NOT EXISTS `assignment_users`
(
    `points`
    DECIMAL
    NOT
    NULL,
    `user_id`
    INT
    NOT
    NULL,
    `assignment_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    `user_id`,
    `assignment_id`
),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    FOREIGN KEY
(
    `assignment_id`
) REFERENCES `assignments`
(
    `assignment_id`
)
    );

CREATE TABLE IF NOT EXISTS `assignment_groups`
(
    `assignment_id`
    INT
    NOT
    NULL,
    `group_id`
    INT
    NOT
    NULL,
    PRIMARY
    KEY
(
    `assignment_id`,
    `group_id`
),
    FOREIGN KEY
(
    `assignment_id`
) REFERENCES `assignments`
(
    `assignment_id`
),
    FOREIGN KEY
(
    `group_id`
) REFERENCES `groups`
(
    `group_id`
)
    );

CREATE TABLE IF NOT EXISTS `todos`
(
    `todo_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `name`
    VARCHAR
(
    50
) NOT NULL,
    `description` TEXT,
    `user_id` INT NOT NULL,
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    PRIMARY KEY
(
    `todo_id`
)
    );

CREATE TABLE IF NOT EXISTS `todo_questions`
(
    `todo_question_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `todo_id`
    INT
    NOT
    NULL,
    `question_id`
    INT,
    FOREIGN
    KEY
(
    `todo_id`
) REFERENCES `todos`
(
    `todo_id`
),
    FOREIGN KEY
(
    `question_id`
) REFERENCES `questions`
(
    `question_id`
),
    PRIMARY KEY
(
    `todo_question_id`
)
    );

CREATE TABLE IF NOT EXISTS `favourite_questions`
(
    `favourite_question_id`
    INT
    NOT
    NULL
    AUTO_INCREMENT,
    `question_id`
    INT
    NOT
    NULL,
    `user_id`
    INT
    NOT
    NULL,
    FOREIGN
    KEY
(
    `user_id`
) REFERENCES `users`
(
    `user_id`
),
    FOREIGN KEY
(
    `question_id`
) REFERENCES `questions`
(
    `question_id`
),
    PRIMARY KEY
(
    `favourite_question_id`
)
    );

INSERT
IGNORE INTO `user_levels` (`user_level_id`, `name`)
VALUES (1, 'Admin'),
       (2, 'Teacher'),
       (3, 'Student');

INSERT
IGNORE INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `user_level_id`, `created_by`)
VALUES (1, 'Detjon', 'Mataj', 'admin1', '{{admin_password}}', 'admin1@cpp.edu', 1, 'admin1'),
       (2, 'Drin', 'Karkini', 'admin2', '{{admin_password}}', 'admin2@cpp.edu', 1, 'admin2');

INSERT
IGNORE INTO `question_levels`
VALUES (1, 'Easy'),
       (2, 'Medium'),
       (3, 'Hard');

INSERT
IGNORE INTO `question_categories`
VALUES (1,'Dynamic Programming'),
       (2,'Graph Theory'),
       (3,'Recursion'),
       (4,'Sorting'),
       (5,'Searching'),
       (6,'Brute Force'),
       (7,'Greedy'),
       (8,'Divide & Conquer'),
       (9,'AdHoc');