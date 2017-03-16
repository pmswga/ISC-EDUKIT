<?php
/* Smarty version 3.1.29, created on 2017-03-16 14:34:59
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ca7863bd39e0_16201864',
  'file_dependency' => 
  array (
    'd3d29281a6875845c5c4a0d238c4c119da9bcb3a' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\menu.tpl',
      1 => 1489664096,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ca7863bd39e0_16201864 ($_smarty_tpl) {
?>
<div class="row">
  <div class="col-md-12">
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">Панель управления</a>
      </div>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav pull-right">
          <li class="active"><a href="index.php">Главная</a></li>
          <li><a href="users.php">Пользователи</a></li>
          <li><a href="groups.php">Группы</a></li>
          <li><a href="specialty.php">Специальности</a></li>
          <li><a href="news.php">Новости</a></li>
          <li><a href="subjects.php">Предметы</a></li>
          <li><a href="notifications.php">Оповещения</a></li>
          <li><a href="#">Посещаемость</a></li>
          <li><a href="php/logout.php">Выход</a></li>
        </ul>
      </div>
    </nav>
  </div>
</div><?php }
}
