<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/start.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/engine/cform.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
	
  use IEP\Structures\User;
  use IEP\Structures\Student;
  use IEP\Structures\Group;
  
	if (!empty($_POST['registrationStudent'])) {
		$data = CForm::getData([
      "second_name", 
      "first_name", 
      "patronymic", 
      "email", 
      "passwd", 
      "home_address", 
      "cell_phone_child", 
      "grp"
    ]);
		$data['passwd'] = md5($data['passwd']);
	
    
		$new_student = new Student(
			new User(
				$data['second_name'], 
				$data['first_name'], 
				$data['patronymic'], 
				$data['email'], 
				$data['passwd'],
        USER_TYPE_STUDENT
      ), 
			$data['home_address'], 
			$data['cell_phone_child'],
      $data['grp']
		);
    
    if($UM->add($new_student)) CTools::Message("Регистрация прошла успешно");
		else CTools::Message("При регистрации произошла ошибка");
		
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	}
	else CTools::Redirect($_SERVER['HTTP_REFERER']);
?>