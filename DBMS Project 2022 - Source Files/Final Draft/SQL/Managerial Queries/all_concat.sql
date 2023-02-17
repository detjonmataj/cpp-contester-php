-- All announcements per patch categories
CREATE VIEW `Announcements for Patches` AS 
SELECT announcement_id, 
title as 'Announcement Title', 
`description` AS 'Announcement Description', 
`name` AS 'Category Name'
FROM announcement AS an
JOIN announcement_category AS an_cat
ON an.announcement_category_id = an_cat.announcement_category_id
WHERE an.announcement_category_id = 2;


CREATE VIEW `Assignments per Group` AS  
SELECT assignment.assignment_id, 
`group`.group_id, 
assignment.`name` AS 'Assignment', 
`group`.`name` AS 'Group' 
FROM assignment_group, assignment, `group` 
WHERE assignment_group.assignment_id = assignment.assignment_id 
AND assignment_group.group_id = `group`.group_idCREATE VIEW `Authentication` AS 
SELECT user_id, `first_name`, `last_name`
FROM `user`
WHERE `password` = '$2a$12$D3sepOMfL5NAYBDA8Nfk1OS/4uxtYCTekD2JDJZ3gmEsNbbqSuRw.'
AND username = 'ibreti';CREATE VIEW `Average points per group` AS SELECT group_id, `name`, AVG(points)
FROM (
	SELECT u.user_id, g.group_id, `name`
	FROM group_user AS g_u
	JOIN `user` AS u
	ON g_u.user_id = u.user_id
	JOIN `group` AS g
	ON g.group_id = g_u.group_id
	WHERE g.student_group_id IS NOT NULL
) AS g_u
JOIN assignment_user
ON assignment_user.user_id = g_u.user_id
GROUP BY g_u.group_id;-- Get favourite questions of a user
CREATE VIEW `Favourite question of user` AS
SELECT u.user_id,
CONCAT(u.first_name, ' ', u.last_name) AS `User Full Name`,
q.question_id,
q.title AS `Question`
FROM `user` AS u
JOIN favourite_question as fav
ON u.user_id = fav.user_id
JOIN question as q
ON fav.question_id = q.question_id
WHERE u.user_id = 2
AND CONCAT(u.first_name, ' ', u.last_name) = 'Drin Karkini';

-- Tests
SELECT * FROM `Favourite question of user`;-- Most preferred programming language
CREATE VIEW `Most preferred programming language` AS 
SELECT p.programming_language_id, 
p.`name` AS 'Programming Language',
COUNT(p.programming_language_id) AS 'Number of uses'
FROM `user` AS u
JOIN user_setting AS u_s
ON u.user_setting_id = u_s.user_setting_id
JOIN programming_language AS p
ON u_s.programming_language_id = p.programming_language_id
GROUP BY p.programming_language_id
ORDER BY COUNT(p.programming_language_id) DESC
LIMIT 1;-- Top 3 used themes
CREATE VIEW `Top 3 preferred themes` AS 
SELECT t.theme_id, 
t.`name` AS 'Theme',
COUNT(t.theme_id) AS 'Number of uses'
FROM `user` AS u
JOIN user_setting AS u_s
ON u.user_setting_id = u_s.user_setting_id
JOIN theme AS t
ON u_s.theme_id = t.theme_id
GROUP BY t.theme_id
ORDER BY COUNT(t.theme_id) DESC
LIMIT 3;-- Take all points for a specific group for an assignment
CREATE VIEW `Points for specific assignment and specific group` AS 
SELECT `user`.user_id, CONCAT(`user`.first_name, " ", `user`.last_name) AS 'User Full Name', 
assignment.assignment_id, 
assignment.`name` AS 'Assignment Name',
`group`.group_id, 
`group`.`name` AS 'Group name', 
points
FROM assignment, `group`, assignment_group, assignment_user, `user`
WHERE `user`.user_id = assignment_user.user_id
AND `group`.group_id = ( 
	SELECT group_id 
	FROM `group`
	WHERE `name` = 'CEN 2020 B'
)
AND assignment.assignment_id = ( 
	SELECT assignment_id 
	FROM assignment
	WHERE `name` = 'Homework week 1'
);-- Questions count per question level
CREATE VIEW `Questions count per question level` AS
SELECT qlev.question_level_id,
qlev.`name` AS 'Level',
COUNT(q.question_id) AS 'Number of questions'
FROM question AS q
JOIN question_level AS qlev
ON q.question_level_id = qlev.question_level_id
GROUP BY qlev.question_level_id;
CREATE VIEW `Questions For Assignments` AS 
SELECT question.question_id, `name` AS 'Assignment Name', 
title AS 'Question', 
assignment.`description` AS 'Assignment Description',
question.`description` AS 'Question Description'
FROM assignment, question, assignment_question
WHERE question.question_id = assignment_question.question_id
AND assignment.assignment_id = assignment_question.assignment_id;-- Replies to a comment
CREATE VIEW `Replies to comment` AS
SELECT u.user_id,
CONCAT(u.first_name, ' ', u.last_name) AS `User Full Name`,
c.comment_id,
c.title AS 'Comment Head',
c.`description` AS 'Comment Body',
q.question_id,
q.title AS 'Question'
FROM `comment` AS c 
JOIN `user` AS u
ON c.user_id = u.user_id
JOIN question AS q
ON c.question_id = q.question_id
WHERE c.replies_to_id = 1;

CREATE VIEW `Student count per Department` AS
SELECT `user`.department_id, `name`, COUNT(*) as members
FROM `user`, department
WHERE `user`.department_id = department.department_id
GROUP BY `user`.department_id;CREATE VIEW `Submissions 1 day before assignment creation` AS 
SELECT u.user_id, 
CONCAT(first_name, ' ', last_name) AS 'User Full Name', 
`name` AS 'Assignment Name', 
TIMESTAMPDIFF(HOUR, a.created_at, s.created_at) AS 'Hour Difference'
FROM `user` AS u
JOIN submission AS s
ON U.user_id = s.user_id
JOIN assignment AS a
ON s.assignment_id = a.assignment_id
WHERE TIMESTAMPDIFF(HOUR, a.created_at, s.created_at) < 24;CREATE VIEW `Submissions after deadline` AS 
SELECT u.user_id, 
CONCAT(first_name, ' ', last_name) AS 'User Full Name', 
`name` AS 'Assignment Name', 
TIMESTAMPDIFF(HOUR, s.created_at, a.deadline) AS `Hour Difference`
FROM `user` AS u
JOIN submission AS s
ON u.user_id = s.user_id
JOIN assignment AS a
ON s.assignment_id = a.assignment_id
WHERE TIMESTAMPDIFF(HOUR, s.created_at, a.deadline) >= 0;CREATE VIEW `Test cases of question` AS
SELECT t_c.test_case_id,
t_c.input,
t_c.output,
q.question_id,
q.title AS 'Question'
FROM test_case AS t_c
JOIN question AS q
ON t_c.question_id = q.question_id
WHERE q.question_id = 1;CREATE VIEW `Todo's with at least 5 questions` AS 
SELECT t.todo_id,
t.`name` AS 'TODO Name',
t.`description` AS 'TODO Description',
u.user_id, 
CONCAT(u.first_name, ' ', u.last_name) AS 'User Full Name',
COUNT(q.question_id) AS 'Number of questions'
FROM todo_question AS t_q
JOIN todo as t
ON t_q.todo_id = t.todo_id
JOIN question AS Q
ON t_q.question_id = q.question_id
JOIN `user` AS u
ON t.user_id = u.user_id
GROUP BY t.todo_id
HAVING COUNT(q.question_id) >= 5;-- User with most solved questions
CREATE VIEW `Top 10` AS 
SELECT user_id, 
CONCAT(first_name, " ", last_name) AS 'User Full Name', 
questions_solved FROM `user`
WHERE questions_solved IS NOT NULL
ORDER BY questions_solved DESC, CONCAT(first_name, " ", last_name) ASC
LIMIT 10;
-- Top 3 preferred themes
CREATE VIEW `Top 3 preferred themes` AS 
SELECT t.theme_id, 
t.`name` AS 'Theme',
COUNT(t.theme_id) AS 'Number of uses'
FROM `user` AS u
JOIN user_setting AS u_s
ON u.user_setting_id = u_s.user_setting_id
JOIN theme AS t
ON u_s.theme_id = t.theme_id
GROUP BY t.theme_id
ORDER BY COUNT(t.theme_id) DESC
LIMIT 3;-- Top 5 accepted volumes
CREATE VIEW `Top 5 solved volumes`AS 
SELECT v.volume_id,
v.`name` AS 'Volume',
COUNT(DISTINCT q.question_id, s.status_name, s.user_id) AS 'Number of accepted submissions'
FROM submission AS s
JOIN question AS q
ON s.question_id = q.question_id
JOIN volume AS v
ON q.volume_id = v.volume_id
WHERE s.status_name = 'Accepted !'
GROUP BY v.volume_id
ORDER BY COUNT(DISTINCT q.question_id, s.status_name, s.user_id) DESC
LIMIT 5;CREATE VIEW `User and rank` AS 
SELECT u.user_id,
CONCAT(u.first_name, ' ', u.last_name) AS 'User Full Name',
r.`name` AS 'Rank'
FROM `user` AS u
JOIN `rank` AS r
ON u.rank_id = r.rank_id
ORDER BY r.rank_id DESC, CONCAT(u.first_name, ' ', u.last_name) ASC;-- Users by groups by contest
CREATE VIEW `Users groups and contests` AS
SELECT u.user_id,
CONCAT(u.first_name, ' ', u.last_name) AS `User Full Name`,
g.group_id,
g.`name` AS 'Group',
c.contest_id,
c.`name` AS 'Contest'
FROM `user` AS u
JOIN group_user AS g_u
ON u.user_id = g_u.user_id
JOIN `group` as g
ON g_u.group_id = g.group_id
JOIN contest_group AS c_g
ON g.group_id = c_g.group_id
JOIN contest AS c
ON c_g.contest_id = c.contest_id
ORDER BY CONCAT(u.first_name, ' ', u.last_name) ASC;