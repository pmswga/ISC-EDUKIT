<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
    
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/onenews.class.php";
	
	use IEP\Structures\OneNews;
    
	class NewsManager extends IEP
	{
		
		public function add($news) : bool
		{
			$add_news_query = $this->dbc()->prepare("call addNews(:caption, :content, :emailTeacher, :date)");
			
			$add_news_query->bindValue(":caption", $news->getCaption());
			$add_news_query->bindValue(":content", $news->getContent());
			$add_news_query->bindValue(":emailTeacher", $news->getAuthor());
			$add_news_query->bindValue(":date", $news->getDatePublication());
			
			return $add_news_query->execute();
		}
		
		public function getNews() : array
		{
			$db_news = $this->get("call getAllNews()");
			
			$news = array();
			foreach($db_news as $db_one_news)
			{
					$one_news = new OneNews($db_one_news['caption'], $db_one_news['content'], $db_one_news['author'], $db_one_news['dp']);
					$one_news->setNewsID((int)$db_one_news['id_news']);
					
					$news[] = $one_news;
			}
			
			return $news;
		}
		
		public function remove($id_news) : bool
		{
			$remove_news_query = $this->dbc()->prepare("call removeNews(:id_news)");
			$remove_news_query->bindValue(":id_news", $news_caption);
			
			return $remove_news_query->execute();
		}
        
		public function clear() : bool
		{
				return $this->dbc()->prepare("call clearAllNews()")->execute();
		}
		
		public function change($old, $new) : bool
		{
			
		}
	}
	
?>