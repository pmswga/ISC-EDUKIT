use `iep`;

DROP PROCEDURE IF EXISTS addSubject;
DROP PROCEDURE IF EXISTS removeSubject;
DROP PROCEDURE IF EXISTS changeDescriptionSubject;
DROP PROCEDURE IF EXISTS getSubjects;
DROP PROCEDURE IF EXISTS getAllSubjects;

DELIMITER //


/* Работа с предметами */

CREATE PROCEDURE addSubject(descp char(255))
BEGIN
	INSERT INTO `subjects` (`description`) VALUES (descp);
END;

CREATE PROCEDURE removeSubject(subject_id int)
BEGIN
	DELETE FROM `subjects` WHERE `id_subject`=subject_id;
END;

CREATE PROCEDURE changeDescriptionSubject(subject_id int, new_descp char(255))
BEGIN
	UPDATE `subjects` SET `description`=new_descp WHERE `id_subject`=subject_id;
END;

CREATE PROCEDURE getSubjects(emailTeacher char(30))
BEGIN
	SELECT s.id_subject, s.description 
	FROM `teacher_subjects` ts
		INNER JOIN `subjects` s ON ts.id_subject=s.id_subject
	WHERE ts.`id_teacher`=getTeacherId(emailTeacher);
END;

CREATE PROCEDURE getAllSubjects()
BEGIN
	SELECT * FROM `v_Subjects`;
END;

//

DELIMITER ;