{assign var="title" value="Новости"}
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
				<div class="ui stackable grid">
					<div class="two wide column"></div>
					<div class="twelve wide column">
						{foreach from=$news item=one_news}
							<div class="ui card" style="width: 100%;">
								<div class="content">
									<div class="header">
										{$one_news->getCaption()}
									</div>
									<div class="meta">
										{$one_news->getDatePublication()|date_format:"d.m.Y"} 
									</div>
									<div class="description">
										{$one_news->getContent()}
									</div>
									<hr>
									<div class="meta">
											Автор: <u><i>{$one_news->getAuthor()}</i></u>
									</div>
								</div>
							</div>
						{/foreach}
					</div>
					<div class="two wide column"></div>
				</div>
      </div>
    </div>
	</div>
	
	{if $user == NULL}
		{include file='modals/reg_student.tpl'}
		{include file='modals/auth.tpl'}
	{/if}
	
{include file='html/end.tpl'}