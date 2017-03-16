<?php
/* Smarty version 3.1.29, created on 2017-03-16 18:49:50
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\specialty.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58cab41ef05d23_00283696',
  'file_dependency' => 
  array (
    'b4d008feffe188af7d91a776fd879df552251901' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\specialty.tpl',
      1 => 1489679390,
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
function content_58cab41ef05d23_00283696 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Специальности", null);
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
            <div class="col-md-8">
              <form name="changeSpecialtyForm" method="POST" enctype="multipart/form-data">
                <input type="submit" name="editSpecialtyButton" value="Изменить" class="btn btn-warning btn-block">
                <input type="submit" name="removeSpecialtyButton" value="Удалить" class="btn btn-danger btn-block">
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th>Код специальности</th>
                    <th>Описание</th>
                    <th>Файл специальности</th>
                    <th>Выбрать</th>
                  </tr>
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
                    <tr>
                      <td><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getDescription();?>
</td>
                      <td><a href="<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getFile();?>
" target="__blank" download><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getFilename();?>
</a></td>
                      <td><input type="checkbox" name="select_spec[]" value="<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
" class="form-control"></td>
                    </tr>
                  <?php
$_smarty_tpl->tpl_vars['specialty'] = $__foreach_specialty_0_saved_local_item;
}
if ($__foreach_specialty_0_saved_item) {
$_smarty_tpl->tpl_vars['specialty'] = $__foreach_specialty_0_saved_item;
}
?>
                </table>
              </form>
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Добавить новую специальность</legend>
                <form name="addSpecialtyForm" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Код специальности</label>
                    <input type="text" name="code_spec" maxlength="10" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Описание</label>
                    <input type="text" name="descp" maxlength="255" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Файл специальности</label>
                    <input type="file" name="pdf_file">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addSpecialtyButton" value="Добавить" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
