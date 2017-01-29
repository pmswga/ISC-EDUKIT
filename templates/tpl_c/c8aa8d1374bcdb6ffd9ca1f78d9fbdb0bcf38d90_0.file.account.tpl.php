<?php
/* Smarty version 3.1.29, created on 2017-01-08 20:49:43
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\accounts\account.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58727bb70fa623_28070331',
  'file_dependency' => 
  array (
    'c8aa8d1374bcdb6ffd9ca1f78d9fbdb0bcf38d90' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\accounts\\account.tpl',
      1 => 1483897782,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_58727bb70fa623_28070331 ($_smarty_tpl) {
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
					<h1><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
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
				<div class="col-md-2">
				
				</div>
				<div class="col-md-8">
					<fieldset>
						<legend style="text-align: center;">Информация</legend>
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
						</table>
					</fieldset>
				</div>
				<div class="col-md-2">
				
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
