{assign var=title value="Личный кабинет"} {include file="../html/begin.tpl"}
<div class="ui stackable grid">
	<div class="row">
		<div class="three wide column">
			{include file='blocks/user_menu.tpl'}
		</div>
		<div class="thirteen wide column">
			<div class="ui top attached stackable tabular menu">
				<a class="item active" data-tab="main">Основное</a>
				<a class="item" data-tab="sogrous">Одногруппники</a>
				<a class="item" data-tab="testing">Тестирование</a>
				<a class="item" data-tab="traffic">Посещаемость</a>
			</div>
			<div class="ui bottom attached tab segment active" data-tab="main">
				<div class="ui stackable grid">
					<div class="ten wide column">
						{if $changed_schedules != NULL} 
							{foreach from=$changed_schedules key=grp item=schedule}
								<div id="groupSchedule" class="ui styled accordion">
									<div class="active title">
										Изменения
									</div>
									<div class="active content">
										{foreach from=$schedule key=day item=data}
										<div class="accordion">
											<div class="title">
												<h3>{$day|date_format:"d.m.Y"}</h3>
											</div>
											<div class="content">
												<table class="ui table bordered">
													<thead>
														<tr>
															<th>
																<h4>Пара</h4>
															</th>
															<th>
																<h4>Предмет</h4>
															</th>
														</tr>
													</thead>
													<tbody>
														{foreach from=$data item=entry}
															<tr>
																<td>{$entry['pair']}</td>
																<td>{$entry['subject']}</td>
															</tr>
														{/foreach}
													</tbody>
												</table>
											</div>
										</div>
										{/foreach}
									</div>
								</div>
							{/foreach} 
						{/if}
						<br>
						{if $schedules != NULL} 
							{foreach from=$schedules key=grp item=schedule}
								<div id="groupSchedule" class="ui styled accordion">
									<div class="active title">
										Основное расписание для {$grp}
									</div>
									<div class="active content">
										{foreach from=$schedule key=day item=data}
										<div class="accordion">
											<div class="title">
												<h3>{$day}</h3>
											</div>
											<div class="content">
												<table class="ui table bordered">
													<thead>
														<tr>
															<th>
																<h4>Пара</h4>
															</th>
															<th>
																<h4>Нижняя неделя</h4>
															</th>
															<th>
																<h4>Верхняя неделя</h4>
															</th>
														</tr>
													</thead>
													<tbody>
														{foreach from=$data item=entry}
														<tr>
															<td>{$entry['pair']}</td>
															{if $entry['subj_1'] == $entry['subj_2']}
															<td colspan="2">{$entry['subj_1']}</td>
															{else}
															<th>{$entry['subj_1']}</th>
															<th>{$entry['subj_2']}</th>
															{/if}
														</tr>
														{/foreach}
													</tbody>
												</table>
											</div>
										</div>
										{/foreach}
									</div>
								</div>
							{/foreach} 
						{else}
							<h3 align="center">
								<i class="massive red smile icon"></i>
								<br>
								Расписания пока нет
							</h3>
						{/if}
					</div>
					<div class="six wide column">
						<table class="ui table">
							<thead>
								<tr>
									<th colspan="2">
										<h4>Обо мне</h4>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="ui ribbon label">Фамилия</div>
									</td>
									<td>{$user->getSn()}</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Имя</div>
									</td>
									<td>{$user->getFn()}</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Отчество</div>
									</td>
									<td>{$user->getPt()}</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Email</div>
									</td>
									<td>{$user->getEmail()}</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Группа</div>
									</td>
									<td>{$user->getGroup()->getNumberGroup()}</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Сотовый телефон</div>
									</td>
									<td>{$user->getCellPhone()}</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Адрес</div>
									</td>
									<td>{$user->getHomeAddress()|default:"Не указан"}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="sogrous">
				<div class="ui stackable grid">
					<div class="sixteen wide column">
						{if $sogroups != NULL}
							<div id="teachers" class="ui link cards">
								{foreach from=$sogroups item=it}
									<div class="card">
										<div class="content">
											<div class="header">{$it['sn']} {$it['fn']}</div>
											<div class="meta">
												<a>Одногруппник</a>
											</div>
											<div class="description">
												<a href="mailto:{$it['email']}">{$it['email']}</a>
											</div>
										</div>
									</div>
								{/foreach}
							</div>
						{else}
							<h3 align="center">
								<i class="massive orange frown icon"></i>
								<br>
								Ваши одногруппники ещё не зарегистрировались
							</h3>
						{/if}
					</div>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="testing">
				<div class="ui stackable grid">
					<div class="ten wide column">
						{if $tests != NULL}
							<table class="ui table striped">
								<thead>
									<th>
										<h4>Название</h4>
									</th>
									<th>
										<h4>Предмет</h4>
									</th>
									<th>
										<h4>Автор</h4>
									</th>
								</thead>
								<tbody class="tests">
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
							<h3 align="center">
								<i class="massive yellow smile icon"></i>
								<br>
								Нет доступных тестов
							</h3>
						{/if}
					</div>
					<div class="six wide column">
						{if $completedTests != NULL}
							<table class="ui table striped">
								<thead>
									<tr>
										<th colspan="2">
											<h4>Результаты</h4>
										</th>
									</tr>
									<tr>
										<th>
											<h4>Название</h4>
										</th>
										<th>
											<h4>Дата сдачи</h4>
										</th>
									</tr>
								</thead>
								<tbody id="tests">
									{foreach from=$completedTests item=test}
									<tr>
										<td><a href="student/test.php?test={$test->getTestID()}">{$test->getCaption()}</a></td>
										<td>{$test->getDatePass()|date_format:'d.m.Y H:i:s'}</td>
									</tr>
									{/foreach}
								</tbody>
							</table>
						{else}
							<h3 align="center">
								<i class="massive green frown icon"></i>
								<br>
								Вы ещё не прошли ни одного теста
							</h3>
						{/if}
					</div>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="traffic">
				<div class="ui stackable grid">
					<div class="sixteen wide column">
						{if $traffic != NULL}
							<table class="ui table striped">
								<thead>
									<tr>
										<th>
											<h4>Дата</h4>
										</th>
										<th>
											<h4>Всего пар</h4>
										</th>
										<th>
											<h4>Посещено</h4>
										</th>
										<th>
											<h4>Пропущено</h4>
										</th>
									</tr>
								</thead>
								<tbody id="traffic">
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
							<h3 align="center">
								<i class="massive teal meh icon"></i>
								<br>
								Похоже, что вы вообще не посещали колледж
							</h3>
						{/if}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.menu .item').tab();
	$('.ui.accordion').accordion();
</script>
{include file="../html/end.tpl"}