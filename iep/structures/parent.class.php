<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
    
	require_once "user.class.php";
	
	class Parent_ extends User
	{
		private $age;
		private $education;
		private $work_place;
		private $post;
		private $home_phone;
		private $cell_phone;
		
		function __construct($user, $age, $education, $work_place, $post, $home_phone, $cell_phone)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->age = $age;
			$this->education = $education;
			$this->work_place = $work_place;
			$this->post = $post;
			$this->home_phone = $home_phone;
			$this->cell_phone = $cell_phone;
		}
		
		public function getAge()
		{
			return $this->age;
		}
		
		public function getEducation()
		{
			return $this->education;
		}
		
		public function getWorkPlace()
		{
			return $this->work_place;
		}
		
		public function getPost()
		{
			return $this->post;
		}
		
		public function getHomePhone()
		{
			return $this->home_phone;
		}
		
		public function getCellPhone()
		{
			return $this->cell_phone;
		}
	}
?>