{assign var="title" value="Расписание"}
{include file='html/begin.tpl'}
<div class="container-fluid">
  {include file='users/menu.tpl'}
  <div class="row">
    <div class="col-md-12">
      <div class="container-fluid">
        <div id="rings" class="col-md-3">
          <h2>Расписание</h2>
          <nav id="nowDay" class="text-center">
            <ul class="pagination pagination-sm">
              <li id="1"><a>ПН</a></li>
              <li id="2"><a>ВТ</a></li>
              <li id="3"><a>СР</a></li>
              <li id="4"><a>ЧТ</a></li>
              <li id="5"><a>ПТ</a></li>
              <li id="6"><a>СБ</a></li>
              <li id="7"><a>ВС</a></li>
            </ul>
          </nav>
          {include "../blocks/schedule/calls.tpl"}
          {include "../blocks/schedule/eats.tpl"}
        </div>
        <div class="col-md-9">
          <form name="selectGroupForm" class="form-inline" method="POST">
            <div class="form-group">
              <label>Группа: </label>
              <select name="group" class="form-control">
                {foreach from=$groups item=group}
                  <option value="{$group->getGroupID()}">{$group->getNumberGroup()}</option>
                {/foreach}
              </select>
            </div>
            <input type="submit" name="selectGroupButton" value="Показать" class="btn btn-default">
          </form>
          <hr>
          <div class="panel-group" id="scheduleGroups">
            {if $changed_schedules != NULL}
              {foreach from=$changed_schedules key=grp item=schedule}
                <div class="panel panel-warning">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#scheduleGroups" href="#{$grp}">
                        Изменения для {$grp}
                      </a>
                    </h4>
                  </div>
                  <div id="{$grp}" class="panel-collapse collapse in">
                    <div class="panel-body">
                      {foreach from=$schedule key=day item=data}
                        <table class="table table-hover">
                          <thead>
                            <h3>{$day|date_format:'d.m.Y (l)'}</h3>
                          </thead>
                          <tbody>
                            <tr>
                              <th>Пара</th>
                              <th>Предмет</th>
                            </tr>
                            {foreach from=$data item=entry}
                              <tr>
                                <td>{$entry['pair']}</td>
                                <td>{$entry['subject']}</td>
                              </tr>
                            {/foreach}
                          </tbody>
                        </table>
                      {/foreach}
                    </div>
                  </div>
                </div>
              {/foreach}
            {else}
              <h3 align="center">Изменений нет</h3>
            {/if}
            {foreach from=$schedules key=grp item=schedule}
              <div class="panel panel-success">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#scheduleGroups" href="#{$grp}">
                      Основное расписание для {$grp}
                    </a>
                  </h4>
                </div>
                <div id="{$grp}" class="panel-collapse collapse in">
                  <div class="panel-body">
                    {foreach from=$schedule key=day item=data}
                      <table class="table table-hover">
                        <thead>
                          <h3>{$day}</h3>
                        </thead>
                        <tbody>
                          <tr>
                            <th>Пара</th>
                            <th>Предмет</th>
                          </tr>
                          {foreach from=$data item=entry}
                            <tr>
                              <td>{$entry['pair']}</td>
                              <td>{$entry['subject']}</td>
                            </tr>
                          {/foreach}
                        </tbody>
                      </table>
                    {/foreach}
                  </div>
                </div>
              </div>
            {/foreach}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/getDay.js"></script>
{include file='html/end.tpl'}