<?php
  
  require_once "../start.php";
  
	use IEP\Managers\NewsManager;
	use IEP\Structures\News;
  
  $news_id = (int)$_POST['news_id'];
  
  if ($news_id > 0) {
  
		$NM = new NewsManager($DB);
    $news = $NM->getAdminNewsByID($news_id);
    
    if (!empty($news)) {
      echo json_encode($news[0]);
    } else {
      echo "error";
    }
    
  }
  
?>
