<?php
/* Smarty version 3.1.29, created on 2017-08-14 10:16:05
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\traffic.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59914e351cbaa1_34682216',
  'file_dependency' => 
  array (
    '7c43518859a5a3b349254839aca47326ddd9ee12' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\traffic.tpl',
      1 => 1502694963,
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
function content_59914e351cbaa1_34682216 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Посещаемость", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container-fluid">
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <legend>Посещаемость студента</legend>
            <div id="student_traffic">
              <?php if ($_smarty_tpl->tpl_vars['traffic']->value != NULL) {?>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Дата</th>
                      <th>Всего пар</th>
                      <th>Посещено</th>
                      <th>Пропущено</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['traffic']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_traffic_entry_0_saved_item = isset($_smarty_tpl->tpl_vars['traffic_entry']) ? $_smarty_tpl->tpl_vars['traffic_entry'] : false;
$_smarty_tpl->tpl_vars['traffic_entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['traffic_entry']->value) {
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = true;
$__foreach_traffic_entry_0_saved_local_item = $_smarty_tpl->tpl_vars['traffic_entry'];
?>
                      <tr>
                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['traffic_entry']->value['date_visit'],'d.m.Y');?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['traffic_entry']->value['count_all_hours']/2;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['traffic_entry']->value['count_passed_hours']/2;?>
</td>
                        <td><?php echo ($_smarty_tpl->tpl_vars['traffic_entry']->value['count_all_hours']-$_smarty_tpl->tpl_vars['traffic_entry']->value['count_passed_hours'])/2;?>
</td>
                      </tr>
                    <?php
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_0_saved_local_item;
}
if ($__foreach_traffic_entry_0_saved_item) {
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_0_saved_item;
}
?>
                  </tbody>
                </table>
              <?php } else { ?>
                <h3 align="center">Выберете студента, чтобы просмотреть его посещаемость</h3>
              <?php }?>
            </div>
          </fieldset>
        </div>
        <div class="col-md-6">
          <?php if ($_smarty_tpl->tpl_vars['studentsByGroup']->value != NULL) {?>            
            <div class="panel-group" id="views_users">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#views_users" href="#view_students">Студенты</a>
                  </h4>
                </div>
                <div id="view_students" class="panel-collapse collapse-in">
                  <div class="panel-body">
                    <?php
$_from = $_smarty_tpl->tpl_vars['studentsByGroup']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_student_1_saved_item = isset($_smarty_tpl->tpl_vars['student']) ? $_smarty_tpl->tpl_vars['student'] : false;
$__foreach_student_1_saved_key = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->_loop = true;
$__foreach_student_1_saved_local_item = $_smarty_tpl->tpl_vars['student'];
?>
                      <div class="panel-group">
                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value;?>
</a>
                            </h4>
                          </div>
                          <div id="<?php echo $_smarty_tpl->tpl_vars['group']->value;?>
" class="panel-collapse collapse">
                            <div class="panel-body"><table class="table table-bordered">
                              <table class="table table-bordered">
                                <tr>
                                  <th>ФИО</th>
                                  <th>E-mail</th>
                                  <th>Выбрать</th>
                                </tr>
                                <?php
$_from = $_smarty_tpl->tpl_vars['student']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_student_2_saved_item = isset($_smarty_tpl->tpl_vars['one_student']) ? $_smarty_tpl->tpl_vars['one_student'] : false;
$_smarty_tpl->tpl_vars['one_student'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_student']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one_student']->value) {
$_smarty_tpl->tpl_vars['one_student']->_loop = true;
$__foreach_one_student_2_saved_local_item = $_smarty_tpl->tpl_vars['one_student'];
?>
                                  <tr>
                                    <td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['one_student']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['one_student']->value->getPt();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
</td>
                                    <td>
                                      <form name="setChildsForm" method="POST">
                                        <input type="hidden" name="emailStudent" value="<?php echo $_smarty_tpl->tpl_vars['one_student']->value->getEmail();?>
">
                                        <input type="submit" name="selectStudent" value="Выбрать" class="btn btn-primary">
                                      </form>
                                    </td>
                                  </tr>
                                <?php
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_2_saved_local_item;
}
if ($__foreach_one_student_2_saved_item) {
$_smarty_tpl->tpl_vars['one_student'] = $__foreach_one_student_2_saved_item;
}
?>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_1_saved_local_item;
}
if ($__foreach_student_1_saved_item) {
$_smarty_tpl->tpl_vars['student'] = $__foreach_student_1_saved_item;
}
if ($__foreach_student_1_saved_key) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_student_1_saved_key;
}
?>
                  </div>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <h3 align="center">Студенты не зарегистрированы</h3>
          <?php }?>
        </div>
      </div>
    </div>
    
    
    <?php echo '<script'; ?>
 type="text/javascript">
      
      $("[data-toggle='tooltip']").tooltip();
      $("[data-toggle='popover']").popover();
    
    <?php echo '</script'; ?>
>
    
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
