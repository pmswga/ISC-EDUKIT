{assign var="title" value="Расписание"}
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
						{include file='guest/menu.tpl'}
					</header>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="container">
						<div id="rings" class="col-md-4">
							<h2>Расписание</h2>
							<nav id="nowDay" class="text-center">
								<ul class="pagination pagination-sm">
									<li id="1"><a>ПН</a></li>
									<li id="2"><a>ВТ</a></li>
									<li id="3"><a>СР</a></li>
									<li id="4"><a>ЧТ</a></li>
									<li id="5"><a>ПТ</a></li>
									<li id="6"><a>СБ</a></li>
									<li id="7"><a>ВС</a></li>
								</ul>
							</nav>
							<table id="schedule_rings" class="table table-bordered">
								<thead>
									<td colspan="2"><h4>Звонки</h4></td>
								</thead>
								<tr>
									<th>1 пара</th>
									<td>8:30 - 10:00</td>
								</tr>
								<tr>
									<th>2 пара</th>
									<td>10:10 - 11:40</td>
								</tr>
								<tr>
									<th>3 пара</th>
									<td>11:50 - 13:40</td>
								</tr>
								<tr>
									<th>4 пара</th>
									<td>13:50 - 15:20</td>
								</tr>
								<tr>
									<th>5 пара</th>
									<td>15:30 - 17:00</td>
								</tr>
								<tr>
									<th>6 пара</th>
									<td>17:10 - 18:30</td>
								</tr>
								<tr>
									<th>7 пара</th>
									<td>18:35 - 20:00</td>
								</tr>
							</table>
							<table id="schedule_lunchs" class="table table-bordered">
								<thead>
								   <td colspan="2"><h4>Обеды</h4></td>
								</thead>
								<tr>
									<td>1 смена (11:40 - 12:10) </td>
									<td> 1, 2 этаж старого здания</td>
								</tr>
								<tr>
									<td>2 смена (12:30 - 12:50) </td>
									<td> 1 этаж нового здания, 3 этаж старого здания</td>
								</tr>
								<tr>
									<td>3 смена (13:20 - 13:40) </td>
									<td> 3, 4 этаж нового здания</td>
								</tr>
							</table>
						</div>
						<div id="news" class="col-md-8">
							<table id="schedule_lunchs" class="table table-hover">
								<thead>
								   <td colspan="2"><h2>Занятия</h2></td>
								</thead>
								<tr>
									<td>
										<table>
											<thead>
												<h3>1 Курс</h3>
											</thead>
											<tr>
												<td>
													<table class="table table-bordered">
														<tr>
															<td>Пара</td>
															<td>101</td>
															<td>102</td>
															<td>103</td>
															<td>104</td>
															<td>105</td>
															<td>106</td>
														</tr>
														<tr>
															<td>1</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>3</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table>
											<thead>
												<h3>2 Курс</h3>
											</thead>
											<tr>
												<td>
													<table class="table table-bordered">
														<tr>
															<td>Пара</td>
															<td>201</td>
															<td>203</td>
															<td>204</td>
															<td>205</td>
															<td>206</td>
															<td>207</td>
														</tr>
														<tr>
															<td>1</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>3</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table>
											<thead>
												<h3>3 Курс</h3>
											</thead>
											<tr>
												<td>
													<table class="table table-bordered">
														<tr>
															<td>Пара</td>
															<td>301</td>
															<td>302</td>
															<td>303</td>
															<td>304</td>
															<td>305</td>
															<td>306</td>
														</tr>
														<tr>
															<td>1</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>3</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table>
											<thead>
												<h3>4 Курс</h3>
											</thead>
											<tr>
												<td>
													<table class="table table-bordered">
														<tr>
															<td>Пара</td>
															<td>401</td>
															<td>402</td>
															<td>403</td>
															<td>404</td>
															<td>405</td>
															<td>406</td>
														</tr>
														<tr>
															<td>1</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>2</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
														<tr>
															<td>3</td>
															<td>Физ-ра</td>
															<td>Обществознание</td>
															<td>История</td>
															<td></td>
															<td>Физика</td>
															<td></td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Scripts -->
		
		<script type="text/javascript">
			/*!
				Скрипт для определения дня недели
			*/
		
			var date = new Date;
			var day = date.getDay();
			if(day != 0) document.getElementById(day).setAttribute("class", "active");
			else  document.getElementById("7").setAttribute("class", "active");
		</script>
{include file='html/end.tpl'}