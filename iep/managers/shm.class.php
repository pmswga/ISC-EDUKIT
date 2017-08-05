<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  
  use IEP\Managers\IEP;
  
  class ScheduleManager extends IEP
  {
    private function intToDay(int $day)
    {
      switch ($day)
      {
        case 1: return "ПН"; break;
        case 2: return "ВТ"; break;
        case 3: return "СР"; break;
        case 4: return "ЧТ"; break;
        case 5: return "ПТ"; break;
        case 6: return "СБ"; break;
      }
    }
    
    public function add($schedule)
    {
      
    }
    
    public function getAllScheduleGroup()
    {
      $data = $this->query("call getAllScheduleGroup()");
  
      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']][] = $d;
      }
      
      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {
        
        foreach ($value as $day) {      
          $dataByGroupByDay[$key][$this->intToDay((int)$day['day'])][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }
    
    public function remove($schedule)
    {
      
    }
    
  }
  
  
?>
