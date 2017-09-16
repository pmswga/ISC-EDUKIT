<?php
/* Smarty version 3.1.29, created on 2017-09-02 14:51:55
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\accounts\teacher.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59aa9b5b1b14d0_16359124',
  'file_dependency' => 
  array (
    'f1495df452cfb052338e580d464e1226da1f94c1' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\accounts\\teacher.tpl',
      1 => 1504353114,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/menu.tpl' => 1,
  ),
),false)) {
function content_59aa9b5b1b14d0_16359124 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Мой аккаунт</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/boostrap/bootstrap.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
		<style>
			
			h1, h2{
				text-align: center;
			}
			
			th {
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
          <form name="removeTestForm" method="POST">
            <div class="row">
              <div class="col-md-12">
                <h2>
                  Мои тесты
                  <a class="btn btn-primary" data-toggle="modal" data-target="#addTestDialog">+</a>  
                  <input type="submit" name="removeTestButton" value="-" class="btn btn-danger">
                </h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->getTests() != NULL) {?>
                      <table class="table table-bordered">
                        <tr>
                          <th>Название</th>
                          <th>Предмет</th>
                          <th>Действие</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getTests();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_test_0_saved_item = isset($_smarty_tpl->tpl_vars['test']) ? $_smarty_tpl->tpl_vars['test'] : false;
$_smarty_tpl->tpl_vars['test'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['test']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['test']->value) {
$_smarty_tpl->tpl_vars['test']->_loop = true;
$__foreach_test_0_saved_local_item = $_smarty_tpl->tpl_vars['test'];
?>
                          <tr>
                            <td><a href="teacher/aboutTest.php?test=<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
                            <td style="display: flex; justify-content: space-around;">
                              <input type="checkbox" name="select_test[]" value="<?php echo $_smarty_tpl->tpl_vars['test']->value->getTestID();?>
" class="form-control">
                            </td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_0_saved_local_item;
}
if ($__foreach_test_0_saved_item) {
$_smarty_tpl->tpl_vars['test'] = $__foreach_test_0_saved_item;
}
?>
                      </table>
                    <?php } else { ?>
                      <h2>Добавьте тесты</h2>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
          </form>
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
						</table>
					</fieldset>
					<div class="panel-group" id="controls">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#controls" href="#teacher_subjects">Предметы</a></h4>
							</div>
							<div id="teacher_subjects" class="panel-collapse collapse">
								<div class="panel-body">
									<form name="workWithSubjectForm" method="POST">
                    <a class="btn btn-primary btn-block" data-toggle="modal" data-target="#setSubjectDialog">Добавить</a>
                    <input type="submit" name="unsetSubjectButton" value="Удалить" class="btn btn-danger btn-block">
                    <br>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->getSubjects() != NULL) {?>
                      <table class="table table-bordered">
                        <tr>
                          <th>Название</th>
                          <th>Выбрать</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getSubjects();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_1_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_1_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</td>
                            <td><input type="checkbox" name="select_subject[]" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
" class="form-control"></td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_local_item;
}
if ($__foreach_subject_1_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_item;
}
?>
                      </table>
                    <?php } else { ?>
                      <h2>Выберете предметы</h2>
                    <?php }?>
                    
									</form>
								</div>
							</div>
						</div>
						<div class="panel panel-success">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#controls" href="#teachers_news">Новости</a></h4>
							</div>
							<div id="teachers_news" class="panel-collapse collapse">
								<div class="panel-body">
									<form name="removeNewsForm" method="POST">
										<a data-toggle="modal" data-target="#addNewNews" class="btn btn-primary btn-block">Добавить</a>
										<input type="submit" name="removeNewsButton" value="Удалить" class="btn btn-danger btn-block">
                    <br>
										<?php if ($_smarty_tpl->tpl_vars['user']->value->getNews() != NULL) {?>                      
                      <table class="table table-bordered">
                        <tr>
                          <th>Заголовок</th>
                          <th>Дата публикации</th>
                          <th>Выбрать</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getNews();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_news_2_saved_item = isset($_smarty_tpl->tpl_vars['news']) ? $_smarty_tpl->tpl_vars['news'] : false;
$_smarty_tpl->tpl_vars['news'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
$__foreach_news_2_saved_local_item = $_smarty_tpl->tpl_vars['news'];
?>
                          <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['news']->value->getCaption();?>
</td>
                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value->getDatePublication(),"%d.%m.%Y");?>
</td>
                            <td><input type="checkbox" name="select_news[]" value="<?php echo $_smarty_tpl->tpl_vars['news']->value->getNewsID();?>
" class="form-control"></td>
                          </tr>
                        <?php
$_smarty_tpl->tpl_vars['news'] = $__foreach_news_2_saved_local_item;
}
if ($__foreach_news_2_saved_item) {
$_smarty_tpl->tpl_vars['news'] = $__foreach_news_2_saved_item;
}
?>
                      </table>
                    <?php } else { ?>
                      <h2>Вы пока не писали новости</h2>
                    <?php }?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!-- Modals Dialog -->
		
		<div class="modal fade" id="setSubjectDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Выбрать предмет</h4>
					</div>
					<form name="setSubjectForm" method="POST">
						<div class="modal-body">
              <?php if ($_smarty_tpl->tpl_vars['unset_subjects']->value != NULL) {?>              
                <table class="table table-hover">
                  <tr>
                    <th>Название</th>
                    <th>Выбрать</th>
                  </tr>
                  <?php
$_from = $_smarty_tpl->tpl_vars['unset_subjects']->value;
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
                    <tr>
                      <td><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</td>
                      <td><input type="checkbox" name="select_subject[]" value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
" class="form-control"></td>
                    <tr>
                  <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_3_saved_local_item;
}
if ($__foreach_subject_3_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_3_saved_item;
}
?>
                </table>
              <?php } else { ?>
                <h2 align="center">Пока что нету предметов</h2>
              <?php }?>
						</div>
						<div class="modal-footer">
							<input type="submit" name="setSubjectButton" value="Назначить" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<div class="modal fade" id="addNewNews">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Добавить новость</h4>
					</div>
					<form name="addNewsForm" method="POST">
						<div class="modal-body">
							<div class="form-group">
								<label>Заголовок</label>
								<input type="text" name="caption" class="form-control">
							</div>
							<div class="">
								<label>Контент</label>
								<textarea name="content" id="news" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label>Автор</label>
								<p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</p>
							</div>
							<div class="form-group">
								<label>Дата публикации</label>
								<input type="date" name="dp" class="form-control">
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="addNewsButton" class="btn btn-primary pull-right" value="Опубликовать">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<div class="modal fade" id="addTestDialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<form name="addTestForm" method="POST">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Добавление нового теста</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Название теста</label>
								<input type="text" name="caption" class="form-control">
							</div>
							<div class="form-group">
								<label>Предмет</label>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->getSubjects() != NULL) {?>                
                  <select name="subject" class="form-control">
                    <?php
$_from = $_smarty_tpl->tpl_vars['user']->value->getSubjects();
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
                      <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getSubjectID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value->getDescription();?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_local_item;
}
if ($__foreach_subject_4_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_item;
}
?>
                  </select>
                <?php } else { ?>
                  <p>Вы не выбрали предметы, которые ведёте</p>
                <?php }?>
							</div>
							<div class="form-group">
								<label>Автор</label>
								<p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['user']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->getSn();?>
</p>
							</div>
							<div class="form-group">
								<label>Группы</label>
								<table class="table table-bordered">
									<tr>
										<th>Группа</th>
										<th>Специальность</th>
										<th>Выбрать</th>
									</tr>
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
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getNumberGroup();?>
 (<?php echo $_smarty_tpl->tpl_vars['group']->value->getYearEducation();?>
)</td>
											<td><?php echo $_smarty_tpl->tpl_vars['group']->value->getSpec()->getCode();?>
</td>
											<td><input type="checkbox" name="select_group[]" value="<?php echo $_smarty_tpl->tpl_vars['group']->value->getGroupID();?>
" class="form-control"></td>
										</tr>
									<?php
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_5_saved_local_item;
}
if ($__foreach_group_5_saved_item) {
$_smarty_tpl->tpl_vars['group'] = $__foreach_group_5_saved_item;
}
?>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" name="addTestButton" value="Добавить" class="btn btn-primary">
						</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	
		<?php echo '<script'; ?>
 type="text/javascript">
			
			CKEDITOR.replace("news");
      
		<?php echo '</script'; ?>
>
		
	</body>
</html><?php }
}
