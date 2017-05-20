<?php
	
	require_once "../start.php";
	
	if (!empty($_SESSION['user']) && !empty($_GET['test_id'])) {
		
		if ($_SESSION['user']->getUserType() == USER_TYPE_STUDENT) {
			
			$test_id = (int)$_GET['test_id'];
			
			if ($test_id > 0) {
				
				$user = $_SESSION['user'];
				$test = $TM->getTest($test_id);
				
				$CT->assign("test", $test);
				
				$CT->show("tests/complete.tpl");
				
				if (!empty($_POST['completeTestButton'])) {
					
					$questions = $test->getQuestions();
					$mark = 0;
					$student_answers = array();
					for ($i = 0; $i < count($questions); $i++) {
						$student_answers[] = $_POST['question_'.($i+1)];
						$student_answer = $_POST['question_'.($i+1)];
						
						if ($student_answer == $questions[$i]->getRAnswer()) {
							$mark += 1;
						}
					}
					
					$result = (($mark*100)/count($questions));
					
					if ($result == 100) {
						echo "5";
					} elseif ($result > 50) {
						echo "4";
					} elseif ($result <= 50) {
						echo "3";
					} elseif ($result < 25) {
						echo "2";
					}
					
					CTools::var_dump($student_answers);
					
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