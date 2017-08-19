{assign var="title" value="EDUKIT | Новости"}
{$js_links[] = "../ckeditor/ckeditor.js"}
{include file="html/begin.tpl"}
  <form name="removeNewsForm" method="POST">
    <div class="container-fluid">
      {include file="html/menu.tpl"}
      <div class="row">
        <div class="col-md-8">
          {if $news != NULL}          
            <table class="table table-bordered">
              <tr>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Дата публикации</th>
                <th>Выбрать</th>
              </tr>
              {foreach from=$news item=one_news}
                <tr>
                  <td>{$one_news->getCaption()}</td>
                  <td>{$one_news->getContent()}</td>
                  <td>{$one_news->getDatePublication()|date_format:'d.m.Y h:i:s'}</td>
                  <td><input type="checkbox" name="select_news[]" value="{$one_news->getNewsID()}" class="form-control"></td>
                </tr>
              {/foreach}
            </table>
          {else}
            <h3 align="center">Новостей нет</h3>
          {/if}
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
                <textarea name="content" rows="15" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Автор</label>
                <input type="hidden" name="email" value="{$user->getEmail()}">
                <p>{$user->getEmail()}</p>
              </div>
              <div class="form-group">
                <label>Дата</label>
                <input type="datetime" name="dp" value="{$date}" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" name="addNewsButton" value="Добавить" class="btn btn-primary pull-right">
              </div>
            </form>
          </fieldset>
        </div>
      </div>
    </div>
  </form>
    
  <script type="text/javascript">
    CKEDITOR.replace("content");
  </script>
  
{include file="html/end.tpl"}