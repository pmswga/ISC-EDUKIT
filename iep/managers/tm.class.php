<?php
  declare(strict_types = 1);
  namespace IEP\Managers;
  
  require_once "iep.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/test.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/testquestion.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/studentanswer.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/subject.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/group.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/studenttest.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/studentresult.class.php";
  require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/student.class.php";
  
  use IEP\Managers\IEP;
  use IEP\Structures\Subject;
  use IEP\Structures\Specialty;
  use IEP\Structures\Group;
  use IEP\Structures\Test;
  use IEP\Structures\TestQuestion;
  use IEP\Structures\StudentAnswer;
  use IEP\Structures\StudentTest;
  use IEP\Structures\StudentResult;
  use IEP\Structures\Student;
  use IEP\Structures\User;

  /*!
    \class TestManager tm.class.php "iep/managers/tm.class.php"
    \extends IEP
    \brief Менеджер для работы с тестами
    \author pmswga
    \version 1.0
    
  */
  
  class TestManager extends IEP
  {
    
    /*!
      \brief Добавляет новый тест
      \param[in] $test - Тест
      \note Объект класса Test
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function add($test)
    {
      try
			{ //< Блокировка таблиц !!!
				$this->dbc()->beginTransaction();
				
				$test_add_query = $this->dbc()->prepare("call addTest(:emailTeacher, :subject, :caption)");
				
				$test_add_query->bindValue(":subject", $test->getSubject());
				$test_add_query->bindValue(":emailTeacher", $test->getAuthor());
				$test_add_query->bindValue(":caption", $test->getCaption());
				
				if ($test_add_query->execute()) {
          
          $for_groups = $test->getGroups();
          
					if (!empty($for_groups)) {
            
						$last_id = $this->query("SELECT LAST_INSERT_ID() as last_id FROM `tests`");
						$last_id = $last_id[0]['last_id'];
						
						$result = true;
						for ($i = 0; $i < count($for_groups); $i++) {
              $result *= $this->setGroup((int)$last_id, (int)$for_groups[$i]);
						}
						
						if ($result) {
							return $this->dbc()->commit();
						}
						else {
							$this->dbc()->rollBack();
							return false;
						}
						
					} else {
						return $this->dbc()->commit();
					}
					
				}
				else {
					$this->dbc()->rollBack();
					return false;
				}
				
			}
			catch(PDOException $e)
			{
				$this->dbc()->rollBack();
				return false;
			}
    }
    
    /*!
      \brief Возвращает все тесты доступные группе
      \param[in] $grp - Идентификатор группы
      \return Тесты
      \note Массив с объектами класса Test
    */
    
    public function getTestsForGroup(int $grp) : array
    {
      $db_tests = $this->query("call getTestsForGroup(:grp)", [":grp" => $grp]);
      
      $tests = array();
      foreach ($db_tests as $db_test) {
        
        $subject = new Subject($db_test['subject_caption']);
        $subject->setSubjectID((int)$db_test['subject_id']);
        
        $db_questions = $this->query("call getQuestions(:test_id)", [":test_id" => $db_test['id_test']]);
        
        $questions = array();
        foreach ($db_questions as $db_question) {
          
          $db_answers = $this->query("call getAnswers(:question_id)", [":question_id" => $db_question['id_question']]);
          
          $answers = array();
          foreach ($db_answers as $db_answer) {
            $answers[] = array(
              "id" => $db_answer['id_answer'],
              "answer" => $db_answer['answer']
            );
          }
          
          $question = new TestQuestion($db_question['question'], $db_question['r_answer']);
          $question->setQuestionID((int)$db_question['id_question']);
          $question->setAnswers($answers);
          
          $questions[] = $question;
        }
        
        $test = new Test($db_test['caption'], $subject, $db_test['author']);
        $test->setTestID((int)$db_test['id_test']);
        $test->setQuestions($questions);
        
        $tests[] = $test;
      }
      
      return $tests;
    }
    
    /*!
      \brief Возвращает тест по его идентификатору
      \param[in] $test_id - Идентификатор теста
      \return Тест
      \note Объект класса Test
    */
    
    public function getTest(int $test_id) : Test
    {
      $db_test = $this->query("call getTest(:test_id)", [":test_id" => $test_id])[0];
      
      $subject = new Subject($db_test['subject_caption']);
      $subject->setSubjectID((int)$db_test['subject_id']);
      
      $db_questions = $this->query("call getQuestions(:test_id)", [":test_id" => $db_test['id_test']]);
        
      $questions = array();
      foreach ($db_questions as $db_question) {
        
        $db_answers = $this->query("call getAnswers(:question_id)", [":question_id" => $db_question['id_question']]);
        
        $answers = array();
        foreach ($db_answers as $db_answer) {
          $answers[] = array(
            "id" => $db_answer['id_answer'],
            "answer" => $db_answer['answer']
          );
        }
        
        $question = new TestQuestion($db_question['question'], $db_question['r_answer']);
        $question->setQuestionID((int)$db_question['id_question']);
        $question->setAnswers($answers);
        
        $questions[] = $question;
      }
      
      $test = new Test($db_test['caption'], $subject, $db_test['author']);
      $test->setQuestions($questions);
      
      return $test;
    }
    
    /*!
      \brief Возвращает все тесты, созданные преподавателем
      \param[in] $teacher_email - Электронная почта преподавателя
      \return Тесты
      \note Массив с объектами класса Test
    */
    
    public function getTests(string $teacher_email) : array
    {
      $db_tests = $this->query("call getTests(:t_email)", [":t_email" => $teacher_email]);
      
      $tests = array();
      foreach ($db_tests as $db_test) {
        
        $subject = new Subject($db_test['subject_caption']);
        $subject->setSubjectID((int)$db_test['subject_id']);
        
        $db_groups = $this->query("call getTestGroups(:test_id)", [":test_id" => $db_test['id_test']]);
        
        $groups = array();
        foreach ($db_groups as $db_group) {
          
          $spec = new Specialty($db_group['spec_code'], $db_group['spec_descp']);
          $spec->setSpecialtyID((int)$db_group['spec_id']);
          
          $group = new Group(
            $db_group['grp_descp'],
            $spec,
            $db_group['grp_edu_year'],
            (int)$db_group['grp_payment']
          );
          
          $groups[] = $group;
        }
        
        $db_questions = $this->query("call getQuestions(:test_id)", [":test_id" => $db_test['id_test']]);
        
        $questions = array();
        foreach ($db_questions as $db_question) {
          
          $db_answers = $this->query("call getAnswers(:question_id)", [":question_id" => $db_question['id_question']]);
          
          $answers = array();
          foreach ($db_answers as $db_answer) {
            $answers[] = array(
              "id" => $db_answer['id_answer'],
              "answer" => $db_answer['answer']
            );
          }
          
          $question = new TestQuestion($db_question['question'], $db_question['r_answer']);
          $question->setQuestionID((int)$db_question['id_question']);
          $question->setAnswers($answers);
          
          $questions[] = $question;
        }
        
        $test = new Test($db_test['caption'], $subject, $db_test['author'], $groups);
        $test->setTestID((int)$db_test['id_test']);
        $test->setQuestions($questions);
        
        $tests[] = $test;
      }
      
      return $tests;
    }
    
    /*!
      \brief Возвращает все созданные тесты
      \return Тесты
      \note Массив с объектами класса Test
    */
    
    public function getAllTests() : array
    {
      $db_tests = $this->query("call getAllTests()");
      
      $tests = array();
      foreach ($db_tests as $db_test) {
        
        $subject = new Subject($db_test['subject_caption']);
        $subject->setSubjectID((int)$db_test['subject_id']);
        
        $db_groups = $this->query("call getTestGroups(:test_id)", [":test_id" => $db_test['id_test']]);
        
        $groups = array();
        foreach ($db_groups as $db_group) {
          
          $spec = new Specialty($db_group['code_spec'], $db_group['spec_descp']);
          $spec->setSpecialtyID((int)$db_group['id_spec']);
          
          $group = new Group(
            $db_group['grp'],
            $spec,
            $db_group['edu_year'],
            (int)$db_group['is_budget']
          );
          
          $groups[] = $group;
        }
        
        $db_questions = $this->query("call getQuestions(:test_id)", [":test_id" => $db_test['id_test']]);
        
        $questions = array();
        foreach ($db_questions as $db_question) {
          
          $db_answers = $this->query("call getAnswers(:question_id)", [":question_id" => $db_question['id_question']]);
          
          $answers = array();
          foreach ($db_answers as $db_answer) {
            $answers[] = array(
              "id" => $db_answer['id_answer'],
              "answer" => $db_answer['answer']
            );
          }
          
          $question = new TestQuestion($db_question['question'], $db_question['r_answer']);
          $question->setQuestionID((int)$db_question['id_question']);
          $question->setAnswers($answers);
          
          $questions[] = $question;
        }
        
        $test = new Test($db_test['caption'], $subject, $db_test['author'], $groups);
        $test->setTestID((int)$db_test['id_test']);
        $test->setQuestions($questions);
        
        $tests[] = $test;
      }
      
      return $tests;
    }
    
    /*!
      \brief Проверяет привязанность группы к тесту
      \param[in] $test_id - Идентификатор теста
      \param[in] $grp_id  - Идентификатор группы
      \return TRUE, FALSE
      \warning Возвращает не bool, а int
    */
    
    public function isGroupForTest(int $test_id, int $grp_id)
    {
      return $this->query("select isGroupForTest(:test_id, :grp) as result", 
        [":test_id" => $test_id, ":grp" => $grp_id]
      )[0]['result'];
    }
    
    /*!
      \brief Добавляет новый вопрос в тест
      \param[in] $test_id  - Идентификатор теста
      \param[in] $question - Вопрос
      \note Объект класса TestQuestion
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function addQuestion(int $test_id, TestQuestion $question)
    {
			try
			{
				$this->dbc()->beginTransaction();
				
				$add_question_query = $this->dbc()->prepare("call addQuestion(:test_id, :question, :r_answer)");
				
				$add_question_query->bindValue(":test_id", $test_id);
				$add_question_query->bindValue(":question", $question->getQuestion());
				$add_question_query->bindValue(":r_answer", $question->getRAnswer());
				
				if (!empty($question->getAnswers())) {			
        
					if ($add_question_query->execute()) {
						
						$last_id = $this->query("SELECT LAST_INSERT_ID() as last_id FROM `tests` WHERE `id_test`=:test_id", [":test_id" => $test_id]);
						$last_id = $last_id[0]['last_id'];
						
						$add_answer_query = $this->dbc()->prepare("call addAnswer(:question_id, :answ)");
						$add_answer_query->bindValue(":question_id", $last_id);
						
						$result = true;
						foreach ($question->getAnswers() as $answer) {
							$add_answer_query->bindValue(":answ", $answer);
							
							$result *= $add_answer_query->execute();
						}
						
						if ($result) {
							return $this->dbc()->commit();
						} else {							
							$this->dbc()->rollBack();
							return false;
						}
						
					} else {
						$this->dbc()->rollBack();
						return false;
					}
				}
				
			}
			catch(PDOException $e)
			{
				$this->dbc()->rollBack();
				return false;
			}
    }
    
    /*!
      \brief Добавляет ответ к вопросу
      \param[in] $question_id - Идентификатор вопроса
      \param[in] $answer      - Ответ
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function addAnswer(int $question_id, string $answer) : bool
    {
      $add_answer_query = $this->dbc()->prepare("call addAnswer(:question_id, :answ)");
      
      $add_answer_query->bindValue(":question_id", $question_id);
      $add_answer_query->bindValue(":answ", $answer);
      
      return $add_answer_query->execute();
    }
    
    /*!
      \brief Возвращает все ответы на вопрос
      \param[in] $question_id - Идентификатор теста
      \return Ответы
      \note Ассоциативнный массив
    */
    
		public function getAnswers(int $question_id)
		{
			$answers_query = $this->dbc()->prepare("call getAnswers(:question_id)");
			
			$answers_query->bindValue(":question_id", $question_id);
			
			return $answers_query->execute();
		}
    
    /*!
      \brief Изменяет заголовок к тесту
      \param[in] $test_id      - Идентификатор теста
      \param[in] $test_caption - Новый заголовок теста
      \return TRUE - успешно, FALSE - ошибка
    */
    
		public function changeCaptionTest(int $test_id, string $test_caption) : bool
		{
			$test_change = $this->dbc()->prepare("call changeCaptionTest(:test_id, :test_caption)");
			
			$test_change->bindValue(":test_id", $test_id);
			$test_change->bindValue(":test_caption", $test_caption);
			
			return $test_change->execute();
		}
    
    /*!
      \brief Изменяет предмет, по которому идёт тестирование
      \param[in] $test_id      - Идентификатор теста
      \param[in] $subject_id - Идентификатор предмета
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function changeSubjectTest(int $test_id, int $subject_id) : bool
		{
			$test_change = $this->dbc()->prepare("call changeSubjectTest(:test_id, :subject_id)");
			
			$test_change->bindValue(":test_id", $test_id);
			$test_change->bindValue(":subject_id", $subject_id);
			
			return $test_change->execute();
		}
    
    /*!
      \brief Изменяет заголовок вопроса
      \param[in] $question_id - Идентификатор теста
      \param[in] $new_caption - Новый заголовок вопроса
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function changeCaptionQuestion(int $question_id, string $new_caption) : bool
		{
			$change_question_query = $this->dbc()->prepare("call changeCaptionQuestion(:question_id, :new_caption)");
			
			$change_question_query->bindValue(":question_id", $question_id);
			$change_question_query->bindValue(":new_caption", $new_caption);
			
			return $change_question_query->execute();
		}
    
    /*!
      \brief Изменяет правильный ответ на вопрос
      \param[in] $question_id - Идентификатор теста
      \param[in] $new_RAnswer - Новый правильный ответ
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function changeRAnswerQuestion(int $question_id, string $new_RAnswer) : bool
		{
			$change_question_query = $this->dbc()->prepare("call changeRAnswerQuestion(:question_id, :new_RAnswer)");
			
			$change_question_query->bindValue(":question_id", $question_id);
			$change_question_query->bindValue(":new_RAnswer", $new_RAnswer);
			
			return $change_question_query->execute();
		}
    
    /*!
      \brief Изменяет ответ на вопрос
      \param[in] $answer_id - Идентификатор ответа
      \param[in] $new_answer  - Новый ответ
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function changeCaptionAnswer(int $answer_id, string $new_answer) : bool
		{
			$change_answer_query = $this->dbc()->prepare("call changeCaptionAnswer(:answer_id, :new_answer)");
			
			$change_answer_query->bindValue(":answer_id", $answer_id);
			$change_answer_query->bindValue(":new_answer", $new_answer);
			
			return $change_answer_query->execute();
		}
    
    /*!
      \brief Назначает группу на тест
      \param[in] $test_id   - Идентификатор теста
      \param[in] $test_grp  - Идентификатор группы
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function setGroup(int $test_id, int $test_grp) : bool
		{
			$set_group_query = $this->dbc()->prepare("call setGroup(:test_id, :test_grp)");
			
			$set_group_query->bindValue(":test_id", $test_id);
			$set_group_query->bindValue(":test_grp", $test_grp);
			
			return $set_group_query->execute();
		}
    
    /*!
      \brief Снимает группу с теста
      \param[in] $test_id   - Идентификатор теста
      \param[in] $test_grp  - Идентификатор группы
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function unsetGroup(int $test_id, int $test_grp) : bool
		{
			$set_group_query = $this->dbc()->prepare("call unsetGroup(:test_id, :test_grp)");
			
			$set_group_query->bindValue(":test_id", $test_id);
			$set_group_query->bindValue(":test_grp", $test_grp);
			
			return $set_group_query->execute();
		}
    
    /*!
      \brief Удаляет вопрос
      \param[in] $question_id - Идентификатор вопроса
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function removeQuestion(int $question_id) : bool
		{
			$remove_question_query = $this->dbc()->prepare("call removeQuestion(:question_id)");
			$remove_question_query->bindValue(":question_id", $question_id);
			
			return $remove_question_query->execute();
		}
    
    /*!
      \brief Удаляет ответ на вопрос
      \param[in] $answer_id - Идентификатор ответа
      \return TRUE - успешно, FALSE - ошибка
    */
		
		public function removeAnswer(int $answer_id) : bool
		{
			$remove_answer_query = $this->dbc()->prepare("call removeAnswer(:answer_id)");
			
			$remove_answer_query->bindValue(":answer_id", $answer_id);
			
			return $remove_answer_query->execute();
		}
    
    /*!
      \brief Записывает результаты прохождения теста
      \param[in] $student_answer - ответы студента
      \note Объект класса StudentAnswer
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function putStudentAnswer(StudentAnswer $student_answer) : bool
    {
      try
      {
        $this->dbc()->beginTransaction();
        
        $add_student_answer_query = $this->dbc()->prepare("call createStudentTest(:test_id, :student_email, :subject, :caption, :mark)");
        
        $add_student_answer_query->bindValue(":test_id", $student_answer->getTestID());
        $add_student_answer_query->bindValue(":student_email", $student_answer->getStudent()->getEmail());
        $add_student_answer_query->bindValue(":subject", $student_answer->getSubject());
        $add_student_answer_query->bindValue(":caption", $student_answer->getCaption());
        $add_student_answer_query->bindValue(":mark", $student_answer->getMark());
        
        if ($add_student_answer_query->execute()) {
          
          $answers = $student_answer->getAnswers();
          
          if (!empty($answers)) {

            $result = true;
            for ($i = 0; $i < count($answers); $i++) {
              
              $add_answer_query = $this->dbc()->prepare("call putStudentAnswer(:student_test, :question, :answer)");
              
              $add_answer_query->bindValue(":student_test", $student_answer->getTestID());
              $add_answer_query->bindValue(":question", $answers[$i]['question']);
              $add_answer_query->bindValue(":answer", $answers[$i]['answer']);
              
              $result *= $add_answer_query->execute();
            }
            
            if ($result) {
              return $this->dbc()->commit();
            } else {
              $this->dbc()->rollBack();
              return false;
            }
            
          } else {
            $this->dbc()->rollBack();
            return false;
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
    }
    
    /*!
      \brief Возвращает все ответы к пройденному тесту
      \param[in] $student_test_id - Идентификатор пройденного теста
      \return Ответы студента
      \note Ассоциативнный массив
    */
    
    public function getStudentAnswers(int $student_test_id)
    {
      return $this->query("call getStudentAnswers(:student_test)", [":student_test" => $student_test_id]);
    }
    
    /*!
      \brief Возвращает тест, пройденный студентом
      \param[in] $student_email - Электронная почта студента
      \param[in] $student_test  - Идентификатор пройденного теста
      \return Результат пройденного теста
      \note Объект класса StudentTest
    */
    
    public function getStudentTest(string $student_email, int $student_test)
    {
      $db_test = $this->dbc()->prepare("call getStudentTest(:student_email, :student_test)");
      $db_test->bindValue(":student_test", $student_test);
      $db_test->bindValue(":student_email", $student_email);
      
      if ($db_test->execute()) {
        
        $test = $db_test->fetchAll(\PDO::FETCH_ASSOC)[0];
        
        if (!empty($test)) {          
          return new StudentTest(
            $student_email,
            $test['caption'],
            $test['subject'],
            $test['date_pass'],
            (int)$test['mark']
          );
        } else {
          return array();
        }
        
      } else {
        return array();
      }
      
    }
    
    /*!
      \brief Возвращает все пройденные тесты
      \param[in] $student_email - Электронная почта студента
      \return Пройденные тесты
      \note Массив с объектами класса StudentTest
    */
    
    public function getStudentTests(string $student_email) : array
    {      
      $db_students_tests = $this->query("call getStudentTests(:student)", [":student" => $student_email]);
      
      $student_tests = array();
      foreach ($db_students_tests as $db_student_test) {
        $test = new StudentTest(
          $student_email,
          $db_student_test['caption'],
          $db_student_test['subject'],
          $db_student_test['date_pass'],
          (int)$db_student_test['mark']
        );
        $test->setTestID((int)$db_student_test['id_student_test']);
        
        $student_tests[] = $test;
      }
      
      return $student_tests;
    }


    /*!


    */

    public function getStudentsResult(string $teacher_email) : array
    {
      
    }
    
    /*!
      \brief Удаляет тест
      \param[in] $test_id - Идентификатор теста
      \return TRUE - успешно, FALSE - ошибка
    */
    
    public function remove($test_id) : bool
    {
      $remove_test_query = $this->dbc()->prepare("call removeTest(:test_id)");
      
      $remove_test_query->bindValue(":test_id", $test_id);
      
      return $remove_test_query->execute();
    }
    
  }
  
?>
