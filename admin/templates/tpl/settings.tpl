{assign var="title" value="EDUKIT | Настройки"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
          <div class="ui top attached tabular menu">
              <a class="active item" data-tab="admins">Администраторы</a>
              <a class="item" data-tab="data">Данные</a>
              <a class="item" data-tab="logs">Журнал событий</a>
          </div>
          <div class="ui bottom attached active tab segment" data-tab="admins">
              <table class="ui table">
                <thead>
                  <tr>
                    <th>ФИО</th>
                    <th>Email</th>
                    <th>Выбрать</th>
                  </tr>
                </thead>
                <tbody>
                  {foreach from=$admins item=admin}
                    <tr>
                      <td>{$admin->getSn()} {$admin->getFn()} {$admin->getPt()}</td>
                      <td>{$admin->getEmail()}</td>
                      <td><input type="checkbox" name="admins[]" value="{$admin->getEmail()}" class="form-control"></td>
                    </tr>
                  {/foreach}
                </tbody>
              </table>
              <input type="submit" name="deleteAdminsButton" value="Удалить" class="ui negative button">
              <br>
              <fieldset>
                <legend>Добавить администратора</legend>
                <form name="addAdminForm" method="POST" class="ui form">
                  <div class="field">
                    <label>Фамилия</label>
                    <input type="text" name="sn" class="form-control">
                  </div>
                  <div class="field">
                    <label>Имя</label>
                    <input type="text" name="fn" class="form-control">
                  </div>
                  <div class="field">
                    <label>Отчество</label>
                    <input type="text" name="pt" class="form-control">
                  </div>
                  <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="field">
                    <label>Пароль</label>
                    <input type="password" name="paswd" class="form-control">
                  </div>
                  <div class="field">
                    <input type="submit" name="addAdminButton" value="Зарегистрировать" class="ui primary button">
                  </div>
                </form>
              </fieldset>
          </div>
          <div class="ui bottom attached tab segment" data-tab="data">
            
          </div>
          <div class="ui bottom attached tab segment" data-tab="logs"><!--  FIXME: Переделать в страницу с пагинацией -->
              <form name="deleteLogsForm" method="POST">
                <input type="submit" name="deleteLogsButton" value="Удалить" class="btn btn-danger">
                <table class="ui table">
                  <thead>
                      <tr>
                        <th>№</th>
                        <th>Сообщение</th>
                        <th>Дата</th>
                        <th>Выбрать</th>
                      </tr>
                  </thead>
                  <tbody>
                    {foreach from=$logs item=log}
                      <tr>
                          <td>{$log['id']}</td>
                          <td>{$log['message']}</td>
                          <td>{$log['date']|date_format:"%d.%m.%Y"}</td>
                          <td>
                            <div class="ui checkbox">
                              <input type="checkbox" name="logs[]" value="{$log['id']}" >
                              <label for=""></label>
                            </div>
                          </td>
                      </tr>
                    {/foreach}
                  </tbody>
                </table>
              </form>
          </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}