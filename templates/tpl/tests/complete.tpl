<!DOCTYPE html>
<html>
	<head>
		<title>Прохождение теста</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
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
                <td><p>{count($test->getQuestions())}</p></td>
              </tr>
            </tbody>
          </table>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<form name="completeTestForm" method="POST">
								<div class="form-group">
                  <a href="../user.php" class="btn btn-warning">Назад</a>
									<input type="submit" name="completeTestButton" value="Сдать" class="btn btn-success pull-right">
								</div>
                {$question_n = 1}
                {$questions = $test->getQuestions()}
                {if shuffle($questions) == true}                
                  {foreach from=$questions item=question}
                    <div class="form-group">
                      <label>{$question->getQuestion()}</label>
                      <input type="hidden" name="questions[]" value="{$question->getQuestion()}">
                      <table class="table table-hover">
                        <tbody>
                          {$answers = $question->getAnswers()}
                          {if shuffle($answers) == true}                          
                            {foreach from=$answers item=answer}
                              <tr>
                                <td><input type="radio" name="answer_{$question_n}" value="{$answer['answer']}" class="form-control"></td>
                                <td>{$answer['answer']}</td>
                              </tr>
                            {/foreach}
                          {else}
                            <h2 align="center">Произошла ошибка при перемещивании вариантов ответов</h2>
                          {/if}
                        </tbody>
                      </table>
                    </div>
                  {$question_n =$question_n + 1}
                  {/foreach}
                {else}
                  <h2 align="center">Произошла ошибка при перемещивании вопросов, повторите попытку позже</h2>
                {/if}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>