<?php
/* Smarty version 3.1.29, created on 2017-08-23 15:40:33
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\reg_parent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599d77c18f6751_07830756',
  'file_dependency' => 
  array (
    'c8dbaa1d78cf31b6d6f8715305b5852859db6e6c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\reg_parent.tpl',
      1 => 1503219610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_599d77c18f6751_07830756 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Регистрация родителя", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<br>
<div class="container-fluid">
  <form name="regParentForm" method="POST" onsubmit="return checkRegParentForm();">
    <div class="row">
      <div class="col-md-4">
        <fieldset>
          <legend>Основная информация</legend>
          <div class="form-group">
            <label>Фамилия:</label>
            <input type="text" name="sn" class="form-control" value="Шазам">
          </div>
          <div class="form-group">
            <label>Имя:</label>
            <input type="text" name="fn" class="form-control" value="Сафин">
          </div>
          <div class="form-group">
            <label>Отчество:</label>
            <input type="text" name="pt" class="form-control" value="Сергеевич">
          </div>
          <div class="form-group">
            <label>Возраст:</label>
            <input type="number" name="age" class="form-control" min="20" value="32">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="shazam@mail.ru">
          </div>
          <div class="form-group">
            <label>Пароль:</label>
            <input type="password" name="password" class="form-control" value="password">
          </div>
          <div class="form-group">
            <label>Повторите пароль:</label>
            <input type="password" name="retry_password" class="form-control" value="password">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Домашний телефон:</label>
                  <input type="tel" name="home_phone" class="form-control" value="NONE">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Сотовый телефон:</label>
                  <input type="tel" name="cell_phone" class="form-control" value="NONE">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Место работы:</label>
                  <input type="text" name="work_place" class="form-control" value="Intel">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Должность:</label>
                  <input type="text" name="post" class="form-control" value="Генеральный директор">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <label>Образование</label>
                <select class="form-control" name="education">
                  <option>Среднее</option>
                  <option>Высшее</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" name="isAgree"> Я согласен(на) на обработку персональных данных
          </div>
          <div class="form-group">
            <input type="checkbox" name="isMyChildren"> Я подтверждаю, что выбранные дети МОИ*
          </div>
          <div class="form-group">
            <p style="color: red;">* - После выбора детей вы не сможете изменить их</p>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <a href="index.php" class="btn btn-warning btn-lg">Назад</a>
              </div>
              <div class="col-md-6">
                <input class="btn btn-success btn-lg pull-right" name="regParent" type="submit" value="Зарегистрироваться">
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <fieldset>
              <legend>Выбор ребёнка</legend>
              <form name="setChildsForm" method="POST">
                <?php
$_from = $_smarty_tpl->tpl_vars['studentsByGroup']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_0_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$__foreach_student_0_saved_key = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_0_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
                  <div class="panel-group">
                    <div class="panel panel-success">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value;?>
</a>
                        </h4>
                      </div>
                      <div id="<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
" class="panel-collapse collapse">
                        <div class="panel-body"><table class="table table-bordered">
                          <table class="table table-bordered">
                            <tr>
                              <th>ФИО</th>
                              <th>E-mail</th>
                              <th>Выбрать</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->tpl_vars['student']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_student_1_saved_item = isset($_smarty_tpl->tpl_vars['one_student']) ? $_smarty_tpl->tpl_vars['one_student'] : false;
$_smarty_tpl->tpl_vars['one_student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one_student']->value) {
$_smarty_tpl->tpl_vars['one_student']->_loop = true;
$__foreach_one_student_1_saved_local_item = $_smarty_tpl->tpl_vars['one_student'];
?>
                              <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['one_student']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['one_student']->value->getPt();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
</td>
                                <td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
" name="childs[]" class="form-control"></td>
                              </tr>
                            <?php
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_1_saved_local_item;
}
if ($__foreach_one_student_1_saved_item) {
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_1_saved_item;
}
?>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_0_saved_local_item;
}
if ($__foreach_student_0_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_0_saved_item;
}
if ($__foreach_student_0_saved_key) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_student_0_saved_key;
}
?>
              </form>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
  
  function checkRegParentForm(form)
  {
    if (childs.toString() == "") {
      alert("Вы не выбрали ребёнка");
      return false;
    } else {    
      return true;
    }
  }
  
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
