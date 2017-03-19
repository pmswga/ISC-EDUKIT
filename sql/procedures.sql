use `iep`;

/* Служебные */

DROP PROCEDURE IF EXISTS getTeacherID;
DROP PROCEDURE IF EXISTS getStudentID;
DROP PROCEDURE IF EXISTS getElderID;
DROP PROCEDURE IF EXISTS getParentID;
DROP PROCEDURE IF EXISTS getSubjectID;

DROP FUNCTION IF EXISTS getStudentId;
DROP FUNCTION IF EXISTS getElderId;
DROP FUNCTION IF EXISTS getParentId;

DROP FUNCTION IF EXISTS getTID;
DROP FUNCTION IF EXISTS getSID;


/* ----- */

DROP PROCEDURE IF EXISTS addStudent;
DROP PROCEDURE IF EXISTS addParent;
DROP PROCEDURE IF EXISTS addTeacher;
DROP PROCEDURE IF EXISTS removeStudent;
DROP PROCEDURE IF EXISTS removeParent;
DROP PROCEDURE IF EXISTS removeTeacher;
DROP PROCEDURE IF EXISTS grantElder;
DROP PROCEDURE IF EXISTS revokeElder;
DROP PROCEDURE IF EXISTS changeUserPassword;
DROP PROCEDURE IF EXISTS authentification;

DROP PROCEDURE IF EXISTS getTeacherInfo;
DROP PROCEDURE IF EXISTS getStudentInfo;
DROP PROCEDURE IF EXISTS getParentInfo;

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
DROP PROCEDURE IF EXISTS clearAllNews;

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
DROP PROCEDURE IF EXISTS getAllGroups;

DROP PROCEDURE IF EXISTS addSubject;
DROP PROCEDURE IF EXISTS removeSubject;
DROP PROCEDURE IF EXISTS changeDescriptionSubject;
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
DROP PROCEDURE IF EXISTS getSubjects;

DROP PROCEDURE IF EXISTS addTest;
DROP PROCEDURE IF EXISTS removeTest;
DROP PROCEDURE IF EXISTS changeCaptionTest;
DROP PROCEDURE IF EXISTS changeSubjectTest;
DROP PROCEDURE IF EXISTS setGroup;
DROP PROCEDURE IF EXISTS unsetGroup;
DROP PROCEDURE IF EXISTS getTestGroups;
DROP PROCEDURE IF EXISTS getTests;
DROP PROCEDURE IF EXISTS getAllTests;
DROP PROCEDURE IF EXISTS clearTest;
DROP PROCEDURE IF EXISTS addQuestion;
DROP PROCEDURE IF EXISTS addAnswer;
DROP PROCEDURE IF EXISTS removeQuestion;
DROP PROCEDURE IF EXISTS removeAnswer;
DROP PROCEDURE IF EXISTS changeCaptionQuestion;
DROP PROCEDURE IF EXISTS changeRAnswerQuestion;
DROP PROCEDURE IF EXISTS changeCaptionAnswer;
DROP PROCEDURE IF EXISTS getQuestions; /* Для конкретного теста */
DROP PROCEDURE IF EXISTS getAnswers; /* Для конкретного вопроса */

DROP PROCEDURE IF EXISTS putStudentAnswer;
DROP PROCEDURE IF EXISTS getStudentAnswers;


DELIMITER //

/* 
	
	[Служебные]
	
*/

/*
	
		1 - ADMIN
		2 - TEACHER
		3 - ELDER
		4 - STUDNET
		5 - PARENT
	
*/

CREATE PROCEDURE getParentID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=5;
END;

CREATE PROCEDURE getStudentID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=4;
END;

CREATE PROCEDURE getElderID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=3;
END;

CREATE PROCEDURE getTeacherID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=2;
END;

CREATE PROCEDURE getSubjectID(subject CHAR(30))
BEGIN
	SELECT `id_subject` FROM `subjects` WHERE `description`=subject;
END;

CREATE FUNCTION getStudentId (emailUser CHAR(30)) RETURNS INT
BEGIN
  DECLARE sid int;
  
  SELECT `id_user` INTO sid FROM `users` WHERE `email`=emailUser AND `id_type_user`=4;
  
  RETURN sid;
END;

CREATE FUNCTION getParentId (emailUser CHAR(30)) RETURNS INT
BEGIN
  DECLARE pid int;
  
  SELECT `id_user` INTO pid FROM `users` WHERE `email`=emailUser AND `id_type_user`=5;
  
  RETURN pid;
END;

CREATE FUNCTION getElderId (emailUser CHAR(30)) RETURNS INT
BEGIN
  DECLARE eid int;
  
  SELECT `id_user` INTO eid FROM `users` WHERE `email`=emailUser AND `id_type_user`=3;
  
  RETURN eid;
END;

CREATE FUNCTION getTID(emailTeacher char(30)) 
  RETURNS int
BEGIN
  DECLARE tid int;
  
  SELECT `id_user` INTO tid FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2;
  
  RETURN tid;
END;

CREATE FUNCTION getSID(subject char(255)) 
  RETURNS int
BEGIN
  DECLARE sid int;
  
	SELECT `id_subject` INTO sid FROM `subjects` WHERE `description`=subject;
  
  RETURN sid;
END;


/* 

	[UML Диаграмма - "Общее"]

*/

CREATE PROCEDURE addStudent(sn char(30), fn char(30), pt char(30), s_email char(30), paswd char(32), ha char(255), cp char(30), s_grp int)
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (sn, fn, pt, s_email, paswd, 4);
	INSERT INTO `students` (`id_student`, `home_address`, `cell_phone`, `grp`) VALUES (getStudentID(s_email), ha, cp, s_grp);
	COMMIT;
END;

CREATE PROCEDURE addParent(sn char(30), fn char(30), pt char(30), p_email char(30), paswd char(32), p_age int(11), p_education char(50), p_wp char(255), p_post char(255), hp char(30), cp char(30))
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`first_name`, `second_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (fn, sn, pt, p_email, paswd, 5);
	INSERT INTO `parents` (`id_parent`, `age`, `education`, `work_place`, `post`, `home_phone`, `cell_phone`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=p_email), p_age, p_education, p_wp, p_post, hp, cp);
	COMMIT;
END;

CREATE PROCEDURE addTeacher(sn char(30), fn char(30), pt char(32), t_email char(30), paswd char(32), info text)
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`first_name`, `second_name`, `patronymic`, `email`, `password`, `id_type_user`) VALUES (fn, sn, pt, t_email, paswd, 2);
	INSERT INTO `teachers` (`id_teacher`, `info`) VALUES (getTID(t_email), info);
	COMMIT;
END;

CREATE PROCEDURE removeStudent(s_email char(30))
BEGIN
	DELETE FROM `users` WHERE `email`=s_email AND `id_type_user`=4;
END;

CREATE PROCEDURE removeTeacher(t_email char(30))
BEGIN
	DELETE FROM `users` WHERE `email`=t_email AND `id_type_user`=2;
END;

CREATE PROCEDURE removeParent(p_email char(30))
BEGIN
	DELETE FROM `users` WHERE `email`=p_email AND `id_type_user`=5;
END;

CREATE PROCEDURE grantElder(s_email char(30))
BEGIN
	UPDATE `users` u SET u.id_type_user=3
	WHERE u.email=s_email AND u.id_type_user=4;
END;

CREATE PROCEDURE revokeElder(s_email char(30))
BEGIN
	UPDATE `users` u SET u.id_type_user=4
	WHERE u.email=s_email AND u.id_type_user=3;
END;

CREATE PROCEDURE changeUserPassword(u_email char(30), old_paswd char(32), new_paswd char(32))
BEGIN
	UPDATE `users` SET `password`=new_paswd
	WHERE `email`=u_email AND `password`=old_paswd;
END;

CREATE PROCEDURE authentification(u_email char(30), u_paswd char(32))
BEGIN
	SELECT * FROM `users` WHERE `email`=u_email AND `password`=u_paswd;
END;

CREATE PROCEDURE getTeacherInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Teachers` WHERE `email`=emailUser;
END;

CREATE PROCEDURE getStudentInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Students` WHERE `email`=emailUser;
END;

CREATE PROCEDURE getParentInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Parents` WHERE `email`=emailUser;
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
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, (SELECT `id_user` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2), n_date);
END;


CREATE PROCEDURE removeNews(id_news INT)
BEGIN
	DELETE n FROM `news` n
    INNER JOIN `users` u ON n.id_author=u.id_user
  WHERE n.id_news=id_news;
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

CREATE PROCEDURE clearAllNews()
BEGIN
	DELETE FROM `news`;
END;

/* Работа со специальностями */

/* Для получение специальностей, нужно использовать представление `v_Specialtyes`  */

CREATE PROCEDURE addSpecialty(code_spec CHAR(10), descp CHAR(255), pdf_file CHAR(255))
BEGIN
	INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE removeSpecialty(s_code_spec CHAR(255))
BEGIN
	DELETE FROM `specialty` WHERE `code_spec`=s_code_spec;
END;

CREATE PROCEDURE changeCodeSpecialty(old_code_spec CHAR(255), new_code_spec CHAR(255))
BEGIN
	UPDATE `specialty` SET `code_spec`=new_code_spec WHERE `code_spec`=old_code_spec;
END;

CREATE PROCEDURE changeDescriptionSpecialty(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	UPDATE `specialty` SET `description`=new_descp WHERE `description`=old_descp;
END;

CREATE PROCEDURE changePDFFileSpecialty(old_pdf_file CHAR(255), new_pdf_file CHAR(255))
BEGIN
	UPDATE `specialty` SET `pdf_file`=new_pdf_file WHERE `pdf_file`=old_pdf_file;
END;


CREATE PROCEDURE getAllSpecialty()
BEGIN
	SELECT * FROM `v_Specialtyes` ORDER BY `descp`;
END;


/* Работа с посещаемостью */

/* Для получение посещаемости, нужно использовать представление `v_Traffic`  */

CREATE PROCEDURE addTrafficEntry(student_email CHAR(30), date_visit date, cph int, cah int)
BEGIN
	INSERT INTO `student_traffic` (`id_student`, `date_visit`, `count_passed_hours`, `count_all_hours`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=student_email), date_visit, cph, cah);
END;

CREATE PROCEDURE clearTrafficStudent(student_email CHAR(30))
BEGIN
	DELETE st FROM `student_traffic` st
		INNER JOIN `users` u ON st.id_student=u.id_user
	WHERE u.email=student_email;
END;

CREATE PROCEDURE clearAllTraffic()
BEGIN
	DELETE FROM `student_traffic`;
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
	INSERT INTO `groups` (`code_spec`, `description`, `is_budget`) VALUES ((SELECT `id_spec` FROM `specialty` WHERE `code_spec`=code_spec), descp, is_budget);
END;

CREATE PROCEDURE removeGroup(id_grp INT)
BEGIN
	DELETE FROM `groups` WHERE `grp`=id_grp;
END;

CREATE PROCEDURE changeDescriptionGroup(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	UPDATE `groups` SET `description`=new_descp WHERE `description`=old_descp;
END;

CREATE PROCEDURE changeSpecGroup(old_spec CHAR(255), new_spec CHAR(255))
BEGIN
	
END;

CREATE PROCEDURE upCourse()
BEGIN

END;

CREATE PROCEDURE getAllGroups()
BEGIN
  SELECT * FROM `v_Groups`;
END;


/* Работа с предметами */

/* Для получения предметов, нужно использовать представление `v_Subjects` */

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


/* Работа с отношениями между родителем и ребёнком */

CREATE PROCEDURE addRelation(descp CHAR(255))
BEGIN
	INSERT INTO `relations` (`description`) VALUES (descp);
END;

CREATE PROCEDURE removeRelation(descp CHAR(255))
BEGIN
	DELETE FROM `relations` WHERE `description`=descp;
END;


CREATE PROCEDURE getAllRelations()
BEGIN
	SELECT * FROM `v_Relations`;
END;


/* Работа с детьми */

CREATE PROCEDURE setChild(emailParent CHAR(30), emailStudent CHAR(30), type_relation INT)
BEGIN
  INSERT INTO `parent_child` (`id_parent`, `id_children`, `id_type_relation`) VALUES (getParentID(emailParent), getStudentID(emailStudent), type_relation);
END;

CREATE PROCEDURE unsetChild(emailParent CHAR(30), emailStudent CHAR(30))
BEGIN
	DELETE FROM `parent_child` WHERE `id_parent`=getParentID(emailParent) AND `id_children`=getStudentID(emailStudent);
END;

CREATE PROCEDURE changeRelation(emailParent CHAR(30), emailStudent CHAR(30), new_id_relation INT)
BEGIN
	UPDATE `parent_child`
	SET `id_type_relation`=new_id_relation
	WHERE `id_parent`=getParentID(emailParent) AND `id_children`=getStudentID(emailStudent);
END;

CREATE PROCEDURE getChilds(emailParent char(30))
BEGIN
	SELECT u.second_name, u.first_name, u.patronymic, u.email, s.home_address, s.cell_phone, g.description as 'group', sp.description as 'specialty', r.description as 'relation'
	FROM `parent_child` pc
		INNER JOIN `users` u ON pc.id_children=u.id_user
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
		INNER JOIN `specialty` sp ON g.code_spec=sp.id_spec
		INNER JOIN `relations` r ON pc.id_type_relation=r.id_relation
	WHERE pc.id_parent=getParentID(emailParent)
	ORDER BY u.first_name, u.second_name, u.patronymic;
END;


/* Работа с предметами для преподавателя */

CREATE PROCEDURE setSubject(emailTeacher char(30), t_subject char(255))
BEGIN
  INSERT INTO `teacher_subjects` (`id_teacher`, `id_subject`) VALUES (getTID(emailTeacher), getSID(t_subject));
END;

CREATE PROCEDURE unsetSubject(emailTeacher char(30), t_subject char(255))
BEGIN
	DELETE FROM `teacher_subjects` WHERE `id_teacher`=getTeacherID(emailTeacher) AND `id_subject`=getSubjectID(t_subject);
END;

CREATE PROCEDURE getSubjects(s_teacher_email char(30)) /* Для отображения предметов в его аккаунте  */
BEGIN
  SELECT DISTINCT `description` 
	FROM `subjects` s 
		INNER JOIN `teacher_subjects` ts ON s.id_subject=ts.id_subject
	WHERE ts.id_teacher=getTID(s_teacher_email)
	ORDER BY `description`;
END;


/* Работа с тестами */

CREATE PROCEDURE addTest(emailTeacher char(30), subject char(30), test_caption char(30))
BEGIN
  INSERT INTO `tests` (`id_teacher`, `id_subject`, `caption`) VALUES (getTID(emailTeacher), getSID(subject), test_caption);
END;

CREATE PROCEDURE removeTest(test_id int)
BEGIN
  DELETE FROM `tests` WHERE `id_test`=test_id;
END;

CREATE PROCEDURE changeCaptionTest(test_id int, test_caption char(255))
BEGIN
  UPDATE `tests` SET `caption`=test_caption
  WHERE `id_test`=test_id;
END;

CREATE PROCEDURE changeSubjectTest(test_id int, subject char(255))
BEGIN
  UPDATE `tests` SET `id_subject`=getSubjectID(subject);
END;

CREATE PROCEDURE setGroup(test_id int, test_grp int)
BEGIN
  INSERT INTO `groups_tests` (`id_test`, `id_group`) VALUES (test_id, test_grp);
END;

CREATE PROCEDURE unsetGroup(test_id int, test_grp int)
BEGIN
  DELETE FROM `groups_tests` WHERE `id_test`=test_id AND `id_group`=test_grp;
END;

CREATE PROCEDURE getTestGroups(test_id int)
BEGIN
  SELECT g.grp as id_group, g.description as grp, s.description as spec
  FROM `groups_tests` g_t
    INNER JOIN `groups` g ON g.grp=g_t.id_group
    INNER JOIN `specialty` s ON g.code_spec=s.id_spec
  WHERE g_t.id_test=test_id
  ORDER BY g.grp;
END;

CREATE PROCEDURE getTests(emailTeacher char(30))
BEGIN
  SELECT * FROM `v_Tests` WHERE `email`=emailTeacher;
END;

CREATE PROCEDURE getAllTests()
BEGIN
  SELECT * FROM `v_Tests`;
END;

CREATE PROCEDURE clearTest(test_id int)
BEGIN
  DELETE FROM `questions` WHERE `id_test`=test_id;
END;

CREATE PROCEDURE addQuestion(test_id int, test_question char(255), test_r_answer char(255))
BEGIN
  INSERT INTO `questions` (`id_test`, `question`, `r_answer`) VALUES (test_id, test_question, test_r_answer);
END;

CREATE PROCEDURE addAnswer(question_id int, answ char(255))
BEGIN
  INSERT INTO `answers` (`id_question`, `answer`) VALUES (question_id, answ);
END;

CREATE PROCEDURE removeQuestion(question_id int)
BEGIN
  DELETE FROM `questions` WHERE `id_question`=question_id;
END;

CREATE PROCEDURE removeAnswer(answer_id int)
BEGIN
  DELETE FROM `answers` WHERE `id_answer`=answer_id;
END;

CREATE PROCEDURE changeCaptionQuestion(question_id int, new_quest char(255))
BEGIN
  UPDATE `questions` SET `question`=new_quest;
END;

CREATE PROCEDURE changeRAnswerQuestion(question_id int, new_r_answer char(255))
BEGIN
  UPDATE `questions` SET `r_answer`=new_r_answer WHERE `id_question`=question_id;
END;

CREATE PROCEDURE changeCaptionAnswer(answer_id int, new_answ char(255))
BEGIN
  UPDATE `answers` SET `answer`=new_answ WHERE `id_answer`=answer_id;
END;

CREATE PROCEDURE getQuestions(test_id int)
BEGIN
  SELECT `id_question`, `question`, `r_answer` FROM `questions` WHERE `id_test`=test_id ORDER BY `id_question`;
END;

CREATE PROCEDURE getAnswers(test_id int, question_id int)
BEGIN
  SELECT a.id_answer, a.answer
  FROM `answers` a
    INNER JOIN `questions` q ON q.id_question=a.id_question
  WHERE q.id_test=test_id AND a.id_question=question_id
  ORDER BY a.id_answer;
END;

CREATE PROCEDURE putStudentAnswer(student_id int, test_id int, question_id int, answ char(255))
BEGIN
  INSERT INTO `student_answer` (`id_student`, `id_student_test`, `id_question`, `answer`) VALUES (student_id, test_id, question_id, answ);
END;

CREATE PROCEDURE getStudentAnswers(student_id int)
BEGIN
  SELECT CONCAT(u.second_name, ' ', LEFT(u.first_name, 1), '. ', LEFT(u.patronymic, 1), '.'), t.caption, q.question
  FROM `student_tests` s_t
    INNER JOIN `users` u ON s_t.id_student=u.id_user
    INNER JOIN `tests` t ON s_t.id_student_test=t.id_test
    INNER JOIN `questions` q ON s_t.id_question=q.id_question
  WHERE s_t.id_student=student_id;
END;

/* ---------------------------------------------------------------------------------- */

//

DELIMITER ;