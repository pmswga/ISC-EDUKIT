<?php
	require_once "start.php";
  
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectManager;
  use IEP\Managers\ScheduleManager;
  use IEP\Structures\User;
  
  $update = function () {
    CTools::Redirect("schedule.php");
  };
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
    
    $GM = new GroupManager($DB);
    $SM = new SubjectManager($DB);
    $SH = new ScheduleManager($DB);

    $CT->assign("groups", $GM->getGroupsOfCurrentYear());
    $CT->assign("subjects", $SM->getAllSubjects());
    $CT->assign("schedules", $SH->getAllScheduleGroup());
    $CT->assign("changedSchedule", $SH->getAllChangedSchedule());
       
    $CT->assign("date_now", date("d.m.Y"));
    $CT->Show("schedule.tpl");
    
    if (!empty($_POST['addScheduleEntryButton'])) {
      $day = $_POST['day'];
      $group = $_POST['group'];
      $pair = $_POST['pair'];
      $subject_1 = $_POST['subj_1'];
      $subject_2 = $_POST['subj_2'];
      
      if ($SH->add(["day" => $day, "group" => $group, "pair" => $pair, "subj_1" => $subject_1, "subj_2" => $subject_2])) {
        CTools::Message("Пара успешно назначена");
      } else {
        CTools::Message("Ошибка при назначении пары");
      }
      
      $update();
    }
  
    if (!empty($_POST['changeScheduleButton'])) {
      
      $group = $_POST['group'];
      $day = $_POST['day'];
      $pairs = array();
      
      $result = true;
      for ($i = 1; $i <= 7; $i++) {
        $subj_1 = $_POST['down_pair_'.$i];
        $subj_2 = $_POST['up_pair_'.$i];
        
        if ($subj_1 != 0 && $subj_2 != 0) {
          $result *= $SH->changePair($group, $day, $i, $subj_1, $subj_2);
        }
        
      }
      
      if ($result) {
        CTools::Message("Изменения применены");
      } else {
        CTools::Message("Ошибка при принятии изменений");
      }
      
      $update();
    }
      
    if (!empty($_POST['setChangeScheduleButton'])) {
      $day = $_POST['day'];
      $group = $_POST['group'];
      $pair = $_POST['pair'];
      $subject = $_POST['subject'];
      
      if ($SH->addChangeSchedule(["day" => date_format(new DateTime($day), "Y-m-d"),
                                  "group" => $group, 
                                  "pair" => $pair, 
                                  "subject" => $subject])
      ) {
        CTools::Message("Изменение успешно назначено");
      } else {
        CTools::Message("Ошибка при назначении изменения в расписании");
      }
      
      $update();
    }
    
    if (!empty($_POST['changeChangedScheduleButton'])) {
      
      $group = $_POST['group'];
      $day = $_POST['day'];
      
      $result = true;
      for ($i = 1; $i <= 7; $i++) {
        $subject = $_POST['pair_'.$i];
        
        if ($subject != 0 && !empty($subject)) {
          $result *= $SH->changeChangedPair($group, $day, $i, $subject);
        }
        
      }
      
      if ($result) {
        CTools::Message("Изменения применены");
      } else {
        CTools::Message("Ошибка при принятии изменений");
      }
      
      $update();
    }
    
    if (!empty($_POST['deleteChangedScheduleButton'])) {
      $group = $_POST['group'];
      
      if ($SH->deleteChangedPair($group)) {
        CTools::Message("Все изменения были удалены");
      } else {
        CTools::Message("Ошибка при удалении изменений в расписании");
      }
      
      $update();
    }
    
  } else {
    CTools::Redirect("login.php");
  }
    
  
?>
