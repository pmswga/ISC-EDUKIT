<div class="row">
  <form name="notifications" method="POST">
    <div class="col-md-6">
      <table class="table table-hover">
        <tr>
          <td>Фамилия</td>
          <td>Имя</td>
          <td>Отчество</td>
          <td>E-mail</td>
          <td>Выбрать</td>
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
      <div class="form-group">
        <textarea cols="15" rows="15" name="notification" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" name="send_notification_button" value="Отправить" class="btn btn-danger">
      </div>
    </div>
  </form>
</div>