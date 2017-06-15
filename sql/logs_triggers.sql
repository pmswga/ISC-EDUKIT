USE `iep`;

DROP TRIGGER IF EXISTS log_insUser;
DROP TRIGGER IF EXISTS log_uptUser;
DROP TRIGGER IF EXISTS log_delUser;

DROP TRIGGER IF EXISTS log_insAdmin;
DROP TRIGGER IF EXISTS log_uptAdmin;
DROP TRIGGER IF EXISTS log_delAdmin;

DELIMITER //

CREATE TRIGGER IF NOT EXISTS log_insUser AFTER INSERT ON `users` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT(
		'Добавлен новый пользователь [',
        new.sn, ' ',
        new.fn, ' ',
        new.pt, ' ',
		  new.email, ']'
    ));
END;

CREATE TRIGGER IF NOT EXISTS log_uptUser AFTER UPDATE ON `users` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT('Данные пользователя обновлены [s',
		old.sn, ' ',
		old.fn, ' ',
		old.pt, ' ',
		old.email, '] ---> [',
		new.sn,  ' ',
		new.fn, ' ',
		new.pt, ' ',
		new.email, ']'
	));
END;

CREATE TRIGGER IF NOT EXISTS log_delUser AFTER DELETE ON `users` FOR EACH ROW 
BEGIN
	call writeLog('users', CONCAT(
		'Пользователь ',
        old.sn, ' ',
        old.fn, ' ',
        old.pt, ' удалён',
    ));
END;


CREATE TRIGGER IF NOT EXISTS log_insAdmin AFTER INSERT ON `admins` FOR EACH ROW
BEGIN
	
END;

CREATE TRIGGER IF NOT EXISTS log_uptAdmin AFTER UPDATE ON `admins` FOR EACH ROW
BEGIN
	
END;

CREATE TRIGGER IF NOT EXISTS log_delAdmin AFTER DELETE ON `admins` FOR EACH ROW
BEGIN
	
END;

//

DELIMITER ;
