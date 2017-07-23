<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/group.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\Specialty;
  use IEP\Structures\Group;
  
  class GroupManager extends IEP
  {
    
    public function add($group) : bool
    {
      $add_group_query = $this->dbc()->prepare("call addGroup(:descp, :spec_id, :year_edu, :is_budget)");
      
      $add_group_query->bindValue(":descp", $group->getNumberGroup());
      $add_group_query->bindValue(":spec_id", $group->getSpec());
      $add_group_query->bindValue(":year_edu", $group->getYearEducation());
      $add_group_query->bindValue(":is_budget", $group->getStatus());
      
      return $add_group_query->execute();
    }
    
    public function getGroups(int $test_id) : array
    {
      $db_groups = $this->query("call getTestGroups(:test_id)", [":test_id" => $test_id]);
      
      $groups = array();
      foreach ($db_groups as $db_group) {
        
        $spec = new Specialty($db_group['spec_code'], $db_group['spec_descp']);
        $spec->setSpecialtyID((int)$db_group['spec_id']);
        
        $group = new Group(
          $db_group['grp_descp'], 
          $spec, 
          $db_group['grp_edu_year'], 
          (int)$db_group['grp_payment']
        );
        $group->setGroupID((int)$db_group['grp_id']);
        
        $groups[] = $group;
      }
      
      return $groups;
    }
    
    public function getUnsetGroups(int $test_id) : array
    {
      $db_groups = $this->query("call getUnsetGroups(:test_id)", [":test_id" => $test_id]);
      
      $unset_groups = array();
      foreach ($db_groups as $db_group) {
        
        $spec = new Specialty($db_group['spec_code'], $db_group['spec_descp']);
        $spec->setSpecialtyID((int)$db_group['spec_id']);
        
        $group = new Group(
          $db_group['grp_descp'], 
          $spec, 
          $db_group['grp_edu_year'], 
          (int)$db_group['grp_payment']
        );
        $group->setGroupID((int)$db_group['grp_id']);
        
        $unset_groups[] = $group;
      }
      
      return $unset_groups;
    }
    
    public function getAllGroups() : array
    {
      $db_groups = $this->query("call getAllGroups()");
      
      $groups = array();
      foreach ($db_groups as $db_group) {
        $spec = new Specialty(
          $db_group['spec_code'], 
          $db_group['spec_descp'], 
          $db_group['spec_file']
        );
        $spec->setSpecialtyID((int)$db_group['spec_id']);
        
        $group = new Group($db_group['number'], $spec, $db_group['edu_year'], (int)$db_group['budget']);
        $group->setGroupID((int)$db_group['id_grp']);
        
        $groups[] = $group;
      }
      
      return $groups;
    }
    
    public function changeDescriptionGroup(int $grp_id, string $new_descp) : bool
    {
      $change_descp_grp_query = $this->dbc()->prepare("call changeDescriptionGroup(:grp, :descp)");
      
      $change_descp_grp_query->bindValue(":grp", $grp_id);
      $change_descp_grp_query->bindValue(":descp", $new_descp);
      
      return $change_descp_grp_query->execute();
    }
    
    public function changeSpecGroup(int $grp_id, int $spec_id) : bool
    {
      $change_spec_grp_query = $this->dbc()->prepare("call changeSpecGroup(:grp, :spec)");
      
      $change_spec_grp_query->bindValue(":grp", $grp_id);
      $change_spec_grp_query->bindValue(":spec", $spec_id);
      
      return $change_spec_grp_query->execute();
    }
    
    public function upCourse(int $grp_id)
    {
      $up_course_grp_query = $this->dbc()->prepare("call upCourse(:grp)");
      
      $up_course_grp_query->bindValue(":grp", $grp_id);
      
      return $up_course_grp_query->execute();
    }
    
    public function remove($group_id) : bool
    {
      $remove_group_query = $this->dbc()->prepare("call removeGroup(:grp_id)");
      
      $remove_group_query->bindValue(":grp_id", $group_id);
      
      return $remove_group_query->execute();
    }
    
  }
  
?>