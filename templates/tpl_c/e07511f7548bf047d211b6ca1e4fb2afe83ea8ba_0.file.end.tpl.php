<?php
/* Smarty version 3.1.29, created on 2017-08-08 14:01:15
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\html\end.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_598999fbb974c0_24557873',
  'file_dependency' => 
  array (
    'e07511f7548bf047d211b6ca1e4fb2afe83ea8ba' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\html\\end.tpl',
      1 => 1493399107,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:reg_student.tpl' => 1,
    'file:auth.tpl' => 1,
  ),
),false)) {
function content_598999fbb974c0_24557873 ($_smarty_tpl) {
?>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:reg_student.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</body>
</html><?php }
}
