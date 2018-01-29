{assign var="title" value="EDUKIT | Оповещения"}
{$js_links[] = "../ckeditor/ckeditor.js"}
{include file="html/begin.tpl"}

  <div class="ui internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        
      </div>
    </div>
  </div>

{*
  
  

	<div class="container-fluid">
		{include file="html/menu.tpl"}
		<form name="sendNotificationForm" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-6">
          <fieldset>
            <legend>Родители</legend>
            <table class="table table-border">
              <tr>
                <th>ФИО</th>
                <th>E-mail</th>
                <th>Выбрать</th>
              </tr>
              {foreach from=$parents item=parent}
                <tr>
                  <td>{$parent->getSn()} {$parent->getFn()} {$parent->getPt()}</td>
                  <td><a href="mailto:{$parent->getEmail()}">{$parent->getEmail()}</a></td>
                  <td><input type="checkbox" name="select_user[]" value="{$parent->getEmail()}" class="form-control"></td>
                </tr>
              {/foreach}
            </table>
          </fieldset>
          <fieldset>
            <legend>Студенты</legend>
            <table class="table table-border">
              <tr>
                <th>ФИО</th>
                <th>Группа</th>
                <th>E-mail</th>
                <th>Выбрать</th>
              </tr>
              {foreach from=$students item=student}
                <tr>
                  <td>{$student->getSn()} {$student->getFn()} {$student->getPt()}</td>
                  <td>{$student->getGroup()->getNumberGroup()} ({$student->getGroup()->getYearEducation()})</td>
                  <td><a href="mailto:{$student->getEmail()}">{$student->getEmail()}</td>
                  <td><input type="checkbox" name="select_user[]" value="{$student->getEmail()}" class="form-control"></td>
                </tr>
              {/foreach}
            </table>
          </fieldset>
				</div>
				<div class="col-md-6">
          <div class="form-group">
            <label>Заголовок</label>
            <input type="text" name="subject" class="form-control">
          </div>
          <div class="form-group">
            <label>Сообщение</label>
            <textarea name="message" rows="15" id="notification_message" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Прикрипите один или более файлов</label>
            <input type="file" name="userfile[]" multiple="multiple">
          </div>
          <div class="form-group">
            <input type="submit" name="sendNotificationButton" value="Отправить" class="btn btn-danger pull-right">
          </div>
				</div>
			</div>
		</form>
	</div>
	*}
	<script type="text/javascript">
		
		CKEDITOR.replace("notification_message");
		
	</script>

{include file="html/end.tpl"}