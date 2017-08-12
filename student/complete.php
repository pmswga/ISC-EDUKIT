<?php
	
	require_once "../start.php";  
  require_once "../iep/structures/studentanswer.class.php";
  
  use IEP\Structures\StudentAnswer;
	
  $update = function () {
    CTools::Message("404 Not Found");
    CTools::Redirect("../user.php");
  };
  
	if (!empty($_SESSION['user']) && !empty($_GET['test_id'])) {
		
		if (($_SESSION['user']->getUserType() == USER_TYPE_STUDENT) || 
        ($_SESSION['user']->getUserType() == USER_TYPE_ELDER)) {
			
			$test_id = (int)$_GET['test_id'];
      $user = $_SESSION['user'];
			
			if ($test_id > 0) {
        
        if ($TM->isGroupForTest($test_id, $user->getGroup()->getGroupID())) {
          
          $user = $_SESSION['user'];
          $test = $TM->getTest($test_id);
          
          $CT->assign("test", $test);
          
          $CT->show("tests/complete.tpl");
          
          if (!empty($_POST['completeTestButton'])) {
            
            $questions = $test->getQuestions();
            $student_questions = $_POST['questions'];
            
            $mark = 0;
            $student_results = array();
            for ($j = 0; $j < count($student_questions); $j++) {
              
              $student_result["question"] = $student_questions[$j];
              
              $student_result["answer"] = $_POST['answer_'.($j+1)];
              $student_answer = $_POST['answer_'.($j+1)];
                
              if ($student_answer == $questions[$j]->getRAnswer()) {
                $mark += 1;
              }
              
              $student_results[] = $student_result;
            }
            
            $result = (($mark*100)/count($questions));
            if (($result <= 100) && ($result >= 75)) {
              $mark = 5;
            } elseif (($result < 75) && ($result >= 50) ) {
              $mark = 4;
            } elseif (($result < 50) && ($result > 25)) {
              $mark = 3;
            } elseif ($result <= 25) {
              $mark = 2;
            }
            
            $new_student_answer = new StudentAnswer(
              $user, 
              $test->getSubject()->getDescription(),
              $test->getCaption(),
              $student_results,
              date("Y-m-d", time()), 
              $mark
            );
            
            if ($TM->putStudentAnswer($new_student_answer)) {
              CTools::Message("Результаты записаны");
            } else {
              CTools::Message("Ошибка");
            }
            
            CTools::Redirect("../user.php");
            
          }
          
        } else {
          $update();
        }
        
			} else {
        $update();
			}
			
		} else {
			$update();
		}
		
	} else {
    $update();
	}
	
?>