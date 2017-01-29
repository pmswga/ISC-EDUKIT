<?php
/* Smarty version 3.1.29, created on 2016-11-26 23:23:55
  from "C:\OpenServer\domains\edukit.mgkit\control_panel\templates\tpl\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5839ef5bdd78d7_02462354',
  'file_dependency' => 
  array (
    '0fd145ed254ef442445e09b23b5f378e5d0d9cd6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\control_panel\\templates\\tpl\\admin.tpl',
      1 => 1480191835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5839ef5bdd78d7_02462354 ($_smarty_tpl) {
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
					<div id="adminInfo">
						<div id="logo">
							<figure>
								<img width="150" src="../img/ukit.png" alt="">
								<figcaption></figcaption>
							</figure>
						</div>
						<section id="info">
							<p><label>ФИО:</label> <?php echo $_smarty_tpl->tpl_vars['fio']->value;?>
</p>
							<p><label>E-mail:</label> <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
						</section>
					</div>
					<hr/>
					<div class="col-md-2">
						<ul class="nav nav-tabs tabs-left">
							<li class="active"><a href="#users" data-toggle="tab">Пользователи</a></li>
							<li><a href="#news" data-toggle="tab">Новости</a></li>
							<li><a href="#messages" data-toggle="tab">Тесты</a></li>
							<li><a href="#settings" data-toggle="tab">Настройки</a></li>
							<li><a href="php/logout.php">Выйти</a></li>
						</ul>
					</div>
					<div class="col-md-10">
						<div class="tab-content">
							<div class="tab-pane active" id="users">
								<table class="table table-hover">
									<thead><h3>Пользователи</h3></thead>
									<tr>
										<td>№<td>
										<td>Фамилия<td>
										<td>Имя<td>
										<td>Отчество<td>
										<td>E-mail<td>
									</tr>
									<tr>
										<td>1<td>
										<td>Басыров<td>
										<td>Сергей<td>
										<td>Амирович<td>
										<td>spqr@mail.ru<td>
									</tr>
								</table>
							</div>
							<div class="tab-pane" id="news">
								<table class="table table-hover">
									<thead><h3>Одобрить</h3></thead>
									<tr>
										<td>№<td>
										<td>Заголовок<td>
										<td>Содержание<td>
										<td>Автор<td>
										<td>Дата публикации<td>
									</tr>
									<tr>
										<td>1<td>
										<td>Новость<td>
										<td>Контент<td>
										<td>Басыров Сергей Амирович<td>
										<td><time>25.11.2016</time><td>
									</tr>
								</table>
								<table class="table table-hover">
									<thead><h3>Одобренные</h3></thead>
									<tr>
										<td>№<td>
										<td>Заголовок<td>
										<td>Содержание<td>
										<td>Автор<td>
										<td>Дата публикации<td>
									</tr>
									<tr>
										<td>1<td>
										<td>Новость<td>
										<td>Контент<td>
										<td>Басыров Сергей Амирович<td>
										<td><time>25.11.2016</time><td>
									</tr>
								</table>
							</div>
							<div class="tab-pane" id="messages">Messages Tab.</div>
							<div class="tab-pane" id="settings">Settings Tab.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
