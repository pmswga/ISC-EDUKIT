<?php
	
	require_once "../start.php";
	require_once "../iep/structures/testquestion.class.php";
  
  use IEP\Structures\TestQuestion;
  use IEP\Structures\Subject;
  
	if (!empty($_GET['test']) && !empty($_SESSION['user'])) {
		if ($_SESSION['user']->getUserType() == USER_TYPE_TEACHER) {
      
			$test_id = (int)$_GET['test'];
			
			if ($test_id > 0) {
        
        define('THIS_PAGE', basename(__FILE__)."?test=".$test_id);
        
				$user = $_SESSION['user'];
				$test = $TM->getTest($test_id);
        $test->setGroups($GM->getGroups($test_id));
        $unset_groups = $GM->getUnsetGroups($test_id);
        
				$CT->assign("test", $test);
				$CT->assign("other_groups", $unset_groups);
				// $CT->assign("subjects", $subjects);
				$CT->Show("tests/info.tpl");
				
				if (!empty($_POST['removeQuestionButton'])) {
					$select_question = $_POST['select_question'];
					
					if (!empty($select_question)) {
						$result = true;
						for ($i = 0; $i < count($select_question); $i++) {
							$result *= $TM->removeQuestion($select_question[$i]);
						}
						
						if ($result) {
							CTools::Message("Вопросы удалены");
						} else {
							CTools::Message("Произошла ошибка");
						}
						
						CTools::Redirect(THIS_PAGE);
						
					} else {
						CTools::Message("Вы не выбрали вопрос/вопросы");
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
					
					CTools::Redirect(THIS_PAGE);
				}
				
				if (!empty($_POST['addQuestionButton'])) {
					$question_caption = htmlspecialchars($_POST['question_caption']);
					$question_r_answer = htmlspecialchars($_POST['question_r_answer']);
					
					$answer_text = $_POST['answer_text'];
					$select_answers = $_POST['select_answers'];
					
          if (!empty($select_answers)) {   
            $answers = array();
            for ($i = 0; $i < count($select_answers); $i++) {
              $answers[] = $answer_text[$i];
            }
            $answers[] = $question_r_answer;
            
            $new_question = new TestQuestion($question_caption, $question_r_answer, $answers);
            
            if ($TM->addQuestion($test_id, $new_question)) {
              CTools::Message("Вопрос добавлен");
            } else {
              CTools::Message("Произошла ошибка");
            }
            
            CTools::Redirect(THIS_PAGE);
          } else {
            CTools::Message("Вы не выбрали ответы");
          }
          
				}
				
				if (!empty($_POST['editQuestionButton'])) {
					$select_question = $_POST['select_question'];
					$question = $_POST['question'];
					$questionRAnswer = $_POST['questionRAnswer'];
          
          
					if (!empty($select_question)) {
            
            $result = true;
            for ($i = 0; $i < count($select_question); $i++) {              
              $question = $_POST['question_'.$select_question[$i]];
              $rAnswer = $_POST['questionRAnswer_'.$select_question[$i]];
              
							$result *= $TM->changeCaptionQuestion($select_question[$i], $question);
							$result *= $TM->changeRAnswerQuestion($select_question[$i], $rAnswer);
            }
            
            
						if ($result == true) {
							CTools::Message("Изменения применены");
						} else {
							CTools::Message("Изменения применены");
						}
						
						CTools::Redirect(THIS_PAGE);
            
					}
				}
				
				if (!empty($_POST['setGroupsButton'])) {
					$select_group = $_POST['select_group'];
					
					$result = true;
					for ($i = 0; $i < count($select_group); $i++) {
						$result *= $TM->setGroup($test_id, $select_group[$i]);
					}
					
					if ($result) {
						CTools::Message("Группы назначены");
					} else {
						CTools::Message("Произошла ошибка");
					}
					
					CTools::Redirect(THIS_PAGE);
				}
				
        
				if (!empty($_POST['unsetGroupButton'])) {
					$select_group = $_POST['select_group'];
					
					$result = true;
					for ($i = 0; $i < count($select_group); $i++) {
						$result *= $TM->unsetGroup($test_id, $select_group[$i]);
					}
					
					if ($result) {
						CTools::Message("Группы убраны");
					} else {
						CTools::Message("Произошла ошибка");
					}
					
					CTools::Redirect(THIS_PAGE);
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