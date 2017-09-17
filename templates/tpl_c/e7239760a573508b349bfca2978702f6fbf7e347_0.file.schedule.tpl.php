<?php
/* Smarty version 3.1.29, created on 2017-09-17 22:33:01
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\schedule.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59becded263877_51969918',
  'file_dependency' => 
  array (
    'e7239760a573508b349bfca2978702f6fbf7e347' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\schedule.tpl',
      1 => 1505676759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:blocks/user_menu.tpl' => 1,
    'file:blocks/guest_menu.tpl' => 1,
    'file:blocks/schedule/calls.tpl' => 1,
    'file:blocks/schedule/eats.tpl' => 1,
    'file:modals/reg_student.tpl' => 1,
    'file:modals/auth.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59becded263877_51969918 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Расписание", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container-fluid">
    
    <?php if ($_smarty_tpl->tpl_vars['user']->value != NULL) {?>  
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/user_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php } else { ?>
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/guest_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php }?>

    <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          <div id="rings" class="col-md-3">
            <h2>Расписание</h2>
            <nav id="nowDay" class="text-center">
              <ul class="pagination pagination-sm">
                <li id="1"><a>ПН</a></li>
                <li id="2"><a>ВТ</a></li>
                <li id="3"><a>СР</a></li>
                <li id="4"><a>ЧТ</a></li>
                <li id="5"><a>ПТ</a></li>
                <li id="6"><a>СБ</a></li>
                <li id="7"><a>ВС</a></li>
              </ul>
            </nav>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/schedule/calls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/schedule/eats.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </div>
          <div class="col-md-9">
            <form name="selectGroupForm" class="form-inline" method="POST">
              <div class="form-group">
                <label>Группа: </label>
                <select name="group" class="form-control">
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
                    <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</option>
                  <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_local_item;
}
if ($__foreach_group_0_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_0_saved_item;
}
?>
                </select>
              </div>
              <input type="submit" name="selectGroupButton" value="Показать" class="btn btn-default">
            </form>
            <hr>
            <div class="panel-group" id="scheduleGroups">
              <?php if ($_smarty_tpl->tpl_vars['changed_schedules']->value != NULL) {?>
                <?php
$_from = $_smarty_tpl->tpl_vars['changed_schedules']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_schedule_1_saved_item = isset($_smarty_tpl->tpl_vars['schedule']) ? $_smarty_tpl->tpl_vars['schedule'] : false;
$__foreach_schedule_1_saved_key = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['schedule']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
$__foreach_schedule_1_saved_local_item = $_smarty_tpl->tpl_vars['schedule'];
?>
                  <div class="panel panel-warning">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#scheduleGroups" href="#<?php echo $_smarty_tpl->tpl_vars['grp']->value;?>
">
                          Изменения для <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                        </a>
                      </h4>
                    </div>
                    <div id="<?php echo $_smarty_tpl->tpl_vars['grp']->value;?>
" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <?php
$_from = $_smarty_tpl->tpl_vars['schedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_data_2_saved_item = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data'] : false;
$__foreach_data_2_saved_key = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_2_saved_local_item = $_smarty_tpl->tpl_vars['data'];
?>
                          <table class="table table-hover">
                            <thead>
                              <h3><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'d.m.Y (l)');?>
</h3>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Пара</th>
                                <th>Предмет</th>
                              </tr>
                              <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_3_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_3_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
                                <tr>
                                  <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['pair'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['subject'];?>
</td>
                                </tr>
                              <?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_3_saved_local_item;
}
if ($__foreach_entry_3_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_3_saved_item;
}
?>
                            </tbody>
                          </table>
                        <?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_2_saved_local_item;
}
if ($__foreach_data_2_saved_item) {
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_2_saved_item;
}
if ($__foreach_data_2_saved_key) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_data_2_saved_key;
}
?>
                      </div>
                    </div>
                  </div>
                <?php
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_1_saved_local_item;
}
if ($__foreach_schedule_1_saved_item) {
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_1_saved_item;
}
if ($__foreach_schedule_1_saved_key) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_schedule_1_saved_key;
}
?>
              <?php } else { ?>
                <h3 align="center">Изменений нет</h3>
              <?php }?>
              <?php
$_from = $_smarty_tpl->tpl_vars['schedules']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_schedule_4_saved_item = isset($_smarty_tpl->tpl_vars['schedule']) ? $_smarty_tpl->tpl_vars['schedule'] : false;
$__foreach_schedule_4_saved_key = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['schedule']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
$__foreach_schedule_4_saved_local_item = $_smarty_tpl->tpl_vars['schedule'];
?>
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#scheduleGroups" href="#<?php echo $_smarty_tpl->tpl_vars['grp']->value;?>
">
                        Основное расписание для <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $_smarty_tpl->tpl_vars['grp']->value;?>
" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <?php
$_from = $_smarty_tpl->tpl_vars['schedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_data_5_saved_item = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data'] : false;
$__foreach_data_5_saved_key = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_5_saved_local_item = $_smarty_tpl->tpl_vars['data'];
?>
                        <table class="table table-hover">
                          <thead>
                            <h3><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Пара</th>
                              <th>Нижняя неделя</th>
                              <th>Верхняя неделя</th>
                            </tr>
                            <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_6_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_6_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
                              <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['pair'];?>
</td>
                                <?php if ($_smarty_tpl->tpl_vars['entry']->value['subj_1'] == $_smarty_tpl->tpl_vars['entry']->value['subj_2']) {?>
                                  <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</td>
                                <?php } else { ?>
                                  <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_2'];?>
</td>
                                <?php }?>
                              </tr>
                            <?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_6_saved_local_item;
}
if ($__foreach_entry_6_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_6_saved_item;
}
?>
                          </tbody>
                        </table>
                      <?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_5_saved_local_item;
}
if ($__foreach_data_5_saved_item) {
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_5_saved_item;
}
if ($__foreach_data_5_saved_key) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_data_5_saved_key;
}
?>
                    </div>
                  </div>
                </div>
              <?php
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_4_saved_local_item;
}
if ($__foreach_schedule_4_saved_item) {
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_4_saved_item;
}
if ($__foreach_schedule_4_saved_key) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_schedule_4_saved_key;
}
?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['user']->value == NULL) {?>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:modals/reg_student.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:modals/auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php }?>
  <?php echo '<script'; ?>
 type="text/javascript" src="js/getDay.js"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
