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
		
		public function query(string $sql, array $params = array())
		{
			if (!empty($params)) {
				$query = $this->dbc()->prepare($sql);
				$result = $query->execute($params);
        return ($result) ? $query->fetchAll(\PDO::FETCH_ASSOC) : false;
			}
			else {
        return $this->dbc()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
      }
		}
		
    public function getLogs() : array
    {
      $logs = $this->DBC->query("call readLogs('all')")->fetchAll(\PDO::FETCH_ASSOC);
      
      return $logs;
    }
    
    public function removeLogs(int $log_id) : bool
    {
      $remove_log_query = $this->dbc()->prepare("call removeLog(:log)");
      
      $remove_log_query->bindValue(":log", $log_id);
      
      return $remove_log_query->execute();
    }
    
		abstract public function add($data);
		abstract public function remove($what);
		
	}
	
?>
