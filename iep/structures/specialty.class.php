<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
    
	class Specialty
	{
		private $code;
		private $description;
		private $file;
		
		function Specialty(string $code, string $description, string $file = "")
		{
			$this->code = $code;
			$this->description = $description;
			$this->file = $file;
		}
		
		public function getCode() : string
		{
			return $this->code;
		}
		
		public function getDescription() : string
		{
			return $this->description;
		}
		
		public function getFile() : string
		{
			return $this->file;
		}
		
	}
	
?>