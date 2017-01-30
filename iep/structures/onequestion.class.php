<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
	
	class OneQuestion
	{
		private $question;
		private $answers;
		private $r_answer;
		
		function __construct(string $question, array $answers, string $r_answer)
		{
			$this->question = $question;
			$this->answers = $answers;
			$this->r_answer = $r_answer;
		}
		
		public function getQuestion() : string
		{
			return $this->question;
		}
		
		public function getAnswers() : string
		{
			return $this->answers;
		}
		
		public function getRAnswer() : string
		{
			return $this->r_answer;
		}
		
	}
	
?>