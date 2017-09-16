<?php
/* Smarty version 3.1.29, created on 2017-08-20 14:31:31
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\student.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59997313208571_52678629',
  'file_dependency' => 
  array (
    '2ff7ebb86c93a5f54bc7d29a079fd7580315f41c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\student.tpl',
      1 => 1503228690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_59997313208571_52678629 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой аккаунт</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.js"><?php echo '</script'; ?>
>
		<style>
			
			h1, h2, h3, h4, h5, h6{
				text-align: center;
			}
			
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:users/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<div class="panel-group" id="scheduleGroups">
            <?php if ($_smarty_tpl->tpl_vars['changed_schedules']->value != NULL) {?>
              <?php
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
                <div class="panel panel-warning">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse">
                        Изменения для <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $_smarty_tpl->tpl_vars['grp']->value;?>
" class="panel-collapse collapse in">
                    <div class="panel-body">
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
                        <table class="table table-hover">
                          <thead>
                            <h3><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'d.m.Y (l)');?>
</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Пара</th>
                              <th>Предмет</th>
                            </tr>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['subject'];?>
</td>
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
?>
            <?php } else { ?>
              <h3 align="center">Изменений нет</h3>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['schedules']->value != NULL) {?>
              <?php
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
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse">
                        Основное расписание для <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $_smarty_tpl->tpl_vars['grp']->value;?>
" class="panel-collapse collapse in">
                    <div class="panel-body">
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
                        <table class="table table-hover">
                          <thead>
                            <h3><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Пара</th>
                              <th>Предмет</th>
                            </tr>
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
                                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['subject'];?>
</td>
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
?>
            <?php } else { ?>
              <h3 align="center">Расписания нет</h3>
            <?php }?>
					</div>
				</div>
				<div class="col-md-4">
					<fieldset>
						<legend>Моя информация</legend>
						<table class="table table-striped">
							<tr>
								<td>Фамилия</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</td>
							</tr>
							<tr>
								<td>Имя</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</td>
							</tr>
							<tr>
								<td>Отчество</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
							</tr>
							<tr>
								<td>Группа</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getGroup()->getNumberGroup();?>
</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
							</tr>
							<tr>
								<td>Адрес</td>
								<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->getHomeAddress())===null||$tmp==='' ? "Не указан" : $tmp);?>
</td>
							</tr>
						</table>
					</fieldset>
					<div class="panel-group" id="u">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Одногруппники</a></h4>
							</div>
							<div id="u_teachers" class="panel-collapse collapse">
								<div class="panel-body">
                  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
									<?php if ($_smarty_tpl->tpl_vars['sogroups']->value != NULL) {?>
										<table class="table table-bordered">
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
												<tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['it']->value['sn'];?>
 <?php echo $_smarty_tpl->tpl_vars['it']->value['fn'];?>
</td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
											<?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_6_saved_local_item;
}
if ($__foreach_it_6_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_6_saved_item;
}
?>
										</table>
									<?php } else { ?>
										<h4>Ваши одногруппники ещё не зарегистрированны</h4>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Посещаемость</h2>
          <div id="student_traffic">
            <?php if ($_smarty_tpl->tpl_vars['traffic']->value != NULL) {?>
              <table class="table table-border">
                <tbody>
                  <tr>
                    <th>Дата</th>
                    <th>Всего пар</th>
                    <th>Посещено</th>
                    <th>Пропущено</th>
                  </tr>
                  <?php
$_from = $_smarty_tpl->tpl_vars['traffic']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_traffic_entry_7_saved_item = isset($_smarty_tpl->tpl_vars['traffic_entry']) ? $_smarty_tpl->tpl_vars['traffic_entry'] : false;
$_smarty_tpl->tpl_vars['traffic_entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['traffic_entry']->value) {
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = true;
$__foreach_traffic_entry_7_saved_local_item = $_smarty_tpl->tpl_vars['traffic_entry'];
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
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_7_saved_local_item;
}
if ($__foreach_traffic_entry_7_saved_item) {
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_7_saved_item;
}
?>
                </tbody>
              </table>
            <?php } else { ?>
              <h3>Похоже, что вы вообще не посещали колледж...</h3>
            <?php }?>
          </div>
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="tests">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#tests" href="#s_tests">Доступные тесты</a></h4>
							</div>
							<div id="s_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<?php if ($_smarty_tpl->tpl_vars['tests']->value != NULL) {?>
										<table class="table table-bordered">
											<thead>
												<th>Название</th>
												<th>Предмет</th>
												<th>Автор</th>
											</thead>
											<tbody>
												<?php
$_from = $_smarty_tpl->tpl_vars['tests']->value;
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
													<td><a href="student/complete.php?test_id=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getAuthor();?>
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
										<h2>Нету доступных тестов</h2>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-group" id="completes_tests">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#completes_tests" href="#c_tests">Пройденные тесты</a></h4>
							</div>
							<div id="c_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<?php if ($_smarty_tpl->tpl_vars['completedTests']->value != NULL) {?>
										<table class="table table-bordered">
											<thead>
												<th>Название</th>
												<th>Дата сдачи</th>
											</thead>
											<tbody>
												<?php
$_from = $_smarty_tpl->tpl_vars['completedTests']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_9_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_9_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
                          <tr>
                            <td><a href="student/test.php?test=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['test']->value->getDatePass(),'d.m.Y H:i:s');?>
</td>
                          </tr>
												<?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_9_saved_local_item;
}
if ($__foreach_test_9_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_9_saved_item;
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
					</div>
				</div>
			</div>
		</div>
    
    <?php echo '<script'; ?>
 type="text/javascript">
      
      $("[data-toggle='tooltip']").tooltip();
      $("[data-toggle='popover']").popover();
    
    <?php echo '</script'; ?>
>
    
	</body>
</html><?php }
}
