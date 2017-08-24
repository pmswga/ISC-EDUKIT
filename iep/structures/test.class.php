<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
  
  /*!
    
    \class Test test.class.php "iep/structures/test.class.php"
    \brief Класс описывает сущность - тест
    \author pmswga
    \version 1.0
    
  */
  
	class Test
	{
		
		private $id;          ///< Идентификатор теста
		private $caption;     ///< Заголовок теста
    
    /*!
      \var $subject
      \note Объект класса Subject
    */
    
		private $subject;     
		private $author;      ///< Электронная почта преподавателя
    
    /*!
      \var $questions
      \brief Вопросы
      \note Массив с объектами класса TestQuestion
    */
    
		private $questions;
    
    /*!
      \var $for_groups
      \brief Группы, которые могут проходить тест
      \note Массив с объектами класса Group
    */
    
		private $for_groups;
		
    /*!
      \param[in] $caption    - Заголовок теста
      \param[in] $subject    - Предмет
      \param[in] $author     - Электронная почта преподавателя
      \param[in] $for_groups - Группы, которые могут проходить тест
      \note Массив с объектами класса Group
    */
    
		function __construct(string $caption, $subject, $author, array $for_groups = array())
		{
      $this->id = 0;
			$this->caption = $caption;
      $this->subject = $subject;
			$this->author = $author;
			$this->questions = array();
      $this->for_groups = $for_groups;
		}
		
    /*!
      \brief Задаёт идентификатор теста
      \param[in] $id - Идентификатор теста
    */
    
		public function setTestID(int $id)
		{
			$this->id = $id;
		}
    
    /*!
      \brief Возвращает идентификатор теста
      \return Идентификатор теста
    */
		
		public function getTestID() : int
		{
			return $this->id;
		}
    
    /*!
      \brief Задаёт предмет
      \return Предмет
      \note Объект класса Subject
    */
		
		public function setSubject($subject)
		{
			$this->subject = $subject;
		}
    
    /*!
      \brief Возвращает предмет
      \return Предмет
      \note Объект класса Subject
    */
		
		public function getSubject()
		{
			return $this->subject;
		}
		
    /*!
      \brief Возвращает заголовок теста
      \return Заголовок теста
    */
    
		public function getCaption() : string
		{
			return $this->caption;
		}
    
    /*!
      \brief Задаёт автора теста
      \param[in] $author - Электронная почта преподавателя
    */
    
		public function setAuthor($author)
		{
			$this->author_name = $author_name;
		}
    
    /*!
      \brief Возвращает почту преподавателя
      \return Электронная почта преподавателя
    */
		
    public function getAuthor()
    {
      return $this->author;
    }
    
    /*!
      \brief Задаёт группы, которые могут проходить тест
      \param[in] $groups - Группы
      \note Массив с объектами класса Subject
    */
    
    public function setGroups(array $groups)
    {
      $this->for_groups = $groups;
    }
    
    /*!
      \brief Возвращает группы, которые могут проходить тест
      \return Группы
      \note Массив с объектами класса Subject
    */
    
		public function getGroups() : array
		{
      return $this->for_groups;
		}
    
    /*!
      \brief Задаёт вопросы
      \param[in] $questions - Вопросы
      \note Массив с объектами класса TestQuestion
    */
    
    public function setQuestions(array $questions)
    {
      $this->questions = $questions;
    }
    
    /*!
      \brief Возвращает вопросы теста
      \return Вопросы
      \note Массив с объектами класса TestQuestion
    */
    
    public function getQuestions() : array
    {
      return$this->questions;
    }
		
	}
	
?>
