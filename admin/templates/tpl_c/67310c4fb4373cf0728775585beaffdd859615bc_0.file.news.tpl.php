<?php
/* Smarty version 3.1.29, created on 2017-09-02 13:51:22
  from "C:\OpenServer\domains\EDUKIT\admin\templates\tpl\news.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59aa8d2a9dac86_79438824',
  'file_dependency' => 
  array (
    '67310c4fb4373cf0728775585beaffdd859615bc' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\admin\\templates\\tpl\\news.tpl',
      1 => 1504349482,
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
function content_59aa8d2a9dac86_79438824 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\OpenServer\\domains\\EDUKIT\\engine\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("EDUKIT | Новости", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_var->createLocalArrayVariable($_smarty_tpl, 'js_links', null);
$_smarty_tpl->tpl_vars['js_links']->value[] = "../ckeditor/ckeditor.js";
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'js_links', 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <form name="removeNewsForm" method="POST">
    <div class="container-fluid">
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <div class="row">
        <div class="col-md-8">
          <?php if ($_smarty_tpl->tpl_vars['news']->value != NULL) {?>          
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
                  <td><a href="#<?php echo $_smarty_tpl->tpl_vars['one_news']->value->getNewsID();?>
" class="one_news"><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getCaption();?>
</a></td>
                  <td><p><?php echo $_smarty_tpl->tpl_vars['one_news']->value->getAuthor();?>
</p></td>
                  <td><p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['one_news']->value->getDatePublication(),'d.m.Y h:i:s');?>
</p></td>
                  <td><input type="checkbox" name="select_news[]" value="<?php echo $_smarty_tpl->tpl_vars['one_news']->value->getNewsID();?>
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
          <?php } else { ?>
            <h3 align="center">Новостей нет</h3>
          <?php }?>
        </div>
        <div class="col-md-4">
          <input type="submit" name="changeNewsButton" value="Изменить" class="btn btn-warning btn-block">
          <input type="submit" name="removeNewsButton" value="Удалить" class="btn btn-danger btn-block">
          <br>
          <fieldset>
            <legend>Новая новость</legend>
            <form name="addNewsForm" method="POST">
              <div class="form-group">
                <label>Заголовок</label>
                <input type="text" name="caption" class="form-control">
              </div>
              <div class="form-group">
                <label>Содержание</label>
                <textarea id="cont" name="content" rows="15" class="form-control"></textarea>
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
                <input type="datetime" name="dp" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
" class="form-control">
              </div>
              <div class="form-group">
                <input type="hidden" name="news_id">
                <input type="submit" name="addNewsButton" value="Добавить" class="btn btn-primary pull-right">
              </div>
            </form>
          </fieldset>
        </div>
      </div>
    </div>
  </form>
    
  <?php echo '<script'; ?>
 type="text/javascript">
    var editor = CKEDITOR.replace("content");
    
    $(".one_news").on("click", function(){
      var news_id = $(this).attr("href").substr(1, $(this).attr("href").length);
      
      $.ajax({
        url: "php/get_news.php",
        type: "POST",
        data: "news_id=" + news_id,
        success: function (replay) {
          var data = $.parseJSON(replay);
          
          $("[name='caption']").attr("value", data.caption);
          
          var dp = new Date(data.date_publication);
          
          $("[name='dp']").attr("value", dp.toLocaleTimeString());
          $("[name='news_id']").attr("value", data.id_news);
          
        }
      });
      
    });
    
  <?php echo '</script'; ?>
>
  
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
