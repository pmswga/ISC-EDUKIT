<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/start.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/engine/cform.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
	
  use IEP\Structures\User;
  use IEP\Structures\Student;
  
	if(!empty($_POST['registrationStudent']))
	{
		$reg_student_data = CForm::GetData(array(
			"second_name",
			"first_name",
			"patronymic",
			"email",
			"password",
			"id_type_user",
			"grp",
			"home_address",
			"cell_phone_child",
		));
		$reg_student_data['password'] = md5($reg_student_data['password']);
		$reg_student_data['id_type_user'] = USER_TYPE_STUDENT;
    
    $new_student = new Student(
      new User(
        $reg_student_data['second_name'],
        $reg_student_data['first_name'],
        $reg_student_data['patronymic'],
        $reg_student_data['email'],
        $reg_student_data['password'],
        $reg_student_data['id_type_user']
      ),
      $reg_student_data['grp'],
      $reg_student_data['home_address'],
      $reg_student_data['cell_phone_child']
    );
		
		if($UM->add($new_student)) CTools::Message("Регистрация прошла успешно");
		else CTools::Message("При регистрации произошла ошибка");
		
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	}
	else CTools::Redirect($_SERVER['HTTP_REFERER']);
?>