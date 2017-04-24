<?php
	
	require_once "../start.php";
	
	if (!empty($_SESSION['user']) && !empty($_GET['test_id'])) {
		
		if ($_SESSION['user']->getTypeUser() == USER_TYPE_STUDENT) {
			
			$test_id = (int)$_GET['test_id'];
			
			if ($test_id > 0) {
				
				$user = $_SESSION['user'];
				$test = $TM->getTest($test_id);
				
				$CT->assign("test", $test);
				
				$CT->show("tests/complete.tpl");
				
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