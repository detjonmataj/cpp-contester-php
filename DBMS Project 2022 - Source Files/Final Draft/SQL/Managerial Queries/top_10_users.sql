-- User with most solved questions
CREATE VIEW `Top 10` AS 
SELECT user_id, 
CONCAT(first_name, " ", last_name) AS 'User Full Name', 
questions_solved FROM `user`
WHERE questions_solved IS NOT NULL
ORDER BY questions_solved DESC, CONCAT(first_name, " ", last_name) ASC
LIMIT 10;
