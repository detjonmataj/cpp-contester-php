-- Take all points for a specific group for an assignment
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
);