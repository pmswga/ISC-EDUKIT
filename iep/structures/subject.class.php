<?php
    declare(strict_types = 1);
	namespace IEP\Structures;

	class Subject
	{
		private $description;
		
		function Subject($description)
		{
			$this->description = $description;
		}
		
		public function getSubject()
		{
			return $this->description;
		}
		
	}
	
	
?>