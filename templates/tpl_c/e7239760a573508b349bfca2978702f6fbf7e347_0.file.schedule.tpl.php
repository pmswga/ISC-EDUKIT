<?php
/* Smarty version 3.1.29, created on 2017-09-24 17:35:31
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\schedule.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c7c2b3a00dd6_44575768',
  'file_dependency' => 
  array (
    'e7239760a573508b349bfca2978702f6fbf7e347' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\schedule.tpl',
      1 => 1506263730,
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
function content_59c7c2b3a00dd6_44575768 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Расписание", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
          <?php if ($_smarty_tpl->tpl_vars['user']->value != NULL) {?>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/user_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
          <?php } else { ?>
            <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/guest_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          <?php }?>
      </div>
      <div class="thirteen wide column">
        <div class="ui stackable grid">
          <div class="row">
            <div class="two wide column">
              <div id="week" class="ui mini statistic">
                <div class="value">
                  <?php echo $_smarty_tpl->tpl_vars['week']->value;?>

                </div>
                <div class="label">
                  Неделя
                </div>
              </div>
            </div>
            <div class="fourteen wide column">
              <div id="nowDay" class="ui buttons">
                <a id="1" class="ui red button">ПН</a>
                <a id="2" class="ui orange button">ВТ</a>
                <a id="3" class="ui yellow button">СР</a>
                <a id="4" class="ui green button">ЧТ</a>
                <a id="5" class="ui teal button">ПТ</a>
                <a id="6" class="ui blue button">СБ</a>
                <a id="7" class="ui violet button">ВС</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="ten wide column">
              <div class="ui stackable grid">
                <div class="row">
                  <div class="sixteen wide column">
                    <form name="selectGroupForm" method="POST" class="ui form">
                      <div class="field">
                        <div class="ui stackable grid">
                          <div class="eleven wide column">
                            <select name="group" class="ui fluid dropdown">
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
                          <div class="five wide column">
                            <input type="submit" name="selectGroupButton" value="Показать расписание" class="ui button">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="sixteen wide column">
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
                      <div id="groupSchedule" class="ui styled accordion">
                          <div class="active title">
                            Изменения
                          </div>
                          <div class="active content">
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
                              <div class="accordion">
                                <div class="title">
                                  <h3><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['day']->value,"d.m.Y");?>
</h3>
                                </div>
                                <div class="content">
                                  <table class="ui table bordered">
                                    <thead>
                                      <tr>
                                        <th><h4>Пара</h4></th>
                                        <th><h4>Нижняя неделя</h4></th>
                                        <th><h4>Верхняя неделя</h4></th>
                                      </tr>
                                    </thead>
                                    <tbody>
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
                                          <?php if ($_smarty_tpl->tpl_vars['entry']->value['subj_1'] == $_smarty_tpl->tpl_vars['entry']->value['subj_2']) {?>
                                            <td colspan="2"><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</td>
                                          <?php } else { ?>
                                            <th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_2'];?>
</th>
                                          <?php }?>
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
                                </div>
                              </div>
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
                    <?php }?>
                    <br>
                    <?php if ($_smarty_tpl->tpl_vars['schedules']->value != NULL) {?>
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
                        <div id="groupSchedule" class="ui styled accordion">
                          <div class="active title">
                            Основное расписание для <?php echo $_smarty_tpl->tpl_vars['grp']->value;?>

                          </div>
                          <div class="active content">
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
                              <div class="accordion">
                                <div class="title">
                                  <h3><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</h3>
                                </div>
                                <div class="content">
                                  <table class="ui table bordered">
                                    <thead>
                                      <tr>
                                        <th><h4>Пара</h4></th>
                                        <th><h4>Нижняя неделя</h4></th>
                                        <th><h4>Верхняя неделя</h4></th>
                                      </tr>
                                    </thead>
                                    <tbody>
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
                                            <th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_1'];?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['entry']->value['subj_2'];?>
</th>
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
                                </div>
                              </div>
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
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
            <div class="six wide column">
              <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/schedule/calls.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

              <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/schedule/eats.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
  <?php echo '<script'; ?>
 type="text/javascript">
    $('.ui.accordion').accordion();
  <?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
