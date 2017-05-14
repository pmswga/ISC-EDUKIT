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
    private $year_education;
		private $is_budget;
    
		function __construct(string $number, $spec, string $year_education, int $is_budget = 1)
		{
      $this->id = 0;
			$this->number = $number;
			$this->spec = $spec;
      $this->year_education = $year_education;
			$this->is_budget = $is_budget;
		}
    
    public function __call($method, $args)
    {
      if ($method == "getCode") {
        return $this->getSpec()->getCode();
      }
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
		
		public function getSpec()
		{
			return $this->spec;
		}
		
    public function getYearEducation() : string
    {
      return $this->year_education;
    }
    
		public function getStatus() : int
		{
			return $this->is_budget;
		}
		
	}
  
?>
