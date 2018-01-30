{assign var="title" value="EDUKIT | Предметы"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
<div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        {if $subjects != NULL}            
          <table class="ui table">
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
    </div>
  </div>
{*


  
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <form name="changeSpecialtyForm" method="POST">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
              <input type="submit" name="removeSubjectButton" value="Удалить" class="btn btn-danger btn-block">
              <br>
              <fieldset>
                <legend>Добавить новый предмет</legend>
                <form name="addSubjectForm" method="POST">
                  <div class="form-group">
                    <label>Название предмета</label>
                    <input type="text" name="subject" maxlength="255" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addSubjectButton" value="Добавить" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  *}
  {include file="html/end.tpl"}