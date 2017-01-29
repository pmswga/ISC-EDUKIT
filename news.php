<?php
	require_once "start.php";
	
	if(isset($_SESSION['user']))
	{
		$CT->Show("users/news.tpl");
	}
	else $CT->Show("guest/news.tpl");
	
?>