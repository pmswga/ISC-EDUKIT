<?php
/* Smarty version 3.1.29, created on 2016-11-27 17:05:27
  from "C:\OpenServer\domains\edukit.mgkit\templates\tpl\users\student.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583ae8279b5137_27677901',
  'file_dependency' => 
  array (
    'a4c7dae5d3fccea14a017608ee555e74ff7f5833' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\templates\\tpl\\users\\student.tpl',
      1 => 1480255511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_583ae8279b5137_27677901 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой кабинет</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.js"><?php echo '</script'; ?>
>
		<style>
			
			h1, h2{
				text-align: center;
			}
			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Студент</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:users/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h2>Информация обо мне</h2>
				</div>
				<div class="col-md-6">
					<h2>Мои одногруппники</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h2>Моё расписание</h2>
				</div>
				<div class="col-md-6">
					<h2>Моя посещаемость</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2>Пройденные тесты</h2>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
