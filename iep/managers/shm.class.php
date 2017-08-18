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
      $add_schedule = $this->dbc()->prepare("call addScheduleEntry(:grp, :day, :pair, :subject)");
      
      $add_schedule->bindValue(":grp", $schedule['group']);
      $add_schedule->bindValue(":day", $schedule['day']);
      $add_schedule->bindValue(":pair", $schedule['pair']);
      $add_schedule->bindValue(":subject", $schedule['subject']);
      
      return $add_schedule->execute();
    }
    
    public function addChangeSchedule($schedule) : bool
    {
      $add_schedule = $this->dbc()->prepare("call addChangeSchedule(:grp, :day, :pair, :subject)");
      
      $add_schedule->bindValue(":grp", $schedule['group']);
      $add_schedule->bindValue(":day", $schedule['day']);
      $add_schedule->bindValue(":pair", $schedule['pair']);
      $add_schedule->bindValue(":subject", $schedule['subject']);
      
      return $add_schedule->execute();
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
          $dataByGroupByDay[$key][$this->intToDay((int)$day['_day'])][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }
    
    public function getScheduleGroup(int $grp)
    {
      $data = $this->query("call getScheduleGroup(:g)", [":g" => $grp]);
  
      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']][] = $d;
      }
      
      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {
        
        foreach ($value as $day) {      
          $dataByGroupByDay[$key][$this->intToDay((int)$day['_day'])][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }

    public function getAllChangedSchedule()
    {
        $data = $this->query("call getAllChangedSchedule()");

        $dataByGroup = array();
        foreach ($data as $d) {
          $dataByGroup[$d['group']][] = $d;
        }

        $dataByGroupByDay = array();
        foreach ($dataByGroup as $key => $value) {

          foreach ($value as $day) {            
            $dataByGroupByDay[$key][$day['_day']][] = $day;
          }

        }

        return $dataByGroupByDay;
    }

    public function getChangeScheduleGroup(int $grp)
    {
      $data = $this->query("call getChangeScheduleGroup(:g)", [":g" => $grp]);
  
      $dataByGroup = array();
      foreach ($data as $d) {
        $dataByGroup[$d['group']][] = $d;
      }
      
      $dataByGroupByDay = array();
      foreach ($dataByGroup as $key => $value) {
        
        foreach ($value as $day) {      
          $dataByGroupByDay[$key][$day['_day']][] = $day;
        }
        
      }
      
      return $dataByGroupByDay;
    }
    
    public function changePair(string $grp, int $day, int $pair, int $subject) : bool
    {
      $change_query = $this->dbc()->prepare("UPDATE `schedule`     SET `subject`=:s     WHERE `id_grp`=:g AND `pair`=:p AND `_day`=:d");
      $change_query->bindValue(":g", $grp);
      $change_query->bindValue(":d", $day);
      $change_query->bindValue(":p", $pair);
      $change_query->bindValue(":s", $subject);
      
      return $change_query->execute();
    }
    
    public function changeChangedPair(string $grp, string $day, int $pair, int $subject) : bool
    {
      $change_query = $this->dbc()->prepare("UPDATE `changed_schedule`     SET `subject`=:s     WHERE `id_grp`=:g AND `pair`=:p AND `_day`=:d");
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
