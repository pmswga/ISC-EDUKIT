<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/test.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/onequestion.class.php";
    
    use IEP\Structures\Test;
    use IEP\Structures\OneQuestion;
	
	class TestsManager extends IEP
    {
		
		public function add($test) : bool
		{
			try
            {
                $this->dbc()->beginTransaction();
                
                $test_add_query = $this->dbc()->prepare("INSERT INTO `tests`
                    (`id_subject`, `id_teacher`, `for_group`, `caption`)
                    VALUES
                    ((SELECT `id_subject` FROM `subjects` WHERE `description`=:subject), (SELECT `id_user` FROM `users` WHERE `email`=:teacher_email), :for_group, :caption)
                ");
                
                $test_add_query->bindValue(":subject", $test->getSubject());
                $test_add_query->bindValue(":teacher_email", $test->getAuthor());
                $test_add_query->bindValue(":for_group", $test->getGroups());
                $test_add_query->bindValue(":caption", $test->getCaption());
                
                if ($test_add_query->execute()) {
                    
                    $id_test = $this->get("SELECT `id_test` FROM `tests` WHERE `caption`=:caption", [":caption" => $test->getCaption()])[0]["id_test"];
                    
                    foreach($test->getQuestions() as $question) {
                        
                        $question_add_query = $this->dbc()->prepare("INSERT INTO `questions`
                            (`id_test`, `question`, `r_answer`)
                            VALUES
                            (:id_test, :question, :r_answer)
                        ");
                        
                        $question_add_query->bindValue(":id_test", $id_test);
                        $question_add_query->bindValue(":question", $question->getQuestion());
                        $question_add_query->bindValue(":r_answer", $question->getRAnswer());
                        
                        if ($question_add_query->execute()) {
                            
                            $id_question = $this->get("SELECT `id_question` FROM `questions` WHERE `question`=:question", [":question" => $question->getQuestion()])[0]['id_question'];
                            
                            foreach ($question->getAnswers() as $answer) {
                                
                                $answer_add_query = $this->dbc()->prepare("INSERT INTO `answers`
                                    (`id_question`, `answer`)
                                    VALUES
                                    (:id_question, :answer)
                                ");
                                
                                $answer_add_query->bindValue(":id_question", $id_question);
                                $answer_add_query->bindValue(":answer", $answer);
                                
                                if (!$answer_add_query->execute()) {
                                    $this->dbc()->rollBack();
                                    return false;
                                }
                                
                            }
                            
                        }
                        else {
                            $this->dbc()->rollBack();
                            return false;
                        }
                        
                    }
                    
                    return $this->dbc()->commit();
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
        
        public function addQuestion(string $caption_test, OneQuestion $question)
        {
            try
            {
                $this->dbc()->beginTransaction();
                
                $id_test = $this->get("SELECT `id_test` FROM `tests` WHERE `caption`=:caption", [":caption" => $caption_test])[0]['id_test'];
            
                $add_question_query = $this->dbc()->prepare("INSERT INTO `questions`
                    (`id_test`, `question`, `r_answer`)
                    VALUES
                    (:id_test, :question, :r_answer)
                ");
                
                $add_question_query->bindValue(":id_test", $id_test);
                $add_question_query->bindValue(":question", $question->getQuestion());
                $add_question_query->bindValue(":r_answer", $question->getRAnswer());
                
                if ($add_question_query->execute()) {
                    
                    $id_question = $this->get("SELECT `id_question` FROM `questions` WHERE `question`=:question", [":question" => $question->getQuestion()])[0]['id_question'];
                    
                    foreach ($question->getAnswers() as $ans) {
                        
                        $add_answ_query = $this->dbc()->prepare("INSERT INTO `answers` (`id_question`, `answer`) VALUES (:id_q, :ans)");
                        
                        $add_answ_query->bindValue(":id_q", $id_question);
                        $add_answ_query->bindValue(":ans", $ans);
                        
                        if (!$add_answ_query->execute()) {
                            $this->dbc()->rollBack();
                            return false;
                        }
                        
                    }
                    
                    return $this->dbc()->commit();
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
		
		public function remove($caption) : bool
		{
			$remove_test_query = $this->dbc()->prepare("DELETE FROM `tests` WHERE `caption`=:caption");
            $remove_test_query->bindValue(":caption", $caption);
            
            return $remove_test_query->execute();
		}
        
        public function removeQuestion(string $question)
        {
            $remove_question_query = $this->dbc()->prepare("DELETE FROM `questions` WHERE `question`=:question");
            $remove_question_query->bindValue(":question", $question);
            
            return $remove_question_query->execute();
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
		
		public function change($oldTest, $newTest)
		{
			
		}
		
	}
	
?>
