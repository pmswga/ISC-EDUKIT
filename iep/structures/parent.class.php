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
        private $childs;
		
		function __construct(User $user, 
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
		}
		
		public function getAge() : int
		{
			return $this->age;
		}
		
		public function getEducation() : string
		{
			return $this->education;
		}
		
		public function getWorkPlace() : string
		{
			return $this->work_place;
		}
		
		public function getPost() : string
		{
			return $this->post;
		}
		
		public function getHomePhone() : string
		{
			return $this->home_phone;
		}
		
		public function getCellPhone() : string
		{
			return $this->cell_phone;
		}
        
        public function getChilds() : array
        {
            return $this->childs;
        }
        
        public function setChilds(array $childs)
        {
            $this->childs = $childs;
        }
        
	}
?>