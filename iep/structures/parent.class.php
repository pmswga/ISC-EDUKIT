<?php
	declare(strict_types = 1);
	namespace IEP\Structures;

	require_once "user.class.php";
	
  /*!
    
    \class Parent_ parent.class.php "iep/structures/parent.class.php"
    \extends User
    \brief Класс для хранения данных об родителе
    \author pmswga
    \version 1.0
    
    \details 
      Данный класс содержит в себе информацию об родителе
    
  */
  
	class Parent_ extends User
	{
		private $age;           ///< Возраст
		private $education;     ///< Образование
		private $work_place;    ///< Место работы
		private $post;          ///< Должность
		private $home_phone;    ///< Домашний телефон
		private $cell_phone;    ///< Сотовый телефон
    private $childs;        ///< Дети
		
    /*!
      \param[in] - $user       - Объект типа класса User
      \note Необходим для хранения основной информации
      
      \param[in] - $age        - Возраст
      \param[in] - $education  - Образование
      \param[in] - $work_place - Место работы
      \param[in] - $post       - Должность
      \param[in] - $home_phone - Домашний телефон
      \param[in] - $cell_phone - Сотовый телефон
    */
    
		function __construct(
        User $user,
				int $age,
				string $education,
				string $work_place,
				string $post, 
				string $home_phone,
				string $cell_phone
		) {
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->age = $age;
			$this->education = $education;
			$this->work_place = $work_place;
			$this->post = $post;
			$this->home_phone = $home_phone;
			$this->cell_phone = $cell_phone;
      $this->childs = array();
		}
    
    /*!
      \brief Возвращает возраст
      \return Возраст
    */
		
		public function getAge() : int
		{
			return $this->age;
		}
    
    /*!
      \brief Возвращает образование родителя
      \return Образование
      \note К примеру, высшее или среднее
    */
		
		public function getEducation() : string
		{
			return $this->education;
		}
    
    /*!
      \brief Возвращает место работы
      \return Место работы
    */
		
		public function getWorkPlace() : string
		{
			return $this->work_place;
		}
    
    /*!
      \brief Возвращает должность
      \return Должность
    */
		
		public function getPost() : string
		{
			return $this->post;
		}
    
    /*!
      \brief Возвращает домашний телефон
      \return Домашний телефон
    */
		
		public function getHomePhone() : string
		{
			return $this->home_phone;
		}
    
    /*!
      \brief Возвращает сотовый телефон
      \return Сотовый телефон
    */
		
		public function getCellPhone() : string
		{
			return $this->cell_phone;
		}
    
    /*!
      \brief Возвращает детей
      \return Массив с объектами класса Student
    */
    
		public function getChilds() : array
		{
			return !empty($this->childs) ? $this->childs : array();
		}
		
    /*!
      \brief Задаёт детей
      \param[in] $childs - дети
      \note Массив с объектами класса Student
    */
    
		public function setChilds(array $childs)
		{
			$this->childs = $childs;
		}
		
	}
?>