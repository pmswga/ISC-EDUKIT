<?php
/* Smarty version 3.1.29, created on 2017-08-08 14:01:15
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\auth.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598999fbbf1269_54600078',
  'file_dependency' => 
  array (
    'dcfbfb8ff99aa3367e14a8d555ab0a33c2ed63e3' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\auth.tpl',
      1 => 1493399107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598999fbbf1269_54600078 ($_smarty_tpl) {
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
						<div class="col-md-3">
						</div>
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
								<a href="#Молодец">Забыл пароль?</a>
								<input name="authorizateButton" type="submit" class="btn btn-primary" value="Войти">
							</div>
						</div>
						<div class="col-md-3">
						</div>
					</form>
				</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }
}
