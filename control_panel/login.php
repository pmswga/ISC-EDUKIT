<?php
	require_once "start.php";
	
	if(!isset($_SESSION['admin']))
	{
		$CT->Show("login.tpl");
		
		if(!empty($_POST['loginButton']))
		{
			$login = htmlspecialchars($_POST['email']);
			$password = htmlspecialchars($_POST['password']);
			
			if(($login == "admin@admin.ru") and ($password == "admin"))
			{
				$_SESSION['admin'] = new User("Басыров", "Сергей", "Амирович", $login, $password, USER_TYPE_ADMIN);
				CTools::Redirect("index.php");
			}
		}
	}
	else CTools::Redirect("index.php");
	
?>