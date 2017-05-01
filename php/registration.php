<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/start.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/engine/cform.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
	
  use IEP\Structures\User;
  use IEP\Structures\Student;
  use IEP\Structures\Group;
  
	if (!empty($_POST['registrationStudent'])) {
		$data = CForm::getData(["second_name", "first_name", "patronymic", "email", "password", "home_address", "cell_phone_child", "grp"]);
		$data['password'] = md5($data['password']);
		
    $grp = new Group("tmp", "tmp");
    $grp->setID((int)$data['grp']);
    
		$new_student = new Student(
			new User(
				$data['second_name'], 
				$data['first_name'], 
				$data['patronymic'], 
				$data['email'], 
				$data['password'], 
				USER_TYPE_STUDENT), 
			$data['home_address'], 
			$data['cell_phone_child'],
      $grp
		);
    
		if($UM->add($new_student)) CTools::Message("Регистрация прошла успешно");
		else CTools::Message("При регистрации произошла ошибка");
		
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	}
	else CTools::Redirect($_SERVER['HTTP_REFERER']);
?>