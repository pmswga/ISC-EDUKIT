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
			$add_group_query = $this->dbc()->prepare("INSERT INTO `groups`
				(`grp`, `code_spec`, `is_budget`)
				VALUES
				(:grp, (SELECT `id_spec` FROM `specialty` WHERE `code_spec`=:code_spec), :payment)
			");
			
			$add_group_query->bindValue(":grp", $grp->getNumberGroup());
			$add_group_query->bindValue(":code_spec", $grp->getCodeSpec());
			$add_group_query->bindValue(":payment", $grp->getStatus());
			
			return $add_group_query->execute();
		}
		
		public function getGroups() : array
		{
			$grps = $this->get("SELECT * FROM `groups` g INNER JOIN `specialty` s ON g.code_spec=s.id_spec");
            
            $groups = array();
            foreach($grps as $grp)
            {
                $group = new Group((int)$grp['grp'], $grp['code_spec'], (bool)$grp['is_budget']);
                $groups[] = $group;
            }
            
            return $groups;
		}
		
		public function remove($number_grp) : bool
		{
            $remove_grp_query = $this->dbc()->prepare("DELETE FROM `groups` WHERE `grp`=:grp");
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
		/*
		public function upCourse()
		{
			$course = $this->dbc()->query("SELECT left(`grp`, 1) FROM `groups`")->fetchAll()[0][0];
			
			if($course < 4) return $this->dbc()->query("UPDATE `groups` SET `grp`=`grp`+100");
			else return false;
		}
		
		public function downCourse()
		{
			$course = $this->dbc()->query("SELECT left(`grp`, 1) FROM `groups`")->fetchAll()[0][0];
			
			if($course > 1) return $this->dbc()->query("UPDATE `groups` SET `grp`=`grp`-100");
			else return false;
		}
		*/
	}
    
?>