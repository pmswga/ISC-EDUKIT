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
              <div class="col-md-8">
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Преподаватель</legend>
                  <form name="addTeacherForm" method="POST">
                    <div class="row">
                      <div class="col-md-12">
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
                          <input type="submit" name="addTeacherButton" value="Добавить" class="btn btn-primary">
                        </div>
                      </div>
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="viewUsers">
            <div class="row">
              <div class="col-md-12">
                <fieldset>
                  <legend>Удалить пользователя</legend>
                  <div class="row">
                    {if $allUsers != NULL}
                      <form name="removeUserForm" method="POST" class="form-horizontal">
                        <div class="col-md-10">
                          <select name="user" class="form-control">
                            {foreach from=$allUsers item=user}
                              <option value="{$user->getEmail()}">{$user->getSn()} {$user->getFn()} {$user->getPt()}</option>
                            {/foreach}
                          </select>
                        </div>
                        <div class="col-md-2">
                          <input type="submit" name="removeUserButton" value="Удалить" class="btn btn-danger">
                        </div>
                      </form>
                    {else}
                      <h3 align="center">Пользователи не зарегистрированы</h3>
                    {/if}
                  </div>
                </fieldset>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#teachers" data-toggle="tab">Преподаватели</a></li>
                  <li><a href="#students" data-toggle="tab">Студенты</a></li>
                  <li><a href="#parents" data-toggle="tab">Родители</a></li>
                  <li><a href="#elders" data-toggle="tab">Старосты</a></li>
                </ul>
              </div>
            </div>
						<div class="row">
							<div class="col-md-12">
                <div class="tab-content">
                  <div class="tab-pane active" id="teachers">
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                        {$i = 1}
                        {if $teachers}
                          <table class="table table-bordered">
                            <tr>
                              <th>№</th>
                              <th>Фамилия</th>
                              <th>Имя</th>
                              <th>Отчество</th>
                              <th>E-mail</th>
                              <th>Предметы</th>
                            </tr>
                            {foreach from=$teachers item=teacher}
                              <tr>
                                <td>{$i}</td>
                                <td>{$teacher->getSn()}</td>
                                <td>{$teacher->getFn()}</td>
                                <td>{$teacher->getPt()}</td>
                                <td>{$teacher->getEmail()}</td>
                                <td>
                                  {if $teacher->getSubjects() != NULL}
                                    <ul>
                                    {foreach from=$teacher->getSubjects() item=subject}
                                        <li>{$subject->getDescription()}</li>
                                    {/foreach}
                                    </ul>
                                  {else}
                                    <h5 align="center">Предметы не выбраны</h5>
                                  {/if}
                                </td>
                              </tr>
                              {$i = $i + 1}
                            {/foreach}
                          </table>
                        {else}
                          <h3>Преподаватели не зарегистрированы</h3>
                        {/if}
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="students">
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                        {if $studentsByGroup != NULL}
                          {foreach from=$studentsByGroup key=group item=student}
                            {$i = 1}
                            <div class="panel-group">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#{$group}">{$group}</a>
                                  </h4>
                                </div>
                                <div id="{$group}" class="panel-collapse collapse">
                                  <div class="panel-body"><table class="table table-bordered">
                                    <table class="table table-bordered">
                                      <tr>
                                        <th>№</th>
                                        <th>Фамилия</th>
                                        <th>Имя</th>
                                        <th>Отчество</th>
                                        <th>E-mail</th>
                                        <th>Адрес</th>
                                        <th>Телефон</th>
                                      </tr>
                                      {foreach from=$student item=one_student}
                                        <tr>
                                          <td>{$i}</td>
                                          <td>{$one_student->getSn()}</td>
                                          <td>{$one_student->getFn()}</td>
                                          <td>{$one_student->getPt()}</td>
                                          <td>{$one_student->getEmail()}</td>
                                          <td>{$one_student->getHomeAddress()}</td>
                                          <td>{$one_student->getCellPhone()}</td>
                                        </tr>
                                      {$i = $i + 1}
                                      {/foreach}
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          {/foreach}
                        {else}
                          <h3>Студенты не зарегистрированы</h3>
                        {/if}
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="parents">
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                        {if $parents != NULL}
                          <table class="table table-bordered">
                            <tr>
                              <th>Фамилия</th>
                              <th>Имя</th>
                              <th>Отчество</th>
                              <th>E-mail</th>
                              <th>Возраст</th>
                              <th>Образование</th>
                              <th>Место работы</th>
                              <th>Телефон</th>
                            </tr>
                            {foreach from=$parents item=parent}
                              <tr>
                                <td>{$parent->getFn()}</td>
                                <td>{$parent->getSn()}</td>
                                <td>{$parent->getPt()}</td>
                                <td>{$parent->getEmail()}</td>
                                <td>{$parent->getAge()}</td>
                                <td>{$parent->getEducation()}</td>
                                <td>
                                  {$parent->getWorkPlace()}<br>
                                  {$parent->getPost()}
                                </td>
                                <td>
                                  Домашний: {$parent->getHomePhone()}<br>
                                  Сотовый: {$parent->getCellPhone()}
                                </td>
                              </tr>
                            {/foreach}
                          </table>
                        {else}
                          <h3>Родители не зарегистрированы</h3>
                        {/if}
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="elders">
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                        {if $elders != NULL}
                          <table class="table table-bordered">
                            <tr>
                              <th>Группа</th>
                              <th>ФИО</th>
                              <th>E-mail</th>
                            </tr>
                            {foreach from=$elders item=elder}
                              <tr>
                                <td>{$elder->getGroup()->getNumberGroup()}</td>
                                <td>{$elder->getSn()} {$elder->getFn()} {$elder->getPt()}</td>
                                <td>{$elder->getEmail()}</td>
                              </tr>
                            {/foreach}
                          </table>
                        {else}
                          <h3>Старосты не назначены</h3>
                        {/if}
                      </div>
                    </div>
                  </div>
                </div>
							</div>
						</div>
          </div>
          <div class="tab-pane" id="grant">
            <div class="row">
              <div class="col-md-6">
                <fieldset>
                  <legend>Назначить</legend>
                  <form name="grantElderForm" method="POST">
                    <div class="form-group">
                      <label>Студент</label>
                      <select name="studentEmail" class="form-control">
												{foreach from=$students item=student}
													<option value="{$student->getEmail()}">{$student->getSn()} {$student->getFn()} {$student->getPt()} | <small>{$student->getGroup()->getNumberGroup()}</small></option>
												{/foreach}
											</select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="grantElderButton" value="Назначить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <legend>Разжаловать</legend>
                  <form name="revokeElderForm" method="POST">
                    <div class="form-group">
                      <label>Студент</label>
                      <select name="studentEmail" class="form-control">
												{foreach from=$elders item=elder}
													<option value="{$elder->getEmail()}">{$elder->getSn()} {$elder->getFn()} {$elder->getPt()} | <small>{$elder->getGroup()->getNumberGroup()}</small></option>
												{/foreach}
											</select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="revokeElderButton" value="Разжаловать" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
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