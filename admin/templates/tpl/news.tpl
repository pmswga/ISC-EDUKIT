{assign var="title" value="EDUKIT | Новости"}
{$js_links[] = "../ckeditor/ckeditor.js"}
{include file="html/begin.tpl"}
<div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
          {if $news == NULL}          
            <table class="ui table">
              <thead>
                <tr>
                  <th>Заголовок</th>
                  <th>Автор</th>
                  <th>Дата публикации</th>
                  <th>Выбрать</th>
                </tr>    
              </thead>
              <tbody>
                {foreach from=$news item=one_news}
                  <tr>
                    <td><a href="#{$one_news->getNewsID()}" class="one_news">{$one_news->getCaption()}</a></td>
                    <td><p>{$one_news->getAuthor()}</p></td>
                    <td><p>{$one_news->getDatePublication()|date_format:'d.m.Y h:i:s'}</p></td>
                    <td><input type="checkbox" name="select_news[]" value="{$one_news->getNewsID()}" class="form-control"></td>
                  </tr>
                {/foreach}
              </tbody>
            </table>
          {else}
            <h3 align="center">Новостей нет</h3>
          {/if}
      </div>
    </div>
  </div>


{*
  
  
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
                  <td><a href="#{$one_news->getNewsID()}" class="one_news">{$one_news->getCaption()}</a></td>
                  <td><p>{$one_news->getAuthor()}</p></td>
                  <td><p>{$one_news->getDatePublication()|date_format:'d.m.Y h:i:s'}</p></td>
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
                <textarea id="cont" name="content" rows="15" class="form-control"></textarea>
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
                <input type="hidden" name="news_id">
                <input type="submit" name="addNewsButton" value="Добавить" class="btn btn-primary pull-right">
              </div>
            </form>
          </fieldset>
        </div>
      </div>
    </div>
  </form>
    
  <script type="text/javascript">
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
          $("[name='dp']").attr("value", data.date_publication);
          $("[name='news_id']").attr("value", data.id_news);
          
        }
      });
      
    });
    
  </script>
  *}

{include file="html/end.tpl"}