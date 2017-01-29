<?php
	require_once "../start.php";
	
	if(!empty($_POST['authorizateButton']))
	{
		$email = htmlspecialchars($_POST['email']);
		$password = md5(htmlspecialchars($_POST['password']));
		
		$user = $UM->authorizate($email, $password);
		if($user != false) $_SESSION['user'] = $user;
		else CTools::Message("Такого пользователя не существует");
		
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	}
	else CTools::Redirect($_SERVER['HTTP_REFERER']);
	
?>