<?php
  
  require_once "start.php";
  
  use IEP\Managers\GroupManager;
  
	$GM = new GroupManager($DB);
  
  $CT->Show("groups.tpl");
  
?>