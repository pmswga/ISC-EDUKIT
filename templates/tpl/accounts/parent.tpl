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
      {include file='users/menu.tpl'}
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Мои дети</h2>
					<div class="panel-group" id="accordion">
						{if $childs != NULL}
              {$i = 0}
							{foreach from=$childs item=child}
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion">{$child['student']->getSn()} {$child['student']->getFn()} {$child['student']->getPt()}</a>
										</h4>
									</div>
									<div class="panel-collapse collapse in">
										<div class="panel-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="circle">
                            <figure style="text-align: center;">
                              <img src="img/people.jpg" width="25%">
                            </figure>
                          </div>
													<fieldset>
														<legend style="text-align: center;"></legend>
														<table class="table table-striped">
															<tr>
																<td>Email:</td>
																<td>{$child['student']->getEmail()}</td>
															</tr>
															<tr>
																<td>Группа:</td>
																<td>{$child['student']->getGroup()->getNumberGroup()}</td>
															</tr>
															<tr>
																<td>Телефон:</td>
																<td>{$child['student']->getCellPhone()}</td>
															</tr>
															<tr>
																<td>Адрес:</td>
																<td>{$child['student']->getHomeAddress()}</td>
															</tr>
															<tr>
																<td>Специальность:</td>
																<td>{$child['student']->getGroup()->getSpec()->getDescription()}</td>
															</tr>
															<tr>
																<td>Код специальности:</td>
																<td>{$child['student']->getGroup()->getSpec()->getCode()}</td>
															</tr>
														</table>
													</fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel-group" id="detail_info">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#detail_info" href="#record">Успеваемость</a>
                                </h4>
                              </div>
                              <div class="panel-collapse collapse" id="record">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      {if $child['tests'] != NULL}
                                        <table class="table table-striped">
                                          <tr>
                                            <th>Название теста</th>
                                            <th>Предмет</th>
                                            <th>Оценка</th>
                                          </tr>                                        
                                          {foreach from=$child['tests'] item=test}
                                            <tr>
                                              <td>{$test->getCaption()}</td>
                                              <td>{$test->getSubject()}</td>
                                              <td>{$test->getMark()}</td>
                                            </tr>
                                          {/foreach}
                                        </table>
                                      {else}
                                          <h3>Пока что пройденные тестов не было</h3>
                                      {/if}
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#traffic_{$i}">Результаты тестирования</a>
                                </h4>
                              </div>
                              <div class="panel-collapse collapse" id="traffic_{$i}">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div id="student_traffic">
                                        {if $child['traffic'] != NULL}
                                          <table class="table table-border">
                                            <tbody>
                                              <tr>
                                                <th>Дата</th>
                                                <th>Всего пар</th>
                                                <th>Посещено</th>
                                                <th>Пропущено</th>
                                              </tr>
                                              {foreach from=$child['traffic'] item=traffic_entry}
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
                                          <h3>Похоже, что ваш ребёнок вообще не посещали колледж...</h3>
                                        {/if}
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
										</div>
									</div>
								</div>
                {$i = $i + 1}
							{/foreach}
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
								<td>Возраст</td>
								<td>{$user->getAge()}</td>
							</tr>
							<tr>
								<td>Домашний телефон</td>
								<td>{$user->getHomePhone()}</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td>{$user->getCellPhone()}</td>
							</tr>
							<tr>
								<td>Место работы</td>
								<td>{$user->getWorkPlace()}</td>
							</tr>
							<tr>
								<td>Должность</td>
								<td>{$user->getPost()}</td>
							</tr>
						</table>
					</fieldset>
				</div>
			</div>
		</div>
    
    <script type="text/javascript">
      
      $("[data-toggle='tooltip']").tooltip();
      $("[data-toggle='popover']").popover();
    
    </script>
    
	</body>
</html>