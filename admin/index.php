<?php
	require_once "start.php";
  require_once "../mail/PHPMailerAutoload.php";
	
	if(isset($_SESSION['admin']))
	{		
		
		$CT->Show("index.tpl");
		
	}
	else CTools::Redirect("login.php");

?>
