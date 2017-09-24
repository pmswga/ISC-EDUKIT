<?php
/* Smarty version 3.1.29, created on 2017-09-24 18:47:10
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\student.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c7d37ed21410_48003311',
  'file_dependency' => 
  array (
    '2ff7ebb86c93a5f54bc7d29a079fd7580315f41c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\student.tpl',
      1 => 1506265982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../html/begin.tpl' => 1,
    'file:blocks/user_menu.tpl' => 1,
    'file:../html/end.tpl' => 1,
  ),
),false)) {
function content_59c7d37ed21410_48003311 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars['title'] = new Smarty_Variable("Личный кабинет", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'title', 0);?> <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
				<a class="item" data-tab="sogrous">Одногруппники</a>
				<a class="item" data-tab="testing">Тестирование</a>
				<a class="item" data-tab="traffic">Посещаемость</a>
			</div>
			<div class="ui bottom attached tab segment active" data-tab="main">
				<div class="ui stackable grid">
					<div class="ten wide column">
						<?php if ($_smarty_tpl->tpl_vars['changed_schedules']->value != NULL) {?> <?php
$_from = $_smarty_tpl->tpl_vars['changed_schedules']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_schedule_0_saved_item = isset($_smarty_tpl->tpl_vars['schedule']) ? $_smarty_tpl->tpl_vars['schedule'] : false;
$__foreach_schedule_0_saved_key = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['schedule']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
$__foreach_schedule_0_saved_local_item = $_smarty_tpl->tpl_vars['schedule'];
?>
						<div id="groupSchedule" class="ui styled accordion">
							<div class="active title">
								Изменения
							</div>
							<div class="active content">
								<?php
$_from = $_smarty_tpl->tpl_vars['schedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_data_1_saved_item = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data'] : false;
$__foreach_data_1_saved_key = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_1_saved_local_item = $_smarty_tpl->tpl_vars['data'];
?>
								<div class="accordion">
									<div class="title">
										<h3><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,"d.m.Y");?>
</h3>
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
												<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_2_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_2_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['entry']->value['pair'];?>
</td>
													<?php if ($_smarty_tpl->tpl_vars['entry']->value['subj_1'] == $_smarty_tpl->tpl_vars['entry']->value['subj_2']) {?>
													<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</td>
													<?php } else { ?>
													<th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</th>
													<th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_2'];?>
</th>
													<?php }?>
												</tr>
												<?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_2_saved_local_item;
}
if ($__foreach_entry_2_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_2_saved_item;
}
?>
											</tbody>
										</table>
									</div>
								</div>
								<?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_1_saved_local_item;
}
if ($__foreach_data_1_saved_item) {
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_1_saved_item;
}
if ($__foreach_data_1_saved_key) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_data_1_saved_key;
}
?>
							</div>
						</div>
						<?php
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_0_saved_local_item;
}
if ($__foreach_schedule_0_saved_item) {
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_0_saved_item;
}
if ($__foreach_schedule_0_saved_key) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_schedule_0_saved_key;
}
?> <?php }?>
						<br> <?php if ($_smarty_tpl->tpl_vars['schedules']->value != NULL) {?> <?php
$_from = $_smarty_tpl->tpl_vars['schedules']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_schedule_3_saved_item = isset($_smarty_tpl->tpl_vars['schedule']) ? $_smarty_tpl->tpl_vars['schedule'] : false;
$__foreach_schedule_3_saved_key = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['schedule']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
$__foreach_schedule_3_saved_local_item = $_smarty_tpl->tpl_vars['schedule'];
?>
						<div id="groupSchedule" class="ui styled accordion">
							<div class="active title">
								Основное расписание для <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

							</div>
							<div class="active content">
								<?php
$_from = $_smarty_tpl->tpl_vars['schedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_data_4_saved_item = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data'] : false;
$__foreach_data_4_saved_key = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_4_saved_local_item = $_smarty_tpl->tpl_vars['data'];
?>
								<div class="accordion">
									<div class="title">
										<h3><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</h3>
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
												<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_5_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_5_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['entry']->value['pair'];?>
</td>
													<?php if ($_smarty_tpl->tpl_vars['entry']->value['subj_1'] == $_smarty_tpl->tpl_vars['entry']->value['subj_2']) {?>
													<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</td>
													<?php } else { ?>
													<th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</th>
													<th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_2'];?>
</th>
													<?php }?>
												</tr>
												<?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_5_saved_local_item;
}
if ($__foreach_entry_5_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_5_saved_item;
}
?>
											</tbody>
										</table>
									</div>
								</div>
								<?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_4_saved_local_item;
}
if ($__foreach_data_4_saved_item) {
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_4_saved_item;
}
if ($__foreach_data_4_saved_key) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_data_4_saved_key;
}
?>
							</div>
						</div>
						<?php
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_3_saved_local_item;
}
if ($__foreach_schedule_3_saved_item) {
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_3_saved_item;
}
if ($__foreach_schedule_3_saved_key) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_schedule_3_saved_key;
}
?> <?php }?>
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
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Имя</div>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Отчество</div>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Email</div>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Группа</div>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getGroup()->getNumberGroup();?>
</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Сотовый телефон</div>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
								</tr>
								<tr>
									<td>
										<div class="ui ribbon label">Адрес</div>
									</td>
									<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->getHomeAddress())===null||$tmp==='' ? "Не указан" : $tmp);?>
</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="sogrous">
				<div class="ui stackable grid">
					<div class="sixteen wide column">
						<?php if ($_smarty_tpl->tpl_vars['sogroups']->value != NULL) {?>
							<div id="teachers" class="ui link cards">
								<?php
$_from = $_smarty_tpl->tpl_vars['sogroups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_it_6_saved_item = isset($_smarty_tpl->tpl_vars['it']) ? $_smarty_tpl->tpl_vars['it'] : false;
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$__foreach_it_6_saved_local_item = $_smarty_tpl->tpl_vars['it'];
?>
									<div class="card">
										<div class="content">
											<div class="header"><?php echo $_smarty_tpl->tpl_vars['it']->value['sn'];?>
 <?php echo $_smarty_tpl->tpl_vars['it']->value['fn'];?>
</div>
											<div class="meta">
												<a>Одногруппник</a>
											</div>
											<div class="description">
												<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['it']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['it']->value['email'];?>
</a>
											</div>
										</div>
									</div>
								<?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_6_saved_local_item;
}
if ($__foreach_it_6_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_6_saved_item;
}
?>
							</div>
						<?php } else { ?>
							<h3 align="center">Ваши одногруппники ещё не зарегистрировались</h3>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="testing">
				<div class="ui stackable grid">
					<div class="ten wide column">
						<?php if ($_smarty_tpl->tpl_vars['tests']->value != NULL) {?>
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
								<?php
$_from = $_smarty_tpl->tpl_vars['tests']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_7_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_7_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
								<tr>
									<td><a href="student/complete.php?test_id=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
									<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getAuthor();?>
</td>
								</tr>
								<?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_7_saved_local_item;
}
if ($__foreach_test_7_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_7_saved_item;
}
?>
							</tbody>
						</table>
						<?php } else { ?>
						<h2>Нету доступных тестов</h2>
						<?php }?>
					</div>
					<div class="six wide column">
						<?php if ($_smarty_tpl->tpl_vars['completedTests']->value != NULL) {?>
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
									<?php
$_from = $_smarty_tpl->tpl_vars['completedTests']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_8_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_8_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
									<tr>
										<td><a href="student/test.php?test=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
										<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['test']->value->getDatePass(),'d.m.Y H:i:s');?>
</td>
									</tr>
									<?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_8_saved_local_item;
}
if ($__foreach_test_8_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_8_saved_item;
}
?>
								</tbody>
							</table>
						<?php } else { ?>
							<h4>Вы ещё не прошли ни одного теста</h4>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="ui bottom attached tab segment" data-tab="traffic">
				<div class="ui stackable grid">
					<div class="sixteen wide column">
						<?php if ($_smarty_tpl->tpl_vars['traffic']->value != NULL) {?>
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
									<?php
$_from = $_smarty_tpl->tpl_vars['traffic']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_traffic_entry_9_saved_item = isset($_smarty_tpl->tpl_vars['traffic_entry']) ? $_smarty_tpl->tpl_vars['traffic_entry'] : false;
$_smarty_tpl->tpl_vars['traffic_entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['traffic_entry']->value) {
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = true;
$__foreach_traffic_entry_9_saved_local_item = $_smarty_tpl->tpl_vars['traffic_entry'];
?>
									<tr>
										<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['traffic_entry']->value['date_visit'],'d.m.Y');?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['traffic_entry']->value['count_all_hours']/2;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['traffic_entry']->value['count_passed_hours']/2;?>
</td>
										<td><?php echo ($_smarty_tpl->tpl_vars['traffic_entry']->value['count_all_hours']-$_smarty_tpl->tpl_vars['traffic_entry']->value['count_passed_hours'])/2;?>
</td>
									</tr>
									<?php
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_9_saved_local_item;
}
if ($__foreach_traffic_entry_9_saved_item) {
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_9_saved_item;
}
?>
								</tbody>
							</table>
						<?php } else { ?>
							<h3>Похоже, что вы вообще не посещали колледж...</h3>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
	$('.menu .item').tab();
	$('.ui.accordion').accordion();
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
