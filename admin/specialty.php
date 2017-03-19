<?php
  
  require_once "start.php";
  
  use IEP\Managers\SpecialtyManager;
  use IEP\Structures\Specialty;
  
	if(isset($_SESSION['admin']))
	{		
		
		$SPM = new SpecialtyManager($DB);
		
		$specialtyes = $SPM->getSpecialtyes();
		
		$CT->assign("specialtyes", $specialtyes);
		
		$CT->Show("specialty.tpl");
		
		if (!empty($_POST['addSpecialtyButton'])) {
			
			$data = CForm::getData(["code_spec", "descp"]);
			
			$new_spec = new Specialty($data['code_spec'], $data['descp']);
			
			$file = $_FILES['pdf_file'];
			
			if ($file["type"] == "application/pdf") {
				
				$upload_path = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."pdfs".DIRECTORY_SEPARATOR.RusToEng(basename($file['name']));
				move_uploaded_file($file['tmp_name'], $upload_path);
				
				$new_spec->setFile($upload_path);
				
				if ($SPM->add($new_spec)) {
					CTools::Redirect("specialty.php");
				}
				
			}
			
		}
		
		if (!empty($_POST['removeSpecialtyButton'])) {
			$select_spec = $_POST['select_spec'];
			
			for ($i = 0; $i < count($select_spec); $i++) {
				$SPM->remove($select_spec[$i]);
			}
			
			CTools::Redirect("specialty.php");
		}
		
		if (!empty($_POST['editSpecialtyButton'])) {
			
		}
		
	}
	else CTools::Redirect("login.php");
  
?>