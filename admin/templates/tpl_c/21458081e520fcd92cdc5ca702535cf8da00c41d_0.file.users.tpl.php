<?php
/* Smarty version 3.1.29, created on 2017-03-16 13:57:51
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\admin\users.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ca6faf5f5d62_54475582',
  'file_dependency' => 
  array (
    '21458081e520fcd92cdc5ca702535cf8da00c41d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\admin\\users.tpl',
      1 => 1486560456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca6faf5f5d62_54475582 ($_smarty_tpl) {
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel-group" id="u">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_teachers">Преподаватели</a></h4>
				</div>
				<div id="u_teachers" class="panel-collapse collapse">
					<div class="panel-body">
						<?php if ($_smarty_tpl->tpl_vars['teachers']->value != NULL) {?>
							<div class="row">		
								<div class="col-md-12">
									<table class="table table-hover info_table">
										<tr>
											<td>Фамилия</td>
											<td>Имя</td>
											<td>Отчество</td>
											<td>Email</td>
											<td>Предметы</td>
										</tr>
										<?php
$_from = $_smarty_tpl->tpl_vars['teachers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_teacher_0_saved_item = isset($_smarty_tpl->tpl_vars['teacher']) ? $_smarty_tpl->tpl_vars['teacher'] : false;
$_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['teacher']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
$__foreach_teacher_0_saved_local_item = $_smarty_tpl->tpl_vars['teacher'];
?>
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getSn();?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getFn();?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getPt();?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getEmail();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getStrSubjects();?>
</td>
											</tr>
										<?php
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_0_saved_local_item;
}
if ($__foreach_teacher_0_saved_item) {
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_0_saved_item;
}
?>
									</table>
								</div>
							</div>
						<?php } else { ?>
							<h1 align="center">Преподавателей нету</h1>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">
          <h4 class="panel-title"><a data-toggle="collapse" data-parent="#u" href="#u_students">Студенты</a></h4>
				</div>
				<div id="u_students" class="panel-collapse collapse">
					<div class="panel-body">
					<?php if ($_smarty_tpl->tpl_vars['groups_students']->value != NULL) {?>
            <div class="panel-group" id="students_groups">
						<?php
$_from = $_smarty_tpl->tpl_vars['groups_students']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_it_1_saved_item = isset($_smarty_tpl->tpl_vars['it']) ? $_smarty_tpl->tpl_vars['it'] : false;
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$__foreach_it_1_saved_local_item = $_smarty_tpl->tpl_vars['it'];
?>
							<?php if ($_smarty_tpl->tpl_vars['it']->value != NULL) {?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#students_groups" href=#<?php echo $_smarty_tpl->tpl_vars['it']->value[0]['grp'];?>
><?php echo $_smarty_tpl->tpl_vars['it']->value[0]['grp'];?>
</a>
                      </h4>
                  </div>
                  <div id=<?php echo $_smarty_tpl->tpl_vars['it']->value[0]['grp'];?>
 class="panel-collapse collapse">
                    <div class="panel-body">
                      <table class="table table-hover info_table">
                          <tr>
                              <td>Фамилия</td>
                              <td>Имя</td>
                              <td>Отчество</td>
                              <td>Email</td>
                              <td>Телефон</td>
                              <td></td>
                          </tr>
                          <?php
$_from = $_smarty_tpl->tpl_vars['it']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_this_2_saved_item = isset($_smarty_tpl->tpl_vars['this']) ? $_smarty_tpl->tpl_vars['this'] : false;
$_smarty_tpl->tpl_vars['this'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['this']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['this']->value) {
$_smarty_tpl->tpl_vars['this']->_loop = true;
$__foreach_this_2_saved_local_item = $_smarty_tpl->tpl_vars['this'];
?>
                              <tr>
                                  <td><?php echo $_smarty_tpl->tpl_vars['this']->value['second_name'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['this']->value['first_name'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['this']->value['patronymic'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['this']->value['email'];?>
</td>
                                  <td><?php echo $_smarty_tpl->tpl_vars['this']->value['cell_phone'];?>
</td>
                              </tr>
                          <?php
$_smarty_tpl->tpl_vars['this'] = $__foreach_this_2_saved_local_item;
}
if ($__foreach_this_2_saved_item) {
$_smarty_tpl->tpl_vars['this'] = $__foreach_this_2_saved_item;
}
?>
                      </table>
                    </div>
                  </div>
                </div>
							<?php }?>
						<?php
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_1_saved_local_item;
}
if ($__foreach_it_1_saved_item) {
$_smarty_tpl->tpl_vars['it'] = $__foreach_it_1_saved_item;
}
?>
            </div>
					<?php } else { ?>
						<h1 align="center">Студентов нету</h1>
					<?php }?>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#u" href="#u_elder">Старосты</a>
					</h4>
				</div>
				<div id="u_elder" class="panel-collapse collapse">
					<div class="panel-body">
						<?php if ($_smarty_tpl->tpl_vars['elders']->value != NULL) {?>
						<!-- HERE ELDERES -->
						<?php } else { ?>
							<h1 align="center">Старосты не назначены</h1>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#u" href="#u_parents">Родители</a>
					</h4>
				</div>
				<div id="u_parents" class="panel-collapse collapse">
					<div class="panel-body">
						<?php if ($_smarty_tpl->tpl_vars['parents']->value != NULL) {?>
							<table class="table table-hover info_table">
								<tr>
									<td>Фамилия</td>
									<td>Имя</td>
									<td>Отчество</td>
									<td>Возраст</td>
									<td>Контактная информация</td>
									<td>Место работы</td>
									<td>Должность</td>
								</tr>
								<?php
$_from = $_smarty_tpl->tpl_vars['parents']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_parent_3_saved_item = isset($_smarty_tpl->tpl_vars['parent']) ? $_smarty_tpl->tpl_vars['parent'] : false;
$_smarty_tpl->tpl_vars['parent'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['parent']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['parent']->value) {
$_smarty_tpl->tpl_vars['parent']->_loop = true;
$__foreach_parent_3_saved_local_item = $_smarty_tpl->tpl_vars['parent'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getSn();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getFn();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getPt();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getAge();?>
</td>
										<td>
											<table class="table table-border">
												<tr>
													<td>Email</td>
													<td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
"><?php echo $_smarty_tpl->tpl_vars['parent']->value->getEmail();?>
</a></td>
												</tr>
												<tr>
													<td>Сотовый телефон</td>
													<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getCellPhone();?>
</td>
												</tr>
												<tr>
													<td>Домашний телефон</td>
													<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getHomePhone();?>
</td>
												</tr>
												</tr>
											</table>
										</td>
										<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getWorkPlace();?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['parent']->value->getPost();?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_local_item;
}
if ($__foreach_parent_3_saved_item) {
$_smarty_tpl->tpl_vars['parent'] = $__foreach_parent_3_saved_item;
}
?>
							</table>
						<?php } else { ?>
							<h1 align="center">Родители незарегистрированы</h1>	
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
        <form name="add_teacher" method="POST">
          <fieldset>
            <legend>Добавление преподавателя</legend>
            <div class="col-md-6">
              <div class="form-group">
                <label>Фамилия:</label>
                <input type="text" name="second_name" class="form-control" >
              </div>
              <div class="form-group">
                <label>Имя:</label>
                <input type="text" name="first_name" class="form-control" >
              </div>
              <div class="form-group">
                <label>Отчество:</label>
                <input type="text" name="patronymic" class="form-control">
              </div>
              <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" >
              </div>
              <div id="passwordDiv" class="form-group">
                <label>Пароль:</label>
                <input type="password" name="password" class="form-control" >
              </div>
              <div id="retryPasswordDiv" class="form-group">
                <label>Повторите пароль:</label>
                <input type="password" name="retry_password" class="form-control" >
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Информация об преподавателе</label>
                <textarea class="form-control" name="info"></textarea>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-8">
                    <label>Предметы</label>
                    <select id="sbuss" class="form-control">
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
                        <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->getID();?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</option>
                      <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_local_item;
}
if ($__foreach_subject_4_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_4_saved_item;
}
?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <button id="add_subject" class="btn btn-primary" type="button">Добавить</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <table id="subject_table" class="table table-hover">
                      <tr>
                        <td style="text-align: center;" colspan="2">Предмет</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input name="addTeacherButton" type="submit" class="btn btn-success form-control" value="Добавить">
              </div>
            </div>
          </fieldset>
        </form>
			</div>
		</div>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
			
	var subjects = new Array();
	var countChilds = 0;
	
	$("#add_subject").click(function(){
		var sb = document.getElementById("sbuss");
		var subject = sb.selectedIndex != -1 ? sb.options[sb.selectedIndex].value : "None";;
		var subject_text = sb.selectedIndex != -1 ? sb.options[sb.selectedIndex].text : "None";
		
		if(subject != "")
		{
			if($.inArray(subject, subjects) > -1) alert("Вы уже добавили этот предмет");
			else
			{
				subjects.push(subject);
				$("#subject_table").append('<tr id="' + countChilds + '"><td>' + subject_text + '<input name="subjects[]" type="hidden" value="' + subject + '"></td></tr>');
				countChilds++;
			}
		}
		else alert("Выберете предмет");
	});
	
	$("#remov_childs").click(function(){
		$("#subject_table").empty().css("class", "table table-hover").append("<tbody><tr><td style='text-align: center;' colspan='2'>Чадо</td></tr></tbody>");
		subjects = new Array();
		countChilds = 0;
	});
	
	function checkRegParentForm(form)
	{
		if(subjects.toString() == "")
		{
			alert("Вы не выбрали предмет");
			return false;
		}
		else return true;
	}
	
<?php echo '</script'; ?>
><?php }
}
