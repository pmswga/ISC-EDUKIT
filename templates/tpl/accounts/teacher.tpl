{include file="html/begin.tpl"}
	<div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
				{include file='blocks/user_menu.tpl'}  
			</div>
			<div class="thirteen wide column">
				<div class="ui top attached tabular menu">
					<a class="item active" data-tab="main">Основное</a>
					<a class="item" data-tab="news">Новости</a>
					<a class="item" data-tab="subjects">Предметы</a>
					<a class="item" data-tab="tests">Тесты</a>
				</div>
				<div class="ui bottom attached tab segment active" data-tab="main">
					<div class="ui stackable grid">
						<div class="ten wide column">
							{if $students_result != NULL}
								
							{else}
								<h3 align="center">
									<i class="massive red bar chart icon"></i>
									<br>
									Студенты ещё не проходили ваши тесты
								</h3>
							{/if}
						</div>
						<div class="six wide column">
							<table class="ui table">
								<thead>
									<tr>
										<th colspan="2"><h4>Обо мне</h4></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><div class="ui ribbon label">Фамилия</div></td>
										<td>{$user->getSn()}</td>
									</tr>
									<tr>
										<td><div class="ui ribbon label">Имя</div></td>
										<td>{$user->getFn()}</td>
									</tr>
									<tr>
										<td><div class="ui ribbon label">Отчество</div></td>
										<td>{$user->getPt()}</td>
									</tr>
									<tr>
										<td><div class="ui ribbon label">Email</div></td>
										<td>{$user->getEmail()}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="ui bottom attached tab segment" data-tab="news">
					<div class="ui stackable grid">
						<div class="eight wide column">
							{if $user->getNews() != NULL}
								{foreach from=$user->getNews() key=date item=one_news}
									<div class="ui card" style="width: 100%;">
										<div class="content">
											<div class="header">
												{$one_news->getCaption()}
											</div>
											<div class="meta">
												{$one_news->getDatePublication()|date_format:"d.m.Y"} 
											</div>
											<div class="description">
												{$one_news->getContent()|truncate:50}
											</div>
											<hr>
											<div class="meta">
												<form name="removeNewsButton" method="POST">
													<input type="hidden" name="news" value="{$one_news->getNewsID()}">
													<input type="submit" name="removeNewsButton" value="Удалить" class="ui negative button">
													<input type="submit" name="changeNewsButton" value="Изменить" class="ui orange button">
												</form>
											</div>
										</div>
									</div>
								{/foreach}
							{else}
								<h3 align="center">
									<i class="massive orange newspaper icon"></i>
									<br>
									Вы ещё не публиковали новости
								</h3>
							{/if}
						</div>
						<div class="eight wide column">
							<form name="addNewsForm" method="POST" class="ui form">
								<div class="field">
									<label>Заголовок</label>
									<input type="text" name="caption" required>
								</div>
								<div class="field">
									<label>Контент</label>
									<textarea name="content" id="news" required></textarea>
								</div>
								<div class="field">
									<label>Дата публикации</label>
									<input type="date" name="dp" value="{$date}" required>
								</div>
								<div class="field">
									<input type="submit" name="addNewsButton" class="ui primary button" value="Добавить новость">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="ui bottom attached tab segment" data-tab="subjects">
					<div class="ui stackable grid">
						<div class="ten wide column">
							{if $user->getSubjects() != NULL}
								<table class="ui table striped">
									<thead>
										<tr>
											<th><h4>Название</h4></th>
											<th><h4>Выбрать</h4></th>
										</tr>
									</thead>
									<tbody>
										{foreach from=$user->getSubjects() item=subject}
											<tr>
												<td>
													<i class="book icon"></i>
													{$subject->getDescription()}
												</td>
												<td style="text-align: center;"> <!-- FIXME: -->
													<form name="unsetSubjectForm" method="POST">
														<input type="hidden" name="subject" value="{$subject->getSubjectID()}">
														<input type="submit" name="unsetSubjectButton" value="Не вести" class="ui negative button">
													</form>
												</td>
											</tr>
										{/foreach}
									</tbody>
								</table>
							{else}
								<h3 align="center">
									<i class="massive yellow book icon"></i>
									<br>
									Вы не ведёте ни одного предмета
								</h3>
							{/if}
						</div>
						<div class="six wide column">
							<form name="setSubjectForm" method="POST" class="ui form">
								{if $unset_subjects != NULL}
									<table class="ui table">
										<thead>
											<tr>
												<th><h4>Название</h4></th>
												<th><h4>Выбрать</h4></th>
											</tr>
										</thead>
										<tbody>
											{foreach from=$unset_subjects item=subject}
												<tr>
													<td>{$subject->getDescription()}</td>
													<td style="text-align: center;"> <!-- FIXME: -->
														<div class="ui fitted checkbox">
															<input type="checkbox" name="select_subject[]" value="{$subject->getSubjectID()}">
															<label></label>
														</div>
													</td>
												<tr>
											{/foreach}
										</tbody>
									</table>
								{else}
									<h2 align="center">Пока что нет предметов</h2>
								{/if}
								<div class="field">
									<input type="submit" name="setSubjectButton" value="Вести предмет/предметы" class="ui primary button">
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="ui bottom attached tab segment" data-tab="tests">
					<div class="ui stackable grid">
						<div class="ten wide column">
							{if $user->getTests() != NULL}
								<table class="ui table striped">
									<thead>
										<tr>
											<th><h4>Название</h4></th>
											<th><h4>Предмет</h4></th>
											<th><h4>Действие</h4></th>
										</tr>
									</thead>
									<tbody class="tests">
										{foreach from=$user->getTests() item=test}
											<tr>
												<td>
													<i class="unordered list icon"></i>
													<a href="teacher/aboutTest.php?test={$test->getTestID()}">{$test->getCaption()}</a>
												</td>
												<td>{$test->getSubject()->getDescription()}</td>
												<td>
													<form name="removeTestForm" method="POST">
														<input type="hidden" name="test" value="{$test->getTestID()}">
														<input type="submit" name="removeTestButton" value="Удалить" class="ui negative button">
													</form>
												</td>
											</tr>
										{/foreach}
									</tbody>
								</table>
							{else}
								<h3 align="center">
									<i class="massive green unordered list icon"></i>
									<br>
									Вы ещё не создавали тесты
								</h3>
							{/if}
						</div>
						<div class="six wide column">
							<form name="addTestForm" method="POST" class="ui form">
								<div class="field">
									<label>Название теста</label>
									<input type="text" name="caption" class="form-control" required>
								</div>
								<div class="field">
									<label>Предмет</label>
									{if $user->getSubjects() != NULL}                
										<select name="subject" class="form-control" required>
											{foreach from=$user->getSubjects() item=subject}
												<option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
											{/foreach}
										</select>
									{else}
										<h4 align="center">
											Вы не ведёте ни одного предмета
										</h4>
									{/if}
								</div>
								<div class="field">
									<label>Для групп</label>
									{if $groups != NULL}
										<table class="ui table striped">
											<thead>
												<tr>
													<th><h4>Группа</h4></th>
													<th><h4>Специальность</h4></th>
													<th><h4>Выбрать</h4></th>
												</tr>
											</thead>
											<tbody class="tests">
												{foreach from=$groups item=group}
													<tr>
														<td>{$group->getNumberGroup()} ({$group->getYearEducation()})</td>
														<td>{$group->getSpec()->getCode()}</td>
														<td>
															<div class="ui fitted checkbox">
																<input type="checkbox" name="select_group[]" value="{$group->getGroupID()}">
																<label></label>
															</div>
														</td>
													</tr>
												{/foreach}
											</tbody>
										</table>
									{else}
										<h4 align="center">
											Группы ещё не сформированы
										</h4>
									{/if}
								</div>
								<div class="field">
									{if ($user->getSubjects() != NULL) && ($groups != NULL) }
										<input type="submit" name="addTestButton" value="Добавить" class="ui primary button">
									{else}
										<a class="ui primary disabled button">Добавить</a>
									{/if}
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		
		//CKEDITOR.replace("news");
		$('.menu .item').tab();
		$('.ui.accordion').accordion();
		
	</script>
{include file="html/end.tpl"}