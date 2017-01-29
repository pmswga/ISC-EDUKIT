<?php

    class CDataBase
    {
        private $mysqli;
        private $host;
        private $user;
        private $password;
        private $database;
        private $currentTable; 

        /*=[PRIVATE METHODS]=*/

        private function Connect()
        {
            $this->mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
            $this->mysqli->query("SET NAMES `utf8`");
        }

        private function Disconnect()
        {
            $this->mysqli->close();
        }

        private function SetToArray($data)
        {
			$mas = array();
			while(($value = $data->fetch_assoc()) != false) $mas[] = $value;
			$data->close();
			return $mas;
        }

        /*=[CONSTRUCTOR AND DESTRUCTOR]=*/

        function CDataBase($host, $user, $password, $database, $currentTable)
        {
            $this->host = $host;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
            $this->currentTable = $currentTable;
        }

        function __destructor()
        {
            $this->mysqli->close();
        }

        /*=[PUBLIC METHODS]=*/

        public function SetTable($table)
        {
            $this->currentTable = $table;
        }

        public function GetTable()
        {
            return $this->currentTable;
        }
	
		public function CreateDataBase($databaseName)
		{
			return $this->Query("CREATE DATABASE `".$databaseName."`", false);	
		}
		
        public function SetDataBase($databaseName)
        {
            $this->database = $databaseName;
        }
		
		public function DropDataBase($databaseName)
		{
			return $this->Query("DROP DATABASE `".$databaseName."`", false);
		}

        public function GetDataBase()
        {
            return $this->database;
        }
        
        public function Query($query, $inArray = true)
        {
            $this->Connect();
            $result = $this->mysqli->query($query);
            $this->Disconnect();
			
			//echo "<br>[".$query."]<br>";
			
            if($inArray) return $this->SetToArray($result);
            else return $result;
        }
		
		/*
        public function Select($fields, $where = "", $order = "", $up = true, $limit = "")
		{
			for($i = 0; $i < count($fields); $i++)
				if((strpos($fields[$i], "(") === false) and ($fields[$i] != "*")) $fields[$i] = "`".$fields[$i]."`";
			$fields = implode(", ", $fields);
			$table = "`".$this->currentTable."`";
			if(!$order) $order = "ORDER BY `id`";
			else
			{
				if($order != "RAND()")
				{
					$order = "ORDER BY `$order`";
					if(!$up) $order .= " DESC";
				}
				else $order = "ORDER BY $order";
			}
			if($limit) $limit = "LIMIT $limit";
			if($where) $query = "SELECT $fields FROM $table WHERE $where $order $limit";
			else $query = "SELECT $fields FROM $table $order $limit";
			return $this->Query($query);
		}

        public function Insert($values)
		{
			$query = "INSERT INTO `".$this->currentTable."` (";
			foreach($values as $field => $value) $query .= "`$field`,";
			$query = substr($query, 0, -1).") VALUES (";
			foreach($values as $field => $value) $query .= "'".addslashes($value)."',";
			$query = substr($query, 0, -1).")";
			return $this->Query($query, false);
		}
		
		public function Update($fields, $where)
		{
			$query = "UPDATE `".$this->currentTable."` SET ";
			foreach($fields as $field => $value) $query .= "`$field`='".addslashes($value)."',";
			$query = substr($query, 0, -1);
            if($where)
			{
				$query .= " WHERE $where";
				return $this->Query($query, false);
			}
			else return false;
		}
		
		public function Delete($where = "")
		{
			$table = "`".$this->currentTable."`";
			if($where)
			{
				$query = "DELETE FROM $table WHERE $where";
				return $this->Query($query, false);
			}
			else return false;
		}
		*/
		
		public function isExistsField($field, $value)
		{
			$data = $this->Select($this->table, array("id"), "`$field` = '".addslashes($value)."'");
			if(count($data) === 0) return false;
			return true;
		}

    }
?>