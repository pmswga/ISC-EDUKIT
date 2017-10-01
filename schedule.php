<?php
  require_once "start.php";

  use IEP\Structures\User;
  
  $groups = $GM->getGroupsOfCurrentYear();

  if (!empty($groups)) {
      if (!empty(current($groups))) {
        setcookie("current_group", current($groups)->getGroupID());

        if (!empty($_POST['selectGroupButton'])) {
            setcookie("current_group", $_POST['group']);
            CTools::Redirect("schedule.php");
        }
        
        if (!empty($_COOKIE['current_group'])) {
          
          $data = $SHM->getScheduleGroup($_COOKIE['current_group']);
          $changed_schedules = $SHM->getChangeScheduleGroup($_COOKIE['current_group']);

          $CT->assign("schedules", $data);
          $CT->assign("changed_schedules", $changed_schedules);

          $CT->assign("", $SHM->getAllChangedSchedule());
          $CT->assign("groups", $groups);
          
        }

      }
  
  }

  $CT->assign("week", date("W"));

  
  if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $CT->assign("user", $_SESSION['user']);
  }
  
  $CT->Show("schedule.tpl");

?>
