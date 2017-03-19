<?php

	require_once "start.php";
	
	use IEP\Managers\NewsManager;
	use IEP\Structures\OneNews;
	
	if(isset($_SESSION['admin']))
	{		
		
		$NM = new NewsManager($DB);
		
		$CT->assign("news", $NM->getNews());
		$CT->assign("user", $_SESSION['admin']);
		
		$CT->Show("news.tpl");
		
		if (!empty($_POST['addNewsButton'])) {
			$data = CForm::getData(["caption", "content", "email", "dp"]);
			
			$new_news = new OneNews($data['caption'], $data['content'], $data['email'], $data['dp']);
			
			CTools::var_dump($new_news);
			
			if ($NM->add($new_news)) {
				CTools::Redirect("news.php");
			}
			
		}
		
	}
	else CTools::Redirect("login.php");
	
	
?>