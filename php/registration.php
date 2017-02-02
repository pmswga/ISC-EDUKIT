<?php
	require_once $_SERVER['DOCUMENT_ROOT']."/start.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/engine/cform.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
	
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
			"date_birthday",
			"home_address",
			"cell_phone_child",
		));
		
		$reg_student_data['password'] = md5($reg_student_data['password']);
		$reg_student_data['id_type_user'] = USER_TYPE_STUDENT;
		
		if($UM->add($reg_student_data)) CTools::Message("Регистрация прошла успешно");
		else CTools::Message("При регистрации произошла ошибка");
		
		CTools::Redirect($_SERVER['HTTP_REFERER']);
	}
	else CTools::Redirect($_SERVER['HTTP_REFERER']);
?>