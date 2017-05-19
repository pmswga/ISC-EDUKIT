<?php
	require_once "start.php";
	
  $CT->assign("teachers", $UM->getAllTeachers());
  
	if (isset($_SESSION['user'])) {
    $CT->Show("users/teacher.tpl");
	}
	else $CT->Show("guest/teacher.tpl");
	
?>