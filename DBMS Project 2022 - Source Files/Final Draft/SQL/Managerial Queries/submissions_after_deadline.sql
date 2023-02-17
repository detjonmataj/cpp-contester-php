CREATE VIEW `Submissions after deadline` AS 
SELECT u.user_id, 
CONCAT(first_name, ' ', last_name) AS 'User Full Name', 
`name` AS 'Assignment Name', 
TIMESTAMPDIFF(HOUR, s.created_at, a.deadline) AS `Hour Difference`
FROM `user` AS u
JOIN submission AS s
ON u.user_id = s.user_id
JOIN assignment AS a
ON s.assignment_id = a.assignment_id
WHERE TIMESTAMPDIFF(HOUR, s.created_at, a.deadline) >= 0;