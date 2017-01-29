<?php
    
    require_once __DIR__.DIRECTORY_SEPARATOR."newsmanager.class.php";
    
    use IEP\Managers\NewsManager;
    use IEP\Structures\OneNews;
    
    $opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=iep;host=127.0.0.1", "root", "", $opt);
	$DB->exec("SET NAMES utf8");
    
    
    $NM = new NewsManager($DB);
    
    $NM->change(new OneNews("First", "Content", "jackxp@gmail.com", "09.09.1998"), new OneNews("Second", "Contesnt", "jackxp@gmail.com", "09.09.1998"));
    
?>