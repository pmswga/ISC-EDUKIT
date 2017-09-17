<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  require_once "student.class.php";
  
  use IEP\Structures\Student;
  
  /*!
  
    \class StudentAnswer studentanswer.class.php "iep/structures/studentanswer.class.php"
    \brief Класс описывает сущность - ответы студента на тест, которые отправятся на запись в бд
    \author pmswga
    \version 1.0
  
  */
  
  class StudentAnswer
  {
    private $student;          ///< Студент
    private $answers;          ///< Ответы
    private $subject;          ///< Предмет
    private $caption;          ///< Заголовок теста
    private $date;             ///< Дата сдачи
    private $mark;             ///< Оценка
    
    /*!
      \param[in] $student  - Студент, который проходил тест
      \param[in] $subject  - Предмет
      \param[in] $caption  - Заголовок теста
      \param[in] $answers  - Ответы
      \param[in] $date     - Дата сдачи
      \param[in] $mark     - Оценка
    */
    
    function __construct($student, string $subject, string $caption, array $answers, string $date, int $mark)
    {
      $this->student = $student;
      $this->subject = $subject;
      $this->caption = $caption;
      $this->answers = $answers;
      $this->date = $date;
      $this->mark = $mark;
    }
    
    /*!
      \brief Возвращает студента
      \return Студент
      \note Объект класса Student
    */
    
    public function getStudent()
    {
      return $this->student;
    }
    
    /*!
      \brief Возвращает предмет теста
      \return Предмет
    */
    
    public function getSubject() : string
    {
      return $this->subject;
    }
    
    /*!
      \brief Возвращает заголовок теста
      \return Заголовок теста
    */
    
    public function getCaption() : string
    {
      return $this->caption;
    }
    
    /*!
      \brief Возвращает ответы студента
      \return Ответы
    */
    
    public function getAnswers() : array
    {
      return $this->answers;
    }
    
    /*!
      \brief Возвращает дату сдачи теста
      \return Дата сдачи теста
    */
    
    public function getPassDate() : string
    {
      return $this->date;
    }
    
    /*!
      \brief Возвращает оценку за тест
      \return Оценка за тест
    */
    
    public function getMark() : int
    {
      return $this->mark;
    }
    
  }

?>
