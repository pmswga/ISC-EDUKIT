<?php
  declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/user.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/teacher.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/parent.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/subject.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/test.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/onequestion.class.php";
    
  use IEP\Structures\User;
  use IEP\Structures\Student;
  use IEP\Structures\Teacher;
  use IEP\Structures\Parent_;
  use IEP\Structures\Subject;
  use IEP\Structures\Test;
  use IEP\Structures\OneQuestion;
	
	class UserManager extends IEP
	{
		
		public function authorizate($email, $password)
		{
			$user_data = $this->get("SELECT * FROM `users` WHERE `email`=:email AND `password`=:password",
				[":email" => $email, ":password" => $password]
			);
      
			switch($user_data[0]['id_type_user'])
			{
				case USER_TYPE_STUDENT:
				{
					$student_data = $this->get("SELECT * FROM `students` WHERE `id_student`=:id_user", [":id_user" => $user_data[0]['id_user']]);
					
					$s = new Student(new User(
						$user_data[0]['second_name'],
						$user_data[0]['first_name'],
						$user_data[0]['patronymic'],
						$user_data[0]['email'],
						$user_data[0]['password'],
						(int)$user_data[0]['id_type_user']
					),
						(int)$student_data[0]['grp'],
						$student_data[0]['home_address'],
						$student_data[0]['cell_phone']
					);
          
					return $s;
				} break;
				case USER_TYPE_TEACHER:
				{
					$teacaher_data = $this->get("SELECT * FROM `teachers` WHERE `id_teacher`=:id_user", [":id_user" => $user_data[0]['id_user']]);
          
					$t = new Teacher(new User(
						$user_data[0]['second_name'],
						$user_data[0]['first_name'],
						$user_data[0]['patronymic'],
						$user_data[0]['email'],
						$user_data[0]['password'],
						(int)$user_data[0]['id_type_user']
					),
						$teacaher_data[0]['info']
					);
					
          $db_subjects = $this->get("SELECT `description` FROM `subjects` s INNER JOIN `teacher_subjects` ts ON s.id_subject=ts.id_subject WHERE `id_teacher`=:id_teacher", [":id_teacher" => $user_data[0]['id_user']]);;
          
          $subjects = array();
          for ($i = 0; $i < count($db_subjects); $i++) {
            $subjects[] = $db_subjects[$i]['description'];
          }
          
          $t->setSubjects($subjects);
          
					return $t;
				} break;
				case USER_TYPE_PARENT:
				{
					$parent_data = $this->get("SELECT * FROM `parents` WHERE `id_parent`=:id_user", [":id_user" => $user_data[0]['id_user']]);
					
          $db_childs = $this->get("SELECT `id_children`, `id_type_releation` FROM `parent_child` WHERE `id_parent`=(SELECT `id_user` FROM `users` WHERE `email`=:parent_email)", [":parent_email" => $user_data[0]['email']]);
          
          $childs = array();
          for ($i = 0; $i < count($db_childs); $i++) {
            $db_child = $this->get("SELECT * FROM `users` u INNER JOIN `students` s ON u.id_user=s.id_student
            WHERE `id_student`=:id_child", [":id_child" => $db_childs[$i]['id_children']])[0];
            
            $childs[$i]['child'] = new Student(
              new User(
                  $db_child['second_name'],
                  $db_child['first_name'],
                  $db_child['patronymic'],
                  $db_child['email'],
                  $db_child['password'],
                  (int)$db_child['id_type_user']
              ),
              (int)$db_child['grp'],
              $db_child['home_address'],
              $db_child['cell_phone']
            );
            $childs[$i]['type_relation'] = $db_childs[$i]['id_type_releation'];
          }
          
					$p = new Parent_(new User(
						$user_data[0]['second_name'],
						$user_data[0]['first_name'],
						$user_data[0]['patronymic'],
						$user_data[0]['email'],
						$user_data[0]['password'],
						(int)$user_data[0]['id_type_user']
					),
						(int)$parent_data[0]['age'],
						$parent_data[0]['education'],
						$parent_data[0]['work_place'],
						$parent_data[0]['post'],
						$parent_data[0]['home_phone'],
						$parent_data[0]['cell_phone']
					);
          
          $p->setChilds($childs);
					
					return $p;
				} break;
				case USER_TYPE_ADMIN:
				{
					echo "Add USER_TYPE_ADMIN";
				} break;
				default: return false; break;
			}
		}
		
		public function add($user) : bool
		{
			switch($user->getTypeUser())
			{
				case USER_TYPE_STUDENT:
				{
          try
          {
              $this->dbc()->beginTransaction();
              
              $add_user_query = $this->dbc()->prepare("INSERT INTO `users`
                  (`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`)
                  VALUES
                  (:second_name, :first_name, :patronymic, :email, :password, :id_type_user);
              ");
              
              $add_user_query->bindValue(":second_name", $user->getSn());
              $add_user_query->bindValue(":first_name", $user->getFn());
              $add_user_query->bindValue(":patronymic", $user->getPt());
              $add_user_query->bindValue(":email", $user->getEmail());
              $add_user_query->bindValue(":password", $user->getPassword());
              $add_user_query->bindValue(":id_type_user", $user->getTypeUser());
              
              if($add_user_query->execute())
              {
                  $add_student_query = $this->dbc()->prepare("INSERT INTO `students`
                      (`id_student`, `home_address`, `cell_phone`, `grp`)
                      VALUES
                      ((SELECT `id_user` FROM `users` WHERE `email`=:email), :home_address, :cell_phone_child, :grp)
                  ");
                  
                  $add_student_query->bindValue(":email", $user->getEmail());
                  $add_student_query->bindValue(":home_address", $user->getHomeAddress());
                  $add_student_query->bindValue(":cell_phone_child", $user->getCellPhone());
                  $add_student_query->bindValue(":grp", $user->getGroup());
                  
                  if (!$add_student_query->execute()) {
                      $this->dbc()->rollBack();
                      return false;
                  }
                  else return $this->dbc()->commit();
              }
              else
              {
                  $this->dbc()->rollBack();
                  return false;
              }
          }
          catch(PDOException $e)
          {
              $this->dbc()->rollBack();
              return false;
          }
				} break;
				case USER_TYPE_TEACHER:
				{
          try
          {
            $this->dbc()->beginTransaction();
            
            $add_user_query = $this->dbc()->prepare("INSERT INTO `users`
                (`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`)
                VALUES
                (:second_name, :first_name, :patronymic, :email, :password, :id_type_user);
            ");
            
            $add_user_query->bindValue(":second_name", $user->getSn());
            $add_user_query->bindValue(":first_name", $user->getFn());
            $add_user_query->bindValue(":patronymic", $user->getPt());
            $add_user_query->bindValue(":email", $user->getEmail());
            $add_user_query->bindValue(":password", $user->getPassword());
            $add_user_query->bindValue(":id_type_user", $user->getTypeUser());
            
            if($add_user_query->execute())
            {
              $add_teacher_query = $this->dbc()->prepare("INSERT INTO `teachers`
                  (`id_teacher`, `info`)
                  VALUES
                  ((SELECT `id_user` FROM `users` WHERE `email`=:email), :info)
              ");
              
              $add_teacher_query->bindValue(":email", $user->getEmail());
              $add_teacher_query->bindValue(":info", $user->getInfo());
              
              if ($add_teacher_query->execute()) {
                
                if (!empty($user->getSubjects())) {
                  $status = true;
                  foreach($user->getSubjects() as $subject)
                  {
                    $add_subject_query = $this->dbc()->prepare("INSERT INTO `teacher_subjects`
                        (`id_teacher`, `id_subject`)
                        VALUES
                        ((SELECT `id_user` FROM `users` WHERE `email`=:email), :id_subject)
                    ");
                    
                    $add_subject_query->bindValue(":email", $user->getEmail());
                    $add_subject_query->bindValue(":id_subject", $subject);
                    
                    $status *= $add_subject_query->execute();
                  }
                  
                  if (!$status) {                                    
                    $this->dbc()->rollBack();
                    return false;
                  }
                  else return $this->dbc()->commit();
                }
                else return $this->dbc()->commit();
                
              }
              else
              {                                    
                $this->dbc()->rollBack();
                return false;
              }
            }
            else
            {
                $this->dbc()->rollBack();
                return false;
            }
          }
          catch(PDOException $e)
          {
            $this->dbc()->rollBack();
            return false;
          }
				} break;
				case USER_TYPE_PARENT:
				{
          try
          {
              $this->dbc()->beginTransaction();
              
              $add_user_query = $this->dbc()->prepare("INSERT INTO `users`
                  (`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`)
                  VALUES
                  (:second_name, :first_name, :patronymic, :email, :password, :id_type_user);
              ");
              
              $add_user_query->bindValue(":second_name", $user->getSn());
              $add_user_query->bindValue(":first_name", $user->getFn());
              $add_user_query->bindValue(":patronymic", $user->getPt());
              $add_user_query->bindValue(":email", $user->getEmail());
              $add_user_query->bindValue(":password", $user->getPassword());
              $add_user_query->bindValue(":id_type_user", $user->getTypeUser());
              
              if($add_user_query->execute())
              {
                  $add_parent_query = $this->dbc()->prepare("INSERT INTO `parents`
                      (`id_parent`, `age`, `education`, `work_place`, `post`, `home_phone`, `cell_phone`)
                      VALUES
                      ((SELECT `id_user` FROM `users` WHERE `email`=:email), :age, :education, :work_place, :post, :home_phone, :cell_phone)
                  ");
                  
                  $add_parent_query->bindValue(":email", $user->getEmail());
                  $add_parent_query->bindValue(":age", $user->getAge());
                  $add_parent_query->bindValue(":education", $user->getEducation());
                  $add_parent_query->bindValue(":work_place", $user->getWorkPlace());
                  $add_parent_query->bindValue(":post", $user->getPost());
                  $add_parent_query->bindValue(":home_phone", $user->getHomePhone());
                  $add_parent_query->bindValue(":cell_phone", $user->getCellPhone());
                  
                  if($add_parent_query->execute())
                  {
                      $childs = $user->getChilds();
                      $success = true;
                      for($i = 0; $i < count($childs); $i++)
                      {
                          $set_parent_child_query = $this->dbc()->prepare("INSERT INTO `parent_child`
                              (`id_parent`, `id_children`, `id_type_releation`)
                              VALUES
                              ((SELECT `id_user` FROM `users` WHERE `email`=:email), (SELECT `id_user` FROM `users` WHERE `email`=:child_email), :id_releation)
                          ");
                          
                          $set_parent_child_query->bindValue(":email", $user->getEmail());
                          $set_parent_child_query->bindValue(":child_email", $childs[$i]['child']->getEmail());
                          $set_parent_child_query->bindValue(":id_releation", $childs[$i]['type_relation']);
                          
                          $success *= $set_parent_child_query->execute();
                      }
                      
                      if (!$success) {
                          $this->dbc()->rollBack();
                          return false;
                      }
                      else return $this->dbc()->commit();
                  }
                  else   
                  {
                      $this->dbc()->rollBack();
                      return false;
                  }
              }
              else
              {
                  $this->dbc()->rollBack();
                  return false;
              }
          }
          catch(PDOException $e)
          {
              $this->dbc()->rollBack();
              return false;
          }
				} break;
				case USER_TYPE_ADMIN:
				{
          try
          {
              $this->dbc()->beginTransaction();
              
              $add_user_query = $this->dbc()->prepare("INSERT INTO `users`
                  (`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`)
                  VALUES
                  (:second_name, :first_name, :patronymic, :email, :password, :id_type_user);
              ");
              
              $add_user_query->bindValue(":second_name", $user->getSn());
              $add_user_query->bindValue(":first_name", $user->getFn());
              $add_user_query->bindValue(":patronymic", $user->getPt());
              $add_user_query->bindValue(":email", $user->getEmail());
              $add_user_query->bindValue(":password", $user->getPassword());
              $add_user_query->bindValue(":id_type_user", $user->getTypeUser());
              
              if (!$add_user_query->execute()) {
                  $this->dbc()->rollBack();
                  return false;
              }
              else return $this->dbc()->commit();
          }
          catch(PDOException $e)
          {
              $this->dbc()->rollBack();
              return false;
          }
				} break;
				default: return false; break;
			}
		}
		
		public function getUserByID($id)
		{
			$user_data = $this->get("SELECT * FROM `users` u INNER JOIN `students` s ON s.id_student=u.id_user WHERE `id_user`=:id", [":id" => $id])[0];
			
			return new Student( new User(
        $user_data["second_name"], 
        $user_data["first_name"], 
        $user_data["patronymic"],
        $user_data["email"],
        $user_data["password"],
        (int)$user_data["id_type_user"]
			), (int)$user_data['grp'], $user_data['home_address'], $user_data["cell_phone"]);
		}
		
		public function getUsers() 
		{
			$db_users =  $this->get("SELECT * FROM `users`");
      
      $users = array();
      foreach ($db_users as $db_user) {
        $users[] = new User(
            $db_user['second_name'], 
            $db_user['first_name'], 
            $db_user['patronymic'], 
            $db_user['email'], 
            $db_user['password'], 
            (int)$db_user['id_type_user']
        );
      }
      
      return $users;
		}
		
		public function getStudents()
		{
			$db_students = $this->get("SELECT * FROM `students` s INNER JOIN `users` u ON s.id_student=u.id_user");
            
      $studnets = array();
      foreach ($db_students as $db_student) {
        $students[] = new Student(
          new User(
              $db_student['second_name'],
              $db_student['first_name'],
              $db_student['patronymic'],
              $db_student['email'],
              $db_student['password'],
              (int)$db_student['id_type_user']
          ),
          (int)$db_student['grp'],
          $db_student['home_address'],
          $db_student['cell_phone']
        );
      }
      
      return $students;
		}			
		
		public function getTeachers()
		{
			$db_teachers = $this->get("SELECT * FROM `teachers` t INNER JOIN `users` u ON t.id_teacher=u.id_user");
            
      $teachers = array();
      foreach ($db_teachers as $db_teacher) {
          $id_subjects = $this->get("SELECT `id_subject` FROM `teacher_subjects` WHERE `id_teacher`=:id_teacher", [":id_teacher" => $db_teacher['id_teacher']]);
          
          $teacher = new Teacher(
              new User(
                  $db_teacher['second_name'],
                  $db_teacher['first_name'],
                  $db_teacher['patronymic'],
                  $db_teacher['email'],
                  $db_teacher['password'],
                  (int)$db_teacher['id_type_user']
              ),
              $db_teacher['info']
          );
          
          $subjects = array();
          for ($i = 0; $i < count($id_subjects); $i++) {
              $subject = $this->get("SELECT `description` FROM `subjects` WHERE `id_subject`=:id_subject", [":id_subject" => $id_subjects[$i]['id_subject']])[0]['description'];
              $subjects[] = new Subject($subject);
          }
          
          $db_tests = $this->get("SELECT * FROM `tests` WHERE `id_teacher`=:id_teacher", [":id_teacher" => $db_teacher['id_teacher']]);
          
          $tests = array();
          for ($i = 0; $i < count($db_tests); $i++) {
              $subject = $this->get("SELECT `description` FROM `subjects` WHERE `id_subject`=:id_subject", [":id_subject" => $db_tests[$i]['id_subject']])[0]['description'];
              
              $author = $this->get("SELECT `email` FROM `users` WHERE `id_user`=:id_user", [":id_user" => $db_tests[$i]['id_teacher']])[0]['email'];
              
              $questions = $this->get("SELECT * FROM `questions` WHERE `id_test`=:id_test", [":id_test" => $db_tests[$i]['id_test']]);
              
              $new_test = new Test($db_tests[$i]['caption'], $subject, $author, $db_tests[$i]['for_group']);
              
              for ($j = 0; $j < count($questions); $j++) {
                  $answers = $this->get("SELECT `answer` FROM `answers` WHERE `id_question`=:id_question", [":id_question" => $questions[$j]['id_question']]);
                  
                  $new_question = new OneQuestion($questions[$j]['question'], $questions[$j]['r_answer']);
                  
                  for ($k = 0; $k < count($answers); $k++) $new_question->addAnswer([$answers[$k]['answer']]);
                                          
                  $new_test->addQuestion([$new_question]);
              }
              
              $tests[] = $new_test;
          }
          
          $teacher->setSubjects($subjects);
          $teacher->setTests($tests);
          $teachers[] = $teacher;
      }
      
      return $teachers;
		}
		
		public function getParents()
		{
			$db_parents = $this->get("SELECT * FROM `v_parents`");
            
      $parents = array();
      foreach ($db_parents as $db_parent) {
        $db_childs = $this->get("SELECT `id_children`, `id_type_releation` FROM `parent_child` WHERE `id_parent`=(SELECT `id_user` FROM `users` WHERE `email`=:parent_email)", [":parent_email" => $db_parent['email']]);
        
        $childs = array();
        for ($i = 0; $i < count($db_childs); $i++) {
            $db_child = $this->get("SELECT * FROM `users` u INNER JOIN `students` s ON u.id_user=s.id_student
            WHERE `id_student`=:id_child", [":id_child" => $db_childs[$i]['id_children']])[0];
            
            $childs[$i]['child'] = new Student(
                new User(
                    $db_child['second_name'],
                    $db_child['first_name'],
                    $db_child['patronymic'],
                    $db_child['email'],
                    $db_child['password'],
                    (int)$db_child['id_type_user']
                ),
                (int)$db_child['grp'],
                $db_child['home_address'],
                $db_child['cell_phone']
            );
            $childs[$i]['type_relation'] = $db_childs[$i]['id_type_releation'];
        }
        
        $new_parent = new Parent_(
            new User(
                $db_parent['second_name'],
                $db_parent['first_name'],
                $db_parent['patronymic'],
                $db_parent['email'],
                $db_parent['password'],
                (int)$db_parent['id_type_user']
            ),
            (int)$db_parent['age'],
            $db_parent['education'],
            $db_parent['work_place'],
            $db_parent['post'],
            $db_parent['home_phone'],
            $db_parent['cell_phone']
        );
        $new_parent->setChilds($childs);
        
        $parents[] = $new_parent;
      }
      
      return $parents;
		}
		
		public function remove($email) : bool
		{
      $remove_user_query = $this->dbc()->prepare("DELETE FROM `users` WHERE `email`=:email");
      $remove_user_query->bindValue(":email", $email);
      
      return $remove_user_query->execute();
		}
		
		public function change($old, $new)
		{
			
		}
	}
	
?>