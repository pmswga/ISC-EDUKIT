use `iep`;

DROP PROCEDURE IF EXISTS addSubject;
DROP PROCEDURE IF EXISTS removeSubject;
DROP PROCEDURE IF EXISTS changeDescriptionSubject;
DROP PROCEDURE IF EXISTS getAllSubjects;

DELIMITER //


/* Работа с предметами */

CREATE PROCEDURE addSubject(descp CHAR(255))
BEGIN
	INSERT INTO `subjects` (`description`) VALUES (descp);
END;

CREATE PROCEDURE removeSubject(descp CHAR(255))
BEGIN
	DELETE FROM `subjects` WHERE `description`=descp;
END;

CREATE PROCEDURE changeDescriptionSubject(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	UPDATE `subjects` SET `description`=new_descp WHERE `description`=old_descp;
END;

CREATE PROCEDURE getAllSubjects()
BEGIN
	SELECT * FROM `v_Subjects`;
END;

//

DELIMITER ;