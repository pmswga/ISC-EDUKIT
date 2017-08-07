<?php
	require_once "start.php";
	
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectManager;
  use IEP\Managers\ScheduleManager;
  
  $update = function () {
    CTools::Redirect("schedule.php");
  };
  
	if (isset($_SESSION['admin'])) {	
	
		$GM = new GroupManager($DB);
		$SM = new SubjectManager($DB);
    $SH = new ScheduleManager($DB);
    
    $CT->assign("groups", $GM->getAllGroups());
    $CT->assign("subjects", $SM->getAllSubjects());
    $CT->assign("schedules", $SH->getAllScheduleGroup());
    
    $CT->Show("schedule.tpl");
    
    if (!empty($_POST['addScheduleEntryButton'])) {
      $day = $_POST['day'];
      $group = $_POST['group'];
      $pair = $_POST['pair'];
      $subject = $_POST['subject'];
      
      $add_schedule = $GM->dbc()->prepare("call addScheduleEntry(:grp, :day, :pair, :subject)");
      
      $add_schedule->bindValue(":grp", $group);
      $add_schedule->bindValue(":day", $day);
      $add_schedule->bindValue(":pair", $pair);
      $add_schedule->bindValue(":subject", $subject);
      
      if ($add_schedule->execute()) {
        CTools::Message("All Good");
      } else {
        CTools::Message("All Bad");
      }
      
      $update();
    }
    
    if (!empty($_POST['changeScheduleButton'])) {
      
      $group = $_POST['group'];
      $day = $_POST['day'];
      $pairs = array();
      
      $result = true;
      for ($i = 1; $i <= 7; $i++) {
        $subject = $_POST['pair_'.$i];
        
        if ($subject != 0 && !empty($subject)) {          
          $result *= $SH->changePair($group, $day, $i, $_POST['pair_'.$i]);
        }
        
      }
      
      if ($result) {
        CTools::Message("Change is good");
      } else {
        CTools::Message("Change is bad");
      }
      
      $update();
    }
    
  }
	else {
    CTools::Redirect("login.php");
  }
  
?>
