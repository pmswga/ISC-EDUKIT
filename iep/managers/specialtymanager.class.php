<?php
  declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/specialty.class.php";
	
  use IEP\Structures\Specialty;
    
  const DESCRIPTION = 0;
  const CODE_SPEC = 1;
  const PDF_FILE = 2;
    
	class SpecialtyManager extends IEP
	{
		
		public function add($specialty)
		{
			$add_spec_query = $this->dbc()->prepare("call addSpecialty(:code_spec, :description, :current_file)");
			
			$add_spec_query->bindValue(":code_spec", $specialty->getCode());
			$add_spec_query->bindValue(":description", $specialty->getDescription());
			$add_spec_query->bindValue(":current_file", $specialty->getFile());
			
			return $add_spec_query->execute();
		}
		
		public function getSpecialtyes() : array
		{
			$db_specs = $this->get("call getAllSpecialty()");
            
      $specialtys = array();
      foreach($db_specs as $spec)
      {
          $new_spec = new Specialty($spec['code_spec'], $spec['descp'], $spec['pdf']);
					$new_spec->setID((int)$spec['id_spec']);
					
          $specialtys[] = $new_spec;
      }
      
      return $specialtys;
		}
		
		public function remove($code) : bool
		{
			$remove_query = $this->dbc()->prepare("call removeSpecialty(:code_spec)");
			$remove_query->bindValue(":code_spec", $code);
			
			return $remove_query->execute();
		}
		
		public function change($data, $what) : bool
		{
      
		}
		
	}
	
?>
