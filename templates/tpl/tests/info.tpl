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
							<a href="index.php" class="navbar-brand">УКИТ<!--<img src="img/ukit.png" width="50px" alt="">--></a>
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
						<form name="editQuestionForm" method="POST">
							<table class="table table-striped">
								<tr>
									<td>Название теста</td>
									<td><input type="text" name="testName" value="{$test->getCaption()}" class="form-control"></td>
								</tr>
								<tr>
									<td>Предмет</td>
									<td>
										<select name="subject" class="form-control">
											<option>{$test->getSubject()}</option>
											{foreach from=$subjects item=subject}
											<option>{$subject->getDescription()}</option>
											{/foreach}
										</select>
									</td>
								</tr>
								<tr>
									<td>Автор</td>
									<td>{$test->getAuthorEmail()}</td>
								</tr>
								<tr>
									<td>Кол-во вопросов</td>
									<td>{$test->getCountQuestions()}</td>
								</tr>
							</table>
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
										<input type="submit" name="removeQuestionButton" value="Удалить" class="btn btn-danger btn-sm">
										<input type="submit" name="editQuestionButton" value="Изменить" class="btn btn-warning btn-sm">
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
													<td><input type="checkbox" name="select_question_test[]" value="{$question->getID()}" class="form-control"></td>
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
										<form name="removeGroupFromTestForm" method="POST">
											<input type="hidden" name="test_id" value="{$test->getTestID()}"> 
											<input type="submit" name="removeGroupFromTestButton" value="Удалить" class="btn btn-danger btn-sm">
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
														<td>{$group->getCodeSpec()}</td>
														<td><input type="checkbox" name="select_group_test[]" value="{$group->getID()}" class="form-control"></td>
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
	</body>
</html>