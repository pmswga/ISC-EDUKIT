<?php
	require_once "core/core.php";
	class NewsEngine extends Core
	{
		function __construct()
		{
			parent::__construct();
		}
		
	    private function SetToArray($data)/*Преобразование данных из БД в двумерный массив*/
	    {
	        $mas = array();
			while(($value = $data->fetch_assoc()) != false) $mas[] = $value; 
			return $mas;
	    }

		public function GetAllEntries($table_name)
	    {
			if($table_name != "")
			{
				$this->ConnectDB(true);
				$data = $this->mysqli->query("SELECT * FROM ".$table_name);
				$this->ConnectDB(false);
	
				return $this->SetToArray($data);
			}
	    }

	    public function CreateNews($text, $date)
	    {
			if($text != "" and $date != "")
			{
				$this->ConnectDB(true);
				$success = $this->mysqli->query("INSERT INTO `news` (`text`, `date`) VALUES ('$text', '$date')");
				$this->ConnectDB(false);
				
				return $success;
			}
	    }

	    public function DeleteAllNews($all = false, $id = NULL)
	    {
			if($all == true)
			{
				$this->ConnectDB(true);
				$this->mysqli->query("DELETE FROM `news` WHERE `id`");
				$this->ConnectDB(false);
			}
			else
			{
				$this->ConnectDB(true);
				$this->mysqli->query("DELETE FROM `news` WHERE `id`='$id'");
				$this->ConnectDB(false);
			}
	    }
	}

	$NewsEngine = new NewsEngine();
?>