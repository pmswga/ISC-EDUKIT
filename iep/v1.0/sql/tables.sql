DROP DATABASE IF EXISTS `iep`;
CREATE DATABASE IF NOT EXISTS `iep` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `iep`;

/* Создание таблицы "Пользователи" */
CREATE TABLE IF NOT EXISTS `users` (
	id_user int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	sn varchar(30) NOT NULL,
	fn varchar(30) NOT NULL,
	pt varchar(30) NOT NULL,
	email varchar(255) NOT NULL UNIQUE,
	passwd varchar(32) NOT NULL,
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
	description varchar(30) NOT NULL UNIQUE,
	CONSTRAINT tuc_desc CHECK(description <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `typeUser` (`description`) VALUES ('TEACHER');
INSERT INTO `typeUser` (`description`) VALUES ('ELDER');
INSERT INTO `typeUser` (`description`) VALUES ('STUDENT');
INSERT INTO `typeUser` (`description`) VALUES ('PARENT');

/* Создание таблицы "Администраторы" */
CREATE TABLE IF NOT EXISTS `admins` (
	id_admin int AUTO_INCREMENT PRIMARY KEY,
	sn varchar(30) NOT NULL,
	fn varchar(30) NOT NULL,
	pt varchar(30) NOT NULL,
	email varchar(30) UNIQUE,
	passwd varchar(32) NOT NULL,
	CONSTRAINT ac_sn CHECK (sn <> ''),
	CONSTRAINT ac_fn CHECK (fn <> ''),
	CONSTRAINT ac_pt CHECK (pt <> ''),
	CONSTRAINT ac_email CHECK (email <> ''),
	CONSTRAINT ac_passwd CHECK (passwd <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Студенты" */
CREATE TABLE IF NOT EXISTS `students` (
	id_student int PRIMARY KEY,
	home_address varchar(255) NOT NULL,
	cell_phone varchar(12) NOT NULL,
	grp int NOT NULL,
	INDEX (grp),
	CONSTRAINT sc_ha CHECK(home_address <> ''),
	CONSTRAINT sc_cp CHECK(cell_phone <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Группы" */
CREATE TABLE IF NOT EXISTS `groups` (
	grp int AUTO_INCREMENT PRIMARY KEY,
	description varchar(10) NOT NULL,
	edu_year varchar(10) NOT NULL,
	spec_id int NOT NULL,
	is_budget int NOT NULL,
	INDEX (spec_id),
	CONSTRAINT gc_desc CHECK(description <> ''),
	CONSTRAINT gc_year CHECK(edu_year <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Специальности" */
CREATE TABLE IF NOT EXISTS `specialty` (
	id_spec int AUTO_INCREMENT PRIMARY KEY,
	code_spec varchar(10) NOT NULL UNIQUE,
	description varchar(255) NOT NULL,
	pdf_file varchar(255) NOT NULL,
	CONSTRAINT sc_cs CHECK(code_spec <> ''),
	CONSTRAINT sc_desc CHECK(description <> ''),
	CONSTRAINT sc_file CHECK(pdf_file <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родители" */
CREATE TABLE IF NOT EXISTS `parents` (
	id_parent int NOT NULL PRIMARY KEY,
	age int NOT NULL,
	education varchar(50) NOT NULL,
	work_place varchar(255) NOT NULL,
	post varchar(255) NOT NULL,
	home_phone varchar(30) NOT NULL,
	cell_phone varchar(30) NOT NULL,
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
	description varchar(255) NOT NULL,
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
	caption varchar(255) NOT NULL,
	content text NOT NULL,
	id_author int NOT NULL,
	date_publication datetime NOT NULL,
	INDEX (id_author),
	CONSTRAINT nc_caption CHECK(caption <> ''),
	CONSTRAINT nc_content CHECK(content <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Предметы" */
CREATE TABLE IF NOT EXISTS `subjects` (
	id_subject int AUTO_INCREMENT PRIMARY KEY,
	description varchar(255) NOT NULL UNIQUE,
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
	caption varchar(255) NOT NULL,
	CONSTRAINT tc_caption CHECK(caption <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Вопросы" */
CREATE TABLE IF NOT EXISTS `questions` (
	id_question int AUTO_INCREMENT PRIMARY KEY,
	id_test int NOT NULL,
	INDEX(id_test),
	question varchar(255) NOT NULL,
	r_answer varchar(255) NOT NULL,
	CONSTRAINT qc_question CHECK(question <> ''),
	CONSTRAINT qc_ranswer CHECK(r_answer <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответы" */
CREATE TABLE IF NOT EXISTS `answers` (
	id_answer int AUTO_INCREMENT PRIMARY KEY,
	id_question int NOT NULL,
	INDEX(id_question),
	answer varchar(255) NOT NULL,
	CONSTRAINT ac_answer CHECK(answer <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответов студентов на тесты" */
CREATE TABLE IF NOT EXISTS `student_tests` (
	id_student_test int,
	id_student int,
	caption varchar(255) NOT NULL,
	subject varchar(255) NOT NULL,
	date_pass datetime NOT NULL,
	mark int,
	INDEX(id_student),
    PRIMARY KEY(id_student_test, id_student),
	CONSTRAINT stc_subject CHECK(subject <> ''),
	CONSTRAINT stc_mark CHECK((mark >= 2) AND (mark <= 5))
) ENGINE = InnoDB CHARACTER SET = UTF8;


/* Создание таблицы "Ответы студентов" */
CREATE TABLE IF NOT EXISTS `student_answers` (
	id_student_answer int AUTO_INCREMENT PRIMARY KEY,
	id_student_test int NOT NULL,
	question varchar(255),
	answer varchar(255),
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
	caption varchar(255) NOT NULL,
	content text NOT NULL,
	id_author int NOT NULL,
	date_publication datetime NOT NULL,
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
  _day int,
  pair int,
  subj_1 int NOT NULL,
  subj_2 int NOT NULL,
  PRIMARY KEY(id_grp, pair, _day)
) ENGINE = InnoDB CHARACTER SET = UTF8;

CREATE TABLE IF NOT EXISTS `changed_schedule` (
  id_grp int,
  _day datetime,
  pair int,
  subject int NOT NULL,
  PRIMARY KEY(id_grp, pair, _day)
) ENGINE = InnoDB CHARACTER SET = UTF8;
