<?php
  
  require_once "managers/um.class.php";
  require_once "managers/sm.class.php";
  require_once "managers/gm.class.php";
  require_once "../engine/settings.php";
  
  use IEP\Managers\UserManager;
  use IEP\Managers\SpecialtyManager;
  use IEP\Managers\GroupManager;
  use IEP\Structures\User;
  use IEP\Structures\Parent_;
  use IEP\Structures\Student;
  use IEP\Structures\Specialty;
  use IEP\Structures\Group;
  
  $DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1:".PORT, USER_NAME, USER_PASSWORD);
  $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $SM = new SpecialtyManager($DB);
  $GM = new GroupManager($DB);
  
  $GM->upCourse(1);
  
  echo "<pre>";  print_r($GM->getAllGroups());  echo "</pre>";
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /* -------------------------- */
  /*
  $UM = new UserManager($DB);
  
  $parent = new Parent_(
    new User(
      "Климаева",
      "Лариса",
      "Витальевна",
      "lion.80@mail.ru",
      md5("password"),
      4
    ),
    56,
    "Высшее",
    "Не работает",
    "Нету должности",
    "Троицк",
    "+79036140184"
  );
  $s1 = new Student(
  
  );
  
  $s2 = new Student(
  
  );
  
  echo "<pre>";  print_r($parent);  echo "</pre>";
  
  echo "<pre>";  print_r($UM->query("SELECT * FROM `users`"));  echo "</pre>";
  */
  
  
?>