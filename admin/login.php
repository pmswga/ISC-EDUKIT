<?php
	require_once "start.php";
  
	use IEP\Structures\User;
  
	if (!isset($_SESSION['admin']) && 
     !($_SESSION['admin'] instanceof User)
  ) {
		
		$CT->Show("login.tpl");
		
		if (!empty($_POST['loginCPButton'])) {
			$login = htmlspecialchars($_POST['login']);
			$password = md5(htmlspecialchars($_POST['paswd']));
			
			$admin = $UM->authentificationAdmin($login, $password);
			
			if (!empty($admin) && ($admin instanceof User)) {
				$_SESSION['admin'] = $admin;
				
				CTools::Redirect("index.php");
			} else {
				CTools::Message("Неверный логин или пароль");
			}
			
		}
    
	}	else {
    CTools::Redirect("php/logout.php");
  } 
	
?>