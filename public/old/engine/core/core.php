<?php
	/*
		Основной класс. Ядро движка.
	*/
    class Core 
    {
    	protected $mysqli;
    	protected $host;
    	protected $user;
    	protected $user_password;
    	protected $data_base;
        protected $charset;

    	function __construct()
    	{
    		$this->mysqli = false;
    		$this->host = "localhost";
    		$this->user = "root";//
    		$this->user_password = "";//
    		$this->data_base = "ukit104";//
            $this->charset = "`utf8`";
    	}

    	public function ConnectDB($isConnect = true)/*Подключение/Отключение к/от базе/ы данных*/
    	{
    		if($isConnect)
    		{
		        $this->mysqli = new mysqli($this->adress , $this->user, $this->user_password, $this->data_base);
		        $this->mysqli->query("SET NAMES ".$this->charset);
    		}
    		else $this->mysqli->close();
    	}

	    public function SetValues($newHost, $newUser, $newPassword, $newDB, $newCharset)/*Задание значений*/
	    {
            if($newHost != "" and $newUser != "" and $newDB != "" and $newCharset != "")
            {
                $this->host = $newHost;
                $this->user = $newUser;
                $this->user_password = $newPassword;
                $this->data_base = $newDB;
                $this->charset = $newCharset;
                $this->ConnectDB(true);
                $this->ConnectDB(false);
                return true;
            }
            return false;
	    }
		
	    public function ViewInfo()/*Информация о текущем подключении*/
	    {
	    	echo "<h2>"."Состояние о подключении:"."</h2>";
	    	echo "Адрес: "."<b>".$this->host."</b>"."<br>";
	    	echo "Пользователь: "."<b>".$this->user."</b>"."<br>";
	    	echo "Пароль: "."<b>".$this->user_password."</b>"."<br>";
	    	echo "База данных: "."<b>".$this->data_base."</b>"."<br>";
	    	echo "Подключенная таблица: "."<b>".$this->table."</b>"."<br>";
	    }
		
        public function ReturnValues()/*Возврат всех значений*/
        {
            $arguments = Array("host" => $this->host, "user" => $this->user, "password" => $this->$user_password, "db" => $this->data_base);
            return $arguments;
        }
    }

    $Core = new Core();
?>