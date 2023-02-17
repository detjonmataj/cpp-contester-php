CREATE VIEW `User and rank` AS 
SELECT u.user_id,
CONCAT(u.first_name, ' ', u.last_name) AS 'User Full Name',
r.`name` AS 'Rank'
FROM `user` AS u
JOIN `rank` AS r
ON u.rank_id = r.rank_id
ORDER BY r.rank_id DESC, CONCAT(u.first_name, ' ', u.last_name) ASC;