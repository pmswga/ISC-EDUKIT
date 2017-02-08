<?php
/* Smarty version 3.1.29, created on 2017-02-08 16:08:24
  from "C:\OpenServer\domains\iep.mgkit\control_panel\templates\tpl\admin\notifications.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_589b18486c2028_08067476',
  'file_dependency' => 
  array (
    '90c9c81a63a6f1b1abdaf2e6a94c1df6b3be85dc' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\control_panel\\templates\\tpl\\admin\\notifications.tpl',
      1 => 1486559288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589b18486c2028_08067476 ($_smarty_tpl) {
?>
<div class="row">
  <form name="notifications" method="POST">
    <div class="col-md-6">
      <table class="table table-hover">
        <tr>
          <td>Фамилия</td>
          <td>Имя</td>
          <td>Отчество</td>
          <td>E-mail</td>
          <td>Выбрать</td>
        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['parents']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_0_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_0_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getSn();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getFn();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getPt();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
</td>
            <td><input type="checkbox" name="select_parent[]" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
" class="form-control"></td>
          </tr>
        <?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_local_item;
}
if ($__foreach_parent_0_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_0_saved_item;
}
?>
      </table>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <textarea cols="15" rows="15" name="notification" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="send_notification_button" value="Отправить" class="btn btn-danger">
      </div>
    </div>
  </form>
</div><?php }
}
