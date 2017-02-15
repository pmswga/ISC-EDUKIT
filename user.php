<?php
    require_once "start.php";
	
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
				$CT->assign("user", $user);
				
				$CT->Show("accounts/teacher.tpl");
				
				if(!empty($_POST['addNewsButton']))
				{
					$news_data = CForm::getData(array(
						"caption",
						"content",
						"author_email",
						"date_publication"
					));
					
					$user_id = $UM->get("SELECT `id_user` FROM `users` WHERE `email`=:email", [":email" => $news_data['author_email']])[0][0];
					
					$NM->add(new OneNews($news_data['caption'], $news_data['content'], $user_id, $news_data['date_publication']));
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
