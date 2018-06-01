{assign var="title" value="EDUKIT | Предметы"}
{include file="html/begin.tpl"}
<form name="subjectsForm" method="POST" class="ui form">
  <div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        <div class="ui grid">
          <div class="row">
            <div class="ten wide column">
              {if $subjects != NULL}
                <table class="ui flex table">
                  <thead>
                    <tr>
                      <th>Название предмета</th>
                      <th>Выбрать</th>
                    </tr>
                  </thead>
                  <tbody>
                    {foreach from=$subjects item=subject}
                      <tr>
                        <td>{$subject->getDescription()}</td>
                        <td>
                          <div class="ui checkbox">
                            <input type="checkbox" name="select_subject[]" value="{$subject->getSubjectID()}">
                            <label></label>
                          </div>
                        </td>
                      </tr>
                    {/foreach}  
                  </tbody>
                </table>
              {else}
                <h2>Добавьте предметы</h2>
              {/if}
            </div>
            <div class="six wide column">
              <input type="submit" name="removeSubjectButton" value="Удалить" class="ui fluid red button">
              <br>
              <fieldset>
                <legend>Добавить предмет</legend>
                <div class="field">
                  <label>Наименование предмета</label>
                  <input type="text" name="subject">
                </div>
                <div class="field">
                  <input type="submit" name="addSubjectButton" value="Добавить" class="ui positive button">
                </div>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
{include file="html/end.tpl"}