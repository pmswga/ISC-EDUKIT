<?php
  
  require_once "start.php";
  
  use IEP\Managers\SubjectManager;
  use IEP\Structures\Subject;
  use IEP\Structures\User;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
		
		$SM = new SubjectManager($DB);
		
		$CT->assign("subjects", $SM->getAllSubjects());
		$CT->Show("subjects.tpl");
		
		if (!empty($_POST['addSubjectButton'])) {
			$subject = trim(htmlspecialchars($_POST['subject']));
			
      if (!empty($subject)) {
        $new_subject = new Subject($subject);
        
        if ($SM->add($new_subject)) {
          CTools::Message("Предмет успешно добавлен");
        } else {
          CTools::Message("Ошибка при добавлении предмета");
        }
        
      } else {
        CTools::Message("Вы не можете добавить безымянный предмет");
      }
			
      CTools::Redirect("subjects.php");
		}
		
		if (!empty($_POST['removeSubjectButton'])) {
			$select_subject = $_POST['select_subject'];
			
      if (!empty($select_subject)) {
        
        $result = true;
        for ($i = 0; $i < count($select_subject); $i++) {
          $result *= $SM->remove($select_subject[$i]);
        }
        
        if ($result) {
          CTools::Message("Предмет/предметы были удалены");
        } else {
          CTools::Message("Ошибка при удалении предмета/предметов");
        }
        
      } else {
        CTools::Message("Вы не выбрали предметы");
      }
      
      CTools::Redirect("subjects.php");      
		}
		
	}	else {
    CTools::Redirect("login.php");    
  }
  
?>
