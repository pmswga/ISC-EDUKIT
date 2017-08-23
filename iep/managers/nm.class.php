<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/news.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\News;
  
  /*!
    
    \class NewsManager
    \extends IEP
    \brief Менеджер для работы с новостями
    \author pmswga
    \version 1.0
    
  */
  
  class NewsManager extends IEP
  {
    
    /*!
      \brief Добавление новой новости 
      \note Метод используется для добавления новостей преподавателем
      \param[in] $news - новости
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function add($news)
    {
      $add_news_query = $this->dbc()->prepare("call addNews(:caption, :content, :author, :date)");
      $add_news_query->bindValue(":caption", $news->getCaption());
      $add_news_query->bindValue(":content", $news->getContent());
      $add_news_query->bindValue(":author", $news->getAuthor());
      $add_news_query->bindValue(":date", $news->getDatePublication());
      
      return $add_news_query->execute();
    }
    
    /*!
      \brief Добавление новой новости администратором
      \note Метод используется для добавления новостей администратором
      \param[in] $news - Новости
      \note Массив с объектами класса News
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function addAdminNews($news) : bool
    {
      $add_news_query = $this->dbc()->prepare("call addAdminNews(:caption, :content, :author, :date)");
      $add_news_query->bindValue(":caption", $news->getCaption());
      $add_news_query->bindValue(":content", $news->getContent());
      $add_news_query->bindValue(":author", $news->getAuthor());
      $add_news_query->bindValue(":date", $news->getDatePublication());
      
      return $add_news_query->execute();
    }
    
    /*!
      \brief Возвращает все новости опубликованные преподавателем
      \param[in] $teacher_email - электронная почта преподавателя
      \return Новости
      \note Массив с объектами класса News
    */
    
    public function getNews(string $teacher_email) : array
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
    
    /*!
      \brief Возвращает все новости опубликованные администратором
      \param[in] $admin_email - электронная почта администратора
      \return Новости
      \note Массив с объектами класса News
    */
    
    public function getAdminNews(string $admin_email) : array
    {
      $db_news = $this->query("call getAdminNews(:admin_email)", [":admin_email" => $admin_email]);
      
      $news = array();
      foreach ($db_news as $db_new) {
        $new = new News($db_new['caption'], $db_new['content'], $admin_email, $db_new['dp']);
        $new->setNewsID((int)$db_new['id_news']);
        
        $news[] = $new;
      }
      
      return $news;
    }
    
    /*!
      \brief Возвращает все опубликованные новости
      \return Новости
      \note Массив с объектами класса News
    */
    
    public function getAllNews() : array
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
    
    /*!
      \brief Изменяет заголовок новости
      \param[in] $news_id    - Идентификатор новости
      \param[in] $new_caption - Новое содержимое
      \note Содержимое новости может быть представлено в формате HTML
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function changeCaptionNews(int $news_id, string $new_caption) : bool
    {
      $change_caption_news_query = $this->dbc()->prepare("call changeCaptionNews(:news_id, :caption)");
      $change_caption_news_query->bindValue(":news_id", $news_id);
      $change_caption_news_query->bindValue(":caption", $new_caption);
      
      return $change_caption_news_query->execute();
    }
    
    /*!
      \brief Изменяет содержимое новости
      \param[in] $news_id    - Идентификатор новости
      \param[in] $new_conent - Новое содержимое
      \note Содержимое новости может быть представлено в формате HTML
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function changeContentNews(int $news_id, string $new_conent) : bool
    {
      $change_conent_news_query = $this->dbc()->prepare("call changeContentNews(:news_id, :conent)");
      $change_conent_news_query->bindValue(":news_id", $news_id);
      $change_conent_news_query->bindValue(":conent", $new_conent);
      
      return $change_conent_news_query->execute();
    }
    
    
    /*!
      \brief Возвращает все опубликованные новости
      \param[in] $news_id - Идентификатор новости
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function remove($news_id) : bool
    {
      $remove_news_query = $this->dbc()->prepare("call removeNews(:news_id)"); 
      $remove_news_query->bindValue(":news_id", $news_id);
      
      return $remove_news_query->execute();
    }    
    
  }
  
?>
