{assign var="title" value="Новости"}
{include file='html/begin.tpl'}
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<header id="header" class="container">
						<div id="logoDiv" class="col-md-4">
							<figure>
								<img src="img/ukit.png" alt="">
								<figcaption></figcaption>
							</figure>
						</div>
						{include file='users/menu.tpl'}
					</header>
				</div>
			</div>
			<hr>
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
											<article>
												<p>{$one_news->getContent()}</p>
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
		
		<!-- Scripts -->
		
{include file='html/end.tpl'}