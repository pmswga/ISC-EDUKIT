<?php
	require_once "start.php";
	require_once "engine/cform.php";
	
	$childrens = $UM->getStudents();
	
	// $CT->assign("childrens", $childrens);
	$CT->Show("guest/registration.tpl");
	
	if (!empty($_POST['regParent'])) {
		$reg_parent_data = CForm::GetData(array(
			"second_name",
			"first_name",
			"patronymic",
			"email",
			"password",
			"home_phone",
			"cell_phone",
			"education",
			"age",
			"work_place",
			"post"
		));
		$reg_parent_data['password'] = md5($reg_parent_data['password']);
		$reg_parent_data['childs'] = $_POST['childs'];
		$reg_parent_data['id_type_user'] = USER_TYPE_PARENT;
		
		
		if($UM->add($reg_parent_data)) CTools::Message("Регистрация прогла успешно");
		else CTools::Message("При регистрации произошла ошибка");
		
		CTools::Redirect("index.php");
	}
	
?>