{assign var="title" value="EDUKIT | Предметы"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <form name="changeSpecialtyForm" method="POST" enctype="multipart/form-data">
            <div class="col-md-8">
                <input type="submit" name="editSpecialtyButton" value="Изменить" class="btn btn-warning btn-block">
                <input type="submit" name="removeSpecialtyButton" value="Удалить" class="btn btn-danger btn-block">
                <br>
                <table class="table table-bordered">
                  <tr>
                    <th>Название предмета</th>
                  </tr>
                  {foreach from=$subjects item=subject}
                    <tr>
                      <td>{$subject->getCode()}</td>
                    </tr>
                  {/foreach}
                </table>
            </div>
            <div class="col-md-4">
              <fieldset>
                <legend>Добавить новый предмет</legend>
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
          </form>
        </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}