<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой аккаунт</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
		<div class="container-fluid">
			{include file="users/menu.tpl"}
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<h2>Мои тесты</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered">
										<tr>
											<th>Название</th>
											<th>Предмет</th>
											<th>Действие</th>
										</tr>
										{foreach from=$teachersTests item=teacherTest}
											<tr>
												<td>{$teacherTest->getCaption()}</td>
												<td>{$teacherTest->getSubject()}</td>
												<td style="display: flex; justify-content: space-around;">
													<!--<input type="checkbox" value="{$teacherTest->getTestID()}" class="form-control">-->
													<a href="teacher/aboutTest.php?test={$teacherTest->getTestID()}" class="btn btn-success btn-sm" >Подробнее</a>
													<form name="workWithTestsForm" method="POST">
														<input type="hidden" name="test_id" value="{$teacherTest->getTestID()}">
														<input type="submit" name="removeTestButton" value="Удалить" class="btn btn-danger btn-sm">
													</form>
												</td>
											</tr>
										{/foreach}
									</table>
								</div>
							</div>
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
					<div class="panel-group" id="controls">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#controls" href="#teachers_tests">Тесты</a></h4>
							</div>
							<div id="teachers_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#addTestDialog">Добавить</a>
									<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#addQuestionsDialog">Добавить вопросы</a>
									<a class="btn btn-primary btn-block" data-toggle="modal" data-target="#setGroupsDialog">Назначить группы на тест</a>
								</div>
							</div>
						</div>
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#controls" href="#teacher_subjects">Предметы</a></h4>
							</div>
							<div id="teacher_subjects" class="panel-collapse collapse">
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
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#controls" href="#teachers_news">Новости</a></h4>
							</div>
							<div id="teachers_news" class="panel-collapse collapse">
								<div class="panel-body">
									<form name="removeNewsForm" method="POST">
										<a data-toggle="modal" data-target="#addNewNews" class="btn btn-primary btn-block">Добавить</a>
										<input type="submit" name="removeNewsButton" value="Удалить" class="btn btn-danger btn-block">
										<h4>Опубликованные</h4>
										<table class="table table-bordered">
											<tr>
												<th>Заголовок</th>
												<th>Дата публикации</th>
												<th>Выбрать</th>
											</tr>
											{foreach from=$teachersNews item=teacherNews}
												<tr>
													<td>{$teacherNews->getCaption()}</td>
													<td>{$teacherNews->getDatePublication()|date_format: "%d.%m.%Y"}</td>
													<td><input type="checkbox" name="select_news[]" value="{$teacherNews->getNewsID()}" class="form-control"></td>
												</tr>
											{/foreach}
										</table>
									</form>
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
		
		<div class="modal fade" id="addNewNews">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Добавить новость</h4>
					</div>
					<form name="addNewsForm" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label>Заголовок</label>
								<input type="text" name="caption" class="form-control">
							</div>
							<div class="">
								<label>Контент</label>
								<textarea name="content" id="news" class="form-control"></textarea>
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
						</div>
						<div class="modal-footer">
							<input type="submit" name="addNewsButton" class="btn btn-primary pull-right" value="Опубликовать">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<div class="modal fade" id="addTestDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="addTestForm" method="POST">
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
								<input type="hidden" name="teacherEmail" value="{$user->getEmail()}">
							</div>
							<div class="form-group">
								<label>Группы</label>
								<table class="table table-bordered">
									<tr>
										<th>Группа</th>
										<th>Специальность</th>
										<th>Выбрать</th>
									</tr>
									{foreach from=$groups item=group}
										<tr>
											<td>{$group->getNumberGroup()}</td>
											<td>{$group->getCodeSpec()}</td>
											<td><input type="checkbox" name="select_group[]" value="{$group->getID()}" class="form-control"></td>
										</tr>
									{/foreach}
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="addTestButton" value="Добавить" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<div class="modal fade" id="addQuestionsDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="addQuestionForm" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Добавление вопроса</h4>
						</div>
						<div class="modal-body">
								<div class="form-group">
									<label>Тест</label>
									<select name="question_test" class="form-control">
										{foreach from=$teachersTests item=teacherTest}
											<option value="{$teacherTest->getTestID()}">{$teacherTest->getCaption()}</option>
										{/foreach}
									</select>
								</div>
								<div class="form-group">
									<label>Вопрос</label>
									<input type="text" name="question_caption" class="form-control">
								</div>
								<div class="form-group">
									<label>Правильный ответ</label>
									<input type="text" name="question_r_answer" class="form-control">
								</div>
								<div class="form-group">
									<fieldset>
										<legend>Ответы <button type="button" name="addAnswer" class="btn btn-xs btn-primary">+</button></legend>
										<table id="question_answers" class="table table-border">
											<tr>
												<th>Ответ</th>
												<th>Выбрать</th>
											</tr>
										</table>
									</fieldset>
								</div>
								<div class="form-group">
								</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="addQuestionButton" value="Добавить вопрос" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	
		
		<div class="modal fade" id="setGroupsDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="setGroupsForm" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Назначить группы на тест</h4>
						</div>
						<div class="modal-body">
								<div class="form-group">
									<label>Тест</label>
									<select name="question_test" class="form-control">
										{foreach from=$teachersTests item=teacherTest}
											<option value="{$teacherTest->getTestID()}">{$teacherTest->getCaption()}</option>
										{/foreach}
									</select>
								</div>
								<div class="form-group">
									<label>Группы</label>
									<table class="table table-bordered">
										<tr>
											<th>Группа</th>
											<th>Специальность</th>
											<th>Выбрать</th>
										</tr>
										{foreach from=$groups item=group}
											<tr>
												<td>{$group->getNumberGroup()}</td>
												<td>{$group->getCodeSpec()}</td>
												<td><input type="checkbox" name="select_group[]" value="{$group->getID()}" class="form-control"></td>
											</tr>
										{/foreach}
									</table>
								</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="setGroupsButton" value="Назначить группы" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
	
		<!-- <div class="modal fade" id="setGroupsDialog"> -->
			<!-- <div class="modal-dialog"> -->
				<!-- <div class="modal-content"> -->
					<!-- <form name="setGroupsForm" method="POST"> -->
						<!-- <div class="modal-header"> -->
							<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
							<!-- <h4 class="modal-title">Подробная информация</h4> -->
						<!-- </div> -->
						<!-- <div class="mdoal-body"> -->
										<!-- <div class="form-group"> -->
										
										<!-- </div> -->
										<!-- <div class="form-group"> -->
											
										<!-- </div> -->
										<!-- <div class="form-group"> -->
											<!-- <input type="submit" name="setGroupsButton" value="Назначить группы на тест" class="btn btn-primary"> -->
										<!-- </div> -->
						<!-- </div> -->
				<!-- </div> -->
						<!-- </div> -->
					<!-- </form> -->
			<!-- </div> -->
			<!-- </div> -->
		<!-- </div> -->
	
		<script type="text/javascript">
			
			CKEDITOR.replace("news");
			
			var count_answers = 0;
			var min_count_answers = 4;
			var max_count_answers = 10;
			
			$("[name='addAnswer']").click(function(){
				
				if (count_answers < max_count_answers) {					
					$("#question_answers").append("<tr><td><input type='text' name='answer_text[]' class='form-control'></td><td><input type='checkbox' name='select_answers[]' value='' checked class='form-control'></td></tr>");
					count_answers++;
				} else {
					alert("Достигнуто максимальное кол-во ответов");
				}
				
			})
			
		</script>
		
	</body>
</html>