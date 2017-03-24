<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<td>Название теста</td>
				<td><?= $test->getCaption(); ?></td>
			</tr>
			<tr>
				<td>Предмет</td>
				<td><?= $test->getSubject(); ?></td>
			</tr>
			<tr>
				<td>Автор</td>
				<td><?= $test->getAuthorEmail(); ?></td>
			</tr>
			<tr>
				<td>Кол-во вопросов</td>
				<td><?= count($test->getQuestions()); ?></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel-group" id="testInfo">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#questions">Вопросы</a></h4>
						</div>
						<div class="col-md-2">
							<a class="btn btn-danger btn-sm ">-</a>
							<a class="btn btn-success btn-sm">+</a>
						</div>
					</div>
				</div>
				<div id="questions" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-hover">
							<tr>
								<th>Вопрос</th>
								<th>Правильный ответ</th>
								<th>Варианты ответа</th>
							</tr>
							<?php
								
								foreach ($test->getQuestions() as $q) {
									echo "<tr>";
									
									echo "<td>".$q->getQuestion()."</td>";
									echo "<td>".$q->getRAnswer()."</td>";
									echo "<td>";
									
									$answers = $q->getAnswers();
									
									echo "<ul>";
									for ($i = 0; $i < count($answers); $i++) {
										echo "<li>".$answers[$i]['answer']."</li>";
									}
									echo "</ul>";
									
									echo "</td>";
									
									echo "</tr>";
								}
								
							?>
						</table>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#for_groups">Для групп</a></h4>
						</div>
						<div class="col-md-2">
							<a class="btn btn-danger btn-sm ">-</a>
							<a class="btn btn-success btn-sm">+</a>
						</div>
					</div>
				</div>
				<div id="for_groups" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-hover">
							<tr>
								<th>Группа</th>
								<th>Специальность</th>
							</tr>
							<?php
								
								foreach ($test->getGroups() as $g) {
									echo "<tr>";
									
									echo "<td>".$g->getNumberGroup()."</td>";
									echo "<td>".$g->getCodeSpec()."</td>";
									
									echo "</tr>";
								}
								
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>