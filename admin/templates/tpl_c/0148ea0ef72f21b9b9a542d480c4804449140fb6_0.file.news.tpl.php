<?php
/* Smarty version 3.1.29, created on 2017-03-19 15:15:36
  from "C:\OpenServer\domains\iep.mgkit\admin\templates\tpl\news.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58ce766856d9c9_42639468',
  'file_dependency' => 
  array (
    '0148ea0ef72f21b9b9a542d480c4804449140fb6' => 
    array (
      0 => 'C:\\OpenServer\\domains\\iep.mgkit\\admin\\templates\\tpl\\news.tpl',
      1 => 1489925735,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:html/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_58ce766856d9c9_42639468 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Новости", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_var->createLocalArrayVariable($_smarty_tpl, 'css_links', null);
$_smarty_tpl->tpl_vars['css_links']->value[] = "vt.css";
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'css_links', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container-fluid">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="row">
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#viewNews" data-toggle="tab">Просмотр</a></li>
          <li><a href="#addGroup" data-toggle="tab">Добавить</a></li>
          <li><a href="#editGroup" data-toggle="tab">Изменить</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="viewNews">
            <div class="row">      
              <form name="removeNewsForm" method="POST">
                <div class="col-md-10">
                  <table class="table table-bordered">
                    <tr>
                      <th>Заголовок</th>
                      <th>Автор</th>
                      <th>Дата публикации</th>
                      <th>Выбрать</th>
                    </tr>
                    <?php
$_from = $_smarty_tpl->tpl_vars['news']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_one_news_0_saved_item = isset($_smarty_tpl->tpl_vars['one_news']) ? $_smarty_tpl->tpl_vars['one_news'] : false;
$_smarty_tpl->tpl_vars['one_news'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['one_news']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one_news']->value) {
$_smarty_tpl->tpl_vars['one_news']->_loop = true;
$__foreach_one_news_0_saved_local_item = $_smarty_tpl->tpl_vars['one_news'];
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getCaption();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getContent();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getDatePublication();?>
</td>
                        <td><input type="checkbox" name="select_grp[]" value="<?php echo $_smarty_tpl->tpl_vars['one_news']->value->getNewsID();?>
" class="form-control"></td>
                      </tr>
                    <?php
$_smarty_tpl->tpl_vars['one_news'] = $__foreach_one_news_0_saved_local_item;
}
if ($__foreach_one_news_0_saved_item) {
$_smarty_tpl->tpl_vars['one_news'] = $__foreach_one_news_0_saved_item;
}
?>
                  </table>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="removeNewsButton" value="Удалить" class="btn btn-danger btn-block">
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="addGroup">
            <div class="row">
              <div class="col-md-8">
                <fieldset>
                  <legend>Новость</legend>
                  <form name="addNewsForm" method="POST">
										<div class="form-group">
											<label>Заголовок</label>
											<input type="text" name="caption" class="form-control">
										</div>
										<div class="form-group">
											<label>Содержание</label>
											<textarea name="content" rows="15" class="form-control"></textarea>
										</div>
										<div class="form-group">
											<label>Автор</label>
											<input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
">
											<p><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</p>
										</div>
										<div class="form-group">
											<label>Дата</label>
											<input type="date" name="dp" class="form-control">
										</div>
                    <div class="form-group">
                      <input type="submit" name="addNewsButton" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="editGroup">
            3
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
