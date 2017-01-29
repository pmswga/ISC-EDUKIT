<div class="row">
	<div class="col-md-4">
		<fieldset>
			<legend>Добавить предмет</legend>
			<form name="add_subject" method="POST">
				<div class="form-group">
					<label>Наименование</label>
					<input name="descritption" type="text" class="form-control">
				</div>
				<div class="form-group">
					<input name="add_subject_button" type="submit" class="btn btn-primary" value="Добавить">
				</div>
			</form>
		</fieldset>
	</div>
	<div class="col-md-8">
		<table class="table table-bordered info_table">
			<tr>
				<td>Название предмета</td>
				<td>Перподаватель</td>
			</tr>
			{foreach from=$subjects item=subject}
				<tr>
					<td>{$subject['description']}</td>
				</tr>
			{/foreach}
		</table>
	</div>
</div>