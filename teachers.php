<?php
	require_once "start.php";
	
	if(isset($_SESSION['user']))
	{
		$CT->Show("users/teacher.tpl");
	}
	else $CT->Show("guest/teacher.tpl");
	
?>