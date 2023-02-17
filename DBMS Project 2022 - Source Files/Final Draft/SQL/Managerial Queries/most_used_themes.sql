-- Top 3 used themes
CREATE VIEW `Top 3 preferred themes` AS 
SELECT t.theme_id, 
t.`name` AS 'Theme',
COUNT(t.theme_id) AS 'Number of uses'
FROM `user` AS u
JOIN user_setting AS u_s
ON u.user_setting_id = u_s.user_setting_id
JOIN theme AS t
ON u_s.theme_id = t.theme_id
GROUP BY t.theme_id
ORDER BY COUNT(t.theme_id) DESC
LIMIT 3;