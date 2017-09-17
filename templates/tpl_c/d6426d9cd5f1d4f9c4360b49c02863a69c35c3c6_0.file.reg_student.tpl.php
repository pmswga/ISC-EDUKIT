<?php
/* Smarty version 3.1.29, created on 2017-09-17 21:34:40
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\modals\reg_student.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59bec0402a1121_83838649',
  'file_dependency' => 
  array (
    'd6426d9cd5f1d4f9c4360b49c02863a69c35c3c6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\modals\\reg_student.tpl',
      1 => 1494347732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59bec0402a1121_83838649 ($_smarty_tpl) {
?>
<div class="modal fade" id="reg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Регистрация студента</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <?php if ($_smarty_tpl->tpl_vars['groups']->value != NULL) {?>
            <form name="registration" method="POST" action="php/registration.php">
              <div class="col-md-6">
                <div id="snDiv" class="form-group">
                  <label>Фамилия:</label>
                  <input type="text" name="second_name" class="form-control" required>
                </div>
                <div id="fnDiv" class="form-group">
                  <label>Имя:</label>
                  <input type="text" name="first_name" class="form-control" required>
                </div>
                <div id="ptDiv" class="form-group">
                  <label>Отчество:</label>
                  <input type="text" name="patronymic" class="form-control">
                </div>
                <div id="emailDiv" class="form-group">
                  <label>E-mail:</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div id="passwordDiv" class="form-group">
                  <label>Пароль:</label>
                  <input type="password" name="password" class="form-control" required>
                </div>
                <div id="retryPasswordDiv" class="form-group">
                  <label>Повторите пароль:</label>
                  <input type="password" name="retry_password" class="form-control" required>
                </div>
              </div>
              <div class="col-md-6">
                <div id="grpDiv" class="form-group">
                  <label>Группа</label>
                  <select name="grp" class="form-control" required>
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
                      <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
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
                <div id="addressDiv" class="form-group">
                  <label>Адрес проживания</label>
                  <input name="home_address" type="text" class="form-control">
                </div>
                <div id="cellPhoneDiv" class="form-group">
                  <label>Сотовый телефон</label>
                  <input name="cell_phone_child" type="tel" class="form-control" required>
                </div>
                <div id="registrationSubmitDiv" class="form-group">
                  <input type="reset" class="btn btn-md btn-warning">
                  <input type="submit" name="registrationStudent" class="btn btn-md btn-success" value="Зарегистрироваться">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <a href="regparent.php">Я родитель</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          <?php } else { ?>
            <h1 align="center">Регистрация закрыта</h1>
          <?php }?>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php echo '<script'; ?>
 type="text/javascript" src="js/checkStudentRegForm.js"><?php echo '</script'; ?>
><?php }
}
