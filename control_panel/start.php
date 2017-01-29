<?php
	require_once "../engine/ctemplater.php";
	require_once "../engine/ctools.php";
	require_once "../engine/cform.php";
	require_once "../engine/settings.php";
	
	require_once "../architecture/user.class.php";
	require_once "../architecture/typesUser.php";
	require_once "../architecture/groupmanager.class.php";
	require_once "../architecture/usermanager.class.php";
	require_once "../architecture/subjectsmanager.class.php";
	require_once "../architecture/specialtymanager.class.php";
	
	$CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
	$opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD, $opt);
	$DB->exec("SET NAMES utf8");
	
	$GM = new GroupManager();
	$GM->setDBC($DB);
	
	$UM = new UserManager();
	$UM->setDBC($DB);
	
	$SM = new SubjectsManager();
	$SM->setDBC($DB);
	
	$SPM = new SpecialtyManager();
	$SPM->setDBC($DB);
	
	session_start();
?>
