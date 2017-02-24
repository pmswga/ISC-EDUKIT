use `iep`;

DELIMITER //

CREATE PROCEDURE addSpecialty(code_spec CHAR(10), descp CHAR(255), pdf_file CHAR(255))
BEGIN
  INSERT INTO `specialty` (`code_spec`, `description`, `current_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE addGroup(descp CHAR(255), code_spec CHAR(10), is_budget TINYINT)
BEGIN
  INSERT INTO `groups` (`code_spec`, `description`, `is_budget`) VALUES ((SELECT `id_spec` FROM `specialty` WHERE `code_spec`=code_spec), descp, is_budget);
END

CREATE PROCEDURE addUser(sn CHAR(30), fn CHAR(30), pt CHAR(30), email CHAR(255), pswd CHAR(32), type_user INT)
BEGIN
	INSERT INTO `users` 
	(`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`) 
	VALUES 
	(sn, fn, pt, email, pswd, type_user);
END;

CREATE PROCEDURE addStudent(emailUser )

CREATE PROCEDURE assignParentStudent(emailParent CHAR(255), emailStudent CHAR(255), type_relation INT)
BEGIN
  INSERT INTO `parent_child` (`id_parent`, `id_children`, `id_type_relation`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=emailParent AND `id_type_user`=5), (SELECT `id_user` FROM `users` WHERE `email`=emailStudent AND `id_type_user`=4), type_relation);
END;

//

DELIMITER ;