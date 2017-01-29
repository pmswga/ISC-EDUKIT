<?php
	require_once "engine/ctemplater.php";
	require_once "engine/cdatabase.php";
	require_once "engine/ctools.php";
	require_once "engine/cform.php";
	require_once "engine/settings.php";
	
	require_once "iep/user.class.php";
	require_once "iep/usermanager.class.php";
	require_once "iep/subjectsmanager.class.php";
	require_once "iep/newsmanager.class.php";
	require_once "iep/typesUser.php";
	
	
	$CT = new CTemplater("templates/tpl", "templates/tpl_c", "templates/configs", "templates/cache");
	
	$opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=".DATA_BASE_NAME.";host=127.0.0.1", USER_NAME, USER_PASSWORD, $opt);
	$DB->exec("SET NAMES utf8");
	
	$UM = new UserManager();
	$UM->setDBC($DB);
	
	$SM = new SubjectsManager();
	$SM->setDBC($DB);
	
	$NM = new NewsManager();
	$NM->setDBC($DB);
	
	$news = $NM->getNews();
	$groups = $DB->query("SELECT grp FROM `groups`");
	
	$CT->assign("groups", $groups);
	$CT->assign("news", $news);
	
	session_start();
?>
