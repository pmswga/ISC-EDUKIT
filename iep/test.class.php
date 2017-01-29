<?php
	
	class Test
	{
		private $caption;
		private $subject;
		private $questions;
		private $author;
		
		function Test($caption, $subject, $author, $questions)
		{
			$this->caption = $caption;
			$this->subject = $subject;
			$this->author = $author;
			$this->questions = $questions;
		}
		
		public function getCaption()
		{
			return $this->caption;
		}
		
		public function getSubject()
		{
			return $this->subject;
		}
		
		public function getQuestions()
		{
			return $this->questions;
		}
		
		public function getAuthor()
		{
			return $this->author;
		}
		
	}
	
?>