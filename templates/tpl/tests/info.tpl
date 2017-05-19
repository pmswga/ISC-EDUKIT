<!DOCTYPE html>
<html>
	<head>
		<title>Подробнее о тесте</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="../user.php" class="navbar-brand">УКИТ</a>
						</div>
						<div class="collapse navbar-collapse" id="menu">
							<ul class="nav navbar-nav pull-right">
								<li><a href="../user.php">Профиль</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<fieldset>
						<legend>Общая информация</legend>
						<form name="editTestForm" method="POST">
							<div class="form-group">
								<table class="table table-striped">
									<tr>
										<td>Название теста</td>
										<td><input type="text" name="testName" value="{$test->getCaption()}" class="form-control"></td>
									</tr>
									<tr>
										<td>Предмет</td>
										<td>
											<select name="subject" class="form-control">
												<option value="{$test->getSubject()->getSubjectID()}">{$test->getSubject()->getDescription()}</option>
												{foreach from=$subjects item=subject}
                          <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
												{/foreach}
											</select>
										</td>
									</tr>
									<tr>
										<td>Автор</td>
										<td>{$test->getAuthor()}</td>
									</tr>
									<tr>
										<td>Кол-во вопросов</td>
										<td>{count($test->getQuestions())}</td>
									</tr>
								</table>
							</div>
							<div class="form-group">
								<input type="submit" name="saveTestInfoButton" value="Сохранить изменения" class="btn btn-primary">
							</div>
						</form>
					</fieldset>
					<fieldset>
						<legend>Статистика</legend>
					</fieldset>
				</div>
				<div class="col-md-8">						
					<div class="panel-group" id="testInfo">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-12">
										<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#questions">Вопросы</a></h4>
									</div>
								</div>
							</div>
							<div id="questions" class="panel-collapse collapse">
								<div class="panel-body">
									<form name="workWithQuestionsForm" method="POST">
										<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addQuestionsDialog">Добавить</a>
                    <input type="submit" name="editQuestionButton" value="Изменить" class="btn btn-warning btn-sm">
										<input type="submit" name="removeQuestionButton" value="Удалить" class="btn btn-danger btn-sm">
										<br>
										<br>
										<table class="table table-hover">
											<tr>
												<th>Вопрос</th>
												<th>Правильный ответ</th>
												<th>Варианты ответа</th>
												<th>Выбрать</th>
											</tr>
											{foreach from=$test->getQuestions() item=question}
												<tr>
													<td><input type="text" name="question[]" value="{$question->getQuestion()}" class="form-control"></td>
													<td><input type="text" name="questionRAnswer[]" value="{$question->getRAnswer()}" class="form-control"></td>
													<td>
														<ul>
														{foreach from=$question->getAnswers() item=answer}
															<li>{$answer['answer']}</li>
														{/foreach}
														</ul>
													</td>
													<td><input type="checkbox" name="select_question[]" value="{$question->getQuestionID()}" class="form-control"></td>
												</tr>
											{/foreach}
										</table>
									</form>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-11">
											<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#for_groups">Для групп</a></h4>
										</div>
										<div class="col-md-1">
										</div>
									</div>
								</div>
								<div id="for_groups" class="panel-collapse collapse">
									<div class="panel-body">
										<form name="unsetGroupFrom" method="POST">
											<input type="hidden" name="test_id" value="{$test->getTestID()}"> 
											<a data-toggle="modal" data-target="#setGroupsDialog" class="btn btn-primary btn-sm">Добавить</a>
											<input type="submit" name="unsetGroupButton" value="Удалить" class="btn btn-danger btn-sm">
											<br>
											<br>
											<table class="table table-hover">
												<tr>
													<th>Группа</th>
													<th>Специальность</th>
													<th>Выбрать</th>
												</tr>
												{foreach from=$test->getGroups() item=group}
													<tr>
														<td>{$group->getNumberGroup()}</td>
														<td>{$group->getSpec()->getCode()}</td>
														<td>
															<input type="checkbox" name="select_group[]" value="{$group->getGroupID()}" class="form-control">
														</td>
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
		
		<!-- Modals -->
		
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
									<p class="static">{$test->getCaption()}</p>
									<input type="hidden" name="test_id" value="{$test->getTestID()}">
								</div>
								<div class="form-group">
									<label>Группы</label>
									<table class="table table-bordered">
										<tr>
											<th>Группа</th>
											<th>Специальность</th>
											<th>Выбрать</th>
										</tr>
										{foreach from=$other_groups item=group}
											<tr>
												<td>{$group->getNumberGroup()}</td>
												<td>{$group->getCode()}</td>
												<td><input type="checkbox" name="select_group[]" value="{$group->getGroupID()}" class="form-control"></td>
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
                    <option value="{$test->getTestID()}">{$test->getCaption()}</option>
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
		
		<script type="text/javascript">
			
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
				
			});
			
		</script>
    
	</body>
</html>