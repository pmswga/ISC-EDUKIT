<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
    
	require_once "user.class.php";

	class Student extends User
	{
		private $date_birthday;
		private $home_address;
		private $cell_phone;
		private $group;
		
		function Student($user, $group, $date_birthday, $home_address, $cell_phone)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->group = $group;
			$this->date_birthday = $date_birthday;
			$this->home_address = $home_address;
			$this->cell_phone = $cell_phone;
		}

		public function getDateBirthday()
		{
			return $this->date_birthday;
		}
		
		public function getHomeAddress()
		{
			return $this->home_address;
		}
		
		public function getCellPhone()
		{
			return $this->cell_phone;
		}
		
		public function getGroup()
		{
			return $this->group;
		}
	}
	
?>