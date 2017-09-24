<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/start.php";
    
	if (!empty($_POST['signInButton'])) {
		$email = htmlspecialchars($_POST['email']);
		$password = md5(htmlspecialchars($_POST['passwd']));
		
		$user = $UM->authentification($email, $password);
		if(!empty($user)) {      
      $_SESSION['user'] = $user;
    } 
		else {
      CTools::Message("Такого пользователя не существует");
    }
      
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	}
	else {
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	} 
	
?>
