<?php

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