{assign var="title" value="EDUKIT | Специальности"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-md-8">
              <form name="changeSpecialtyForm" method="POST" enctype="multipart/form-data">
                <input type="submit" name="editSpecialtyButton" value="Изменить" class="btn btn-warning btn-block">
                <input type="submit" name="removeSpecialtyButton" value="Удалить" class="btn btn-danger btn-block">
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th>Код специальности</th>
                    <th>Описание</th>
                    <th>Файл специальности</th>
                    <th>Выбрать</th>
                  </tr>
                  {foreach from=$specialtyes item=specialty}
                    <tr>
                      <td>{$specialty->getCode()}</td>
                      <td>{$specialty->getDescription()}</td>
                      <td><a href="{$specialty->getFilepath()}" target="__blank" download>{$specialty->getFilename()}</a></td>
                      <td><input type="checkbox" name="select_spec[]" value="{$specialty->getSpecialtyID()}" class="form-control"></td>
                    </tr>
                  {/foreach}
                </table>
              </form>
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Добавить новую специальность</legend>
                <form name="addSpecialtyForm" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Код специальности</label>
                    <input type="text" name="code_spec" maxlength="10" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Описание</label>
                    <input type="text" name="descp" maxlength="255" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Файл специальности</label>
                    <input type="file" name="pdf_file">
                  </div>
                  <div class="form-group">
                    <input type="submit" name="addSpecialtyButton" value="Добавить" class="btn btn-primary">
                  </div>
                </form>
              </fieldset>
            </div>
        </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}