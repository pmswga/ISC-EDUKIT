<?php
/* Smarty version 3.1.29, created on 2017-09-02 15:48:57
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\notifications.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59aaa8b9a6ea57_18642229',
  'file_dependency' => 
  array (
    '5968951c6217564465836b1fc1b6498a2e6599b2' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\notifications.tpl',
      1 => 1504356537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:html/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59aaa8b9a6ea57_18642229 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Оповещения", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_var->createLocalArrayVariable($_smarty_tpl, 'js_links', null);
$_smarty_tpl->tpl_vars['js_links']->value[] = "../ckeditor/ckeditor.js";
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'js_links', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="container-fluid">
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<form name="sendNotificationForm" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
          <fieldset>
            <legend>Родители</legend>
            <table class="table table-border">
              <tr>
                <th>ФИО</th>
                <th>E-mail</th>
                <th>Выбрать</th>
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
 <?php echo $_smarty_tpl->tpl_vars['parent']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['parent']->value->getPt();?>
</td>
                  <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
</a></td>
                  <td><input type="checkbox" name="select_user[]" value="<?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
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
          </fieldset>
          <fieldset>
            <legend>Студенты</legend>
            <table class="table table-border">
              <tr>
                <th>ФИО</th>
                <th>Группа</th>
                <th>E-mail</th>
                <th>Выбрать</th>
              </tr>
              <?php
$_from = $_smarty_tpl->tpl_vars['students']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_1_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_1_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
                <tr>
                  <td><?php echo $_smarty_tpl->tpl_vars['student']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['student']->value->getPt();?>
</td>
                  <td><?php echo $_smarty_tpl->tpl_vars['student']->value->getGroup()->getNumberGroup();?>
 (<?php echo $_smarty_tpl->tpl_vars['student']->value->getGroup()->getYearEducation();?>
)</td>
                  <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['student']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['student']->value->getEmail();?>
</td>
                  <td><input type="checkbox" name="select_user[]" value="<?php echo $_smarty_tpl->tpl_vars['student']->value->getEmail();?>
" class="form-control"></td>
                </tr>
              <?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_1_saved_local_item;
}
if ($__foreach_student_1_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_1_saved_item;
}
?>
            </table>
          </fieldset>
				</div>
				<div class="col-md-6">
          <div class="form-group">
            <label>Заголовок</label>
            <input type="text" name="subject" class="form-control">
          </div>
          <div class="form-group">
            <label>Сообщение</label>
            <textarea name="message" rows="15" id="notification_message" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Прикрипите один или более файлов</label>
            <input type="file" name="userfile[]" multiple="multiple">
          </div>
          <div class="form-group">
            <input type="submit" name="sendNotificationButton" value="Отправить" class="btn btn-danger pull-right">
          </div>
				</div>
			</div>
		</form>
	</div>
	
	<?php echo '<script'; ?>
 type="text/javascript">
		
		CKEDITOR.replace("notification_message");
		
	<?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
