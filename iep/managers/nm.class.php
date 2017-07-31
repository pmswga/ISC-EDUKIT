<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/news.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\News;
  
  class NewsManager extends IEP
  {
    
    public function add($news)
    {
      $add_news_query = $this->dbc()->prepare("call addNews(:caption, :content, :author, :date)");
      
      $add_news_query->bindValue(":caption", $news->getCaption());
      $add_news_query->bindValue(":content", $news->getContent());
      $add_news_query->bindValue(":author", $news->getAuthor());
      $add_news_query->bindValue(":date", $news->getDatePublication());
      
      return $add_news_query->execute();
    }
    
    public function addAdminNews($news)
    {
      $add_news_query = $this->dbc()->prepare("call addAdminNews(:caption, :content, :author, :date)");
      
      $add_news_query->bindValue(":caption", $news->getCaption());
      $add_news_query->bindValue(":content", $news->getContent());
      $add_news_query->bindValue(":author", $news->getAuthor());
      $add_news_query->bindValue(":date", $news->getDatePublication());
      
      return $add_news_query->execute();
    }
    
    public function getNews(string $teacher_email)
    {
      $db_news = $this->query("call getNews(:t_email)", [":t_email" => $teacher_email]);
      
      $news = array();
      foreach ($db_news as $db_new) {
        $new = new News($db_new['caption'], $db_new['content'], $db_new['author'], $db_new['dp']);
        $new->setNewsID((int)$db_new['id_news']);
        
        $news[] = $new;
      }
      
      return $news;
    }
    
    public function getAllAdminsNews()
    {
      $db_news = $this->query("call getAllAdminNews()");
      
      $news = array();
      foreach ($db_news as $db_new) {
        $new = new News($db_new['caption'], $db_new['content'], $db_new['author'], $db_new['dp']);
        $new->setNewsID((int)$db_new['id_news']);
        
        $news[] = $new;
      }
      
      return $news;
    }
    
    public function getAllNews()
    {
      $db_news = $this->query("call getAllNews()");
      
      $news = array();
      foreach ($db_news as $db_new) {
        $new = new News($db_new['caption'], $db_new['content'], $db_new['author'], $db_new['dp']);
        $new->setNewsID((int)$db_new['id_news']);
        
        $news[] = $new;
      }
      
      return $news;
    }
    
    public function changeCaptionNews(int $subject_id, string $new_caption)
    {
      $change_caption_news_query = $this->dbc()->prepare("call changeCaptionNews(:subject_id, :caption)");
      
      $change_caption_news_query->bindValue(":subject_id", $subject_id);
      $change_caption_news_query->bindValue(":caption", $new_caption);
      
      return $change_caption_news_query->execute();
    }
    
    public function changeContentNews(int $subject_id, string $new_conent)
    {
      $change_conent_news_query = $this->dbc()->prepare("call changeContentNews(:subject_id, :conent)");
      
      $change_conent_news_query->bindValue(":subject_id", $subject_id);
      $change_conent_news_query->bindValue(":conent", $new_conent);
      
      return $change_conent_news_query->execute();
    }
    
    public function remove($news_id) : bool
    {
      $remove_news_query = $this->dbc()->prepare("call removeNews(:news_id)");
      
      $remove_news_query->bindValue(":news_id", $news_id);
      
      return $remove_news_query->execute();
    }
    
    
  }
  
?>