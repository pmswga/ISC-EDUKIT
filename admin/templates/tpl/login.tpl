<!DOCTYPE html>
<html>
	<head>
    	<title>Вход в панель управления</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    	<script src="js/jquery.js"></script>
    	<script src="js/bootstrap.js"></script>
	</head>
    <body>
		<div class="container">
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
		</div>
    </body>
</html>