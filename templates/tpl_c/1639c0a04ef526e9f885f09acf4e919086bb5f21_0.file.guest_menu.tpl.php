<?php
/* Smarty version 3.1.29, created on 2017-09-25 23:59:28
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\blocks\guest_menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c96e30e3dde2_22292562',
  'file_dependency' => 
  array (
    '1639c0a04ef526e9f885f09acf4e919086bb5f21' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\blocks\\guest_menu.tpl',
      1 => 1506249051,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c96e30e3dde2_22292562 ($_smarty_tpl) {
?>
<section>
	<figure>
	<img src="img/ukit.png" width="100%" alt="">
	</figure>
</section>
<nav id="menu" class="ui left vertical menu">
	<a href="index.php" class="item">
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
	<a href="#" class="item" id="openRegStudentModal">
		<i class="add user icon"></i>
		Регистрация
	</a>
	<a href="#" class="item" id="openSignInModal">
		<i class="sign in icon"></i>
		Вход
	</a>
</nav>
<?php echo '<script'; ?>
 type="text/javascript">

	$("#openRegStudentModal").on("click", function() {
		$("#regStudentModal.modal").modal("show");
	});

	$("#openSignInModal").on("click", function(){
		$("#signInModal.modal").modal("show");
	});

<?php echo '</script'; ?>
><?php }
}
