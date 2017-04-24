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
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<form name="completeTestForm" method="POST">
								<table class="table table-striped">
									<thead>
										<th colspan="3"><h1 align="center">{$test->getCaption()}</h1></th>
									</thead>
									<tbody>
										<tr>
											<th>Предмет</th>
											<th>Автор</th>
											<th>Кол-во вопросов</th>
										</tr>
										<tr>
											<td>{$test->getSubject()->getDescription()}</td>
											<td>{$test->getAuthorName()}</td>
											<td>{$test->getCountQuestions()}</td>
										</tr>
									</tbody>
									<tfoot>
										{$question_n=1}
										{foreach from=$test->getQuestions() item=question}
											<tr>
												<td colspan="3">
													<div class="form-group">
														<label>{$question->getQuestion()}</label>
														<table class="table table-hover">
															<tbody>
																{foreach from=$question->getAnswers() item=answer}
																	<tr>
																		<td><input type="radio" name="question_{$question_n}" value="{$answer['id_answer']}" class="form-control"></td>
																		<td>{$answer['answer']}</td>
																	</tr>
																	{/foreach}
															</tbody>
														</table>
													</div>
												</td>
											</tr>
										{$question_n=$question_n+1}
										{/foreach}
									</tfoot>
								</table>
								<div class="form-group">
									<input type="submit" name="completeTestButton" value="Сдать" class="btn btn-success">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</body>
</html>