<?php
/* Smarty version 3.1.29, created on 2017-04-10 23:19:11
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\users.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ebe8bf2b4c21_03928635',
  'file_dependency' => 
  array (
    '89cdc248d1c9c3b51841ce9a0c3603cfd62c84cd' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\users.tpl',
      1 => 1491855549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:html/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_58ebe8bf2b4c21_03928635 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Пользователи", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_var->createLocalArrayVariable($_smarty_tpl, 'css_links', null);
$_smarty_tpl->tpl_vars['css_links']->value[] = "vt.css";
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'css_links', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container-fluid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="row">
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#addUser" data-toggle="tab">Добавить</a></li>
          <li><a href="#viewUsers" data-toggle="tab">Просмотр</a></li>
          <li><a href="#grant" data-toggle="tab">Старосты</a></li>
          <li><a href="#editUser" data-toggle="tab">Изменить</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="addUser">
            <div class="row">
              <div class="col-md-4">
                <fieldset>
                  <legend>Студент</legend>
                  <form name="addStudentForm" method="POST">
                    <div class="form-group">
                      <label>Фамилия</label>
                      <input type="text" name="sn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Имя</label>
                      <input type="text" name="fn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Отчество</label>
                      <input type="text" name="pt" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Пароль</label>
                      <input type="password" name="paswd" maxlength="32" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Адрес</label>
                      <input type="text" name="ha" maxlength="255" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Телефон</label>
                      <input type="telephone" name="cp" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Группа</label>
                      <select name="grp" class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_0_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_0_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getID();?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_local_item;
}
if ($__foreach_group_0_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_item;
}
?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="addStudentButton" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Преподаватель</legend>
                  <form name="addTeacherForm" method="POST">
                    <div class="form-group">
                      <label>Фамилия</label>
                      <input type="text" name="sn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Имя</label>
                      <input type="text" name="fn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Отчество</label>
                      <input type="text" name="pt" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Пароль</label>
                      <input type="password" name="paswd" maxlength="32" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Информация</label>
                      <textarea name="info" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#subjects">Предметы</a>
                            </h4>
                          </div>
                          <div id="subjects" class="panel-collapse collapse">
                            <div class="panel-body">
                              <table class="table table-bordered">
                                <tr>
                                  <th>Название</th>
                                  <th>Выбрать</th>
                                </tr>
                                <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
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
                                    <td><input type="checkbox" name="subjects[]" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getID();?>
" class="form-control"></td>
                                  </tr>
                                <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_local_item;
}
if ($__foreach_subject_1_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_item;
}
?>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <input type="submit" name="addTeacherButton" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Родитель</legend>
                  <form name="addParentForm" method="POST">
                    <div class="form-group">
                      <label>Фамилия</label>
                      <input type="text" name="sn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Имя</label>
                      <input type="text" name="fn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Отчество</label>
                      <input type="text" name="pt" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Пароль</label>
                      <input type="password" name="paswd" maxlength="32" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Возраст</label>
                      <input type="number" name="age" min="20" value="20" max="99" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Образование</label>
                      <input type="text" name="education" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Место работы</label>
                      <input type="text" name="wp" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Должность</label>
                      <input type="text" name="post" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Домашний телефон</label>
                      <input type="telephone" name="hp" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Сотовый телефон</label>
                      <input type="telephone" name="cp" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="addParentButton" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="viewUsers">
						<div class="row">
							<div class="col-md-12">
								<div class="panel-group" id="views_users">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#views_users" href="#view_teachers">Преподаватели</a>
											</h4>
										</div>
										<div id="view_teachers" class="panel-collapse collapse">
											<div class="panel-body">
												<table class="table table-bordered">
													<tr>
														<th>Фамилия</th>
														<th>Имя</th>
														<th>Отчество</th>
														<th>E-mail</th>
														<th>Предметы</th>
													</tr>
													<?php
$_from = $_smarty_tpl->tpl_vars['teachers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_teacher_2_saved_item = isset($_smarty_tpl->tpl_vars['teacher']) ? $_smarty_tpl->tpl_vars['teacher'] : false;
$_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['teacher']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
$__foreach_teacher_2_saved_local_item = $_smarty_tpl->tpl_vars['teacher'];
?>
														<tr>
															<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getSn();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getFn();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getPt();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getEmail();?>
</td>
															<td>
																<ul>
																<?php
$_from = $_smarty_tpl->tpl_vars['teacher']->value->getSubjects();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_3_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_3_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
																		<li><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</li>
																<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_3_saved_local_item;
}
if ($__foreach_subject_3_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_3_saved_item;
}
?>
																</ul>
															</td>
														</tr>
													<?php
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_2_saved_local_item;
}
if ($__foreach_teacher_2_saved_item) {
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_2_saved_item;
}
?>
												</table>
											</div>
										</div>
									</div>
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#views_users" href="#view_students">Студенты</a>
											</h4>
										</div>
										<div id="view_students" class="panel-collapse collapse">
											<div class="panel-body">
												<?php
$_from = $_smarty_tpl->tpl_vars['studentsByGroup']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_4_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$__foreach_student_4_saved_key = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_4_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
													<div class="panel-group" id="view_groups_with_students">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a data-toggle="collapse" data-parent="#view_groups_with_students" href="#<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value;?>
</a>
																</h4>
															</div>
															<div id="<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
" class="panel-collapse collapse">
																<div class="panel-body"><table class="table table-bordered">
																	<table class="table table-bordered">
																		<tr>
																			<th>Фамилия</th>
																			<th>Имя</th>
																			<th>Отчество</th>
																			<th>E-mail</th>
																			<th>Адрес</th>
																			<th>Телефон</th>
																			<th></th>
																		</tr>
																		<?php
$_from = $_smarty_tpl->tpl_vars['student']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_student_5_saved_item = isset($_smarty_tpl->tpl_vars['one_student']) ? $_smarty_tpl->tpl_vars['one_student'] : false;
$_smarty_tpl->tpl_vars['one_student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one_student']->value) {
$_smarty_tpl->tpl_vars['one_student']->_loop = true;
$__foreach_one_student_5_saved_local_item = $_smarty_tpl->tpl_vars['one_student'];
?>
																			<tr>
																				<td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getSn();?>
</td>
																				<td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getFn();?>
</td>
																				<td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getPt();?>
</td>
																				<td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
</td>
																				<td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getHomeAddress();?>
</td>
																				<td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getCellPhone();?>
</td>
																			</tr>
																		<?php
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_5_saved_local_item;
}
if ($__foreach_one_student_5_saved_item) {
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_5_saved_item;
}
?>
																	</table>
																</div>
															</div>
														</div>
													</div>
												<?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_4_saved_local_item;
}
if ($__foreach_student_4_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_4_saved_item;
}
if ($__foreach_student_4_saved_key) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_student_4_saved_key;
}
?>
											</div>
										</div>
									</div>
									<div class="panel panel-warning">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#views_users" href="#view_parents">Родители</a>
											</h4>
										</div>
										<div id="view_parents" class="panel-collapse collapse">
											<div class="panel-body">
												<table class="table table-bordered">
													<tr>
														<th>Фамилия</th>
														<th>Имя</th>
														<th>Отчество</th>
														<th>E-mail</th>
														<th>Возраст</th>
														<th>Образование</th>
														<th>Место работы</th>
														<th>Пост</th>
														<th>Телефон</th>
														<th>Дети</th>
													</tr>
													<?php
$_from = $_smarty_tpl->tpl_vars['parents']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_6_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_6_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
														<tr>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getFn();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getSn();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getPt();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getAge();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEducation();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getWorkPlace();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getPost();?>
</td>
															<td>
																<ul>
																	<li>Домашний: <?php echo $_smarty_tpl->tpl_vars['parent']->value->getHomePhone();?>
</li>
																	<li>Сотовый: <?php echo $_smarty_tpl->tpl_vars['parent']->value->getCellPhone();?>
</li>
																</ul>
															</td>
														</tr>
													<?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_6_saved_local_item;
}
if ($__foreach_parent_6_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_6_saved_item;
}
?>
												</table>
											</div>
										</div>
									</div>
									<div class="panel panel-success">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#views_users" href="#view_elders">Старосты</a>
											</h4>
										</div>
										<div id="view_elders" class="panel-collapse collapse">
											<div class="panel-body">
												<table class="table table-bordered">
													<tr>
														<th>Фамилия</th>
														<th>Имя</th>
														<th>Отчество</th>
														<th>E-mail</th>
														<th>Предметы</th>
													</tr>
													<?php
$_from = $_smarty_tpl->tpl_vars['elders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_elder_7_saved_item = isset($_smarty_tpl->tpl_vars['elder']) ? $_smarty_tpl->tpl_vars['elder'] : false;
$_smarty_tpl->tpl_vars['elder'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['elder']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['elder']->value) {
$_smarty_tpl->tpl_vars['elder']->_loop = true;
$__foreach_elder_7_saved_local_item = $_smarty_tpl->tpl_vars['elder'];
?>
														<tr>
															<td><?php echo $_smarty_tpl->tpl_vars['elder']->value->getSn();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['elder']->value->getFn();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['elder']->value->getPt();?>
</td>
															<td><?php echo $_smarty_tpl->tpl_vars['elder']->value->getEmail();?>
</td>
														</tr>
													<?php
$_smarty_tpl->tpl_vars['elder'] = $__foreach_elder_7_saved_local_item;
}
if ($__foreach_elder_7_saved_item) {
$_smarty_tpl->tpl_vars['elder'] = $__foreach_elder_7_saved_item;
}
?>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<fieldset>
							<legend>Удалить пользователя</legend>
							<div class="row">
								<form name="removeUserForm" method="POST" class="form-horizontal">
									<div class="col-md-8">
										<label>Пользователь</label>
										<select name="user" class="form-control">
											<?php
$_from = $_smarty_tpl->tpl_vars['allUsers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_8_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_8_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</option>
											<?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_8_saved_local_item;
}
if ($__foreach_user_8_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_8_saved_item;
}
?>
										</select>
									</div>
									<div class="col-md-4">
										<input type="submit" name="removeUserButton" value="Удалить пользователя" class="btn btn-danger">
									</div>
								</form>
							</div>
						</fieldset>
						<br>
						<fieldset>
							<legend>Изменить тип пользователя</legend>
							<div class="row">
								<form name="changeTypeUserForm" method="POST" class="form-horizontal">
									<div class="col-md-4">
										<label>Пользователь</label>
										<select name="user" class="form-control">
											<?php
$_from = $_smarty_tpl->tpl_vars['allUsers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_9_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_9_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</option>
											<?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_9_saved_local_item;
}
if ($__foreach_user_9_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_9_saved_item;
}
?>
										</select>
									</div>
									<div class="col-md-4">
										<label>Тип</label>
										<select name="type" class="form-control">
											<?php
$_from = $_smarty_tpl->tpl_vars['typeUsers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_typeUser_10_saved_item = isset($_smarty_tpl->tpl_vars['typeUser']) ? $_smarty_tpl->tpl_vars['typeUser'] : false;
$_smarty_tpl->tpl_vars['typeUser'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['typeUser']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['typeUser']->value) {
$_smarty_tpl->tpl_vars['typeUser']->_loop = true;
$__foreach_typeUser_10_saved_local_item = $_smarty_tpl->tpl_vars['typeUser'];
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['typeUser']->value->getID();?>
"><?php echo $_smarty_tpl->tpl_vars['typeUser']->value->getDescp();?>
</option>
											<?php
$_smarty_tpl->tpl_vars['typeUser'] = $__foreach_typeUser_10_saved_local_item;
}
if ($__foreach_typeUser_10_saved_item) {
$_smarty_tpl->tpl_vars['typeUser'] = $__foreach_typeUser_10_saved_item;
}
?>
										</select>
									</div>
									<div class="col-md-4">
										<input type="submit" name="changeTypeUserButton" value="Изменить тип пользователя" class="btn btn-warning">
									</div>
								</form>
							</div>
						</fieldset>
          </div>
          <div class="tab-pane" id="grant">
            <div class="row">
              <div class="col-md-6">
                <fieldset>
                  <legend>Назначить</legend>
                  <form name="grantElderForm" method="POST">
                    <div class="form-group">
                      <label>Студент</label>
                      <select name="studentEmail" class="form-control">
												<?php
$_from = $_smarty_tpl->tpl_vars['students']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_11_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_11_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['student']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['student']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value->getPt();?>
 | <small><?php echo $_smarty_tpl->tpl_vars['student']->value->getGroup();?>
</small></option>
												<?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_11_saved_local_item;
}
if ($__foreach_student_11_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_11_saved_item;
}
?>
											</select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="grantElderButton" value="Назначить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <legend>Разжаловать</legend>
                  <form name="revokeElderForm" method="POST">
                    <div class="form-group">
                      <label>Студент</label>
                      <select name="studentEmail" class="form-control">
												<?php
$_from = $_smarty_tpl->tpl_vars['elders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_elder_12_saved_item = isset($_smarty_tpl->tpl_vars['elder']) ? $_smarty_tpl->tpl_vars['elder'] : false;
$_smarty_tpl->tpl_vars['elder'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['elder']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['elder']->value) {
$_smarty_tpl->tpl_vars['elder']->_loop = true;
$__foreach_elder_12_saved_local_item = $_smarty_tpl->tpl_vars['elder'];
?>
													<option value="<?php echo $_smarty_tpl->tpl_vars['elder']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['elder']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['elder']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['elder']->value->getPt();?>
 | <small><?php echo $_smarty_tpl->tpl_vars['elder']->value->getGroup();?>
</small></option>
												<?php
$_smarty_tpl->tpl_vars['elder'] = $__foreach_elder_12_saved_local_item;
}
if ($__foreach_elder_12_saved_item) {
$_smarty_tpl->tpl_vars['elder'] = $__foreach_elder_12_saved_item;
}
?>
											</select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="revokeElderButton" value="Разжаловать" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="editUser">
            4
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
