{assign var="title" value="EDUKIT | Группы"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-12">
        <div class="row">      
          <form name="removeGroupForm" method="POST">
            <div class="col-md-8">
              {if $groups != NULL}
                <table class="table table-bordered">
                  <tr>
                    <th>Группа</th>
                    <th>Специальность</th>
                    <th>Года обучения</th>
                    <th>Кол-во студентов</th>
                    <th>Тип</th>
                    <th>Выбрать</th>
                  </tr>
                  {foreach from=$groups item=group}
                    <tr>
                      <td>{$group->getNumberGroup()}</td>
                      <td>{$group->getCode()}</td>
                      <td>{$group->getYearEducation()}</td>
                      <td>~</td>
                      <td>
                        {if $group->getStatus() == 1}
                          Бюджетная
                        {elseif $group->getStatus() == 0}
                          Коммерческая
                        {/if}
                      </td>
                      <td><input type="checkbox" name="select_grp[]" value="{$group->getGroupID()}" class="form-control"></td>
                    </tr>
                  {/foreach}
                </table>
              {else}
                  <h1 align="center">Группы не добавлены</h1>
              {/if}
            </div>
            <div class="col-md-4">
              <input type="submit" name="removeGroupButton" value="Удалить" class="btn btn-danger btn-block">
              <button type="button" class="btn btn-primary btn-block">Перевести на курс выше</button>
              <br>
              <fieldset>
                <legend>Новая группа</legend>
                <form name="addGroupForm" method="POST">
                  <div class="form-group">
                    <label>Наименование</label>
                    <input type="text" name="group" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Года обучения</label>
                    <div class="row">
                      <div class="col-md-6">                      
                        <input type="number" name="edu_year_1" min="2010" value="2010" max="2099" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="number" name="edu_year_2" min="2010" value="2011" max="2099" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Специальность</label>
                    <select name="spec" class="form-control">
                      {foreach from=$specialtyes item=specialty}
                        <option value="{$specialty->getSpecialtyID()}">{$specialty->getCode()} {$specialty->getDescription()}</option>
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
          </form>
        </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}