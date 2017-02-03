<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Добавить специальность</legend>
					<form name="add_spec" method="POST" enctype="multipart/form-data" onsubmit="return checkSpecForm(this);">
						<div class="form-group">
							<label>Код специальности:</label>
							<input type="text" name="code" maxlength="8" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Наименование:</label>
							<input type="text" name="description" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Файл специальности:</label>
							<input type="file" name="current_file">
						</div>
						<div class="form-group">
							<input name="addNewSpec" type="submit" class="btn btn-primary" value="Добавить">
						</div>
					</form>
				</fieldset>
			</div>
			<div class="col-md-6">
				{if $specs!=NULL}
					<fieldset>
						<legend>Добавить группу</legend>
						<form name="add_grp" method="POST">
							<div class="form-group">
								<label>Номер группы:</label>
								<input name="grp" type="number" min="101" max="420" class="form-control" required>
							</div>
							<div class="form-group">
								<label>Специальность:</label>
								<select name="code_spec_grp" class="form-control" required>
									{foreach from=$specs item=it}
										<option value={$it['id_spec']}>{$it['description']}</option>
									{/foreach}
								</select>
							</div>
							<div class="form-group">
								<select name="payment" class="form-control" required>
									<option value="1">Бюджетная</option>
									<option value="0">Коммерческая</option>
								</select>
							</div>
							<div class="form-group">
								<input name="addNewGrp" type="submit" class="btn btn-primary" value="Добавить">
							</div>
						</form>
					</fieldset>
				{else}
					<h1 align="center">Сначала добавьте специальности</h1>
				{/if}
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<fieldset>
			<legend>
				<div class="row">
					<div class="col-md-8">Просмотр групп</div>
					<div class="col-md-4">
						<div class="row">
							<form name="up_down_course" method="POST">
								<div class="col-md-6">
									<input name="down_course" type="submit" value="Понизить на курс" class="btn btn-danger form-control">
								</div>
								<div class="col-md-6">
									<input name="up_course" type="submit" value="Повысить на курс" class="btn btn-success form-control">
								</div>
							</form>
						</div>
					</div>
				</div>
			</legend>
			<div class="row">
				<div class="col-md-12">
					<form name="removeGroup" method="POST">
						<table class="table table-bordered info_table">
							<tr>
								<td>Группа</td>
								<td>Код специальности</td>
								<td>Тип</td>
								<td>Выбрать</td>
							</tr>
							{foreach from=$groups item=it}
								<tr>
									<td>{$it->getNumberGroup()}</td>
									<td>{$it->getCodeSpec()}</td>
									<td>{if {$it->getStatus()} == 1} Бюджетная {else} Коммерческая {/if}</td>
									<td><input name="removesGroup[]" value="{$it->getNumberGroup()}" type="checkbox" class="form-control"></td>
								</tr>
							{/foreach}
						</table>
						<input name="removeGroupButton" type="submit" class="btn btn-danger" value="Удалить">
					</form>
				</div>
			</div>
		</fieldset>
	</div>
</div>