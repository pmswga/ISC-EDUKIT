<?php
/* Smarty version 3.1.29, created on 2017-09-17 22:22:29
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\blocks\user_menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59becb755fce08_82627652',
  'file_dependency' => 
  array (
    '50bce65330f1bb148f0ffa2b0a14d9a6647e2ce4' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\blocks\\user_menu.tpl',
      1 => 1493399107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59becb755fce08_82627652 ($_smarty_tpl) {
?>
<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand">УКИТ<!--<img src="img/ukit.png" width="50px" alt="">--></a>
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Главная</a></li>
					<li><a href="news.php">Новости</a></li>
					<li><a href="schedule.php">Расписание</a></li>
					<li><a href="teachers.php">Преподаватели</a></li>
					<li><a href="user.php">Профиль</a></li>
					<li><a href="php/exit.php">Выход</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div><?php }
}
