{assign var="title" value="EDUKIT | Оповещения"}
{$js_links[] = "../ckeditor/ckeditor.js"}
{include file="html/begin.tpl"}
    <div class="container-fluid">
      {include file="html/menu.tpl"}
      <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
          <form name="sendNotificationForm" method="POST">
						<div class="form-group">
							<label>Заголовок</label>
							<input class="form-control">
						</div>
						<div class="form-group">
							<label>Сообщение</label>
							<textarea name="notification" rows="15" id="notification_message" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="sendNotificationButton" value="Отправить" class="btn btn-danger pull-right">
						</div>
					</form>
        </div>
      </div>
    </div>
		
		<script type="text/javascript">
			
			CKEDITOR.replace("notification_message");
			
		</script>
		
{include file="html/end.tpl"}