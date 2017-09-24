{assign var=title value="Личный кабинет"}
{include file="html/begin.tpl"}
  <div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
				{include file='blocks/user_menu.tpl'}
			</div>
			<div class="thirteen wide column">
        <div class="ui stackble grid">
          <div class="ten wide column">
            {if $childs != NULL}
              {foreach from=$childs item=child}
                <div class="ui styled accordion">
                  <div class="active title">
                    {$child['student']->getSn()} {$child['student']->getFn()} {$child['student']->getPt()}
                  </div>
                  <div class="active content">
                    <table class="ui table">
                      <tbody>
                        <tr>
                          <td>Email</td>
                          <td><a href="mailto:{$child['student']->getEmail()}">{$child['student']->getEmail()}</a></td>
                        </tr>
                        <tr>
                          <td>Группа</td>
                          <td>{$child['student']->getGroup()->getNumberGroup()}</td>
                        </tr>
                        <tr>
                          <td>Телефон</td>
                          <td>{$child['student']->getCellPhone()}</td>
                        </tr>
                        <tr>
                          <td>Адрес</td>
                          <td>{$child['student']->getHomeAddress()}</td>
                        </tr>
                        <tr>
                          <td>Специальность</td>
                          <td>{$child['student']->getGroup()->getSpec()->getDescription()}</td>
                        </tr>
                        <tr>
                          <td>Код специальности</td>
                          <td>{$child['student']->getGroup()->getSpec()->getCode()}</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="accrodion">
                      <div class="title">
                        Результаты тестирования
                      </div>
                      <div class="content">
                        {if $child['tests'] != NULL}
                          <table class="ui table striped">
                            <thead>
                              <tr>
                                <th>Название теста</th>
                                <th>Предмет</th>
                                <th>Оценка</th>
                              </tr>                                        
                            </thead>
                            <tbody>
                              {foreach from=$child['tests'] item=test}
                                <tr>
                                  <td>{$test->getCaption()}</td>
                                  <td>{$test->getSubject()}</td>
                                  <td>{$test->getMark()}</td>
                                </tr>
                              {/foreach}
                            </tbody>
                          </table>
                        {else}
                          <h3>Результатов тестирования нет</h3>
                        {/if}
                      </div>
                    </div>
                    <div class="accrodion">
                      <div class="title">
                        Посещаемость
                      </div>
                      <div class="content">
                        {if $child['traffic'] != NULL}
                          <table class="ui table striped">
                            <thead>
                              <tr>
                                <th>Дата</th>
                                <th>Всего пар</th>
                                <th>Посещено</th>
                                <th>Пропущено</th>
                              </tr>
                            </thead>
                            <tbody>
                              {foreach from=$child['traffic'] item=traffic_entry}
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
                          <h3>Похоже, что ваш ребёнок вообще не посещали колледж...</h3>
                        {/if}
                      </div>
                    </div>
                  </div>
                </div>
              {/foreach}
						{/if}
          </div>
          <div class="six wide column">
            <table class="ui table">
              <thead>
                <tr>
                  <th colspan="2"><h4>Обо мне</h4></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><div class="ui ribbon label">Фамилия</div></td>
                  <td>{$user->getSn()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Имя</div></td>
                  <td>{$user->getFn()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Отчество</div></td>
                  <td>{$user->getPt()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Email</div></td>
                  <td>{$user->getEmail()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Возраст</div></td>
                  <td>{$user->getAge()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Домашний телефон</div></td>
                  <td>{$user->getHomePhone()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Сотовый телефон</div></td>
                  <td>{$user->getCellPhone()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Место работы</div></td>
                  <td>{$user->getWorkPlace()}</td>
                </tr>
                <tr>
                  <td><div class="ui ribbon label">Должность</div></td>
                  <td>{$user->getPost()}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    
		$('.ui.accordion').accordion();
  
  </script>
{include file="html/end.tpl"}