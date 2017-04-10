<?php
	require_once "start.php";
    
	use IEP\Managers\UserManager;
	use IEP\Structures\User;
    
	if(!isset($_SESSION['admin']))
	{
		$UM = new UserManager($DB);
		
		$CT->Show("login.tpl");
		
		if(!empty($_POST['loginCPButton']))
		{
			$login = htmlspecialchars($_POST['login']);
			$password = md5(htmlspecialchars($_POST['paswd']));
			
			$admin = $UM->authorizate($login, $password);
			
			if (!empty($admin) && ($admin instanceof User)) {
				$_SESSION['admin'] = $admin;
				
				CTools::Redirect("index.php");
			} else {
				CTools::Message("Неверный логин или пароль");
			}
			
		}
	}
	else CTools::Redirect("index.php");
	
?>