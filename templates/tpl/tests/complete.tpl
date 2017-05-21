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
      <br>
			<div class="row">
				<div class="col-md-4">
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
                <td>{$test->getAuthor()}</td>
                <td>{count($test->getQuestions())}</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <table class="table table-bordered">
                    <thead>
                      <h3>Кто уже прошёл</h3>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Студент</td>
                        <td>Оценка</td>
                      </tr>
                      <tr>
                        <td>Студент 1</td>
                        <td>Студент 1</td>
                      </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </td>
              </tr>
            </tfoot>
          </table>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<form name="completeTestForm" method="POST">
								<div class="form-group">
                  <a href="../user.php" class="btn btn-warning">Назад</a>
									<input type="submit" name="completeTestButton" value="Сдать!" class="btn btn-success pull-right">
								</div>
                {$question_n = 1}
                {foreach from=$test->getQuestions() item=question}
                  <div class="form-group">
                    <label>{$question->getQuestion()}</label>
                    <input type="hidden" name="questions[]" value="{$question->getQuestion()}">
                    <table class="table table-hover">
                      <tbody>
                        {foreach from=$question->getAnswers() item=answer}
                          <tr>
                            <td><input type="radio" name="answer_{$question_n}" value="{$answer['answer']}" class="form-control"></td>
                            <td>{$answer['answer']}</td>
                          </tr>
                        {/foreach}
                      </tbody>
                    </table>
                  </div>
                {$question_n =$question_n + 1}
                {/foreach}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>