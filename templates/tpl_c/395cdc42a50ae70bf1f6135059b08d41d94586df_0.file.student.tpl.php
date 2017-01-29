<?php
/* Smarty version 3.1.29, created on 2017-01-08 20:36:44
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\accounts\student.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_587278ac2f40d1_12600385',
  'file_dependency' => 
  array (
    '395cdc42a50ae70bf1f6135059b08d41d94586df' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\accounts\\student.tpl',
      1 => 1483897003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_587278ac2f40d1_12600385 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\iep.mgkit\\engine\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой аккаунт</title>
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
					<h1><?php echo $_smarty_tpl->tpl_vars['fio']->value;?>
</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:users/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				</div>
			</div>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Моё расписание</h2>
				</div>
				<div class="col-md-4">
					<fieldset>
						<legend>Информация обо мне</legend>
						<table class="table table-striped">
							<tr>
								<td>Фамилия</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</td>
							</tr>
							<tr>
								<td>Имя</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</td>
							</tr>
							<tr>
								<td>Отчество</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</td>
							</tr>
							<tr>
								<td>Группа</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getGroup();?>
</td>
							</tr>
							<tr>
								<td>Дата рождения</td>
								<td><?php echo (($tmp = @smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value->getDateBirthday(),"%d.%m.%Y"))===null||$tmp==='' ? "не указано" : $tmp);?>
</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
							</tr>
							<tr>
								<td>Адрес</td>
								<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->getHomeAddress())===null||$tmp==='' ? "Не указан" : $tmp);?>
</td>
							</tr>
						</table>
					</fieldset>
					<div class="panel-group" id="u">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Мои одногруппники</a></h4>
							</div>
							<div id="u_teachers" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
										<?php
$_from = $_smarty_tpl->tpl_vars['sogroups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_it_0_saved_item = isset($_smarty_tpl->tpl_vars['it']) ? $_smarty_tpl->tpl_vars['it'] : false;
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$__foreach_it_0_saved_local_item = $_smarty_tpl->tpl_vars['it'];
?>
											<tr><td><a href=account.php?id=<?php echo $_smarty_tpl->tpl_vars['it']->value['id_user'];?>
><?php echo $_smarty_tpl->tpl_vars['it']->value['second_name'];?>
</a></td></tr>
										<?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_0_saved_local_item;
}
if ($__foreach_it_0_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_0_saved_item;
}
?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Моя посещаемость</h2>
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="tests">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#tests" href="#s_tests">Тесты</a></h4>
							</div>
							<div id="s_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
									
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-group" id="completes_tests">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#completes_tests" href="#c_tests">Пройденные тесты</a></h4>
							</div>
							<div id="c_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
									
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
