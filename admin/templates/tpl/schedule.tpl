{assign var="title" value="EDUKIT | Расписание"}
{include file="html/begin.tpl"}
<div class="ui internally celled grid">
  <div class="row">
    <div class="two wide column">
      {include file="html/menu.tpl"}
    </div>
    <div class="fourteen wide column">
        <div class="ui top attached tabular menu">
            <a class="active item" data-tab="teachers">Основное</a>
            <a class="item" data-tab="students">Изменения</a>
        </div>
        <div class="ui bottom attached active tab segment" data-tab="teachers">
          <div class="ui grid">
            <div class="row">
              <div class="eight wide column">
                  {foreach from=$schedules key=grp item=schedule}
                    {$day_number = 1}
                    <div class="ui styled accordion">
                      <div class="title">
                          {$grp}
                      </div>
                      <div class="content">
                        {foreach from=$schedule key=day item=data}
                          <form name="changeScheduleForm" method="POST" class="ui form">
                            <div class="styled accordion">
                              <div class="title">
                                {$day}
                              </div>
                              <div class="content">
                                <input type="hidden" name="group" value="{$data[0]['id_grp']}">
                                <input type="hidden" name="day" value="{$day_number}">
                                <table class="ui table">
                                  <thead>
                                      <tr>
                                        <th>Пара</th>
                                        <th>Нижняя</th>
                                        <th>Верхняя</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    {$i = 1}
                                    {foreach from=$data item=entry}
                                    <tr>
                                      <td>{$entry['pair']}</td>
                                      <td>
                                        <select class="form-control" name="down_pair_{$i}">
                                          <option value="{$entry['id_subj_1']}">{$entry['subj_1']}</option>
                                          {foreach from=$subjects item=$subject}
                                            {if $entry['subj_1'] != $subject->getDescription()}
                                              <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
                                            {/if}
                                          {/foreach}
                                        </select>
                                      </td>
                                      <td>
                                        <select class="form-control" name="up_pair_{$i}">
                                          <option value="{$entry['id_subj_2']}">{$entry['subj_2']}</option>
                                          {foreach from=$subjects item=$subject}
                                            {if $entry['subj_2'] != $subject->getDescription()}
                                              <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
                                            {/if}
                                          {/foreach}
                                        </select>
                                      </td>
                                    </tr>
                                    {$i = $i + 1}
                                    {/foreach}
                                  </tbody>
                                </table>
                                <input type="submit" name="changeScheduleButton" value="Изменить" class="ui orange button">
                              </div>

                            </div>
                          </form>
                          {$day_number = $day_number + 1}
                        {/foreach}
                      </div>
                    </div>
                  {/foreach}
              </div>
              <div class="eight wide column">
                <fieldset>
                  <legend>Назначить пару</legend>
                  <form name="addScheduleEntryForm" method="POST" class="ui form">
                    <div class="field">
                      <label>День</label>
                      <select name="day" class="form-control">
                        <option value="1">ПН</option>
                        <option value="2">ВТ</option>
                        <option value="3">СР</option>
                        <option value="4">ЧТ</option>
                        <option value="5">ПТ</option>
                        <option value="6">СБ</option>
                      </select>
                    </div>
                    <div class="field">
                      <label>Группа</label>
                      <select name="group" class="form-control">
                        {foreach from=$groups item=group}
                          <option value="{$group->getGroupID()}">{$group->getNumberGroup()} ({$group->getYearEducation()})</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="field">
                      <label>Пара</label>
                      <select name="pair" class="form-control">
                        {$pairs = [1, 2, 3, 4, 5, 6, 7]}
                        {foreach $pairs as $pair}
                          <option value="{$pair}">{$pair}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="field">
                      <label>Предмет</label>
                      <div class="two fields">
                        <div class="field">
                          <label>Нижняя</label>
                          <select name="subj_1" class="form-control">
                            {foreach from=$subjects item=subject}
                            <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
                            {/foreach}
                          </select>
                        </div>
                        <div class="field">
                          <label>Верхняя</label>
                          <select name="subj_2" class="form-control">
                            {foreach from=$subjects item=subject}
                            <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
                            {/foreach}
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="field">
                      <input type="submit" name="addScheduleEntryButton" value="Назначить" class="ui primary button">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="students">
          
        </div>
    </div>
  </div>
</div>

{*
  
  
	<div class="container-fluid">
    {include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#general" data-toggle="tab">Основное</a></li>
          <li><a href="#changed" data-toggle="tab">Изменения</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="general">
            <div class="row">
              <br>
              <div class="col-md-8">
                <div class="panel-group" id="scheduleGroups">
                </div>
              </div>
              <div class="col-md-4">
              </div>
            </div>
          </div>
          <div class="tab-pane" id="changed">
            <br>
            <div class="row">
              <div class="col-md-8">
                <div class="panel-group" id="scheduleChangesGroups">
                  {if $changedSchedule != NULL}
                  {$group_n = 1}
                  {foreach from=$changedSchedule key=grp item=schedule}
                  {$day_number = 1}
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#scheduleChangesGroups" href="#change_{$group_n}">
                          {$grp}
                        </a>
                      </h4>
                    </div>
                    <div id="change_{$group_n}" class="panel-collapse collapse">
                      <div class="panel-body">
                        {foreach from=$schedule key=day item=data}
                        <form name="changeChangedScheduleForm" method="POST">
                          <input type="hidden" name="group" value="{$data[0]['id_grp']}">
                          <input type="hidden" name="day" value="{$day|date_format:'Y-m-d'}">
                          <table class="table table-hover">
                            <thead>
                              <h3>{$day|date_format:'d.m.Y (l)'}</h3>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Пара</th>
                                <th>Предмет</th>
                              </tr>
                              {$i = 1}
                              {foreach from=$data item=entry}
                              <tr>
                                <td>{$entry['pair']}</td>
                                <td>
                                  <select class="form-control" name="pair_{$i}">
                                    <option value="0">{$entry['subject']}</option>
                                    {foreach from=$subjects item=$subject}
                                    {if $entry['subject'] != $subject->getDescription()}
                                    <option value="{$subject->getSubjectID()}">
                                      {$subject->getDescription()}
                                    </option>
                                    {/if}
                                    {/foreach}
                                  </select>
                                </td>
                              </tr>
                              {$i = $i + 1}
                              {/foreach}
                            </tbody>
                          </table>
                          <input type="submit" name="changeChangedScheduleButton" value="Изменить" class="btn btn-sm btn-warning">
                        </form>
                        {$day_number = $day_number + 1}
                        {/foreach}
                      </div>
                    </div>
                  </div>
                  {$group_n = $group_n + 1}
                  {/foreach}
                  {else}
                  <h3 align="center">Изменений нет</h3>
                  {/if}
                </div>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Задать изменения в расписании</legend>
                  <form name="setChangeScheduleForm" method="POST">
                    <div class="form-group">
                      <label>Дата</label>
                      <input type="datetime" name="day" value="{$date_now}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Группа</label>
                      <select name="group" class="form-control">
                        {foreach from=$groups item=group}
                        <option value="{$group->getGroupID()}">{$group->getNumberGroup()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Пара</label>
                      <select name="pair" class="form-control">
                        <option value="1">1 пара</option>
                        <option value="2">2 пара</option>
                        <option value="3">3 пара</option>
                        <option value="4">4 пара</option>
                        <option value="5">5 пара</option>
                        <option value="6">6 пара</option>
                        <option value="7">7 пара</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Предмет</label>
                      <select name="subject" class="form-control">
                        {foreach from=$subjects item=subject}
                        <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="setChangeScheduleButton" value="Поставить изменения" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
                <fieldset>
                  <legend>Удалить изменения группы</legend>
                  <form name="deleteChangedScheduleForm" method="POST">
                    <div class="form-group">
                      <label>Группа</label>
                      <select name="group" class="form-control">
                        {foreach from=$groups item=group}
                        <option value="{$group->getGroupID()}">{$group->getNumberGroup()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <input type="submit" name="deleteChangedScheduleButton" value="Удалить все изменения" class="btn btn-danger">
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
  *}
  {include file="html/end.tpl"}