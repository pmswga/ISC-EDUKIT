{assign var="title" value="EDUKIT | Настройки"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#admins" data-toggle="tab">Администраторы</a></li>
          <li><a href="#data" data-toggle="tab">Данные</a></li>
          <li><a href="#logs" data-toggle="tab">Логи</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <form name="deleteAdminsForm" method="POST">
          <div class="tab-content">
            <div class="tab-pane active" id="admins">
              <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th>Фамилия</th>
                          <th>Имя</th>
                          <th>Отчество</th>
                          <th>Email</th>
                          <th>Выбрать</th>
                        </tr>
                        {foreach from=$admins item=admin}
                          <tr>
                            <td>{$admin->getSn()}</td>
                            <td>{$admin->getFn()}</td>
                            <td>{$admin->getPt()}</td>
                            <td>{$admin->getEmail()}</td>
                            <td><input type="checkbox" name="admins[]" value="{$admin->getEmail()}" class="form-control"></td>
                          </tr>
                        {/foreach}
                      </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                  <input type="submit" name="deleteAdminsButton" value="Удалить" class="btn btn-danger btn-block">
                  <br>
                  <fieldset>
                    <legend>Добавить администратора</legend>
                    <form name="addAdminForm" method="POST">
                      <div class="form-group">
                        <label>Фамилия</label>
                        <input type="text" name="sn" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Имя</label>
                        <input type="text" name="fn" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Отчество</label>
                        <input type="text" name="pt" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Пароль</label>
                        <input type="password" name="paswd" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="addAdminButton" value="Зарегистрировать" class="btn btn-primary pull-right">
                      </div>
                    </form>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="data">
              3
            </div>
            <div class="tab-pane" id="logs">
              <form name="deleteLogsForm" method="POST">              
                <table class="table table-bordered">
                  <thead>
                    <input type="submit" name="deleteLogsButton" value="Удалить" class="btn btn-danger">
                  </thead>
                  <tbody>
                    <tr>
                      <th>№</th>
                      <th>Сообщение</th>
                      <th>Дата</th>
                      <th>Выбрать</th>
                    </tr>
                    {foreach from=$logs item=log}
                      <tr>
                          <td>{$log['id']}</td>
                          <td>{$log['message']}</td>
                          <td>{$log['date']|date_format:"%d.%m.%Y"}</td>
                          <td><input type="checkbox" name="logs[]" value="{$log['id']}" class="form-control"></td>
                      </tr>
                    {/foreach}
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}