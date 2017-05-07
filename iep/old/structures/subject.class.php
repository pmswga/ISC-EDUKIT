<?php
  declare(strict_types = 1);
	namespace IEP\Structures;

	class Subject
	{
    private $id;
		private $description;
		
		function __construct(string $description, int $subject_id = 0)
		{
			$this->description = $description;
			$this->id = $subject_id;
		}
    
    public function setID(int $id)
    {
      $this->id = $id;
    }
		
    public function getID() : int
    {
      return $this->id;
    }
    
		public function getDescription() : string
		{
			return $this->description;
		}
		
	}
	
	
?>