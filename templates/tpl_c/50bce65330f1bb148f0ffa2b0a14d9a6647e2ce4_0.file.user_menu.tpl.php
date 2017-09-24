<?php
/* Smarty version 3.1.29, created on 2017-09-24 14:02:05
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\blocks\user_menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c790ada8d749_31800607',
  'file_dependency' => 
  array (
    '50bce65330f1bb148f0ffa2b0a14d9a6647e2ce4' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\blocks\\user_menu.tpl',
      1 => 1506244234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c790ada8d749_31800607 ($_smarty_tpl) {
?>
<section>
	<figure>
	<img src="img/ukit.png" width="100%" alt="">
	</figure>
</section>
<nav class="ui left vertical menu" style="width: 100%;">
	<!-- FIXME: Добавить стили в файл .css -->
	<a href="index.php" class="item" style="text-align: center;">
		<i class="main icon"></i>
		Главная
	</a>
	<a href="news.php" class="item">
		<i class="newspaper icon"></i>
		Новости
	</a>
	<a href="schedule.php" class="item">
		<i class="calendar icon"></i>
		Расписание
	</a>
	<a href="teachers.php" class="item">
		<i class="users icon"></i>
		Преподаватели
	</a>
	<a href="user.php" class="item" id="openRegStudentModal">
		<i class="user icon"></i>
		Профиль
	</a>
	<a href="php/exit.php" class="item" id="openSignInModal">
		<i class="sign out icon"></i>
		Выход
	</a>
</nav><?php }
}
