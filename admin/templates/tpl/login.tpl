<!DOCTYPE html>
<html>
	<head>
		<title>EDUKIT | Аутентификация</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
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
		<script src="js/loginToCP.js"></script>
	</body>
</html>