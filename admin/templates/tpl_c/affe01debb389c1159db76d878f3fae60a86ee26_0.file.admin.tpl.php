<?php
/* Smarty version 3.1.29, created on 2017-03-16 13:57:51
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ca6faf44ff02_63011546',
  'file_dependency' => 
  array (
    'affe01debb389c1159db76d878f3fae60a86ee26' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\admin.tpl',
      1 => 1486558828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/notifications.tpl' => 1,
    'file:admin/users.tpl' => 1,
    'file:admin/news.tpl' => 1,
    'file:admin/specs_groups.tpl' => 1,
    'file:admin/subjects.tpl' => 1,
  ),
),false)) {
function content_58ca6faf44ff02_63011546 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Панель управления</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/main.css">
	  <link rel="stylesheet" href="css/vt.css">
	  <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
	  <?php echo '<script'; ?>
 src="js/bootstrap.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
          <?php if ($_smarty_tpl->tpl_vars['status']->value == -1) {?>
              <div class="alert alert-danger fade in bs-callout">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><?php echo $_smarty_tpl->tpl_vars['error_header']->value;?>
</h4>
                  <p><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>
              </div>
          <?php } elseif ($_smarty_tpl->tpl_vars['status']->value == 1) {?>
              <div class="alert alert-success fade in bs-callout">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><?php echo $_smarty_tpl->tpl_vars['error_header']->value;?>
</h4>
                  <p><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>
              </div>
          <?php }?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="adminInfo">
						<div id="logo">
							<figure>
								<img width="150" src="../img/ukit.png" alt="">
								<figcaption></figcaption>
							</figure>
						</div>
						<section id="info">
							<p><label>ФИО:</label> <?php echo $_smarty_tpl->tpl_vars['admin']->value->getSn();?>
</p>
							<p><label>E-mail:</label> <?php echo $_smarty_tpl->tpl_vars['admin']->value->getFn();?>
</p>
						</section>
					</div>
					<hr>
					<div class="col-md-2">
						<ul class="nav nav-tabs tabs-left">
							<li class="active"><a href="#faq" data-toggle="tab">Руководство</a></li>
              <li><a href="#notifications" data-toggle="tab">Оповещения</a></li>
							<li><a href="#users" data-toggle="tab">Пользователи</a></li>
							<li><a href="#news" data-toggle="tab">Новости</a></li>
							<li><a href="#tests" data-toggle="tab">Тесты</a></li>
							<li><a href="#subjects" data-toggle="tab">Предметы</a></li>
							<li><a href="#sepcs_groups" data-toggle="tab">Специальности/Группы</a></li>
							<li><a href="#settings" data-toggle="tab">Настройки</a></li>
							<li><a href="php/logout.php">Выйти</a></li>
						</ul>
					</div>
					<div class="col-md-10">
						<div class="tab-content">
							<div class="tab-pane active" id="faq">Руководство</div>
              <div class="tab-pane" id="notifications"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/notifications.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
							<div class="tab-pane" id="users"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
							<div class="tab-pane" id="news"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/news.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
							<div class="tab-pane" id="sepcs_groups"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/specs_groups.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
							<div class="tab-pane" id="subjects"><?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/subjects.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
							<div class="tab-pane" id="tests">Tests Tab.</div>
							<div class="tab-pane" id="settings">Settings Tab.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
