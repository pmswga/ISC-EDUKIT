<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/subject.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\Subject;
  
  /*!
    
    \class SubjectManager sbm.class.php "iep/managers/sbm.class.php"
    \extends IEP
    \brief Менеджер для управления предметами
    \author pmswga
    \version 1.0
    
    Задачи менеджера:
      1. 
    
  */
  
  class SubjectManager extends IEP
  {
    
    /*!
      \brief Добавление нового предмета
      \param[in] $subject - Предмет
      \note Объект класса Subject
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function add($subject)
    {
      $add_subject_query = $this->dbc()->prepare("call addSubject(:descp)");
      
      $add_subject_query->bindValue(":descp", $subject->getDescription());
      
      return $add_subject_query->execute();
    }
    
    /*!
      \brief Возвращает предметы, которые ведёт преподаватель
      \param[in] $teacher_email - Электронная почта преподавателя
      \return Предметы
      \note Массив с объектами класса Subject
    */
    
    public function getSubjects(string $teacher_email)
    {
      $db_subjects = $this->query("call getSubjects(:t_email)", [":t_email" => $teacher_email]);
      
      $subjects = array();
      foreach ($db_subjects as $db_subject) {
        $subject = new Subject($db_subject['description']);
        $subject->setSubjectID((int)$db_subject['id_subject']);
        
        $subjects[] = $subject;
      }
      
      return $subjects;
    }
    
    /*!
      \brief Возвращает все предметы
      \return Предметы
      \note Массив с объектами класса Subject
    */
    
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
    
    /*!
      \brief Назначает предмет преподавателю
      \param[in] $teacher_email - Электронная почта преподавателя
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
      \brief Снимает предмет с преподавателя
      \param[in] $teacher_email - Электронная почта преподавателя
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
      \brief Возвращает все неназначенные предметы на преподавателя
      \param[in] $teacher_email - Электронная почта преподавателя
      \return Предметы
      \note Массив с объектами класса Subject
    */
    
    public function getUnsetSubjects(string $teacher_email) : array
    {
      $db_unset_subjects = $this->query("call getUnsetSubjects(:t_email)", [":t_email" => $teacher_email]);
      
      $unset_subjects = array();
      foreach ($db_unset_subjects as $db_unset_subject) {
        $subject = new Subject($db_unset_subject['description']);
        $subject->setSubjectID((int)$db_unset_subject['id_subject']);
        
        $unset_subjects[] = $subject;
      }
      
      return $unset_subjects;
    }
    
    /*!
      \brief Изменяет название предмета
      \param[in] $subject_id - Идентификатор предмета
      \param[in] $new_descp  - Новое название предмета
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function changeDescriptionSubject(int $subject_id, string $new_descp) : bool
    {
      $change_subject_query = $this->dbc()->prepare("call changeDescriptionSubject(:subject_id, :new_descp)");
      
      $change_subject_query->bindValue(":subject_id", $subject_id);
      $change_subject_query->bindValue(":new_descp", $new_descp);
      
      return $change_subject_query->execute(); 
    }
    
    /*!
      \brief Удаляет предмет
      \param[in] $subject_id - Идентификатор предмета
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function remove($subject_id) : bool
    {
      $remove_subject_query = $this->dbc()->prepare("call removeSubject(:subject_id)");
      
      $remove_subject_query->bindValue(":subject_id", $subject_id);
      
      return $remove_subject_query->execute();
    }
    
  }
  
?>
