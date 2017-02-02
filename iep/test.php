<?php
    
    require_once "managers/usermanager.class.php";
    
    use IEP\Managers\UserManager;
    use IEP\Structures\User;
    use IEP\Structures\Student;
    use IEP\Structures\Teacher;
    use IEP\Structures\Parent_;
    
    $opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=iep;host=127.0.0.1", "root", "", $opt);
	$DB->exec("SET NAMES utf8");
    
    $UM = new UserManager($DB);
    
    $t = new Teacher(new User("Fn", "Sn", "Pt", "teac@mail.ru", md5("passsword"), USER_TYPE_TEACHER), "info");
    
    $UM->add($t);
    
    
?>