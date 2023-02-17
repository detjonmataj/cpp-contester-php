CREATE VIEW `Student count per Department` AS
SELECT `user`.department_id, `name`, COUNT(*) as members
FROM `user`, department
WHERE `user`.department_id = department.department_id
GROUP BY `user`.department_id;