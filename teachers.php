<?php
  require_once "start.php";
  require_once "iep/pages/teachers.page.class.php";
	
  use IEP\Structures\User;
  use IEP\Pages\TeachersPage;
  
  $TeachersPage = new TeachersPage("Препоадаватели", "teacher.tpl");

  $TeachersPage->setData("teachers", $UM->getAllTeachers());
  
	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $TeachersPage->setData("user", $_SESSION['user']);
  }
  
  $CT->assign($TeachersPage->data());
  $CT->Show($TeachersPage->template());
?>
