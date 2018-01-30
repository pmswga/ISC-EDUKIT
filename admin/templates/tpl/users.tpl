{assign var="title" value="EDUKIT | Пользователи"}
{$css_links[] = "vt.css"}
{include file="html/begin.tpl"}
  <div class="ui internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="teachers">Преподаватели</a>
            <a class="item" data-tab="students">Студенты</a>
            <a class="item" data-tab="parents">Родители</a>
        </div>
        <div class="ui bottom attached active tab segment" data-tab="teachers">
            <table class="ui table">
                <thead>
                    <tr>
                        <th><h4>№</h4></th>
                        <th><h4>ФИО</h4></th>
                        <th><h4>Email</h4></th>
                        <th><h4>Предметы</h4></th>
                    </tr>
                </thead>
                <tbody>
                    {$i = 1}
                    {foreach $teachers as $teacher}
                        <tr>
                            <td>{$i}</td>
                            <td>{$teacher->getSn()} {$teacher->getFn()} {$teacher->getPt()}</td>
                            <td>{$teacher->getEmail()}</td>
                            <td>
                                <div class="group tag lables">
                                    {foreach $teacher->getSubjects() as $subject}
                                        <a class="ui tag label">{$subject->getDescription()}</a>
                                    {/foreach}
                                </div>
                            </td>
                        </tr>
                        {$i = $i + 1}
                    {/foreach}
                </tbody>
            </table>
        </div>
        <div class="ui bottom attached tab segment" data-tab="students">
            <div class="ui cards">
                {foreach $studentsByGroup as $group => $students}
                    <div class="ui card">
                        <div class="content">
                            <div class="header">{$group}</div>
                        </div>
                        <div class="content">
                            <div class="ui ordered list">
                                {foreach $students as $student}
                                    <div class="item">
                                        {$student->getSn()} {$student->getFn()} {$student->getPt()}
                                    </div>
                                {/foreach}
                            </div>
                        </div>
                        <div class="extra content">
                            <p>Кол-во: {count($students)}</p>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="parents">
            Third
        </div>
      </div>
    </div>
  </div>
{*


  <div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-8">
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
                    <table class="table table-hover">
                      <tr>
                        <th>№</th>
                        <th>ФИО</th>
                        <th>E-mail</th>
                        <th>Предметы</th>
                      </tr>
                      {foreach from=$teachers item=teacher}
                        <tr>
                          <td><p>{$i}</p></td>
                          <td><p>{$teacher->getSn()} {$teacher->getFn()} {$teacher->getPt()}</p></td>
                          <td><a href="mailto:{$teacher->getEmail()}">{$teacher->getEmail()}</a></td>
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
                    {$group_n = 1}
                    {foreach from=$studentsByGroup key=group item=student}
                      {$i = 1}
                      <div class="panel-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" href="#{$group_n}">{$group}</a>
                            </h4>
                          </div>
                          <div id="{$group_n}" class="panel-collapse collapse">
                            <div class="panel-body"><table class="table table-bordered">
                              <table class="table table-hover">
                                <tr>
                                  <th>№</th>
                                  <th>ФИО</th>
                                  <th>E-mail</th>
                                  <th>Адрес</th>
                                  <th>Телефон</th>
                                </tr>
                                {foreach from=$student item=one_student}
                                  {if $one_student->getUserType() == 2}
                                    {$css = "background-color: crimson;color: white;"}
                                  {else}
                                    {$css = ""}
                                  {/if}
                                  <tr style="{$css}">
                                    <td><p>{$i}</p></td>
                                    <td><p>{$one_student->getSn()} {$one_student->getFn()} {$one_student->getPt()}</p></td>
                                    <td><a href="mailto:{$one_student->getEmail()}">{$one_student->getEmail()}</a></td>
                                    <td><p>{$one_student->getHomeAddress()}</p></td>
                                    <td><p>{$one_student->getCellPhone()}</p></td>
                                  </tr>
                                {$i = $i + 1}
                                {/foreach}
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      {$group_n = $group_n + 1}
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
                    <table class="table table-hover">
                      <tr>
                        <th>ФИО</th>
                        <th>E-mail</th>
                        <th>Возраст</th>
                        <th>Образование</th>
                        <th>Место работы</th>
                        <th>Телефон</th>
                      </tr>
                      {foreach from=$parents item=parent}
                        <tr>
                          <td>{$parent->getSn()} {$parent->getFn()} {$parent->getPt()}</td>
                          <td><a href="mailto:{$parent->getEmail()}">{$parent->getEmail()}</a></td>
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
                <div class="col-md-6">
                  <br>
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
                </div>
                <div class="col-md-6">
                  <br>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-md-4">
        <fieldset>
          <legend>Добавить преподавателя</legend>
          <form name="addTeacherForm" method="POST">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Фамилия</label>
                  <input type="text" name="sn" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Имя</label>
                  <input type="text" name="fn" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Отчество</label>
                  <input type="text" name="pt" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input type="email" name="email" maxlength="30" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Пароль</label>
                  <input type="password" name="paswd" maxlength="32" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Информация</label>
                  <textarea name="info" rows="5" class="form-control"></textarea required>
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
  *}
{include file="html/end.tpl"}