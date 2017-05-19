{assign var="title" value="Преподаватели"}
{include file='html/begin.tpl'}
		<div class="container-fluid">
			{include file='users/menu.tpl'}
			<div class="row">
				<div id="content" class="col-md-12">
					<div id="teachers">
            {if $teachers != NULL}
              {foreach from=$teachers item=teacher}
                <figure class="teacher">
                  <img width="250" src="img/people.jpg" alt="">
                  <!-- <img src="http://placehold.it/250" alt=""> -->
                  <figcaption>{$teacher->getSn()} {$teacher->getFn()} {$teacher->getPt()}</figcaption>
                </figure>
              {/foreach}
            {else}
              <h2>Преподаватели ещё не зарегистрированны</h2>
            {/if}
					</div>
				</div>
			</div>
		</div>
{include file='html/end.tpl'}