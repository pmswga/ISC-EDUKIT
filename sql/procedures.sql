use `iep`;

DROP PROCEDURE IF EXISTS addSpecialty;
DROP PROCEDURE IF EXISTS addGroup;
DROP PROCEDURE IF EXISTS addStudent;
DROP PROCEDURE IF EXISTS assignParentStudent;

DELIMITER //



CREATE PROCEDURE addSpecialty(code_spec CHAR(10), descp CHAR(255), pdf_file CHAR(255))
BEGIN
  INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE addGroup(descp CHAR(255), code_spec CHAR(10), is_budget BOOL)
BEGIN
  INSERT INTO `groups` (`code_spec`, `description`, `is_budget`) VALUES ((SELECT `id_spec` FROM `specialty` WHERE `code_spec`=code_spec), descp, is_budget);
END;

CREATE PROCEDURE addStudent(fn char(30), sn char(30), pt char(30), s_email char(30), password char(30), ha char(255), cp char(30), s_grp char(10))
BEGIN
	start transaction;
	INSERT INTO `users` (`first_name`, `second_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (fn, sn, pt, email, password, 4);
	INSERT INTO `students` (`id_student`, `home_address`, `cell_phone`, `grp`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=s_email), ha, cp, (SELECT `grp` FROM `groups` WHERE `description`=s_grp));
	commit;
END;

CREATE PROCEDURE assignParentStudent(emailParent CHAR(255), emailStudent CHAR(255), type_relation INT)
BEGIN
  INSERT INTO `parent_child` (`id_parent`, `id_children`, `id_type_relation`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=emailParent AND `id_type_user`=5), (SELECT `id_user` FROM `users` WHERE `email`=emailStudent AND `id_type_user`=4), type_relation);
END;

//

DELIMITER ;