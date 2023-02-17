-- Most preferred programming language
CREATE VIEW `Most preferred programming language` AS 
SELECT p.programming_language_id, 
p.`name` AS 'Programming Language',
COUNT(p.programming_language_id) AS 'Number of uses'
FROM `user` AS u
JOIN user_setting AS u_s
ON u.user_setting_id = u_s.user_setting_id
JOIN programming_language AS p
ON u_s.programming_language_id = p.programming_language_id
GROUP BY p.programming_language_id
ORDER BY COUNT(p.programming_language_id) DESC
LIMIT 1;