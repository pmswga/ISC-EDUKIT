<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/subject.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\Subject;
  
  class SubjectManager extends IEP
  {
    
    public function add($subject)
    {
      $add_subject_query = $this->dbc()->prepare("call addSubject(:descp)");
      
      $add_subject_query->bindValue(":descp", $subject->getDescription());
      
      return $add_subject_query->execute();
    }
    
    public function getAllSubjects() : array
    {
      $db_subjects = $this->query("call getAllSubjects()");
      
      $subjects = array();
      foreach ($db_subjects as $db_subject) {
        $subject = new Subject($db_subject['descp']);
        $subject->setSubjectID((int)$db_subject['id_subject']);
        
        $subjects[] = $subject;
      }
      
      return $subjects;
    }
    
    public function changeDescriptionSubject(int $subject_id, string $new_descp)
    {
      $change_subject_query = $this->dbc()->prepare("call changeDescriptionSubject(:subject_id, :new_descp)");
      
      $change_subject_query->bindValue(":subject_id", $subject_id);
      $change_subject_query->bindValue(":new_descp", $new_descp);
      
      return $change_subject_query->execute(); 
    }
    
    public function remove($subject_id) : bool
    {
      $remove_subject_query = $this->dbc()->prepare("call removeSubject(:subject_id)");
      
      $remove_subject_query->bindValue(":subject_id", $subject_id);
      
      return $remove_subject_query->execute();
    }
    
  }
  
  
?>