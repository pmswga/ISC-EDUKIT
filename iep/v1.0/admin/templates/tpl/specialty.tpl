{assign var="title" value="EDUKIT | Специальности"}
{include file="html/begin.tpl"}
<form name="changeSpecialtyForm" method="POST" enctype="multipart/form-data" class="ui form">
  <div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        <div class="ui grid">
          <div class="row">
            <div class="ten wide column">
              {if $specialtyes != NULL}
                <table class="ui table">
                  <thead>
                    <tr>
                      <th>Код специальности</th>
                      <th>Описание</th>
                      <th>Файл специальности</th>
                      <th>Выбрать</th>
                    </tr>
                  </thead>
                  <tbody>
                    {foreach from=$specialtyes item=specialty}
                      <tr>
                        <td><p>{$specialty->getCode()}</p></td>
                        <td><p>{$specialty->getDescription()}</p></td>
                        <td><a href="pdfs/{$specialty->getFilename()}" download>{$specialty->getFilename()}</a></td>
                        <td><input type="checkbox" name="select_spec[]" value="{$specialty->getSpecialtyID()}" class="form-control"></td>
                      </tr>
                    {/foreach}
                  </tbody>
                </table>
              {else}
                <h1 align="center">Специальности не добавлены</h1>
              {/if}
            </div>
            <div class="six wide column">
              <div class="ui actions">
                <input type="submit" name="removeSpecialtyButton" value="Удалить" class="ui fluid red button">
                <br>
                <fieldset>
                  <legend>Добавить специальность</legend>
                  <div class="field">
                    <label>Код специальности</label>
                    <div class="three fields">
                        <div class="field">
                          <input type="number" name="code_spec_1" maxlength="2">
                        </div>
                        <div class="field">
                          <input type="number" name="code_spec_2" maxlength="2">
                        </div>
                        <div class="field">
                          <input type="number" name="code_spec_3" maxlength="2">
                        </div>
                    </div>
                  </div>
                  <div class="field">
                    <label>Описание</label>
                    <input type="text" name="descp" maxlength="255" class="form-control">
                  </div>
                  <div class="field">
                    <label>Файл специальности</label>
                    <input type="file" name="pdf_file">
                  </div>
                  <div class="field">
                    <input type="submit" name="addSpecialtyButton" value="Добавить" class="ui primary button">
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
{include file="html/end.tpl"}