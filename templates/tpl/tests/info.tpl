<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<tr>
				<th>Название теста</th>
				<td><?= $test->getCaption(); ?></td>
			</tr>
			<tr>
				<th>Предмет</th>
				<td><?= $test->getSubject(); ?></td>
			</tr>
			<tr>
				<th>Автор</th>
				<td><?= $test->getAuthorEmail(); ?></td>
			</tr>
			<tr>
				<th>Кол-во вопросов</th>
				<td><?= count($test->getQuestions()); ?></td>
			</tr>
		</table>
	</div>
</div>


<div class="row">
	<div class="col-md-12">
		<div class="panel-group" id="testInfo">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#questions">Вопросы</a></h4>
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
		</div>
	</div>
</div>