<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
	
	require_once "subject.class.php";
	
	use IEP\Structures\Subject;
	
	class Test
	{
		
		private $test_id;
		
		private $caption;
		
		private $questions;
		
		private $author;
		private $author_name;
		
		private $for_groups;
		
		function __construct(string $caption, string $author, array $for_groups = array(), array $questions = array())
		{
			$this->caption = $caption;
			$this->author = $author;
      $this->for_groups = $for_groups;
			$this->questions = $questions;
			
			$this->subject = new Subject("none");
		}
		
		public function setTestID(int $test_id)
		{
			$this->test_id = $test_id;
		}
		
		public function getTestID() : int
		{
			return $this->test_id;
		}
		
		public function setSubject(Subject $subject)
		{
			$this->subject = $subject;
		}
		
		public function getSubject() : Subject
		{
			return $this->subject;
		}
		
		public function getCaption() : string
		{
			return $this->caption;
		}
		
		public function getQuestions() : array
		{
			return $this->questions;
		}
		
		public function getCountQuestions() : int
		{
			return count($this->questions);
		}
		
		public function getAuthorEmail() : string
		{
			return $this->author;
		}
		
		public function setAuthorName(string $author_name)
		{
			$this->author_name = $author_name;
		}
		
		public function getAuthorName() : string
		{
			return $this->author_name;
		}
		
		public function getGroups() : array
		{
				return $this->for_groups;
		}
		
		public function addQuestion(array $questions)
		{
			foreach ($questions as $q) {
				$this->questions[] = $q;
			}
		}
        
	}
	
?>