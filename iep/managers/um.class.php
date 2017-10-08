<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/consts/typeusers.consts.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/user.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/teacher.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/parent.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/group.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/specialty.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/subject.class.php";
  
  use IEP\Structures\User;
  use IEP\Structures\Teacher;
  use IEP\Structures\Student;
  use IEP\Structures\Parent_;
  use IEP\Structures\Group;
  use IEP\Structures\Specialty;
  use IEP\Structures\Subject;
  
  /*!
    
    \class UserManager um.class.php "iep/managers/um.class.php"
    \extends IEP
    \brief Менеджер для работы с пользователями
    \author pmswga
    \version 1.0
    
  */
  
  class UserManager extends IEP
  {
    
    /*!
      \brief Проверяет, существует ли такой администратор в базей данных
      \param[in] $user - администратор
      \note Объект класса User
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function adminExists(User $user) : bool
    { 
      $exists_user = $this->query("SELECT * FROM `admins` WHERE `email`=:email AND `passwd`=:passwd", [
        ":email" => $user->getEmail(),
        ":passwd" => $user->getPassword()
      ])[0];
      
      if (
        $exists_user['sn'] === $user->getSn() &&
        $exists_user['fn'] === $user->getFn() &&
        $exists_user['pt'] === $user->getPt() &&
        $exists_user['email'] === $user->getEmail() &&
        $exists_user['passwd'] === $user->getPassword()
      ) {
        return true;
      } else {
        return false;
      }
    }
    
    /*!
      \brief Проверяет, существует ли такой пользователь в базей данных
      \param[in] $user - пользователь
      \note Объект класса User
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function userExists(User $user) : bool
    {
      $exists_user = $this->query("SELECT * FROM `users` WHERE `email`=:email AND `passwd`=:passwd AND `id_type_user`=:user_type", [
        ":email" => $user->getEmail(),
        ":passwd" => $user->getPassword(),
        ":user_type" => $user->getUserType()
      ])[0];

      if (
        $exists_user['sn'] === $user->getSn() &&
        $exists_user['fn'] === $user->getFn() &&
        $exists_user['pt'] === $user->getPt() &&
        $exists_user['email'] === $user->getEmail() &&
        $exists_user['passwd'] === $user->getPassword() &&
        $exists_user['id_type_user'] === $user->getUserType()
      ) {
        return true;
      } else {
        return false;
      }
    }
    
    /*!
      \brief Добавляет нового пользователя
      \param[in] $user - Новый пользователь
      \note Объект класса User
    */
    
    public function add($user)
    {
      switch ($user->getUserType())
      {
        case USER_TYPE_TEACHER:
        {
          try
          {
            
            if (!empty($user->getSn()) &&
                !empty($user->getFn()) &&
                !empty($user->getPt()) &&
                !empty($user->getEmail()) &&
                !empty($user->getPassword()) &&
                !empty($user->getInfo())
            ) {
              $this->dbc()->beginTransaction();
              
              $add_teacher_query = $this->dbc()->prepare("call addTeacher(:sn, :fn, :pt, :email, :paswd, :info)");
              
              $add_teacher_query->bindValue(":sn", $user->getSn());
              $add_teacher_query->bindValue(":fn", $user->getFn());
              $add_teacher_query->bindValue(":pt", $user->getPt());
              $add_teacher_query->bindValue(":email", $user->getEmail());
              $add_teacher_query->bindValue(":paswd", $user->getPassword());
              $add_teacher_query->bindValue(":info", $user->getInfo());
              
              if ($add_teacher_query->execute()) {
                
                $subjects = $user->getSubjects();
                
                if (!empty($subjects)) {
                  
                  $set_subject_query = $this->dbc()->prepare("call setSubject(:email, :subject)");
                  $set_subject_query->bindValue(":email", $user->getEmail());
                  
                  $result = true;
                  for ($i = 0; $i < count($subjects); $i++) {
                    $set_subject_query->bindValue(":subject", $subjects[$i]);
                    
                    $result *= $set_subject_query->execute();
                  }
                  
                  if ($result) {
                    return $this->dbc()->commit();
                  } else {                    
                    $this->dbc()->rollBack();
                    return false;
                  }
                  
                } 
                else {
                  return $this->dbc()->commit();
                }
                
              } else {
                $this->dbc()->rollBack();
                return false;
              }
              
            } else {
              return false;
            }
            
          }
          catch(PDOException $e)
          {
            $this->dbc()->rollBack();
            return false;
          }
        } break;
        case USER_TYPE_STUDENT:
        {
          try
          {
            $this->dbc()->beginTransaction();
            
            $add_student_query = $this->dbc()->prepare("call addStudent(:sn, :fn, :pt, :email, :paswd, :ha, :cp, :grp)");
                        
            $add_student_query->bindValue(":sn", $user->getSn());
            $add_student_query->bindValue(":fn", $user->getFn());
            $add_student_query->bindValue(":pt", $user->getPt());
            $add_student_query->bindValue(":email", $user->getEmail());
            $add_student_query->bindValue(":paswd", $user->getPassword());
            $add_student_query->bindValue(":ha", $user->getHomeAddress());
            $add_student_query->bindValue(":cp", $user->getCellPhone());
            $add_student_query->bindValue(":grp", $user->getGroup());
            
						$result = $add_student_query->execute();
						
						if ($result) {
              return $this->dbc()->commit();
						} else {			
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
              echo "<pre>";
              print_r($user);
              echo "</pre>";
              
              $this->dbc()->beginTransaction();
              
              $add_parent_query = $this->dbc()->prepare("call addParent(:sn, :fn, :pt, :email, :paswd, :age, :education, :wp, :post, :hp, :cp)");
              
              $add_parent_query->bindValue(":sn", $user->getSn());
              $add_parent_query->bindValue(":fn", $user->getFn());
              $add_parent_query->bindValue(":pt", $user->getPt());
              $add_parent_query->bindValue(":email", $user->getEmail());
              $add_parent_query->bindValue(":paswd", $user->getPassword());
              $add_parent_query->bindValue(":age", $user->getAge());
              $add_parent_query->bindValue(":education", $user->getEducation());
              $add_parent_query->bindValue(":wp", $user->getWorkPlace());
              $add_parent_query->bindValue(":post", $user->getPost());
              $add_parent_query->bindValue(":hp", $user->getHomePhone());
              $add_parent_query->bindValue(":cp", $user->getCellPhone());
							
							if ($add_parent_query->execute()) {
                
                $childs = $user->getChilds();
                
                if (!empty($childs)) {
                  
                  $result = true;
                  for ($i = 0; $i < count($childs); $i++) {
                    $result *= $this->setChild($user->getEmail(), $childs[$i], 6);                    
                  }
                  
                  if ($result) {
                    return $this->dbc()->commit();
                  } else {
                    $this->dbc()->rollBack();
                    return false;
                  }
                  
                } else {                  
                  return $this->dbc()->commit();
                }
                
							} else {
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
        default:
        {
          $add_admin_query = $this->dbc()->prepare("call addAdmin(:sn, :fn, :pt, :email, :passwd)");
          
          $add_admin_query->bindValue(":sn", $user->getSn());
          $add_admin_query->bindValue(":fn", $user->getFn());
          $add_admin_query->bindValue(":pt", $user->getPt());
          $add_admin_query->bindValue(":email", $user->getEmail());
          $add_admin_query->bindValue(":passwd", $user->getPassword());
          
          return $add_admin_query->execute();
        } break;
      }
      
    }
    
    /*!
      \brief Производит аутентификацию пользователя
      \param[in] $email    - Электронная почта пользователя
      \param[in] $passwd - Пароль
      \return FALSE - пользователь не существует, объект класса User - пользователь существует
    */
    
    public function authentification(string $email, string $passwd)
    {
      $user = $this->query("call authentification(:email, :passwd)", [":email" => $email, ":passwd" => $passwd])[0];
      
      switch($user['id_type_user'])
      {
        case USER_TYPE_TEACHER:
        {
          $teacher = $this->query("call getTeacherInfo(:email)", [":email" => $user['email']])[0];
          
          if (!empty($teacher)) {
            
            $teacher = new Teacher(
              new User(
                $teacher['sn'],
                $teacher['fn'],
                $teacher['pt'],
                $teacher['email'],
                $teacher['paswd'],
                (int)$teacher['type_user']
              ),
              $teacher['info']
            );
            
            return $teacher;
            
          } else {
            return false;
          }
          
        } break;
        case USER_TYPE_STUDENT:
        {
          $student = $this->query("call getStudentInfo(:email)", [":email" => $user['email']])[0];

          if (!empty($student)) {
            
            $spec = new Specialty($student['spec_code'], $student['spec_descp'], "none");
            $spec->setSpecialtyID((int)$student['spec_id']);
            
            $group = new Group($student['grp'], $spec, $student['edu_year'], (int)$student['is_budget']);
            $group->setGroupID((int)$student['grp_id']);
            
            $s = new Student(
              new User(
                $student['sn'],
                $student['fn'],
                $student['pt'],
                $student['email'],
                $student['paswd'],
                (int)$student['type_user']
              ),
              $student['home_address'],
              $student['cell_phone'],
              $group
            );
            
            return $s;
          } else {
            return false;
          }
         
        } break;
        case USER_TYPE_PARENT:
        {
          $parent = $this->query("call getParentInfo(:email)", [":email" => $user['email']])[0];
          
          if (!empty($parent)) {
            
            $db_childs = $this->query("call getChilds(:email)", [":email" => $parent['email']]);
            
            $childs = array();
            foreach ($db_childs as $db_child) {
              $childs[] = $this->authentification($db_child["email"], $db_child["passwd"]);
            }
            
            $p = new Parent_(
              new User(
                $parent['sn'],
                $parent['fn'],
                $parent['pt'],
                $parent['email'],
                $parent['paswd'],
                (int)$parent['type_user']
              ),
              (int)$parent['age'],
              $parent['education'],
              $parent['work_place'],
              $parent['post'],
              $parent['home_phone'],
              $parent['cell_phone']
            );
            
            $p->setChilds($childs);
            
            return $p;
          } else {
            return false;
          }
          
        } break;
        case USER_TYPE_ELDER:
        {
          $elder = $this->query("call getElderInfo(:email)", [":email" => $user['email']])[0];

          if (!empty($elder)) {
            
            $spec = new Specialty($elder['spec_code'], $elder['spec_descp'], "none");
            $spec->setSpecialtyID((int)$elder['spec_id']);
            
            $group = new Group($elder['grp'], $spec, $elder['edu_year'], (int)$elder['is_budget']);
            $group->setGroupID((int)$elder['grp_id']);
            
            $s = new Student(
              new User(
                $elder['sn'],
                $elder['fn'],
                $elder['pt'],
                $elder['email'],
                $elder['paswd'],
                (int)$elder['type_user']
              ),
              $elder['home_address'],
              $elder['cell_phone'],
              $group
            );
            
            return $s;
          } else {
            return false;
          }
        } break;
        default:
        {
          return false;
        } break;
      }
    }
    
    /*!
      \brief Производит аутентификацию администратора
      \param[in] $email    - Электронная почта администратора
      \param[in] $passwd - Пароль
      \return FALSE - пользователь не существует, объект класса User - пользователь существует
    */
    
    public function authentificationAdmin(string $email, string $passwd)
    {
      $admin = $this->query("call authentificationAdmin(:email, :passwd)", [":email" => $email, ":passwd" => $passwd])[0];
      
      if (!empty($admin)) {
        $a = new User(
          $admin['sn'],
          $admin['fn'],
          $admin['pt'],
          $admin['email'],
          $admin['passwd'],
          (int)$admin['type_user']
        );
        
        return $a;
      } else {
        return false;
      }
      
    }
    
    /*!
      \brief Возвращает всех администраторов
      \return Администраторы
      \note Массив с объектами класса User
    */
    
    public function getAllAdmins() : array
    {
      $db_admins = $this->query("call getAllAdmins()");
      
      $admins = array();
      foreach ($db_admins as $db_admin) {
        $admins[] = new User(
          $db_admin['sn'],
          $db_admin['fn'],
          $db_admin['pt'],
          $db_admin['email'],
          $db_admin['passwd'],
          1
        );
      }
      
      return $admins;
    }
    
    /*!
      \brief Возвращает всех пользователей
      \return Пользователи
      \note Массив с объектами класса User
    */
    
    public function getAllUsers() : array
    {
      $db_admins = $this->query("call getAllUsers()");
      
      $admins = array();
      foreach ($db_admins as $db_admin) {
        $admins[] = new User(
          $db_admin['sn'],
          $db_admin['fn'],
          $db_admin['pt'],
          $db_admin['email'],
          $db_admin['paswd'],
          1
        );
      }
      
      return $admins;
    }
    
    /*!
      \brief Возвращает всех студентов
      \return Студенты
      \note Массив с объектами класса Student
    */
    
    public function getAllStudents() : array
    {
      $db_students = $this->query("call getAllStudents()");
      
      $students = array();
      foreach ($db_students as $db_student) {
        $spec = new Specialty($db_student['spec_code'], $db_student['spec_descp'], "none");
        $spec->setSpecialtyID((int)$db_student['spec_id']);
        
        $group = new Group($db_student['grp'], $spec, $db_student['edu_year'], (int)$db_student['is_budget']);
        $group->setGroupID((int)$db_student['grp_id']);
        
        $students[] = new Student(
          new User(
            $db_student['sn'],
            $db_student['fn'],
            $db_student['pt'],
            $db_student['email'],
            $db_student['paswd'],
            (int)$db_student['type_user']
          ),
          $db_student['home_address'],
          $db_student['cell_phone'],
          $group
        );
      }
      
      return $students;
    }
    
    /*!
      \brief Возвращает всех преподавателей
      \return Преподаватели
      \note Массив с объектами класса Teacher
    */
    
    public function getAllTeachers() : array
    {
      $db_teachers = $this->query("call getAllTeachers()");
      
      $teachers = array();
      foreach ($db_teachers as $db_teacher) {
        
        $db_subjects = $this->query("call getSubjects(:teacher_email)", [ ":teacher_email" => $db_teacher['email']]);

        $subjects = array();
        foreach ($db_subjects as $subject) {
          $subjects[] = new Subject($subject['description']);
        }

        $teacher = new Teacher(
          new User(
            $db_teacher['sn'],
            $db_teacher['fn'],
            $db_teacher['pt'],
            $db_teacher['email'],
            $db_teacher['paswd'],
            (int)$db_teacher['type_user']
          ),
          $db_teacher['info']
        );
        
        $teacher->setSubjects($subjects);
        $teachers[] = $teacher;
      }
      
      return $teachers;
    }
    
    /*!
      \brief Возвращает всех родителей
      \return Родители
      \note Массив с объектами класса Parent_
    */
    
    public function getAllParents() : array
    {
      $db_parents = $this->query("call getAllParents()");
      
      $parents = array();
      foreach ($db_parents as $db_parent) {
        
        $db_childs = $this->query("call getChilds(:email)", [":email" => $db_parent['email']]);
        
        $childs = array();
        
        foreach ($db_childs as $db_child) {
          $childs[] = $this->authentification($db_child['email'], $db_child['passwd']);
        }
        
        $p = new Parent_(
          new User(
            $db_parent['sn'],
            $db_parent['fn'],
            $db_parent['pt'],
            $db_parent['email'],
            $db_parent['paswd'],
            (int)$db_parent['type_user']
          ),
          (int)$db_parent['age'],
          $db_parent['education'],
          $db_parent['work_place'],
          $db_parent['post'],
          $db_parent['home_phone'],
          $db_parent['cell_phone']
        );
        
        $p->setChilds($childs);
        
        $parents[] = $p;
      }
      
      return $parents;
    }
    
    /*!
      \brief Возвращает всех старост
      \return Старосты
      \note Массив с объектами класса Student
    */
    
    public function getAllElders()
    {
      $db_students = $this->query("call getAllElders()");
      
      $students = array();
      foreach ($db_students as $db_student) {
        $spec = new Specialty($db_student['spec_code'], $db_student['spec_descp'], "none");
        $spec->setSpecialtyID((int)$db_student['spec_id']);
        
        $group = new Group($db_student['grp'], $spec, $db_student['edu_year'], (int)$db_student['is_budget']);
        $group->setGroupID((int)$db_student['grp_id']);
        
        $students[] = new Student(
          new User(
            $db_student['sn'],
            $db_student['fn'],
            $db_student['pt'],
            $db_student['email'],
            $db_student['paswd'],
            (int)$db_student['type_user']
          ),
          $db_student['home_address'],
          $db_student['cell_phone'],
          $group
        );
      }
      
      return $students;
    }
    
    /*!
      \brief Возвращает всех студентов и старост
      \return Студенты и старосты
      \note Массив с объектами класса Student
    */
    
    public function getAllStudentsElders()
    {
      $db_students = $this->query("call getAllStudentsElders()");
      
      $students = array();
      foreach ($db_students as $db_student) {
        $spec = new Specialty($db_student['spec_code'], $db_student['spec_descp'], "none");
        $spec->setSpecialtyID((int)$db_student['spec_id']);
        
        $group = new Group($db_student['grp'], $spec, $db_student['edu_year'], (int)$db_student['is_budget']);
        $group->setGroupID((int)$db_student['grp_id']);
        
        $students[] = new Student(
          new User(
            $db_student['sn'],
            $db_student['fn'],
            $db_student['pt'],
            $db_student['email'],
            $db_student['paswd'],
            (int)$db_student['type_user']
          ),
          $db_student['home_address'],
          $db_student['cell_phone'],
          $group
        );
      }
      
      return $students;
    }

    /*!
      \brief
      \return
    */

    public function getSoGroups(int $group_id) : array
    {
      $sogroups = $this->query("SELECT * FROM `v_Students`", [":grp" => $group_id]);
      $elder = $this->query("SELECT * FROM `v_Elders` WHERE `grp`=:grp", [":grp" => $group_id])[0];
      
      if (!empty($elder)) {
        $sogroups[] = $elder;
      }

      return $sogroups;
    }
    
    /*!
      \brief Назначает старосту
      \param[in] $student_email - Электронная почта студента
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function grantElder(string $student_email) : bool
    {
      $grant_elder_query = $this->dbc()->prepare("call grantElder(:email)");
      
      $grant_elder_query->bindValue(":email", $student_email);
      
      return $grant_elder_query->execute();
    }
    
    /*!
      \brief Разжаловает старосту
      \param[in] $student_email - Электронная почта студента
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function revokeElder(string $student_email) : bool
    {
      $revoke_elder_query = $this->dbc()->prepare("call revokeElder(:email)");
      
      $revoke_elder_query->bindValue(":email", $student_email);
      
      return $revoke_elder_query->execute();
    }
    
    /*!
      \brief Назначает детей родителю
      \param[in] $parent_email  - Электронная почта родителя
      \param[in] $student_email - Электронная почта студента
      \param[in] $relation      - Тип отношения
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function setChild(string $parent_email, string $student_email, int $relation)
    {
      $set_child_query = $this->dbc()->prepare("call setChild(:p_email, :s_email, :relation)");
      
      $set_child_query->bindValue(":p_email", $parent_email);
      $set_child_query->bindValue(":s_email", $student_email);
      $set_child_query->bindValue(":relation", $relation);
      
      return $set_child_query->execute();
    }
    
    /*!
      \brief Убирает детей от родителя
      \param[in] $parent_email  - Электронная почта родителя
      \param[in] $student_email - Электронная почта студента
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function unsetChild(string $parent_email, string $student_email) : bool
    {
      $unset_child_query = $this->dbc()->prepare("call unsetChild(:p_email, :s_email)");
      
      $unset_child_query->bindValue(":p_email", $parent_email);
      $unset_child_query->bindValue(":s_email", $student_email);
      
      return $unset_child_query->execute();
    }
    
    /*!
      \brief Назначает предмет преподавателю
      \param[in] $teacher_email  - Электронная почта родителя
      \param[in] $subject_id    - Идентификатор предмета
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function setSubject(string $teacher_email, int $subject_id) : bool
    {
      $set_subject_query = $this->dbc()->prepare("call setSubject(:t_email, :subject_id)");
      
      $set_subject_query->bindValue(":t_email", $teacher_email);
      $set_subject_query->bindValue(":subject_id", $subject_id);
      
      return $set_subject_query->execute();
    }
    
    /*!
      \brief Убирает предмет у преподавателя
      \param[in] $teacher_email  - Электронная почта родителя
      \param[in] $subject_id    - Идентификатор предмета
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function unsetSubject(string $teacher_email, int $subject_id) : bool
    {
      $unset_subject_query = $this->dbc()->prepare("call unsetSubject(:t_email, :subject_id)");
      
      $unset_subject_query->bindValue(":t_email", $teacher_email);
      $unset_subject_query->bindValue(":subject_id", $subject_id);
      
      return $unset_subject_query->execute();
    }
    
    /*!
      \brief Изменяет пароль пользователя
      \param[in] $user_email - Электронная почта пользователя
      \param[in] $old_passwd - Старый пароль
      \param[in] $new_passwd - Новый пароль
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function changeUserPassword(string $user_email, string $old_passwd, string $new_passwd) : bool
    {
      $change_passwod_query = $this->dbc()->prepare("call changeUserPassword(:email, :old_passwd, :new_passwd)");
      
      $change_passwod_query->bindValue(":email", $user_email);
      $change_passwod_query->bindValue(":old_passwd", $old_passwd);
      $change_passwod_query->bindValue(":new_passwd", $new_passwd);
      
      return $change_passwod_query->execute();
    }
    
    /*!
      \brief Удаляет пользователя
      \param[in] $user_email - почта пользователя
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function remove($user_email) : bool
    {
      $remove_user_query = $this->dbc()->prepare("call removeUser(:email)");
      
      $remove_user_query->bindValue(":email", $user_email);
      
      return $remove_user_query->execute();
    }
    
    /*!
      \brief Удаляет администратора
      \param[in] $admin_email - почта пользователя
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function removeAdmin(string $admin_email) : bool
    {
      $remove_admin_query = $this->dbc()->prepare("call removeAdmin(:email)");
      
      $remove_admin_query->bindValue(":email", $admin_email);
      
      return $remove_admin_query->execute();
    }
    
  }

?>
