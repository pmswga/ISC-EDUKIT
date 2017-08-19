<?php

	require_once "start.php";
	
	use IEP\Managers\NewsManager;
	use IEP\Structures\News;
	
	if (isset($_SESSION['admin'])) {		
		
		$NM = new NewsManager($DB);
    
		$CT->assign("news", $NM->getAdminNews($_SESSION['admin']->getEmail()));
    $CT->assign("date", date("d.m.Y H:i:s"));
		$CT->assign("user", $_SESSION['admin']);
		
		$CT->Show("news.tpl");
		
		if (!empty($_POST['addNewsButton'])) {
			$data = CForm::getData(["caption", "content", "email", "dp"]);
			
      $data['dp'] = date_format(new DateTime($data['dp']), "Y-m-d");
      
			$new_news = new News($data['caption'], $data['content'], $data['email'], $data['dp']);
      
			if ($NM->addAdminNews($new_news)) {
        CTools::Message("All good");
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
		
	}	else {
    CTools::Redirect("login.php");    
  }
	
?>
