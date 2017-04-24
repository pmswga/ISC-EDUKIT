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
			
		</style>
	</head>
	<body>
		<div class="container-fluid">
			{include file="users/menu.tpl"}
			<div class="row">
				<div class="col-md-12">
					<h1>{$fio}</h1>
				</div>
			</div>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Моё расписание</h2>
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
								<td>Группа</td>
								<td>{$user->getGroup()}</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td>{$user->getCellPhone()}</td>
							</tr>
							<tr>
								<td>Адрес</td>
								<td>{$user->getHomeAddress()|default:"Не указан"}</td>
							</tr>
						</table>
					</fieldset>
					<div class="panel-group" id="u">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Мои одногруппники</a></h4>
							</div>
							<div id="u_teachers" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table table-bordered">
										{foreach from=$sogroups item=it}
											<tr><td><a href=account.php?email={$it['email']}>{$it['sn']} {$it['fn']}</a></td></tr>
										{/foreach}
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Моя посещаемость</h2>
          <img src="img/calendar.jpg">
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="tests">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#tests" href="#s_tests">Тесты</a></h4>
							</div>
							<div id="s_tests" class="panel-collapse collapse">
								<div class="panel-body">
									{if $tests != NULL}
										<table class="table table-bordered">
											<thead>
												<th>Название</th>
												<th>Предмет</th>
												<th>Автор</th>
											</thead>
											<tbody>
												{foreach from=$tests item=test}
													<td><a href="#">{$test->getCaption()}</a></td>
													<td>{$test->getSubject()->getDescription()}</td>
													<td>{$test->getAuthorEmail()}</td>
												{/foreach}
											</tbody>
										</table>
									{else}
										<h2>Нету доступных тестов</h2>
									{/if}
								</div>
							</div>
						</div>
					</div>
					<div class="panel-group" id="completes_tests">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#completes_tests" href="#c_tests">Пройденные тесты</a></h4>
							</div>
							<div id="c_tests" class="panel-collapse collapse">
								<div class="panel-body">
									{if $completedTests != NULL}
										<table class="table table-bordered">
											<thead>
												<th>Название</th>
												<th>Предмет</th>
												<th>Автор</th>
											</thead>
											<tbody>
												{foreach from=$completedTests item=test}
													<td><a href="#">{$test->getCaption()}</a></td>
													<td>{$test->getSubject()->getDescription()}</td>
													<td>{$test->getAuthorEmail()}</td>
												{/foreach}
											</tbody>
										</table>
									{else}
										<h2>Нету пройденных тестов</h2>
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>