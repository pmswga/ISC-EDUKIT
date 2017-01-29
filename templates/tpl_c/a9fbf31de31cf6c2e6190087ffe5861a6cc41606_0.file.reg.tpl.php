<?php
/* Smarty version 3.1.29, created on 2017-01-04 12:37:19
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\reg.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_586cc24fd75a14_05826371',
  'file_dependency' => 
  array (
    'a9fbf31de31cf6c2e6190087ffe5861a6cc41606' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\reg.tpl',
      1 => 1483522639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586cc24fd75a14_05826371 ($_smarty_tpl) {
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
			<form name="registration" method="POST" action="php/registration.php" onsubmit="return checkRegistrationForm(this);">
				<div class="col-md-6">
					<div class="form-group">
						<label>Фамилия:</label>
						<input type="text" name="second_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Имя:</label>
						<input type="text" name="first_name" class="form-control" required>
					</div>
					<div class="form-group">
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
					<div class="form-group">
						<label>Группа</label>
						<select name="grp" class="form-control" required>
							<?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_it_0_saved_item = isset($_smarty_tpl->tpl_vars['it']) ? $_smarty_tpl->tpl_vars['it'] : false;
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$__foreach_it_0_saved_local_item = $_smarty_tpl->tpl_vars['it'];
?>
							<option value=<?php echo $_smarty_tpl->tpl_vars['it']->value['grp'];?>
><?php echo $_smarty_tpl->tpl_vars['it']->value['grp'];?>
</option>
							<?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_0_saved_local_item;
}
if ($__foreach_it_0_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_0_saved_item;
}
?>
						</select>
					</div>
					<div class="form-group">
						<label>Дата рождения</label>
						<input name="date_birthday" type="date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Адрес проживания</label>
						<input name="home_address" type="text" class="form-control">
					</div>
					<div class="form-group">
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
							<a href="registrationParent.php">Я родитель</a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--
	
	!!!СДЕЛАТЬ ТЩАТЕЛЬНУЮ ПРОВРЕКУ ДАННЫХ!!!

-->

<?php echo '<script'; ?>
 type="text/javascript" src="js/checkStudentRegForm.js"><?php echo '</script'; ?>
><?php }
}
