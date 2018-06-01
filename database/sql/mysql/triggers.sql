use `iep`;

DROP TRIGGER IF EXISTS insUser;
DROP TRIGGER IF EXISTS insTypeUser;
DROP TRIGGER IF EXISTS insAdmin;
DROP TRIGGER IF EXISTS insStudents;
DROP TRIGGER IF EXISTS insGroup;
DROP TRIGGER IF EXISTS insSpecialty;
DROP TRIGGER IF EXISTS insParent;
DROP TRIGGER IF EXISTS insRelation;
DROP TRIGGER IF EXISTS insTeacher;
DROP TRIGGER IF EXISTS insNews;
DROP TRIGGER IF EXISTS insSubject;
DROP TRIGGER IF EXISTS insTest;
DROP TRIGGER IF EXISTS insQuestion;
DROP TRIGGER IF EXISTS insStudentTest;
DROP TRIGGER IF EXISTS insStudentAnswer;
DROP TRIGGER IF EXISTS insStudentTraffic;

DROP TRIGGER IF EXISTS uptRAnswer;

DELIMITER //

CREATE TRIGGER insUser BEFORE INSERT ON `users` FOR EACH ROW
BEGIN
	IF new.sn = '' OR
		new.fn = ''  OR
		new.email  = ''      OR
		new.passwd = ''
	THEN
		SIGNAL SQLSTATE '45000' SET 
			MESSAGE_TEXT = 'Field is empty';
	END IF;
END;


CREATE TRIGGER insTypeUser BEFORE INSERT ON `typeUser` FOR EACH ROW
BEGIN
	IF new.description = '' THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Field is empty';
	END IF;
END;

CREATE TRIGGER insAdmin BEFORE INSERT ON `admins` FOR EACH ROW
BEGIN
	IF new.sn = ''     OR
		new.fn = ''     OR
		new.pt = ''     OR
		new.email  = '' OR
		new.passwd = ''
	THEN
		SIGNAL SQLSTATE '45000' SET 
			MESSAGE_TEXT = 'Field is empty';
	END IF;
END;

CREATE TRIGGER insStudent BEFORE INSERT ON `students` FOR EACH ROW
BEGIN
	IF new.home_address = '' OR
		new.cell_phone = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insGroup BEFORE INSERT ON `groups` FOR EACH ROW
BEGIN
	IF new.description = '' OR
		new.edu_year = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insSpecialty BEFORE INSERT ON `specialty` FOR EACH ROW
BEGIN
	IF new.code_spec = ''   OR
		new.description = '' OR
		new.pdf_file = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insParent BEFORE INSERT ON `parents` FOR EACH ROW
BEGIN
	IF new.education = ''  OR
		new.work_place = '' OR
		new.post = ''       OR
		new.home_phone = '' OR
		new.cell_phone = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insRelation BEFORE INSERT ON `relations` FOR EACH ROW
BEGIN
	IF	new.description = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insTeacher BEFORE INSERT ON `teachers` FOR EACH ROW
BEGIN
	IF	new.info = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insNews BEFORE INSERT ON `news` FOR EACH ROW
BEGIN
	IF new.caption = '' OR
		new.content = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insSubject BEFORE INSERT ON `subjects` FOR EACH ROW
BEGIN
	IF new.description = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insTest BEFORE INSERT ON `tests` FOR EACH ROW
BEGIN
	IF new.caption = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insQuestion BEFORE INSERT ON `questions` FOR EACH ROW
BEGIN
	IF new.question = '' OR
		new.r_answer = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insAnswer BEFORE INSERT ON `answers` FOR EACH ROW
BEGIN
	IF new.answer = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insStudentTest BEFORE INSERT ON `student_tests` FOR EACH ROW
BEGIN
	IF new.subject = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insStudentAnswer BEFORE INSERT ON `student_answers` FOR EACH ROW
BEGIN
	IF new.question = '' OR
		new.answer = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER insStudentTraffic BEFORE INSERT ON `student_traffic` FOR EACH ROW
BEGIN
	IF
		(new.count_passed_hours < 0) OR
		(new.count_all_hours < 0)    
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Incorrect value';
	END IF;
END;




CREATE TRIGGER uptRAnswer AFTER UPDATE ON `questions` FOR EACH ROW
BEGIN
	UPDATE `answers` SET `answer`=new.r_answer WHERE `id_question`=new.id_question AND `answer`=old.r_answer;
END;





//

DELIMITER ;
