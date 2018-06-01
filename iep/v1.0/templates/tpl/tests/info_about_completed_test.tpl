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
            <div class="form-group">
              <table class="table table-striped">
                <tr>
                  <td>Название теста</td>
                  <td>{$test->getCaption()}</td>
                </tr>
                <tr>
                  <td>Предмет</td>
                  <td>{$test->getSubject()}</td>
                </tr>
                <tr>
                  <td>Оценка</td>
                  <td>{$test->getMark()}</td>
                </tr>
                <tr>
                  <td>Дата сдачи</td>
                  <td>{$test->getDatePass()|date_format:'d.m.Y H:i:s'}</td>
                </tr>
              </table>
            </div>
					</fieldset>
				</div>
				<div class="col-md-8">
          <table class="table table-hover">
            <tr>
              <th>Вопрос</th>
              <th>Ответ</th>
            </tr>
            {foreach from=$test->getAnswers() item=answer}
              <tr>
                <td>{$answer['question']}</td>
                <td>{$answer['answer']}</td>
              </tr>
            {/foreach}
          </table>
				</div>
			</div>
		</div>    
	</body>
</html>