<?php
	
	class OneQuestion
	{
		private $question;
		private $answers;
		private $r_answer;
		
		function OneQuestion($question, $answers, $r_answer)
		{
			$this->question = $question;
			$this->answers = $answers;
			$this->r_answer = $r_answer;
		}
		
		public function getQuestion()
		{
			return $this->question;
		}
		
		public function getAnswers()
		{
			return $this->answers;
		}
		
		public function getRAnswer()
		{
			return $this->r_answer;
		}
		
	}
	
?>