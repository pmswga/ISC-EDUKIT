<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
    
	require_once "user.class.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/iep/typesUser.php";

	class Student extends User
	{
		private $home_address;
		private $cell_phone;
		private $group;
		
		function __construct(User $user, int $group, string $home_address, string $cell_phone)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->group = $group;
			$this->home_address = $home_address;
			$this->cell_phone = $cell_phone;
		}
    
		public function getHomeAddress() : string
		{
			return $this->home_address;
		}
		
		public function getCellPhone() : string
		{
			return $this->cell_phone;
		}
		
		public function getGroup() : int
		{
			return $this->group;
		}
	}
	
?>