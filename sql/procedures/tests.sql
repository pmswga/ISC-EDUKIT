use `iep`;

DROP PROCEDURE IF EXISTS addTest;
DROP PROCEDURE IF EXISTS removeTest;
DROP PROCEDURE IF EXISTS changeCaptionTest;
DROP PROCEDURE IF EXISTS changeSubjectTest;
DROP PROCEDURE IF EXISTS setGroup;
DROP PROCEDURE IF EXISTS unsetGroup;

DROP PROCEDURE IF EXISTS getTestsForGroup;
DROP PROCEDURE IF EXISTS getTestGroups;
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

DROP PROCEDURE IF EXISTS putStudentAnswer;
DROP PROCEDURE IF EXISTS getStudentAnswers;

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
	SELECT id_test, id_teacher, caption, id_subject FROM `tests` t
		INNER JOIN `groups_tests` gt ON t.id_test=gt.id_test
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

CREATE PROCEDURE putStudentAnswer(student_id int, subject char(255), date_pass date, mark int)
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

//

DELIMITER ;