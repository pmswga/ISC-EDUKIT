{assign var="title" value="EDUKIT | Специальности"}
{include file="html/begin.tpl"}
  <div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        <form name="changeSpecialtyForm" method="POST" enctype="multipart/form-data" class="ui form">
          <div class="ui grid">
            <div class="row">
              <div class="fourteen wide column">
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
              <div class="two wide column">
                <div class="ui actions">
                    <!--<input type="submit" name="editSpecialtyButton" value="Изменить" class="btn btn-warning btn-block">-->
                    <input type="submit" name="removeSpecialtyButton" value="Удалить" class="ui red button">
                </div>
              </div>
            </div>
            <div class="row">
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
          </div>
        </div>
      </form>
    </div>
  </div>
    

{*
  
  
    <div class="container-fluid">
      {include file="html/menu.tpl"}
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  *}
{include file="html/end.tpl"}