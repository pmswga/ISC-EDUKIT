<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
  
	class Test
	{
		
		private $id;
		private $caption;
		private $subject;
		private $author;
		private $questions;
		private $for_groups;
		
		function __construct(string $caption, $subject, $author, array $for_groups = array())
		{
      $this->id = 0;
			$this->caption = $caption;
      $this->subject = $subject;
			$this->author = $author;
			$this->questions = array();
      $this->for_groups = $for_groups;
		}
		
		public function setTestID(int $id)
		{
			$this->id = $id;
		}
		
		public function getTestID() : int
		{
			return $this->id;
		}
		
		public function setSubject($subject)
		{
			$this->subject = $subject;
		}
		
		public function getSubject()
		{
			return $this->subject;
		}
		
		public function getCaption() : string
		{
			return $this->caption;
		}
    
		public function setAuthor($author)
		{
			$this->author_name = $author_name;
		}
		
    public function getAuthor()
    {
      return $this->author;
    }
    
    public function setGroups(array $groups)
    {
      $this->for_groups = $groups;
    }
    
		public function getGroups() : array
		{
				return $this->for_groups;
		}
    
    public function setQuestions(array $questions)
    {
      $this->questions = $questions;
    }
    
    public function getQuestions() : array
    {
      return$this->questions;
    }
		
	}
	
?>