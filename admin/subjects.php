<?php
  
  require_once "start.php";
  
  use IEP\Managers\SubjectsManager;
  use IEP\Structures\Subject;
  
  $SM = new SubjectsManager($DB);
  
  $CT->assign("subjects", $SM->getSubjects());
  
  $CT->Show("subjects.tpl");
  
  if (!empty($_POST['addSubjectButton'])) {
    $subject = trim(htmlspecialchars($_POST['subject']));
    
    $new_subject = new Subject($subject);
    
    if ($SM->add($new_subject)) {
      CTools::Redirect("subjects.php");
    }
    
  }
  
  if (!empty($_POST['removeSubjectButton'])) {
    $select_subject = $_POST['select_subject'];
    
    for ($i = 0; $i < count($select_subject); $i++) {
      $SM->remove($select_subject[$i]);
    }
    
    CTools::Redirect("subjects.php");
  }
  
?>