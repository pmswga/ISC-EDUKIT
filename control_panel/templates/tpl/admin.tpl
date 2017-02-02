<!DOCTYPE html>
<html>
	<head>
	  <title>Панель управления</title>
	  <meta charset="utf-8">
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/main.css">
	  <link rel="stylesheet" href="css/vt.css">
	  <script src="js/jquery.js"></script>
	  <script src="js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
						{if $status == -1}
							<div class="alert alert-danger fade in bs-callout">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>{$error_header}</h4>
								<p>{$error_message}</p>
							</div>
						{elseif $status == 1}
							<div class="alert alert-success fade in bs-callout">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4>{$error_header}</h4>
								<p>{$error_message}</p>
							</div>
						{/if}
				</div>
			</div>
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
							<p><label>ФИО:</label> {$admin->getSn()}</p>
							<p><label>E-mail:</label> {$admin->getFn()}</p>
						</section>
					</div>
					<hr/>
					<div class="col-md-2">
						<ul class="nav nav-tabs tabs-left">
							<li class="active"><a href="#faq" data-toggle="tab">Руководство</a></li>
							<li><a href="#users" data-toggle="tab">Пользователи</a></li>
							<li><a href="#news" data-toggle="tab">Новости</a></li>
							<li><a href="#tests" data-toggle="tab">Тесты</a></li>
							<li><a href="#subjects" data-toggle="tab">Предметы</a></li>
							<li><a href="#sepcs_groups" data-toggle="tab">Специальности/Группы</a></li>
							<li><a href="#settings" data-toggle="tab">Настройки</a></li>
							<li><a href="php/logout.php">Выйти</a></li>
						</ul>
					</div>
					<div class="col-md-10">
						<div class="tab-content">
							<div class="tab-pane active" id="faq">Руководство</div>
							<div class="tab-pane" id="users">{include file='admin/users.tpl'}</div>
							<div class="tab-pane" id="news">{include file='admin/news.tpl'}</div>
							<div class="tab-pane" id="sepcs_groups">{include file='admin/specs_groups.tpl'}</div>
							<div class="tab-pane" id="subjects">{include file='admin/subjects.tpl'}</div>
							<div class="tab-pane" id="tests">Tests Tab.</div>
							<div class="tab-pane" id="settings">Settings Tab.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>