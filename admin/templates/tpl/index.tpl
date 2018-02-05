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
          <a class="active item" data-tab="admins"><i class="users icon"></i>Администраторы</a>
          <a class="item" data-tab="data"><i class="bar chart icon"></i>Данные</a>
          <a class="item" data-tab="logs"><i class="book icon"></i>Журнал событий</a>
        </div>
        <div class="ui bottom attached active tab segment" data-tab="admins">
          <form name="addAdminForm" method="POST" class="ui form">
            <div class="ui grid">
              <div class="row">
                <div class="twelve wide column">
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
                          <td>
                            <div class="ui checkbox">
                              <input type="checkbox" name="admins[]" value="{$admin->getEmail()}">
                              <label for=""></label>
                            </div>
                          </td>
                        </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </div>
                <div class="four wide column">
                  <input type="submit" name="deleteAdminsButton" value="Удалить" class="ui fluid negative button">
                  <br>
                  <fieldset>
                    <legend>Добавить администратора</legend>
                    <div class="field">
                      <label>Фамилия</label>
                      <input type="text" name="sn">
                    </div>
                    <div class="field">
                      <label>Имя</label>
                      <input type="text" name="fn">
                    </div>
                    <div class="field">
                      <label>Отчество</label>
                      <input type="text" name="pt">
                    </div>
                    <div class="field">
                      <label>Email</label>
                      <input type="email" name="email">
                    </div>
                    <div class="field">
                      <label>Пароль</label>
                      <input type="password" name="paswd">
                    </div>
                    <div class="field">
                      <input type="submit" name="addAdminButton" value="Зарегистрировать" class="ui primary button">
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </form>
          <br>
        </div>
        <div class="ui bottom attached tab segment" data-tab="data">
          <div class="ui internally celled grid">
            <div class="row">
              <div class="ten wide column">
                <fieldset>
                  <legend>Пользователи</legend>
                  <div class="ui statistics" style="display: flex; justify-content: space-around;">
                      <div class="statistic">
                          <div class="value">
                              {count($teachers)}
                          </div>
                          <div class="label">
                              Преподаватели
                          </div>
                      </div>
                      <div class="statistic">
                          <div class="value">
                              {count($students)}
                          </div>
                          <div class="label">
                              Студенты
                          </div>
                      </div>
                      <div class="statistic">
                          <div class="value">
                              {count($elders)}
                          </div>
                          <div class="label">
                              Старосты
                          </div>
                      </div>
                      <div class="statistic">
                          <div class="value">
                              {count($admins)}
                          </div>
                          <div class="label">
                              Администраторов
                          </div>
                      </div>
                  </div>
                </fieldset>
              </div>
              <div class="six wide column">
                <table class="ui flex table">
                  <tbody>
                    <tr>
                      <td>Специальности</td>
                      <td>{count($specialty)}</td>
                    </tr>
                    <tr>
                      <td>Группы</td>
                      <td>{count($groups)}</td>
                    </tr>
                    <tr>
                      <td>Предметы</td>
                      <td>{count($subjects)}</td>
                    </tr>
                    <tr>
                      <td>Новости</td>
                      <td>{count($news)}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="sixteen wide column">

              </div>
            </div>
          </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="logs"><!--  FIXME: Переделать в страницу с пагинацией -->
            <form name="deleteLogsForm" method="POST" class="ui form">
              <div class="ui internally celled grid">
                <div class="row">
                  <div class="twelve wide column">
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
                  </div>
                  <div class="four wide column">
                    <div class="field">
                      <label>Период</label>
                      <div class="two fields">
                        <div class="field">
                          <label>С</label>
                          <input type="date">
                        </div>
                        <div class="field">
                          <label>По</label>
                          <input type="date">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <input type="submit" name="viewLogs" value="Показать" class="ui fluid primary button">
                    </div>
                    <div class="field">
                      <input type="submit" name="deleteLogsButton" value="Удалить" class="ui fluid red button">
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}