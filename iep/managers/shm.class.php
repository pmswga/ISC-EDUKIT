<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  
  use IEP\Managers\IEP;
  
  class ScheduleManager extends IEP
  {
    private function intToDay(int $day) : string
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
    
    public function getAllScheduleGroup() : array
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
    
    public function changePair(string $grp, int $day, int $pair, int $subject) : bool
    {
      $change_query = $this->dbc()->prepare("call changePair(:g, :d, :p, :s)");
      $change_query->bindValue(":g", $grp);
      $change_query->bindValue(":d", $day);
      $change_query->bindValue(":p", $pair);
      $change_query->bindValue(":s", $subject);
      
      return $change_query->execute();
    }
    
    public function remove($schedule)
    {
      
    }
    
  }
  
  
?>
