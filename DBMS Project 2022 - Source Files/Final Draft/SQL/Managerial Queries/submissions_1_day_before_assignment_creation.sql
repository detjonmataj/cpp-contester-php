CREATE VIEW `Submissions 1 day before assignment creation` AS 
SELECT u.user_id, 
CONCAT(first_name, ' ', last_name) AS 'User Full Name', 
`name` AS 'Assignment Name', 
TIMESTAMPDIFF(HOUR, a.created_at, s.created_at) AS 'Hour Difference'
FROM `user` AS u
JOIN submission AS s
ON U.user_id = s.user_id
JOIN assignment AS a
ON s.assignment_id = a.assignment_id
WHERE TIMESTAMPDIFF(HOUR, a.created_at, s.created_at) < 24;