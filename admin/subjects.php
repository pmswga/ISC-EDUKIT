<?php
  
  require_once "start.php";
  
  use IEP\Managers\SubjectManager;
  use IEP\Structures\Subject;
  
	if (isset($_SESSION['admin'])) {		
		
		$SM = new SubjectManager($DB);
		
		$CT->assign("subjects", $SM->getAllSubjects());
		
		$CT->Show("subjects.tpl");
		
		if (!empty($_POST['addSubjectButton'])) {
			$subject = trim(htmlspecialchars($_POST['subject']));
			
      if (!empty($subject)) {
        $new_subject = new Subject($subject);
        
        if ($SM->add($new_subject)) {
          CTools::Redirect("subjects.php");
        }        
      }
			
		}
		
		if (!empty($_POST['removeSubjectButton'])) {
			$select_subject = $_POST['select_subject'];
			
      if (!empty($select_subject)) {        
        for ($i = 0; $i < count($select_subject); $i++) {
          $SM->remove($select_subject[$i]);
        }
        
        CTools::Redirect("subjects.php");
      }
      
		}
		
	}
	else CTools::Redirect("login.php");
	
  
?>