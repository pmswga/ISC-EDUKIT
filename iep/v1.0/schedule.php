<?php
  require_once "start.php";
  require_once "iep/pages/schedule.page.class.php";

  use IEP\Structures\User;
  use IEP\Pages\SchedulePage;
  
  $SchedulePage = new SchedulePage("Расписание", "schedule.tpl");
  $SchedulePage->setData("week", date("W"));

  $groups = $GM->getGroupsOfCurrentYear();

  if (!empty($groups)) {
    if (!empty(current($groups))) {
      setcookie("current_group", current($groups)->getGroupID());

      if (!empty($_POST['selectGroupButton'])) {
        $SchedulePage->callback($_POST['selectGroupButton']);
      }
      
      if (!empty($_COOKIE['current_group'])) {
        
        $SchedulePage->setData("schedules", $SHM->getScheduleGroup($_COOKIE['current_group']));
        $SchedulePage->setData("changed_schedules", $SHM->getChangeScheduleGroup($_COOKIE['current_group']));
        $SchedulePage->setData("groups", $groups);
        
      }

    }
  }
  
  if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $SchedulePage->setData("user", $_SESSION['user']);
  }
  
  $CT->assign($SchedulePage->data());
  $CT->Show($SchedulePage->template());

?>
