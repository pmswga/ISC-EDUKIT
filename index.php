<?php
	require_once "start.php";
  
  use IEP\Structures\User;
  
	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $CT->assign("user", $_SESSION['user']);
  }
	
  $CT->Show("index.tpl");
  
?>
