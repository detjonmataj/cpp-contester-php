CREATE VIEW `Assignments per Group` AS  
SELECT assignment.assignment_id, 
`group`.group_id, 
assignment.`name` AS 'Assignment', 
`group`.`name` AS 'Group' 
FROM assignment_group, assignment, `group` 
WHERE assignment_group.assignment_id = assignment.assignment_id 
AND assignment_group.group_id = `group`.group_id