<?php
  
  require_once "start.php";
  
  use IEP\Managers\GroupManager;
  use IEP\Managers\SpecialtyManager;
  use IEP\Structures\Group;
  
	if(isset($_SESSION['admin']))
	{		
		
		$GM = new GroupManager($DB);
		$SPM = new SpecialtyManager($DB);
		
		$CT->assign("specialtyes", $SPM->getAllSpecialty());
		$CT->assign("groups", $GM->getAllGroups());
		
		$CT->Show("groups.tpl");
		
		if (!empty($_POST['addGroupButton'])) {
			$data = CForm::getData(["group", "edu_year", "spec", "payment"]);
			
			$new_grp = new Group($data['group'], $data['spec'], $data["edu_year"], $data['payment']);
			
			if ($GM->add($new_grp)) {
				CTools::Redirect("groups.php");
			}
			
		}
		
		if (!empty($_POST['removeGroupButton'])) {
			$select_grp = $_POST['select_grp'];
			
			for ($i = 0; $i < count($select_grp); $i++) {
				$GM->remove($select_grp[$i]);
			}
			
			CTools::Redirect("groups.php");
		}
		
	}
	else CTools::Redirect("login.php");
	
  
?>
