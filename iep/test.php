<?php
    
    require_once "managers/testsmanager.class.php";
    
    use IEP\Managers\TestsManager;
    use IEP\Structures\Test;
    use IEP\Structures\OneQuestion;
    
    $opt = array(
		"PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION,
		"PDO::ATTR_DEFAULT_FETCH_MODE" => PDO::FETCH_ASSOC
	);
	$DB = new PDO("mysql:dbname=iep;host=127.0.0.1", "root", "", $opt);
	$DB->exec("SET NAMES utf8");
    
    $TM = new TestsManager($DB);
    
    $oq = new OneQuestion("f, s, t?", ["f", "s", "t"], "t");
    
    $test = new Test("What is the OS subject", "АКС", "jackxp@gmail.com", "203;204;205", [$oq]);
    $test2 = new Test("What is the АКС subject", "АКС", "jackxp@gmail.com", "204;205");
    
    $TM->removeQuestion("Q3");
    
    echo "<pre>";
    print_r($TM->getTests());
    echo "</pre>";
    
    
?>