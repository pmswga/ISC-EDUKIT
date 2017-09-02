<?php
  require_once "../start.php";

	unset($_SESSION['admin']);
	CTools::Redirect("../login.php");
?>