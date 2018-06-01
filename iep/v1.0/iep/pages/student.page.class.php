<?php
    declare(strict_types = 1);
    namespace IEP\Pages;

    require_once "page.class.php";

    use IEP\Pages\Page;

    class StudentPage extends Page
    {

        public function callback($post)
        {
            if (!empty($post['changePasswordButton'])) {

                echo "Change";

                return;
            }
        }

    }

?>