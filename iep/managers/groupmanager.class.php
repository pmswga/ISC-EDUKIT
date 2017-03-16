<?php
    declare(strict_types = 1);
    namespace IEP\Managers;
    
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/group.class.php";
    
  use IEP\Structures\Group;
    
	class GroupManager extends IEP
	{
        
		public function add($grp) : bool
		{
			$add_group_query = $this->dbc()->prepare("call addGroup(:grp, :code_spec, :payment)");
      
			$add_group_query->bindValue(":grp", $grp->getNumberGroup());
			$add_group_query->bindValue(":code_spec", $grp->getCodeSpec());
			$add_group_query->bindValue(":payment", $grp->getStatus());
			
			return $add_group_query->execute();
		}
		
		public function getGroups() : array
		{
			$grps = $this->get("call getAllGroups()");
            
      $groups = array();
      foreach($grps as $grp)
      {
          $group = new Group($grp['grp'], $grp['spec'], (bool)$grp['budget']);
          $group->setID((int)$grp['id_grp']);
          $groups[] = $group;
      }
      
      return $groups;
		}
		
		public function remove($number_grp) : bool
		{
      $remove_grp_query = $this->dbc()->prepare("call removeGroup(:grp)");
      $remove_grp_query->bindValue(":grp", $number_grp);
      
      return $remove_grp_query->execute();
		}
		
		public function change($old, $new) : bool
		{
			$update_query = $this->dbc()->prepare("UPDATE `groups` SET 
				`grp`=:n_grp, `id_spec`=:n_code_spec_grp, `is_budget`=:n_payment
				WHERE `grp`=:o_grp OR `id_spec`=:o_code_spec_grp OR `is_budget`=:o_payment
			");
			
			$update_query->bindValue(":n_grp", $new->getGroup());
			$update_query->bindValue(":n_code_spec_grp", $new->getSpec());
			$update_query->bindValue(":n_payment", $new->getType());
			
			$update_query->bindValue(":o_grp", $old->getGroup());
			$update_query->bindValue(":o_code_spec_grp", $old->getSpec());
			$update_query->bindValue(":o_payment", $old->getType());
			
			return $update_query->execute();
		}
    
	}
  
?>
