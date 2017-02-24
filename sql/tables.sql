DROP DATABASE IF EXISTS `iep`;
CREATE DATABASE IF NOT EXISTS `iep` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `iep`;

/* Создание таблицы "Пользователи" */
CREATE TABLE `users` (
	id_user int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	second_name char(30) NOT NULL,
	first_name char(30) NOT NULL,
	patronymic char(30) NOT NULL,
	email char(30) NOT NULL UNIQUE,
	password char(32) NOT NULL,
	id_type_user int NOT NULL,
	INDEX (id_type_user),
	CONSTRAINT uc_sn CHECK(second_name <> NULL AND second_name <> ''),
	CONSTRAINT uc_fn CHECK(first_name <> NULL AND first_name <> ''),
	CONSTRAINT uc_pt CHECK(patronymic <> NULL AND patronymic <> ''),
	CONSTRAINT uc_email CHECK(email <> NULL AND email <> ''),
	CONSTRAINT uc_password CHECK(password <> NULL AND password <> ''),
	CONSTRAINT uc_type_user CHECK(id_type_user <> NULL AND id_type_user > 0 AND id_type_user <> 0)
) ENGINE = InnoDB	 CHARACTER SET = UTF8;

/*
	
	Создание таблицы `typeUser`
	
	И добавление следующих типов пользователей:
		1 - ADMIN
		2 - TEACHER
		3 - ELDER
		4 - STUDNET
		5 - PARENT
	
*/
CREATE TABLE `typeUser` (
	id_type_user int AUTO_INCREMENT PRIMARY KEY,
	description char(30) NOT NULL,
	CONSTRAINT tuc_desc CHECK(description <> NULL AND description <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `typeUser` (`description`) VALUES ('ADMIN');
INSERT INTO `typeUser` (`description`) VALUES ('TEACHER');
INSERT INTO `typeUser` (`description`) VALUES ('ELDER');
INSERT INTO `typeUser` (`description`) VALUES ('STUDENT');
INSERT INTO `typeUser` (`description`) VALUES ('PARENT');

/* Создание таблицы "Студенты" */
CREATE TABLE `students` (
	id_student int PRIMARY KEY,
	home_address char(255) NOT NULL,
	cell_phone char(30) NOT NULL,
	grp int NOT NULL,
	INDEX (grp),
	CONSTRAINT sc_ha CHECK(home_address <> NULL AND home_address <> ''),
	CONSTRAINT sc_cp CHECK(cell_phone <> NULL AND cell_phone <> ''),
	CONSTRAINT sc_grp CHECK(grp <> NULL AND grp > 0)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Группы" */
CREATE TABLE `groups` (
	grp int AUTO_INCREMENT PRIMARY KEY,
	description char(10) NOT NULL,
	code_spec int NOT NULL,
	is_budget boolean NOT NULL,
	INDEX (code_spec),
	CONSTRAINT gc_desc CHECK(description <> NULL AND description <> ''),
	CONSTRAINT gc_cs CHECK(code_spec <> NULL AND code_spec > 0),
	CONSTRAINT gc_is_budget CHECK(is_budget <> NULL)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Специальности" */
CREATE TABLE `specialty` (
	id_spec int AUTO_INCREMENT PRIMARY KEY,
	code_spec char(10) NOT NULL UNIQUE,
	description char(255) NOT NULL,
	pdf_file char(255) NOT NULL,
	CONSTRAINT sc_cs CHECK(code_spec <> NULL AND code_spec <> ''),
	CONSTRAINT sc_desc CHECK(description <> NULL AND description <> ''),
	CONSTRAINT sc_file CHECK(pdf_file <> NULL AND pdf_file <> '')
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родители" */
CREATE TABLE `parents` (
	id_parent int PRIMARY KEY,
	age int(2) NOT NULL,
	education char(50) NOT NULL,
	work_place char(255) NOT NULL,
	post char(255) NOT NULL,
	home_phone char(20) NOT NULL,
	cell_phone char(20) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родитель-ребёнок" */
CREATE TABLE `parent_child` (
	id_parent int NOT NULL,
	id_children int NOT NULL,
	id_type_relation int NOT NULL,
	INDEX (id_children),
	INDEX (id_type_relation),
	PRIMARY KEY (id_parent, id_children)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Отношения" */
CREATE TABLE `relations` (
	id_relation int AUTO_INCREMENT PRIMARY KEY,
	description char(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

INSERT INTO `relations` (`description`) VALUES ('Мама');
INSERT INTO `relations` (`description`) VALUES ('Папа');
INSERT INTO `relations` (`description`) VALUES ('Бабушка');
INSERT INTO `relations` (`description`) VALUES ('Дедушка');
INSERT INTO `relations` (`description`) VALUES ('Отчим');
INSERT INTO `relations` (`description`) VALUES ('Не определён');

/* Создание таблицы "Преподаватели" */
CREATE TABLE `teachers` (
	id_teacher int PRIMARY KEY,
	info TEXT NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Новости" */
CREATE TABLE `news` (
	id_news int AUTO_INCREMENT PRIMARY KEY,
	caption char(255) NOT NULL UNIQUE,
	content text NOT NULL,
	id_author int NOT NULL,
	date_publication date NOT NULL,
	INDEX (id_author)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Предметы" */
CREATE TABLE `subjects` (
	id_subject int AUTO_INCREMENT PRIMARY KEY,
	description char(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Преподаватели-предметы" */
CREATE TABLE `teacher_subjects` (
	id_teacher int NOT NULL,
	id_subject int NOT NULL,
	INDEX (id_subject),
	PRIMARY KEY (id_teacher, id_subject)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Тесты" */
CREATE TABLE `tests` (
	id_test int AUTO_INCREMENT PRIMARY KEY,
	id_subject int NOT NULL,
	id_teacher int NOT NULL,
	INDEX(id_subject),
	INDEX(id_teacher),
	for_group char(255) NOT NULL,
	caption char(255) NOT NULL UNIQUE
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Вопросы" */
CREATE TABLE `questions` (
	id_question int AUTO_INCREMENT PRIMARY KEY,
	id_test int NOT NULL,
	INDEX(id_test),
	question char(255) NOT NULL UNIQUE,
	r_answer char(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответы" */
CREATE TABLE `answers` (
	id_answer int AUTO_INCREMENT PRIMARY KEY,
	id_question int NOT NULL,
	INDEX(id_question),
	answer char(255) NOT NULL UNIQUE
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответов студентов на тесты" */
CREATE TABLE IF NOT EXISTS `student_test` (
  `id_student_test` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_student` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `date_passage` date NOT NULL,
  INDEX(id_student),
  INDEX(id_test)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Ответы студентов" */
CREATE TABLE IF NOT EXISTS `student_answer` (
  `id_student_test` int(11) NOT NULL PRIMARY KEY,
  `id_question` int(11) NOT NULL,
  `answer` char(255) NOT NULL,
  INDEX(id_question)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Посещаемости" */
CREATE TABLE `student_traffic` (
  `id_traffic` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_student` int(11) NOT NULL,
  `date_traffic` date NOT NULL,
  INDEX(id_student)
) ENGINE = InnoDB CHARACTER SET = UTF8;
