<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
	
	class TestQuestion
	{
		private $id;
		private $question;
		private $answers;
		private $r_answer;
		
		function __construct(string $question, string $r_answer, array $answers = array())
		{
			$this->question = $question;
			$this->r_answer = $r_answer;
			$this->answers = $answers;
		}
		
		public function setQuestionID(int $id)
		{
			$this->id = $id;
		}
		
		public function getQuestionID() : int
		{
			return $this->id;
		}
		
		public function getQuestion() : string
		{
			return $this->question;
		}
    
    public function setAnswers(array $answers)
    {
      $this->answers = $answers;
    }
		
		public function getAnswers() : array
		{
      return $this->answers;
		}
		
		public function getRAnswer() : string
		{
			return $this->r_answer;
		}
    
	}
	
?>