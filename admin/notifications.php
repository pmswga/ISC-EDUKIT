<?php
	require_once "start.php";
  require_once "../mail/PHPMailerAutoload.php";
	
	if (isset($_SESSION['admin'])) {
		
		$UM = new IEP\Managers\UserManager($DB);
		
		$CT->assign("parents", $UM->getParents());
		
		$CT->Show("notifications.tpl");
		
	}
	else CTools::Redirect("login.php");

?>
