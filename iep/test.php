<?php
  
  require_once "managers/um.class.php";
  require_once "managers/sm.class.php";
  require_once "managers/gm.class.php";
  require_once "managers/sbm.class.php";
  require_once "../engine/settings.php";
  
  use IEP\Managers\UserManager;
  use IEP\Managers\SpecialtyManager;
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectManager;
  use IEP\Structures\User;
  use IEP\Structures\Teacher;
  use IEP\Structures\Parent_;
  use IEP\Structures\Student;
  use IEP\Structures\Specialty;
  use IEP\Structures\Group;
  use IEP\Structures\Subject;
  
  $DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1:".PORT, USER_NAME, USER_PASSWORD);
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  
  $SBM = new SubjectManager($DB);
  
  $SBM->changeDescriptionSubject(1, "Математика");

  echo "<pre>";  print_r($SBM->getAllSubjects());  echo "</pre>";
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /*
  
  $UM = new UserManager($DB);
  
  echo "<pre>";  print_r($UM->getAllParents());  echo "</pre>";
  */
  // echo "<pre>";  // print_r($UM->authentification("ruz@gmail.com", md5("password")));  // echo "</pre>";
  
  
?>