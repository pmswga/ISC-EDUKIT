<?php
	require_once "start.php";
	
	$newsByDate = array();
	
	foreach ($NM->getNews() as $one_news) {
		$newsByDate[$one_news->getDatePublication()][] = $one_news;
	}
	
	$CT->assign("newsByDate", $newsByDate);
	
	if(isset($_SESSION['user']))
	{
		$CT->Show("users/news.tpl");
	}
	else $CT->Show("guest/news.tpl");
	
?>