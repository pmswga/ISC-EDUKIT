<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
    
	require_once "iep.class.php";
	require_once "onenews.class.php";
	
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
		
		public function getNews()
		{
			return $this->get("SELECT * FROM `news`");
		}
		
		public function remove($news_caption)
		{
			$remove_news_query = $this->dbc()->prepare("DELETE FROM `news` WHERE `caption`=:caption");
            $remove_news_query->bindValue(":caption", $news_caption);
            
            return $remove_news_query->execute();
		}
		
		public function change($old, $new)
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