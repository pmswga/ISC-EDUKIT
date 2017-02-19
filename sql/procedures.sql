use `iep`;

DELIMITER //

CREATE PROCEDURE getUsers()
BEGIN
	SELECT `second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user` FROM `users`;
END;

CREATE PROCEDURE addUser(sn CHAR(30), fn CHAR(30), pt CHAR(30), email CHAR(255), pswd CHAR(32), type_user INT)
BEGIN
	INSERT INTO `users` 
	(`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`) 
	VALUES 
	(sn, fn, pt, email, pswd, type_user);
END;


//