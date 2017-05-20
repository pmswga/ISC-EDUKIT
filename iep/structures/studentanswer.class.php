<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  require_once "student.class.php";
  
  class StudentAnswer
  {
    private $student;
    private $answers;
    private $subject;
    private $date;
    private $mark;
    
    function __construct($student, string $subject, array $answers, string $date, int $mark)
    {
      $this->student = $student;
      $this->subject = $subject;
      $this->answers = $answers;
      $this->date = $date;
      $this->mark = $mark;
    }
    
    public function getStudent()
    {
      return $this->student;
    }
    
    public function getSubject() : string
    {
      return $this->subject;
    }
    
    public function getAnswers() : array
    {
      return $this->answers;
    }
    
    public function getPassDate() : string
    {
      return $this->date;
    }
    
    public function getMark() : int
    {
      return $this->mark;
    }
    
  }

?>
