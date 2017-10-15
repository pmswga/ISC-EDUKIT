<?php
/* Smarty version 3.1.29, created on 2017-10-15 11:02:53
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e3162de811c8_01492393',
  'file_dependency' => 
  array (
    'abf7e2d240b7c38d22151000f3f450d16e946081' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\login.tpl',
      1 => 1493399106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e3162de811c8_01492393 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>EDUKIT | Аутентификация</title>
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
				<br><br><br><br><br>
				<h3 align="center">Вход в панель управления</h3>
				<form id="loginForm" name="loginCPForm" method="POST">
					<div class="form-group">
						<label>E-mail:</label>
						<input name="login" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Пароль:</label>
						<input name="paswd" type="password" class="form-control" required>
					</div>
					<div class="form-group">
						<a href="../index.php" class="btn btn-warning">Назад</a>
						<input name="loginCPButton" type="submit" value="Войти" class="btn btn-primary pull-right">
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
		<?php echo '<script'; ?>
 src="js/loginToCP.js"><?php echo '</script'; ?>
>
	</body>
</html><?php }
}
