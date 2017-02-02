<?php
	require_once "start.php";
	const _THIS_ = "index.php";
    
    use IEP\Structures\User;
    
	if(isset($_SESSION['admin']))
	{
        $CT->assign("admin", $_SESSION['admin']);
        
        print_r($_SESSION['admin']);
		
		$groups = $GM->getGroups();
		$students = $UM->getStudents();
		$parents = $UM->getParents();
		$teachers = $UM->getTeachers();
		$subjects = $SM->getSubjects();
		
		$groups_students = array();
		for($i = 0; $i < count($groups); $i++)
		{
			$groups_students[$i] = $DB->query("SELECT * FROM `students` s INNER JOIN `users` u ON s.id_student=u.id_user WHERE s.grp=".$groups[$i]->getNumberGroup()."")->fetchAll();
		}
		
		$CT->assign("specs", $DB->query("SELECT * FROM `specialty`")->fetchAll());
		$CT->assign("groups", $groups);
		$CT->assign("students", $students);
		$CT->assign("parents", $parents);
		$CT->assign("groups_students", $groups_students);
		$CT->assign("subjects", $subjects);
		$CT->assign("teachers", $teachers);
		
		$CT->assign("status", $_SESSION['status']);
		$CT->assign("error_header", $_SESSION['error_header']);
		$CT->assign("error_message", $_SESSION['error_message']);
		
		$CT->Show("admin.tpl");
		
		unset($_SESSION['status']);
		unset($_SESSION['error_header']);
		unset($_SESSION['error_message']);
		
		//< Добавление специальности
		if(!empty($_POST['addNewSpec']))
		{
			$spec_data = CForm::GetData(array(
				"code",
				"description",
				"current_file"
			));
			
			$spec_data["current_file"] = $_SERVER['DOCUMENT_ROOT']."/files/".basename($_FILES['current_file']['name']);
			
			//if(strcmp($_FILES['current_file']['type'], "application/pdf") == 0)
			//{					
				if($SPM->add(new Specialty($spec_data['code'], $spec_data['description'], $spec_data['current_file']))) CTools::Message("Специальность добавлена");
				else CTools::Message("Произошла ошибка при добавлении");
		//	}
			//else
			//{
		//		$_SESSION['status'] = -1;
				//$_SESSION['error_header'] = "Некорректный ввод данных";
			//	$_SESSION['error_message'] = "Файл должен быть pdf";
			//}
			
			CTools::Redirect(_THIS_);
		}
		
		//< Добавление группы
		if(!empty($_POST['addNewGrp']))
		{
			$grp_data = CForm::GetData(array(
				"grp",
				"code_spec_grp",
				"payment"
			));
			
			if($GM->add(new Group($grp_data['grp'], $grp_data['code_spec_grp'], $grp_data['payment'])))
			{
				$_SESSION['status'] = 1;
				$_SESSION['error_header'] = "Группа успешно добавлена";
			}
			else
			{
				$_SESSION['status'] = -1;
				$_SESSION['error_header'] = "Ошибка добавления данных";
				$_SESSION['error_message'] = "Не удалось добавить новую группу";
			}
			
			CTools::Redirect(_THIS_);
		}
		
		
		//< Удаление групп
		if(!empty($_POST['removeGroupButton']))
		{
			$r_groups = $_POST['removesGroup'];
			
			$status = 0;
			for($i = 0; $i < count($r_groups); $i++) $status *= $GM->remove($r_groups[$i]);
			
			CTools::Redirect(_THIS_);
		}
		
		if(!empty($_POST['up_course']))
		{
			//< Повышение на курс
			$GM->upCourse();
			CTools::Redirect(_THIS_);
		}
		elseif(!empty($_POST['down_course']))
		{
			//< Понижение на курс			
			$GM->downCourse();
			CTools::Redirect(_THIS_);
		}
		
		//< Добавление нового предмета
		if(!empty($_POST['add_subject_button']))
		{
			$description = htmlspecialchars($_POST['descritption']);
			if($SM->add(new Subject($description))) CTools::Message("Предмет успешно добавлен");
			else CTools::Message("Произошла ошибка при добавлении");
			
			CTools::Redirect(_THIS_);
		}
		
		//< Добавление нового преподавателя
		if(!empty($_POST['addTeacherButton']))
		{
			$reg_teacher_data = CForm::GetData(array(
				"second_name",
				"first_name",
				"patronymic",
				"email",
				"password",
				"info"
			));
			$reg_teacher_data['password'] = md5($reg_teacher_data['password']);
			$reg_teacher_data['subjects'] = $_POST['subjects'];
			$reg_teacher_data['id_type_user'] = USER_TYPE_TEACHER;
			
			CTools::var_dump($reg_teacher_data['subjects']);
			
			if($UM->add($reg_teacher_data)) CTools::Message("Добавление преподавателя прошло успешно");
			else CTools::Message("Произошла ошибка при добавлении");
			
			CTools::Redirect(_THIS_);
		}
		
	}
	else CTools::Redirect("login.php");
	
	
	/*! ПРОДУМАТЬ КАСКАДНОЕ УДАЛЕНИЕ ДАННЫХ */
?>
