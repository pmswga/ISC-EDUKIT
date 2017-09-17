<?php
  declare(strict_types = 1);
  namespace IEP\Structures;
  
  /*!
    
    \class StudentTest studenttest.class.php "iep/structures/studenttest.class.php"
    \brief Класс описывающий сущность результатов теста, которые будут отображаться в личном кабинете
    \author pmswga
    \version 1.0
    
  */
   
  class StudentTest
  {
    private $id_test;         ///< Идентификатор теста
    private $test_author;     ///< Автор теста
    private $student;         ///< Студент, который проходит тест
    private $caption;         ///< Заголовок теста
    private $subject;         ///< Предмет
    private $date_pass;       ///< Дата сдачи
    private $mark;            ///< Оценка
    private $answers;         ///< Ответы
    
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
      \brief Задаёт идентификатор теста
      \param[in] $id - Идентификатор пройденного теста
    */
    
    public function setTestID(int $id)
    {
      $this->id_test = $id;
    }
    
    /*!
      \brief Возвращает идентификатор теста
      \return Идентификатор пройденного теста
    */
    
    public function getTestID() : int
    {
      return $this->id_test;
    }

    /*!
      \brief Задаёт автора теста
      \param[in] $test_author - Автор теста
      \note Формат "Фамилия И.О."
    */
    
    public function setTestAuthor(string $test_author)
    {
      $this->test_author = $test_author;
    }
    
    /*!
      \brief Возвращает автора теста
      \return Автора теста
      \note Формат "Фамилия И.О."
    */
    
    public function getTestAuthor() : string
    {
      return $this->test_author;
    }
    
    /*!
      \brief Возвращает электронную почту студента, который прошёл тест
      \return Email студента
    */
    
    public function getStudent() : string
    {
      return $this->student;
    }
    
    /*!
      \brief Возвращает название теста
      \return Название теста
    */
    
    public function getCaption() : string
    {
      return $this->caption;
    }
    
    /*!
      \brief Возвращает предмет студента
      \return Предмет
    */
    
    public function getSubject() : string
    {
      return $this->subject;
    }
    
    /*!
      \brief Возвращает дату сдачи теста
      \return Дату сдачи теста
    */
    
    public function getDatePass() : string
    {
      return $this->date_pass;
    }
    
    /*!
      \brief Возвращает оценку за тест
      \return Оценку за тест
    */
    
    public function getMark() : int
    {
      return $this->mark;
    }
    
    /*!
      \brief Задаёт ответы студента
      \param[in] $answers - массив с ответами
      \note Формат массива [[question, answer], [question, answer], ...]
    */
    
    public function setAnswers(array $answers)
    {
      $this->answers = $answers;
    }
    
    /*!
      \brief Возвращает ответы студента
      \return Массив с ответами
      \note Формат массива [[question, answer], [question, answer], ...]
    */
    
    public function getAnswers() : array
    {
      return $this->answers;
    }
    
  }
  
?>
