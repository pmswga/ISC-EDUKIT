<html>
	<head>
		<title>Конспекты</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/index/index_style.css">
        <link rel="stylesheet" type="text/css" href="css/menu/menu_style.css">
        <link rel="stylesheet" type="text/css" href="css/menu/anim.css">
        <link rel="stylesheet" type="text/css" href="css/notes/notes.css">
	</head>
	
	<body>
		<div class="container-fluid">
            <!-- Меню сайта -->
            <?php require_once "blocks/b_menu.php"; ?>
            <!-- Контент -->
            <div class="center">
                <div class="notes_button">
                    <div id="but" class="inf_div"><a target="doc" href="docs/informatic/Informatic.pdf"><button>Информатика</button></a></div>
                    <div id="but" class="litr_div"><a target="doc" href="docs/litr/Litr.pdf"><button>Литература</button></a></div>
                    <div id="but" class="hist_div"><a target="doc" href="docs/hist/hist.pdf"><button>История</button></a></div>
                    <div id="but" class="phyc_div"><a target="doc" href="docs/physic/phyc.pdf"><button>Физика</button></a></div>
                    <div id="but" class="obsh_div"><a target="doc" href="docs/obsh/obsh.pdf"><button>Обществознание</button></a></div>
                </div>

                <iframe name="doc" frameborder="0" style="margin-top: 10px;" width="100%" height="90%">

                </iframe>
            </div>
        </div>
        <!-- Подключение Bootstrap 3 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
	</body>
</html>