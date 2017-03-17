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
		
		function __construct(string $sn, string $fn, string $pt, string $email, string $password, int $typeUser)
		{
			$this->sn = $sn;
			$this->fn = $fn;
			$this->pt = $pt;
			$this->email = $email;
			$this->password = $password;
			$this->typeUser = $typeUser;
		}
    
		public function getSn() : string
		{
			return $this->sn;
		}
		
		public function getFn() : string
		{
			return $this->fn;
		}
		
		public function getPt() : string
		{
			return $this->pt;
		}
		
		public function getEmail() : string
		{
			return $this->email;
		}
		
		public function getPassword() : string
		{
			return $this->password;
		}
		
		public function getTypeUser() : int
		{
			return $this->typeUser;
		}
		
	}
	
	
?>