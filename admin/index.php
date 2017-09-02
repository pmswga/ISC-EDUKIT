<?php
	require_once "start.php";
	
  use IEP\Structures\User;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
		$CT->Show("index.tpl");
	}	else{
    CTools::Redirect("login.php");
  } 

?>
