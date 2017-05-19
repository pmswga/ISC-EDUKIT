{assign var="title" value="EDUKIT | Группы"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#viewGroups" data-toggle="tab">Просмотр</a></li>
          <li><a href="#addGroup" data-toggle="tab">Добавить</a></li>
          <li><a href="#editGroup" data-toggle="tab">Изменить</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="viewGroups">
            <div class="row">      
              <form name="removeGroupForm" method="POST">
                <div class="col-md-10">
                  <table class="table table-bordered">
                    <tr>
                      <th>Группа</th>
                      <th>Специальность</th>
                      <th>Кол-во студентов</th>
                      <th>Выбрать</th>
                    </tr>
                    {foreach from=$groups item=group}
                      <tr>
                        <td>{$group->getNumberGroup()}</td>
                        <td>{$group->getCode()}</td>
                        <td>{$group->getCountStudents()}</td>
                        <td><input type="checkbox" name="select_grp[]" value="{$group->getID()}" class="form-control"></td>
                      </tr>
                    {/foreach}
                  </table>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="removeGroupButton" value="Удалить" class="btn btn-danger btn-block">
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="addGroup">
            <div class="row">
              <div class="col-md-8">
                <fieldset>
                  <legend>Новая группа</legend>
                  <form name="addGroupForm" method="POST">
                    <div class="form-group">
                      <label>Наименование</label>
                      <input type="text" name="group" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Специальность</label>
                      <select name="spec" class="form-control">
                        {foreach from=$specialtyes item=specialty}
                          <option value="{$specialty->getSpecialtyID()}">{$specialty->getCode()} -> {$specialty->getDescription()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Тип</label>
                      <select name="payment" class="form-control">
                        <option value="1">Бюджетная</option>
                        <option value="0">Коммерческая</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="addGroupButton" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-block">Перевести на курс выше</button>
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