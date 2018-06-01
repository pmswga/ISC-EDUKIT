use `iep`;

/* Служебные */

DROP PROCEDURE IF EXISTS getTeacherID;
DROP PROCEDURE IF EXISTS getStudentID;
DROP PROCEDURE IF EXISTS getElderID;
DROP PROCEDURE IF EXISTS getParentID;
DROP PROCEDURE IF EXISTS getSubjectID;

/* ================================= */


DELIMITER //

CREATE PROCEDURE getParentID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=4;
END;

CREATE PROCEDURE getStudentID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=3;
END;

CREATE PROCEDURE getElderID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=2;
END;

CREATE PROCEDURE getTeacherID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=1;
END;

CREATE PROCEDURE getSubjectID(subject CHAR(30))
BEGIN
	SELECT `id_subject` FROM `subjects` WHERE `description`=subject;
END;


/* ---------------------------------------------------------------------------------- */

//

DELIMITER ;