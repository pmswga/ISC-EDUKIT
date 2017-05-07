<?php
	declare(strict_types = 1);
	namespace IEP\Managers;
    
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/group.class.php";
    
  use IEP\Structures\Group;
    
	class GroupManager extends IEP
	{
    
		function __construct(\PDO $dbc)
		{
			parent::__construct($dbc);
			$this->log_file_name = __CLASS__.".log";
			$this->log_file_path = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR."iep".DIRECTORY_SEPARATOR."logs".DIRECTORY_SEPARATOR.basename($this->log_file_name);
			
			if (!file_exists($this->log_file_path)) {
				if (!touch ($this->log_file_path)) {
					die("Ошибка при создании лог файла для менеджера");
				}
			}
		}
		
		public function add($grp) : bool
		{
			$add_group_query = $this->dbc()->prepare("call addGroup(:grp, :code_spec, :payment)");
      
			$add_group_query->bindValue(":grp", $grp->getNumberGroup());
			$add_group_query->bindValue(":code_spec", $grp->getCodeSpec());
			$add_group_query->bindValue(":payment", $grp->getStatus());
			
			$result = $add_group_query->execute();
		
			if (!$result) {
				$this->writeLog($add_group_query->errorInfo()[2]);
				
				return false;
			} else {			
				return $result;
			}
		
		}
		
		public function getGroups() : array
		{
			$grps = $this->get("call getAllGroups()");
            
      $groups = array();
      foreach($grps as $grp)
      {
				$countStudents = $this->get("SELECT COUNT(`id_student`) as cs FROM `students` WHERE `grp`=:grp", [":grp" => $grp['id_grp']]);
				$group = new Group($grp['grp'], $grp['spec'], (int)$grp['budget']);
				$group->setID((int)$grp['id_grp']);
				$group->setCountStudents((int)$countStudents[0]['cs']);
				
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
