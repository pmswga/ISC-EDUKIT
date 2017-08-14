<?php
	require_once "start.php";
	
	$newsByDate = array();
	
	foreach ($NM->getAllNews() as $one_news) {
		$newsByDate[$one_news->getDatePublication()][] = $one_news;
	}
  
	foreach ($NM->getAllAdminsNews() as $one_news) {
		$newsByDate[$one_news->getDatePublication()][] = $one_news;
	}
	
	$CT->assign("newsByDate", array_reverse($newsByDate));
	
	if (isset($_SESSION['user'])) {
		$CT->Show("users/news.tpl");
	}
	else {    
    $CT->Show("guest/news.tpl");
  }
	
?>