<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
  
	require_once "user.class.php";

	class Teacher extends User
	{
		private $info;
    private $news;
		private $subjects;
		private $tests;
		
		function __construct(User $user, string $info)
		{
			parent::__construct($user->sn, $user->fn, $user->pt, $user->email, $user->password, $user->typeUser);
			$this->info = $info;
			$this->subjects = array();
      $this->tests = array();
		}
	
    public function setNews(array $news)
    {
      $this->news = $news;
    }
  
		public function setSubjects(array $subjects)
		{
			$this->subjects = $subjects;
		}
		
		public function setTests(array $tests)
		{
			$this->tests = $tests;
		}
	
		public function getInfo() : string
		{
			return $this->info;
		}
    
    public function getNews()
    {
      return $this->news;
    }
		
		public function getSubjects() : array
		{
			return $this->subjects;
		}
    
    public function getStrSubjects() : string
    {
      return implode(", ", $this->subjects);
    }
		
		public function getTests() : array
		{
			return $this->tests();
		}
	}
?>