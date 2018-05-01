use `iep`;

DROP PROCEDURE IF EXISTS addTrafficEntry;
DROP PROCEDURE IF EXISTS clearTrafficStudent;
DROP PROCEDURE IF EXISTS clearAllTraffic;
DROP PROCEDURE IF EXISTS getTrafficStudent;
DROP PROCEDURE IF EXISTS getAllTraffic;

DELIMITER //

CREATE PROCEDURE addTrafficEntry(student_email char(30), date_visit date, cph int, cah int)
BEGIN
	INSERT INTO `student_traffic` (`id_student`, `date_visit`, `count_passed_hours`, `count_all_hours`) VALUES (getUserId(student_email), date_visit, cph, cah);
END;

CREATE PROCEDURE clearTrafficStudent(student_email char(30))
BEGIN
	DELETE st FROM `student_traffic` st
		INNER JOIN `users` u ON st.id_student=u.id_user
	WHERE u.email=student_email;
END;

CREATE PROCEDURE clearAllTraffic()
BEGIN
	DELETE FROM `student_traffic`;
END;

CREATE PROCEDURE getTrafficStudent(t_student_email char(30))
BEGIN
	SELECT * 
    FROM `student_traffic`
    WHERE `id_student`=getUserId(t_student_email)
    ORDER BY `date_visit`;
END;

CREATE PROCEDURE getAllTraffic()
BEGIN
	SELECT * FROM `v_Traffic`;
END;

//

DELIMITER ;