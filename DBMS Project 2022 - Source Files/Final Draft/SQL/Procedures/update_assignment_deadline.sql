DELIMITER $$

CREATE PROCEDURE UpdateAssignmentDeadline(
	IN assignment_id INT,
    IN new_deadline TIMESTAMP
)
BEGIN
	UPDATE assignment AS a
    SET a.deadline = new_deadline
    WHERE a.assignment_id = assignment_id;
END$$

DELIMITER ;

-- Tests
CALL UpdateAssignmentDeadline(1, '2022-06-10 20:00:00');