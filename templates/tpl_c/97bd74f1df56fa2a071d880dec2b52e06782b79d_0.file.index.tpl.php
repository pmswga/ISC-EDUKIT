<?php
/* Smarty version 3.1.29, created on 2016-11-27 17:10:35
  from "C:\OpenServer\domains\edukit.mgkit\templates\tpl\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_583ae95b245202_20548158',
  'file_dependency' => 
  array (
    '97bd74f1df56fa2a071d880dec2b52e06782b79d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\templates\\tpl\\index.tpl',
      1 => 1480255819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_583ae95b245202_20548158 ($_smarty_tpl) {
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
						<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</header>
				</div>
			</div>
			<hr>
			<div class="row">
				<div id="content" class="col-md-12">
					<h1>Добро пожаловать</h1>
				</div>
			</div>
		</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
