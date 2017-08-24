<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  /*!
    
    \class StudentTest studenttest.class.php "iep/structures/studenttest.class.php"
    \brief Класс описывающий сущность результатов теста
    \author pmswga
    \version 1.0
    
  */
   
  class StudentTest
  {
    private $id_test;
    private $test_author;
    private $student;
    private $caption;
    private $subject;
    private $date_pass;
    private $mark;
    private $answers;
    
    /*!
      \param[in] $student   - Email студента
      \param[in] $caption   - Название теста
      \param[in] $subject   - Предмет
      \param[in] $date_pass - Дата сдачи
      \param[in] $mark      - Оценка
    */
    
    function __construct(string $student, string $caption, string $subject, string $date_pass, int $mark)
    {
      $this->student = $student;
      $this->caption = $caption;
      $this->subject = $subject;
      $this->date_pass = $date_pass;
      $this->mark = $mark;
      $this->answers = array();
      $this->id_test = 0;
    }
    
    /*!
      \param[in] $id - Идентификатор пройденного теста
    */
    
    public function setTestID(int $id)
    {
      $this->id_test = $id;
    }
    
    /*!
      \return Идентификатор пройденного теста
    */
    
    public function getTestID() : int
    {
      return $this->id_test;
    }

    /*!
      \param[in] $test_author - Автор теста
      \note Формат "Фамилия И.О."
    */
    
    public function setTestAuthor(string $test_author)
    {
      $this->test_author = $test_author;
    }
    
    /*!
      \return Автора теста
      \note Формат "Фамилия И.О."
    */
    
    public function getTestAuthor() : string
    {
      return $this->test_author;
    }
    
    /*!
      \return Email студента
    */
    
    public function getStudent() : string
    {
      return $this->student;
    }
    
    /*!
      \return Название теста
    */
    
    public function getCaption() : string
    {
      return $this->caption;
    }
    
    /*!
      \return Предмет
    */
    
    public function getSubject() : string
    {
      return $this->subject;
    }
    
    /*!
      \return Дату сдачи теста
    */
    
    public function getDatePass() : string
    {
      return $this->date_pass;
    }
    
    /*!
      \return Оценку за тест
    */
    
    public function getMark() : int
    {
      return $this->mark;
    }
    
    /*!
      \param[in] $answers - массив с ответами
      \note Формат массива [[question, answer], [question, answer], ...]
    */
    
    public function setAnswers(array $answers)
    {
      $this->answers = $answers;
    }
    
    /*!
      \return Массив с ответами
      \note Формат массива [[question, answer], [question, answer], ...]
    */
    
    public function getAnswers() : array
    {
      return $this->answers;
    }
    
  }
  
?>
