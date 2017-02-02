<?php
    declare(strict_types = 1);
	namespace IEP\Structures;

	class Subject
	{
		private $description;
		
		function __construct(string $description)
		{
			$this->description = $description;
		}
		
		public function getDescription() : string
		{
			return $this->description;
		}
		
	}
	
	
?>