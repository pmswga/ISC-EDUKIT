<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
	
	class User
	{
		protected $sn;
		protected $fn;
		protected $pt;
		protected $email;
		protected $password;
		protected $typeUser;
		
		function __construct($sn, $fn, $pt, $email, $password, $typeUser)
		{
			$this->sn = $sn;
			$this->fn = $fn;
			$this->pt = $pt;
			$this->email = $email;
			$this->password = $password;
			$this->typeUser = $typeUser;
		}
		
		public function getSn()
		{
			return $this->sn;
		}
		
		public function getFn()
		{
			return $this->fn;
		}
		
		public function getPt()
		{
			return $this->pt;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		public function getTypeUser()
		{
			return $this->typeUser;
		}
		
	}
	
	
?>