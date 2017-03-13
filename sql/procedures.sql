use `iep`;


DROP PROCEDURE IF EXISTS addStudent;
DROP PROCEDURE IF EXISTS addParent;
DROP PROCEDURE IF EXISTS addTeacher;
DROP PROCEDURE IF EXISTS removeStudent;
DROP PROCEDURE IF EXISTS removeParent;
DROP PROCEDURE IF EXISTS removeTeacher;
DROP PROCEDURE IF EXISTS grantElder;
DROP PROCEDURE IF EXISTS revokeElder;
DROP PROCEDURE IF EXISTS changeUserPassword;
DROP PROCEDURE IF EXISTS authentication;
DROP PROCEDURE IF EXISTS getAllUsers;
DROP PROCEDURE IF EXISTS getAllStudents;
DROP PROCEDURE IF EXISTS getAllElders;
DROP PROCEDURE IF EXISTS getAllParents;
DROP PROCEDURE IF EXISTS getAllTeachers;


DROP PROCEDURE IF EXISTS addNews;
DROP PROCEDURE IF EXISTS removeNews;
DROP PROCEDURE IF EXISTS changeNews;
DROP PROCEDURE IF EXISTS getNews;
DROP PROCEDURE IF EXISTS getAllNews;

DROP PROCEDURE IF EXISTS addSpecialty;
DROP PROCEDURE IF EXISTS removeSpecialty;
DROP PROCEDURE IF EXISTS changeCodeSpecialty;
DROP PROCEDURE IF EXISTS changeDescriptionSpecialty;
DROP PROCEDURE IF EXISTS changePDFFileSpecialty;
DROP PROCEDURE IF EXISTS getAllSpecialty;

DROP PROCEDURE IF EXISTS addTrafficEntry;
DROP PROCEDURE IF EXISTS clearTrafficStudent;
DROP PROCEDURE IF EXISTS clearAllTraffic;
DROP PROCEDURE IF EXISTS getTrafficStudent;
DROP PROCEDURE IF EXISTS getAllTraffic;

DROP PROCEDURE IF EXISTS addGroup;
DROP PROCEDURE IF EXISTS removeGroup;
DROP PROCEDURE IF EXISTS changeDescriptionGroup;
DROP PROCEDURE IF EXISTS changeSpecGroup;
DROP PROCEDURE IF EXISTS upCourse;

DROP PROCEDURE IF EXISTS addSubject;
DROP PROCEDURE IF EXISTS removeSubject;
DROP PROCEDURE IF EXISTS changeDescriptionSubject;
DROP PROCEDURE IF EXISTS getSubjects;
DROP PROCEDURE IF EXISTS getAllSubjects;

DROP PROCEDURE IF EXISTS addRelation;
DROP PROCEDURE IF EXISTS removeRelation;
DROP PROCEDURE IF EXISTS getAllRelations;

DROP PROCEDURE IF EXISTS setChild;
DROP PROCEDURE IF EXISTS unsetChild;
DROP PROCEDURE IF EXISTS changeRelation;
DROP PROCEDURE IF EXISTS getChilds;

DROP PROCEDURE IF EXISTS setSubject;
DROP PROCEDURE IF EXISTS unsetSubject;

DROP PROCEDURE IF EXISTS addTest;
DROP PROCEDURE IF EXISTS removeTest;
DROP PROCEDURE IF EXISTS changeCaptionTest;
DROP PROCEDURE IF EXISTS changeSubjectTest;
DROP PROCEDURE IF EXISTS getTests;
DROP PROCEDURE IF EXISTS getAllTests;
DROP PROCEDURE IF EXISTS addQuestion;
DROP PROCEDURE IF EXISTS addAnswer;
DROP PROCEDURE IF EXISTS removeQuestion;
DROP PROCEDURE IF EXISTS removeAnswer;
DROP PROCEDURE IF EXISTS changeQuestion;
DROP PROCEDURE IF EXISTS changeRAnswer;
DROP PROCEDURE IF EXISTS cahngeAnswer;
DROP PROCEDURE IF EXISTS getQuestions; /* Для конкретного теста */
DROP PROCEDURE IF EXISTS getAnswers; /* Для конкретного вопроса */

DROP PROCEDURE IF EXISTS putStudentAnswers;
DROP PROCEDURE IF EXISTS getStudentAnswers;


DELIMITER //

/* 

	[UML Диаграмма - "Общее"]

*/

CREATE PROCEDURE addStudent(sn char(30), fn char(30), pt char(30), s_email char(30), paswd char(30), ha char(255), cp char(30), s_grp char(10))
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`first_name`, `second_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (fn, sn, pt, s_email, paswd, 4);
	INSERT INTO `students` (`id_student`, `home_address`, `cell_phone`, `grp`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=s_email), ha, cp, (SELECT `grp` FROM `groups` WHERE `description`=s_grp));
	COMMIT;
END;

CREATE PROCEDURE addParent(fn char(30), sn char(30), pt char(30), p_email char(30), paswd char(30), p_age smallint, p_education char(50), p_wp char(255), p_post char(255), hp char(30), cp char(30))
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`first_name`, `second_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (fn, sn, pt, p_email, paswd, 5);
	INSERT INTO `parents` (`id_parent`, `age`, `education`, `work_place`, `post`, `home_phone`, `cell_phone`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=p_email), p_age, p_education, p_wp, p_post, hp, cp);
	COMMIT;
END;

CREATE PROCEDURE addTeacher(fn char(30), sn char(30), pt char(30), t_email char(30), paswd char(30), info text)
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`first_name`, `second_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (fn, sn, pt, t_email, paswd, 2);
	INSERT INTO `teachers` (`id_teacher`, `info`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=t_email), info);
	COMMIT;
END;

CREATE PROCEDURE removeStudent(s_email char(30))
BEGIN
	START TRANSACTION;
	DELETE FROM `users` WHERE `email`=s_email AND `id_type_user`=4;
	COMMIT;
END;

CREATE PROCEDURE removeTeacher(t_email char(30))
BEGIN
	START TRANSACTION;
	DELETE FROM `users` WHERE `email`=t_email AND `id_type_user`=2;
	COMMIT;
END;

CREATE PROCEDURE removeParent(p_email char(30))
BEGIN
	START TRANSACTION;
	DELETE FROM `users` WHERE `email`=p_email AND `id_type_user`=5;
	COMMIT;
END;

CREATE PROCEDURE grantElder(s_email char(30))
BEGIN
	START TRANSACTION;
	UPDATE `users` u SET u.id_type_user=3
	WHERE u.email=s_email AND u.id_type_user=4;
	COMMIT;
END;

CREATE PROCEDURE revokeElder(s_email char(30))
BEGIN
	START TRANSACTION;
	UPDATE `users` u SET u.id_type_user=4
	WHERE u.email=s_email AND u.id_type_user=3;
	COMMIT;
END;

CREATE PROCEDURE changeUserPassword(u_email char(30), old_paswd char(32), new_paswd char(32))
BEGIN
	START TRANSACTION;
	UPDATE `users` SET `password`=new_paswd
	WHERE `email`=u_email AND `password`=old_paswd;
	COMMIT;
END;

CREATE PROCEDURE authentication(email char(30), paswd char(32))
BEGIN
	SELECT * FROM `v_Users` WHERE `email`=email AND `paswd`=paswd;
END;

CREATE PROCEDURE getAllUsers()
BEGIN
	SELECT * FROM `v_Users`;
END;

CREATE PROCEDURE getAllStudents()
BEGIN
	SELECT * FROM `v_Students`;
END;

CREATE PROCEDURE getAllElders()
BEGIN
	SELECT * FROM `v_Elders`;
END;

CREATE PROCEDURE getAllParents()
BEGIN
	SELECT * FROM `v_Parents`;
END;

CREATE PROCEDURE getAllTeachers()
BEGIN
	SELECT * FROM `v_Teachers`;
END;

/* ---------------------------------------------------------------------------------- */

/* 

	[UML Диаграмма - "Панель администратора"]

*/

/* Работа с новостями */

/* Для получения новостей, нужно использовать представление `v_News` */

CREATE PROCEDURE addNews(n_caption char(255), n_content text, emailTeacher char(30), n_date date)
BEGIN
	START TRANSACTION;
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, (SELECT `id_user` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2), n_date);
	COMMIT;
END;


CREATE PROCEDURE removeNews(id_news INT, n_author_email CHAR(255))
BEGIN
  START TRANSACTION;
	DELETE n FROM `news` n
    INNER JOIN `users` u ON n.id_author=u.id_user
  WHERE n.id_news=id_news AND u.email=n_author_email;
  COMMIT;
END;

/*

	 Думаю, надо разбить функцию changeNews на 
	 	changeCaptionNews(id_news, author)
	 	changeContentNews(id_news, author)

*/

CREATE PROCEDURE changeNews(n_author_email CHAR(30), old_caption CHAR(255), new_caption CHAR(255), old_content CHAR(255), new_content TEXT)
BEGIN
	UPDATE `news` n 
		INNER JOIN `users` u ON n.id_author=u.id_user 
	SET n.caption=new_caption, n.content=new_content	
	WHERE n.caption=old_caption OR n.content=old_content;
END;

CREATE PROCEDURE getNews(n_author_email CHAR(30)) /* Для вывода новостей в его аккаунте */
BEGIN
	SELECT * FROM `v_news` WHERE `email`=n_author_email;
END;

CREATE PROCEDURE getAllNews() /* Для вывода в панели администратора */
BEGIN
	SELECT * FROM `v_news`;
END;

/* Работа со специальностями */

/* Для получение специальностей, нужно использовать представление `v_Specialtyes`  */

CREATE PROCEDURE addSpecialty(code_spec CHAR(10), descp CHAR(255), pdf_file CHAR(255))
BEGIN
	START TRANSACTION;
	INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
	COMMIT;
END;

CREATE PROCEDURE removeSpecialty(s_code_spec CHAR(255))
BEGIN
	START TRANSACTION;
	DELETE FROM `specialty` WHERE `code_spec`=s_code_spec;
	COMMIT;
END;

CREATE PROCEDURE changeCodeSpecialty(old_code_spec CHAR(255), new_code_spec CHAR(255))
BEGIN
	START TRANSACTION;
	UPDATE `specialty` SET `code_spec`=new_code_spec WHERE `code_spec`=old_code_spec;
	COMMIT;
END;

CREATE PROCEDURE changeDescriptionSpecialty(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	START TRANSACTION;
	UPDATE `specialty` SET `description`=new_descp WHERE `description`=old_descp;
	COMMIT;
END;

CREATE PROCEDURE changePDFFileSpecialty(old_pdf_file CHAR(255), new_pdf_file CHAR(255))
BEGIN
	START TRANSACTION;
	UPDATE `specialty` SET `pdf_file`=new_pdf_file WHERE `pdf_file`=old_pdf_file;
	COMMIT;
END;


CREATE PROCEDURE getAllSpecialty()
BEGIN
	SELECT * FROM `v_Specialtyes` ORDER BY `descp`;
END;


/* Работа с посещаемостью */

/* Для получение посещаемости, нужно использовать представление `v_Traffic`  */

CREATE PROCEDURE addTrafficEntry(student_email CHAR(30), date_visit date, cph int, cah int)
BEGIN
	START TRANSACTION;
	INSERT INTO `student_traffic` (`id_student`, `date_visit`, `count_passed_hours`, `count_all_hours`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=student_email), date_visit, cph, cah);
	COMMIT;
END;

CREATE PROCEDURE clearTrafficStudent(student_email CHAR(30))
BEGIN
	START TRANSACTION;
	DELETE st FROM `student_traffic` st
		INNER JOIN `users` u ON st.id_student=u.id_user
	WHERE u.email=student_email;
	COMMIT;
END;

CREATE PROCEDURE clearAllTraffic()
BEGIN
	START TRANSACTION;
	DELETE FROM `student_traffic`;
	COMMIT;
END;

CREATE PROCEDURE getTrafficStudent(t_student_email CHAR(30))
BEGIN
	SELECT * FROM `v_Traffic` WHERE `email`=t_student_email;
END;

CREATE PROCEDURE getAllTraffic()
BEGIN
	SELECT * FROM `v_Traffic`;
END;



/* Работа с группами */

/* Для получение специальностей, нужно использовать представление `v_Groups`  */

CREATE PROCEDURE addGroup(descp CHAR(255), code_spec CHAR(10), is_budget BOOL)
BEGIN
	START TRANSACTION;
	INSERT INTO `groups` (`code_spec`, `description`, `is_budget`) VALUES ((SELECT `id_spec` FROM `specialty` WHERE `code_spec`=code_spec), descp, is_budget);
	COMMIT;
END;

CREATE PROCEDURE removeGroup(descp CHAR(255))
BEGIN
	START TRANSACTION;
	DELETE FROM `groups`;
	COMMIT;
END;

CREATE PROCEDURE changeDescriptionGroup(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	START TRANSACTION;
	UPDATE `groups` SET `description`=new_descp WHERE `description`=old_descp;
	COMMIT;
END;

CREATE PROCEDURE changeSpecGroup(old_spec CHAR(255), new_spec CHAR(255))
BEGIN
	
END;

CREATE PROCEDURE upCourse()
BEGIN

END;

/* Работа с предметами */

/* Для получения предметов, нужно использовать представление `v_Subjects` */

CREATE PROCEDURE addSubject(descp CHAR(255))
BEGIN
	START TRANSACTION;
	INSERT INTO `subjects` (`description`) VALUES (descp);
	COMMIT;
END;

CREATE PROCEDURE removeSubject(descp CHAR(255))
BEGIN
	START TRANSACTION;
	DELETE FROM `subjects` WHERE `description`=descp;
	COMMIT;
END;

CREATE PROCEDURE changeDescriptionSubject(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	START TRANSACTION;
	UPDATE `subjects` SET `description`=new_descp WHERE `description`=old_descp;
	COMMIT;
END;

CREATE PROCEDURE getSubjects(s_teacher_email char(30)) /* Для отображения предметов в его аккаунте  */
BEGIN
	SELECT DISTINCT `description` 
	FROM `subjects` s 
		INNER JOIN `teacher_subjects` ts ON s.id_subject=ts.id_subject
		INNER JOIN `users` u ON ts.id_teacher=u.id_user
	WHERE u.email=s_teacher_email AND u.id_type_user=4
	ORDER BY `description`;
END;

CREATE PROCEDURE getAllSubjects()
BEGIN
	SELECT * FROM `v_Subjects`;
END;


/* Работа с отношениями между родителем и ребёнком */

CREATE PROCEDURE addRelation(descp CHAR(255))
BEGIN
	START TRANSACTION;
	INSERT INTO `relations` (`description`) VALUES (descp);
	COMMIT;
END;

CREATE PROCEDURE removeRelation(descp CHAR(255))
BEGIN
	START TRANSACTION;
	DELETE FROM `relations` WHERE `description`=descp;
	COMMIT;
END;


CREATE PROCEDURE getAllRelations()
BEGIN
	SELECT * FROM `v_Relations`;
END;






CREATE PROCEDURE setChild(emailParent CHAR(30), emailStudent CHAR(30), type_relation INT)
BEGIN
	START TRANSACTION;
  	INSERT INTO `parent_child` (`id_parent`, `id_children`, `id_type_relation`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=emailParent AND `id_type_user`=5), (SELECT `id_user` FROM `users` WHERE `email`=emailStudent AND `id_type_user`=4), type_relation);
  	COMMIT;
END;


CREATE PROCEDURE getChilds(emailParent char(30))
BEGIN
	SELECT u.second_name, u.first_name, u.patronymic, u.email, s.home_address, s.cell_phone, g.description as 'group', sp.description as 'specialty'
	FROM `parent_child` pc
		INNER JOIN `users` u ON pc.id_children=u.id_user
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
		INNER JOIN `specialty` sp ON g.code_spec=sp.id_spec
	WHERE pc.id_parent=(SELECT `id_user` FROM `users` WHERE `email`=emailParent)
	ORDER BY u.first_name, u.second_name, u.patronymic;
END;









CREATE PROCEDURE setSubject(emailTeacher char(30), t_subject char(255))
BEGIN
	START TRANSACTION;
  	INSERT INTO `teacher_subjects` (`id_teacher`, `id_subject`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2), (SELECT `id_subject` FROM `subjects` WHERE `description`=t_subject));
  	COMMIT;
END;



/* ---------------------------------------------------------------------------------- */

//

DELIMITER ;