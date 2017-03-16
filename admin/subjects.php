<?php
  
  require_once "start.php";
  
  use IEP\Managers\SubjectsManager;
  
  $SM = new SubjectsManager($DB);
  
  $CT->Show("subjects.tpl");
  
?>