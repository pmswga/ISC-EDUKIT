<?php
  declare(strict_types = 1);
	namespace IEP\Structures;

	class Subject
	{
    
    private $id;
		private $description;
		
		function __construct(string $description)
		{
			$this->id = 0;
			$this->description = $description;
		}
    
    public function setSubjectID(int $id)
    {
      $this->id = $id;
    }
		
    public function getSubjectID() : int
    {
      return $this->id;
    }
    
		public function getDescription() : string
		{
			return $this->description;
		}
		
	}
	
?>