CREATE VIEW `Todo's with at least 5 questions` AS 
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
HAVING COUNT(q.question_id) >= 5;