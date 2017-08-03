{assign var="title" value="EDUKIT | Расписание"}
{include file="html/begin.tpl"}
	<div class="container-fluid">
		{include file="html/menu.tpl"}
    <div class="row">
      <div class="col-md-8">
        
      </div>
      <div class="col-md-4">
        <fieldset>
          <legend>Назначить пару</legend>
          <form name="addScheduleEntryForm" method="POST">
            <div class="form-group">
              <label>День</label>
              <select name="day" class="form-control">
                <option value="ПН">ПН</option>
                <option value="ВТ">ВТ</option>
                <option value="СР">СР</option>
                <option value="ЧТ">ЧТ</option>
                <option value="ПТ">ПТ</option>
                <option value="СБ">СБ</option>
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
{include file="html/end.tpl"}