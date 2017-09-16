<?php
/* Smarty version 3.1.29, created on 2017-08-08 14:01:15
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\elder.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598999fb0b5fc3_01980904',
  'file_dependency' => 
  array (
    '7a8649ceff7d07ad4aba31a187f03458f15e756f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\elder.tpl',
      1 => 1495419588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_598999fb0b5fc3_01980904 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой аккаунт</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.js"><?php echo '</script'; ?>
>
		<style>
			
			h1, h2, h3, h4, h5, h6{
				text-align: center;
			}
			
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:users/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
          <div class="row">
            <div class="col-md-12">
              <h2>Отметка посещаемости</h2>
              <?php if ($_smarty_tpl->tpl_vars['sogroups']->value != NULL) {?>
                <form name="commitTrafficForm" method="POST">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td>Кол-во пар сегодня</td>
                        <td><input type="number" name="count_pairs" min="1" max="5" value="1" class="form-control"></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Студент</td>
                        <td>Кол-во посещённых пар</td>
                      </tr>
                      <?php
$_from = $_smarty_tpl->tpl_vars['sogroups']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_it_0_saved_item = isset($_smarty_tpl->tpl_vars['it']) ? $_smarty_tpl->tpl_vars['it'] : false;
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$__foreach_it_0_saved_local_item = $_smarty_tpl->tpl_vars['it'];
?>
                        <tr>
                          <td><a href=account.php?email=<?php echo $_smarty_tpl->tpl_vars['it']->value['email'];?>
><?php echo $_smarty_tpl->tpl_vars['it']->value['sn'];?>
 <?php echo $_smarty_tpl->tpl_vars['it']->value['fn'];?>
</a></td>
                        <td><input type="number" name="traffic[<?php echo $_smarty_tpl->tpl_vars['it']->value['email'];?>
][]" min="1" value="1" max="1" class="traff form-control"></td>
                        </tr>
                      <?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_0_saved_local_item;
}
if ($__foreach_it_0_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_0_saved_item;
}
?>
                        <tr>
                          <td><b><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</b></td>
                        <td><input type="number" name="traffic[<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
][]" min="1" value="1" max="1" class="traff form-control"></td>
                        </tr>
                    </tbody>
                    <tfoot>
                      <tr><td colspan="2"><input type="submit" name="commitTrafficButton" value="Зафиксировать" class="btn btn-success"></td></tr>
                    </tfoot>
                  </table>
                </form>
              <?php } else { ?>
                <h4>Вы уже отметили посещаемость</h4>
              <?php }?>
            </div>
          </div>
					<div class="row">
            <div class="col-md-12">
              <h2>Моё расписание</h2>
            </div>
          </div>
				</div>
				<div class="col-md-4">
					<fieldset>
						<legend>Информация обо мне</legend>
						<table class="table table-striped">
							<tr>
								<td>Фамилия</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</td>
							</tr>
							<tr>
								<td>Имя</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
</td>
							</tr>
							<tr>
								<td>Отчество</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getPt();?>
</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
							</tr>
							<tr>
								<td>Группа</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getGroup()->getNumberGroup();?>
</td>
							</tr>
							<tr>
								<td>Сотовый телефон</td>
								<td><?php echo $_smarty_tpl->tpl_vars['user']->value->getCellPhone();?>
</td>
							</tr>
							<tr>
								<td>Адрес</td>
								<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value->getHomeAddress())===null||$tmp==='' ? "Не указан" : $tmp);?>
</td>
							</tr>
						</table>
					</fieldset>
				</div>
			</div>
			<hr>
			<div class="row" style="padding: 15px;">
				<div class="col-md-8">
					<h2>Моя посещаемость</h2>
          <div id="student_traffic">
            <?php if ($_smarty_tpl->tpl_vars['traffic']->value != NULL) {?>
              <?php
$_from = $_smarty_tpl->tpl_vars['traffic']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_traffic_entry_1_saved_item = isset($_smarty_tpl->tpl_vars['traffic_entry']) ? $_smarty_tpl->tpl_vars['traffic_entry'] : false;
$_smarty_tpl->tpl_vars['traffic_entry'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['traffic_entry']->value) {
$_smarty_tpl->tpl_vars['traffic_entry']->_loop = true;
$__foreach_traffic_entry_1_saved_local_item = $_smarty_tpl->tpl_vars['traffic_entry'];
?>
                <div class="cube" 
                  data-toggle="popover" 
                  data-placement="top"                  
                  data-html="true"                  
                  title="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['traffic_entry']->value['date_visit'],'d.m.Y');?>
" 
                  data-content="
                    <table class='table table-border'>
                      <tr>
                        <td>Пар</td>
                        <td>Посещено</td>
                        <td>Пропущено</td>
                      </tr>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['traffic_entry']->value['count_all_hours']/2;?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['traffic_entry']->value['count_passed_hours']/2;?>
</td>
                        <td><?php echo ($_smarty_tpl->tpl_vars['traffic_entry']->value['count_all_hours']-$_smarty_tpl->tpl_vars['traffic_entry']->value['count_passed_hours'])/2;?>
</td>
                      </tr>
                    </table>">
                </div>
              <?php
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_1_saved_local_item;
}
if ($__foreach_traffic_entry_1_saved_item) {
$_smarty_tpl->tpl_vars['traffic_entry'] = $__foreach_traffic_entry_1_saved_item;
}
?>
            <?php } else { ?>
              <h3>Похоже, что вы вообще не посещали колледж...</h3>
            <?php }?>
          </div>
				</div>
				<div class="col-md-4">
					<div class="panel-group" id="tests">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#tests" href="#s_tests">Тесты</a></h4>
							</div>
							<div id="s_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<?php if ($_smarty_tpl->tpl_vars['tests']->value != NULL) {?>
										<table class="table table-bordered">
											<thead>
												<th>Название</th>
												<th>Предмет</th>
												<th>Автор</th>
											</thead>
											<tbody>
												<?php
$_from = $_smarty_tpl->tpl_vars['tests']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_2_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_2_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
													<tr>
													<td><a href="student/complete.php?test_id=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getAuthor();?>
</td>
													</tr>
												<?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_2_saved_local_item;
}
if ($__foreach_test_2_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_2_saved_item;
}
?>
											</tbody>
										</table>
									<?php } else { ?>
										<h2>Нету доступных тестов</h2>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-group" id="completes_tests">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#completes_tests" href="#c_tests">Пройденные тесты</a></h4>
							</div>
							<div id="c_tests" class="panel-collapse collapse">
								<div class="panel-body">
									<?php if ($_smarty_tpl->tpl_vars['completedTests']->value != NULL) {?>
										<table class="table table-bordered">
											<thead>
												<th>Название</th>
												<th>Предмет</th>
												<th>Автор</th>
											</thead>
											<tbody>
												<?php
$_from = $_smarty_tpl->tpl_vars['completedTests']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_3_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_3_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['test']->value->getAuthorEmail();?>
</td>
												<?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_3_saved_local_item;
}
if ($__foreach_test_3_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_3_saved_item;
}
?>
											</tbody>
										</table>
									<?php } else { ?>
										<h4>Вы ещё не прошли ни одного теста</h4>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    
    <?php echo '<script'; ?>
 type="text/javascript">
    
      $("[name='count_pairs']").change(function(){
        
        var count_pairs = $(this).val();
        
        $(".traff").each(function (index, value){          
          $(value).attr("max", count_pairs);
        });
        
      });
      
      $("[data-toggle='tooltip']").tooltip();
      $("[data-toggle='popover']").popover();
    
    <?php echo '</script'; ?>
>
    
	</body>
</html><?php }
}
