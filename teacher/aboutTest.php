<?php
	
	require_once "../start.php";
	
	$test_id = (int)$_GET['test'];
	
	if (!empty($test_id) && ($test_id > 0)) {
		
		$test = $TM->getTest($test_id);
		
		$CT->assign("test", $test);
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
		
	} else {
		CTools::Message("404 Not Found");
		CTools::Redirect("../user.php");
	}
	
	
?>