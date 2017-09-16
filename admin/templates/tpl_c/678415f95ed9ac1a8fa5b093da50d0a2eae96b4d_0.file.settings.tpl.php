<?php
/* Smarty version 3.1.29, created on 2017-08-21 20:44:51
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\settings.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599b1c13901ea2_39048242',
  'file_dependency' => 
  array (
    '678415f95ed9ac1a8fa5b093da50d0a2eae96b4d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\settings.tpl',
      1 => 1503337489,
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
function content_599b1c13901ea2_39048242 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Настройки", null);
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
          <li class="active"><a href="#admins" data-toggle="tab">Администраторы</a></li>
          <li><a href="#data" data-toggle="tab">Данные</a></li>
          <li><a href="#logs" data-toggle="tab">Логи</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <form name="deleteAdminsForm" method="POST">
          <div class="tab-content">
            <div class="tab-pane active" id="admins">
              <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th>ФИО</th>
                          <th>Email</th>
                          <th>Выбрать</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['admins']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_admin_0_saved_item = isset($_smarty_tpl->tpl_vars['admin']) ? $_smarty_tpl->tpl_vars['admin'] : false;
$_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['admin']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->_loop = true;
$__foreach_admin_0_saved_local_item = $_smarty_tpl->tpl_vars['admin'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['admin']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['admin']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['admin']->value->getPt();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['admin']->value->getEmail();?>
</td>
                            <td><input type="checkbox" name="admins[]" value="<?php echo $_smarty_tpl->tpl_vars['admin']->value->getEmail();?>
" class="form-control"></td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['admin'] = $__foreach_admin_0_saved_local_item;
}
if ($__foreach_admin_0_saved_item) {
$_smarty_tpl->tpl_vars['admin'] = $__foreach_admin_0_saved_item;
}
?>
                      </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                  <input type="submit" name="deleteAdminsButton" value="Удалить" class="btn btn-danger btn-block">
                  <br>
                  <fieldset>
                    <legend>Добавить администратора</legend>
                    <form name="addAdminForm" method="POST">
                      <div class="form-group">
                        <label>Фамилия</label>
                        <input type="text" name="sn" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="fn" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Отчество</label>
                        <input type="text" name="pt" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" name="paswd" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="addAdminButton" value="Зарегистрировать" class="btn btn-primary pull-right">
                      </div>
                    </form>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="data">
              3
            </div>
            <div class="tab-pane" id="logs">
              <form name="deleteLogsForm" method="POST">              
                <table class="table table-bordered">
                  <thead>
                    <input type="submit" name="deleteLogsButton" value="Удалить" class="btn btn-danger">
                  </thead>
                  <tbody>
                    <tr>
                      <th>№</th>
                      <th>Сообщение</th>
                      <th>Дата</th>
                      <th>Выбрать</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['logs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_log_1_saved_item = isset($_smarty_tpl->tpl_vars['log']) ? $_smarty_tpl->tpl_vars['log'] : false;
$_smarty_tpl->tpl_vars['log'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['log']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
$__foreach_log_1_saved_local_item = $_smarty_tpl->tpl_vars['log'];
?>
                      <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['log']->value['message'];?>
</td>
                          <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['log']->value['date'],"%d.%m.%Y");?>
</td>
                          <td><input type="checkbox" name="logs[]" value="<?php echo $_smarty_tpl->tpl_vars['log']->value['id'];?>
" class="form-control"></td>
                      </tr>
                    <?php
$_smarty_tpl->tpl_vars['log'] = $__foreach_log_1_saved_local_item;
}
if ($__foreach_log_1_saved_item) {
$_smarty_tpl->tpl_vars['log'] = $__foreach_log_1_saved_item;
}
?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
