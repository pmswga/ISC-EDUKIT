<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  class TrafficEntry
  {
    private $id;
    private $email;
    private $date_visit;
    private $count_passed_pair;
    private $count_all_pair;
    
    function __construct(string $student_email, string $date_visit, int $count_passed_pair, int $count_all_pair)
    {
      $this->id = 0;
      $this->email = $student_email;
      $this->date_visit = $date_visit;
      $this->count_passed_pair = $count_passed_pair;
      $this->count_all_pair = $count_all_pair;
    }
    
    public function setTrafficID(int $id)
    {
      $this->id = $id;
    }
    
    public function getTrafficID() : int
    {
      return $this->id;
    }
    
    public function getStudentEmail() : string
    {
      return $this->email;
    }
    
    public function getDateVisit() : string
    {
      return $this->date_visit;
    }
    
    public function getCountPassedPair() : int
    {
      return $this->count_passed_pair;
    }
    
    public function getCountAllPair() : int
    {
      return $this->count_all_pair;
    }
    
  }
  
  
?>