<?php
/* Smarty version 3.1.29, created on 2017-01-10 03:10:02
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\accounts\teacher.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5874265a58c185_30815643',
  'file_dependency' => 
  array (
    '3c2787f45783a41625e127744ba2971dccb37bbd' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\accounts\\teacher.tpl',
      1 => 1484007001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_5874265a58c185_30815643 ($_smarty_tpl) {
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
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
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
					<div class="row">
						<div class="col-md-12">
							<h2>Мои тесты</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<td>Название</td>
									<td>Тема</td>
									<td>Для групп</td>
								</tr>
							</table>
						</div>
					</div>
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
								<td>Email</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
							</tr>
						</table>
					</fieldset>
					<div class="panel-group" id="u">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Мои предметы</a></h4>
							</div>
							<div id="u_teachers" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
										<?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_0_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_0_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
											<tr><td><?php echo $_smarty_tpl->tpl_vars['subject']->value['description'];?>
</td></tr>
										<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_local_item;
}
if ($__foreach_subject_0_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_item;
}
?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<fieldset>
						<legend>Работа с тестами</legend>
						<div id="tests_action_panel">
							<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#addTestDialog">Добавить</a>
							<a class="btn btn-primary btn-block">Удалить выбранный тест</a>
							<a class="btn btn-primary btn-block">Изменить</a>
						</div>
					</fieldset>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Добавить новость</h2>
					<form name="add_news" method="POST">
						<div class="form-group">
							<label>Заголовок</label>
							<input type="text" name="caption" class="form-control">
						</div>
						<div class="form-group">
							<label>Контент</label>
							<textarea name="content" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Автор</label>
							<p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</p>
							<input type="hidden" name="author_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
">
						</div>
						<div class="form-group">
							<label>Дата публикации</label>
							<input type="date" name="date_publication" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="addNewsButton" class="btn btn-primary pull-right" value="Опубликовать">
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="teacher_news">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#teacher_news" href="#my_news">Мои опубликованные новости</a></h4>
							</div>
							<div id="my_news" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
										<tr>
											<td>Заголовок</td>
											<td>Дата публикации</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- Modals Dialog -->
		
		<div class="modal fade" id="addTestDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="addTest" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Добавление нового теста</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Название теста</label>
								<input type="text" name="caption" class="form-control">
							</div>
							<div class="form-group">
								<label>Предмет</label>
								<select name="subject" class="form-control">
									<?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_1_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_1_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value['id_subject'];?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value['description'];?>
</option>
									<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_local_item;
}
if ($__foreach_subject_1_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_item;
}
?>
								</select>
							</div>
							<div class="form-group">
								<label>Автор</label>
								<p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</p>
								<input type="hidden" name="author_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Добавить</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
	</body>
</html><?php }
}
