<?php
/* Smarty version 3.1.29, created on 2017-03-16 13:57:51
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\admin\specs_groups.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ca6faf6c0f99_66256324',
  'file_dependency' => 
  array (
    '20e7ad7519d5ded40a4dadf875a3fcff8f5730d6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\admin\\specs_groups.tpl',
      1 => 1487147062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca6faf6c0f99_66256324 ($_smarty_tpl) {
?>
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
				<?php if ($_smarty_tpl->tpl_vars['specialtyes']->value != NULL) {?>
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
									<?php
$_from = $_smarty_tpl->tpl_vars['specialtyes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_specialty_0_saved_item = isset($_smarty_tpl->tpl_vars['specialty']) ? $_smarty_tpl->tpl_vars['specialty'] : false;
$_smarty_tpl->tpl_vars['specialty'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['specialty']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['specialty']->value) {
$_smarty_tpl->tpl_vars['specialty']->_loop = true;
$__foreach_specialty_0_saved_local_item = $_smarty_tpl->tpl_vars['specialty'];
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
"><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getDescription();?>
</option>
									<?php
$_smarty_tpl->tpl_vars['specialty'] = $__foreach_specialty_0_saved_local_item;
}
if ($__foreach_specialty_0_saved_item) {
$_smarty_tpl->tpl_vars['specialty'] = $__foreach_specialty_0_saved_item;
}
?>
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
				<?php } else { ?>
					<h1 align="center">Сначала добавьте специальности</h1>
				<?php }?>
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
							<?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_it_1_saved_item = isset($_smarty_tpl->tpl_vars['it']) ? $_smarty_tpl->tpl_vars['it'] : false;
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$__foreach_it_1_saved_local_item = $_smarty_tpl->tpl_vars['it'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['it']->value->getNumberGroup();?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['it']->value->getCodeSpec();?>
</td>
									<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['it']->value->getStatus();
$_tmp1=ob_get_clean();
if ($_tmp1 == 1) {?> Бюджетная <?php } else { ?> Коммерческая <?php }?></td>
									<td><input name="removesGroup[]" value="<?php echo $_smarty_tpl->tpl_vars['it']->value->getNumberGroup();?>
" type="checkbox" class="form-control"></td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_1_saved_local_item;
}
if ($__foreach_it_1_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_1_saved_item;
}
?>
						</table>
						<input name="removeGroupButton" type="submit" class="btn btn-danger" value="Удалить">
					</form>
				</div>
			</div>
		</fieldset>
	</div>
</div><?php }
}
