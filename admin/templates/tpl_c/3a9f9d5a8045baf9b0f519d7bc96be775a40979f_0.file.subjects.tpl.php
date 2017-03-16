<?php
/* Smarty version 3.1.29, created on 2017-03-16 19:50:35
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\subjects.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58cac25b5a9211_40744200',
  'file_dependency' => 
  array (
    '3a9f9d5a8045baf9b0f519d7bc96be775a40979f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\subjects.tpl',
      1 => 1489683034,
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
function content_58cac25b5a9211_40744200 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Предметы", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_var->createLocalArrayVariable($_smarty_tpl, 'css_links', null);
$_smarty_tpl->tpl_vars['css_links']->value[] = "vt.css";
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'css_links', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container-fluid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <form name="changeSpecialtyForm" method="POST">
            <div class="col-md-8">
                <table class="table table-bordered">
                  <tr>
                    <th>Название предмета</th>
                    <th>Выбрать</th>
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
                      <td><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</td>
                      <td><input type="checkbox" name="select_subject[]" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
" class="form-control"></td>
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
            <div class="col-md-4">
              <input type="submit" name="removeSpecialtyButton" value="Удалить" class="btn btn-danger btn-block">
                <br>
              <fieldset>
                <legend>Добавить новый предмет</legend>
                <form name="addSubjectForm" method="POST">
                  <div class="form-group">
                    <label>Название предмета</label>
                    <input type="text" name="subject" maxlength="255" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addSubjectButton" value="Добавить" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
