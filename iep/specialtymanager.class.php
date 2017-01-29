<?php
	
	require_once "specialty.class.php";
	require_once "iep.class.php";
	
	class SpecialtyManager extends IEP
	{
		
		public function add($specialty)
		{
			$add_spec_query = $this->dbc()->prepare("INSERT INTO `specialty`
				(`code_spec`, `description`, `current_file`)
				VALUES
				(:code_spec, :description, :current_file)
			");
			
			$add_spec_query->bindValue(":code_spec", $specialty->getCode());
			$add_spec_query->bindValue(":description", $specialty->getDescription());
			$add_spec_query->bindValue(":current_file", $specialty->getFile());
			
			return $add_spec_query->execute();
		}
		
		public function getSpecs()
		{
			return $this->get("SELECT * FROM `specialty`");
		}
		
		public function remove($what)
		{
			$remove_query = $this->dbc()->prepare("DELETE FROM `specialty` WHERE `code_spec`=:code_spec");
			$remove_query->bindValue(":code_spec", $what);
			
			return $remove_query->execute();
		}
		
		public function change($old, $new)
		{
			
			$update_query = $this->dbc()->prepare("UPDATE `specialty` SET 
				`code_spec`=:n_csp, `description`=:n_d, `current_file`=:n_cf
				WHERE `code_spec`=:o_csp OR `description`=:o_d OR `current_file`=:o_f
			");
			
			$update_query->bindValue(":n_csp", $new->getCode());
			$update_query->bindValue(":n_d", $new->getDescription());
			$update_query->bindValue(":n_cf", $new->getFile());
			
			$update_query->bindValue(":o_csp", $old->getCode());
			$update_query->bindValue(":o_d", $old->getDescription());
			$update_query->bindValue(":o_f", $old->getFile());
			
			return $update_query->execute();
		}
		
	}
	
?>