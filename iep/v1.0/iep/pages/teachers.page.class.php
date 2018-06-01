<?php
    declare(strict_types = 1);
    namespace IEP\Pages;

    require_once "page.class.php";

    use IEP\Pages\Page;

    class TeachersPage extends Page
    {

        public function callback($post)
        {
            switch ($post)
            {
                default: return null; break;
            }
        }

    }

?>