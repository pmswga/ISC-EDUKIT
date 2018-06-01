{assign var="title" value="EDUKIT | Посещаемость"}
{include file="html/begin.tpl"}
  <div class="ui tow columns internally celled grid">
    <div class="row">
      <div class="two wide column">
        {include file="html/menu.tpl"}
      </div>
      <div class="fourteen wide column">
        {if $studentsByGroup != NULL}
          <form name="" method="POST" class="ui form">
            <div classs="field">
              <select name="student" class="ui fluid">
                  <option>Не выбран</option>
                  {foreach from=$studentsByGroup key=group item=student}
                    <optgroup label="{$group}">
                        {foreach from=$student item=one_student}
                          <option>{$one_student->getSn()} {$one_student->getFn()} {$one_student->getPt()}</option>
                        {/foreach}
                    </optgroup>
                  {/foreach}
              </select>
            </div>
            <br>
            <div class="field">
              <input type="submit" name="selectStudent" value="Выбрать" class="ui fluid primary button">
            </div>
            <div class="field">
              <fieldset>
                <legend>Посещаемость студента</legend>
                <div id="student_traffic">
                  {if $traffic != NULL}
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th>Дата</th>
                          <th>Всего пар</th>
                          <th>Посещено</th>
                          <th>Пропущено</th>
                        </tr>
                        {foreach from=$traffic item=traffic_entry}
                        <tr>
                          <td>{$traffic_entry['date_visit']|date_format:'d.m.Y'}</td>
                          <td>{$traffic_entry['count_all_hours']/2}</td>
                          <td>{$traffic_entry['count_passed_hours']/2}</td>
                          <td>{($traffic_entry['count_all_hours']-$traffic_entry['count_passed_hours'])/2}</td>
                        </tr>
                        {/foreach}
                      </tbody>
                    </table>
                  {else}
                    <h3 align="center">Выберете студента, чтобы просмотреть его посещаемость</h3>
                  {/if}
                </div>
              </fieldset>
            </div>
          </form>
        {else}
          <h3 align="center">Студенты не зарегистрированы</h3>
        {/if}
      </div>
    </div>
  </div>
{include file="html/end.tpl"}