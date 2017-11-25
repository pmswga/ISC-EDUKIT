<?php
	require_once "start.php";
  require_once "../mail/PHPMailerAutoload.php";
			
  use IEP\Structures\User;
  
	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
  ) {
		
		$UM = new IEP\Managers\UserManager($DB);
		$Notificator = new PHPMailer;
		$Notificator->CharSet = 'UTF-8';
		$Notificator->isSMTP();
		
		$Notificator->Host = "smtp.gmail.com";
		$Notificator->Port = 587;
		$Notificator->SMTPSecure = "tls";
		$Notificator->SMTPAuth = true;
		$Notificator->Username = "s.basyrov@mgutm.ru";
		$Notificator->Password = "42CjyRbh";
		
		$CT->assign("parents", $UM->getAllParents());
    $CT->assign("students", $UM->getAllStudentsElders());
		$CT->Show("notifications.tpl");
		
		if (!empty($_POST['sendNotificationButton'])) {
			$select_parents = $_POST['select_user'];
			$subject = $_POST['subject'];
			$notification = $_POST['message'];
			
			$Notificator->setFrom("edukit@noreply.com", "Гусева Елена Львовна");
						
			for ($i = 0; $i < count($select_parents); $i++) {
				$Notificator->addAddress($select_parents[$i]);
			}
			
			$Notificator->isHTML(true);
			
			$Notificator->Subject = $subject;
			$Notificator->Body    = $notification;
			
      for ($i = 0; $i < count($_FILES['userfile']['tmp_name']); $i++) {
        $uploadFile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$i]));
        $filename = $_FILES['userfile']['name'][$i];
        
        if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $uploadFile)) {
          $Notificator->addAttachment($uploadFile, $filename);
        } else {
          CTools::Message("Erro load file");
        }
        
      }
      
			if ($Notificator->send()) {
				CTools::Message("Уведомление отправлено");
			} else {
				CTools::Message($Notificator->ErrorInfo);
			}
      
      CTools::Redirect("notifications.php");
		}
		
	}	else {    
    CTools::Redirect("login.php");
  } 

?>
