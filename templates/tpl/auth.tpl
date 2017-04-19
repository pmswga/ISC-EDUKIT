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
</div><!-- /.modal -->