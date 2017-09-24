<?php
	require_once "start.php";
	
	use IEP\Structures\User;
	
	$CT->assign("news", $NM->getAllNews());
  
	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $CT->assign("user", $_SESSION['user']);
  }
  
  $CT->Show("news.tpl");
	
?>
