DELIMITER $$

CREATE PROCEDURE UpdateUserGroup(
	IN user_id INT,
    IN old_group_id INT,
    IN new_group_id INT
)
BEGIN
	UPDATE group_user AS g_u
    SET g_u.group_id = new_group_id
    WHERE g_u.user_id = user_id
    AND g_u.group_id = old_group_id;
END$$

DELIMITER ;