{assign var="title" value="Преподаватели"}
{include file='html/begin.tpl'}
  <div class="ui stackable grid">
    <div class="row">
      <div class="three wide column">
          {if $user != NULL}
            {include file='blocks/user_menu.tpl'}  
          {else}
            {include file='blocks/guest_menu.tpl'}
          {/if}
      </div>
      <div class="thirteen wide column">
        {if $teachers != NULL}
          <div id="teachers" class="ui link cards">
            {foreach from=$teachers item=teacher}
                <div class="card">
                  <div class="content">
                    <div class="header">{$teacher->getSn()} {$teacher->getFn()} {$teacher->getPt()}</div>
                    <div class="meta">
                      <a>Преподаватель</a>
                    </div>
                    <div class="description">
                      {$teacher->getInfo()}
                      <br>
                      <br>
                      {if $teacher->getSubjects() != NULL}
                        {foreach from=$teacher->getSubjects() item=subject}
                          <a class="ui tag label">{$subject->getDescription()}</a>
                          <br><br>
                        {/foreach}
                      {/if}
                    </div>
                  </div>
                </div>
            {/foreach}
          </div>
        {/if}
      </div>
    </div>
  </div>

  {if $user == NULL}
    {include file='modals/reg_student.tpl'}
    {include file='modals/auth.tpl'}
  {/if}
{include file='html/end.tpl'}