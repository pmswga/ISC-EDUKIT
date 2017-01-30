<?php
	require_once "user.class.php";

	class Teacher extends User
	{
		private $info;
		private $subjects;
		private $tests;
		
		function Teacher($user, $info)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->info = $info;
			$this->subjects = $subjects;
		}
	
		public function setSubjects($subjects)
		{
			$this->subjects = $subjects;
		}
		
		public function setTests($tests)
		{
			$this->tests = $tests;
		}
	
		public function getInfo()
		{
			return $this->info;
		}
		
		public function getSubjects()
		{
			return $this->subjects;
		}
		
		public function getTests()
		{
			return $this->tests();
		}
	}
?>