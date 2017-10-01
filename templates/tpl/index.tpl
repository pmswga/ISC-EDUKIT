{assign var="title" value="Информационно-образовательный портал"}
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
        <h1>Добро пожаловать</h1>
        <hr>
        
      </div>
    </div>
  </div>

  {if $user == NULL}
    {include file='modals/reg_student.tpl'}
    {include file='modals/auth.tpl'}
  {/if}
  
{include file='html/end.tpl'}