CREATE VIEW `Test cases of question` AS
SELECT t_c.test_case_id,
t_c.input,
t_c.output,
q.question_id,
q.title AS 'Question'
FROM test_case AS t_c
JOIN question AS q
ON t_c.question_id = q.question_id
WHERE q.question_id = 1;