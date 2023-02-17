-- Replies to a comment
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

