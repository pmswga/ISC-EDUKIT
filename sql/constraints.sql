USE `iep`;

/* УСТАНОВКА СВЯЗЕЙ */

/* Связка таблицы "Users" с таблицей "typeUsers" */
ALTER TABLE `users` ADD CONSTRAINT typeUser_to_users FOREIGN KEY (id_type_user) REFERENCES `typeUser` (id_type_user) ON UPDATE CASCADE ON DELETE CASCADE; 

/* Связка таблицы "students" с таблицей "users" */
ALTER TABLE `students` ADD CONSTRAINT student_to_user FOREIGN KEY (id_student) REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE; 

/* Связка таблицы "parents" с таблицей "users" */
ALTER TABLE `parents` ADD CONSTRAINT parent_to_user FOREIGN KEY (id_parent) REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "groups" */
ALTER TABLE `students` ADD CONSTRAINT student_to_group FOREIGN KEY (grp) REFERENCES `groups` (grp) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "groups" с таблицей "specialty" */
ALTER TABLE `groups` ADD CONSTRAINT group_to_specialty FOREIGN KEY (code_spec) REFERENCES `specialty` (id_spec) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "parents" с таблицей "parent_child" */
ALTER TABLE `parent_child` ADD CONSTRAINT parent_to_pc FOREIGN KEY (id_parent) REFERENCES `parents` (id_parent) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "students" с таблицей "parent_child" */
ALTER TABLE `parent_child` ADD CONSTRAINT student_to_pc FOREIGN KEY (id_children) REFERENCES `students` (id_student) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "parent_child" с таблицей "releations" */
ALTER TABLE `parent_child` ADD CONSTRAINT relations_pc FOREIGN KEY (id_type_relation) REFERENCES `relations` (id_relation) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teachers" с таблицей "users" */
ALTER TABLE `teachers` ADD CONSTRAINT teacher_to_user FOREIGN KEY (id_teacher) REFERENCES `users` (id_user) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "news" с таблицей "teachers" */
ALTER TABLE `news` ADD CONSTRAINT news_to_teacher FOREIGN KEY (id_author) REFERENCES `teachers` (id_teacher) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teacher_subjects" с таблицей "teachers" */
ALTER TABLE `teacher_subjects` ADD CONSTRAINT teachers_to_subjects_1 FOREIGN KEY (id_teacher) REFERENCES  `teachers` (id_teacher) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teacher_subjects" с таблицей "subjects" */
ALTER TABLE `teacher_subjects` ADD CONSTRAINT teachers_to_subjects_2 FOREIGN KEY (id_subject) REFERENCES  `subjects` (id_subject) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "teachers" с таблицей "tests" */
ALTER TABLE `tests` ADD CONSTRAINT teacher_tests FOREIGN KEY(`id_teacher`) REFERENCES `teachers` (`id_teacher`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "subjects" */
ALTER TABLE `tests` ADD CONSTRAINT test_subject FOREIGN KEY(`id_subject`) REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "questions" */
ALTER TABLE `questions` ADD CONSTRAINT test_questions FOREIGN KEY(`id_test`) REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "questions" с таблицей "answers" */
ALTER TABLE `answers` ADD CONSTRAINT question_answers FOREIGN KEY(`id_question`) REFERENCES `questions` (`id_question`) ON UPDATE CASCADE ON DELETE CASCADE; 

/* Связка таблицы "student_test" с таблицей "students" */
ALTER TABLE `student_test` ADD CONSTRAINT students_tests FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "student_test" с таблицей "tests" */
ALTER TABLE `student_test` ADD CONSTRAINT stud_test FOREIGN KEY (`id_test`) REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "student_answer" с таблицей "student_test" */
ALTER TABLE `student_answer` ADD CONSTRAINT students_answers FOREIGN KEY (`id_student_test`) REFERENCES `student_test` (`id_student_test`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "student_answer" с таблицей "questions" */
ALTER TABLE `student_answer` ADD CONSTRAINT stud_questionstudent_answer FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "student_traffic" с таблицей "students" */
ALTER TABLE `student_traffic` ADD CONSTRAINT stud_traffic FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "groups" с таблицей "groups_tests" */
ALTER TABLE `groups_tests` ADD CONSTRAINT grp_test FOREIGN KEY(`id_group`) REFERENCES `groups` (`grp`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "groups_tests" */
ALTER TABLE `groups_tests` ADD CONSTRAINT gt FOREIGN KEY(`id_test`) REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;
