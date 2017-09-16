<?php
/* Smarty version 3.1.29, created on 2017-09-02 12:45:56
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\users.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59aa7dd43e5188_62626772',
  'file_dependency' => 
  array (
    '321e71a236bb2a64ee601b6d738b0f32b28d3d81' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\users.tpl',
      1 => 1504345555,
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
function content_59aa7dd43e5188_62626772 ($_smarty_tpl) {
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
      <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Удалить пользователя</legend>
            <div class="row">
              <?php if ($_smarty_tpl->tpl_vars['allUsers']->value != NULL) {?>
                <form name="removeUserForm" method="POST" class="form-horizontal">
                  <div class="col-md-10">
                    <select name="user" class="form-control">
                      <?php
$_from = $_smarty_tpl->tpl_vars['allUsers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <input type="submit" name="removeUserButton" value="Удалить" class="btn btn-danger">
                  </div>
                </form>
              <?php } else { ?>
                <h3 align="center">Пользователи не зарегистрированы</h3>
              <?php }?>
            </div>
          </fieldset>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#teachers" data-toggle="tab">Преподаватели</a></li>
            <li><a href="#students" data-toggle="tab">Студенты</a></li>
            <li><a href="#parents" data-toggle="tab">Родители</a></li>
            <li><a href="#elders" data-toggle="tab">Старосты</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tab-content">
            <div class="tab-pane active" id="teachers">
              <div class="row">
                <div class="col-md-12">
                  <br>
                  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                  <?php if ($_smarty_tpl->tpl_vars['teachers']->value) {?>
                    <table class="table table-hover">
                      <tr>
                        <th>№</th>
                        <th>ФИО</th>
                        <th>E-mail</th>
                        <th>Предметы</th>
                      </tr>
                      <?php
$_from = $_smarty_tpl->tpl_vars['teachers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_teacher_1_saved_item = isset($_smarty_tpl->tpl_vars['teacher']) ? $_smarty_tpl->tpl_vars['teacher'] : false;
$_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['teacher']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
$__foreach_teacher_1_saved_local_item = $_smarty_tpl->tpl_vars['teacher'];
?>
                        <tr>
                          <td><p><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p></td>
                          <td><p><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['teacher']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['teacher']->value->getPt();?>
</p></td>
                          <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['teacher']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getEmail();?>
</a></td>
                          <td>
                            <?php if ($_smarty_tpl->tpl_vars['teacher']->value->getSubjects() != NULL) {?>
                              <ul>
                              <?php
$_from = $_smarty_tpl->tpl_vars['teacher']->value->getSubjects();
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
                                  <li><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</li>
                              <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_2_saved_local_item;
}
if ($__foreach_subject_2_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_2_saved_item;
}
?>
                              </ul>
                            <?php } else { ?>
                              <h5 align="center">Предметы не выбраны</h5>
                            <?php }?>
                          </td>
                        </tr>
                        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                      <?php
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_1_saved_local_item;
}
if ($__foreach_teacher_1_saved_item) {
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_1_saved_item;
}
?>
                    </table>
                  <?php } else { ?>
                    <h3>Преподаватели не зарегистрированы</h3>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="students">
              <div class="row">
                <div class="col-md-12">
                  <br>
                  <?php if ($_smarty_tpl->tpl_vars['studentsByGroup']->value != NULL) {?>
                    <?php $_smarty_tpl->tpl_vars['group_n'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'group_n', 0);?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['studentsByGroup']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_3_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$__foreach_student_3_saved_key = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_3_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
                      <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#<?php echo $_smarty_tpl->tpl_vars['group_n']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value;?>
</a>
                            </h4>
                          </div>
                          <div id="<?php echo $_smarty_tpl->tpl_vars['group_n']->value;?>
" class="panel-collapse collapse">
                            <div class="panel-body"><table class="table table-bordered">
                              <table class="table table-hover">
                                <tr>
                                  <th>№</th>
                                  <th>ФИО</th>
                                  <th>E-mail</th>
                                  <th>Адрес</th>
                                  <th>Телефон</th>
                                </tr>
                                <?php
$_from = $_smarty_tpl->tpl_vars['student']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_student_4_saved_item = isset($_smarty_tpl->tpl_vars['one_student']) ? $_smarty_tpl->tpl_vars['one_student'] : false;
$_smarty_tpl->tpl_vars['one_student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one_student']->value) {
$_smarty_tpl->tpl_vars['one_student']->_loop = true;
$__foreach_one_student_4_saved_local_item = $_smarty_tpl->tpl_vars['one_student'];
?>
                                  <?php if ($_smarty_tpl->tpl_vars['one_student']->value->getUserType() == 2) {?>
                                    <?php $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable("background-color: crimson;color: white;", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'css', 0);?>
                                  <?php } else { ?>
                                    <?php $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'css', 0);?>
                                  <?php }?>
                                  <tr style="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
">
                                    <td><p><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</p></td>
                                    <td><p><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['one_student']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['one_student']->value->getPt();?>
</p></td>
                                    <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
</a></td>
                                    <td><p><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getHomeAddress();?>
</p></td>
                                    <td><p><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getCellPhone();?>
</p></td>
                                  </tr>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                                <?php
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_4_saved_local_item;
}
if ($__foreach_one_student_4_saved_item) {
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_4_saved_item;
}
?>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $_smarty_tpl->tpl_vars['group_n'] = new Smarty_Variable($_smarty_tpl->tpl_vars['group_n']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'group_n', 0);?>
                    <?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_3_saved_local_item;
}
if ($__foreach_student_3_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_3_saved_item;
}
if ($__foreach_student_3_saved_key) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_student_3_saved_key;
}
?>
                  <?php } else { ?>
                    <h3>Студенты не зарегистрированы</h3>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="parents">
              <div class="row">
                <div class="col-md-12">
                  <br>
                  <?php if ($_smarty_tpl->tpl_vars['parents']->value != NULL) {?>
                    <table class="table table-hover">
                      <tr>
                        <th>ФИО</th>
                        <th>E-mail</th>
                        <th>Возраст</th>
                        <th>Образование</th>
                        <th>Место работы</th>
                        <th>Телефон</th>
                      </tr>
                      <?php
$_from = $_smarty_tpl->tpl_vars['parents']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_5_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_5_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['parent']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['parent']->value->getPt();?>
</td>
                          <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
</a></td>
                          <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getAge();?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEducation();?>
</td>
                          <td>
                            <?php echo $_smarty_tpl->tpl_vars['parent']->value->getWorkPlace();?>
<br>
                            <?php echo $_smarty_tpl->tpl_vars['parent']->value->getPost();?>

                          </td>
                          <td>
                            Домашний: <?php echo $_smarty_tpl->tpl_vars['parent']->value->getHomePhone();?>
<br>
                            Сотовый: <?php echo $_smarty_tpl->tpl_vars['parent']->value->getCellPhone();?>

                          </td>
                        </tr>
                      <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_5_saved_local_item;
}
if ($__foreach_parent_5_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_5_saved_item;
}
?>
                    </table>
                  <?php } else { ?>
                    <h3>Родители не зарегистрированы</h3>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="elders">
              <div class="row">
                <div class="col-md-6">
                  <br>
                  <form name="grantElderForm" method="POST">
                    <div class="form-group">
                      <label>Студент</label>
                      <select name="studentEmail" class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['students']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_6_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_6_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['student']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['student']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value->getPt();?>
 | <small><?php echo $_smarty_tpl->tpl_vars['student']->value->getGroup()->getNumberGroup();?>
</small></option>
                        <?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_6_saved_local_item;
}
if ($__foreach_student_6_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_6_saved_item;
}
?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="grantElderButton" value="Назначить" class="btn btn-primary">
                    </div>
                  </form>
                </div>
                <div class="col-md-6">
                  <br>
                  <form name="revokeElderForm" method="POST">
                    <div class="form-group">
                      <label>Студент</label>
                      <select name="studentEmail" class="form-control">
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
                          <option value="<?php echo $_smarty_tpl->tpl_vars['elder']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['elder']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['elder']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['elder']->value->getPt();?>
 | <small><?php echo $_smarty_tpl->tpl_vars['elder']->value->getGroup()->getNumberGroup();?>
</small></option>
                        <?php
$_smarty_tpl->tpl_vars['elder'] = $__foreach_elder_7_saved_local_item;
}
if ($__foreach_elder_7_saved_item) {
$_smarty_tpl->tpl_vars['elder'] = $__foreach_elder_7_saved_item;
}
?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="revokeElderButton" value="Разжаловать" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-4">
        <fieldset>
          <legend>Добавить преподавателя</legend>
          <form name="addTeacherForm" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Фамилия</label>
                  <input type="text" name="sn" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Имя</label>
                  <input type="text" name="fn" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Отчество</label>
                  <input type="text" name="pt" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" name="email" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Пароль</label>
                  <input type="password" name="paswd" maxlength="32" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Информация</label>
                  <textarea name="info" rows="5" class="form-control"></textarea required>
                </div>
                <div class="form-group">
                  <input type="submit" name="addTeacherButton" value="Добавить" class="btn btn-primary">
                </div>
              </div>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
