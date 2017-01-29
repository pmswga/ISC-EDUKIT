<?php
/* Smarty version 3.1.29, created on 2016-12-06 23:42:42
  from "C:\OpenServer\domains\edukit.mgkit\templates\tpl\reg.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584722c2252bd3_10354896',
  'file_dependency' => 
  array (
    'bca1e14ac0e3a70234fa60f954fc1a6305e9db52' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\templates\\tpl\\reg.tpl',
      1 => 1481056957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_584722c2252bd3_10354896 ($_smarty_tpl) {
?>
<div class="modal fade" id="reg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Регистрация нового пользователя</h4>
      </div>
      <div class="modal-body">
		<form name="registration" method="POST" action="php/registration.php" onsubmit="return checkRegistrationForm(this);">
			<div class="form-group">
				<label>Фамилия:</label>
				<input type="text" name="second_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Имя:</label>
				<input type="text" name="first_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Отчество:</label>
				<input type="text" name="patronymic" class="form-control">
			</div>
			<div class="form-group">
				<label>E-mail:</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div id="passwordDiv" class="form-group">
				<label>Пароль:</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div id="retryPasswordDiv" class="form-group">
				<label>Повторите пароль:</label>
				<input type="password" name="retry_password" class="form-control">
			</div>
			<div id="registrationSubmitDiv" class="form-group">
				<input type="reset" class="btn btn-md btn-warning">
				<input type="submit" name="registrationButton" class="btn btn-md btn-success">
			</div>
		</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo '<script'; ?>
 type="text/javascript">
	
	document.registration.password.addEventListener("change", setStatus, false);
	document.registration.retry_password.addEventListener("change", setStatus, false);
	
	function setStatus(e)
	{
		var password = document.registration.password.value;
		var retry_password = document.registration.retry_password.value;
		
		if(password != retry_password)
		{
			document.getElementById('passwordDiv').setAttribute("class", "form-group has-error");
			document.getElementById('retryPasswordDiv').setAttribute("class", "form-group has-error");
		}
		else
		{
			document.getElementById('passwordDiv').setAttribute("class", "form-group has-success");
			document.getElementById('retryPasswordDiv').setAttribute("class", "form-group has-success");
		}
	}
	
	function checkRegistrationForm(form)
	{
		var password = form.password.value;
		var retry_password = form.retry_password.value;
		
		if(password == retry_password) return true;
		else
		{
			alert('Пароли не совпадают');
			return false;
		}
	}
	
<?php echo '</script'; ?>
><?php }
}
