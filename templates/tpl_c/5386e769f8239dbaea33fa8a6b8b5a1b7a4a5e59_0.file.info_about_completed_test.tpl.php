<?php
/* Smarty version 3.1.29, created on 2017-08-20 14:05:03
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\tests\info_about_completed_test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59996cdf04bac9_06049486',
  'file_dependency' => 
  array (
    '5386e769f8239dbaea33fa8a6b8b5a1b7a4a5e59' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\tests\\info_about_completed_test.tpl',
      1 => 1503227102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59996cdf04bac9_06049486 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Подробнее о тесте</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/bootstrap.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div class="container-fluid">
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
							<a href="../user.php" class="navbar-brand">УКИТ</a>
						</div>
						<div class="collapse navbar-collapse" id="menu">
							<ul class="nav navbar-nav pull-right">
								<li><a href="../user.php">Профиль</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<fieldset>
						<legend>Общая информация</legend>
            <div class="form-group">
              <table class="table table-striped">
                <tr>
                  <td>Название теста</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</td>
                </tr>
                <tr>
                  <td>Предмет</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject();?>
</td>
                </tr>
                <tr>
                  <td>Оценка</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getMark();?>
</td>
                </tr>
                <tr>
                  <td>Дата сдачи</td>
                  <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['test']->value->getDatePass(),'d.m.Y H:i:s');?>
</td>
                </tr>
              </table>
            </div>
					</fieldset>
				</div>
				<div class="col-md-8">
          <table class="table table-hover">
            <tr>
              <th>Вопрос</th>
              <th>Ответ</th>
            </tr>
            <?php
$_from = $_smarty_tpl->tpl_vars['test']->value->getAnswers();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_answer_0_saved_item = isset($_smarty_tpl->tpl_vars['answer']) ? $_smarty_tpl->tpl_vars['answer'] : false;
$_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['answer']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
$__foreach_answer_0_saved_local_item = $_smarty_tpl->tpl_vars['answer'];
?>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['answer']->value['question'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['answer']->value['answer'];?>
</td>
              </tr>
            <?php
$_smarty_tpl->tpl_vars['answer'] = $__foreach_answer_0_saved_local_item;
}
if ($__foreach_answer_0_saved_item) {
$_smarty_tpl->tpl_vars['answer'] = $__foreach_answer_0_saved_item;
}
?>
          </table>
				</div>
			</div>
		</div>    
	</body>
</html><?php }
}
