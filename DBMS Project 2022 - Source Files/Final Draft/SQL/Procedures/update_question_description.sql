DELIMITER $$

CREATE PROCEDURE UpdateQuestionDescription(
	IN question_id INT,
    IN new_question_description TEXT
)
BEGIN
	UPDATE question AS q
    SET q.`description` = new_question_description
    WHERE q.question_id = question_id;
END$$

DELIMITER ;

-- Tests
CALL UpdateQuestionDescription(1, 'This question\' s description has been updated. Add two numbers A and B');