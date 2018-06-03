<?php
    declare(strict_types = 1);
    namespace IEP\Pages;

    require_once "page.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/v1.0/iep/structures/news.class.php";
	require_once $_SERVER['DOCUMENT_ROOT']."/iep/v1.0/iep/structures/test.class.php";

    use IEP\Pages\Page;
    use IEP\Structures\News;
    use IEP\Structures\Test;

    class TeacherPage extends Page
    {

        public function callback($post)
        {
            if (!empty($post['addNewsButton'])) {
                $data = \CForm::getData(array("caption", "content", "dp"));
                $new_news = new News($data['caption'], $data['content'], $this->template_data['user']->getEmail(), $data['dp']);
                
                if ($this->managers["news"]->add($new_news)) {
                    \CTools::Message("Новость опубликована");
                } else {
                    \CTools::Message("Произошла ошибка");
                }

                return;
            }
            
            if (!empty($post['removeNewsButton'])) {
                $news_id = $post['news'];
        
                if ($this->managers["news"]->remove($news_id)) {
                    \CTools::Message("Новости были удалены");
                } else {
                    \CTools::Message("Произошла ошибка");
                }
                
                return;
            }
            
            if (!empty($post['setSubjectButton'])) {
                $select_subject = $post['select_subject'];
                
                if (!empty($select_subject)) {     

                    $result = true;
                    for ($i = 0; $i < count($select_subject); $i++) {
                        $result *= $this->managers['subjects']->setSubject($this->template_data['user']->getEmail(), (int)$select_subject[$i]);
                    }
                    
                    if ($result) {
                        \CTools::Message("Предметы успешно назначены");
                    } else {
                        \CTools::Message("Произошла ошибка");
                    }
                    
                }

                return;
            }

            if (!empty($_POST['unsetSubjectButton'])) {
                $subject_id = $_POST['subject'];
                            
                if ($this->managers['subjects']->unsetSubject($this->template_data['user']->getEmail(), (int)$subject_id)) {
                    \CTools::Message("Предметы убраны");
                } else {
                    \CTools::Message("Произошла ошибка");
                }
                    
                return;
            }
            
            if (!empty($post['addTestButton'])) {
                $caption = htmlspecialchars($post['caption']);
                $subject = $post['subject'];
                $select_group = $post['select_group'] ?? array();
                
                $new_test = new Test($caption, $subject, $this->template_data['user']->getEmail(), $select_group);
        
                if ($this->managers['tests']->add($new_test)) {
                    \CTools::Message("Тест успешно создан");
                } else {
                    \CTools::Message("Произошла ошибка");
                }
                
                return;
            }
				
            if (!empty($post['removeTestButton'])) {
                $test_id = $post['test'];
        
                if ($this->managers['tests']->remove($test_id)) {
                    \CTools::Message("Тест был удалён");
                } else {
                    \CTools::Message("При удалени теста произошла ошибка");
                }
                
                return;
            }

            if (!empty($post['changePasswordButton'])) {

                echo "Change";

                return;
            }
        }

    }

?>