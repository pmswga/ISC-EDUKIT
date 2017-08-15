<?php
	require_once "start.php";
  
  $groups = $GM->getAllGroups();
  
  if (!empty($groups[0])) {    
    $deafult_group = $groups[0]->getGroupID();
    
    if (!empty($_POST['selectGroupButton'])) {
      $group = $_POST['group'];
      
      $data = $SHM->getScheduleGroup($group);
      
      $CT->assign("schedules", $data);
      
    } else {
      $data = $SHM->getScheduleGroup($deafult_group);
      
      $CT->assign("schedules", $data);
    }
  
    $CT->assign("groups", $groups);
  }
  
	if (!isset($_SESSION['user'])) {
		
    $CT->Show("guest/schedule.tpl");
	
  }
	else {
    $CT->Show("users/schedule.tpl");    
  }

?>
