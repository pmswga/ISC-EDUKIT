<?php
	require_once "core/core.php";
	class Users extends Core
	{
		function __construct()
		{
			parent::__construct();
		}

		public function CheckUser($login, $password)
		{
	    	$this->ConnectDB(true);
	    	$result_set = $this->mysqli->query("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'");
	    	$this->ConnectDB(false);

	    	if($result_set->fetch_assoc()) return true;
	    	else return false;
		}
        
        public function isAdmin($login)
        {
            $this->ConnectDB(true);
	    	$result_set = $this->mysqli->query("SELECT * FROM `users` WHERE `login`='$login'");
	    	$row = $result_set->fetch_assoc();
            $this->ConnectDB(false);
            return $row['admin'];
        }
	}

	$Users = new Users();
?>