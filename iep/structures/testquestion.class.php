<?php
  declare(strict_types = 1);
	namespace IEP\Structures;
	
  /*!
    
    \class TestQuestion testquestion.class.php "iep/structures/testquestion.php"
    \brief Класс описывает вопрос к тесту
    \author pmswga
    \version 1.0
    
  */
  
	class TestQuestion
	{
		private $id;        ///< Идентификатор вопроса
		private $question;  ///< Вопрос
    
    /*!
      \var $answers
      \brief Ответы
      \note Представляет собой ассоциативный массив в формате
      \code
        $answers = array(
          [0] => array(
            "id_answer" => ,
            "answer"    => 
          ),
          ...
        );
      \endcode
    */
    
		private $answers;
		private $r_answer;  ///< Правильный ответ
		
    /*!
      \param[in] $question - Вопрос
      \param[in] $r_answer - Правильный ответ
      \param[in] $answers  - Ответы
      \note См. формат свойства $this->answers
    */
    
		function __construct(string $question, string $r_answer, array $answers = array())
		{
      $this->id = 0;
			$this->question = $question;
			$this->r_answer = $r_answer;
			$this->answers = $answers;
		}
		
    /*!
      \brief Задаёт идентификатор вопроса
      \param[in] $id - Идентификатор вопроса
    */
    
		public function setQuestionID(int $id)
		{
			$this->id = $id;
		}
    
    /*!
      \brief Возвращает идентификатор вопроса
      \return Идентификатор вопроса
    */
		
		public function getQuestionID() : int
		{
			return $this->id;
		}
    
    /*!
      \brief Возвращает вопрос
      \return Вопрос
    */
		
		public function getQuestion() : string
		{
			return $this->question;
		}
    
    /*!
      \brief Задаёт ответы на вопрос
      \return Ответы
      \note Ассоциативный массив
    */
    
    public function setAnswers(array $answers)
    {
      $this->answers = $answers;
    }
    
    /*!
      \brief Возвращает все ответы на вопрос
      \return Ответы на вопрос
      \note Ассоциативный массив
    */
		
		public function getAnswers() : array
		{
      return $this->answers;
		}
		
    /*!
      \brief Возвращает правильный ответ на вопрос
      \return Правильный ответ
    */
    
		public function getRAnswer() : string
		{
			return $this->r_answer;
		}
    
	}
	
?>
