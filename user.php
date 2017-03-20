<?php
  require_once "start.php";
	
	use IEP\Structures\OneNews;
	
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		
		switch($user->getTypeUser())
		{
			case USER_TYPE_STUDENT:
			{
				$sogroups = $UM->get("SELECT * FROM `users` u INNER JOIN `students` s ON u.id_user=s.id_student WHERE `grp`=:grp AND `email`!=:email",
					[":grp" => $user->getGroup(), ":email" => $user->getEmail()]
				);
				
				$CT->assign("fio", $user->getSn()." ".$user->getFn()." ".$user->getPt());
				$CT->assign("sogroups", $sogroups);
				$CT->assign("user", $user);
				
				$CT->Show("accounts/student.tpl");
			} break;
			case USER_TYPE_TEACHER:
			{
				
				$teacher_subjects = $SM->getTeacherSubjects($user->getEmail());
				$other_subjects = $SM->getSubjects();
				
				//< Удаляем предметы, которые преподаватель уже ведёт
				foreach ($teacher_subjects as $teacher_subject) {
					if (in_array($teacher_subject, $other_subjects)) {
						unset($other_subjects[array_keys($other_subjects, $teacher_subject)[0]]);
					}
				}
				
				$user->setSubjects($teacher_subjects);
				$CT->assign("user", $user);
				$CT->assign("subjects", $other_subjects);
				
				$CT->Show("accounts/teacher.tpl");
				
				if (!empty($_POST['addNewsButton'])) {
					$data = CForm::getData(array(
						"caption",
						"content",
						"teacherEmail",
						"dp"
					));
					
					$new_news = new OneNews($data['caption'], $data['content'], $data['teacherEmail'], $data['dp']);
					
					if ($NM->add($new_news)) {
						CTools::Message("Новость опубликована");
					} else {
						CTools::Message("Произошла ошибка");
					}
					
				}
				
				if (!empty($_POST['setSubjectButton'])) {
					$select_subject = $_POST['select_subject'];
					$email = htmlspecialchars($_POST['emailTeacher']);
					
					$result = true;
					for ($i = 0; $i < count($select_subject); $i++) {
						$result *= $SM->setSubject($email, $select_subject[$i]);
					}
					
					if ($result) {
						CTools::Message("Предметы успешно назначены");
					} else {
						CTools::Message("Произошла ошибка при назначении предметов");
					}
					
					CTools::Redirect("user.php");
				}
				
				if (!empty($_POST['deleteSubjectButton'])) {
					$select_subject = $_POST['select_subject'];
					
					$result = true;
					for ($i = 0; $i < count($select_subject); $i++) {
						$result *= $SM->unsetSubject($user->getEmail(), $select_subject[$i]);
					}
					
					if ($result) {
						CTools::Message("Предметы убраны");
					} else {
						CTools::Message("Произошла ошибка");
					}
					
					CTools::Redirect("user.php");
				}
				
			} break;
			case USER_TYPE_PARENT:
			{
				$CT->assign("fio", $user->getSn()." ".$user->getFn()." ".$user->getPt());
				$CT->assign("user", $user);
        
				$CT->Show("accounts/parent.tpl");
			} break;
		}
	}
	else CTools::Redirect("index.php");
	
?>
