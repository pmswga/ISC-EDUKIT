<?php
	require_once "start.php";
	
	if(isset($_SESSION['admin']))
	{
		
		$CT->Show("traffic.tpl");
		
	}
	else CTools::Redirect("login.php");

?>
