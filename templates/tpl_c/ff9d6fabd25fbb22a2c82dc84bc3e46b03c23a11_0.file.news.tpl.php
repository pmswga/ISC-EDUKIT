<?php
/* Smarty version 3.1.29, created on 2017-09-12 23:02:20
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\guest\news.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b83d4cd563e8_97066104',
  'file_dependency' => 
  array (
    'ff9d6fabd25fbb22a2c82dc84bc3e46b03c23a11' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\guest\\news.tpl',
      1 => 1505246539,
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
function content_59b83d4cd563e8_97066104 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Новости", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="container-fluid">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:guest/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="row">
				<div class="col-md-12">
					<div id="content" class="container">
						<?php
$_from = $_smarty_tpl->tpl_vars['newsByDate']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_news_0_saved_item = isset($_smarty_tpl->tpl_vars['news']) ? $_smarty_tpl->tpl_vars['news'] : false;
$__foreach_news_0_saved_key = isset($_smarty_tpl->tpl_vars['date']) ? $_smarty_tpl->tpl_vars['date'] : false;
$_smarty_tpl->tpl_vars['news'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['date'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['date']->value => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
$__foreach_news_0_saved_local_item = $_smarty_tpl->tpl_vars['news'];
?>
							<div id="news" class="col-md-9">
								<aside class="date">
									<h3><datetime><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d.%m.%Y");?>
</datetime></h3>
									<?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_news_1_saved_item = isset($_smarty_tpl->tpl_vars['one_news']) ? $_smarty_tpl->tpl_vars['one_news'] : false;
$_smarty_tpl->tpl_vars['one_news'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one_news']->value) {
$_smarty_tpl->tpl_vars['one_news']->_loop = true;
$__foreach_one_news_1_saved_local_item = $_smarty_tpl->tpl_vars['one_news'];
?>
										<aside class="oneNews">
											<header>
												<h1><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getCaption();?>
</h1>
											</header>
											<article>
												<p><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getContent();?>
</p>
											</article>
											<hr>
											<p><b>Автор:</b> <?php echo $_smarty_tpl->tpl_vars['one_news']->value->getAuthor();?>
</p>
										</aside>
									<?php
$_smarty_tpl->tpl_vars['one_news'] = $__foreach_one_news_1_saved_local_item;
}
if ($__foreach_one_news_1_saved_item) {
$_smarty_tpl->tpl_vars['one_news'] = $__foreach_one_news_1_saved_item;
}
?>
								</aside>
							</div>
						<?php
$_smarty_tpl->tpl_vars['news'] = $__foreach_news_0_saved_local_item;
}
if ($__foreach_news_0_saved_item) {
$_smarty_tpl->tpl_vars['news'] = $__foreach_news_0_saved_item;
}
if ($__foreach_news_0_saved_key) {
$_smarty_tpl->tpl_vars['date'] = $__foreach_news_0_saved_key;
}
?>
					</div>
				</div>
			</div>
		</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
