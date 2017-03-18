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
                      <select name="grp" class="form-control">
                        {foreach from=$groups item=group}
                          <option value="{$group->getID()}">{$group->getNumberGroup()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="addStudentButton" value="Добавить" class="btn btn-primary">
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
                              <table class="table table-bordered">
                                <tr>
                                  <th>Название</th>
                                  <th>Выбрать</th>
                                </tr>
                                {foreach from=$subjects item=subject}
                                  <tr>
                                    <td>{$subject->getDescription()}</td>
                                    <td><input type="checkbox" name="subjects[]" value="{$subject->getDescription()}" class="form-control"></td>
                                  </tr>
                                {/foreach}
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="form-group">
                      <input type="submit" name="addTeacherButton" value="Добавить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Родитель</legend>
                  <form name="addParentForm" method="POST">
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
            <div class="panel-group" id="views_users">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#views_users" href="#view_teachers">Преподаватели</a>
                  </h4>
                </div>
                <div id="view_teachers" class="panel-collapse collapse">
                  <div class="panel-body">
                    <table class="table table-bordered">
                      <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>E-mail</th>
                        <th>Предметы</th>
                      </tr>
                      {foreach from=$teachers item=teacher}
                        <tr>
                          <td>{$teacher->getSn()}</td>
                          <td>{$teacher->getFn()}</td>
                          <td>{$teacher->getPt()}</td>
                          <td>{$teacher->getEmail()}</td>
                          <td>
														<ul>
														{foreach from=$teacher->getSubjects() item=subject}
																<li>{$subject->getDescription()}</li>
														{/foreach}
														</ul>
                          </td>
                        </tr>
                      {/foreach}
                    </table>
                  </div>
                </div>
              </div>
              <div class="panel panel-danger">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#views_users" href="#view_students">Студенты</a>
                  </h4>
                </div>
                <div id="view_students" class="panel-collapse collapse">
                  <div class="panel-body">
										{foreach from=$studentsByGroup key=group item=student}
											<div class="panel-group" id="view_groups_with_students">
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#view_groups_with_students" href="#{$group}">{$group}</a>
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
																	<th>Адрес</th>
																	<th>Телефон</th>
																</tr>
																{foreach from=$student item=one_student}
																	<tr>
																		<td>{$one_student->getSn()}</td>
																		<td>{$one_student->getFn()}</td>
																		<td>{$one_student->getPt()}</td>
																		<td>{$one_student->getEmail()}</td>
																		<td>{$one_student->getHomeAddress()}</td>
																		<td>{$one_student->getCellPhone()}</td>
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
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#views_users" href="#view_elders">Старосты</a>
                  </h4>
                </div>
                <div id="view_elders" class="panel-collapse collapse">
                  <div class="panel-body">
                    <table class="table table-bordered">
                      <tr>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>E-mail</th>
                        <th>Предметы</th>
                      </tr>
                      {foreach from=$elders item=elder}
                        <tr>
                          <td>{$elder->getSn()}</td>
                          <td>{$elder->getFn()}</td>
                          <td>{$elder->getPt()}</td>
                          <td>{$elder->getEmail()}</td>
                        </tr>
                      {/foreach}
                    </table>
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
													<option value="{$student->getEmail()}">{$student->getSn()} {$student->getFn()} {$student->getPt()} | <small>{$student->getGroup()}</small></option>
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
													<option value="{$elder->getEmail()}">{$elder->getSn()} {$elder->getFn()} {$elder->getPt()} | <small>{$elder->getGroup()}</small></option>
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