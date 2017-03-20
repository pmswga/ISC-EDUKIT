<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой аккаунт</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<style>
			
			h1, h2{
				text-align: center;
			}
			
			th {
				text-align: center;
			}
			
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>{$user->getSn()} {$user->getFn()} {$user->getPt()}</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{include file='users/menu.tpl'}
				</div>
			</div>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<h2>Мои тесты</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Название</th>
									<th>Тема</th>
									<th>Для групп</th>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<fieldset>
						<legend>Информация обо мне</legend>
						<table class="table table-striped">
							<tr>
								<td>Фамилия</td>
								<td>{$user->getSn()}</td>
							</tr>
							<tr>
								<td>Имя</td>
								<td>{$user->getFn()}</td>
							</tr>
							<tr>
								<td>Отчество</td>
								<td>{$user->getPt()}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>{$user->getEmail()}</td>
							</tr>
						</table>
					</fieldset>
					<div class="panel-group" id="u">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Мои предметы</a></h4>
							</div>
							<div id="u_teachers" class="panel-collapse collapse">
								<div class="panel-body">
									<form name="workWithSubjectForm" method="POST">
										<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#setSubjectDialog">Добавить</a>
										<input type="submit" name="deleteSubjectButton" value="Удалить" class="btn btn-danger btn-block">
										<br>
										<table class="table table-bordered">
											<tr>
												<th>Название</th>
												<th>Выбрать</th>
											</tr>
											{foreach from=$user->getSubjects() item=subject}
												<tr>
													<td>{$subject->getDescription()}</td>
													<td><input type="checkbox" name="select_subject[]" value="{$subject->getID()}" class="form-control"></td>
												</tr>
											{/foreach}
										</table>
									</form>
								</div>
							</div>
						</div>
					</div>
					<fieldset>
						<legend>Работа с тестами</legend>
						<div id="tests_action_panel">
							<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#addTestDialog">Добавить</a>
							<a class="btn btn-primary btn-block">Удалить выбранный тест</a>
							<a class="btn btn-primary btn-block">Изменить</a>
						</div>
					</fieldset>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Добавить новость</h2>
					<form name="addNewsForm" method="POST">
						<div class="form-group">
							<label>Заголовок</label>
							<input type="text" name="caption" class="form-control">
						</div>
						<div class="form-group">
							<label>Контент</label>
							<textarea name="content" rows="10" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label>Автор</label>
							<p class="form-control-static">{$user->getFn()} {$user->getSn()}</p>
							<input type="hidden" name="teacherEmail" value="{$user->getEmail()}">
						</div>
						<div class="form-group">
							<label>Дата публикации</label>
							<input type="date" name="dp" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="addNewsButton" class="btn btn-primary pull-right" value="Опубликовать">
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="teacher_news">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#teacher_news" href="#my_news">Мои опубликованные новости</a></h4>
							</div>
							<div id="my_news" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
										<tr>
											<td>Заголовок</td>
											<td>Дата публикации</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- Modals Dialog -->
		
		<div class="modal fade" id="setSubjectDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Выбрать предмет</h4>
					</div>
					<form name="setSubjectForm" method="POST">
						<div class="modal-body">
								<table class="table table-hover">
									<tr>
										<th>Название</th>
										<th>Выбрать</th>
									</tr>
									{foreach from=$subjects item=subject}
										<tr>
											<td>{$subject->getDescription()}</td>
											<td><input type="checkbox" name="select_subject[]" value="{$subject->getID()}" class="form-control"></td>
										<tr>
									{/foreach}
								</table>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="emailTeacher" value="{$user->getEmail()}">
							<input type="submit" name="setSubjectButton" value="Назначить" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<div class="modal fade" id="addTestDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="addTest" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Добавление нового теста</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Название теста</label>
								<input type="text" name="caption" class="form-control">
							</div>
							<div class="form-group">
								<label>Предмет</label>
								<select name="subject" class="form-control">
									{foreach from=$user->getSubjects() item=subject}
										<option value="{$subject->getID()}">{$subject->getDescription()}</option>
									{/foreach}
								</select>
							</div>
							<div class="form-group">
								<label>Автор</label>
								<p class="form-control-static">{$user->getFn()} {$user->getSn()}</p>
								<input type="hidden" name="author_email" value="{$user->getEmail()}">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Добавить</button>
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
	</body>
</html>