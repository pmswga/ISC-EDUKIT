<?php

    require_once "managers/usermanager.class.php";
    require_once "structures/subject.class.php";

    use IEP\Managers\UserManager;
    use IEP\Structures\User;
    use IEP\Structures\Student;
    use IEP\Structures\Teacher;
    use IEP\Structures\Parent_;
    use IEP\Structures\Subject;
    
  	$DB = new PDO("mysql:dbname=iep;host=127.0.0.1", "root", "");
  	$DB->exec("SET NAMES utf8");

    $UM = new UserManager($DB);

    $t = new User("Fn", "Sn", "Pt", "admin@mail.ru", md5("passsword"), USER_TYPE_ADMIN);
    
    
    echo "<pre>";
    print_r($UM->getParents());
    echo "</pre>";


?>
