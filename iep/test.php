<?php
    
    require_once __DIR__.DIRECTORY_SEPARATOR."onenews.class.php";
    
    use IEP\Managers\NewsManager;
    
    $opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=iep;host=127.0.0.1", "root", "", $opt);
	$DB->exec("SET NAMES utf8");
    
    
    $NM = new NewsManager($DB);
    
    $NM->add(new OneNews("First", "Content", "Жуков", "09091009"));
    
?>