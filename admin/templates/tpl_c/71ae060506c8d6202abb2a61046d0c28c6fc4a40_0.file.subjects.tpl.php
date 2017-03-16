<?php
/* Smarty version 3.1.29, created on 2017-03-16 13:57:51
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\admin\subjects.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ca6faf71eba3_51620283',
  'file_dependency' => 
  array (
    '71ae060506c8d6202abb2a61046d0c28c6fc4a40' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\admin\\subjects.tpl',
      1 => 1486146619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca6faf71eba3_51620283 ($_smarty_tpl) {
?>
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
			</tr>
			<?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_0_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_0_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_local_item;
}
if ($__foreach_subject_0_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_item;
}
?>
		</table>
	</div>
</div><?php }
}
