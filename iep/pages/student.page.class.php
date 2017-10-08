<?php
    declare(strict_types = 1);
    namespace IEP\Pages;

    require_once "page.class.php";

    use IEP\Pages\Page;

    class StudentPage extends Page
    {

        public function callback($post)
        {
            switch ($post) {

                case $_POST['']:
                {

                } break;
                default: return null; break;
            }
        }

    }

?>