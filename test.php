<?php 
  
  require_once "mail/PHPMailerAutoload.php";
  
  $mail = new PHPMailer;
  
  $mail->setFrom("fromMe@admin.ru", "John Green");
  $mail->addAddress("pmswga@gmail.com", "Sergey");
  
  $mail->isHTML(true);
  
  $mail->Subject = "This is subject";
  $mail->Body = "This is ‘ак ее content";
  $mail->AltBody = "This is body in plain text for non-HTML email";
  
  if (!$mail->send()) {
    echo "Message could not be sent";
    echo "Mailer error: ".$mail->ErrorInfo;
  } else {
    echo "All good";
  }
  
  echo md5("password");
  
?>