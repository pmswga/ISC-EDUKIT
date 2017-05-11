<?php
  
  require_once "start.php";
  
  use IEP\Managers\UserManager;
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectManager;
  use IEP\Structures\Student;
  use IEP\Structures\Parent_;
  use IEP\Structures\Teacher;
  use IEP\Structures\User;
  use IEP\Structures\Group;
	
	if(isset($_SESSION['admin']))
	{		
		
		$UM = new UserManager($DB);
		$GM = new GroupManager($DB);
		$SM = new SubjectManager($DB);
		
		$all_students = $UM->getAllStudents();
		$studentsByGroup = array();
		for ($i = 0; $i < count($all_students); $i++) {
			$studentsByGroup[$all_students[$i]->getGroup()->getNumberGroup()][] = $all_students[$i];
		}
		
		$CT->assign("groups", $GM->getAllGroups());
		$CT->assign("subjects", $SM->getAllSubjects());
		$CT->assign("teachers", $UM->getAllTeachers());
		$CT->assign("students", $UM->getAllStudents());
		// $CT->assign("elders", $UM->getElders());
		$CT->assign("parents", $UM->getAllParents());
		// $CT->assign("allUsers", $UM->getAllUsers());
		// $CT->assign("typeUsers", $UM->getTypeUsers());
		$CT->assign("studentsByGroup", $studentsByGroup);
		
		$CT->Show("users.tpl");
		
		if (!empty($_POST['addStudentButton'])) {
			$data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "ha", "cp", "grp"]);
			$data['paswd'] = md5($data['paswd']);
      
			$grp = new Group("", "");
      $grp->setID((int)$data['grp']);
      
			$new_student = new Student(
				new User(
					$data['sn'], 
					$data['fn'], 
					$data['pt'], 
					$data['email'], 
					$data['paswd'], 
					4), 
				$data['ha'], 
				$data['cp'],
        $grp
			);
			
			CTools::var_dump($new_student);
			
			if ($UM->add($new_student)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['addTeacherButton'])) {
			$data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "info"]);
			$data['paswd'] = md5($data['paswd']);
			
			$subjects = $_POST['subjects'];
			
			$new_teacher = new Teacher(
				new User(
					$data['sn'], 
					$data['fn'], 
					$data['pt'], 
					$data['email'], 
					$data['paswd'], 
					2), 
				$data['info']
			);
			
			if (!empty($subjects)) {
				$new_teacher->setSubjects($subjects);
			}
			
			if ($UM->add($new_teacher)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['addParentButton'])) {
			$data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "age", "education", "wp", "post", "hp", "cp"]);
			$data['paswd'] = md5($data['paswd']);
			
			$new_parent = new Parent_(
				new User(
					$data['sn'], 
					$data['fn'], 
					$data['pt'], 
					$data['email'], 
					$data['paswd'], 
					5), 
				$data['age'],
				$data['education'],
				$data['wp'],
				$data['post'],
				$data['hp'],
				$data['cp']
			);
			
			
			CTools::var_dump($new_parent);
			
			if ($UM->add($new_parent)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['grantElderButton'])) {
			$emailStudent = htmlspecialchars($_POST['studentEmail']);
			
			if ($UM->grantElder($emailStudent)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['revokeElderButton'])) {
			$emailStudent = htmlspecialchars($_POST['studentEmail']);
			
			if ($UM->revokeElder($emailStudent)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['removeUserButton'])) {
			$user = $_POST['user'];
			
			if ($UM->remove($user)) {
				CTools::Redirect("users.php");
			}
			
		}
		
		if (!empty($_POST['changeTypeUserButton'])) {
			$user = $_POST['user'];
			$type = $_POST['type'];
			
			if ($UM->setUserType($user, $type)) {
				CTools::Redirect("users.php");
			}
			
		}
		
	}
	else CTools::Redirect("login.php");
  
	// !!!!!!!!!! ВЫВОД СООБЩЕНИЙ !!!!!!!!!!!!!!
	
?>