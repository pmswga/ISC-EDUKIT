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
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th>Группа</th>
                    <th>Специальность</th>
                    <th>Кол-во студентов</th>
                    <th>Выбрать</th>
                  </tr>
                </table>
              </div>
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
                      <input class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Специальность</label>
                      <select class="form-control">
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Добавить">
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