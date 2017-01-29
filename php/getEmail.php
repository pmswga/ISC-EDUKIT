<?php
	require_once "../start.php";
	
	if(!empty($_POST['email']))
	{
		$result = $UM->get("SELECT `email` FROM `users` WHERE `email`=:email", 
			[":email" => htmlspecialchars($_POST['email'])]
		);
		
		if(!empty($result)) echo json_encode(true);
		else echo json_encode(false);		
	}
	else CTools::Redirect($_SERVER['HTTP_REFERER']);
?>