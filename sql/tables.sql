DROP database IF EXISTS `iep`;
CREATE database IF NOT EXISTS `iep` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `iep`;

/* Создание таблицы "Пользователи" */
CREATE TABLE `users` (
	id_user int AUTO_INCREMENT PRIMARY KEY,
	second_name char(30) NOT NULL,
	first_name char(30) NOT NULL,
	patronymic char(30) NOT NULL,
	email char(30) NOT NULL UNIQUE,
	password char(32) NOT NULL,
	id_type_user int NOT NULL,
	INDEX (id_type_user)
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
	description char(30) NOT NULL
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
	cell_phone char(18) NOT NULL,
	grp int NOT NULL,
	INDEX (grp)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Группы" */
CREATE TABLE `groups` (
	grp int  PRIMARY KEY,
	code_spec int NOT NULL,
	is_budget boolean NOT NULL,
	INDEX (code_spec)
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Специальности" */
CREATE TABLE `specialty` (
	id_spec int AUTO_INCREMENT PRIMARY KEY,
	code_spec char(10) NOT NULL UNIQUE,
	description char(255) NOT NULL,
	current_file char(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родители" */
CREATE TABLE `parents` (
	id_parent int PRIMARY KEY,
	age int(2) NOT NULL,
	education char(50) NOT NULL,
	work_place char(255) NOT NULL,
	post char(255) NOT NULL,
	home_phone int(10) NOT NULL,
	cell_phone int(10) NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

/* Создание таблицы "Родитель-ребёнок" */
CREATE TABLE `parent_child` (
	id_parent int NOT NULL,
	id_children int NOT NULL,
	id_type_releation int NOT NULL,
	INDEX (id_children),
	INDEX (id_type_releation),
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
	id_news int PRIMARY KEY,
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


/* УСТАНОВКА СВЯЗЕЙ */


/* Связка таблицы "Users" с таблицей "typeUsers" */
ALTER TABLE `users` ADD CONSTRAINT typeUser_to_users FOREIGN KEY (id_type_user) REFERENCES `typeUser` (id_type_user) ON UPDATE  CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "users" */
ALTER TABLE `students` ADD CONSTRAINT student_to_user FOREIGN KEY (id_student) REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "parents" с таблицей "users" */
ALTER TABLE `parents` ADD CONSTRAINT parent_to_user FOREIGN KEY (id_parent) REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "groups" */
ALTER TABLE `students` ADD CONSTRAINT student_to_group FOREIGN KEY (grp) REFERENCES `groups` (grp) ON UPDATE CASCADE;

/* Связка таблицы "groups" с таблицей "specialty" */
ALTER TABLE `groups` ADD CONSTRAINT group_to_specialty FOREIGN KEY (code_spec) REFERENCES `specialty` (id_spec) ON UPDATE CASCADE;

/* Связка таблицы "parents" с таблицей "parent_child" */
ALTER TABLE `parent_child` ADD CONSTRAINT parent_to_pc FOREIGN KEY (id_parent) REFERENCES `parents` (id_parent) ON UPDATE CASCADE;

/* Связка таблицы "students" с таблицей "parent_child" */
ALTER TABLE `parent_child` ADD CONSTRAINT student_to_pc FOREIGN KEY (id_children) REFERENCES `students` (id_student) ON UPDATE CASCADE;

/* Связка таблицы "parent_child" с таблицей "releations" */
ALTER TABLE `parent_child` ADD CONSTRAINT relations_pc FOREIGN KEY (id_type_releation) REFERENCES `relations` (id_relation) ON UPDATE CASCADE;

/* Связка таблицы "teachers" с таблицей "users" */
ALTER TABLE `teachers` ADD CONSTRAINT teacher_to_user FOREIGN KEY (id_teacher) REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "news" с таблицей "teachers" */
ALTER TABLE `news` ADD CONSTRAINT news_to_teacher FOREIGN KEY (id_author) REFERENCES `teachers` (id_teacher) ON UPDATE CASCADE;

/* Связка таблицы "teacher_subjects" с таблицей "teachers" */
ALTER TABLE `teacher_subjects` ADD CONSTRAINT teachers_to_subjects_1 FOREIGN KEY (id_teacher) REFERENCES  `teachers` (id_teacher) ON UPDATE CASCADE;

/* Связка таблицы "teacher_subjects" с таблицей "subjects" */
ALTER TABLE `teacher_subjects` ADD CONSTRAINT teachers_to_subjects_2 FOREIGN KEY (id_subject) REFERENCES  `subjects` (id_subject) ON UPDATE CASCADE;


/* Связка таблицы "teachers" с таблицей "tests" */
ALTER TABLE `tests` ADD CONSTRAINT teacher_tests FOREIGN KEY(`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "subjects" */
ALTER TABLE `tests` ADD CONSTRAINT test_subject FOREIGN KEY(`id_subject`) REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "questions" */
ALTER TABLE `questions` ADD CONSTRAINT test_questions FOREIGN KEY(`id_test`) REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "questions" с таблицей "answers" */
ALTER TABLE `answers` ADD CONSTRAINT question_answers FOREIGN KEY(`id_question`) REFERENCES `questions` (`id_question`) ON UPDATE CASCADE ON DELETE CASCADE; 



/*

CREATE TABLE `` (

) ENGINE = InnoDB CHARACTER SET = UTF8;

*/