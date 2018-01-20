<?php
	require_once "start.php";

    use IEP\Structures\User;
    use IEP\Structures\Subject;

	if (isset($_SESSION['admin']) && 
     ($_SESSION['admin'] instanceof User) &&
     $UM->adminExists($_SESSION['admin'])
    ) {
        $all_students = $UM->getAllStudentsElders();
        $studentsByGroup = array();
        for ($i = 0; $i < count($all_students); $i++) {
            $key = $all_students[$i]->getGroup()->getNumberGroup()." (".$all_students[$i]->getGroup()->getYearEducation().")";
            $studentsByGroup[$key][] = $all_students[$i];
        }
    
        $CT->assign("groups", $GM->getAllGroups());
        $CT->assign("subjects", $SM->getAllSubjects());
        $CT->assign("teachers", $UM->getAllTeachers());
        $CT->assign("students", $UM->getAllStudents());
        $CT->assign("elders", $UM->getAllElders());
        $CT->assign("parents", $UM->getAllParents());
        $CT->assign("allUsers", $UM->getAllUsers());
        $CT->assign("specialty", $SPM->getAllSpecialty());
        $CT->assign("studentsByGroup", $studentsByGroup);


        if (!empty($_POST['removeSubjectButton'])) {
            $subjects = $_POST['subjects'];

            $result = true;
            foreach ($subjects as $subject) {
                $result *= $SM->remove($subject);
            }

            if ($result) {
                CTools::Message("Выбранные предметы были удалены");
                CTools::Redirect("index.php");
            } else {
                CTools::Message("Произошла ошибка при удалении предметов");
            }
        }

        if (!empty($_POST['addSubjectButton'])) {
            $descp = htmlspecialchars($_POST['descp']);

            if ($SM->add(new Subject($descp))) {
                CTools::Message("Предмет успешно добавлен");
                CTools::Redirect("index.php");
            } else {
                CTools::Message("Не удалось добавить предмет");
            }
        }


        $CT->Show("index.tpl");
    } else {
        CTools::Redirect("login.php");
    }

?>
