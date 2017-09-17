<?php
	require_once "start.php";
	
  use IEP\Structures\User;
  
	$newsByDate = array();
	
	foreach ($NM->getAllNews() as $one_news) {
		$newsByDate[$one_news->getDatePublication()][] = $one_news;
	}
	
	$CT->assign("newsByDate", array_reverse($newsByDate));
  
	if (isset($_SESSION['user']) &&
      $_SESSION['user'] instanceof User
  ) {
    $CT->assign("user", $_SESSION['user']);
  }
  
  $CT->Show("news.tpl");
	
?>
