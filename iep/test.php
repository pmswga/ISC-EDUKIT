<?php
  
  require_once "managers/um.class.php";
  require_once "managers/sm.class.php";
  require_once "managers/gm.class.php";
  require_once "managers/sbm.class.php";
  require_once "managers/nm.class.php";
  require_once "managers/tm.class.php";
  require_once "../engine/settings.php";
  
  use IEP\Managers\UserManager;
  use IEP\Managers\SpecialtyManager;
  use IEP\Managers\GroupManager;
  use IEP\Managers\SubjectManager;
  use IEP\Managers\NewsManager;
  use IEP\Managers\TestManager;
  use IEP\Structures\User;
  use IEP\Structures\Teacher;
  use IEP\Structures\Parent_;
  use IEP\Structures\Student;
  use IEP\Structures\Specialty;
  use IEP\Structures\Group;
  use IEP\Structures\Subject;
  use IEP\Structures\News;
  use IEP\Structures\Test;
  use IEP\Structures\TestQuestion;
  
  $DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1:".PORT, USER_NAME, USER_PASSWORD);
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $TM = new TestManager($DB);
  
  // $TM->add(new Test("CaptTestr", 1, "jackxp@gmail.com", [2]));
  
  // $TM->setGroup(18, 2);
  
  // $TM->addQuestion(24, new TestQuestion(
    // "First question",
    // "1",
    // ["1", "2", "3", "4"]
  // ));
  
  
  echo "<pre>";  print_r($TM->getTests("jackxp@gmail.com"));  echo "</pre>";
  
  
  
  
  
  
  
  
  
  // $UM = new UserManager($DB);
  
  // echo "<pre>";  // print_r($UM->authentification("jackxp@gmail.com", md5("password")));  // echo "</pre>";
  
  // echo "<pre>";  // print_r($UM->getAllTeachers());  // echo "</pre>";
  
  
?>