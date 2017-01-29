<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
    
	class Group
	{
		private $grp;
		private $code_spec;
		private $is_budget;
		
		function __construct(int $number, string $code_spec, bool $is_budget)
		{
			$this->grp = $number;
			$this->code_spec = $code_spec;
			$this->is_budget = $is_budget;
		}
        
		public function getNumberGroup() : int
		{
			return $this->grp;
		}
		
		public function getCodeSpec() : string
		{
			return $this->code_spec;
		}
		
		public function getStatus() : bool
		{
			return $this->is_budget;
		}
		
	}
    
?>
