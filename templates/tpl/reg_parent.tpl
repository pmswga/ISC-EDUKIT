{assign var="title" value="Регистрация родителя"} {include file='html/begin.tpl'}


<div id="msg" class="ui warning message top fixed menu">
  <div class="item header"></div>
  <div class="item content"></div>
</div>

<script type="text/javascript">

  class Messager {
    
    /*!

      states of message:
        1. error   -> .negative
        2. success -> .success  
        3. warning -> .warning
        4. info    -> .info

    */

    constructor(element = "msg") {
      this.element = $("#" + element);
      this.hide();
      this.header = $("#" + element + " > .header");
      this.content = $("#" + element + " > .content");
      this.state = "warning";
    }

    setState(state = "warning") {
      this.state = state;
    }

    setHeader(header) {
      this.header.text(header);
    }

    setContent(content) {
      this.content.text(content);
    }

    hide() {
      this.element.hide();
    }

    show() {
      this.element.attr("class", "ui " + this.state + " message top fixed menu");
      this.element.show();
    }

  }

  var msger = new Messager();

</script>

<form name="regParentForm" method="POST">
  <div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
        {include file='blocks/guest_menu.tpl'}
      </div>
      <div class="thirteen wide column">
        <h1>Заполните форму для регистрации</h1>
        <hr>
        <div class="ui stackable grid">
          <div class="row">
            <div class="eight wide column">
              <div class="ui form">

                <div class="field">
                  <label>Фамилия</label>
                  <input type="text" name="sn">
                </div>
                <div class="field">
                  <label>Имя</label>
                  <input type="text" name="fn">
                </div>
                <div class="field">
                  <label>Отчество</label>
                  <input type="text" name="pt">
                </div>
                <div class="field">
                  <label>Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field">
                  <label>Пароль</label>
                  <input type="password" name="password">
                </div>
                <div class="field">
                  <label>Повторите пароль</label>
                  <input type="password" name="retry_password">
                </div>
                <div class="field">
                  <label>Домашний телефон</label>
                  <input type="text" name="home_phone">
                </div>
                <div class="field">
                  <label>Сотовый телефон</label>
                  <input type="text" name="cell_phone">
                </div>
                <div class="field">
                  <label>Место работы</label>
                  <input type="text" name="work_place">
                </div>
                <div class="field">
                  <label>Должность</label>
                  <input type="text" name="post">
                </div>
                <div class="field">
                  <label>Ваш возраст</label>
                  <input type="number" name="age">
                </div>
                <div class="field">
                  <label>Образование</label>
                  <select class="ui dropdown" name="education">
                    <option value="Среднее">Среднее</option>
                    <option value="Высшее">Высшее</option>
                  </select>
                </div>
                <div class="two fields">
                  <div class="field">
                    <div class="ui floated checkbox">
                      <input type="checkbox" name="isAgree">
                      <label>Я согласен(на) на обработку персональных данных</label>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui floated checkbox">
                      <input type="checkbox" name="isMyChildren">
                      <label>Я подтверждаю, что выбранные дети мои</label>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <!-- FIXME: -->
                  <p style="color: red;">* - После выбора детей, вы уже не сможете изменить их на других, в случае если вы ошиблись</p>
                </div>
                <div class="field">
                  <input type="submit" name="regParentButton" value="Зарегистрироваться" class="ui primary button">
                </div>
              </div>
            </div>
            <div class="eight wide column">
              {foreach from=$studentsByGroup key=group item=student}
                <div class="ui styled accordion">
                  <div class="title">
                    {$group}
                  </div>
                  <div class="content">
                    <table class="ui table bordered">
                      <thead>
                        <tr>
                          <th>
                            <h4>ФИО</h4>
                          </th>
                          <th>
                            <h4>E-mail</h4>
                          </th>
                          <th>
                            <h4>Выбрать</h4>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        {foreach from=$student item=one_student}
                        <tr>
                          <td>{$one_student->getSn()} {$one_student->getFn()} {$one_student->getPt()}</td>
                          <td>{$one_student->getEmail()}</td>
                          <td style="text-align: center">
                            <!-- FIXME: -->
                            <div class="ui floated checkbox">
                              <input type="checkbox" value="{$one_student->getEmail()}" name="childs[]" class="form-control">
                              <label></label>
                            </div>
                            </td>
                          </tr>
                          {/foreach}
                      </tbody>
                    </table>
                  </div>
                </div>
                <br> 
              {/foreach}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

{if $user == NULL}
  {include file='modals/reg_student.tpl'}
  {include file='modals/auth.tpl'}
{/if}

<script type="text/javascript">

  $('.ui.accordion').accordion();

  function checkRegParentForm(form) {
    if (childs.toString() == "") {
      alert("Вы не выбрали ребёнка");
      return false;
    } else {
      return true;
    }
  }

  $(document).ready(function () {

    $("[name='password']").on("change", function(){

      if ($(this).val().length < 6) {
        msger.setHeader("Ошибка ввода данных");
        msger.setContent("Пароль должен иметь длину не менее 6 символов");
        msger.show();
      } else {
        msger.hide();
      }

    });
    
    $("[name='regParentForm']").on("submit", function(){

      var password = $("[name='password']").val();
      var retry_password = $("[name='retry_password']").val();

      if (password === retry_password) {
        msger.hide();
        return true;
      } else {
        msger.setState("negative");
        msger.setHeader("Ошибка ввода данных");
        msger.setContent("Пароли не совпадают");
        msger.show();
      }
      
      return false;
    });
    $('.ui.sticky')
  .sticky({
    context: '#context'
  })
;

  });

</script>
{include file='html/end.tpl'}