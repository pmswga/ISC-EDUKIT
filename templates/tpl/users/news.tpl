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
						{foreach from=$news item=one}
						<div id="news" class="col-md-9">
							<aside class="date">
								<aside class="oneNews">
									<header>
										<h1>{$one['caption']}</h1>
									</header>
									<article>
										<p>{$one['content']}</p>
									</article>
									<hr>
									<time>{$one['date_publication']|date_format:"%d/%m/%Y"}</time>
								</aside>
							</aside>
						</div>
						{/foreach}
					</div>
				</div>
			</div>
		</div>
		
		<!-- Scripts -->
		
{include file='html/end.tpl'}