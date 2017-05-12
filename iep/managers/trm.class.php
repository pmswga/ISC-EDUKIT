<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/trafficentry.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\TrafficEntry;
  
  class TrafficManager extends IEP
  {
    
    public function add($traffic_entry) : bool
    {
      $add_traffic_query = $this->dbc()->prepare("call addTrafficEntry(:s_email, :date_visit, :cph, :cah)");
      
      $add_traffic_query->bindValue(":s_email", $traffic_entry->getStudentEmail());
      $add_traffic_query->bindValue(":date_visit", $traffic_entry->getDateVisit());
      $add_traffic_query->bindValue(":cph", $traffic_entry->getCountPassedPair());
      $add_traffic_query->bindValue(":cah", $traffic_entry->getCountAllPair());
      
      return $add_traffic_query->execute();
    }
    
    public function remove($traffic_entry) : bool
    {
      
    }
    
  }
  

?>