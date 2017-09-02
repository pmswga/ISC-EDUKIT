<?php

	class INI
	{
		private $filename;
		private $data;
		
		public function __construct($filename)
		{
			$this->filename = $filename;
			if (file_exists($this->filename)) {
			    $this->data = parse_ini_file($this->filename, true);
			} else {
			    $this->data = array();
			}
		}
		
		public function getValue($section, $key)
		{
			return $this->data[$section][$key];
		}
		
		public function getValues($section)
		{
			return $this->data[$section];
		}
		
		public function addValue($section, $key, $value)
		{
			$this->data[$section][$key] = $value;
		}
		
		public function toFile()
		{
			if (!empty($this->data)) {
			    
			    $ini_content = "";
			
			    foreach ($this->data as $section => $values) {
			        $ini_content .= "[".$section."]\n";
			        foreach ($values as $key => $value) {
			            $ini_content .= $key." = ".$value;
			        }
			        $ini_content .= "\n";
			    }
			    
			    $result = file_put_contents($this->filename, $ini_content);
			    if ($result !== false) {
			        return true;
			    } else {
			        return false;
			    }
			    
			}
		}
		
		public function getFilename()
		{
			return $this->filename;
		}
		
		public function getData()
		{
			return $this->data;
		}
		
		public function addSection($section)
		{
			$this->data[$section] = array();
		}
	
	}

?>
