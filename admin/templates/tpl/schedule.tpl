{assign var="title" value="EDUKIT | Расписание"}
{include file="html/begin.tpl"}
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
                  {foreach from=$schedules key=grp item=schedule}
                  {$day_number = 1}
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#scheduleGroups" href="#{$grp}">
                            {$grp}
                          </a>
                        </h4>
                      </div>
                      <div id="{$grp}" class="panel-collapse collapse in">
                        <div class="panel-body">
                          {foreach from=$schedule key=day item=data}
                            <form name="changeScheduleForm" method="POST">
                              <input type="hidden" name="group" value="{$data[0]['id_grp']}">
                              <input type="hidden" name="day" value="{$day_number}">
                              <table class="table table-hover">
                                <thead>
                                  <h3>{$day}</h3>
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
                              <input type="submit" name="changeScheduleButton" value="Изменить" class="btn btn-sm btn-warning">
                            </form>
                            {$day_number = $day_number + 1}
                          {/foreach}
                        </div>
                      </div>
                    </div>
                  {/foreach}
                </div>
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Назначить пару</legend>
                  <form name="addScheduleEntryForm" method="POST">
                    <div class="form-group">
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
                      <input type="submit" name="addScheduleEntryButton" value="Назначить" class="btn btn-primary pull-right">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="changed">
            <br>
            <div class="row">
              <div class="col-md-8">
                
              </div>
              <div class="col-md-4">
                <fieldset>
                  <legend>Задать изменения в расписании</legend>
                  <form name="setChangeScheduleForm" method="POST">
                    <div class="form-group">
                      <label>Дата</label>
                      <input type="datetime" name="date" value="{$date_now}" class="form-control">
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
                      <select name="subjects" class="form-control">
                        {foreach from=$subjects item=subject}
                          <option value="{$subject->getSubjectID()}">{$subject->getDescription()}</option>
                        {/foreach}
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="submit" name="setChangeScheduleButton" value="Применить" class="btn btn-primary">
                    </div>
                  </form>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
{include file="html/end.tpl"}