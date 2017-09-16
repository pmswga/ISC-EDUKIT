<?php
/* Smarty version 3.1.29, created on 2017-09-13 20:11:22
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\blocks\schedule\week.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59b966ba9a0959_75364160',
  'file_dependency' => 
  array (
    'cbb69900890cc04838264ccf55d22bd9402557bc' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\blocks\\schedule\\week.tpl',
      1 => 1505322667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59b966ba9a0959_75364160 ($_smarty_tpl) {
?>
<h2>Неделя №<?php echo $_smarty_tpl->tpl_vars['week']->value;?>
</h2>
<nav id="nowDay" class="text-center">
    <ul class="pagination pagination-sm">
        <li id="1"><a>ПН</a></li>
        <li id="2"><a>ВТ</a></li>
        <li id="3"><a>СР</a></li>
        <li id="4"><a>ЧТ</a></li>
        <li id="5"><a>ПТ</a></li>
        <li id="6"><a>СБ</a></li>
        <li id="7"><a>ВС</a></li>
    </ul>
</nav><?php }
}
