-- Questions count per question level
CREATE VIEW `Questions count per question level` AS
SELECT qlev.question_level_id,
qlev.`name` AS 'Level',
COUNT(q.question_id) AS 'Number of questions'
FROM question AS q
JOIN question_level AS qlev
ON q.question_level_id = qlev.question_level_id
GROUP BY qlev.question_level_id;
