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
			
			h1, h2, h3, h4, h5, h6{
				text-align: center;
			}
			
		</style>
	</head>
	<body>
		<div class="container-fluid">
			{include file="users/menu.tpl"}
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<div class="panel-group" id="scheduleGroups">
            {if $changed_schedules != NULL}
              {foreach from=$changed_schedules key=grp item=schedule}
                <div class="panel panel-warning">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse">
                        Изменения для {$grp}
                      </a>
                    </h4>
                  </div>
                  <div id="{$grp}" class="panel-collapse collapse in">
                    <div class="panel-body">
                      {foreach from=$schedule key=day item=data}
                        <table class="table table-hover">
                          <thead>
                            <h3>{$day|date_format:'d.m.Y (l)'}</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Пара</th>
                              <th>Предмет</th>
                            </tr>
                            {foreach from=$data item=entry}
                              <tr>
                                <td>{$entry['pair']}</td>
                                <td>{$entry['subject']}</td>
                              </tr>
                            {/foreach}
                          </tbody>
                        </table>
                      {/foreach}
                    </div>
                  </div>
                </div>
              {/foreach}
            {else}
              <h3 align="center">Изменений нет</h3>
            {/if}
            {if $schedules != NULL}
              {foreach from=$schedules key=grp item=schedule}
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse">
                        Основное расписание для {$grp}
                      </a>
                    </h4>
                  </div>
                  <div id="{$grp}" class="panel-collapse collapse in">
                    <div class="panel-body">
                      {foreach from=$schedule key=day item=data}
                        <table class="table table-hover">
                          <thead>
                            <h3>{$day}</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Пара</th>
                              <th>Предмет</th>
                            </tr>
                            {foreach from=$data item=entry}
                              <tr>
                                <td>{$entry['pair']}</td>
                                <td>{$entry['subject']}</td>
                              </tr>
                            {/foreach}
                          </tbody>
                        </table>
                      {/foreach}
                    </div>
                  </div>
                </div>
              {/foreach}
            {else}
              <h3 align="center">Расписания нет</h3>
            {/if}
					</div>
				</div>
				<div class="col-md-4">
					<fieldset>
						<legend>Моя информация</legend>
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
							<tr>
								<td>Группа</td>
								<td>{$user->getGroup()->getNumberGroup()}</td>
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
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Одногруппники</a></h4>
							</div>
							<div id="u_teachers" class="panel-collapse collapse">
								<div class="panel-body">
                  {$i = 1}
									{if $sogroups != NULL}
										<table class="table table-bordered">
											{foreach from=$sogroups item=it}
												<tr>
                          <td>{$i}</td>
                          <td>{$it['sn']} {$it['fn']}</td>
                        </tr>
                        {$i = $i + 1}
											{/foreach}
										</table>
									{else}
										<h4>Ваши одногруппники ещё не зарегистрированны</h4>
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Посещаемость</h2>
          <div id="student_traffic">
            {if $traffic != NULL}
              <table class="table table-border">
                <tbody>
                  <tr>
                    <th>Дата</th>
                    <th>Всего пар</th>
                    <th>Посещено</th>
                    <th>Пропущено</th>
                  </tr>
                  {foreach from=$traffic item=traffic_entry}
                    <tr>
                      <td>{$traffic_entry['date_visit']|date_format:'d.m.Y'}</td>
                      <td>{$traffic_entry['count_all_hours']/2}</td>
                      <td>{$traffic_entry['count_passed_hours']/2}</td>
                      <td>{($traffic_entry['count_all_hours']-$traffic_entry['count_passed_hours'])/2}</td>
                    </tr>
                  {/foreach}
                </tbody>
              </table>
            {else}
              <h3>Похоже, что вы вообще не посещали колледж...</h3>
            {/if}
          </div>
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="tests">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#tests" href="#s_tests">Доступные тесты</a></h4>
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
													<tr>
													<td><a href="student/complete.php?test_id={$test->getTestID()}">{$test->getCaption()}</a></td>
													<td>{$test->getSubject()->getDescription()}</td>
													<td>{$test->getAuthor()}</td>
													</tr>
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
												<th>Дата</th>
											</thead>
											<tbody>
												{foreach from=$completedTests item=test}
                          <tr>
                            <td><a href="student/test.php?test={$test->getTestID()}">{$test->getCaption()}</a></td>
                            <td>{$test->getDatePass()|date_format:'d.m.Y H:i:s'}</td>
                          </tr>
												{/foreach}
											</tbody>
										</table>
									{else}
										<h4>Вы ещё не прошли ни одного теста</h4>
									{/if}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    
    <script type="text/javascript">
      
      $("[data-toggle='tooltip']").tooltip();
      $("[data-toggle='popover']").popover();
    
    </script>
    
	</body>
</html>