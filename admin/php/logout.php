<?php
	session_start();
	require_once "../../engine/ctools.php";
	
	unset($_SESSION['admin']);
	CTools::Redirect("../index.php");
?>