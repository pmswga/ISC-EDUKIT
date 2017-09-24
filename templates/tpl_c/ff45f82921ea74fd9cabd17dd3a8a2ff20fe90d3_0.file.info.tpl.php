<?php
/* Smarty version 3.1.29, created on 2017-09-24 17:00:20
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\tests\info.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c7ba74d03724_11760375',
  'file_dependency' => 
  array (
    'ff45f82921ea74fd9cabd17dd3a8a2ff20fe90d3' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\tests\\info.tpl',
      1 => 1495272584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c7ba74d03724_11760375 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Подробнее о тесте</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/bootstrap.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="../user.php" class="navbar-brand">УКИТ</a>
						</div>
						<div class="collapse navbar-collapse" id="menu">
							<ul class="nav navbar-nav pull-right">
								<li><a href="../user.php">Профиль</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<fieldset>
						<legend>Общая информация</legend>
						<form name="editTestForm" method="POST">
							<div class="form-group">
								<table class="table table-striped">
									<tr>
										<td>Название теста</td>
										<td><input type="text" name="testName" value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
" class="form-control"></td>
									</tr>
									<tr>
										<td>Предмет</td>
										<td>
											<select name="subject" class="form-control">
												<option value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</option>
												<?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_0_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_0_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
												<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_local_item;
}
if ($__foreach_subject_0_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_item;
}
?>
											</select>
										</td>
									</tr>
									<tr>
										<td>Автор</td>
										<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getAuthor();?>
</td>
									</tr>
									<tr>
										<td>Кол-во вопросов</td>
										<td><?php echo count($_smarty_tpl->tpl_vars['test']->value->getQuestions());?>
</td>
									</tr>
								</table>
							</div>
							<div class="form-group">
								<input type="submit" name="saveTestInfoButton" value="Сохранить изменения" class="btn btn-primary">
							</div>
						</form>
					</fieldset>
					<fieldset>
						<legend>Статистика</legend>
					</fieldset>
				</div>
				<div class="col-md-8">						
					<div class="panel-group" id="testInfo">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-12">
										<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#questions">Вопросы</a></h4>
									</div>
								</div>
							</div>
							<div id="questions" class="panel-collapse collapse">
								<div class="panel-body">
									<form name="workWithQuestionsForm" method="POST">
										<a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addQuestionsDialog">Добавить</a>
                    <input type="submit" name="editQuestionButton" value="Изменить" class="btn btn-warning btn-sm">
										<input type="submit" name="removeQuestionButton" value="Удалить" class="btn btn-danger btn-sm">
										<br>
										<br>
										<table class="table table-hover">
											<tr>
												<th>Вопрос</th>
												<th>Правильный ответ</th>
												<th>Варианты ответа</th>
												<th>Выбрать</th>
											</tr>
											<?php
$_from = $_smarty_tpl->tpl_vars['test']->value->getQuestions();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_question_1_saved_item = isset($_smarty_tpl->tpl_vars['question']) ? $_smarty_tpl->tpl_vars['question'] : false;
$_smarty_tpl->tpl_vars['question'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['question']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
$__foreach_question_1_saved_local_item = $_smarty_tpl->tpl_vars['question'];
?>
												<tr>
													<td><input type="text" name="question_<?php echo $_smarty_tpl->tpl_vars['question']->value->getQuestionID();?>
" value="<?php echo $_smarty_tpl->tpl_vars['question']->value->getQuestion();?>
" class="form-control"></td>
													<td><input type="text" name="questionRAnswer_<?php echo $_smarty_tpl->tpl_vars['question']->value->getQuestionID();?>
" value="<?php echo $_smarty_tpl->tpl_vars['question']->value->getRAnswer();?>
" class="form-control"></td>
													<td>
														<ul>
														<?php
$_from = $_smarty_tpl->tpl_vars['question']->value->getAnswers();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_answer_2_saved_item = isset($_smarty_tpl->tpl_vars['answer']) ? $_smarty_tpl->tpl_vars['answer'] : false;
$_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['answer']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
$__foreach_answer_2_saved_local_item = $_smarty_tpl->tpl_vars['answer'];
?>
															<li><?php echo $_smarty_tpl->tpl_vars['answer']->value['answer'];?>
</li>
														<?php
$_smarty_tpl->tpl_vars['answer'] = $__foreach_answer_2_saved_local_item;
}
if ($__foreach_answer_2_saved_item) {
$_smarty_tpl->tpl_vars['answer'] = $__foreach_answer_2_saved_item;
}
?>
														</ul>
													</td>
													<td><input type="checkbox" name="select_question[]" value="<?php echo $_smarty_tpl->tpl_vars['question']->value->getQuestionID();?>
" class="form-control"></td>
												</tr>
											<?php
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_1_saved_local_item;
}
if ($__foreach_question_1_saved_item) {
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_1_saved_item;
}
?>
										</table>
									</form>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-md-11">
											<h4 class="panel-title"><a data-toggle="collapse" data-parent="#testInfo" href="#for_groups">Для групп</a></h4>
										</div>
										<div class="col-md-1">
										</div>
									</div>
								</div>
								<div id="for_groups" class="panel-collapse collapse">
									<div class="panel-body">
										<form name="unsetGroupFrom" method="POST">
											<input type="hidden" name="test_id" value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"> 
											<a data-toggle="modal" data-target="#setGroupsDialog" class="btn btn-primary btn-sm">Добавить</a>
											<input type="submit" name="unsetGroupButton" value="Удалить" class="btn btn-danger btn-sm">
											<br>
											<br>
											<table class="table table-hover">
												<tr>
													<th>Группа</th>
													<th>Специальность</th>
													<th>Выбрать</th>
												</tr>
												<?php
$_from = $_smarty_tpl->tpl_vars['test']->value->getGroups();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_3_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_3_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
													<tr>
														<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</td>
														<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getSpec()->getCode();?>
</td>
														<td>
															<input type="checkbox" name="select_group[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
" class="form-control">
														</td>
													</tr>
												<?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_3_saved_local_item;
}
if ($__foreach_group_3_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_3_saved_item;
}
?>
											</table>
										</form>
									</div>
								</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
		
		<!-- Modals -->
		
		<div class="modal fade" id="setGroupsDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="setGroupsForm" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Назначить группы на тест</h4>
						</div>
						<div class="modal-body">
								<div class="form-group">
									<label>Тест</label>
									<p class="static"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</p>
									<input type="hidden" name="test_id" value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
">
								</div>
								<div class="form-group">
									<label>Группы</label>
									<table class="table table-bordered">
										<tr>
											<th>Группа</th>
											<th>Специальность</th>
											<th>Выбрать</th>
										</tr>
										<?php
$_from = $_smarty_tpl->tpl_vars['other_groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_4_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_4_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getCode();?>
</td>
												<td><input type="checkbox" name="select_group[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
" class="form-control"></td>
											</tr>
										<?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_4_saved_local_item;
}
if ($__foreach_group_4_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_4_saved_item;
}
?>
									</table>
								</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="setGroupsButton" value="Назначить группы" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
    
		<div class="modal fade" id="addQuestionsDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="addQuestionForm" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Добавление вопроса</h4>
						</div>
						<div class="modal-body">
								<div class="form-group">
									<label>Тест</label>
									<select name="question_test" class="form-control">
                    <option value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</option>
									</select>
								</div>
								<div class="form-group">
									<label>Вопрос</label>
									<input type="text" name="question_caption" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Правильный ответ</label>
									<input type="text" name="question_r_answer" class="form-control" required>
								</div>
								<div class="form-group">
									<fieldset>
										<legend>Ответы <button type="button" name="addAnswer" class="btn btn-xs btn-primary">+</button></legend>
										<table id="question_answers" class="table table-border">
											<tr>
												<th>Ответ</th>
												<th>Выбрать</th>
											</tr>
										</table>
									</fieldset>
								</div>
								<div class="form-group">
								</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="addQuestionButton" value="Добавить вопрос" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<?php echo '<script'; ?>
 type="text/javascript">
			
			var count_answers = 0;
			var min_count_answers = 4;
			var max_count_answers = 9;
			
			$("[name='addAnswer']").click(function(){
				
				if (count_answers < max_count_answers) {
					$("#question_answers").append("<tr><td><input type='text' name='answer_text[]' class='form-control'></td><td><input type='checkbox' name='select_answers[]' value='' checked class='form-control'></td></tr>");
					count_answers++;
				} else {
					alert("Достигнуто максимальное кол-во ответов");
				}
				
			});
			
		<?php echo '</script'; ?>
>
    
	</body>
</html><?php }
}
