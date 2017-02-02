<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/user.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/teacher.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/parent.class.php";
    
    use IEP\Structures\User;
    use IEP\Structures\Student;
    use IEP\Structures\Teacher;
    use IEP\Structures\Parent_;
	
	class UserManager extends IEP
	{
		
		public function authorizate($email, $password) : User
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
						$user_data[0]['id_type_user']
					),
						$student_data[0]['grp'],
						$student_data[0]['date_birthday'],
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
						$user_data[0]['id_type_user']
					),
						$teacaher_data['info']
					);
					
					return $t;
				} break;
				case USER_TYPE_PARENT:
				{
					$parent_data = $this->get("SELECT * FROM `parents` WHERE `id_parent`=:id_user", [":id_user" => $user_data[0]['id_user']]);
					
					$p = new Parent_(new User(
						$user_data[0]['second_name'],
						$user_data[0]['first_name'],
						$user_data[0]['patronymic'],
						$user_data[0]['email'],
						$user_data[0]['password'],
						$user_data[0]['id_type_user']
					),
						$parent_data[0]['age'],
						$parent_data[0]['education'],
						$parent_data[0]['work_place'],
						$parent_data[0]['post'],
						$parent_data[0]['home_phone'],
						$parent_data[0]['cell_phone']
					);
					
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
                                        echo __LINE__."<br>";
                                        return false;
                                    }
                                    else return $this->dbc()->commit();
                                }
                                else return $this->dbc()->commit();
                            }
                            else
                            {                                    
                                $this->dbc()->rollBack();
                                echo __LINE__."<br>";
                                return false;
                            }
                        }
                        else
                        {
                            $this->dbc()->rollBack();
                            echo __LINE__."<br>";
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
					
					$add_user_query = $this->dbc()->prepare("INSERT INTO `users`
						(`second_name`, `first_name`, `patronymic`, `email`, `password`, `id_type_user`)
						VALUES
						(:second_name, :first_name, :patronymic, :email, :password, :id_type_user);
					");
					
					$add_user_query->bindValue(":second_name", $user['second_name']);
					$add_user_query->bindValue(":first_name", $user['first_name']);
					$add_user_query->bindValue(":patronymic", $user['patronymic']);
					$add_user_query->bindValue(":email", $user['email']);
					$add_user_query->bindValue(":password", $user['password']);
					$add_user_query->bindValue(":id_type_user", $user['id_type_user']);
					
					if($add_user_query->execute())
					{
						$add_parent_query = $this->dbc()->prepare("INSERT INTO `parents`
							(`id_parent`, `age`, `education`, `work_place`, `post`, `home_phone`, `cell_phone`)
							VALUES
							((SELECT `id_user` FROM `users` WHERE `email`=:email), :age, :education, :work_place, :post, :home_phone, :cell_phone)
						");
						
						$add_parent_query->bindValue(":email", $user['email']);
						$add_parent_query->bindValue(":age", $user['age']);
						$add_parent_query->bindValue(":education", $user['education']);
						$add_parent_query->bindValue(":work_place", $user['work_place']);
						$add_parent_query->bindValue(":post", $user['post']);
						$add_parent_query->bindValue(":home_phone", $user['home_phone']);
						$add_parent_query->bindValue(":cell_phone", $user['cell_phone']);
						
						if($add_parent_query->execute())
						{
							$success = true;
							for($i = 0; $i < count($user['childs']); $i++)
							{
								$set_parent_child_query = $this->dbc()->prepare("INSERT INTO `parent_child`
									(`id_parent`, `id_children`, `id_type_releation`)
									VALUES
									((SELECT `id_user` FROM `users` WHERE `email`=:email), :id_children, :id_releation)
								");
								
								
								$set_parent_child_query->bindValue(":email", $user['email']);
								$set_parent_child_query->bindValue(":id_children", $user['childs'][$i]);
								$set_parent_child_query->bindValue(":id_releation", 6);
								
								$success *= $set_parent_child_query->execute();
							}
							return $success;
						}
						else return false;
					}
					else return false;
					
				} break;
				case USER_TYPE_ADMIN:
				{
					echo "Add USER_TYPE_ADMIN";
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
                $user_data["id_type_user"]
			), $user_data['grp'], $user_data["date_birthday"], $user_data['home_address'], $user_data["cell_phone"]);
		}
		
		public function getUsers()
		{
			return $this->get("SELECT * FROM `users`");
		}
		
		public function getStudents()
		{
			return $this->get("SELECT * FROM `students` s INNER JOIN `users` u ON s.id_student=u.id_user");
		}			
		
		public function getTeachers()
		{
			return $this->get("SELECT * FROM `teachers` t INNER JOIN `users` u ON t.id_teacher=u.id_user");
		}
		
		public function getParents()
		{
			return $this->get("SELECT * FROM `parents` p INNER JOIN `users` u ON p.id_parent=u.id_user");
		}
		
		public function getChilds($parent)
		{
			$id_childrens = $this->get("SELECT DISTINCT `id_children` FROM `parents` p INNER JOIN `parent_child` pc ON pc.id_parent=(SELECT `id_user` FROM `users` WHERE `email`='".$parent->getEmail()."')");
			
			for($i = 0; $i < count($id_childrens); $i++)
			{
				$childs[] = $this->get("SELECT DISTINCT * FROM `students` s INNER JOIN `users` u ON s.id_student=u.id_user WHERE s.id_student=:id_children", [":id_children" => $id_childrens[$i]['id_children']])[0];
			}
			
			return $childs;
		}
		
		public function remove($what)
		{
			
		}
		
		public function change($old, $new)
		{
			
		}
	}
	
?>