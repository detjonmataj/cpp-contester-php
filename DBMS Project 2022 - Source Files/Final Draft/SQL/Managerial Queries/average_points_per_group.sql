CREATE VIEW `Average points per group` AS SELECT group_id, `name`, AVG(points)
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
GROUP BY g_u.group_id;