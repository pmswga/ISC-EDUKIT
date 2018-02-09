<nav id="menu" class="ui left vertical menu">
	<div class="item">
		<a href="index.php" id="mainPage"><img src="../img/ukit.png" width="100%" alt=""></a>
	</div>
	<a href="news.php" class="item" id="newsPage">
		<div class="ui grid">
			<div class="two wide column">
				<i class="newspaper icon"></i>
			</div>
			<div class="fourteen wide column">
				Новости
			</div>
		</div>
	</a>
	<a href="schedule.php" class="item" id="schedulePage">
		<div class="ui grid">
			<div class="two wide column">
				<i class="calendar icon"></i>
			</div>
			<div class="fourteen wide column">
				Расписание
			</div>
		</div>
	</a>
	<a href="teachers.php" class="item" id="teacherPage">
		<div class="ui grid">
			<div class="two wide column">
				<i class="users icon"></i>
			</div>
			<div class="fourteen wide column">
				Преподаватели
			</div>
		</div>
	</a>
	<a href="#openedRegStudentModal" class="item" id="openRegStudentModal">
		<div class="ui grid">
			<div class="two wide column">
				<i class="add user icon"></i>
			</div>
			<div class="fourteen wide column">
				Регистрация
			</div>
		</div>
	</a>
	<a href="#openedSignInModal" class="item" id="openSignInModal">
		<div class="ui grid">
			<div class="two wide column">
				<i class="sign in icon"></i>
			</div>
			<div class="fourteen wide column">
				Вход
			</div>
		</div>
	</a>
</nav>
<!-- FIXME: -->
{*
<div class="actions" style="text-align: center;">
	<a href="docs/EUD/index.html" class="ui button orange">
		Руководство пользователя
	</a>
</div>
*}
<script type="text/javascript">

	$("#openRegStudentModal").on("click", function() {
		$("#regStudentModal.modal").modal("show");
	});

	$("#openSignInModal").on("click", function(){
		$("#signInModal.modal").modal("show");
	});

</script>