<?php
/* Smarty version 3.1.29, created on 2017-01-03 13:08:10
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\auth.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_586b780ac5bca7_97450552',
  'file_dependency' => 
  array (
    '5a2946550f443ab19f7232d3989cbe30cee92ffd' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\auth.tpl',
      1 => 1483438090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586b780ac5bca7_97450552 ($_smarty_tpl) {
?>
<div class="modal fade" id="auth">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 align="center" class="modal-title">Вход</h3>
      </div>
      <div class="modal-body">
		<div class="row">
			<form name="authorizate" action="php/login.php" method="POST">
				<div class="col-md-6">
					<div class="form-group">
						<label>Email:</label>
						<input name="email" type="email" maxlength="50" class="form-control">
					</div>
					<div class="form-group">
						<label>Пароль:</label>
						<input name="password" type="password" class="form-control">
					</div>
					<div id="authorizateButtonDiv" class="form-group">
						<a href="#МолодецБл*ть">Забыл пароль?</a>
						<input name="authorizateButton" type="submit" class="btn btn-primary" value="Войти">
					</div>
				</div>
			</form>
		</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }
}
