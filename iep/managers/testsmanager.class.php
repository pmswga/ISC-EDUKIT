<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once "../structures/test.class.php";
	require_once "../structures/onequestion.class.php";
	
	class TestsManager extends IEP
	{
		
		public function add($test)
		{
			$add_test_query = $this->dbc()->prepare("INSERT INTO `tests`
				(`id_subject`, `id_teacher`, `caption`)
				VALUES
				(:id_subject, :id_teacher, :caption)
			");
			$add_test_query->bindValue(":id_subject", $test->getSubject());
			$add_test_query->bindValue(":id_teacher",$test->getAuthor());
			$add_test_query->bindValue(":caption",$test->getCaption());
			
			if($add_test_query->execute())
			{
				$id_test = $this->get("SELECT `id_test` FROM `tests` WHERE `caption`=:caption", [":caption" => $test->getCaption()])[0]['id_test'];
				foreach($test->getQuestions() as $question)
				{
					$add_question_query = $this->dbc()->prepare("INSERT INTO `questions`
						(`id_test`, `question`, `r_answer`)
						VALUES
						(:id_test, :question, :r_answer)
					");
					$add_question_query->bindValue(":id_test", $id_test);
					$add_question_query->bindValue(":question", $question->getQuestion());
					$add_question_query->bindValue(":r_answer", $question->getRAnswer());
					
					if($add_question_query->execute())
					{
						$status = true;
						$id_question = $this->get("SELECT `id_question` FROM `questions` WHERE `question`=:question", ["question" => $question->getQuestion()])[0]['id_question'];
						foreach($question->getAnswers() as $answer)
						{
							$add_answer_query = $this->dbc()->prepare("INSERT INTO `answers`
								(`id_question`, `answer`)
								VALUES
								(:id_question, :answer)
							");
							$add_answer_query->bindValue(":id_question", $id_question);
							$add_answer_query->bindValue(":answer", $answer);
							
							$status *= $add_answer_query->execute();
						}
						return $status;
					}
					return false;
				}
			}
			else return false;
		}
		
		public function remove($caption)
		{
			return $this->get("DELETE FROM `tests` WHERE `caption`=:caption", [":caption" => $caption]);
		}
		
		public function getTestsByTeacherId($id)
		{
			return $this->get("SELECT `caption`, `description` FROM `tests` t INNER JOIN `subjects` s ON t.id_subject=s.id_subject WHERE t.id_teacher=:id_teacher", [":id_teacher" => $id]);
		}
		
		public function change($oldTest, $newTest)
		{
			
		}
		
	}
	
?>