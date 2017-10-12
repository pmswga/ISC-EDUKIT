<nav id="menu" class="ui left vertical menu">
	<a href="index.php" class="item">
		<i class="main icon"></i>
		Главная
	</a>
	<a href="news.php" class="item">
		<p>
			<i class="huge newspaper icon"></i>
		</p>
		<label for="">Новости</label>
	</a>
	<a href="schedule.php" class="item">
		<p>
			<i class="huge calendar icon"></i>
		</p>
		<label for="">Расписание</label>
	</a>
	<a href="teachers.php" class="item">
		<p>
			<i class="huge users icon"></i>
		</p>
		<label for="">Преподаватели</label>
	</a>
	<a href="#" class="item" id="openRegStudentModal">
		<p>
			<i class="huge add user icon"></i>
		</p>
		<label for="">Регистрация</label>
	</a>
	<a href="#" class="item" id="openSignInModal">
		<p>
			<i class="huge sign in icon"></i>
		</p>
		<label for="">Вход</label>
	</a>
</nav>
<!-- FIXME: -->
<div class="actions" style="text-align: center;">
	<a href="docs/EUD/index.html" class="ui button orange">
		Руководство пользователя
	</a>
</div>
<script type="text/javascript">

	$("#openRegStudentModal").on("click", function() {
		$("#regStudentModal.modal").modal("show");
	});

	$("#openSignInModal").on("click", function(){
		$("#signInModal.modal").modal("show");
	});

</script>