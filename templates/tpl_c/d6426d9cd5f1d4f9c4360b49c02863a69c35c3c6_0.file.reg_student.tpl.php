<?php
/* Smarty version 3.1.29, created on 2017-10-01 12:55:18
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\modals\reg_student.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59d0bb86cddfa2_80459456',
  'file_dependency' => 
  array (
    'd6426d9cd5f1d4f9c4360b49c02863a69c35c3c6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\modals\\reg_student.tpl',
      1 => 1506851679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59d0bb86cddfa2_80459456 ($_smarty_tpl) {
?>
<div class="ui modal" id="regStudentModal">
  <div class="header">
    Регистрация студента
  </div>
  <div class="content">
    <div id="message" class="ui warning message"></div>
    <?php if ($_smarty_tpl->tpl_vars['groups']->value != NULL) {?>
      <form name="registrationForm" action="php/registration.php" method="POST"  class="ui form">
        <div class="ui stackable grid">
          <div class="row">
            <div class="four wide column">
              <div class="field">
                <label>Фамилия</label>
                <input type="text" name="second_name" required>
              </div>
            </div>
            <div class="four wide column" required>
              <div class="field">
                <label>Имя</label>
                <input type="text" name="first_name" required>
              </div>
            </div>
            <div class="four wide column">
              <div class="field">
                <label>Отчество</label>
                <input type="text" name="patronymic">
              </div>
            </div>
            <div class="four wide column">
              <div class="field">
                <label>Группа</label>
                <select name="grp" required>
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
            </div>
          </div>
          <div class="row">
            <div class="eight wide column">
              <div class="field">
                <label>E-mail</label>
                <input type="email" name="email" required>
              </div>
              <div class="field">
                <label>Пароль</label>
                <input type="password" name="passwd" id="passwd" required>
              </div>
              <div class="field">
                <label>Повторите пароль</label>
                <input type="password" name="retry_password" required>
              </div>
            </div>
            <div class="eight wide column">
              <div class="field">
                <label>Адрес проживания</label>
                <input type="text" name="home_address" required>
              </div>
              <div class="field">
                <label>Телефон</label>
                <input type="tel" name="cell_phone_child" required>
              </div>
              <div class="three fields">
                <div class="field">
                    <label>&nbsp;</label>
                    <input type="reset" class="ui orange button">
                </div>
                <div class="field">
                  <label>&nbsp;</label>
                  <a href="regparent.php" class="ui green button">Я родитель</a>
                </div>
                <div class="field">
                  <label>&nbsp;</label>
                  <input type="submit" name="registrationStudent" value="Готово" class="ui primary button">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    <?php } else { ?>
      <h3>Регистрация закрыта</h3>
    <?php }?>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="js/checkStudentRegForm.js"><?php echo '</script'; ?>
><?php }
}
