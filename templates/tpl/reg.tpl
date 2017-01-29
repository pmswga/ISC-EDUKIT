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
							{foreach from=$groups item=it}
							<option value={$it['grp']}>{$it['grp']}</option>
							{/foreach}
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

<script type="text/javascript" src="js/checkStudentRegForm.js"></script>