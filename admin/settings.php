<?php
	require_once "start.php";
	
	use IEP\Managers\UserManager;
	
	if(isset($_SESSION['admin']))
	{		
		
		$CT->Show("settings.tpl");
		
	}
	else CTools::Redirect("login.php");

?>
