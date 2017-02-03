<?php

    require_once "managers/usermanager.class.php";
    require_once "structures/subject.class.php";

    use IEP\Managers\UserManager;
    use IEP\Structures\User;
    use IEP\Structures\Student;
    use IEP\Structures\Teacher;
    use IEP\Structures\Parent_;
    use IEP\Structures\Subject;

    $opt = array(
  		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
  		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
  	);
  	$DB = new PDO("mysql:dbname=iep;host=127.0.0.1", "root", "", $opt);
  	$DB->exec("SET NAMES utf8");

    $UM = new UserManager($DB);

    $t = new User("Fn", "Sn", "Pt", "admin@mail.ru", md5("passsword"), USER_TYPE_ADMIN);
    
    
    echo "<pre>";
    print_r($UM->getTeachers());
    echo "</pre>";


?>
