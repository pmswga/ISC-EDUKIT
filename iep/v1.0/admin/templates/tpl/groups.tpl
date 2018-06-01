{assign var="title" value="EDUKIT | Группы"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="ui internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        <form name="" method="POST" class="ui form">
          <div class="ui grid">
            <div class="row">
              <div class="ten wide column">
                <table class="ui fixed table">
                  <thead>
                    <tr>
                      <th>Группа</th>
                      <th>Специальность</th>
                      <th>Года обучения</th>
                      <th>Тип</th>
                      <th>Выбрать</th>
                    </tr>
                  </thead>
                  <tbody>
                    {foreach from=$groups item=group}
                      <tr>
                        <td><p>{$group->getNumberGroup()}</p></td>
                        <td><p>{$group->getCode()}</p></td>
                        <td><p>{$group->getYearEducation()}</p></td>
                        <td>
                          <p>
                            {if $group->getStatus() == 1}
                              Бюджетная
                            {elseif $group->getStatus() == 0}
                              Коммерческая
                            {/if}
                          </p>
                        </td>
                        <td>
                          <div class="ui checkbox">
                            <input type="checkbox" name="select_grp[]" value="{$group->getGroupID()}" class="form-control">
                            <label></label>
                          </div>
                        </td>
                      </tr>
                    {/foreach}
                  </tbody>
                </table>
              </div>
              <div class="six wide column">
                <input type="submit" name="removeGroupButton" value="Удалить" class="ui fluid red button">
                <br>
                <fieldset>
                  <legend>Новая группа</legend>
                  <form name="addGroupForm" method="POST">
                    <div class="field">
                      <label>Наименование</label>
                      <input type="text" name="group">
                    </div>
                    <div class="field">
                      <label>Год обучения</label>
                      <div class="two fields">
                        <div class="field">
                          <input type="number" name="edu_year_1" min="2000" value="{$currentYear}" max="2099" class="form-control">
                        </div>
                        <div class="field">
                          <input type="number" name="edu_year_2" min="2000" value="{$currentYear+1}" max="2099" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <label>Специальность</label>
                      <select name="spec">
                        {foreach from=$specialtyes item=specialty}
                          <option value="{$specialty->getSpecialtyID()}">{$specialty->getCode()} {$specialty->getDescription()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="field">
                      <label>Тип</label>
                      <select name="payment">
                        <option value="1">Бюджетная</option>
                        <option value="0">Коммерческая</option>
                      </select>
                    </div>
                    <div class="field">
                      <input type="submit" name="addGroupButton" value="Добавить" class="ui primary button">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
{*
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
                    <th>Тип</th>
                    <th>Выбрать</th>
                  </tr>
                  {foreach from=$groups item=group}
                    <tr>
                      <td><p>{$group->getNumberGroup()}</p></td>
                      <td><p>{$group->getCode()}</p></td>
                      <td><p>{$group->getYearEducation()}</p></td>
                      <td>
                        <p>
                          {if $group->getStatus() == 1}
                            Бюджетная
                          {elseif $group->getStatus() == 0}
                            Коммерческая
                          {/if}
                        </p>
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
              <br>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  *}
  
{include file="html/end.tpl"}