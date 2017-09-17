{assign var="title" value="Новости"}
{include file='html/begin.tpl'}
		<div class="container-fluid">
      
      {if $user != NULL}
        {include file='blocks/user_menu.tpl'}
      {else}
        {include file='blocks/guest_menu.tpl'}
      {/if}
    
			<div class="row">
				<div class="col-md-12">
					<div id="content" class="container">
						{foreach from=$newsByDate key=date item=news}
							<div id="news" class="col-md-9">
								<aside class="date">
									<h3><datetime>{$date|date_format:"%d.%m.%Y"}</datetime></h3>
									{foreach from=$news item=one_news}
										<aside class="oneNews">
											<header>
												<h1>{$one_news->getCaption()}</h1>
											</header>
											<article style="padding: 25px;">
												{nocache}
													{$one_news->getContent()|truncate:500}
												{/nocache}
											</article>
											<hr>
											<p>Автор: {$one_news->getAuthor()}</p>
										</aside>
									{/foreach}
								</aside>
							</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>
    
    {if $user == NULL}
      {include file='modals/reg_student.tpl'}
      {include file='modals/auth.tpl'}
    {/if}
{include file='html/end.tpl'}