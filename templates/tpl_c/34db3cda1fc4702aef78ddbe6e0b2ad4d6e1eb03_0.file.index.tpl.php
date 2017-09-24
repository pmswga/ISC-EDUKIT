<?php
/* Smarty version 3.1.29, created on 2017-09-24 12:10:00
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c77668f2a960_55274068',
  'file_dependency' => 
  array (
    '34db3cda1fc4702aef78ddbe6e0b2ad4d6e1eb03' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\index.tpl',
      1 => 1506244198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:blocks/user_menu.tpl' => 1,
    'file:blocks/guest_menu.tpl' => 1,
    'file:modals/reg_student.tpl' => 1,
    'file:modals/auth.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59c77668f2a960_55274068 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Информационно-образовательный портал", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="ui stackable celled grid">
    <div class="row">
      <div class="three wide column">
        <?php if ($_smarty_tpl->tpl_vars['user']->value != NULL) {?>
          <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/user_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  
        <?php } else { ?>
          <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/guest_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php }?>
      </div>
      <div class="thirteen wide column">
        <h1>Добро пожаловать</h1>
        <hr>

      </div>
    </div>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['user']->value == NULL) {?>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:modals/reg_student.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:modals/auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php }?>
  
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
