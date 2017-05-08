<?php
	declare(strict_types = 1);
	namespace IEP\Structures;
    
	require_once "user.class.php";
	require_once "group.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/consts/typeusers.consts.php";

	use IEP\Structures\Group;
	
	class Student extends User
	{
		private $home_address;
		private $cell_phone;
		private $group;
		
		function __construct(User $user, string $home_address, string $cell_phone, $group)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->home_address = $home_address;
			$this->cell_phone = $cell_phone;
			$this->group = $group;
		}
    
		public function getHomeAddress() : string
		{
			return $this->home_address;
		}
		
		public function getCellPhone() : string
		{
			return $this->cell_phone;
		}
		
		public function getGroup()
		{
			return $this->group;
		}
    
	}
	
?>