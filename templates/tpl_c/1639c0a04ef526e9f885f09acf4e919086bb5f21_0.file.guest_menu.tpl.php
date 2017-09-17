<?php
/* Smarty version 3.1.29, created on 2017-09-17 22:22:04
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\blocks\guest_menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59becb5ce5bd91_13108816',
  'file_dependency' => 
  array (
    '1639c0a04ef526e9f885f09acf4e919086bb5f21' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\blocks\\guest_menu.tpl',
      1 => 1503135401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59becb5ce5bd91_13108816 ($_smarty_tpl) {
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
					<li><a href="#" data-toggle="modal" data-target="#reg">Регистрация</a></li>
					<li><a href="#" data-toggle="modal" data-target="#auth">Вход</a></li>
				</ul>
			</div>
		</nav>
	</div>
</div><?php }
}
