<section>
	<figure>
	<img src="img/ukit.png" width="100%" alt="">
	</figure>
</section>
<nav id="menu" class="ui left vertical menu">
	<a href="index.php" class="item">
		<i class="main icon"></i>
		Главная
	</a>
	<a href="news.php" class="item">
		<i class="newspaper icon"></i>
		Новости
	</a>
	<a href="schedule.php" class="item">
		<i class="calendar icon"></i>
		Расписание
	</a>
	<a href="teachers.php" class="item">
		<i class="users icon"></i>
		Преподаватели
	</a>
	<a href="#" class="item" id="openRegStudentModal">
		<i class="add user icon"></i>
		Регистрация
	</a>
	<a href="#" class="item" id="openSignInModal">
		<i class="sign in icon"></i>
		Вход
	</a>
</nav>
<script type="text/javascript">

	$("#openRegStudentModal").on("click", function() {
		$("#regStudentModal.modal").modal("show");
	});

	$("#openSignInModal").on("click", function(){
		$("#signInModal.modal").modal("show");
	});

</script>