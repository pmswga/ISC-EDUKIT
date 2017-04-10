<?php
	require_once "start.php";
	
	use IEP\Managers\UserManager;
	use IEP\Structures\User;
	
	if (isset($_SESSION['admin'])) {		
		
		$UM = new UserManager($DB);
		
		$CT->assign("admins", $UM->getAdmins());
		
		$CT->Show("settings.tpl");
		
		if (!empty($_POST['addAdminButton'])) {
			$data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "info"]);
			$data['paswd'] = md5($data['paswd']);
			
			$new_admin = new User(
				$data['sn'], 
				$data['fn'], 
				$data['pt'], 
				$data['email'], 
				$data['paswd'], 
				1
			);
			
			if ($UM->add($new_admin)) {
				CTools::Redirect("settings.php");
			}
			
		}
		
	}
	else CTools::Redirect("login.php");

?>
