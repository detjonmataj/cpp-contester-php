-- Top 5 accepted volumes
CREATE VIEW `Top 5 solved volumes`AS 
SELECT v.volume_id,
v.`name` AS 'Volume',
COUNT(DISTINCT q.question_id, s.status_name, s.user_id) AS 'Number of accepted submissions'
FROM submission AS s
JOIN question AS q
ON s.question_id = q.question_id
JOIN volume AS v
ON q.volume_id = v.volume_id
WHERE s.status_name = 'Accepted !'
GROUP BY v.volume_id
ORDER BY COUNT(DISTINCT q.question_id, s.status_name, s.user_id) DESC
LIMIT 5;