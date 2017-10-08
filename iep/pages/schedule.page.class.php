<?php
    declare(strict_types = 1);
    namespace IEP\Pages;

    require_once "page.class.php";

    class SchedulePage extends Page
    {
        
        public function callback($post)
        {
            switch ($post) {
                case $_POST['selectGroupButton']:
                {
                    setcookie("current_group", $_POST['group']);
                    \CTools::Redirect("schedule.php");
                } break;
                default: return null; break;
            }
        }

    }

?>