<html>
	<head>
		<title>Расписание</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/index/index_style.css">
        <link rel="stylesheet" type="text/css" href="css/menu/menu_style.css">
        <link rel="stylesheet" type="text/css" href="css/menu/anim.css">
        <link rel="stylesheet" type="text/css" href="css/schedule.php/schedule_style.css">
	</head>
	
	<body>
        <div class="container-fluid">
            <!-- Меню сайта -->
            <?php require_once "blocks/b_menu.php"; ?>
            <!-- Контент -->
            <div class="container">
				<div class="welcom_message">
					<h4>Расписание пар:</h4>
					<?php 
						include "blocks/shedule/shedule.php";
					?>
					<h4>Расписание звонков:</h4>
					<?php 
						include "blocks/shedule/shedule_calls.php";
					?>
					<h4>Расписание обедов:</h4>
					<?php 
						include "blocks/shedule/shedule_lanches.php";
					?>
				</div>
            </div>
        </div>
        <!-- Подключение Bootstrap 3 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
	</body>
</html>

