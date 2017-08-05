
/*----------------[tables.sql]----------------*/

DROP DATABASE IF EXISTS `iep`;
CREATE DATABASE IF NOT EXISTS `iep` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `iep`;

/* Создание таблицы "Пользователи" */
CREATE TABLE IF NOT EXISTS `users` (
	id_user int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	sn char(30) NOT NULL,
	fn char(30) NOT NULL,
	pt char(30) NOT NULL,
	email char(255) NOT NULL UNIQUE,
	passwd char(32) NOT NULL,
	id_type_user int NOT NULL,
	INDEX (id_type_user),
	CONSTRAINT uc_sn CHECK(second_name <> ''),
	CONSTRAINT uc_fn CHECK(first_name <> ''),
	CONSTRAINT uc_pt CHECK(patronymic <> ''),
	CONSTRAINT uc_email CHECK(email <> ''),
	CONSTRAINT uc_password CHECK(password <> '')
) ENGINE = InnoDB	 CHARACTER SET = UTF8;

/*
	
	Создание таблицы `typeUser`
	
	И добавление следующих типов пользователей:
		1 - TEACHER
		2 - ELDER
		3 - STUDNET
		4 - PARENT
	
*/
CREATE TABLE IF NOT EXISTS `typeUser` (
	id_type_user int AUTO_INCREMENT PRIMARY KEY,
	description char(30) NOT NULL UNIQUE,
	CONSTRAINT tuc_desc CHECK(description <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `typeUser` (`description`) VALUES ('TEACHER');
INSERT INTO `typeUser` (`description`) VALUES ('ELDER');
INSERT INTO `typeUser` (`description`) VALUES ('STUDENT');
INSERT INTO `typeUser` (`description`) VALUES ('PARENT');

/* Создание таблицы "Администраторы" */
CREATE TABLE IF NOT EXISTS `admins` (
	id_admin int AUTO_INCREMENT PRIMARY KEY,
	sn char(30) NOT NULL,
	fn char(30) NOT NULL,
	pt char(30) NOT NULL,
	email char(30) UNIQUE,
	passwd char(32) NOT NULL,
	CONSTRAINT ac_sn CHECK (sn <> ''),
	CONSTRAINT ac_fn CHECK (fn <> ''),
	CONSTRAINT ac_pt CHECK (pt <> ''),
	CONSTRAINT ac_email CHECK (email <> ''),
	CONSTRAINT ac_passwd CHECK (passwd <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Студенты" */
CREATE TABLE IF NOT EXISTS `students` (
	id_student int PRIMARY KEY,
	home_address char(255) NOT NULL,
	cell_phone char(12) NOT NULL,
	grp int NOT NULL,
	INDEX (grp),
	CONSTRAINT sc_ha CHECK(home_address <> ''),
	CONSTRAINT sc_cp CHECK(cell_phone <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Группы" */
CREATE TABLE IF NOT EXISTS `groups` (
	grp int AUTO_INCREMENT PRIMARY KEY,
	description char(10) NOT NULL,
	edu_year char(10) NOT NULL,
	spec_id int NOT NULL,
	is_budget int NOT NULL,
	INDEX (spec_id),
	CONSTRAINT gc_desc CHECK(description <> ''),
	CONSTRAINT gc_year CHECK(edu_year <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Специальности" */
CREATE TABLE IF NOT EXISTS `specialty` (
	id_spec int AUTO_INCREMENT PRIMARY KEY,
	code_spec char(10) NOT NULL UNIQUE,
	description char(255) NOT NULL,
	pdf_file char(255) NOT NULL,
	CONSTRAINT sc_cs CHECK(code_spec <> ''),
	CONSTRAINT sc_desc CHECK(description <> ''),
	CONSTRAINT sc_file CHECK(pdf_file <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родители" */
CREATE TABLE IF NOT EXISTS `parents` (
	id_parent int NOT NULL PRIMARY KEY,
	age int NOT NULL,
	education char(50) NOT NULL,
	work_place char(255) NOT NULL,
	post char(255) NOT NULL,
	home_phone char(30) NOT NULL,
	cell_phone char(30) NOT NULL,
	CONSTRAINT pc_edu CHECK(education <> ''),
	CONSTRAINT pc_wp CHECK(work_place <> ''),
	CONSTRAINT pc_post CHECK(post <> ''),
	CONSTRAINT pc_home_phone CHECK (home_phone <> ''),
	CONSTRAINT pc_cell_phone CHECK (cell_phone <> ''),
	CONSTRAINT pc_age CHECK (age > 0)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родитель-ребёнок" */
CREATE TABLE IF NOT EXISTS `parent_child` (
	id_parent int NOT NULL,
	id_children int NOT NULL,
	id_type_relation int NOT NULL,
	INDEX (id_children),
	INDEX (id_type_relation),
	PRIMARY KEY (id_parent, id_children),
	CONSTRAINT pcc_tr CHECK(id_type_relation <> NULL AND id_type_relation > 0)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Отношения" */
CREATE TABLE IF NOT EXISTS `relations` (
	id_relation int AUTO_INCREMENT PRIMARY KEY,
	description char(255) NOT NULL,
	CONSTRAINT rc_desc CHECK(description <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `relations` (`description`) VALUES ('Мама');
INSERT INTO `relations` (`description`) VALUES ('Папа');
INSERT INTO `relations` (`description`) VALUES ('Бабушка');
INSERT INTO `relations` (`description`) VALUES ('Дедушка');
INSERT INTO `relations` (`description`) VALUES ('Отчим');
INSERT INTO `relations` (`description`) VALUES ('Не определён');

/* Создание таблицы "Преподаватели" */
CREATE TABLE IF NOT EXISTS `teachers` (
	id_teacher int NOT NULL PRIMARY KEY,
	info TEXT NOT NULL,
	CONSTRAINT tc_info CHECK(info <> NULL)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Новости" */
CREATE TABLE IF NOT EXISTS `news` (
	id_news int AUTO_INCREMENT PRIMARY KEY,
	caption char(255) NOT NULL,
	content text NOT NULL,
	id_author int NOT NULL,
	date_publication date NOT NULL,
	INDEX (id_author),
	CONSTRAINT nc_caption CHECK(caption <> ''),
	CONSTRAINT nc_content CHECK(content <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Предметы" */
CREATE TABLE IF NOT EXISTS `subjects` (
	id_subject int AUTO_INCREMENT PRIMARY KEY,
	description char(255) NOT NULL UNIQUE,
	CONSTRAINT sc_desc CHECK(description <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Преподаватели-предметы" */
CREATE TABLE IF NOT EXISTS `teacher_subjects` (
	id_teacher int NOT NULL,
	id_subject int NOT NULL,
	INDEX (id_subject),
	PRIMARY KEY (id_teacher, id_subject)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Тесты" */
CREATE TABLE IF NOT EXISTS `tests` (
	id_test int AUTO_INCREMENT PRIMARY KEY,
	id_subject int NOT NULL,
	id_teacher int NOT NULL,
	INDEX(id_subject),
	INDEX(id_teacher),
	caption char(255) NOT NULL,
	CONSTRAINT tc_caption CHECK(caption <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Вопросы" */
CREATE TABLE IF NOT EXISTS `questions` (
	id_question int AUTO_INCREMENT PRIMARY KEY,
	id_test int NOT NULL,
	INDEX(id_test),
	question char(255) NOT NULL,
	r_answer char(255) NOT NULL,
	CONSTRAINT qc_question CHECK(question <> ''),
	CONSTRAINT qc_ranswer CHECK(r_answer <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответы" */
CREATE TABLE IF NOT EXISTS `answers` (
	id_answer int AUTO_INCREMENT PRIMARY KEY,
	id_question int NOT NULL,
	INDEX(id_question),
	answer char(255) NOT NULL,
	CONSTRAINT ac_answer CHECK(answer <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответов студентов на тесты" */
CREATE TABLE IF NOT EXISTS `student_tests` (
	id_student_test int AUTO_INCREMENT PRIMARY KEY,
	id_student int NOT NULL,
  caption char(255) NOT NULL,
	subject char(255) NOT NULL,
	date_pass date NOT NULL,
	mark int,
	INDEX(id_student),
	CONSTRAINT stc_subject CHECK(subject <> ''),
	CONSTRAINT stc_mark CHECK((mark >= 2) AND (mark <= 5))
) ENGINE = InnoDB CHARACTER SET = UTF8;


/* Создание таблицы "Ответы студентов" */
CREATE TABLE IF NOT EXISTS `student_answers` (
	id_student_answer int AUTO_INCREMENT PRIMARY KEY,
	id_student_test int NOT NULL,
	question char(255),
	answer char(255),
	INDEX (id_student_test),
	CONSTRAINT sac_question CHECK(question <> ''),
	CONSTRAINT sac_question CHECK(answer <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Посещаемости" */
CREATE TABLE IF NOT EXISTS `student_traffic` (
  id_traffic int AUTO_INCREMENT PRIMARY KEY,
  id_student int NOT NULL,
  date_visit date NOT NULL,
  count_passed_hours int NOT NULL,
  count_all_hours int NOT NULL,
  INDEX(id_student),
  CONSTRAINT stc_cph CHECK (count_passed_hours >= 0 AND count_passed_hours <= count_all_hours),
  CONSTRAINT stc_cah CHECK (count_all_hours > 0)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Группы-тесты" */
CREATE TABLE IF NOT EXISTS `groups_tests` (
	id_test int NOT NULL,
	id_group int NOT NULL,
  PRIMARY KEY(id_test, id_group)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Новости-админа" */
CREATE TABLE IF NOT EXISTS `admin_news` (
	id_news int AUTO_INCREMENT PRIMARY KEY,
	caption char(255) NOT NULL,
	content text NOT NULL,
	id_author int NOT NULL,
	date_publication date NOT NULL,
	INDEX (id_author),
	CONSTRAINT nc_caption CHECK(caption <> ''),
	CONSTRAINT nc_content CHECK(content <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Расписание" */
/*
    1 - ПН
    2 - ВТ
    3 - СР
    4 - ЧТ
    5 - ПТ
    6 - СБ
    
    Всего пар от 1 до 7

*/
CREATE TABLE IF NOT EXISTS `schedule` (
  id_grp int,
  day int,
  pair int NOT NULL,
  subject int NOT NULL,
  PRIMARY KEY(id_grp, day, pair)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/*----------------[constraints.sql]----------------*/

USE `iep`;

/* УСТАНОВКА СВЯЗЕЙ */

/* Связка таблицы "Users" с таблицей "typeUsers" */
ALTER TABLE `users`            ADD CONSTRAINT R1  FOREIGN KEY (id_type_user)       REFERENCES `typeUser` (id_type_user) ON UPDATE CASCADE ON DELETE CASCADE; 

/* Связка таблицы "Admins" с таблицей "admin_news" */
ALTER TABLE `admin_news`       ADD CONSTRAINT R2  FOREIGN KEY (id_author)          REFERENCES `admins` (id_admin) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "users" */
ALTER TABLE `students`         ADD CONSTRAINT R3  FOREIGN KEY (id_student)         REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE; 

/* Связка таблицы "parents" с таблицей "users" */
ALTER TABLE `parents`          ADD CONSTRAINT R4  FOREIGN KEY (id_parent)          REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "groups" */
ALTER TABLE `students`         ADD CONSTRAINT R5  FOREIGN KEY (grp)                REFERENCES `groups` (grp) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "groups" с таблицей "specialty" */
ALTER TABLE `groups`           ADD CONSTRAINT R6  FOREIGN KEY (spec_id)            REFERENCES `specialty` (id_spec) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "parents" с таблицей "parent_child" */
ALTER TABLE `parent_child`     ADD CONSTRAINT R7  FOREIGN KEY (id_parent)          REFERENCES `parents` (id_parent) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "parent_child" */
ALTER TABLE `parent_child`     ADD CONSTRAINT R8  FOREIGN KEY (id_children)        REFERENCES `students` (id_student) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "parent_child" с таблицей "releations" */
ALTER TABLE `parent_child`     ADD CONSTRAINT R9  FOREIGN KEY (id_type_relation)   REFERENCES `relations` (id_relation) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teachers" с таблицей "users" */
ALTER TABLE `teachers`         ADD CONSTRAINT R10 FOREIGN KEY (id_teacher)        REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "news" с таблицей "teachers" */
ALTER TABLE `news`             ADD CONSTRAINT R11 FOREIGN KEY (id_author)         REFERENCES `teachers` (id_teacher) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teacher_subjects" с таблицей "teachers" */
ALTER TABLE `teacher_subjects` ADD CONSTRAINT R12 FOREIGN KEY (id_teacher)        REFERENCES  `teachers` (id_teacher) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teacher_subjects" с таблицей "subjects" */
ALTER TABLE `teacher_subjects` ADD CONSTRAINT R13 FOREIGN KEY (id_subject)        REFERENCES  `subjects` (id_subject) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teachers" с таблицей "tests" */
ALTER TABLE `tests`            ADD CONSTRAINT R14 FOREIGN KEY(`id_teacher`)       REFERENCES `teachers` (`id_teacher`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "subjects" */
ALTER TABLE `tests`            ADD CONSTRAINT R15 FOREIGN KEY(`id_subject`)       REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "questions" */
ALTER TABLE `questions`        ADD CONSTRAINT R16 FOREIGN KEY(`id_test`)          REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "questions" с таблицей "answers" */
ALTER TABLE `answers`          ADD CONSTRAINT R17 FOREIGN KEY(`id_question`)      REFERENCES `questions` (`id_question`) ON UPDATE CASCADE ON DELETE CASCADE; 




/* Связка таблицы "student_test" с таблицей "students" */
ALTER TABLE `student_tests`    ADD CONSTRAINT R18 FOREIGN KEY (`id_student`)      REFERENCES `students` (`id_student`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "student_questions" с таблицей "student-tests" */
ALTER TABLE `student_answers`  ADD CONSTRAINT R19 FOREIGN KEY (`id_student_test`) REFERENCES `student_tests` (`id_student_test`) ON UPDATE CASCADE ON DELETE CASCADE;







/* Связка таблицы "student_traffic" с таблицей "students" */
ALTER TABLE `student_traffic`  ADD CONSTRAINT R20 FOREIGN KEY (`id_student`)      REFERENCES `students` (`id_student`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "groups" с таблицей "groups_tests" */
ALTER TABLE `groups_tests`     ADD CONSTRAINT R21 FOREIGN KEY(`id_group`)         REFERENCES `groups` (`grp`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "groups_tests" */
ALTER TABLE `groups_tests`     ADD CONSTRAINT R22 FOREIGN KEY(`id_test`)          REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;





/* Связка таблицы "schedule" с таблицей "groups" */
ALTER TABLE `schedule`  ADD CONSTRAINT R23 FOREIGN KEY (`id_grp`)      REFERENCES `groups` (`grp`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "schedule" с таблицей "subjects" */
ALTER TABLE `schedule`  ADD CONSTRAINT R24 FOREIGN KEY (`subject`)      REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;

/*----------------[functions.sql]----------------*/

use `iep`;

DROP FUNCTION IF EXISTS getAdminId;
DROP FUNCTION IF EXISTS getUserId;
DROP FUNCTION IF EXISTS getStudentId;
DROP FUNCTION IF EXISTS getElderId;
DROP FUNCTION IF EXISTS getParentId;
DROP FUNCTION IF EXISTS getTeacherId;
DROP FUNCTION IF EXISTS getSubjectId;
DROP FUNCTION IF EXISTS getSpecialtyId;
DROP FUNCTION IF EXISTS getGroupId;
DROP FUNCTION IF EXISTS isGroupHaveElder;
DROP FUNCTION IF EXISTS isEmailExists;
DROP FUNCTION IF EXISTS ifTrafficFixed;


DELIMITER //

CREATE FUNCTION IF NOT EXISTS isEmailExists(email char(30))
	RETURNS BOOL
BEGIN
	IF EXISTS (SELECT `email` FROM `users` WHERE `email`=email) THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF; 
END;

/* Функции для пользователей */

CREATE FUNCTION IF NOT EXISTS getAdminId (emailAdmin char(30))
	RETURNS BOOL
BEGIN
	DECLARE aid int;
	
	SELECT `id_admin` INTO aid FROM `admins` WHERE `email`=emailAdmin LIMIT 1;
	
	RETURN aid;
END;

CREATE FUNCTION IF NOT EXISTS getUserId (emailUser char(30))
	RETURNS BOOL
BEGIN
	DECLARE uid int;
	
	SELECT `id_user` INTO uid FROM `users` WHERE `email`=emailUser LIMIT 1;
	
	RETURN uid;
END;

CREATE FUNCTION IF NOT EXISTS getStudentId (emailUser char(30)) 
	RETURNS INT
BEGIN
  DECLARE sid int;
  
  SELECT `id_user` INTO sid FROM `users` WHERE `email`=emailUser AND `id_type_user`=3 OR `id_type_user`=2 LIMIT 1;
  
  RETURN sid;
END;

CREATE FUNCTION IF NOT EXISTS getParentId (emailUser char(30)) 
	RETURNS INT
BEGIN
  DECLARE pid int;
  
  SELECT `id_user` INTO pid FROM `users` WHERE `email`=emailUser AND `id_type_user`=4 LIMIT 1;
  
  RETURN pid;
END;

CREATE FUNCTION IF NOT EXISTS getElderId (emailUser char(30)) 
	RETURNS INT
BEGIN
  DECLARE eid int;
  
  SELECT `id_user` INTO eid FROM `users` WHERE `email`=emailUser AND `id_type_user`=2 LIMIT 1;
  
  RETURN eid;
END;


CREATE FUNCTION IF NOT EXISTS getTeacherId(emailTeacher char(30)) 
  RETURNS int
BEGIN
  DECLARE tid int;
  
  SELECT `id_user` INTO tid FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=1 LIMIT 1;
  
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


CREATE FUNCTION getSpecialtyId(spec char(10))
	RETURNS int
BEGIN
	DECLARE sid int;
	
	SELECT DISTINCT `id_spec` INTO sid FROM `specialty` WHERE `code_spec`=code_spec;
	
	RETURN sid;
END;

CREATE FUNCTION getGroupId(grp char(10))
	RETURNS int
BEGIN
	DECLARE gid int;
	
	SELECT DISTINCT `grp` INTO gid FROM `grp` WHERE `description`=grp;
	
	RETURN gid;
END;


/* Функции для посещения */

CREATE FUNCTION ifTrafficFixed(elder_email char(30))
	RETURNS BOOL
BEGIN
	IF EXISTS(SELECT * FROM `student_traffic` WHERE `date_visit`=DATE(NOW()) AND `id_student`=getUserId(elder_email)) THEN
		RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
END;


//

DELIMITER ;

/*----------------[procedures.sql]----------------*/

use `iep`;

/* Служебные */

DROP PROCEDURE IF EXISTS getTeacherID;
DROP PROCEDURE IF EXISTS getStudentID;
DROP PROCEDURE IF EXISTS getElderID;
DROP PROCEDURE IF EXISTS getParentID;
DROP PROCEDURE IF EXISTS getSubjectID;

/* ================================= */


DELIMITER //

CREATE PROCEDURE getParentID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=4;
END;

CREATE PROCEDURE getStudentID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=3;
END;

CREATE PROCEDURE getElderID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=2;
END;

CREATE PROCEDURE getTeacherID(emailUser CHAR(30))
BEGIN
	SELECT `id_user` FROM `users` WHERE `email`=emailUser AND `id_type_user`=1;
END;

CREATE PROCEDURE getSubjectID(subject CHAR(30))
BEGIN
	SELECT `id_subject` FROM `subjects` WHERE `description`=subject;
END;


/* ---------------------------------------------------------------------------------- */

//

DELIMITER ;

/*----------------[logs.sql]----------------*/

USE `iep`;

DROP TABLE IF EXISTS `logs`;
DROP PROCEDURE IF EXISTS writeLog;
DROP PROCEDURE IF EXISTS readLogs;
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
	msg text NOT NULL,
	date date NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS writeLog(tbl char(255), msg text)
BEGIN
	INSERT INTO `logs` (`tbl`, `msg`, `date`) VALUES (tbl, msg, NOW());
END;

CREATE PROCEDURE IF NOT EXISTS readLogs(tabl char(255))
BEGIN
	IF tabl = 'all' THEN 
		SELECT `id_log` as 'id', `tbl` as 'table', `msg` as 'message', `date` FROM `logs` ORDER BY `id_log`;
    ELSE
		SELECT `id_log` as 'id', `tbl` as 'table', `msg` as 'message', `date` FROM `logs` WHERE `tbl`=tabl ORDER BY `id_log`;
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

CREATE PROCEDURE IF NOT EXISTS removeLog(log_id int)
BEGIN
	DELETE FROM `logs` WHERE `id_log`=log_id;
END;

//

DELIMITER ;

/*----------------[logs_triggers.sql]----------------*/

USE `iep`;

DROP TRIGGER IF EXISTS log_insUser;
DROP TRIGGER IF EXISTS log_uptUser;
DROP TRIGGER IF EXISTS log_delUser;

DROP TRIGGER IF EXISTS log_insAdmin;
DROP TRIGGER IF EXISTS log_uptAdmin;
DROP TRIGGER IF EXISTS log_delAdmin;

DROP TRIGGER IF EXISTS log_insStudent;
DROP TRIGGER IF EXISTS log_uptStudent;
DROP TRIGGER IF EXISTS log_delStudent;

DROP TRIGGER IF EXISTS log_insSubject;
DROP TRIGGER IF EXISTS log_uptSubject;
DROP TRIGGER IF EXISTS log_delSubject;

DROP TRIGGER IF EXISTS log_insSpecialty;
DROP TRIGGER IF EXISTS log_uptSpecialty;
DROP TRIGGER IF EXISTS log_delSpecialty;

DELIMITER //

CREATE TRIGGER log_insUser AFTER INSERT ON `users` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT(
		'Добавлен новый пользователь [',
        new.sn, ' ',
        new.fn, ' ',
        new.pt, ' ',
		new.email, ']'
    ));
END;

CREATE TRIGGER log_uptUser AFTER UPDATE ON `users` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT('Данные пользователя обновлены [s',
		old.sn, ' ',
		old.fn, ' ',
		old.pt, ' ',
		old.email, '] ---> [',
		new.sn,  ' ',
		new.fn, ' ',
		new.pt, ' ',
		new.email, ']'
	));
END;

CREATE TRIGGER log_delUser AFTER DELETE ON `users` FOR EACH ROW 
BEGIN
	call writeLog('users', CONCAT(
		'Пользователь ',
        old.sn, ' ',
        old.fn, ' ',
        old.pt, ' удалён'
    ));
END;


CREATE TRIGGER log_insAdmin AFTER INSERT ON `admins` FOR EACH ROW
BEGIN
	call writeLog('admins', CONCAT(
		'Добавлен новый администратор ',
        new.sn, ' ',
        new.fn, ' ',
        new.pt, ' '
    ));
END;

CREATE TRIGGER log_uptAdmin AFTER UPDATE ON `admins` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT('Данные администратора обновлены [',
		old.sn, ' ',
		old.fn, ' ',
		old.pt, ' ',
		old.email, '] ---> [',
		new.sn,  ' ',
		new.fn, ' ',
		new.pt, ' ',
		new.email, ']'
	));
END;

CREATE TRIGGER log_delAdmin AFTER DELETE ON `admins` FOR EACH ROW
BEGIN
	call writeLog('users', CONCAT('Администратор [',
		old.sn, ' ',
		old.fn, ' ',
		old.pt, ' ',
		old.email, '] был удалён'
	));
END;


CREATE TRIGGER log_insStudent AFTER INSERT ON `students` FOR EACH ROW
BEGIN
	call writeLog('students', CONCAT(
		'Добавлен новый студент'
    ));
END;

CREATE TRIGGER log_uptStudent AFTER UPDATE ON `students` FOR EACH ROW
BEGIN
	call writeLog('students', CONCAT(
		'Обновлена информация о студенте с ID ', new.id_student
    ));
END;

CREATE TRIGGER log_delStudent AFTER DELETE ON `students` FOR EACH ROW 
BEGIN
	call writeLog('students', CONCAT(
		'Студент с ', old.id_student, ' был удалён'
    ));
END;


CREATE TRIGGER log_insSubject AFTER INSERT ON `subjects` FOR EACH ROW
BEGIN
	call writeLog('subjects', CONCAT(
		'Добавлен новый предмет ', new.description
    ));
END;

CREATE TRIGGER log_uptSubject AFTER UPDATE ON `subjects` FOR EACH ROW
BEGIN
	call writeLog('subjects', CONCAT(
		'Предмет ', old.description, ' был обновлён на ', new.description
    ));
END;

CREATE TRIGGER log_delSubject AFTER DELETE ON `subjects` FOR EACH ROW 
BEGIN
	call writeLog('subjects', CONCAT(
		'Предмет ', old.description, ' был удалён'
    ));
END;


CREATE TRIGGER log_insSpecialty AFTER INSERT ON `specialty` FOR EACH ROW
BEGIN
	call writeLog('specialty', CONCAT(
		'Добавлена новая специальность ', new.code_spec, ' ', new.description
    ));
END;

CREATE TRIGGER log_uptSpecialty AFTER UPDATE ON `specialty` FOR EACH ROW
BEGIN
	call writeLog('specialty', CONCAT(
		'Специальность обновлена [', 
        old.code_spec, ' ',
		old.description, ' ',
        old.pdf_file, '] была обновлён на [',
        new.code_spec, ' ',
        new.description, ' ',
        new.pdf_file
    ));
END;

CREATE TRIGGER log_delSpecialty AFTER DELETE ON `specialty` FOR EACH ROW 
BEGIN
	call writeLog('specialty', CONCAT(
		'Специальность ', old.code_spec, ' ', old.description, ' была удалёна'
    ));
END;


//

DELIMITER ;

/*----------------[triggers.sql]----------------*/

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

CREATE TRIGGER IF NOT EXISTS insUser BEFORE INSERT ON `users` FOR EACH ROW
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


CREATE TRIGGER IF NOT EXISTS insTypeUser BEFORE INSERT ON `typeUser` FOR EACH ROW
BEGIN
	IF new.description = '' THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Field is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insAdmin BEFORE INSERT ON `admins` FOR EACH ROW
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

CREATE TRIGGER IF NOT EXISTS insStudent BEFORE INSERT ON `students` FOR EACH ROW
BEGIN
	IF new.home_address = '' OR
		new.cell_phone = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insGroup BEFORE INSERT ON `groups` FOR EACH ROW
BEGIN
	IF new.description = '' OR
		new.edu_year = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insSpecialty BEFORE INSERT ON `specialty` FOR EACH ROW
BEGIN
	IF new.code_spec = ''   OR
		new.description = '' OR
		new.pdf_file = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insParent BEFORE INSERT ON `parents` FOR EACH ROW
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

CREATE TRIGGER IF NOT EXISTS insRelation BEFORE INSERT ON `relations` FOR EACH ROW
BEGIN
	IF	new.description = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insTeacher BEFORE INSERT ON `teachers` FOR EACH ROW
BEGIN
	IF	new.info = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insNews BEFORE INSERT ON `news` FOR EACH ROW
BEGIN
	IF new.caption = '' OR
		new.content = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insSubject BEFORE INSERT ON `subjects` FOR EACH ROW
BEGIN
	IF new.description = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insTest BEFORE INSERT ON `tests` FOR EACH ROW
BEGIN
	IF new.caption = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insQuestion BEFORE INSERT ON `questions` FOR EACH ROW
BEGIN
	IF new.question = '' OR
		new.r_answer = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insAnswer BEFORE INSERT ON `answers` FOR EACH ROW
BEGIN
	IF new.answer = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insStudentTest BEFORE INSERT ON `student_tests` FOR EACH ROW
BEGIN
	IF new.subject = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insStudentAnswer BEFORE INSERT ON `student_answers` FOR EACH ROW
BEGIN
	IF new.question = '' OR
		new.answer = ''
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Filed is empty';
	END IF;
END;

CREATE TRIGGER IF NOT EXISTS insStudentTraffic BEFORE INSERT ON `student_traffic` FOR EACH ROW
BEGIN
	IF
		(new.count_passed_hours < 0) OR
		(new.count_all_hours < 0)    
	THEN
		SIGNAL SQLSTATE '45000' SET
			MESSAGE_TEXT = 'Incorrect value';
	END IF;
END;




CREATE TRIGGER IF NOT EXISTS uptRAnswer AFTER UPDATE ON `questions` FOR EACH ROW
BEGIN
	UPDATE `answers` SET `answer`=new.r_answer WHERE `id_question`=new.id_question AND `answer`=old.r_answer;
END;





//

DELIMITER ;

/*----------------[users.sql]----------------*/


DROP USER IF EXISTS `iep`@`localhost`;

CREATE USER `iep`@`localhost`;

GRANT SELECT, INSERT, UPDATE, EXECUTE, REFERENCES ON iep.* TO `iep`@`localhost`;

SET PASSWORD FOR 'iep'@'localhost' = PASSWORD('#include <iostream> using namespace std; int main(int argc, char *argv[]) { cout << "Hello World";}');

/*----------------[views.sql]----------------*/

use iep;

DROP VIEW IF EXISTS v_Admins;
DROP VIEW IF EXISTS v_Users;
DROP VIEW IF EXISTS v_Students;
DROP VIEW IF EXISTS v_Teachers;
DROP VIEW IF EXISTS v_Elders;
DROP VIEW IF EXISTS v_Parents;

DROP VIEW IF EXISTS v_Groups;
DROP VIEW IF EXISTS v_Specialtyes;

DROP VIEW IF EXISTS v_Subjects;
DROP VIEW IF EXISTS v_News;

DROP VIEW IF EXISTS v_Traffic;
DROP VIEW IF EXISTS v_Relations;
DROP VIEW IF EXISTS v_Tests;

CREATE VIEW v_Admins (sn, fn, pt, email, passwd) as
	SELECT `sn`, `fn`, `pt`, `email`, `passwd`
	FROM `admins`
	ORDER BY `sn`, `fn`, `pt`;

CREATE VIEW v_Users (sn, fn, pt, email, paswd, type_user) as
	SELECT `sn`, `fn`, `pt`, `email`, `passwd`, `id_type_user` 
	FROM `users` 
	ORDER BY `sn`, `fn`, `pt`;
	
CREATE VIEW v_Students (sn, fn, pt, email, paswd, type_user, home_address, cell_phone, grp, grp_id, edu_year, is_budget, spec_id, spec_code, spec_descp) as
	SELECT u.sn, u.fn, u.pt, u.email, u.passwd, u.id_type_user, s.home_address, s.cell_phone, g.description, g.grp, g.edu_year, g.is_budget, sp.id_spec, sp.code_spec, sp.description
	FROM `users` u 
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
		INNER JOIN `specialty` sp ON sp.id_spec=g.spec_id
	WHERE u.id_type_user=3
	ORDER BY u.sn, u.fn, u.pt;

CREATE VIEW v_Parents (sn, fn, pt, email, paswd, age, education, work_place, post, home_phone, cell_phone, type_user) as
  SELECT u.sn, u.fn, u.pt, u.email, u.passwd, p.age, p.education, p.work_place, p.post, p.home_phone, p.cell_phone, u.id_type_user
  FROM `users` u 
		INNER JOIN `parents` p ON u.id_user=p.id_parent
  WHERE u.id_type_user=4
  ORDER BY u.sn, u.fn, u.pt;

CREATE VIEW v_Teachers (sn, fn, pt, email, paswd, info, type_user) as
	SELECT u.sn, u.fn, u.pt, u.email, u.passwd, t.info, u.id_type_user
	FROM `users` u
		INNER JOIN `teachers` t ON u.id_user=t.id_teacher
  WHERE u.id_type_user=1
  ORDER BY u.sn, u.fn, u.pt;	

CREATE VIEW v_Elders (sn, fn, pt, email, paswd, type_user, home_address, cell_phone, grp, grp_id, edu_year, is_budget, spec_id, spec_code, spec_descp) as
	SELECT u.sn, u.fn, u.pt, u.email, u.passwd, u.id_type_user, s.home_address, s.cell_phone, g.description, g.grp, g.edu_year, g.is_budget, sp.id_spec, sp.code_spec, sp.description
	FROM `users` u 
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
		INNER JOIN `specialty` sp ON sp.id_spec=g.spec_id
	WHERE u.id_type_user=2
	ORDER BY u.sn, u.fn, u.pt;

CREATE VIEW v_Groups (id_grp, number, edu_year, budget, spec_id, spec_code, spec_descp, spec_file) as
	SELECT g.grp, g.description, g.edu_year, g.is_budget, g.spec_id, s.code_spec, s.description, s.pdf_file 
	FROM `groups` g 
		INNER JOIN `specialty` s ON g.spec_id=s.id_spec
	ORDER BY g.grp;

CREATE VIEW v_Specialtyes (id_spec, code, descp, file) as
	SELECT `id_spec`, `code_spec`, `description`, `pdf_file`
	FROM `specialty`
	ORDER BY `code_spec`;

CREATE VIEW v_Subjects (id_subject, descp) as
	SELECT `id_subject`, `description`
	FROM `subjects`
	ORDER BY `description`;
	
CREATE VIEW v_Relations (descp) as
	SELECT `description`
	FROM `relations`
	ORDER BY `description`;
	
CREATE VIEW v_News (id_news, caption, content, author, email, dp) as
	SELECT n.id_news, n.caption, n.content, CONCAT(u.sn, ' ', LEFT(u.fn, 1), '. ', LEFT(u.pt, 1), '.') as author, u.email, n.date_publication
	FROM `news` n
		INNER JOIN `users` u ON n.id_author=u.id_user
	ORDER BY n.date_publication, n.caption;

CREATE VIEW v_Traffic (fn, sn, pt, email, date_visit, count_passed_hours, count_all_hours) as
	SELECT u.sn, u.fn, u.pt, u.email, s_t.date_visit, s_t.count_passed_hours, s_t.count_all_hours
	FROM `student_traffic` s_t
		INNER JOIN `students` s ON s_t.id_student=s.id_student
		INNER JOIN `users` u ON s.id_student=u.id_user
	WHERE u.id_type_user=4
	ORDER BY u.sn, u.fn, u.pt;
	
CREATE VIEW v_Tests (id_test, author, caption, subject_id, subject_caption) as
  SELECT t.id_test, u.email, t.caption, s.id_subject, s.description
  FROM `tests` t
  	INNER JOIN `users` u ON t.id_teacher=u.id_user
  	INNER JOIN `subjects` s ON t.id_subject=s.id_subject
  ORDER BY id_test;
  

/*----------------[groups.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addGroup;
DROP PROCEDURE IF EXISTS removeGroup;
DROP PROCEDURE IF EXISTS changeDescriptionGroup;
DROP PROCEDURE IF EXISTS changeSpecGroup;
DROP PROCEDURE IF EXISTS upCourse;
DROP PROCEDURE IF EXISTS getAllGroups;

DELIMITER //

CREATE PROCEDURE addGroup(descp char(255), id_spec int, year_edu char(10), is_budget int)
BEGIN
	INSERT INTO `groups` (`spec_id`, `description`, `edu_year`, `is_budget`) VALUES (id_spec, descp, year_edu, is_budget);
END;

CREATE PROCEDURE removeGroup(id_grp int)
BEGIN
	DELETE FROM `groups` WHERE `grp`=id_grp;
END;

CREATE PROCEDURE changeDescriptionGroup(grp_id int, new_descp char(255))
BEGIN
	UPDATE `groups` SET `description`=new_descp WHERE `grp`=grp_id;
END;

CREATE PROCEDURE changeSpecGroup(grp_id int, new_spec_id int)
BEGIN
	UPDATE `groups` SET `spec_id`=new_spec_id WHERE `grp`=grp_id;
END;

CREATE PROCEDURE upCourse(grp_id int)
BEGIN
	DECLARE course int;
	DECLARE st char(5);
	DECLARE en char(5);
	
	SELECT CAST(LEFT(RIGHT(`description`, 3), 1) as int) INTO course FROM `groups` WHERE `grp`=grp_id;
	SELECT SUBSTRING_INDEX(`description`, '-', 1) INTO st FROM `groups` WHERE `grp`=grp_id;
	SELECT RIGHT(`description`, 2) INTO en FROM `groups` WHERE `grp`=grp_id;
	
	IF course < 4 THEN
		SET @new_number = CONCAT(st, '-', course+1, en);
		UPDATE `groups` SET `description`=@new_number WHERE `grp`=grp_id;
	END IF;
END;

CREATE PROCEDURE getAllGroups()
BEGIN
  SELECT * FROM `v_Groups`;
END;

//

DELIMITER ;

/*----------------[news.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addNews;
DROP PROCEDURE IF EXISTS addAdminNews;
DROP PROCEDURE IF EXISTS removeNews;
DROP PROCEDURE IF EXISTS changeCaptionNews;
DROP PROCEDURE IF EXISTS changeContentNews;
DROP PROCEDURE IF EXISTS getNews;
DROP PROCEDURE IF EXISTS getAllNews;
DROP PROCEDURE IF EXISTS getAllAdminNews;
DROP PROCEDURE IF EXISTS clearAllNews;

DELIMITER //

CREATE PROCEDURE addNews(n_caption char(255), n_content text, emailTeacher char(30), n_date date)
BEGIN
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, getTeacherId(emailTeacher), n_date);
END;


CREATE PROCEDURE addAdminNews(n_caption char(255), n_content text, emailTeacher char(30), n_date date)
BEGIN
	INSERT INTO `admin_news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, getAdminId(emailTeacher), n_date);
END;

CREATE PROCEDURE removeNews(id_news INT)
BEGIN
	DELETE n FROM `news` n
    INNER JOIN `users` u ON n.id_author=u.id_user
  WHERE n.id_news=id_news;
END;

CREATE PROCEDURE changeCaptionNews(news_id int, new_caption char(255))
BEGIN
	UPDATE `news` SET `caption`=new_caption WHERE `id_news`=news_id;
END;

CREATE PROCEDURE changeContentNews(news_id int, new_content text)
BEGIN
	UPDATE `news` SET `content`=new_content WHERE `id_news`=news_id;
END;

CREATE PROCEDURE getNews(n_author_email CHAR(30)) /* Для вывода новостей в его аккаунте */
BEGIN
	SELECT * FROM `v_News` WHERE `email`=n_author_email;
END;

CREATE PROCEDURE getAllNews()
BEGIN
	SELECT * FROM `v_News`;
END;

CREATE PROCEDURE getAllAdminNews() /* Для вывода в панели администратора */
BEGIN
	SELECT  an.id_news,
			an.caption,
            an.content,
            a.email as author,
            an.date_publication as dp
    FROM `admin_news` an
		INNER JOIN `admins` a ON a.id_admin=an.id_news
    ORDER BY `date_publication`;
END;

CREATE PROCEDURE clearAllNews()
BEGIN
	DELETE FROM `news`;
END;

//

DELIMITER ;

/*----------------[releations.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addRelation;
DROP PROCEDURE IF EXISTS removeRelation;
DROP PROCEDURE IF EXISTS getAllRelations;

DELIMITER //

CREATE PROCEDURE addRelation(descp CHAR(255))
BEGIN
	INSERT INTO `relations` (`description`) VALUES (descp);
END;

CREATE PROCEDURE removeRelation(relation_id int)
BEGIN
	DELETE FROM `relations` WHERE `id_relation`=relation_id;
END;

CREATE PROCEDURE getAllRelations()
BEGIN
	SELECT * FROM `v_Relations`;
END;

//

DELIMITER ;

/*----------------[schedule.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addScheduleEntry;
DROP PROCEDURE IF EXISTS getScheduleGroup;
DROP PROCEDURE IF EXISTS getAllScheduleGroup;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS addScheduleEntry(grp int, d int, pair int, subject int)
BEGIN
  INSERT INTO `schedule` (`id_grp`, `day`, `pair`, `subject`) VALUES (grp, d, pair, subject);
END;

CREATE PROCEDURE IF NOT EXISTS getScheduleGroup(grp int)
BEGIN
  SELECT s.day, 
		 g.description as 'group', 
         s.pair, 
         sb.description as 'subject'
  FROM `schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  WHERE s.id_grp=grp
  ORDER BY s.pair;
END;


CREATE PROCEDURE IF NOT EXISTS getAllScheduleGroup()
BEGIN
  SELECT s.day, 
		 g.description as 'group', 
         s.pair, 
         sb.description as 'subject'
  FROM `schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  ORDER BY s.day;
END;

//

DELIMITER ;

/*----------------[specialtyes.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addSpecialty;
DROP PROCEDURE IF EXISTS removeSpecialty;
DROP PROCEDURE IF EXISTS changeCodeSpecialty;
DROP PROCEDURE IF EXISTS changeDescriptionSpecialty;
DROP PROCEDURE IF EXISTS changeFileSpecialty;
DROP PROCEDURE IF EXISTS getAllSpecialty;

DELIMITER //

CREATE PROCEDURE addSpecialty(code_spec char(10), descp char(255), pdf_file char(255))
BEGIN
	INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE removeSpecialty(spec_id int)
BEGIN
	DELETE FROM `specialty` WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeCodeSpecialty(spec_id int, new_code_spec char(255))
BEGIN
	UPDATE `specialty` SET `code_spec`=new_code_spec WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeDescriptionSpecialty(spec_id int, new_descp char(255))
BEGIN
	UPDATE `specialty` SET `description`=new_descp WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeFileSpecialty(spec_id int, new_file char(255))
BEGIN
	UPDATE `specialty` SET `pdf_file`=new_file WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE getAllSpecialty()
BEGIN
	SELECT * FROM `v_Specialtyes`;
END;

//

DELIMITER ;

/*----------------[subjects.sql]----------------*/

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

/*----------------[tests.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addTest;
DROP PROCEDURE IF EXISTS removeTest;
DROP PROCEDURE IF EXISTS changeCaptionTest;
DROP PROCEDURE IF EXISTS changeSubjectTest;
DROP PROCEDURE IF EXISTS setGroup;
DROP PROCEDURE IF EXISTS unsetGroup;

DROP PROCEDURE IF EXISTS getTestsForGroup;
DROP PROCEDURE IF EXISTS getTestGroups;
DROP PROCEDURE IF EXISTS getUnsetGroups;
DROP PROCEDURE IF EXISTS getTests;
DROP PROCEDURE IF EXISTS getTest;
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

DROP PROCEDURE IF EXISTS createStudentTest;
DROP PROCEDURE IF EXISTS putStudentAnswer;
DROP PROCEDURE IF EXISTS getStudentTest;
DROP PROCEDURE IF EXISTS getStudentTests;
DROP PROCEDURE IF EXISTS getStudentAnswers;

DROP FUNCTION IF EXISTS isGroupForTest;

DELIMITER //

/* Работа с тестами */

CREATE PROCEDURE addTest(emailTeacher char(30), subject_id int, test_caption char(30))
BEGIN
  INSERT INTO `tests` (`id_teacher`, `id_subject`, `caption`) VALUES (getTeacherId(emailTeacher), subject_id, test_caption);
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

CREATE PROCEDURE changeSubjectTest(test_id int, subject_id int)
BEGIN
  UPDATE `tests` SET `id_subject`=subject_id
  WHERE `id_test`=test_id;
END;

CREATE PROCEDURE setGroup(test_id int, test_grp int)
BEGIN
  INSERT INTO `groups_tests` (`id_test`, `id_group`) VALUES (test_id, test_grp);
END;

CREATE PROCEDURE unsetGroup(test_id int, test_grp int)
BEGIN
  DELETE FROM `groups_tests` WHERE `id_test`=test_id AND `id_group`=test_grp;
END;

CREATE PROCEDURE getTestsForGroup(grp int)
BEGIN
	SELECT t.id_test,
			t.caption, 
            t.id_teacher  as author,
            s.description as subject_caption,
            s.id_subject  as subject_id
    FROM `tests` t
		INNER JOIN `groups_tests` gt ON t.id_test=gt.id_test
		INNER JOIN `subjects` s ON s.id_subject=t.id_subject
	WHERE `id_group`=grp;
END;

CREATE PROCEDURE getTestGroups(test_id int)
BEGIN
  SELECT g.grp         as grp_id, 
  			g.description as grp_descp, 
			g.edu_year    as grp_edu_year, 
			g.is_budget	  as grp_payment, 
			s.id_spec     as sped_id, 
			s.code_spec   as spec_code, 
			s.description as spec_descp
  FROM `groups_tests` g_t
    INNER JOIN `groups` g ON g.grp=g_t.id_group
    INNER JOIN `specialty` s ON g.spec_id=s.id_spec
  WHERE g_t.id_test=test_id
  ORDER BY g.description;
END;

CREATE FUNCTION IF NOT EXISTS isGroupForTest(test_id int, grp int)
	RETURNS BOOL
BEGIN
	IF EXISTS (SELECT `id_group` FROM `groups_tests` WHERE `id_test`=test_id AND `id_group`=grp) THEN
        RETURN TRUE;
    ELSE
		RETURN false;
    END IF;
END;

/*
 
 Выбирает все не назначенные группы на тест
 
*/

CREATE PROCEDURE getUnsetGroups(test_id int)
BEGIN
	SELECT g.grp as grp_id,
			g.description as grp_descp,
            g.edu_year as grp_edu_year,
            g.is_budget as grp_payment,
            s.id_spec as spec_id,
            s.code_spec as spec_code,
            s.description as spec_descp
    FROM `groups_tests` gt
		RIGHT JOIN `groups` g ON gt.id_group=g.grp AND gt.id_test=test_id
		RIGHT JOIN `specialty` s ON g.spec_id=s.id_spec
	WHERE gt.id_test is null;
END;

CREATE PROCEDURE getTest(test_id int)
BEGIN
  SELECT * FROM `v_Tests` WHERE `id_test`=test_id;
END;

CREATE PROCEDURE getTests(emailTeacher char(30))
BEGIN
  SELECT * FROM `v_Tests` WHERE `author`=emailTeacher;
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
  UPDATE `questions` SET `question`=new_quest WHERE `id_question`=question_id;
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

CREATE PROCEDURE getAnswers(question_id int)
BEGIN
  SELECT a.id_answer, a.answer
  FROM `answers` a
    INNER JOIN `questions` q ON q.id_question=a.id_question
  WHERE a.id_question=question_id
  ORDER BY a.id_answer;
END;

CREATE PROCEDURE createStudentTest(student_email char(30), subject char(255), t_caption char(255), mark int)
BEGIN
	INSERT INTO `student_tests` (`id_student`, `subject`, `caption`, `date_pass`, `mark`) VALUES (getStudentId(student_email), subject, t_caption, date(now()), mark);
END;

CREATE PROCEDURE putStudentAnswer(student_test int, question char(255), answer char(255))
BEGIN
	INSERT INTO `student_answers` (`id_student_test`, `question`, `answer`) VALUES (student_test, question, answer);
END;

CREATE PROCEDURE getStudentTest(student_email char(255), student_test int)
BEGIN
	SELECT u.email, st.caption, st.subject, st.date_pass, st.mark 
	FROM `student_tests` st 
		INNER JOIN `users` u ON st.id_student=u.id_user
	WHERE st.id_student_test=student_test AND st.id_student=getStudentID(student_email);
END;

CREATE PROCEDURE getStudentTests(student_email char(255))
BEGIN
	SELECT * 
    FROM `student_tests`
    WHERE `id_student`=getStudentId(student_email)
    ORDER BY `caption`;
END;

CREATE PROCEDURE getStudentAnswers(student_test int)
BEGIN
  SELECT `question`, `answer`
  FROM `student_answers`
  WHERE `id_student_test`=student_test;
END;


//

DELIMITER ;

/*----------------[traffic.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addTrafficEntry;
DROP PROCEDURE IF EXISTS clearTrafficStudent;
DROP PROCEDURE IF EXISTS clearAllTraffic;
DROP PROCEDURE IF EXISTS getTrafficStudent;
DROP PROCEDURE IF EXISTS getAllTraffic;

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
	SELECT * 
    FROM `student_traffic`
    WHERE `id_student`=getUserId(t_student_email)
    ORDER BY `date_visit`;
END;

CREATE PROCEDURE IF NOT EXISTS getAllTraffic()
BEGIN
	SELECT * FROM `v_Traffic`;
END;

//

DELIMITER ;

/*----------------[users.sql]----------------*/

use `iep`;

DROP PROCEDURE IF EXISTS addUser;
DROP PROCEDURE IF EXISTS addAdmin;
DROP PROCEDURE IF EXISTS addTeacher;
DROP PROCEDURE IF EXISTS addStudent;
DROP PROCEDURE IF EXISTS addParent;
DROP PROCEDURE IF EXISTS removeUser;
DROP PROCEDURE IF EXISTS removeAdmin;

DROP PROCEDURE IF EXISTS grantElder;
DROP PROCEDURE IF EXISTS revokeElder;

DROP PROCEDURE IF EXISTS changeUserPassword;
DROP PROCEDURE IF EXISTS getUserType;

DROP PROCEDURE IF EXISTS authentification;
DROP PROCEDURE IF EXISTS authentificationAdmin;



DROP PROCEDURE IF EXISTS getTeacherInfo;
DROP PROCEDURE IF EXISTS getStudentInfo;
DROP PROCEDURE IF EXISTS getElderInfo;
DROP PROCEDURE IF EXISTS getParentInfo;

DROP PROCEDURE IF EXISTS getAllAdmins;
DROP PROCEDURE IF EXISTS getAllUsers;
DROP PROCEDURE IF EXISTS getAllStudents;
DROP PROCEDURE IF EXISTS getAllElders;
DROP PROCEDURE IF EXISTS getAllParents;
DROP PROCEDURE IF EXISTS getAllTeachers;




DROP PROCEDURE IF EXISTS setChild;
DROP PROCEDURE IF EXISTS unsetChild;
DROP PROCEDURE IF EXISTS changeRelation;
DROP PROCEDURE IF EXISTS getChilds;


DROP PROCEDURE IF EXISTS setSubject;
DROP PROCEDURE IF EXISTS unsetSubject;
DROP PROCEDURE IF EXISTS getSubjects;
DROP PROCEDURE IF EXISTS getUnsetSubjects;



/* Реализация */


DELIMITER //

CREATE PROCEDURE addUser(sn char(30), fn char(30), pt char(30), email char(30), passwd char(32), u_type int)
BEGIN
	INSERT INTO `users` (`sn`, `fn`, `pt`, `email`, `passwd`, `id_type_user`) VALUES (sn, fn, pt, email, passwd, u_type);
END;


CREATE PROCEDURE addAdmin(sn char(30), fn char(30), pt char(30), email char(30), passwd char(32))
BEGIN
	INSERT INTO `admins` (`sn`, `fn`, `pt`, `email`, `passwd`) VALUES (sn, fn, pt, email, MD5(passwd));
END;

CREATE PROCEDURE addTeacher(sn char(30), fn char(30), pt char(32), t_email char(255), paswd char(32), info text)
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`fn`, `sn`, `pt`, `email`, `passwd`, `id_type_user`) VALUES (fn, sn, pt, t_email, paswd, 1);
	INSERT INTO `teachers` (`id_teacher`, `info`) VALUES ((SELECT DISTINCT LAST_INSERT_ID() FROM `users`), info);
	COMMIT;
END;

CREATE PROCEDURE addStudent(sn char(30), fn char(30), pt char(30), s_email char(30), paswd char(32), ha char(255), cp char(30), s_grp int)
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`sn`, `fn`, `pt`, `email`, `passwd`, `id_type_user`) VALUES (sn, fn, pt, s_email, paswd, 3);
	INSERT INTO `students` (`id_student`, `home_address`, `cell_phone`, `grp`) VALUES (getStudentId(s_email), ha, cp, s_grp);
	COMMIT;
END;

CREATE PROCEDURE addParent(sn char(30), fn char(30), pt char(30), p_email char(30), paswd char(32), p_age int(11), p_education char(50), p_wp char(255), p_post char(255), hp char(30), cp char(30))
BEGIN
	START TRANSACTION;
	INSERT INTO `users` (`fn`, `sn`, `pt`, `email`, `passwd`, `id_type_user`) VALUES (fn, sn, pt, p_email, paswd, 4);
	INSERT INTO `parents` (`id_parent`, `age`, `education`, `work_place`, `post`, `home_phone`, `cell_phone`) VALUES (getParentId(p_email), p_age, p_education, p_wp, p_post, hp, cp);
	COMMIT;
END;

CREATE PROCEDURE removeUser(u_email char(30))
BEGIN
	DELETE FROM `users` WHERE `email`=u_email;
END;

CREATE PROCEDURE removeAdmin(a_email char(30))
BEGIN
	DELETE FROM `admins` WHERE `email`=a_email;
END;

CREATE PROCEDURE grantElder(s_email char(30))
BEGIN
	DECLARE grp_id int;
	SELECT `grp` INTO grp_id FROM `users` u INNER JOIN `students` s ON u.id_user=s.id_student WHERE `email`=s_email;
	
	IF NOT (isGroupHaveElder(grp_id)) THEN
		UPDATE `users` u SET u.id_type_user=2
		WHERE u.email=s_email AND u.id_type_user=3;	
	END IF;
END;

CREATE PROCEDURE revokeElder(s_email char(30))
BEGIN
	UPDATE `users` u SET u.id_type_user=3
	WHERE u.email=s_email AND u.id_type_user=2;
END;

CREATE PROCEDURE changeUserPassword(u_email char(30), old_passwd char(32), new_passwd char(32))
BEGIN
	UPDATE `users` SET `password`=new_passwd WHERE `email`=u_email AND `password`=old_passwd;
END;

CREATE PROCEDURE authentification(u_email char(30), u_paswd char(32))
BEGIN
	SELECT * FROM `users` WHERE `email`=u_email AND `passwd`=u_paswd;
END;

CREATE PROCEDURE authentificationAdmin(u_email char(30), u_paswd char(32))
BEGIN
	SELECT * FROM `admins` WHERE `email`=u_email AND `passwd`=u_paswd;
END;

CREATE PROCEDURE getUserType()
BEGIN
	SELECT * FROM `typeUser` ORDER BY `id_type_user`, `description`;
END;

CREATE PROCEDURE getTeacherInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Teachers` WHERE `email`=emailUser;
END;

CREATE PROCEDURE getStudentInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Students` WHERE `email`=emailUser;
END;

CREATE PROCEDURE getElderInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Elders` WHERE `email`=emailUser;
END;

CREATE PROCEDURE getParentInfo(emailUser char(30))
BEGIN
	SELECT * FROM `v_Parents` WHERE `email`=emailUser;
END;

CREATE PROCEDURE getAllAdmins()
BEGIN
	SELECT * FROM `admins` ORDER BY `sn`, `fn`, `pt`;
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




/* Работа с детьми */

CREATE PROCEDURE setChild(p_email char(30), s_email char(30), type_relation int)
BEGIN
  INSERT INTO `parent_child` (`id_parent`, `id_children`, `id_type_relation`) VALUES (getParentId(p_email), getStudentId(s_email), type_relation);
END;

CREATE PROCEDURE unsetChild(emailParent char(30), emailStudent char(30))
BEGIN
	DELETE FROM `parent_child` WHERE `id_parent`=getParentId(emailParent) AND `id_children`=getStudentId(emailStudent);
END;

CREATE PROCEDURE changeRelation(emailParent char(30), emailStudent char(30), new_id_relation int)
BEGIN
	UPDATE `parent_child`
	SET `id_type_relation`=new_id_relation
	WHERE `id_parent`=getParentId(emailParent) AND `id_children`=getStudentId(emailStudent);
END;

CREATE PROCEDURE getChilds(emailParent char(30))
BEGIN
	SELECT  u.sn, 
			u.fn, 
			u.pt, 
            u.email, 
            u.passwd, 
            s.home_address, 
            s.cell_phone, 
            g.description as 'group', 
            sp.description as 'specialty', 
            r.description as 'relation'
	FROM `parent_child` pc
		INNER JOIN `users`     u  ON pc.id_children      = u.id_user
		INNER JOIN `students`  s  ON u.id_user           = s.id_student
		INNER JOIN `groups`    g  ON s.grp               = g.grp
		INNER JOIN `specialty` sp ON g.spec_id           = sp.id_spec
		INNER JOIN `relations` r  ON pc.id_type_relation = r.id_relation
	WHERE pc.id_parent=getParentId(emailParent)
	ORDER BY u.fn, u.sn, u.pt;
END;


/* Работа с предметами для преподавателя */

CREATE PROCEDURE setSubject(emailTeacher char(30), subject_id int)
BEGIN
  INSERT INTO `teacher_subjects` (`id_teacher`, `id_subject`) VALUES (getTeacherId(emailTeacher), subject_id);
END;

CREATE PROCEDURE unsetSubject(emailTeacher char(30), subject_id int)
BEGIN
	DELETE FROM `teacher_subjects` WHERE `id_teacher`=getTeacherId(emailTeacher) AND `id_subject`=subject_id;
END;

CREATE PROCEDURE getSubjects(emailTeacher char(30)) /* Для отображения предметов в его аккаунте  */
BEGIN
  SELECT s.description, s.id_subject
	FROM `subjects` s 
		INNER JOIN `teacher_subjects` ts ON s.id_subject=ts.id_subject
	WHERE ts.id_teacher=getTeacherId(emailTeacher)
	ORDER BY `description`;
END;

/*
	Выбирает все выбранные преподавателем предметы
*/

CREATE PROCEDURE getUnsetSubjects(emailTeacher char(30))
BEGIN	
	SELECT s.id_subject, s.description FROM `subjects` s
		LEFT JOIN `teacher_subjects` ts ON s.id_subject=ts.id_subject AND ts.id_teacher=getTeacherId(emailTeacher)
	WHERE ts.id_subject is null;
END;




//

DELIMITER ;
