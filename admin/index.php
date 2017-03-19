<?php
	require_once "start.php";
  require_once "../mail/PHPMailerAutoload.php";
	const _THIS_ = "index.php";
    
  use IEP\Structures\User;
  use IEP\Structures\Teacher;
  use IEP\Structures\Student;
  use IEP\Structures\Parent_;
  use IEP\Structures\Subject;
  use IEP\Structures\Specialty;
  use IEP\Structures\Group;
	
	if(isset($_SESSION['admin']))
	{		
		
		$CT->Show("index.tpl");
		
	}
	else CTools::Redirect("login.php");

?>
