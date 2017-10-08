<?php
	require_once "../start.php";
	
	unset($_SESSION['user']);

	CTools::Redirect("../index.php");
?>