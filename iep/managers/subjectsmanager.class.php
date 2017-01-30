<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once "../structures/subject.class.php";
	
	class SubjectsManager extends IEP
	{
		
		public function add($subject)
		{
			$add_subject_query = $this->dbc()->prepare("INSERT INTO `subjects` (`description`) VALUES (:description)");
			$add_subject_query->bindValue(":description", $subject->getSubject());
			
			return $add_subject_query->execute();
		}
		
		public function getSubjects()
		{
			return $this->get("SELECT * FROM `subjects`");
		}
		
		public function remove($subject)
		{
			$remove_query = $this->dbc()->prepare("DELETE FROM `subjects` WHERE `description`=:description");
			
			$remove_query->bindValue(":description", $subject);
			
			return $remove_query->execute();
		}
		
		public function change($old, $new)
		{
			
		}
		
		public function getTeacherSubjects($teacher)
		{
			$subjects = $this->get("
				SELECT s.id_subject, s.description FROM `teachers` t 
				INNER JOIN `users` u ON t.id_teacher=u.id_user 
				INNER JOIN `teacher_subjects` ts ON t.id_teacher=ts.id_teacher 
				INNER JOIN `subjects` s ON ts.id_subject=s.id_subject 
				WHERE `email`=:email
			", [":email" => $teacher->getEmail()]);
			
			return $subjects;
		}
		
	}
	
?>