-- Get favourite questions of a user
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
SELECT * FROM `Favourite question of user`;