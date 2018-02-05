<?php
	require_once "start.php";
	
	use IEP\Managers\UserManager;
	use IEP\Structures\User;
	
	if (isset($_SESSION['admin']) && 
    ($_SESSION['admin'] instanceof User) &&
    $UM->adminExists($_SESSION['admin'])
  ) {
		
		$UM = new UserManager($DB);
		
    $CT->assign("groups", $GM->getAllGroups());
    $CT->assign("subjects", $SM->getAllSubjects());
    $CT->assign("teachers", $UM->getAllTeachers());
    $CT->assign("students", $UM->getAllStudents());
    $CT->assign("elders", $UM->getAllElders());
    $CT->assign("parents", $UM->getAllParents());
    $CT->assign("allUsers", $UM->getAllUsers());
    $CT->assign("specialty", $SPM->getAllSpecialty());
		$CT->assign("admins", $UM->getAllAdmins());
		$CT->assign("logs", $UM->getLogs());
    
		$CT->Show("index.tpl");
		
		if (!empty($_POST['addAdminButton'])) {
			$data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "info"]);
			$data['paswd'] = md5($data['paswd']);
			
			$new_admin = new User(
				$data['sn'], 
				$data['fn'], 
				$data['pt'], 
				$data['email'], 
				$data['paswd'], 
				0
			);
			
			if ($UM->add($new_admin)) {
        CTools::Message("Добавлен новый администратор");
			} else {
        CTools::Message("Ошибка при добавлении");
      }
			
      CTools::Redirect("index.php");
		}
    
    if (!empty($_POST['deleteAdminsButton'])) {
      $admins = $_POST['admins'];
      
      $result = true;
      for ($i = 0; $i < count($admins); $i++) {
        $result *= $UM->removeAdmin($admins[$i]);
      }
      
      if ($result) {
        CTools::Message("Удалены");
      } else {
        CTools::Message("Произошла ошибка");
      }
      
      CTools::Redirect("index.php");
    }
    
    if (!empty($_POST['deleteLogsButton'])) {
      $logs = $_POST['logs'];
      
      if (!empty($logs)) {
        $result = true;
        for ($i = 0; $i < count($logs); $i++) {
          $result *= $UM->removeLogs($logs[$i]);
        }
        
        if ($result) {
          CTools::Message("Удалены");
        } else {
          CTools::Message("Произошла ошибка");
        }
        
      } else {
        CTools::Message("Вы не выбрали записи для удаления");
      }

      CTools::Redirect("index.php");
    }
		
	}	else {
    CTools::Redirect("login.php");
  }
  
?>
