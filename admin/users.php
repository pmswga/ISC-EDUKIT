<?php
  
  require_once "start.php";
  
  use IEP\Managers\UserManager;
	$UM = new UserManager($DB);
  
  
  $CT->Show("users.tpl");
  
?>