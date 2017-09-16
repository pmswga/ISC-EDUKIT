<?php
    require_once "start.php";

    $groups = $GM->getAllGroups();

    if (!empty($groups)) {
        if (!empty(current($groups))) {
            setcookie("current_group", current($groups)->getGroupID());

            if (!empty($_POST['selectGroupButton'])) {
                setcookie("current_group", $_POST['group']);
                CTools::Redirect("schedule.php");
            }

            $data = $SHM->getScheduleGroup($_COOKIE['current_group']);
            $changed_schedules = $SHM->getChangeScheduleGroup($_COOKIE['current_group']);

            $CT->assign("schedules", $data);
            $CT->assign("changed_schedules", $changed_schedules);

            $CT->assign("", $SHM->getAllChangedSchedule());
            $CT->assign("groups", $groups);
        }

    }

    $CT->assign("week", date("W"));

    if (!isset($_SESSION['user'])) {
        $CT->Show("guest/schedule.tpl");
    } else {
        $CT->Show("users/schedule.tpl");
    }

?>
