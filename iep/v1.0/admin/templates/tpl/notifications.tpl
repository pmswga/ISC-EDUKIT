{assign var="title" value="EDUKIT | Оповещения"}
{$js_links[] = "../ckeditor/ckeditor.js"}
{include file="html/begin.tpl"}

  <div class="ui internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
		    <form name="sendNotificationForm" method="POST" enctype="multipart/form-data">
          <div class="ui grid">
            <div class="row">
              <div class="eight wide column">
                <fieldset>
                  <legend>Родители</legend>
                  <table class="ui table">
                    <thead>
                      <tr>
                        <th>ФИО</th>
                        <th>E-mail</th>
                        <th>Выбрать</th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$parents item=parent}
                        <tr>
                          <td>{$parent->getSn()} {$parent->getFn()} {$parent->getPt()}</td>
                          <td><a href="mailto:{$parent->getEmail()}">{$parent->getEmail()}</a></td>
                          <td><input type="checkbox" name="select_user[]" value="{$parent->getEmail()}" class="form-control"></td>
                        </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </fieldset>
                <fieldset>
                  <legend>Студенты</legend>
                  <table class="ui table">
                    <thead>
                      <tr>
                        <th>ФИО</th>
                        <th>Группа</th>
                        <th>E-mail</th>
                        <th>Выбрать</th>
                      </tr>
                    </thead>
                    <tbody>
                      {foreach from=$students item=student}
                        <tr>
                          <td>{$student->getSn()} {$student->getFn()} {$student->getPt()}</td>
                          <td>{$student->getGroup()->getNumberGroup()} ({$student->getGroup()->getYearEducation()})</td>
                          <td><a href="mailto:{$student->getEmail()}">{$student->getEmail()}</td>
                          <td><input type="checkbox" name="select_user[]" value="{$student->getEmail()}" class="form-control"></td>
                        </tr>
                      {/foreach}
                    </tbody>
                  </table>
                </fieldset>
              </div>
              <div class="eight wide column">
                <div class="ui form">
                  <div class="field">
                    <label>Заголовок</label>
                    <input type="text" name="subject" class="form-control">
                  </div>
                  <div class="field">
                    <label>Сообщение</label>
                    <textarea name="message" rows="15" id="notification_message" class="form-control"></textarea>
                  </div>
                  <div class="field">
                    <label>Прикрипите один или более файлов</label>
                    <input type="file" name="userfile[]" multiple="multiple">
                  </div>
                  <div class="field">
                    <input type="submit" name="sendNotificationButton" value="Отправить" class="btn btn-danger pull-right">
                  </div>
                </div>
              </div>
            </div>
          </div>
	  	  </form>
      </div>
    </div>
  </div>

	<script type="text/javascript">
		
		CKEDITOR.replace("notification_message");
		
	</script>

{include file="html/end.tpl"}