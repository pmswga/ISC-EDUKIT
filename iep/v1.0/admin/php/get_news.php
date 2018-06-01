<?php
  
  require_once "../start.php";
  
	use IEP\Managers\NewsManager;
	use IEP\Structures\News;
  
  $news_id = (int)$_POST['news_id'];
  
  if ($news_id > 0) {
  
		$NM = new NewsManager($DB);
    $news = $NM->getAdminNewsByID($news_id)[0];
    $news["date_publication"] = date_format(new DateTime($news["date_publication"]), "d.m.Y H:i:s");
    
    if (!empty($news)) {
      echo json_encode($news);
    } else {
      echo "error";
    }
    
  }
  
?>
