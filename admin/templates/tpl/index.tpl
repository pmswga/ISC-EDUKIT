{assign var="title" value="EDUKIT | Главная"}
{include file="html/begin.tpl"}
  <div class="ui internally celled grid">
    <div class="row">
      <div class="sixteen wide column">
        {include file="new/statistic.tpl"}
      </div>
    </div>
    <div class="row">
      <div class="thirteen wide column">
        <fieldset>
          <legend>Пользователи</legend>
          {include file="new/users.tpl"}
        </fieldset>
      </div>
      <div class="three wide column">
        <div class="ui vertical menu">
          <a class="item">Добавить студента</a>
          <a class="item">Добавить преподавателя</a>
          <a class="item">Назначить старосту</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="thirteen wide column">
        <fieldset>
          <legend>Предметы</legend>
          {include file="new/subjects.tpl"}
        </fieldset>
      </div>
      <div class="three wide column">
        <form name="addSubjectForm" method="POST" class="ui form">
          <div class="field">
            <label>Название</label>
            <input type="text" name="descp">
          </div>
          <div class="field">
            <input type="submit" name="addSubjectButton" value="Добавить" class="ui primary button">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">

    $('.ui.accordion').accordion();
    $('.menu .item').tab();

  </script>

{include file="html/end.tpl"}