<?php
/* Smarty version 3.1.29, created on 2017-10-15 10:37:08
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59e3102404abd6_79020736',
  'file_dependency' => 
  array (
    'e8f6dbbc179192d9cd22f5fd153ecb00721f95ef' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\index.tpl',
      1 => 1508053011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:new/statistic.tpl' => 1,
    'file:new/users.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59e3102404abd6_79020736 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Главная", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="ui internally celled grid">
    <div class="row">
      <div class="sixteen wide column">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:new/statistic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      </div>
    </div>
    <div class="row">
      <div class="thirteen wide column">
        <fieldset>
          <legend>Пользователи</legend>
          <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:new/users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </fieldset>
      </div>
      <div class="three wide column">
        <div id="menu" class="ui vertical menu">
          <a class="item">Добавить студента</a>
          <a class="item">Добавить преподавателя</a>
          <a class="item">Назначить старосту</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="thirteen wide column">
        <img>
      </div>
      <div class="three wide column">
        <img>
      </div>
    </div>
  </div>

  <?php echo '<script'; ?>
 type="text/javascript">

    $('.ui.accordion').accordion();
    $('.menu .item').tab();

  <?php echo '</script'; ?>
>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
