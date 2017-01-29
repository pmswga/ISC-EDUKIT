<?php
/* Smarty version 3.1.29, created on 2017-01-03 12:15:47
  from "C:\OpenServer\domains\iep.mgkit\templates\tpl\html\end.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_586b6bc3bcc263_96407582',
  'file_dependency' => 
  array (
    'e7e39dec61a72ce2167858d950abf14862891393' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\templates\\tpl\\html\\end.tpl',
      1 => 1483434946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:reg.tpl' => 1,
    'file:auth.tpl' => 1,
  ),
),false)) {
function content_586b6bc3bcc263_96407582 ($_smarty_tpl) {
?>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:reg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</body>
</html><?php }
}
