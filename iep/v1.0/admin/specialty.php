<?php
  
  require_once "start.php";
  
  use IEP\Managers\SpecialtyManager;
  use IEP\Structures\Specialty;
  use IEP\Structures\User;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
		
		$SPM = new SpecialtyManager($DB);
		
		$specialtyes = $SPM->getAllSpecialty();
		
		$CT->assign("specialtyes", $specialtyes);
		$CT->Show("specialty.tpl");
		
		if (!empty($_POST['addSpecialtyButton'])) {
			
			$data = CForm::getData(["code_spec_1", "code_spec_2", "code_spec_3", "descp"]);
			$data['code_spec'] = $data['code_spec_1'].".".$data['code_spec_2'].".".$data['code_spec_3'];
      
			$new_spec = new Specialty($data['code_spec'], $data['descp']);
			
			$file = $_FILES['pdf_file'];
			
			if ($file["type"] == "application/pdf") {
				
				$upload_path = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR."pdfs".DIRECTORY_SEPARATOR.RusToEng(basename($file['name']));
				move_uploaded_file($file['tmp_name'], $upload_path);
				
				$new_spec->setFile($upload_path);
				
				if ($SPM->add($new_spec)) {
          CTools::Message("Специальность успешно добавлена");
				} else {
          CTools::Message("Ошибка при добавлении специальности");
        }
				
			} else {
        CTools::Message("Ошибка при добавлении специальности");
      }
			
      CTools::Redirect("specialty.php");
		}
		
		if (!empty($_POST['removeSpecialtyButton'])) {
			$select_spec = $_POST['select_spec'];
      
      if (!empty($select_spec)) {
        $result = true;
        for ($i = 0; $i < count($select_spec); $i++) {
          $result *= $SPM->remove($select_spec[$i]);
        }
        
        if ($result) {
          CTools::Message("Специальность/специальности были удалены");
        } else {
          CTools::Message("Ошибка при удалении специальности/специальностей");
        }
        
      } else {
        CTools::Message("Выберете специальности, которые хотите удалить");
      }
			
      CTools::Redirect("specialty.php");
		}
		
		if (!empty($_POST['editSpecialtyButton'])) {
			//code...
		}
		
	} else {
    CTools::Redirect("login.php");
  } 
  
?>
