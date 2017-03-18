<?php
/* Smarty version 3.1.29, created on 2017-03-18 18:20:59
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\groups.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58cd505b419e01_05883509',
  'file_dependency' => 
  array (
    'df82c2706500726a85601349e3342364d55f9e28' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\groups.tpl',
      1 => 1489850458,
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
function content_58cd505b419e01_05883509 ($_smarty_tpl) {
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
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#viewGroups" data-toggle="tab">Просмотр</a></li>
          <li><a href="#addGroup" data-toggle="tab">Добавить</a></li>
          <li><a href="#editGroup" data-toggle="tab">Изменить</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="viewGroups">
            <div class="row">      
              <form name="removeGroupForm" method="POST">
                <div class="col-md-10">
                  <table class="table table-bordered">
                    <tr>
                      <th>Группа</th>
                      <th>Специальность</th>
                      <th>Кол-во студентов</th>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['group']->value->getCodeSpec();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['group']->value->getCountStudents();?>
</td>
                        <td><input type="checkbox" name="select_grp[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getID();?>
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
                </div>
                <div class="col-md-2">
                  <input type="submit" name="removeGroupButton" value="Удалить" class="btn btn-danger btn-block">
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="addGroup">
            <div class="row">
              <div class="col-md-8">
                <fieldset>
                  <legend>Новая группа</legend>
                  <form name="addGroupForm" method="POST">
                    <div class="form-group">
                      <label>Наименование</label>
                      <input type="text" name="group" class="form-control">
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
                          <option value="<?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
"><?php echo $_smarty_tpl->tpl_vars['specialty']->value->getCode();?>
 -> <?php echo $_smarty_tpl->tpl_vars['specialty']->value->getDescription();?>
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
              <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-block">Перевести на курс выше</button>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="editGroup">
            3
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
