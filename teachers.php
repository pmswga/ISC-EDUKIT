<?php
	require_once "start.php";
	
  use IEP\Structures\User;
  
  $CT->assign("teachers", $UM->getAllTeachers());
  
	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $CT->assign("user", $_SESSION['user']);
  }
  
  $CT->Show("teacher.tpl");
	
?>
