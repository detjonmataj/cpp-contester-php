CREATE VIEW `Questions For Assignments` AS 
SELECT question.question_id, `name` AS 'Assignment Name', 
title AS 'Question', 
assignment.`description` AS 'Assignment Description',
question.`description` AS 'Question Description'
FROM assignment, question, assignment_question
WHERE question.question_id = assignment_question.question_id
AND assignment.assignment_id = assignment_question.assignment_id;