use `iep`;

DROP FUNCTION IF EXISTS getStudentId;
DROP FUNCTION IF EXISTS getElderId;
DROP FUNCTION IF EXISTS getParentId;
DROP FUNCTION IF EXISTS getTeacherId;
DROP FUNCTION IF EXISTS getSubjectId;
DROP FUNCTION IF EXISTS getSpecialtyId;
DROP FUNCTION IF EXISTS isGroupHaveElder;


DELIMITER //


/* Функции для пользователей */

CREATE FUNCTION getStudentId (emailUser CHAR(30)) 
	RETURNS INT
BEGIN
  DECLARE sid int;
  
  SELECT `id_user` INTO sid FROM `users` WHERE `email`=emailUser AND `id_type_user`=4;
  
  RETURN sid;
END;

CREATE FUNCTION getParentId (emailUser CHAR(30)) 
	RETURNS INT
BEGIN
  DECLARE pid int;
  
  SELECT `id_user` INTO pid FROM `users` WHERE `email`=emailUser AND `id_type_user`=5;
  
  RETURN pid;
END;

CREATE FUNCTION getElderId (emailUser CHAR(30)) 
	RETURNS INT
BEGIN
  DECLARE eid int;
  
  SELECT `id_user` INTO eid FROM `users` WHERE `email`=emailUser AND `id_type_user`=3;
  
  RETURN eid;
END;


CREATE FUNCTION getTeacherId(emailTeacher char(30)) 
  RETURNS int
BEGIN
  DECLARE tid int;
  
  SELECT `id_user` INTO tid FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=1;
  
  RETURN tid;
END;



CREATE FUNCTION IF NOT EXISTS isGroupHaveElder(_grp int) RETURNS bool
BEGIN
	IF EXISTS (
		SELECT * FROM `users` u
			INNER JOIN `students` s ON u.id_user=s.id_student
		WHERE `id_type_user`=2 AND `grp`=_grp
	) THEN
		return true;
	ELSE
		return false;
	END IF;
END;




/* Функции для предметов */


CREATE FUNCTION getSubjectId(subject char(255)) 
  RETURNS int
BEGIN
  DECLARE sid int;
  
	SELECT `id_subject` INTO sid FROM `subjects` WHERE `description`=subject;
  
  RETURN sid;
END;


CREATE FUNCTION getSpecialtyId(spec CHAR(10))
	RETURNS int
BEGIN
	DECLARE sid int;
	
	SELECT DISTINCT `id_spec` INTO sid FROM `specialty` WHERE `code_spec`=code_spec;
	
	RETURN sid;
END;




//

DELIMITER ;