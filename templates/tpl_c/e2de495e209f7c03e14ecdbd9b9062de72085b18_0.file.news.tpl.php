<?php
/* Smarty version 3.1.29, created on 2016-12-06 23:46:11
  from "C:\OpenServer\domains\edukit.mgkit\templates\tpl\guest\news.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58472393538ca8_65052865',
  'file_dependency' => 
  array (
    'e2de495e209f7c03e14ecdbd9b9062de72085b18' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\templates\\tpl\\guest\\news.tpl',
      1 => 1481057168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:guest/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_58472393538ca8_65052865 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Новости", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
						<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:guest/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</header>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div id="content" class="container">
						<div id="news" class="col-md-9">
							<aside class="date">
								<h3><time>19.11.2016</time></h3>
								<aside class="oneNews">
									<header>
										<h1>Cpation</h1>
									</header>
									<article>
										<p>Сегодня колледж — это многопрофильное учебное заведение, обладающее высоким административным и педагогическим ресурсом, позволяющим готовить высококлассных специалистов в области IT-технологий, рекламы и земельно-имущественных отношений, гармонично развитых личностей, грамотных конкурентоспособных на рынке труда специалистов. Контингент студентов насчитывает свыше 1000 человек, профессорско-преподавательский состав — свыше 60 человек.</p>
									</article>
								</aside>
								<aside class="oneNews">
									<header>
										<h1>Cpation</h1>
									</header>
									<article>
										<p>Сегодня колледж — это многопрофильное учебное заведение, обладающее высоким административным и педагогическим ресурсом, позволяющим готовить высококлассных специалистов в области IT-технологий, рекламы и земельно-имущественных отношений, гармонично развитых личностей, грамотных конкурентоспособных на рынке труда специалистов. Контингент студентов насчитывает свыше 1000 человек, профессорско-преподавательский состав — свыше 60 человек.</p>
									</article>
								</aside>
							</aside>
							<aside class="date">
								<h3><time>20.11.2016</time></h3>
								<aside class="oneNews">
									<header>
										<h1>Cpation</h1>
									</header>
									<article>
										<p>Сегодня колледж — это многопрофильное учебное заведение, обладающее высоким административным и педагогическим ресурсом, позволяющим готовить высококлассных специалистов в области IT-технологий, рекламы и земельно-имущественных отношений, гармонично развитых личностей, грамотных конкурентоспособных на рынке труда специалистов. Контингент студентов насчитывает свыше 1000 человек, профессорско-преподавательский состав — свыше 60 человек.</p>
									</article>
								</aside>
								<aside class="oneNews">
									<header>
										<h1>Cpation</h1>
									</header>
									<article>
										<p>Сегодня колледж — это многопрофильное учебное заведение, обладающее высоким административным и педагогическим ресурсом, позволяющим готовить высококлассных специалистов в области IT-технологий, рекламы и земельно-имущественных отношений, гармонично развитых личностей, грамотных конкурентоспособных на рынке труда специалистов. Контингент студентов насчитывает свыше 1000 человек, профессорско-преподавательский состав — свыше 60 человек.</p>
									</article>
								</aside>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Scripts -->
		
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
