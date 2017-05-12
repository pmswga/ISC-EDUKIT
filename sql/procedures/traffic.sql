use `iep`;

DROP PROCEDURE IF EXISTS addTrafficEntry;
DROP PROCEDURE IF EXISTS clearTrafficStudent;
DROP PROCEDURE IF EXISTS clearAllTraffic;
DROP PROCEDURE IF EXISTS getTrafficStudent;
DROP PROCEDURE IF EXISTS getAllTraffic;
DROP PROCEDURE IF EXISTS ifTrafficNotCommited;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS addTrafficEntry(student_email char(30), date_visit date, cph int, cah int)
BEGIN
	INSERT INTO `student_traffic` (`id_student`, `date_visit`, `count_passed_hours`, `count_all_hours`) VALUES (getUserId(student_email), date_visit, cph, cah);
END;

CREATE PROCEDURE IF NOT EXISTS clearTrafficStudent(student_email char(30))
BEGIN
	DELETE st FROM `student_traffic` st
		INNER JOIN `users` u ON st.id_student=u.id_user
	WHERE u.email=student_email;
END;

CREATE PROCEDURE IF NOT EXISTS clearAllTraffic()
BEGIN
	DELETE FROM `student_traffic`;
END;

CREATE PROCEDURE IF NOT EXISTS getTrafficStudent(t_student_email char(30))
BEGIN
	SELECT * FROM `student_traffic` WHERE `id_student`=getUserId(t_student_email);
END;

CREATE PROCEDURE IF NOT EXISTS getAllTraffic()
BEGIN
	SELECT * FROM `v_Traffic`;
END;

CREATE PROCEDURE IF NOT EXISTS ifTrafficNotCommited(traffic_date date)
BEGIN
	
END;

//

DELIMITER ;