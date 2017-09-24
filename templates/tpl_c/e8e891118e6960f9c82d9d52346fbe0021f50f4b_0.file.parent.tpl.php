<?php
/* Smarty version 3.1.29, created on 2017-09-24 17:53:33
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\parent.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c7c6ed4b0f82_25819360',
  'file_dependency' => 
  array (
    'e8e891118e6960f9c82d9d52346fbe0021f50f4b' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\parent.tpl',
      1 => 1506264812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:blocks/user_menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59c7c6ed4b0f82_25819360 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars['title'] = new Smarty_Variable("Личный кабинет", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'title', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
				<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/user_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			</div>
			<div class="thirteen wide column">
        <div class="ui stackble grid">
          <div class="ten wide column">
            <?php if ($_smarty_tpl->tpl_vars['childs']->value != NULL) {?>
              <?php
$_from = $_smarty_tpl->tpl_vars['childs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_child_0_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$__foreach_child_0_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
                <div class="ui styled accordion">
                  <div class="active title">
                    <?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getPt();?>

                  </div>
                  <div class="active content">
                    <table class="ui table">
                      <tbody>
                        <tr>
                          <td>Email</td>
                          <td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getEmail();?>
</a></td>
                        </tr>
                        <tr>
                          <td>Группа</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getGroup()->getNumberGroup();?>
</td>
                        </tr>
                        <tr>
                          <td>Телефон</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getCellPhone();?>
</td>
                        </tr>
                        <tr>
                          <td>Адрес</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getHomeAddress();?>
</td>
                        </tr>
                        <tr>
                          <td>Специальность</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getGroup()->getSpec()->getDescription();?>
</td>
                        </tr>
                        <tr>
                          <td>Код специальности</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['child']->value['student']->getGroup()->getSpec()->getCode();?>
</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="accrodion">
                      <div class="title">
                        Результаты тестирования
                      </div>
                      <div class="content">
                        <?php if ($_smarty_tpl->tpl_vars['child']->value['tests'] != NULL) {?>
                          <table class="ui table striped">
                            <thead>
                              <tr>
                                <th>Название теста</th>
                                <th>Предмет</th>
                                <th>Оценка</th>
                              </tr>                                        
                            </thead>
                            <tbody>
                              <?php
$_from = $_smarty_tpl->tpl_vars['child']->value['tests'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_1_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_1_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
                                <tr>
                                  <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject();?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getMark();?>
</td>
                                </tr>
                              <?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_1_saved_local_item;
}
if ($__foreach_test_1_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_1_saved_item;
}
?>
                            </tbody>
                          </table>
                        <?php } else { ?>
                          <h3>Результатов тестирования нет</h3>
                        <?php }?>
                      </div>
                    </div>
                    <div class="accrodion">
                      <div class="title">
                        Посещаемость
                      </div>
                      <div class="content">
                        <?php if ($_smarty_tpl->tpl_vars['child']->value['traffic'] != NULL) {?>
                          <table class="ui table striped">
                            <thead>
                              <tr>
                                <th>Дата</th>
                                <th>Всего пар</th>
                                <th>Посещено</th>
                                <th>Пропущено</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
$_from = $_smarty_tpl->tpl_vars['child']->value['traffic'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_traffic_entry_2_saved_item = isset($_smarty_tpl->tpl_vars['traffic_entry']) ? $_smarty_tpl->tpl_vars['traffic_entry'] : false;
$_smarty_tpl->tpl_vars['traffic_entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['traffic_entry']->value) {
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = true;
$__foreach_traffic_entry_2_saved_local_item = $_smarty_tpl->tpl_vars['traffic_entry'];
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
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_2_saved_local_item;
}
if ($__foreach_traffic_entry_2_saved_item) {
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_2_saved_item;
}
?>
                            </tbody>
                          </table>
                        <?php } else { ?>
                          <h3>Похоже, что ваш ребёнок вообще не посещали колледж...</h3>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_local_item;
}
if ($__foreach_child_0_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_item;
}
?>
						<?php }?>
          </div>
          <div class="six wide column">
            <table class="ui table">
              <thead>
                <tr>
                  <th colspan="2"><h4>Обо мне</h4></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><div class="ui ribbon label">Фамилия</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Имя</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Отчество</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Email</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Возраст</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getAge();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Домашний телефон</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getHomePhone();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Сотовый телефон</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Место работы</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getWorkPlace();?>
</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Должность</div></td>
                  <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPost();?>
</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo '<script'; ?>
 type="text/javascript">
    
		$('.ui.accordion').accordion();
  
  <?php echo '</script'; ?>
>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
