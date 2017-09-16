<?php
/* Smarty version 3.1.29, created on 2017-09-02 15:12:18
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\schedule.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59aaa0221a17d8_72525020',
  'file_dependency' => 
  array (
    'f8500fe63dbd3717cb8cf8bce70b183d2cc75be0' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\schedule.tpl',
      1 => 1504354336,
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
function content_59aaa0221a17d8_72525020 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Расписание", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="container-fluid">
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#general" data-toggle="tab">Основное</a></li>
          <li><a href="#changed" data-toggle="tab">Изменения</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="general">
            <div class="row">
              <br>
              <div class="col-md-8">
                <div class="panel-group" id="scheduleGroups">
                  <?php $_smarty_tpl->tpl_vars['grp_n'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'grp_n', 0);?>
                  <?php
$_from = $_smarty_tpl->tpl_vars['schedules']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_schedule_0_saved_item = isset($_smarty_tpl->tpl_vars['schedule']) ? $_smarty_tpl->tpl_vars['schedule'] : false;
$__foreach_schedule_0_saved_key = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['schedule']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
$__foreach_schedule_0_saved_local_item = $_smarty_tpl->tpl_vars['schedule'];
?>
                    <?php $_smarty_tpl->tpl_vars['day_number'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'day_number', 0);?>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#scheduleGroups" href="#<?php echo $_smarty_tpl->tpl_vars['grp_n']->value;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                          </a>
                        </h4>
                      </div>
                      <div id="<?php echo $_smarty_tpl->tpl_vars['grp_n']->value;?>
" class="panel-collapse collapse">
                        <div class="panel-body">
                          <?php
$_from = $_smarty_tpl->tpl_vars['schedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_data_1_saved_item = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data'] : false;
$__foreach_data_1_saved_key = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_1_saved_local_item = $_smarty_tpl->tpl_vars['data'];
?>
                            <form name="changeScheduleForm" method="POST">
                              <input type="hidden" name="group" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['id_grp'];?>
">
                              <input type="hidden" name="day" value="<?php echo $_smarty_tpl->tpl_vars['day_number']->value;?>
">
                              <table class="table table-hover">
                                <thead>
                                  <h3><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</h3>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th>Пара</th>
                                    <th>Нижняя</th>
                                    <th>Верхняя</th>
                                  </tr>
                                  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                                  <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_2_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_2_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
                                    <tr>
                                      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['pair'];?>
</td>
                                      <td>
                                        <select class="form-control" name="down_pair_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                          <option value="<?php echo $_smarty_tpl->tpl_vars['entry']->value['id_subj_1'];?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</option>
                                          <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_3_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_3_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                                            <?php if ($_smarty_tpl->tpl_vars['entry']->value['subj_1'] != $_smarty_tpl->tpl_vars['subject']->value->getDescription()) {?>
                                              <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
                                            <?php }?>
                                          <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_3_saved_local_item;
}
if ($__foreach_subject_3_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_3_saved_item;
}
?>
                                        </select>
                                      </td>
                                      <td>
                                        <select class="form-control" name="up_pair_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                          <option value="<?php echo $_smarty_tpl->tpl_vars['entry']->value['id_subj_2'];?>
"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_2'];?>
</option>
                                          <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_4_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_4_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                                            <?php if ($_smarty_tpl->tpl_vars['entry']->value['subj_2'] != $_smarty_tpl->tpl_vars['subject']->value->getDescription()) {?>
                                              <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
                                            <?php }?>
                                          <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_local_item;
}
if ($__foreach_subject_4_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_item;
}
?>
                                        </select>
                                      </td>
                                    </tr>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                                  <?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_2_saved_local_item;
}
if ($__foreach_entry_2_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_2_saved_item;
}
?>
                                </tbody>
                              </table>
                              <input type="submit" name="changeScheduleButton" value="Изменить" class="btn btn-sm btn-warning">
                            </form>
                            <?php $_smarty_tpl->tpl_vars['day_number'] = new Smarty_Variable($_smarty_tpl->tpl_vars['day_number']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'day_number', 0);?>
                          <?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_1_saved_local_item;
}
if ($__foreach_data_1_saved_item) {
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_1_saved_item;
}
if ($__foreach_data_1_saved_key) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_data_1_saved_key;
}
?>
                        </div>
                      </div>
                    </div>
                    <?php $_smarty_tpl->tpl_vars['grp_n'] = new Smarty_Variable($_smarty_tpl->tpl_vars['grp_n']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'grp_n', 0);?>
                  <?php
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_0_saved_local_item;
}
if ($__foreach_schedule_0_saved_item) {
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_0_saved_item;
}
if ($__foreach_schedule_0_saved_key) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_schedule_0_saved_key;
}
?>
                </div>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Назначить пару</legend>
                  <form name="addScheduleEntryForm" method="POST">
                    <div class="form-group">
                      <label>День</label>
                      <select name="day" class="form-control">
                        <option value="1">ПН</option>
                        <option value="2">ВТ</option>
                        <option value="3">СР</option>
                        <option value="4">ЧТ</option>
                        <option value="5">ПТ</option>
                        <option value="6">СБ</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Группа</label>
                      <select name="group" class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_5_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_5_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_5_saved_local_item;
}
if ($__foreach_group_5_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_5_saved_item;
}
?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Пара</label>
                      <select name="pair" class="form-control">
                        <option value="1">1 пара</option>
                        <option value="2">2 пара</option>
                        <option value="3">3 пара</option>
                        <option value="4">4 пара</option>
                        <option value="5">5 пара</option>
                        <option value="6">6 пара</option>
                        <option value="7">7 пара</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Предмет</label>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Нижняя</label>
                          <select name="subj_1" class="form-control">
                            <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_6_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_6_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                              <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_6_saved_local_item;
}
if ($__foreach_subject_6_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_6_saved_item;
}
?>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label>Верхняя</label>
                          <select name="subj_2" class="form-control">
                            <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_7_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_7_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                              <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
                            <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_7_saved_local_item;
}
if ($__foreach_subject_7_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_7_saved_item;
}
?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="addScheduleEntryButton" value="Назначить" class="btn btn-primary pull-right">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="changed">
            <br>
            <div class="row">
              <div class="col-md-8">
                <div class="panel-group" id="scheduleChangesGroups">
                  <?php if ($_smarty_tpl->tpl_vars['changedSchedule']->value != NULL) {?>
                    <?php $_smarty_tpl->tpl_vars['group_n'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'group_n', 0);?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['changedSchedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_schedule_8_saved_item = isset($_smarty_tpl->tpl_vars['schedule']) ? $_smarty_tpl->tpl_vars['schedule'] : false;
$__foreach_schedule_8_saved_key = isset($_smarty_tpl->tpl_vars['grp']) ? $_smarty_tpl->tpl_vars['grp'] : false;
$_smarty_tpl->tpl_vars['schedule'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['grp'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['schedule']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['grp']->value => $_smarty_tpl->tpl_vars['schedule']->value) {
$_smarty_tpl->tpl_vars['schedule']->_loop = true;
$__foreach_schedule_8_saved_local_item = $_smarty_tpl->tpl_vars['schedule'];
?>
                      <?php $_smarty_tpl->tpl_vars['day_number'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'day_number', 0);?>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#scheduleChangesGroups" href="#change_<?php echo $_smarty_tpl->tpl_vars['group_n']->value;?>
">
                              <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                            </a>
                          </h4>
                        </div>
                        <div id="change_<?php echo $_smarty_tpl->tpl_vars['group_n']->value;?>
" class="panel-collapse collapse">
                          <div class="panel-body">
                            <?php
$_from = $_smarty_tpl->tpl_vars['schedule']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_data_9_saved_item = isset($_smarty_tpl->tpl_vars['data']) ? $_smarty_tpl->tpl_vars['data'] : false;
$__foreach_data_9_saved_key = isset($_smarty_tpl->tpl_vars['day']) ? $_smarty_tpl->tpl_vars['day'] : false;
$_smarty_tpl->tpl_vars['data'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['day'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['data']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['day']->value => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
$__foreach_data_9_saved_local_item = $_smarty_tpl->tpl_vars['data'];
?>
                              <form name="changeChangedScheduleForm" method="POST">
                                <input type="hidden" name="group" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['id_grp'];?>
">
                                <input type="hidden" name="day" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,'Y-m-d');?>
">
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
                                  <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                                  <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_entry_10_saved_item = isset($_smarty_tpl->tpl_vars['entry']) ? $_smarty_tpl->tpl_vars['entry'] : false;
$_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->value) {
$_smarty_tpl->tpl_vars['entry']->_loop = true;
$__foreach_entry_10_saved_local_item = $_smarty_tpl->tpl_vars['entry'];
?>
                                    <tr>
                                      <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['pair'];?>
</td>
                                      <td>
                                        <select class="form-control" name="pair_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
                                          <option value="0"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subject'];?>
</option>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_11_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_11_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                                              <?php if ($_smarty_tpl->tpl_vars['entry']->value['subject'] != $_smarty_tpl->tpl_vars['subject']->value->getDescription()) {?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
">
                                                  <?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>

                                                </option>
                                              <?php }?>
                                            <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_11_saved_local_item;
}
if ($__foreach_subject_11_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_11_saved_item;
}
?>
                                        </select>
                                      </td>
                                    </tr>
                                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'i', 0);?>
                                  <?php
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_10_saved_local_item;
}
if ($__foreach_entry_10_saved_item) {
$_smarty_tpl->tpl_vars['entry'] = $__foreach_entry_10_saved_item;
}
?>
                                  </tbody>
                                </table>
                                <input type="submit" name="changeChangedScheduleButton" value="Изменить" class="btn btn-sm btn-warning">
                              </form>
                                <?php $_smarty_tpl->tpl_vars['day_number'] = new Smarty_Variable($_smarty_tpl->tpl_vars['day_number']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'day_number', 0);?>
                            <?php
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_9_saved_local_item;
}
if ($__foreach_data_9_saved_item) {
$_smarty_tpl->tpl_vars['data'] = $__foreach_data_9_saved_item;
}
if ($__foreach_data_9_saved_key) {
$_smarty_tpl->tpl_vars['day'] = $__foreach_data_9_saved_key;
}
?>
                          </div>
                        </div>
                      </div>
                      <?php $_smarty_tpl->tpl_vars['group_n'] = new Smarty_Variable($_smarty_tpl->tpl_vars['group_n']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'group_n', 0);?>
                    <?php
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_8_saved_local_item;
}
if ($__foreach_schedule_8_saved_item) {
$_smarty_tpl->tpl_vars['schedule'] = $__foreach_schedule_8_saved_item;
}
if ($__foreach_schedule_8_saved_key) {
$_smarty_tpl->tpl_vars['grp'] = $__foreach_schedule_8_saved_key;
}
?>
                  <?php } else { ?>
                    <h3 align="center">Изменений нет</h3>
                  <?php }?>
                </div>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Задать изменения в расписании</legend>
                  <form name="setChangeScheduleForm" method="POST">
                    <div class="form-group">
                      <label>Дата</label>
                      <input type="datetime" name="day" value="<?php echo $_smarty_tpl->tpl_vars['date_now']->value;?>
" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Группа</label>
                      <select name="group" class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_12_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_12_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_12_saved_local_item;
}
if ($__foreach_group_12_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_12_saved_item;
}
?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Пара</label>
                      <select name="pair" class="form-control">
                        <option value="1">1 пара</option>
                        <option value="2">2 пара</option>
                        <option value="3">3 пара</option>
                        <option value="4">4 пара</option>
                        <option value="5">5 пара</option>
                        <option value="6">6 пара</option>
                        <option value="7">7 пара</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Предмет</label>
                      <select name="subject" class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_13_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_13_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_13_saved_local_item;
}
if ($__foreach_subject_13_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_13_saved_item;
}
?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="setChangeScheduleButton" value="Поставить изменения" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
                <fieldset>
                  <legend>Удалить изменения группы</legend>
                  <form name="deleteChangedScheduleForm" method="POST">
                    <div class="form-group">
                      <label>Группа</label>
                      <select name="group" class="form-control">
                        <?php
$_from = $_smarty_tpl->tpl_vars['groups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_group_14_saved_item = isset($_smarty_tpl->tpl_vars['group']) ? $_smarty_tpl->tpl_vars['group'] : false;
$_smarty_tpl->tpl_vars['group'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['group']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
$__foreach_group_14_saved_local_item = $_smarty_tpl->tpl_vars['group'];
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_14_saved_local_item;
}
if ($__foreach_group_14_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_14_saved_item;
}
?>
                      </select>
                    </div>
                    <input type="submit" name="deleteChangedScheduleButton" value="Удалить все изменения" class="btn btn-danger">
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
