{assign var="title" value="EDUKIT | Посещаемость"}
{include file="html/begin.tpl"}
    <div class="container-fluid">
      {include file="html/menu.tpl"}
      <div class="row">
        <div class="col-md-6">
          <fieldset>
            <legend>Посещаемость студента</legend>
          </fieldset>
        </div>
        <div class="col-md-6">
          <form name="setChildsForm" method="POST">
            {if $studentsByGroup != NULL}            
              <div class="panel-group" id="views_users">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#views_users" href="#view_students">Студенты</a>
                    </h4>
                  </div>
                  <div id="view_students" class="panel-collapse collapse-in">
                    <div class="panel-body">
                      {foreach from=$studentsByGroup key=group item=student}
                        <div class="panel-group">
                          <div class="panel panel-success">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" href="#{$group}">{$group}</a>
                              </h4>
                            </div>
                            <div id="{$group}" class="panel-collapse collapse">
                              <div class="panel-body"><table class="table table-bordered">
                                <table class="table table-bordered">
                                  <tr>
                                    <th>Фамилия</th>
                                    <th>Имя</th>
                                    <th>Отчество</th>
                                    <th>E-mail</th>
                                    <th>Выбрать</th>
                                  </tr>
                                  {foreach from=$student item=one_student}
                                    <tr>
                                      <td>{$one_student->getSn()}</td>
                                      <td>{$one_student->getFn()}</td>
                                      <td>{$one_student->getPt()}</td>
                                      <td>{$one_student->getEmail()}</td>
                                      <td><input type="checkbox" value="{$one_student->getEmail()}" name="childs[]" class="form-control"></td>
                                    </tr>
                                  {/foreach}
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      {/foreach}
                    </div>
                  </div>
                </div>
              </div>
            {else}
              <h3 align="center">Студенты не зарегистрированы</h3>
            {/if}
          </form>
        </div>
      </div>
    </div>
{include file="html/end.tpl"}