<?php
	
	require_once "../start.php";
	
	if (!empty($_POST['test_id'])) {
		
		$test = $TM->getTest((int)$_POST['test_id']);
		
		include "../templates/tpl/tests/info.tpl";
	}
	
?>