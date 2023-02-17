DELIMITER $$

CREATE PROCEDURE UpdateUserPassword(
	IN user_id INT,
    IN `password` VARCHAR(255)
)
BEGIN
	UPDATE `user` AS u
    SET u.`password` = `password`
    WHERE u.user_id = user_id;
END$$

DELIMITER ;