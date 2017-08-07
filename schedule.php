<?php
	require_once "start.php";
	
  
  $deafult_group = current($GM->getAllGroups())->getGroupID();
  
  $data = $UM->query("call getScheduleGroup(:g_id)", [":g_id" => $deafult_group]);
  
  $dataByGroup = array();
  foreach ($data as $d) {
    $dataByGroup[$d['group']][] = $d;
  }
  
  $dataByGroupByDay = array();
  foreach ($dataByGroup as $key => $value) {
    
    foreach ($value as $day) {      
      $dataByGroupByDay[$key][$day['day']][] = $day;
    }
    
  }
  
  $CT->assign("groups", $GM->getAllGroups());
  
  if (!empty($_POST['selectGroupButton'])) {
    $group = $_POST['group'];
    
    $CT->assign("schedules", $dataByGroupByDay);
  } else {
    
    $CT->assign("schedules", $dataByGroupByDay);
  }
  
	if (!isset($_SESSION['user'])) {
		
    $CT->Show("guest/schedule.tpl");
	
  }
	else {
    $CT->Show("users/schedule.tpl");    
  }

?>
