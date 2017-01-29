<?php
	require_once "start.php";
	
	if(isset($_SESSION['user']))
	{
		$CT->Show("users/schedule.tpl");
	}
	else $CT->Show("guest/schedule.tpl");

?>