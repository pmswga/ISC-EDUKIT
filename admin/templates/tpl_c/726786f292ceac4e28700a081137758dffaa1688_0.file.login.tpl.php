<?php
/* Smarty version 3.1.29, created on 2016-11-26 23:18:38
  from "C:\OpenServer\domains\edukit.mgkit\control_panel\templates\tpl\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5839ee1ee5fc43_28279784',
  'file_dependency' => 
  array (
    '726786f292ceac4e28700a081137758dffaa1688' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\control_panel\\templates\\tpl\\login.tpl',
      1 => 1480191517,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5839ee1ee5fc43_28279784 ($_smarty_tpl) {
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
			<div id="loginDiv" class="col-md-4">
				<h3>Вход в панель администратора</h3>
				<form id="loginForm" name="login" method="POST">
					<div class="form-group">
						<label>E-mail:</label>
						<input name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Пароль:</label>
						<input name="password" type="password" class="form-control" required>
					</div>
					<div class="form-group">
						<a href="../index.php" class="btn btn-warning">Назад</a>
						<input name="loginButton" type="submit" value="Войти" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
    </body>
</html><?php }
}
