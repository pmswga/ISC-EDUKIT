<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  
  
  class StudentTest
  {
    private $student;  // Хранит email студента
    private $caption;
    private $subject;
    private $date_pass;
    private $mark;
    private $answers; //< В формате массива [[question, answer], [question, answer], ...]
    
    function __construct(string $student, string $caption, string $subject, string $date_pass, int $mark)
    {
      $this->student = $student;
      $this->caption = $caption;
      $this->subject = $subject;
      $this->date_pass = $date_pass;
      $this->mark = $mark;
      $this->answers = array();
    }
    
    public function getStudent() : string
    {
      return $this->student;
    }
    
    public function getCaption() : string
    {
      return $this->caption;
    }
    
    public function getSubject() : string
    {
      return $this->subject;
    }
    
    public function getDatePass() : string
    {
      return $this->date_pass;
    }
    
    public function getMark() : int
    {
      return $mark;
    }
    
    public function setAnswers(array $answers)
    {
      $this->answers = $answers;
    }
    
    public function getAnswers() : array
    {
      return $this->answers;
    }
    
  }
  
?>
