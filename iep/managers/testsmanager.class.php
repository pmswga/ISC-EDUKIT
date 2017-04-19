<?php
  declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/test.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/onequestion.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/group.class.php";
    
	use IEP\Structures\Test;
	use IEP\Structures\OneQuestion;
	use IEP\Structures\Group;
	
	class TestsManager extends IEP
	{
		
		public function add($test) : bool
		{
			try
			{
				$this->dbc()->beginTransaction();
				
				$for_groups = $test->getGroups();
				
				$test_add_query = $this->dbc()->prepare("call addTest(:emailTeacher, :subject, :caption)");
				
				$test_add_query->bindValue(":subject", $test->getSubjectID());
				$test_add_query->bindValue(":emailTeacher", $test->getAuthorEmail());
				$test_add_query->bindValue(":caption", $test->getCaption());
				
				if ($test_add_query->execute()) {
					
					if (!empty($for_groups)) {
						
						$last_id = $this->get("SELECT LAST_INSERT_ID() as last_id FROM `tests`");
						$last_id = $last_id[0]['last_id'];
						
						$set_group_query = $this->dbc()->prepare("call setGroup(:test_id, :grp_id)");
						$set_group_query->bindValue(":test_id", $last_id);
						
						$result = true;
						for ($i = 0; $i < count($for_groups); $i++) {
							$set_group_query->bindValue(":grp_id", $for_groups[$i]);
							$resutl *= $set_group_query->execute();
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
        
		public function addQuestion(int $test_id, OneQuestion $question)
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
						
						$last_id = $this->get("SELECT LAST_INSERT_ID() as last_id FROM `tests` WHERE `id_test`=:test_id", [":test_id" => $test_id]);
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
		
		public function remove($test_id) : bool
		{
			$remove_test_query = $this->dbc()->prepare("call removeTest(:test_id)");
			$remove_test_query->bindValue(":test_id", $test_id);
			
			return $remove_test_query->execute();
		}
        
		public function removeQuestion(int $question_id)
		{
			$remove_question_query = $this->dbc()->prepare("call removeQuestion(:question_id)");
			$remove_question_query->bindValue(":question_id", $question_id);
			
			return $remove_question_query->execute();
		}
		
		public function removeAnswer(int $answer_id) : bool
		{
			$remove_answer_query = $this->dbc()->prepare("call removeAnswer(:answer_id)");
			
			$remove_answer_query->bindValue(":answer_id", $answer_id);
			
			return $remove_answer_query->execute();
		}
		
		public function getTeacherTests(string $emailTeacher) : array
		{
			$db_tests = $this->get("call getTests(:emailTeacher)", [":emailTeacher" => $emailTeacher]);
			
			$tests = array();
			foreach ($db_tests as $db_test) {
				$for_groups = $this->get("call getTestGroups(:test_id)", [":test_id" => $db_test['id_test']]);
				
				$groups = array();
				for($i = 0; $i < count($for_groups); $i++) {
					$new_group = new Group($for_groups[$i]['grp'], $for_groups[$i]['spec'], (int)$for_groups[$i]['is_budget']);
					$new_group->setID((int)$for_groups[$i]['id_group']);
					
					$groups[] = $new_group;
				}
				
				$new_test = new Test($db_test['test_name'], $db_test['email'], $groups);
				$new_test->setTestID((int)$db_test['id_test']);
				$new_test->setSubject($db_test['subject']);
				
				$tests[] = $new_test;
			}
			
			return $tests;
		}
		
		public function getTest(int $test_id)
		{
			$db_test = $this->get("call getTest(:test_id)", [":test_id" => $test_id])[0];
			
			$for_groups = $this->get("call getTestGroups(:test_id)", [":test_id" => $test_id]);
			
			$groups = array();
			for($i = 0; $i < count($for_groups); $i++) {
				$new_group = new Group($for_groups[$i]['grp'], $for_groups[$i]['spec'], (int)$for_groups[$i]['is_budget']);
				$new_group->setID((int)$for_groups[$i]['id_group']);
				
				$groups[] = $new_group;
			}
			
			$db_questions = $this->get("call getQuestions(:test_id)", ["test_id" => $test_id]);
			
			$questions = array();
			foreach($db_questions as $db_question) {
				
				$db_answers = $this->get("call getAnswers(:test_id, :question_id)", [":test_id" => $test_id, ":question_id" => $db_question['id_question']]);
				
				$new_question = new OneQuestion($db_question['question'], $db_question['r_answer'], $db_answers);
				$new_question->setID((int)$db_question['id_question']);
				
				$questions[] = $new_question;
			}
			
			
			$test = new Test($db_test['test_name'], $db_test['email'], $groups);
			$test->setTestID((int)$db_test['id_test']);
			$test->setSubject($db_test['subject']);
			$test->addQuestion($questions);
			
			return $test;
		}
		
		public function getTests() : array
		{
			$db_tests = $this->get("SELECT * FROM `tests`");
			
			$tests = array();
			foreach ($db_tests as $db_test) {
					
					$subject = $this->get("SELECT `description` FROM `subjects` WHERE `id_subject`=:id_subject", [":id_subject" => $db_test['id_subject']])[0]['description'];
					$author = $this->get("SELECT CONCAT(`second_name`, ' ', LEFT(`first_name`, 1), '.', LEFT(`patronymic`, 1), '.') as author FROM `users` WHERE `id_user`=:id_user", [":id_user" => $db_test['id_teacher']])[0]['author'];
					$db_questions = $this->get("SELECT * FROM `questions` WHERE `id_test`=:id_test", [":id_test" => $db_test['id_test']]);
					
					$questions = array();
					foreach ($db_questions as $db_question) {
							$db_answers = $this->get("SELECT * FROM `answers` WHERE `id_question`=:id_question", [":id_question" => $db_question['id_question']]);
							
							$answers = array();
							foreach ($db_answers as $db_answer) {
									$answers[] = $db_answer['answer'];
							}
							
							$questions[] = new OneQuestion($db_question['question'], $answers, $db_question['r_answer']);
					}
					
					$tests[] = new Test($db_test['caption'], $subject, $author, $db_test['for_group'], $questions);
			}
			
			return $tests;
		}
		
		public function setGroup(int $test_id, int $test_grp) : bool
		{
			$set_group_query = $this->dbc()->prepare("call setGroup(:test_id, :test_grp)");
			
			$set_group_query->bindValue(":test_id", $test_id);
			$set_group_query->bindValue(":test_grp", $test_grp);
			
			return $set_group_query->execute();
		}
		
		public function unsetGroup(int $test_id, int $test_grp) : bool
		{
			$set_group_query = $this->dbc()->prepare("call unsetGroup(:test_id, :test_grp)");
			
			$set_group_query->bindValue(":test_id", $test_id);
			$set_group_query->bindValue(":test_grp", $test_grp);
			
			return $set_group_query->execute();
		}
		
		public function cahngeCaptionQuestion(int $question_id, string $new_caption) : bool
		{
			$change_question_query = $this->dbc()->prepare("call cahngeCaptionQuestion(:question_id, :new_caption)");
			
			$change_question_query->bindValue(":question_id", $question_id);
			$change_question_query->bindValue(":new_caption", $new_caption);
			
			return $change_question_query->execute();
		}
		
		public function changeRAnswerQuestion(int $question_id, string $new_RAnswer) : bool
		{
			$change_question_query = $this->dbc()->prepare("call changeRAnswerQuestion(:question_id, :new_RAnswer)");
			
			$change_question_query->bindValue(":question_id", $question_id);
			$change_question_query->bindValue(":new_RAnswer", $new_RAnswer);
			
			return $change_question_query->execute();
		}
		
		public function changeCaptionAnswer(int $answer_id, string $new_answer) : bool
		{
			$change_answer_query = $this->dbc()->prepare("call changeCaptionAnswer(:answer_id, :new_answer)");
			
			$change_answer_query->bindValue(":answer_id", $answer_id);
			$change_answer_query->bindValue(":new_answer", $new_answer);
			
			return $change_answer_query->execute();
		}
		
		public function getAnswers(int $test_id, int $question_id)
		{
			$answers_query = $this->dbc()->prepare("call getAnswers(:test_id, :question_id)");
			
			$answers_query->bindValue(":test_id", $test_id);
			$answers_query->bindValue(":question_id", $question_id);
			
			return $answers_query->execute();
		}
		
		
		
		public function change($oldTest, $newTest)
		{
			
		}
		
	}
	
?>
