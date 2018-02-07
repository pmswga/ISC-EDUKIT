<div class="ui mini modal" id="signInModal">
	<div class="header">
		Вход в систему
	</div>
	<div class="content">
		<form name="signInForm" method="POST" action="php/login.php" class="ui form">
			<div class="field">
				<label>E-mail</label>
				<input type="email" name="email" id="studentEmail">
			</div>
			<div class="field">
				<label>Пароль</label>
				<input type="password" name="passwd" id="studentPassword">
			</div>
			<div class="field">
				<input type="submit" name="signInButton" value="Войти" class="ui primary button">
			</div>
		</form>
	</div>
</div>