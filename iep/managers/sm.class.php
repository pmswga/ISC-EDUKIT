<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/specialty.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\Specialty;
  
  class SpecialtyManager extends IEP
  {
    
    public function add($spec) : bool
    {
      $add_spec_query = $this->dbc()->prepare("call addSpecialty(:code, :descp, :file)");
      
      $add_spec_query->bindValue(":code",  $spec->getCode());
      $add_spec_query->bindValue(":descp", $spec->getDescription());
      $add_spec_query->bindValue(":file",  $spec->getFilepath());
      
      return $add_spec_query->execute();
    }
    
    public function getAllSpecialty() : array
    {
      $db_specs = $this->query("call getAllSpecialty()");
      
      $specs = array();
      foreach ($db_specs as $db_spec) {
        $spec = new Specialty($db_spec['code'], $db_spec['descp'], $db_spec['file']);
        $spec->setSpecialtyID((int)$db_spec['id_spec']);
        
        $specs[] = $spec;
      }
      
      return $specs;
    }
    
    public function changeCodeSpecialty(int $spec_id, string $code) : bool
    {
      $change_code_spec_query = $this->dbc()->prepare("call changeCodeSpecialty(:spec_id, :code)");
      
      $change_code_spec_query->bindValue(":spec_id", $spec_id);
      $change_code_spec_query->bindValue(":code", $code);
      
      return $change_code_spec_query->execute();
    }
    
    public function changeDescpSpecialty(int $spec_id, string $descp) : bool
    {
      $change_descp_spec_query = $this->dbc()->prepare("call changeDescriptionSpecialty(:spec_id, :descp)");
      
      $change_descp_spec_query->bindValue(":spec_id", $spec_id);
      $change_descp_spec_query->bindValue(":descp", $descp);
      
      return $change_descp_spec_query->execute();
    }
    
    public function changeFileSpecialty(int $spec_id, string $file) : bool
    {
      $change_file_spec_query = $this->dbc()->prepare("call changeFileSpecialty(:spec_id, :file)");
      
      $change_file_spec_query->bindValue(":spec_id", $spec_id);
      $change_file_spec_query->bindValue(":file", $file);
      
      return $change_file_spec_query->execute();
    }
    
    public function remove($spec_id) : bool
    {
      $remove_spec_query = $this->dbc()->prepare("call removeSpecialty(:spec_id)");
      
      $remove_spec_query->bindValue(":spec_id", $spec_id);
      
      return $remove_spec_query->execute();
    }
    
  }
  
  
?>