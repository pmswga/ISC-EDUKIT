<?php
  
  require_once "start.php";
  
  use IEP\Managers\GroupManager;
  use IEP\Managers\SpecialtyManager;
  use IEP\Structures\Group;
  use IEP\Structures\User;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
		
		$GM = new GroupManager($DB);
		$SPM = new SpecialtyManager($DB);
		
		$CT->assign("specialtyes", $SPM->getAllSpecialty());
    $CT->assign("groups", $GM->getAllGroups());
    $CT->assign("currentYear", date("Y"));
		
		$CT->Show("groups.tpl");
		
		if (!empty($_POST['addGroupButton'])) {
			$data = CForm::getData(["group", "edu_year_1", "edu_year_2", "spec", "payment"]);
			$data['edu_year'] = $data['edu_year_1']."/".$data['edu_year_2'];
      
			$new_grp = new Group($data['group'], $data['spec'], $data["edu_year"], $data['payment']);
			
			if ($GM->add($new_grp)) {
        CTools::Message("Группа успешно добавлена");
			} else {
        CTools::Message("Ошибка при добавлении группы");
      }
      
      CTools::Redirect("groups.php");
		}
		
		if (!empty($_POST['removeGroupButton'])) {
			$select_grp = $_POST['select_grp'];
			
      if (!empty($select_grp)) {
        
        $result = true;
        for ($i = 0; $i < count($select_grp); $i++) {
          $result *= $GM->remove($select_grp[$i]);
        }
        
        if ($result) {
          CTools::Message("Группа/группы были удалены");
        } else {
          CTools::Message("Произошла ошибка при удалении группы/групп");          
        }
        
      } else {
        CTools::Message("Выберете группы, которые хотите удалить");
      }
			
			CTools::Redirect("groups.php");
		}
		
	} else {    
    CTools::Redirect("login.php");
  } 
  
?>
