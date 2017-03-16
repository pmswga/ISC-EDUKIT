<?php
  
  require_once "start.php";
  
  use IEP\Managers\SubjectsManager;
  use IEP\Structures\Subject;
  
  $SM = new SubjectsManager($DB);
  
  $CT->Show("subjects.tpl");
  
  if (!empty($_POST['addSubjectButton'])) {
    $subject = $_POST['subject'];
    
    $new_subject = new Subject();
  }
  
?>