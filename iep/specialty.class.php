<?php
	
	class Specialty
	{
		private $code;
		private $description;
		private $file;
		
		function Specialty($code, $description, $file = "")
		{
			$this->code = $code;
			$this->description = $description;
			$this->file = $file;
		}
		
		public function getCode()
		{
			return $this->code;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		public function getFile()
		{
			return $this->file;
		}
		
	}
	
?>