<?php
/* Smarty version 3.1.29, created on 2017-01-08 21:58:27
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\users\news.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58728bd3d6d986_73921214',
  'file_dependency' => 
  array (
    '58c7502722d702ecc93611a90ad7cb010ba5a4e3' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\users\\news.tpl',
      1 => 1483901907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:users/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_58728bd3d6d986_73921214 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\iep.mgkit\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Новости", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<header id="header" class="container">
						<div id="logoDiv" class="col-md-4">
							<figure>
								<img src="img/ukit.png" alt="">
								<figcaption></figcaption>
							</figure>
						</div>
						<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:users/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</header>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div id="content" class="container">
						<?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_0_saved_item = isset($_smarty_tpl->tpl_vars['one']) ? $_smarty_tpl->tpl_vars['one'] : false;
$_smarty_tpl->tpl_vars['one'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->value) {
$_smarty_tpl->tpl_vars['one']->_loop = true;
$__foreach_one_0_saved_local_item = $_smarty_tpl->tpl_vars['one'];
?>
						<div id="news" class="col-md-9">
							<aside class="date">
								<aside class="oneNews">
									<header>
										<h1><?php echo $_smarty_tpl->tpl_vars['one']->value['caption'];?>
</h1>
									</header>
									<article>
										<p><?php echo $_smarty_tpl->tpl_vars['one']->value['content'];?>
</p>
									</article>
									<hr>
									<time><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one']->value['date_publication'],"%d/%m/%Y");?>
</time>
								</aside>
							</aside>
						</div>
						<?php
$_smarty_tpl->tpl_vars['one'] = $__foreach_one_0_saved_local_item;
}
if ($__foreach_one_0_saved_item) {
$_smarty_tpl->tpl_vars['one'] = $__foreach_one_0_saved_item;
}
?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Scripts -->
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
