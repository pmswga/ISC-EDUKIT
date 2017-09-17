<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
  
	require_once "user.class.php";

  /*!
    
    \class Teacher teacher.class.php "iep/structures/teacher.class.php"
    \extends User
    \brief Класс описывает сущность пользователя Преподаватель
    \author pmswga
    \version 1.0
    
  */
  
	class Teacher extends User
	{
		private $info;       ///< Информация о преподавтеле
    private $news;       ///< Новости, опубликованные преподавтелем
		private $subjects;   ///< Предметы, которые ведёт преподавтель
		private $tests;      ///< Тесты, которые создал преподавтель
		
    /*!
      \param[in] $user - Объект класса User
      \param[in] $info - Информация об преподавтеле
      \note Может быть описана в формате HTML
    */
    
		function __construct(User $user, string $info)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->info = $info;
			$this->subjects = array();
      $this->tests = array();
		}
    
    /*!
      \brief Задаёт новости, которые были опубликованны преподавтелем
      \param[in] $news - Опубликованные новости
      \note Массив с объектами класса News
    */
	
    public function setNews(array $news)
    {
      $this->news = $news;
    }
    
    /*!
      \brief Задаёт предметы, которые ведёт преподавтель
      \param[in] $subjects - Предметы, которые ведёт преподавтель
      \note Массив с объектами класса Subject
    */
  
		public function setSubjects(array $subjects)
		{
			$this->subjects = $subjects;
		}
		
    /*!
      \brief Задаёт тесты, которые создал преподавтель
      \param[in] $tests - Тесты, которые создал преподавтель
      \note Массив с объектами класса Test
    */
    
		public function setTests(array $tests)
		{
			$this->tests = $tests;
		}
    
    /*!
      \brief Возвращает информацию о преподавтеле
      \return Информацию об преподавтеле
      \note Информация может быть описана в HTML
    */
	
		public function getInfo() : string
		{
			return $this->info;
		}
    
    /*!
      \brief Возвращает новости
      \return Опубликованные новости
      \note Массив с объектами класса News
    */
    
    public function getNews()
    {
      return $this->news;
    }
		
    /*!
      \brief Возвращает предметы
      \return Предметы, которые ведёт преподавтель
      \note Массив с объектами класса Subject
    */
    
		public function getSubjects() : array
		{
			return $this->subjects;
		}
    
    /*!
      \brief Возвращает список предметов, разделённых запятой
      \return Список предметов разделённых запятой
      \warning Тестовый метод
    */
    
    public function getStrSubjects() : string
    {
      return implode(", ", $this->subjects);
    }
		
    /*!
      \brief Возвращает тесты
      \return Созданные тесты
      \note Массив с объектами класса Test
    */
    
		public function getTests() : array
		{
			return $this->tests;
		}
	}
?>