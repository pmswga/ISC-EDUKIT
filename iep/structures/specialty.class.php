<?php
	declare(strict_types = 1);
	namespace IEP\Structures;
    
	class Specialty
	{
		private $id;
		private $code;
		private $description;
		private $file;
		
		function __construct(string $code, string $description, string $file = "")
		{
			$this->code = $code;
			$this->description = $description;
			$this->file = $file;
			$this->id = 0;
		}
		
		public function setID(int $id)
		{
			$this->id = $id;
		}
		
		public function getID() : int
		{
			return $this->id;
		}
		
		public function getCode() : string
		{
			return $this->code;
		}
		
		public function getDescription() : string
		{
			return $this->description;
		}
		
		public function getFile() : string
		{
			return str_replace("/", "\\", $this->file);
		}
    
    public function getFilename() : string
    {
      return basename($this->file);
    }
		
    public function setFile(string $filename)
    {
      $this->file = $filename;
    }
    
	}
	
?>