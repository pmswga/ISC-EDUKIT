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
    
    $oq = new OneQuestion("How mach year?", ["24", "32", "33"], "33");
    $oq2 = new OneQuestion("How mach year 2?", ["1", "2", "3"], "12");
    $oq3 = new OneQuestion("Q3", ["f", "s", "t", "f", "f", "s"], "s");
    
    $test = new Test("What is the OS subject", "АКС", "jackxp@gmail.com", "203;204;205", [$oq]);
    $test2 = new Test("What is the АКС subject", "АКС", "jackxp@gmail.com", "204;205", [$oq2]);
    
    $TM->addQuestion("What is the АКС subject", $oq3);
    
    echo "<pre>";
    print_r($TM->getTests());
    echo "</pre>";
    
    
?>