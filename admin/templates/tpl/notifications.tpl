{assign var="title" value="EDUKIT | Оповещения"}
{$js_links[] = "../ckeditor/ckeditor.js"}
{include file="html/begin.tpl"}
	<div class="container-fluid">
		{include file="html/menu.tpl"}
		<form name="sendNotificationForm" method="POST">
			<div class="row">
				<div class="col-md-6">
          <fieldset>
            <legend>Родители</legend>
            <table class="table table-border">
              <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>E-mail</th>
                <th>Выбрать</th>
              </tr>
              {foreach from=$parents item=parent}
                <tr>
                  <td>{$parent->getSn()}</td>
                  <td>{$parent->getFn()}</td>
                  <td>{$parent->getPt()}</td>
                  <td>{$parent->getEmail()}</td>
                  <td><input type="checkbox" name="select_parent[]" value="{$parent->getEmail()}" class="form-control"></td>
                </tr>
              {/foreach}
            </table>
          </fieldset>
          <fieldset>
            <legend>Студенты</legend>
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
							<input type="submit" name="sendNotificationButton" value="Отправить" class="btn btn-danger pull-right">
						</div>
				</div>
			</div>
		</form>
	</div>
	
	<script type="text/javascript">
		
		CKEDITOR.replace("notification_message");
		
	</script>

{include file="html/end.tpl"}