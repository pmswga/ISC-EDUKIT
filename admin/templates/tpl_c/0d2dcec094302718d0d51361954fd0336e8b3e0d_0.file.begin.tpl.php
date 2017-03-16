<?php
/* Smarty version 3.1.29, created on 2017-03-16 14:46:54
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\html\begin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ca7b2ed138a7_27319418',
  'file_dependency' => 
  array (
    '0d2dcec094302718d0d51361954fd0336e8b3e0d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\html\\begin.tpl',
      1 => 1489664813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca7b2ed138a7_27319418 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <meta charset="utf-8">
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/main.css">
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
	  <?php echo '<script'; ?>
 src="js/jquery.js"><?php echo '</script'; ?>
>
	  <?php echo '<script'; ?>
 src="js/bootstrap.js"><?php echo '</script'; ?>
>
  </head>
  <body><?php }
}
