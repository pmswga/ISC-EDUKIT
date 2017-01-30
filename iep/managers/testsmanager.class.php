<?php
    declare(strict_types = 1);
	namespace IEP\Managers;
	
	require_once "iep.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/test.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/structures/onequestion.class.php";
	
	class TestsManager extends IEP
	{
		
		public function add($test) : bool
		{
			try
            {
                $this->dbc()->beginTransaction();
                
                $test_add_query = $this->dbc()->prepare("INSERT INTO `tests`
                    (`id_subject`, `id_teacher`, `caption`)
                    VALUES
                    ((SELECT `id_subject` FROM `subjects` WHERE `description`=:subject), (SELECT `id_user` FROM `users` WHERE `email`=:teacher_email), :caption)
                ");
                
                $test_add_query->bindValue(":subject", $test->getSubject());
                $test_add_query->bindValue(":teacher_email", $test->getAuthor());
                $test_add_query->bindValue(":caption", $test->getCaption());
                
                if($test_add_query->execute())
                {
                    echo "to be continue...";
                }
                
                return $this->dbc()->commit();
            }
            catch(PDOException $e)
            {
                $db->rollBack();
                return false;
            }
		}
		
		public function remove($caption) : bool
		{
			return $this->get("DELETE FROM `tests` WHERE `caption`=:caption", [":caption" => $caption]);
		}
        
        public function getTests() : array
        {
            
        }
		
		public function change($oldTest, $newTest)
		{
			
		}
		
	}
	
?>