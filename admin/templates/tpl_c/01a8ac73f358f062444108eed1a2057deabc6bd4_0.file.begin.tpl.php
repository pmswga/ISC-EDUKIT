<?php
/* Smarty version 3.1.29, created on 2017-10-15 10:27:00
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\html\begin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e30dc458f590_52287801',
  'file_dependency' => 
  array (
    '01a8ac73f358f062444108eed1a2057deabc6bd4' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\html\\begin.tpl',
      1 => 1508052419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e30dc458f590_52287801 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta charset="utf-8">
	  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/semantic/semantic.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/semantic/semantic.js"><?php echo '</script'; ?>
>

    <?php
$_from = $_smarty_tpl->tpl_vars['css_links']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_css_link_0_saved_item = isset($_smarty_tpl->tpl_vars['css_link']) ? $_smarty_tpl->tpl_vars['css_link'] : false;
$_smarty_tpl->tpl_vars['css_link'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['css_link']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['css_link']->value) {
$_smarty_tpl->tpl_vars['css_link']->_loop = true;
$__foreach_css_link_0_saved_local_item = $_smarty_tpl->tpl_vars['css_link'];
?>
      <link rel="stylesheet" href="css/<?php echo $_smarty_tpl->tpl_vars['css_link']->value;?>
">
    <?php
$_smarty_tpl->tpl_vars['css_link'] = $__foreach_css_link_0_saved_local_item;
}
if ($__foreach_css_link_0_saved_item) {
$_smarty_tpl->tpl_vars['css_link'] = $__foreach_css_link_0_saved_item;
}
?>
	  <!-- <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
> -->
	  <!-- <?php echo '<script'; ?>
 src="js/bootstrap.js"><?php echo '</script'; ?>
> -->
		<?php
$_from = $_smarty_tpl->tpl_vars['js_links']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_js_link_1_saved_item = isset($_smarty_tpl->tpl_vars['js_link']) ? $_smarty_tpl->tpl_vars['js_link'] : false;
$_smarty_tpl->tpl_vars['js_link'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['js_link']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['js_link']->value) {
$_smarty_tpl->tpl_vars['js_link']->_loop = true;
$__foreach_js_link_1_saved_local_item = $_smarty_tpl->tpl_vars['js_link'];
?>		
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_link']->value;?>
"><?php echo '</script'; ?>
>
    <?php
$_smarty_tpl->tpl_vars['js_link'] = $__foreach_js_link_1_saved_local_item;
}
if ($__foreach_js_link_1_saved_item) {
$_smarty_tpl->tpl_vars['js_link'] = $__foreach_js_link_1_saved_item;
}
?>
  </head>
  <body><?php }
}