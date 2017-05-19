<?php

	require_once "start.php";
	
	use IEP\Managers\NewsManager;
	use IEP\Structures\News;
	
	if(isset($_SESSION['admin']))
	{		
		
		$NM = new NewsManager($DB);
		
		$CT->assign("news", $NM->getAllNews());
		$CT->assign("user", $_SESSION['admin']);
		
		$CT->Show("news.tpl");
		
		if (!empty($_POST['addNewsButton'])) {
			$data = CForm::getData(["caption", "content", "email", "dp"]);
			
			$new_news = new News($data['caption'], $data['content'], $data['email'], $data['dp']);
			
			CTools::var_dump($new_news);
			
			if ($NM->add($new_news)) {
				CTools::Redirect("news.php");
			}
			
		}
		
		if (!empty($_POST['removeNewsButton'])) {
			$select_news = $_POST['select_news'];
			
			$result = true;
			for ($i = 0; $i < count($select_news); $i++) {
				$result *= $NM->remove($select_news[$i]);
			}
			
			if ($result) {
				CTools::Message("Новости удалены");
			} else {
				CTools::Message("Произошла ошибка");
			}
			
			CTools::Redirect("news.php");
			
		}
		
	}
	else CTools::Redirect("login.php");
	
	
?>