<?php
  declare(strict_types = 1);
	namespace IEP\Structures;

  /*!
    
    \class News news.class.php "iep/structures/news.class.php"
    \brief Класс, который хранит в себе информацию об новости
    \author pmswga
    \version 1.0
    
    Класс представляет собой сущность, в которую помещаются данные из базы данных
    
  */
  
	class News
	{
		private $id;                    ///< Идентификатор
		private $caption;               ///< Заголовок
		private $content;               ///< Содержание
		private $author;                ///< Автор
		private $date_publication;      ///< Дата публикации
		
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
      \brief Задаёт идентификатор новости
      \param[in] $id - Идентификатор новости
      \note Идентификатор из базы данных
    */
		
		public function setNewsID(int $id)
		{
			$this->id = $id;
		}
		
    /*!
      \brief Возвращает идентификатор новости
      \return Идентификатор новости
    */
    
		public function getNewsID() : int
		{
			return $this->id;
		}
		
    /*!
      \brief Возвращает заголовок
      \return Заголовок новости
    */
    
		public function getCaption() : string
		{
			return $this->caption;
		}
		
    /*!
      \brief Возвращает содержимое новости
      \return Возвращает HTML содержимое новости
      \note Для декодирования и отображения HTML на сайте используется функция html_entity_decode()
    */
    
		public function getContent()
		{
			return html_entity_decode($this->content, ENT_HTML5);
		}
		
    /*!
      \brief Возвращает автора новости
      \return Автора новости
      \note Формат отображения "Фамилия И.О."
    */
    
		public function getAuthor() : string
		{
			return $this->author;
		}
    
    /*!
      \brief Возвращает дату публикации
      \return Дату публикации
      \note Формат даты "d.m.Y H:i:s"
    */
		
		public function getDatePublication() : string
		{
			return $this->date_publication;
		}
		
    /*!
      \brief Задаёт заголовок
      \param[in] $caption - Заголовок новости
    */
    
		public function setCaption($caption)
		{
			$this->caption = $caption;
		}
    
    /*!
      \brief Задаёт содержимое новости
      \param[in] $content - Содержание новости
    */
		
		public function setContent($content)
		{
			$this->content = $content;
		}
    
    /*!
      \brief Задаёт автора новости
      \param[in] $author - Автор новости
      \note Формат отображения "Фамилия И.О."
    */
		
		public function setAuthor($author)
		{
			$this->author = $author;
		}
    
    /*!
      \brief Задаёт дату публикации
      \param[in] $date_publication - Дата публикации
      \note Формат даты "d.m.Y H:i:s"
    */
		
		public function setDatePublication($date_publication)
		{
			$this->date_publication = $date_publication;
		}
		
	}
	
?>
