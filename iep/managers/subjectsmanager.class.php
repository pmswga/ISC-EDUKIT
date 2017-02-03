<?php
  declare(strict_types = 1);
	namespace IEP\Managers;
  
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/subject.class.php";
	
  use IEP\Structures\Subject;
  
	class SubjectsManager extends IEP
	{
		
		public function add($subject)
		{
			$add_subject_query = $this->dbc()->prepare("INSERT INTO `subjects` (`description`) VALUES (:description)");
			$add_subject_query->bindValue(":description", $subject->getDescription());
			
			return $add_subject_query->execute();
		}
		
		public function getSubjects() : array
		{
			$db_subjects = $this->get("SELECT * FROM `subjects`");
      
      $subjects = array();
      foreach ($db_subjects as $db_subject) {
        $subject = new Subject($db_subject['description']);
        $subject->setID((int)$db_subject['id_subject']);
        
        $subjects[] = $subject;
      }
      
      return $subjects;
		}
		
		public function remove($subject) : bool
		{
			$remove_query = $this->dbc()->prepare("DELETE FROM `subjects` WHERE `description`=:description");
			
			$remove_query->bindValue(":description", $subject);
			
			return $remove_query->execute();
		}
		
		public function change($old, $new)
		{
			
		}
		
	}
	
?>