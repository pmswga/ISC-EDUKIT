<?php
/* Smarty version 3.1.29, created on 2017-10-01 12:24:57
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\groups.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59d0b469154143_88703034',
  'file_dependency' => 
  array (
    '5cb89bfaab9fceef5d04b722cd9432c841f8e7e8' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\groups.tpl',
      1 => 1506849868,
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
function content_59d0b469154143_88703034 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Группы", null);
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
          <form name="removeGroupForm" method="POST">
            <div class="col-md-8">
              <?php if ($_smarty_tpl->tpl_vars['groups']->value != NULL) {?>
                <table class="table table-bordered">
                  <tr>
                    <th>Группа</th>
                    <th>Специальность</th>
                    <th>Года обучения</th>
                    <th>Тип</th>
                    <th>Выбрать</th>
                  </tr>
                  <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_0_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_0_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                    <tr>
                      <td><p><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</p></td>
                      <td><p><?php echo $_smarty_tpl->tpl_vars['group']->value->getCode();?>
</p></td>
                      <td><p><?php echo $_smarty_tpl->tpl_vars['group']->value->getYearEducation();?>
</p></td>
                      <td>
                        <p>
                          <?php if ($_smarty_tpl->tpl_vars['group']->value->getStatus() == 1) {?>
                            Бюджетная
                          <?php } elseif ($_smarty_tpl->tpl_vars['group']->value->getStatus() == 0) {?>
                            Коммерческая
                          <?php }?>
                        </p>
                      </td>
                      <td><input type="checkbox" name="select_grp[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
" class="form-control"></td>
                    </tr>
                  <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_local_item;
}
if ($__foreach_group_0_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_item;
}
?>
                </table>
              <?php } else { ?>
                <h1 align="center">Группы не добавлены</h1>
              <?php }?>
            </div>
            <div class="col-md-4">
              <input type="submit" name="removeGroupButton" value="Удалить" class="btn btn-danger btn-block">
              <br>
              <fieldset>
                <legend>Новая группа</legend>
                <form name="addGroupForm" method="POST">
                  <div class="form-group">
                    <label>Наименование</label>
                    <input type="text" name="group" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Года обучения</label>
                    <div class="row">
                      <div class="col-md-6">                      
                        <input type="number" name="edu_year_1" min="2000" value="<?php echo $_smarty_tpl->tpl_vars['currentYear']->value;?>
" max="2099" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="number" name="edu_year_2" min="2000" value="<?php echo $_smarty_tpl->tpl_vars['currentYear']->value+1;?>
" max="2099" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Специальность</label>
                    <select name="spec" class="form-control">
                      <?php
$_from = $_smarty_tpl->tpl_vars['specialtyes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_specialty_1_saved_item = isset($_smarty_tpl->tpl_vars['specialty']) ? $_smarty_tpl->tpl_vars['specialty'] : false;
$_smarty_tpl->tpl_vars['specialty'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['specialty']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['specialty']->value) {
$_smarty_tpl->tpl_vars['specialty']->_loop = true;
$__foreach_specialty_1_saved_local_item = $_smarty_tpl->tpl_vars['specialty'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getSpecialtyID();?>
"><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
 <?php echo $_smarty_tpl->tpl_vars['specialty']->value->getDescription();?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['specialty'] = $__foreach_specialty_1_saved_local_item;
}
if ($__foreach_specialty_1_saved_item) {
$_smarty_tpl->tpl_vars['specialty'] = $__foreach_specialty_1_saved_item;
}
?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Тип</label>
                    <select name="payment" class="form-control">
                      <option value="1">Бюджетная</option>
                      <option value="0">Коммерческая</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addGroupButton" value="Добавить" class="btn btn-primary">
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
