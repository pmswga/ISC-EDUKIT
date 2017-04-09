<?php
	require_once "start.php";
		
	if(isset($_SESSION['user']))
	{
		$CT->Show("users/index.tpl");
	}
	else $CT->Show("guest/index.tpl");
	
?>