<?php
/* Smarty version 3.1.29, created on 2017-08-20 11:59:50
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\parent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59994f8698c178_10222447',
  'file_dependency' => 
  array (
    'e8e891118e6960f9c82d9d52346fbe0021f50f4b' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\parent.tpl',
      1 => 1503219589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_59994f8698c178_10222447 ($_smarty_tpl) {
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
			
			h1, h2{
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
					<h2>Мои дети</h2>
					<div class="panel-group" id="accordion">
						<?php if ($_smarty_tpl->tpl_vars['childs']->value != NULL) {?>
              <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
							<?php
$_from = $_smarty_tpl->tpl_vars['childs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_0_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_0_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion"><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getPt();?>
</a>
										</h4>
									</div>
									<div class="panel-collapse collapse in">
										<div class="panel-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="circle">
                            <figure style="text-align: center;">
                              <img src="img/people.jpg" width="25%">
                            </figure>
                          </div>
													<fieldset>
														<legend style="text-align: center;"></legend>
														<table class="table table-striped">
															<tr>
																<td>Email:</td>
																<td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getEmail();?>
</td>
															</tr>
															<tr>
																<td>Группа:</td>
																<td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getGroup()->getNumberGroup();?>
</td>
															</tr>
															<tr>
																<td>Телефон:</td>
																<td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getCellPhone();?>
</td>
															</tr>
															<tr>
																<td>Адрес:</td>
																<td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getHomeAddress();?>
</td>
															</tr>
															<tr>
																<td>Специальность:</td>
																<td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getGroup()->getSpec()->getDescription();?>
</td>
															</tr>
															<tr>
																<td>Код специальности:</td>
																<td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getGroup()->getSpec()->getCode();?>
</td>
															</tr>
														</table>
													</fieldset>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel-group" id="detail_info">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#record">Результаты тестирования</a>
                                </h4>
                              </div>
                              <div class="panel-collapse collapse" id="record">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <?php if ($_smarty_tpl->tpl_vars['child']->value['tests'] != NULL) {?>
                                        <table class="table table-striped">
                                          <tr>
                                            <th>Название теста</th>
                                            <th>Предмет</th>
                                            <th>Оценка</th>
                                          </tr>                                        
                                          <?php
$_from = $_smarty_tpl->tpl_vars['child']->value['tests'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_1_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_1_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
                                            <tr>
                                              <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</td>
                                              <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject();?>
</td>
                                              <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getMark();?>
</td>
                                            </tr>
                                          <?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_1_saved_local_item;
}
if ($__foreach_test_1_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_1_saved_item;
}
?>
                                        </table>
                                      <?php } else { ?>
                                          <h3>Пока что пройденные тестов не было</h3>
                                      <?php }?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" href="#traffic_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">Посещаемость</a>
                                </h4>
                              </div>
                              <div class="panel-collapse collapse" id="traffic_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div id="student_traffic">
                                        <?php if ($_smarty_tpl->tpl_vars['child']->value['traffic'] != NULL) {?>
                                          <table class="table table-border">
                                            <tbody>
                                              <tr>
                                                <th>Дата</th>
                                                <th>Всего пар</th>
                                                <th>Посещено</th>
                                                <th>Пропущено</th>
                                              </tr>
                                              <?php
$_from = $_smarty_tpl->tpl_vars['child']->value['traffic'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_traffic_entry_2_saved_item = isset($_smarty_tpl->tpl_vars['traffic_entry']) ? $_smarty_tpl->tpl_vars['traffic_entry'] : false;
$_smarty_tpl->tpl_vars['traffic_entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['traffic_entry']->value) {
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = true;
$__foreach_traffic_entry_2_saved_local_item = $_smarty_tpl->tpl_vars['traffic_entry'];
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
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_2_saved_local_item;
}
if ($__foreach_traffic_entry_2_saved_item) {
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_2_saved_item;
}
?>
                                            </tbody>
                                          </table>
                                        <?php } else { ?>
                                          <h3>Похоже, что ваш ребёнок вообще не посещали колледж...</h3>
                                        <?php }?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
										</div>
									</div>
								</div>
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
							<?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_local_item;
}
if ($__foreach_child_0_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_item;
}
?>
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
								<td>Возраст</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getAge();?>
</td>
							</tr>
							<tr>
								<td>Домашний телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getHomePhone();?>
</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
							</tr>
							<tr>
								<td>Место работы</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getWorkPlace();?>
</td>
							</tr>
							<tr>
								<td>Должность</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPost();?>
</td>
							</tr>
						</table>
					</fieldset>
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
