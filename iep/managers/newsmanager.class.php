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
			$add_news_query = $this->dbc()->prepare("INSERT INTO `news`
					(`caption`, `content`, `id_author`, `date_publication`)
					VALUES
					(:caption, :content, (SELECT `id_user` FROM `users` WHERE `email`=:author), :date_publication)
			");
			
			$add_news_query->bindValue(":caption", $news->getCaption());
			$add_news_query->bindValue(":content", $news->getContent());
			$add_news_query->bindValue(":author", $news->getAuthor());
			$add_news_query->bindValue(":date_publication", $news->getDatePublication());
			
			return $add_news_query->execute();
		}
		
		public function getNews() : array
		{
			$db_news = $this->get("SELECT `caption`, `content`, CONCAT(`second_name`, ' ', LEFT(`first_name`, 1), '.', LEFT(`patronymic`, 1), '.') as author, `date_publication` FROM `news` n INNER JOIN `users` u ON n.id_author = u.id_user");
			
			$news = array();
			foreach($db_news as $db_one_news)
			{
					$one_news = new OneNews($db_one_news['caption'], $db_one_news['content'], $db_one_news['author'], $db_one_news['date_publication']);
					$news[] = $one_news;
			}
			
			return $news;
		}
		
		public function remove($news_caption) : bool
		{
			$remove_news_query = $this->dbc()->prepare("DELETE FROM `news` WHERE `caption`=:caption");
			$remove_news_query->bindValue(":caption", $news_caption);
			
			return $remove_news_query->execute();
		}
        
		public function clear() : bool
		{
				return $this->dbc()->prepare("DELETE FROM `news`")->execute();
		}
		
		public function change($old, $new) : bool
		{
			$update_news_query = $this->dbc()->prepare("UPDATE `news` SET
					`caption`=:n_caption, `content`=:n_content
					WHERE
					`caption`=:o_caption OR `content`=:o_content
			");
			
			$update_news_query->bindValue(":n_caption", $new->getCaption());
			$update_news_query->bindValue(":n_content", $new->getContent());
			$update_news_query->bindValue(":o_caption", $old->getCaption());
			$update_news_query->bindValue(":o_content", $old->getContent());
			
			return $update_news_query->execute();
		}
	}
	
?>