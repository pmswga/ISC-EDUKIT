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
    private $group_id;
		
		function __construct(User $user, string $home_address, string $cell_phone)
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
		
    public function setGroup(string $grp)
    {
      $this->group = $grp;
    }
    
		public function getGroup() : int
		{
			return $this->group;
		}
    
    public function setGroupID(int $group_id)
    {
      $this->group_id = $group_id;
    }
    
    public function getGroupID() : int
    {
      return $this->group_id;
    }
    
	}
	
?>