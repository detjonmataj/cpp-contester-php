DELIMITER $$

CREATE PROCEDURE UpdateUserRank(
	IN user_id INT,
    IN new_rank_id TEXT
)
BEGIN
	UPDATE `user` AS u
    SET u.rank_id = new_rank_id
    WHERE u.user_id = user_id;
END$$

DELIMITER ;

-- Tests
CALL UpdateUserRank(2, 6);