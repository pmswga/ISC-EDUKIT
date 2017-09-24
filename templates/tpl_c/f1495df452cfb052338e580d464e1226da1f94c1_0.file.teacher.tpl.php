<?php
/* Smarty version 3.1.29, created on 2017-09-24 17:24:35
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\teacher.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c7c023b00a80_47976784',
  'file_dependency' => 
  array (
    'f1495df452cfb052338e580d464e1226da1f94c1' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\teacher.tpl',
      1 => 1506263073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:blocks/user_menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59c7c023b00a80_47976784 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.truncate.php';
$_smarty_tpl->tpl_vars['title'] = new Smarty_Variable("Личный кабинет", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'title', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
				<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/user_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
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
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</td>
									</tr>
									<tr>
										<td><div class="ui ribbon label">Имя</div></td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</td>
									</tr>
									<tr>
										<td><div class="ui ribbon label">Отчество</div></td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</td>
									</tr>
									<tr>
										<td><div class="ui ribbon label">Email</div></td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="ui bottom attached tab segment" data-tab="news">
					<div class="ui stackable grid">
						<div class="eight wide column">
							<?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getNews();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_news_0_saved_item = isset($_smarty_tpl->tpl_vars['one_news']) ? $_smarty_tpl->tpl_vars['one_news'] : false;
$__foreach_one_news_0_saved_key = isset($_smarty_tpl->tpl_vars['date']) ? $_smarty_tpl->tpl_vars['date'] : false;
$_smarty_tpl->tpl_vars['one_news'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['date'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value => $_smarty_tpl->tpl_vars['one_news']->value) {
$_smarty_tpl->tpl_vars['one_news']->_loop = true;
$__foreach_one_news_0_saved_local_item = $_smarty_tpl->tpl_vars['one_news'];
?>
								<div class="ui card" style="width: 100%;">
									<div class="content">
										<div class="header">
											<?php echo $_smarty_tpl->tpl_vars['one_news']->value->getCaption();?>

										</div>
										<div class="meta">
											<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one_news']->value->getDatePublication(),"d.m.Y");?>
 
										</div>
										<div class="description">
											<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['one_news']->value->getContent(),350);?>

										</div>
										<hr>
										<div class="meta">
											<input type="submit" name="removeNewsButton" value="Удалить" class="ui negative button">
											<input type="submit" name="removeNewsButton" value="Изменить" class="ui orange button">
										</div>
									</div>
								</div>
							<?php
$_smarty_tpl->tpl_vars['one_news'] = $__foreach_one_news_0_saved_local_item;
}
if ($__foreach_one_news_0_saved_item) {
$_smarty_tpl->tpl_vars['one_news'] = $__foreach_one_news_0_saved_item;
}
if ($__foreach_one_news_0_saved_key) {
$_smarty_tpl->tpl_vars['date'] = $__foreach_one_news_0_saved_key;
}
?>
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
									<input type="date" name="dp" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" required>
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
							<?php if ($_smarty_tpl->tpl_vars['user']->value->getSubjects() != NULL) {?>
								<table class="ui table striped">
									<thead>
										<tr>
											<th><h4>Название</h4></th>
											<th><h4>Выбрать</h4></th>
										</tr>
									</thead>
									<tbody>
										<?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getSubjects();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_1_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_1_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</td>
												<td style="text-align: center;"> <!-- FIXME: -->
													<form name="unsetSubjectForm" method="POST">
														<input type="hidden" name="subject" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
">
														<input type="submit" name="unsetSubjectButton" value="Не вести" class="ui negative button">
													</form>
												</td>
											</tr>
										<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_local_item;
}
if ($__foreach_subject_1_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_item;
}
?>
									</tbody>
								</table>
							<?php } else { ?>
								<h2>Выберете предметы</h2>
							<?php }?>
						</div>
						<div class="six wide column">
							<form name="setSubjectForm" method="POST" class="ui form">
								<?php if ($_smarty_tpl->tpl_vars['unset_subjects']->value != NULL) {?>
									<table class="ui table">
										<thead>
											<tr>
												<th><h4>Название</h4></th>
												<th><h4>Выбрать</h4></th>
											</tr>
										</thead>
										<tbody>
											<?php
$_from = $_smarty_tpl->tpl_vars['unset_subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_2_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_2_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</td>
													<td style="text-align: center;"> <!-- FIXME: -->
														<div class="ui fitted checkbox">
															<input type="checkbox" name="select_subject[]" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
">
															<label></label>
														</div>
													</td>
												<tr>
											<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_2_saved_local_item;
}
if ($__foreach_subject_2_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_2_saved_item;
}
?>
										</tbody>
									</table>
								<?php } else { ?>
									<h2 align="center">Пока что нету предметов</h2>
								<?php }?>
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
							<?php if ($_smarty_tpl->tpl_vars['user']->value->getTests() != NULL) {?>
								<table class="ui table striped">
									<thead>
										<tr>
											<th><h4>Название</h4></th>
											<th><h4>Предмет</h4></th>
											<th><h4>Действие</h4></th>
										</tr>
									</thead>
									<tbody class="tests">
										<?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getTests();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_3_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_3_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
											<tr>
												<td><a href="teacher/aboutTest.php?test=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
												<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
												<td>
													<form name="removeTestForm" method="POST">
														<input type="hidden" name="test" value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
">
														<input type="submit" name="removeTestButton" value="Удалить" class="ui negative button">
													</form>
												</td>
											</tr>
										<?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_3_saved_local_item;
}
if ($__foreach_test_3_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_3_saved_item;
}
?>
									</tbody>
								</table>
							<?php } else { ?>
								<h2>Добавьте тесты</h2>
							<?php }?>
						</div>
						<div class="six wide column">
							<form name="addTestForm" method="POST" class="ui form">
								<div class="field">
									<label>Название теста</label>
									<input type="text" name="caption" class="form-control">
								</div>
								<div class="field">
									<label>Предмет</label>
									<?php if ($_smarty_tpl->tpl_vars['user']->value->getSubjects() != NULL) {?>                
										<select name="subject" class="form-control">
											<?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getSubjects();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_4_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_4_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
											<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_local_item;
}
if ($__foreach_subject_4_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_item;
}
?>
										</select>
									<?php } else { ?>
										<p>Вы не выбрали предметы, которые ведёте</p>
									<?php }?>
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
											<?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_5_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_5_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
 (<?php echo $_smarty_tpl->tpl_vars['group']->value->getYearEducation();?>
)</td>
													<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getSpec()->getCode();?>
</td>
													<td>
														<div class="ui fitted checkbox">
															<input type="checkbox" name="select_group[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
">
															<label></label>
														</div>
													</td>
												</tr>
											<?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_5_saved_local_item;
}
if ($__foreach_group_5_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_5_saved_item;
}
?>
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

				
	<?php echo '<script'; ?>
 type="text/javascript">
		
		//CKEDITOR.replace("news");
		$('.menu .item').tab();
		$('.ui.accordion').accordion();
		
	<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
