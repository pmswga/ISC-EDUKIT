<?php
	
	require_once "../start.php";
	require_once "../iep/structures/testquestion.class.php";
  require_once "../iep/structures/studenttest.class.php";
  
  use IEP\Structures\TestQuestion;
  use IEP\Structures\Subject;
  use IEP\Structures\StudentTest;
  
  $update = function () {
    CTools::Message("404 Not Found");
    CTools::Redirect("../user.php");
  };
  
	if (!empty($_GET['test']) && !empty($_SESSION['user'])) {
    
		if ($_SESSION['user']->getUserType() == USER_TYPE_STUDENT) {
      
			$test_id = (int)$_GET['test'];
			
			if ($test_id > 0) {
        
        define('THIS_PAGE', basename(__FILE__)."?test=".$test_id);
        
        $test = $TM->getStudentTest($_SESSION['user']->getEmail(), $test_id);
        
        if (!empty($test)) {          
          $answers = $TM->getStudentAnswers($test_id);
          $test->setAnswers($answers);
          
          $CT->assign("test", $test);
          
          $CT->Show("tests/info_about_completed_test.tpl");
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