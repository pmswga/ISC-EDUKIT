<html>
    <head>
        <title>Liking System</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/index/index_style.css">
        <link rel="stylesheet" type="text/css" href="css/menu/menu_style.css">
        <link rel="stylesheet" type="text/css" href="css/menu/anim.css">
        <link rel="stylesheet" type="text/css" href="css/liking_system/liking_system.css">
        <script src="js/code.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <!-- Меню сайта -->
            <?php require_once "blocks/b_menu.php"; ?>
            <!-- Контент -->
            <div class="container">
                <!-- Linking System -->
                <div class="welcom_message">
                    <p>Здесь вы можете узнать ваш средний балл</p>
                    <?php require_once "blocks/b_link_system.php"; ?>
                </div>
            </div
        </div>
        <!-- Подключение Bootstrap 3 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>