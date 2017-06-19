USE `iep`;

DROP TRIGGER IF EXISTS log_insUser;
DROP TRIGGER IF EXISTS log_uptUser;
DROP TRIGGER IF EXISTS log_delUser;

DROP TRIGGER IF EXISTS log_insAdmin;
DROP TRIGGER IF EXISTS log_uptAdmin;
DROP TRIGGER IF EXISTS log_delAdmin;

DROP TRIGGER IF EXISTS log_insStudent;
DROP TRIGGER IF EXISTS log_uptStudent;
DROP TRIGGER IF EXISTS log_delStudent;

DROP TRIGGER IF EXISTS log_insSubject;
DROP TRIGGER IF EXISTS log_uptSubject;
DROP TRIGGER IF EXISTS log_delSubject;

DROP TRIGGER IF EXISTS log_insSpecialty;
DROP TRIGGER IF EXISTS log_uptSpecialty;
DROP TRIGGER IF EXISTS log_delSpecialty;

DELIMITER //

CREATE TRIGGER log_insUser AFTER INSERT ON `users` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT(
		'Добавлен новый пользователь [',
        new.sn, ' ',
        new.fn, ' ',
        new.pt, ' ',
		new.email, ']'
    ));
END;

CREATE TRIGGER log_uptUser AFTER UPDATE ON `users` FOR EACH ROW
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

CREATE TRIGGER log_delUser AFTER DELETE ON `users` FOR EACH ROW 
BEGIN
	call writeLog('users', CONCAT(
		'Пользователь ',
        old.sn, ' ',
        old.fn, ' ',
        old.pt, ' удалён'
    ));
END;


CREATE TRIGGER log_insAdmin AFTER INSERT ON `admins` FOR EACH ROW
BEGIN
	call writeLog('admins', CONCAT(
		'Добавлен новый администратор ',
        new.sn, ' ',
        new.fn, ' ',
        new.pt, ' '
    ));
END;

CREATE TRIGGER log_uptAdmin AFTER UPDATE ON `admins` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT('Данные администратора обновлены [',
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

CREATE TRIGGER log_delAdmin AFTER DELETE ON `admins` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT('Администратор [',
		old.sn, ' ',
		old.fn, ' ',
		old.pt, ' ',
		old.email, '] был удалён'
	));
END;


CREATE TRIGGER log_insStudent AFTER INSERT ON `students` FOR EACH ROW
BEGIN
	call writeLog('students', CONCAT(
		'Добавлен новый студент'
    ));
END;

CREATE TRIGGER log_uptStudent AFTER UPDATE ON `students` FOR EACH ROW
BEGIN
	call writeLog('students', CONCAT(
		'Обновлена информация о студенте с ID ', new.id_student
    ));
END;

CREATE TRIGGER log_delStudent AFTER DELETE ON `students` FOR EACH ROW 
BEGIN
	call writeLog('students', CONCAT(
		'Студент с ', old.id_student, ' был удалён'
    ));
END;


CREATE TRIGGER log_insSubject AFTER INSERT ON `subjects` FOR EACH ROW
BEGIN
	call writeLog('subjects', CONCAT(
		'Добавлен новый предмет ', new.description
    ));
END;

CREATE TRIGGER log_uptSubject AFTER UPDATE ON `subjects` FOR EACH ROW
BEGIN
	call writeLog('subjects', CONCAT(
		'Предмет ', old.description, ' был обновлён на ', new.description
    ));
END;

CREATE TRIGGER log_delSubject AFTER DELETE ON `subjects` FOR EACH ROW 
BEGIN
	call writeLog('subjects', CONCAT(
		'Предмет ', old.description, ' был удалён'
    ));
END;


CREATE TRIGGER log_insSpecialty AFTER INSERT ON `specialty` FOR EACH ROW
BEGIN
	call writeLog('specialty', CONCAT(
		'Добавлена новая специальность ', new.code_spec, ' ', new.description
    ));
END;

CREATE TRIGGER log_uptSpecialty AFTER UPDATE ON `specialty` FOR EACH ROW
BEGIN
	call writeLog('specialty', CONCAT(
		'Специальность обновлена [', 
        old.code_spec, ' ',
		old.description, ' ',
        old.pdf_file, '] была обновлён на [',
        new.code_spec, ' ',
        new.description, ' ',
        new.pdf_file
    ));
END;

CREATE TRIGGER log_delSpecialty AFTER DELETE ON `specialty` FOR EACH ROW 
BEGIN
	call writeLog('specialty', CONCAT(
		'Специальность ', old.code_spec, ' ', old.description, ' была удалёна'
    ));
END;


//

DELIMITER ;
