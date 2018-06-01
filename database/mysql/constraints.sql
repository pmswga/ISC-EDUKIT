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



/* Связка таблицы "student_test" с таблицей "tests" */
ALTER TABLE `student_tests`    ADD CONSTRAINT R18 FOREIGN KEY (`id_student_test`) REFERENCES `tests` (`id_test`) ON UPDATE NO ACTION ON DELETE NO ACTION ;

/* Связка таблицы "student_test" с таблицей "students" */
ALTER TABLE `student_tests`    ADD CONSTRAINT R19 FOREIGN KEY (`id_student`)      REFERENCES `students` (`id_student`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "student_questions" с таблицей "student-tests" */
ALTER TABLE `student_answers`  ADD CONSTRAINT R20 FOREIGN KEY (`id_student_test`) REFERENCES `student_tests` (`id_student_test`) ON UPDATE CASCADE ON DELETE CASCADE;







/* Связка таблицы "student_traffic" с таблицей "students" */
ALTER TABLE `student_traffic`  ADD CONSTRAINT R21 FOREIGN KEY (`id_student`)      REFERENCES `students` (`id_student`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "groups" с таблицей "groups_tests" */
ALTER TABLE `groups_tests`     ADD CONSTRAINT R22 FOREIGN KEY(`id_group`)         REFERENCES `groups` (`grp`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "tests" с таблицей "groups_tests" */
ALTER TABLE `groups_tests`     ADD CONSTRAINT R23 FOREIGN KEY(`id_test`)          REFERENCES `tests` (`id_test`) ON UPDATE CASCADE ON DELETE CASCADE;





/* Связка таблицы "schedule" с таблицей "groups" */
ALTER TABLE `schedule`  ADD CONSTRAINT R24 FOREIGN KEY (`id_grp`)      REFERENCES `groups` (`grp`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "schedule" с таблицей "subjects" */
ALTER TABLE `schedule`  ADD CONSTRAINT R25 FOREIGN KEY (`subj_1`)      REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE `schedule`  ADD CONSTRAINT R26 FOREIGN KEY (`subj_2`)      REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;



/* Связка таблицы "schedule" с таблицей "groups" */
ALTER TABLE `changed_schedule`  ADD CONSTRAINT R27 FOREIGN KEY (`id_grp`)      REFERENCES `groups` (`grp`) ON UPDATE CASCADE ON DELETE CASCADE;

/* Связка таблицы "schedule" с таблицей "subjects" */
ALTER TABLE `changed_schedule`  ADD CONSTRAINT R28 FOREIGN KEY (`subject`)      REFERENCES `subjects` (`id_subject`) ON UPDATE CASCADE ON DELETE CASCADE;