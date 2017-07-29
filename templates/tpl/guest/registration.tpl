{assign var="title" value="Регистрация родителя"}
{include file='html/begin.tpl'}
<div class="container-fluid">
  {include file='guest/menu.tpl'}
  <form name="regParentForm" method="POST" onsubmit="return checkRegParentForm();">
    <div class="row">
      <div class="col-md-4">
        <fieldset>
          <legend>Основная информация</legend>
          <div class="form-group">
            <label>Фамилия:</label>
            <input type="text" name="sn" class="form-control" value="Шазам">
          </div>
          <div class="form-group">
            <label>Имя:</label>
            <input type="text" name="fn" class="form-control" value="Сафин">
          </div>
          <div class="form-group">
            <label>Отчество:</label>
            <input type="text" name="pt" class="form-control" value="Сергеевич">
          </div>
          <div class="form-group">
            <label>Возраст:</label>
            <input type="number" name="age" class="form-control" min="20" value="32">
          </div>
          <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="shazam@mail.ru">
          </div>
          <div class="form-group">
            <label>Пароль:</label>
            <input type="password" name="password" class="form-control" value="password">
          </div>
          <div class="form-group">
            <label>Повторите пароль:</label>
            <input type="password" name="retry_password" class="form-control" value="password">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Домашний телефон:</label>
                  <input type="tel" name="home_phone" class="form-control" value="NONE">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Сотовый телефон:</label>
                  <input type="tel" name="cell_phone" class="form-control" value="NONE">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Место работы:</label>
                  <input type="text" name="work_place" class="form-control" value="Intel">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Должность:</label>
                  <input type="text" name="post" class="form-control" value="Генеральный директор">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <label>Образование</label>
                <select class="form-control" name="education">
                  <option>Среднее</option>
                  <option>Высшее</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="checkbox" value=""> Я согласен(а) на обработку персональных данных
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <input class="btn btn-success btn-lg pull-right" name="regParent" type="submit" value="Зарегистрироваться">
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <form name="setChildsForm" method="POST">
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
  
  function checkRegParentForm(form)
  {
    if (childs.toString() == "") {
      alert("Вы не выбрали ребёнка");
      return false;
    }
    else return true;
  }
  
</script>
		
{include file='html/end.tpl'}