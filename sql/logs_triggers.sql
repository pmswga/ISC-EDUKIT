USE `iep`;

DROP TRIGGER IF EXISTS log_insUser;
DROP TRIGGER IF EXISTS log_uptUser;

DELIMITER //

CREATE TRIGGER IF NOT EXISTS log_insUser AFTER INSERT ON `users` FOR EACH ROW
BEGIN
	INSERT INTO `logs` (`tbl`, `msg`) VALUES ('users', CONCAT(
		'Добавлен новый пользователь ',
        new.second_name, ' ',
        new.first_name, ' ',
        new.patronymic, ' '
    ));
END;

CREATE TRIGGER IF NOT EXISTS log_uptUser AFTER UPDATE ON `users` FOR EACH ROW
BEGIN
	INSERT INTO `logs` (`tbl`, `msg`) VALUES ('users', 'Updated fileds in table users');
END;

CREATE TRIGGER IF NOT EXISTS log_delUser AFTER DELETE ON `users` FOR EACH ROW 
BEGIN
	INSERT INTO `logs` (`tbl`, `msg`) VALUES ('users', CONCAT(
		'Добавлен новый пользователь ',
        new.second_name, ' ',
        new.first_name, ' ',
        new.patronymic, ' '
    ));
END;

//

DELIMITER ;
