{assign var="title" value="EDUKIT | Новости"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
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
                    {foreach from=$news item=one_news}
                      <tr>
                        <td>{$one_news->getCaption()}</td>
                        <td>{$one_news->getContent()}</td>
                        <td>{$one_news->getDatePublication()}</td>
                        <td><input type="checkbox" name="select_news[]" value="{$one_news->getNewsID()}" class="form-control"></td>
                      </tr>
                    {/foreach}
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
											<input type="hidden" name="email" value="{$user->getEmail()}">
											<p>{$user->getEmail()}</p>
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
{include file="html/end.tpl"}