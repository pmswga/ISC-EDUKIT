<?php
	require_once "start.php";
  require_once "../mail/PHPMailerAutoload.php";
	
	if (isset($_SESSION['admin'])) {
		
		$UM = new IEP\Managers\UserManager($DB);
		$Notificator = new PHPMailer;
		
		$CT->assign("parents", $UM->getParents());
		$CT->Show("notifications.tpl");
		
		if (!empty($_POST['sendNotificationButton'])) {
			$select_parents = $_POST['select_parent'];
			$subject = $_POST['subject'];
			$notification = $_POST['message'];
			
			$Notificator->setFrom("edukit@noreply.com", "Гусева Елена Львовна");
			
			
			for ($i = 0; $i < count($select_parents); $i++) {
				$Notificator->addAddress($select_parents[$i]);
			}
			
			$Notificator->isHTML(true);
			
			$Notificator->Subject = $subject;
			$Notificator->Body    = $notification;
			
			if ($Notificator->send()) {
				CTools::Message("Уведомление отправлено");
			} else {
				CTools::Message($Notificator->ErrorInfo);
			}
			
		}
		
	}
	else CTools::Redirect("login.php");

?>
