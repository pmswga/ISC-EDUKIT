<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
  
  require_once "specialty.class.php";
  
  use IEP\Structures\Specialty;
  
	class Group
	{
    private $id;
		private $number;
		private $spec;
		private $is_budget;
    
		function __construct(string $number, Specialty $spec, int $is_budget = 1)
		{
      $this->id = 0;
			$this->number = $number;
			$this->spec = $spec;
			$this->is_budget = $is_budget;
		}
    
    public function setGroupID(int $id)
    {
      $this->id = $id;
    }
    
    public function getGroupID() : int
    {
      return $this->id;
    }
        
		public function getNumberGroup() : string
		{
			return $this->number;
		}
		
		public function getSpec() : Specialty
		{
			return $this->Specialty;
		}
		
		public function getStatus() : int
		{
			return $this->is_budget;
		}
		
	}
  
?>
