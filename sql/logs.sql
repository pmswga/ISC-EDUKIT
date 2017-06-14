USE `iep`;

DROP TABLE IF EXISTS `logs`;
DROP PROCEDURE IF EXISTS writeLog;
DROP PROCEDURE IF EXISTS readLog;
DROP PROCEDURE IF EXISTS compressLogs;
DROP PROCEDURE IF EXISTS clearLogs;

/*
	
	tbl:
		users
		admins
		teachers
		students
		parents
		
		typeUsers
		
		groups
		news
		specialty
		subjects
		
		student_traffic
		relations
	
		tests
		questions
		answers
		
*/

CREATE TABLE IF NOT EXISTS `logs` (
	id_log int AUTO_INCREMENT PRIMARY KEY,
	tbl char(255) NOT NULL,
	msg text NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS writeLog(tbl char(255), msg text)
BEGIN
	INSERT INTO `logs` (`tbl`, `msg`) VALUES (tbl, msg);
END;

CREATE PROCEDURE IF NOT EXISTS readLogs(tabl char(255))
BEGIN
	IF tabl = 'all' THEN 
		SELECT `id_log` as 'id', `tbl` as 'table', `msg` as 'message' FROM `logs` ORDER BY `msg`;
    ELSE
		SELECT `id_log` as 'id', `tbl` as 'table', `msg` as 'message' FROM `logs` WHERE `tbl`=tabl ORDER BY `msg`;
    END IF;
END;

CREATE PROCEDURE IF NOT EXISTS compressLogs()
BEGIN

END;

CREATE PROCEDURE IF NOT EXISTS clearLogs(tabl char(255))
BEGIN
	IF tabl = 'all' THEN 
		DELETE FROM `logs`;
    ELSE
		DELETE FROM `logs` WHERE `tbl`=tabl;
    END IF;
END;

//

DELIMITER ;
