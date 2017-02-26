use `iep`;

DROP PROCEDURE IF EXISTS getSubjectsByTeacher;

DROP PROCEDURE IF EXISTS addSpecialty;
DROP PROCEDURE IF EXISTS addGroup;
DROP PROCEDURE IF EXISTS addSubject;
DROP PROCEDURE IF EXISTS addStudent;
DROP PROCEDURE IF EXISTS addParent;
DROP PROCEDURE IF EXISTS addTeacher;

DROP PROCEDURE IF EXISTS assignParentStudent;
DROP PROCEDURE IF EXISTS assignTeacherSubject;

DELIMITER //


CREATE PROCEDURE getSubjectsByTeacher(emailTeacher char(30))
BEGIN
	SELECT DISTINCT `description` FROM `subjects` s INNER JOIN `teacher_subjects` ts WHERE `id_teacher`=(SELECT `id_teacher` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2) ORDER BY `description`;
END;


CREATE PROCEDURE addNews(n_caption char(255), n_content text, emailTeacher char(30), n_date date)
BEGIN
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, (SELECT `id_user` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2), n_date);
END;

CREATE PROCEDURE addSpecialty(code_spec CHAR(10), descp CHAR(255), pdf_file CHAR(255))
BEGIN
  INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE addGroup(descp CHAR(255), code_spec CHAR(10), is_budget BOOL)
BEGIN
  INSERT INTO `groups` (`code_spec`, `description`, `is_budget`) VALUES ((SELECT `id_spec` FROM `specialty` WHERE `code_spec`=code_spec), descp, is_budget);
END;

CREATE PROCEDURE addSubject(descp char(255))
BEGIN
	INSERT INTO `subjects` (`description`) VALUES (descp);
END;

CREATE PROCEDURE addStudent(fn char(30), sn char(30), pt char(30), s_email char(30), paswd char(30), ha char(255), cp char(30), s_grp char(10))
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


CREATE PROCEDURE assignParentStudent(emailParent CHAR(255), emailStudent CHAR(255), type_relation INT)
BEGIN
  INSERT INTO `parent_child` (`id_parent`, `id_children`, `id_type_relation`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=emailParent AND `id_type_user`=5), (SELECT `id_user` FROM `users` WHERE `email`=emailStudent AND `id_type_user`=4), type_relation);
END;

CREATE PROCEDURE assignTeacherSubject(emailTeacher char(30), t_subject char(255))
BEGIN
  INSERT INTO `teacher_subjects` (`id_teacher`, `id_subject`) VALUES ((SELECT `id_user` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2), (SELECT `id_subject` FROM `subjects` WHERE `description`=t_subject));
END;


//

DELIMITER ;