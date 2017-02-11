<?php
/* Smarty version 3.1.29, created on 2017-02-11 23:22:53
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\accounts\parent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_589f729df38f83_45472213',
  'file_dependency' => 
  array (
    'e208633226cbf4fff20d6a865e62d2bfe60dfd4e' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\accounts\\parent.tpl',
      1 => 1486844573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_589f729df38f83_45472213 ($_smarty_tpl) {
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
					<h2>Мои дети</h2>
					<div class="panel-group" id="accordion">
						<?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getChilds();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_0_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_0_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion"><?php echo $_smarty_tpl->tpl_vars['child']->value['child']->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['child']->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['child']->getPt();?>
 </a>
                  </h4>
                </div>
                <div class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="circle">
                        
                        </div>
                      </div>
                      <div class="col-md-6">
                        <fieldset>
                          <legend style="text-align: center;">Информация о ребёнке</legend>
                          <table class="table table-striped">
                            <tr>
                              <td>Email:</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['child']->value['child']->getEmail();?>
</td>
                            </tr>
                            <tr>
                              <td>Группа:</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['child']->value['child']->getGroup();?>
</td>
                            </tr>
                            <tr>
                              <td>Телефон:</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['child']->value['child']->getCellPhone();?>
</td>
                            </tr>
                            <tr>
                              <td>Отношения:</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['child']->value['type_relation'];?>
</td>
                            </tr>
                          </table>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
						<?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_local_item;
}
if ($__foreach_child_0_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_item;
}
?>
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
								<td>Возраст</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getAge();?>
</td>
							</tr>
							<tr>
								<td>Домашний телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getHomePhone();?>
</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
							</tr>
							<tr>
								<td>Место работы</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getWorkPlace();?>
</td>
							</tr>
							<tr>
								<td>Должность</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPost();?>
</td>
							</tr>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
