<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
    
	require_once "iep.class.php";
	require_once "onenews.class.php";
	
	class NewsManager extends IEP
	{
		
		public function add($news)
		{
			$add_news_query = $this->dbc()->prepare("INSERT INTO `news`
				(`caption`, `content`, `id_author`, `date_publication`) 
				VALUES
				(:caption, :content, (SELECT `id_user` FROM `users` WHERE ``), :date_publication)
			");
            
			$add_news_query->bindValue(":caption", $news->getCaption());
			$add_news_query->bindValue(":content", $news->getContent());
			$add_news_query->bindValue(":id_author", $news->getAuthor());
			$add_news_query->bindValue(":date_publication", $news->getDatePublication());
			
			return $add_news_query->execute();
		}
		
		public function getNews()
		{
			return $this->get("SELECT * FROM `news`");
		}
		
		public function remove($what)
		{
			
		}
		
		public function change($old, $new)
		{
			
		}
	}
	
?>