<?php
	declare(strict_types = 1);
	namespace IEP\Managers;
  
	abstract class IEP
	{
		private $DBC;
		protected $log_file_name;
		protected $log_file_path;
		
		function __construct(\PDO $dbc)
		{
			$this->DBC = $dbc;
		}
    
		protected function writeLog($msg)
		{
			$header = "\r\n--[Date: ".date("d.m.Y")." Time: ".date("G:i:s")."]--\r\n";
			$header .= "Class: ".basename(__CLASS__)."    Line: ".__LINE__."\r\n";
			$content = $msg;
			$footer = "\r\n".str_repeat("-", strlen($msg));
			
			file_put_contents($this->log_file_path, $header.$content.$footer, FILE_APPEND);
		}
		
		public function setDBC($dbc)
		{
			$this->DBC = $dbc;
		}
		
		public function dbc()
		{
			return $this->DBC;
		}
		
		public function get(string $what, array $params = array())
		{
			if(!empty($params))
			{
				$get_query = $this->dbc()->prepare($what);
				$result = $get_query->execute($params);
        
        if ($result) {          
          return $get_query->fetchAll(\PDO::FETCH_ASSOC);
        } else {
          $this->writeLog($get_query->errorInfo()[3]);
          return false;
        }
			}
			else return $this->dbc()->query($what)->fetchAll(\PDO::FETCH_ASSOC);
		}
		
		abstract public function add($data);
		abstract public function remove($what);
		abstract public function change($old, $new);
		
	}
	
?>
