<?php
	declare(strict_types = 1);
	namespace IEP\Structures;
    
	require_once "user.class.php";
	require_once "group.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/consts/typeusers.consts.php";

	use IEP\Structures\Group;
	
  /*!
    
    \class Student student.class.php "iep/structures/student.class.php"
    \extends User
    \brief Класс описывающий сущность Студент
    \author pmswga
    \version 1.0
    
  */
  
	class Student extends User
	{
		private $home_address;
		private $cell_phone;
		private $group;
    
    /*!
      \param[in] $user         - Объект класса User
      \param[in] $home_address - Домашний адрес
      \param[in] $cell_phone   - Сотовый телефон
      \param[in] $group        - Группа
      \note Объект класса Group
    */
		
		function __construct(User $user, string $home_address, string $cell_phone, $group)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->home_address = $home_address;
			$this->cell_phone = $cell_phone;
			$this->group = $group;
		}
    
    /*!
      \return Домашний адрес
    */
    
		public function getHomeAddress() : string
		{
			return $this->home_address;
		}
    
    /*!
      \return Сотовый телефон
    */
		
		public function getCellPhone() : string
		{
			return $this->cell_phone;
		}
    
    /*!
      \return Группу
      \note Объект класса Group
    */
		
		public function getGroup()
		{
			return $this->group;
		}
    
	}
	
?>
