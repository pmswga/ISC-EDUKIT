<?php
	
	require_once "../start.php";
	
	if (!empty($_GET['test']) && !empty($_SESSION['user'])) {
		if ($_SESSION['user']->getTypeUser() == USER_TYPE_TEACHER) {
			
			$test_id = (int)$_GET['test'];
			
			if ($test_id > 0) {
				
				$user = $_SESSION['user'];
				$test = $TM->getTest($test_id);
				
				
				// Выборка предметов для теста
				$subjects = $user->getSubjects();
				$teacher_subjects = array();
				for ($i = 0; $i < count($subjects); $i++) {
					if ($subjects[$i]->getDescription() != $test->getSubject()->getDescription()) {
						$teacher_subjects[] = $subjects[$i];
					}
				}
				
				
				// Выборка групп, которые не назначены на прохождение данного теста
				$test_groups = $test->getGroups();
				$groups = $GM->getGroups();
				for ($i = 0; $i < count($test_groups); $i++) {
					unset($groups[array_search($test_groups[$i], $groups)]);
				}
				
				$CT->assign("test", $test);
				$CT->assign("other_groups", $groups);
				$CT->assign("subjects", $teacher_subjects);
				$CT->Show("tests/info.tpl");
				
				if (!empty($_POST['removeQuestionButton'])) {
					$select_question_test = $_POST['select_question_test'];
					
					if (!empty($select_question_test)) {
						
						$result = true;
						for ($i = 0; $i < count($select_question_test); $i++) {
							$result *= $TM->removeQuestion($select_question_test[$i]);
						}
						
						if ($result) {
							CTools::Message("Вопросы удалены");
						} else {
							CTools::Message("Произошла ошибка");
						}
						
						CTools::Redirect("aboutTest.php?test=".$test_id);
						
					} else {
						CTools::Message("Вы не выбрали вопрос/вопросы");
					}
					
				}
				
				if (!empty($_POST['removeGroupFromTestButton'])) {
					$for_groups = $_POST['select_group_test'];
					$test_id = $_POST['test_id'];
					
					if (!empty($for_groups)) {
						
						$result = true;
						for ($i = 0; $i < count($for_groups); $i++) {
							$result *= $TM->unsetGroup((int)$test_id, (int)$for_groups[$i]);
						}
						
						if ($result == true) {
							CTools::Message("Группы убраны");
						} else {
							CTools::Message("Произошла ошибка");
						}
						
						CTools::Redirect("aboutTest.php?test=".$test_id);
						
					} else {
						CTools::Message("Вы не выбрали группу/группы");
					}
				}
								
				if (!empty($_POST['saveTestInfoButton'])) {
					$test_caption = htmlspecialchars($_POST['testName']);
					$subject = $_POST['subject'];
					
					$result = true;
					$result *= $TM->changeCaptionTest($test_id, $test_caption);
					$result *= $TM->changeSubjectTest($test_id, $subject);
					
					if ($result == true) {
						CTools::Message("Изменения применены");
					} else {
						CTools::Message("Изменения применены");
					}
					
					CTools::Redirect("aboutTest.php?test=".$test_id);
				}
				
				
				if (!empty($_POST['editQuestionButton'])) {
					$select_question_tests = $_POST['select_question_test'];
					$question = $_POST['question'];
					$questionRAnswer = $_POST['questionRAnswer'];
					
					if (!empty($select_question_tests)) {
						
						$result = true;
						for ($i = 0; $i < count($select_question_tests); $i++) {
							$result *= $TM->changeCaptionQuestion($select_question_tests[$i], $question[$i]);
							$result *= $TM->changeRAnswerQuestion($select_question_tests[$i], $questionRAnswer[$i]);
						}
						
						if ($result == true) {
							CTools::Message("Изменения применены");
						} else {
							CTools::Message("Изменения применены");
						}
						
						CTools::Redirect("aboutTest.php?test=".$test_id);
						
					}
				}
				
				if (!empty($_POST['setGroupsButton'])) {
					$select_group = $_POST['select_group'];
					$test_id = $_POST['test_id'];
					
					$result = true;
					for ($i = 0; $i < count($select_group); $i++) {
						$result *= $TM->setGroup($test_id, $select_group[$i]);
					}
					
					if ($result) {
						CTools::Message("Группы назначены");
					} else {
						CTools::Message("Произошла ошибка");
					}
					
					CTools::Redirect("aboutTest.php?test=".$test_id);
				}
				
				
			} else {
				CTools::Message("404 Not Found");
				CTools::Redirect("../user.php");
			}
			
		} else {
			CTools::Message("404 Not Found");
			CTools::Redirect("../user.php");
		}
	} else {
		CTools::Message("404 Not Found");
		CTools::Redirect("../user.php");
	}
	
?>