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
          <div class="row">
            <div class="col-md-12">
              <h2>Отметка посещаемости</h2>
              {if $sogroups != NULL}
                <form name="commitTrafficForm" method="POST">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td>Кол-во пар сегодня</td>
                        <td><input type="number" name="count_pairs" min="1" max="5" value="1" class="form-control"></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Студент</td>
                        <td>Кол-во посещённых пар</td>
                      </tr>
                      {foreach from=$sogroups item=it}
                        <tr>
                          <td><a href=account.php?email={$it['email']}>{$it['sn']} {$it['fn']}</a></td>
                        <td><input type="number" name="traffic[{$it['email']}][]" min="1" value="1" max="1" class="traff form-control"></td>
                        </tr>
                      {/foreach}
                        <tr>
                          <td><b>{$user->getSn()} {$user->getFn()}</b></td>
                        <td><input type="number" name="traffic[{$user->getEmail()}][]" min="1" value="1" max="1" class="traff form-control"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                      <tr><td colspan="2"><input type="submit" name="commitTrafficButton" value="Зафиксировать" class="btn btn-success"></td></tr>
                    </tfoot>
                  </table>
                </form>
              {else}
                <h4>Вы уже отметили посещаемость</h4>
              {/if}
            </div>
          </div>
					<div class="row">
            <div class="col-md-12">
              <h2>Моё расписание</h2>
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
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Моя посещаемость</h2>
          <div id="student_traffic">
            {if $traffic != NULL}
              {foreach from=$traffic item=traffic_entry}
                <div class="cube" 
                  data-toggle="popover" 
                  data-placement="top"                  
                  data-html="true"                  
                  title="{$traffic_entry['date_visit']|date_format:'d.m.Y'}" 
                  data-content="
                    <table class='table table-border'>
                      <tr>
                        <td>Пар</td>
                        <td>Посещено</td>
                        <td>Пропущено</td>
                      </tr>
                      <tr>
                        <td>{$traffic_entry['count_all_hours']/2}</td>
                        <td>{$traffic_entry['count_passed_hours']/2}</td>
                        <td>{($traffic_entry['count_all_hours']-$traffic_entry['count_passed_hours'])/2}</td>
                      </tr>
                    </table>">
                </div>
              {/foreach}
            {else}
              <h3>Похоже, что вы вообще не посещали колледж...</h3>
            {/if}
          </div>
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
													<tr>
													<td><a href="student/complete.php?test_id={$test->getTestID()}">{$test->getCaption()}</a></td>
													<td>{$test->getSubject()->getDescription()}</td>
													<td>{$test->getAuthorEmail()}</td>
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
												<th>Предмет</th>
												<th>Автор</th>
											</thead>
											<tbody>
												{foreach from=$completedTests item=test}
													<td>{$test->getCaption()}</td>
													<td>{$test->getSubject()->getDescription()}</td>
													<td>{$test->getAuthorEmail()}</td>
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
    
      $("[name='count_pairs']").change(function(){
        
        var count_pairs = $(this).val();
        
        $(".traff").each(function (index, value){          
          $(value).attr("max", count_pairs);
        });
        
      });
      
      $("[data-toggle='tooltip']").tooltip();
      $("[data-toggle='popover']").popover();
    
    </script>
    
	</body>
</html>