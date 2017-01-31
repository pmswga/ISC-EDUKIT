<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
	
	class Test
	{
		private $caption;
		private $subject;
		private $questions;
		private $author;
        private $for_groups;
		
		function __construct(string $caption, string $subject, string $author, string $for_groups, array $questions = array())
		{
			$this->caption = $caption;
			$this->subject = $subject;
			$this->author = $author;
            $this->for_groups = $for_groups;
			$this->questions = $questions;
		}
		
		public function getCaption() : string
		{
			return $this->caption;
		}
		
		public function getSubject() : string
		{
			return $this->subject;
		}
		
		public function getQuestions() : array
		{
			return $this->questions;
		}
		
		public function getAuthor() : string
		{
			return $this->author;
		}
		
        public function getGroups() : string
        {
            return $this->for_groups;
        }
        
	}
	
?>