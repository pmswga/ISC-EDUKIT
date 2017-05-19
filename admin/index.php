<?php
	require_once "start.php";
	
	if (isset($_SESSION['admin'])) {		
		$CT->Show("index.tpl");
	}
	else CTools::Redirect("login.php");

?>
