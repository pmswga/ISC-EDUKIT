<?php
  declare(strict_types = 1);
	namespace IEP\Structures;

  /*!
    
    \name news.class.php
    \class News
    \brief Класс, который хранит в себе информацию об новости
    \author pmswga
    \version 1.0
    
    Класс представляет собой сущность, в которую помещаются данные из базы данных
    
  */
  
	class News
	{
		private $id;
		private $caption;
		private $content;
		private $author;
		private $date_publication;
		
    /*!
      \param[in] $caption          - Заголовок
      \param[in] $content          - Содержание новости
      
      \param[in] $author           - Автор
      \note Формат отображения "Фамилия И.О."
      
      \param[in] $date_publication - Дата публикации
      \note Формат даты "d.m.Y H:i:s"
    */
    
		function __construct(string $caption, string $content, string $author, string $date_publication)
		{
			$this->caption = $caption;
			$this->content = $content;
			$this->author = $author;
			$this->date_publication = $date_publication;
      $this->id = 0;
		}
    
    /*!
      \param[in] $id - Идентификатор новости
      \note Идентификатор из базы данных
    */
		
		public function setNewsID(int $id)
		{
			$this->id = $id;
		}
		
    /*!
      \return Идентификатор новости
    */
    
		public function getNewsID() : int
		{
			return $this->id;
		}
		
    /*!
      \return Заголовок новости
    */
    
		public function getCaption() : string
		{
			return $this->caption;
		}
		
    /*!
      \return Возвращает HTML содержимое новости
      \note Для декодирования и отображения HTML на сайте используется функция html_entity_decode()
    */
    
		public function getContent()
		{
			return html_entity_decode($this->content, ENT_HTML5);
		}
		
    /*!
      \return Автора новости
      \note Формат отображения "Фамилия И.О."
    */
    
		public function getAuthor() : string
		{
			return $this->author;
		}
    
    /*!
      \return Дату публикации
      \note Формат даты "d.m.Y H:i:s"
    */
		
		public function getDatePublication() : string
		{
			return $this->date_publication;
		}
		
    /*!
      \param[in] $caption - Заголовок новости
    */
    
		public function setCaption($caption)
		{
			$this->caption = $caption;
		}
    
    /*!
      \param[in] $content - Содержание новости
    */
		
		public function setContent($content)
		{
			$this->content = $content;
		}
    
    /*!
      \param[in] $author - Автор новости
      \note Формат отображения "Фамилия И.О."
    */
		
		public function setAuthor($author)
		{
			$this->author = $author;
		}
    
    /*!
      \param[in] $date_publication - Дата публикации
      \note Формат даты "d.m.Y H:i:s"
    */
		
		public function setDatePublication($date_publication)
		{
			$this->date_publication = $date_publication;
		}
		
	}
	
?>
