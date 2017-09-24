{assign var=title value="Личный кабинет"}
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
							Здесь результаты по пройденным тестам
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
											{$one_news->getContent()|truncate:350}
										</div>
										<hr>
										<div class="meta">
											<input type="submit" name="removeNewsButton" value="Удалить" class="ui negative button">
											<input type="submit" name="removeNewsButton" value="Изменить" class="ui orange button">
										</div>
									</div>
								</div>
							{/foreach}
						</div>
						<div class="eight wide column">
							<form name="" method="POST" class="ui form">
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
												<td>{$subject->getDescription()}</td>
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
								<h2>Выберете предметы</h2>
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
									<h2 align="center">Пока что нету предметов</h2>
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
												<td><a href="teacher/aboutTest.php?test={$test->getTestID()}">{$test->getCaption()}</a></td>
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
								<h2>Добавьте тесты</h2>
							{/if}
						</div>
						<div class="six wide column">
							<form name="addTestForm" method="POST" class="ui form">
								<div class="field">
									<label>Название теста</label>
									<input type="text" name="caption" class="form-control">
								</div>
								<div class="field">
									<label>Предмет</label>
									{if $user->getSubjects() != NULL}                
										<select name="subject" class="form-control">
											{foreach from=$user->getSubjects() item=subject}
												<option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
											{/foreach}
										</select>
									{else}
										<p>Вы не выбрали предметы, которые ведёте</p>
									{/if}
								</div>
								<div class="field">
									<label>Для групп</label>
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
								</div>
								<div class="field">
									<input type="submit" name="addTestButton" value="Добавить" class="ui primary button">
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