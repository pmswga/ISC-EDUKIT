<?php
    declare(strict_types = 1);
	namespace IEP\Structures;
	
	class OneQuestion
	{
		private $id_question;
		private $question;
		private $answers;
		private $r_answer;
		
		function __construct(string $question, string $r_answer, array $answers = array())
		{
			$this->question = $question;
			$this->answers = $answers;
			$this->r_answer = $r_answer;
		}
		
		public function setID(int $id_question)
		{
			$this->id_question = $id_question;
		}
		
		public function getID() : int
		{
			return $this->id_question;
		}
		
		public function getQuestion() : string
		{
			return $this->question;
		}
		
		public function getAnswers() : array
		{
			return $this->answers;
		}
		
		public function getRAnswer() : string
		{
			return $this->r_answer;
		}
		
        public function addAnswer(array $answers)
        {
            foreach ($answers as $a) {
                $this->answers[] = $a;
            }
        }
        
	}
	
?>