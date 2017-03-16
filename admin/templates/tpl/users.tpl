{assign var="title" value="EDUKIT | Пользователи"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-2">
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#addUser" data-toggle="tab">Добавить</a></li>
          <li><a href="#viewUsers" data-toggle="tab">Просмотр</a></li>
          <li><a href="#grant" data-toggle="tab">Старосты</a></li>
          <li><a href="#editUser" data-toggle="tab">Изменить</a></li>
        </ul>
      </div>
      <div class="col-md-10">
        <div class="tab-content">
          <div class="tab-pane active" id="addUser">
            <div class="row">
              <div class="col-md-4">
                <fieldset>
                  <legend>Студент</legend>
                  <form name="addStudentForm" method="POST">
                    <div class="form-group">
                      <label>Фамилия</label>
                      <input type="text" name="sn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Имя</label>
                      <input type="text" name="fn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Отчество</label>
                      <input type="text" name="pt" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Пароль</label>
                      <input type="password" name="paswd" maxlength="32" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Адрес</label>
                      <input type="text" name="ha" maxlength="255" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Телефон</label>
                      <input type="telephone" name="cp" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Группа</label>
                      <select>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Преподаватель</legend>
                  <form name="addTeacherForm" method="POST">
                    <div class="form-group">
                      <label>Фамилия</label>
                      <input type="text" name="sn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Имя</label>
                      <input type="text" name="fn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Отчество</label>
                      <input type="text" name="pt" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Пароль</label>
                      <input type="password" name="paswd" maxlength="32" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Информация</label>
                      <textarea name="info" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#subjects">Предметы</a>
                            </h4>
                          </div>
                          <div id="subjects" class="panel-collapse collapse">
                            <div class="panel-body">
                              <!-- Table with subjects -->
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <input type="submit" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Родитель</legend>
                  <form name="addTeacherForm" method="POST">
                    <div class="form-group">
                      <label>Фамилия</label>
                      <input type="text" name="sn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Имя</label>
                      <input type="text" name="fn" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Отчество</label>
                      <input type="text" name="pt" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" maxlength="30" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Пароль</label>
                      <input type="password" name="paswd" maxlength="32" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Возраст</label>
                      <input type="number" name="age" min="20" value="20" max="99" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Образование</label>
                      <input type="text" name="education" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Место работы</label>
                      <input type="text" name="wp" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Должность</label>
                      <input type="text" name="post" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Домашний телефон</label>
                      <input type="telephone" name="hp" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Сотовый телефон</label>
                      <input type="telephone" name="cp" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="viewUsers">
            2
          </div>
          <div class="tab-pane" id="grant">
          
            <div class="row">
              <div class="col-md-6">
                <fieldset>
                  <legend>Назначить</legend>
                  <form name="grantElderForm">
                    <div class="form-group">
                      <label>Студент</label>
                      <select class="form-control"></select>
                      <datalist>
                        <!-- All Students -->
                      </datalist>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Назначить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <legend>Разжаловать</legend>
                  <form name="revokeElderForm">
                    <div class="form-group">
                      <label>Студент</label>
                      <select class="form-control"></select>
                      <datalist>
                        <!-- All Students -->
                      </datalist>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Разжаловать" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>E-mail</th>
                    <th>Телефон</th>
                    <th>Группа</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="editUser">
            4
          </div>
        </div>
      </div>
    </div>
  </div>
{include file="html/end.tpl"}