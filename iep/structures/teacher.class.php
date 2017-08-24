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
		private $info;
    private $news;
		private $subjects;
		private $tests;
		
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
      \param[in] $news - Опубликованные новости
      \note Массив с объектами класса News
    */
	
    public function setNews(array $news)
    {
      $this->news = $news;
    }
    
    /*!
      \param[in] $subjects - Предметы, которые ведёт преподавтель
      \note Массив с объектами класса Subject
    */
  
		public function setSubjects(array $subjects)
		{
			$this->subjects = $subjects;
		}
		
    /*!
      \param[in] $tests - Тесты, которые создал преподавтель
      \note Массив с объектами класса Test
    */
    
		public function setTests(array $tests)
		{
			$this->tests = $tests;
		}
    
    /*!
      \return Информацию об преподавтеле
      \note Информация может быть описана в HTML
    */
	
		public function getInfo() : string
		{
			return $this->info;
		}
    
    /*!
      \return Опубликованные новости
      \note Массив с объектами класса News
    */
    
    public function getNews()
    {
      return $this->news;
    }
		
    /*!
      \return Предметы, которые ведёт преподавтель
      \note Массив с объектами класса Subject
    */
    
		public function getSubjects() : array
		{
			return $this->subjects;
		}
    
    /*!
      \return Список предметов разделённых запятой
      \warning Тестовый метод
    */
    
    public function getStrSubjects() : string
    {
      return implode(", ", $this->subjects);
    }
		
    /*!
      \return Созданные тесты
      \note Массив с объектами класса Test
    */
    
		public function getTests() : array
		{
			return $this->tests;
		}
	}
?>