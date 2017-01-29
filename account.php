<?php
	
	require_once "start.php";
	
	$id = (int)$_GET['id'];
	if(!empty($_GET['id']) and ($id > 0))
	{
		$user = $UM->getUserByID($_GET['id']);
		
		if($user->getTypeUser() == USER_TYPE_STUDENT)
		{
			$CT->assign("user", $user);
			$CT->Show("accounts/account.tpl");
		}
		else $CT->Show("404.tpl");
	}
	else $CT->Show("404.tpl");
	
?>