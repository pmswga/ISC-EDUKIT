<?php
  require_once "start.php";
  require_once "iep/pages/student.page.class.php";
  require_once "iep/pages/teacher.page.class.php";
  
	use IEP\Structures\User;
	use IEP\Structures\News;
	use IEP\Structures\Test;
	use IEP\Structures\OneQuestion;
	use IEP\Structures\Subject;
  use IEP\Structures\TrafficEntry;
  use IEP\Pages\StudentPage;
  use IEP\Pages\TeacherPage;
	
	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User 
  ) {
		$user = $_SESSION['user'];
		    
		switch($user->getUserType())
		{
			case USER_TYPE_STUDENT:
			{
        $StudentPage = new StudentPage("Личный кабинет студента", "accounts/student.tpl");
				$StudentPage->setData("user", $user);
				$StudentPage->setData("sogroups", $UM->getSoGroups($user->getGroup()->getGroupID()));
				$StudentPage->setData("tests", $TM->getTestsForGroup($user->getGroup()->getGroupID()));
        $StudentPage->setData("traffic", $TRM->getStudentTraffic($user->getEmail()));
        $StudentPage->setData("completedTests", $TM->getStudentTests($user->getEmail()));
				$StudentPage->setData("schedules", $SHM->getScheduleGroup($user->getGroup()->getGroupID()));
        $StudentPage->setData("changed_schedules", $SHM->getChangeScheduleGroup($user->getGroup()->getGroupID()));
        
        if (!empty($_POST)) {
          $StudentPage->callback($_POST);
          CTools::Redirect("user.php");
        }

        $CT->assign($StudentPage->data());
				$CT->Show($StudentPage->template());
			} break;
			case USER_TYPE_TEACHER:
			{
        $TeacherPage = new TeacherPage("Личный кабинет преподавателя", "accounts/teacher.tpl");

        $user->setTests($TM->getTests($user->getEmail()));
        $user->setNews($NM->getNews($user->getEmail()));
        $user->setSubjects($SM->getSubjects($user->getEmail()));
        
        $TeacherPage->setData("user", $user);
				$TeacherPage->setData("groups", $GM->getGroupsOfCurrentYear());
        $TeacherPage->setData("unset_subjects", $SM->getUnsetSubjects($user->getEmail()));
        $TeacherPage->setData("date", date("d.m.Y"));
        //$TeacherPage->setData("students_result", $TM->getStudentsResult($user->getEmail()));
        //FIXME: Исправить всё к чертям собачим
        //CTools::var_dump($TM->getStudentsResult($user->getEmail()));
        
        $TeacherPage->setManagers(["news" => $NM, "subjects" => $SM, "tests" => $TM]);
        if (!empty($_POST)) {
          $TeacherPage->callback($_POST);
          CTools::Redirect("user.php");
        }

        $CT->assign($TeacherPage->data());
        $CT->Show($TeacherPage->template());
      } break;
			case USER_TYPE_PARENT:
			{
        
				$CT->assign("user", $user);
        
        $childs = array();
        foreach ($user->getChilds() as $child) {
          
          $tests = $TM->getStudentTests($child->getEmail());
          $traffic = $UM->query("call getTrafficStudent(:s_email)", [":s_email" => $child->getEmail()]);
          
          $childs[] = array(
            "student" => $child,
            "tests"   => $tests,
            "traffic" => $traffic
          );
          
        }
				$CT->assign("childs", $childs);
        
				$CT->Show("accounts/parent.tpl");
			} break;
      case USER_TYPE_ELDER:
      {
        
        $ifTrafficFixed = $UM->query("SELECT ifTrafficFixed(:e_email) as result", 
          [":e_email" => $user->getEmail()]
        )[0]['result'];
        
        
          $sogroups = $UM->query("SELECT * FROM `v_Students` WHERE `grp`=:grp",
            [":grp" => $user->getGroup()->getNumberGroup()]
          );
          $CT->assign("sogroups", $sogroups);
        
        $traffic = $UM->query("call getTrafficStudent(:s_email)", [":s_email" => $user->getEmail()]);
				
        $CT->assign("user", $user);
				$CT->assign("tests", $TM->getTestsForGroup($user->getGroup()->getGroupID()));
        $CT->assign("traffic", $traffic);
        $CT->assign("ifTrafficFixed", $ifTrafficFixed);
        
				$CT->assign("schedules", $SHM->getScheduleGroup($user->getGroup()->getGroupID()));
        $CT->assign("changed_schedules", $SHM->getChangeScheduleGroup($user->getGroup()->getGroupID()));
        
        if (!empty($_POST['commitTrafficButton'])) {
          $count_pairs = $_POST['count_pairs'];
          $traffic = $_POST['traffic'];
          
          $result = true;
          foreach ($traffic as $key => $value) {
            $result *= $TRM->add(new TrafficEntry($key, date("Y.m.d"), $value[0]*2, $count_pairs*2)); 
          }
          
          if ($result) {
            CTools::Message("Изменения зафиксированны");
          } else {
            CTools::Message("Ошибка при фиксации");
          }
          
          CTools::Redirect("user.php");
          
        }
        
        
        $CT->Show("accounts/elder.tpl");
      } break;
      default:
      {
        unset($_SESSION['user']);
        CTools::Redirect("index.php");
      } break;
		}
	}
	else {
    CTools::Redirect("index.php");
  } 
	
?>
