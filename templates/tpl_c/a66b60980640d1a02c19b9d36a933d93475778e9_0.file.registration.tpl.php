<?php
/* Smarty version 3.1.29, created on 2017-01-04 16:12:36
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\guest\registration.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_586cf4c49b7cd8_01747126',
  'file_dependency' => 
  array (
    'a66b60980640d1a02c19b9d36a933d93475778e9' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\guest\\registration.tpl',
      1 => 1483532926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:guest/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_586cf4c49b7cd8_01747126 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Регистрация родителя", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header id="header" class="container">
						<div id="logoDiv" class="col-md-4">
							<figure>
								<img src="img/ukit.png" alt="">
								<figcaption></figcaption>
							</figure>
						</div>
						<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:guest/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</header>
				</div>
			</div>
			<hr>
			<form name="registrationParent" method="POST" onsubmit="return checkRegParentForm();">
				<div class="row">
					<div class="col-md-4">
						<fieldset>
							<legend>Основная информация</legend>
							<div class="form-group">
								<label>Фамилия:</label>
								<input type="text" name="second_name" class="form-control" value="Шазам">
							</div>
							<div class="form-group">
								<label>Имя:</label>
								<input type="text" name="first_name" class="form-control" value="Сафин">
							</div>
							<div class="form-group">
								<label>Отчество:</label>
								<input type="text" name="patronymic" class="form-control" value="Сергеевич">
							</div>
							<div class="form-group">
								<label>Возраст:</label>
								<input type="number" name="age" class="form-control" min="20" value="32">
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input type="email" name="email" class="form-control" value="shazam@mail.ru">
							</div>
							<div class="form-group">
								<label>Пароль:</label>
								<input type="password" name="password" class="form-control" value="password">
							</div>
							<div class="form-group">
								<label>Повторите пароль:</label>
								<input type="password" name="retry_password" class="form-control" value="password">
							</div>
						</fieldset>
					</div>
					<div class="col-md-8">
						<fieldset>
							<legend>Дополнительная информация</legend>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Домашний телефон:</label>
										<input type="tel" name="home_phone" class="form-control" value="NONE">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Сотовый телефон:</label>
										<input type="tel" name="cell_phone" class="form-control" value="NONE">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Место работы:</label>
										<input type="text" name="work_place" class="form-control" value="Intel">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Должность:</label>
										<input type="text" name="post" class="form-control" value="Генеральный директор">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label>Образование</label>
									<select class="form-control" name="education">
										<option>Среднее</option>
										<option>Высшее</option>
									</select>
								</div>
							</div>
							<div class="row" style="padding: 10px;">
								<div class="col-md-12">
									<fieldset>
										<legend>Выбирете своё дитя!</legend>
										<div class="form-group">
											<div class="row">
												<div class="col-md-8">
													<input id="selectChild" type="search" list="childrens" class="form-control">
												</div>
												<div class="col-md-2">
													<button id="add_child" type="button" class="btn btn-primary">Добавить</button>
												</div>
												<div class="col-md-2">
													<button id="remov_childs" type="button" class="btn btn-warning">Очистить</button>
												</div>
											</div>
										</div>
										<datalist id="childrens">
											<?php
$_from = $_smarty_tpl->tpl_vars['childrens']->value;
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
												<option value=<?php echo $_smarty_tpl->tpl_vars['child']->value['id_student'];?>
><?php echo $_smarty_tpl->tpl_vars['child']->value['second_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['patronymic'];?>
</option>
											<?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_local_item;
}
if ($__foreach_child_0_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_child_0_saved_item;
}
?>
										</datalist>
									</fieldset>
									<table id="parent_child" class="table table-hover">
										<tr>
											<td style="text-align: center;" colspan="2">Ребёнок</td>
										</tr>
									</table>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input class="btn btn-success btn-lg pull-right" name="regParent" type="submit" value="Зарегистрироваться">
					</div>
				</div>
			</form>
		</div>
		<?php echo '<script'; ?>
 type="text/javascript">
			
			var childs = new Array();
			var countChilds = 0;
			
			$("#add_child").click(function(){
				var child = $("#selectChild").val();
				
				if(child != "")
				{
					if($.inArray(child, childs) > -1) alert("Вы уже добавили ребёнка");
					else
					{
						childs.push(child);
						$("#parent_child").append('<tr id="' + countChilds + '"><td>' + child + '<input name="childs[]" type="hidden" value="' + child + '"></td></tr>');
						countChilds++;
					}
				}
				else alert("Выберете ребёнка");
			});
			
			$("#remov_childs").click(function(){
				$("#parent_child").empty().css("class", "table table-hover").append("<tbody><tr><td style='text-align: center;' colspan='2'>Чадо</td></tr></tbody>");
				childs = new Array();
				countChilds = 0;
			});
			
			function checkRegParentForm(form)
			{
				if(childs.toString() == "")
				{
					alert("Вы не выбрали ребёнка");
					return false;
				}
				else return true;
			}
			
		<?php echo '</script'; ?>
>
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
