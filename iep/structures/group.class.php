<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
    
	class Group
	{
    private $id;
		private $grp;
		private $code_spec;
		private $is_budget;
		private $count_students;
    
		function __construct(string $number, string $code_spec, int $is_budget)
		{
      $this->id = 0;
			$this->grp = $number;
			$this->code_spec = $code_spec;
			$this->is_budget = $is_budget;
		}
    
    public function setID(int $id)
    {
      $this->id = $id;
    }
    
    public function getID() : int
    {
      return $this->id;
    }
        
		public function getNumberGroup() : string
		{
			return $this->grp;
		}
		
		public function getCodeSpec() : string
		{
			return $this->code_spec;
		}
		
		public function getStatus() : int
		{
			return $this->is_budget;
		}
    
    public function setCountStudents(int $count_of_students)
    {
      $this->count_students = $count_of_students;
    }
    
    public function getCountStudents() : int
    {
      return $this->count_students;
    }
		
	}
    
?>
