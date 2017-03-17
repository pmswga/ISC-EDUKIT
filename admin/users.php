<?php
  
  require_once "start.php";
  
  use IEP\Managers\UserManager;
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectsManager;
  use IEP\Structures\Student;
  use IEP\Structures\Parent_;
  use IEP\Structures\Teacher;
  use IEP\Structures\User;
  
	$UM = new UserManager($DB);
  $GM = new GroupManager($DB);
  $SM = new SubjectsManager($DB);
  
  $CT->assign("groups", $GM->getGroups());
  $CT->assign("subjects", $SM->getSubjects());
  
  $CT->Show("users.tpl");
  
  if (!empty($_POST['addStudentButton'])) {
    $data = CForm::getData(["sn", "fn", "pt", "email", "paswd", "ha", "cp", "grp"]);
    $data['paswd'] = md5($data['paswd']);
    
    $new_student = new Student(
      new User(
        $data['sn'], 
        $data['fn'], 
        $data['pt'], 
        $data['email'], 
        $data['paswd'], 
        4), 
      $data['ha'], 
      $data['cp']
    );
    $new_student->setGroupID((int)$data['grp']);
    
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
  
  
  
?>