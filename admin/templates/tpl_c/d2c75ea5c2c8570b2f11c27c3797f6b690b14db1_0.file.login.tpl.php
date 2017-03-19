<?php
/* Smarty version 3.1.29, created on 2017-03-19 15:37:17
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ce7b7d2bbc70_74293541',
  'file_dependency' => 
  array (
    'd2c75ea5c2c8570b2f11c27c3797f6b690b14db1' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\login.tpl',
      1 => 1489927036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ce7b7d2bbc70_74293541 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
    	<title>Вход в панель управления</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    	<?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
    	<?php echo '<script'; ?>
 src="js/bootstrap.js"><?php echo '</script'; ?>
>
	</head>
    <body>
		<div class="container">
			<div class="col-md-4"></div>
			<div id="loginDiv" class="col-md-4">
				<h3>Вход в панель администратора</h3>
				<form id="loginForm" name="login" method="POST">
					<div class="form-group">
						<label>E-mail:</label>
						<input name="email" type="email" class="form-control" value="admin@admin.ru" required>
					</div>
					<div class="form-group">
						<label>Пароль:</label>
						<input name="password" type="password" class="form-control" value="admin" required>
					</div>
					<div class="form-group">
						<a href="../index.php" class="btn btn-warning">Назад</a>
						<input name="loginButton" type="submit" value="Войти" class="btn btn-primary">
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
    </body>
</html><?php }
}
