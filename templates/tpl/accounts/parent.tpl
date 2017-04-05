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
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>{$fio}</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{include file='users/menu.tpl'}
				</div>
			</div>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Мои дети</h2>
					<div class="panel-group" id="accordion">
						{if $user->getChilds() != NULL}
							{foreach from=$user->getChilds() item=child}
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion">{$child['child']->getSn()} {$child['child']->getFn()} {$child['child']->getPt()} </a>
										</h4>
									</div>
									<div class="panel-collapse collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-md-6">
													<div class="circle">
													
													</div>
												</div>
												<div class="col-md-6">
													<fieldset>
														<legend style="text-align: center;">Информация о ребёнке</legend>
														<table class="table table-striped">
															<tr>
																<td>Email:</td>
																<td>{$child['child']->getEmail()}</td>
															</tr>
															<tr>
																<td>Группа:</td>
																<td>{$child['child']->getGroup()}</td>
															</tr>
															<tr>
																<td>Телефон:</td>
																<td>{$child['child']->getCellPhone()}</td>
															</tr>
															<tr>
																<td>Отношения:</td>
																<td>{$child['type_relation']}</td>
															</tr>
														</table>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
							{/foreach}
						{/if}
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
	</body>
</html>