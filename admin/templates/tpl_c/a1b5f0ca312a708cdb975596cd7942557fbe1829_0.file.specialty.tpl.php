<?php
/* Smarty version 3.1.29, created on 2017-09-02 13:12:57
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\specialty.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59aa8429022fd8_54836697',
  'file_dependency' => 
  array (
    'a1b5f0ca312a708cdb975596cd7942557fbe1829' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\specialty.tpl',
      1 => 1504347176,
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
function content_59aa8429022fd8_54836697 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Специальности", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <form name="changeSpecialtyForm" method="POST" enctype="multipart/form-data">
    <div class="container-fluid">
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
              <?php if ($_smarty_tpl->tpl_vars['specialtyes']->value != NULL) {?>                  
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
                      <td><p><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
</p></td>
                      <td><p><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getDescription();?>
</p></td>
                      <td><a href="pdfs/<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getFilename();?>
" download><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getFilename();?>
</a></td>
                      <td><input type="checkbox" name="select_spec[]" value="<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getSpecialtyID();?>
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
              <?php } else { ?>
                <h1 align="center">Специальности не добавлены</h1>
              <?php }?>
            </div>
            <div class="col-md-4">
              <!--<input type="submit" name="editSpecialtyButton" value="Изменить" class="btn btn-warning btn-block">-->
              <input type="submit" name="removeSpecialtyButton" value="Удалить" class="btn btn-danger btn-block">
              <br>
              <fieldset>
                <legend>Новая специальность</legend>
                <form name="addSpecialtyForm" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Код специальности</label>
                    <div class="row">
                      <div class="col-md-4">
                        <input type="number" name="code_spec_1" maxlength="2" class="form-control">
                      </div>
                      <div class="col-md-4">
                        <input type="number" name="code_spec_2" maxlength="2" class="form-control">
                      </div>
                      <div class="col-md-4">
                        <input type="number" name="code_spec_3" maxlength="2" class="form-control">
                      </div>
                    </div>
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
  </form>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
