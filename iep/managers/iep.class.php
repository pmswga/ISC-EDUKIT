<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
    
	abstract class IEP
	{
		private $DBC;
        
        function __construct(\PDO $dbc)
        {
            $this->DBC = $dbc;
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
				$get_query->execute($params);
				return $get_query->fetchAll(\PDO::FETCH_ASSOC);
			}
			else return $this->dbc()->query($what)->fetchAll(\PDO::FETCH_ASSOC);
		}
        
		abstract public function add($data);
		abstract public function remove($what);
		abstract public function change($old, $new);
        
	}
	
?>
