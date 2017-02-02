<?php
	require_once "../engine/ctemplater.php";
	require_once "../engine/ctools.php";
	require_once "../engine/cform.php";
	require_once "../engine/settings.php";
	
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/user.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/typesUser.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/managers/groupmanager.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/managers/usermanager.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/managers/subjectsmanager.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/managers/specialtymanager.class.php";
	
    use IEP\Managers\UserManager;
    use IEP\Managers\SubjectsManager;
    use IEP\Managers\NewsManager;
    use IEP\Managers\GroupManager;
    use IEP\Managers\SpecialtyManager;
    
	$CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
    
	$opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD, $opt);
	$DB->exec("SET NAMES utf8");
	
	$GM = new GroupManager($DB);
	
	$UM = new UserManager($DB);
	
	$SM = new SubjectsManager($DB);
	
	$SPM = new SpecialtyManager($DB);
	
	session_start();
?>
