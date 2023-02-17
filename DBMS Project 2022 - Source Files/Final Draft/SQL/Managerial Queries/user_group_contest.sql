-- Users by groups by contest
CREATE VIEW `Users groups and contests` AS
SELECT u.user_id,
CONCAT(u.first_name, ' ', u.last_name) AS `User Full Name`,
g.group_id,
g.`name` AS 'Group',
c.contest_id,
c.`name` AS 'Contest'
FROM `user` AS u
JOIN group_user AS g_u
ON u.user_id = g_u.user_id
JOIN `group` as g
ON g_u.group_id = g.group_id
JOIN contest_group AS c_g
ON g.group_id = c_g.group_id
JOIN contest AS c
ON c_g.contest_id = c.contest_id
ORDER BY CONCAT(u.first_name, ' ', u.last_name) ASC;