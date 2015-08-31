<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse wow fadeInDown ">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Beranda</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	<section id="main-content wow fadeInDown">
		<section class="wrapper">
			<div class="col-lg-6">
				<!--widget start-->
				<section class="panel wow slideInLeft" data-wow-duration="2s">
					<div class="twt-feed blue-bg">
						<h2>Selamat datang</h2>
						<h1><?php echo $this->session->userdata('admin_nama'); ?></h1>
						<p>Level : <?php echo $this->session->userdata('admin_level');?></p>
						<a href="#">
							<img src="<?php echo base_url(); ?>aset/img/profile-avatar.jpg" alt="">
						</a>
					</div>
					<div class="weather-category twt-category">
						<ul>
							<li class="active">
								<h5>320</h5>
								Tweet
							</li>
							<li>
								<h5>1245</h5>
								Following
							</li>
							<li>
								<h5>24657</h5>
								Followers
							</li>
						</ul>
					</div>					
				</section>
				<!--widget end-->
			</div>
			
			<!--state overview start-->
			<div class="row state-overview wow slideInRight" data-wow-duration="2s">
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol terques">
							<i class=" icon-envelope"></i>
						</div>
						<div class="value">
							<h1 class="count">
								0
							</h1>
							<p>Surat Masuk</p>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol red">
							<i class=" icon-envelope"></i>
						</div>
						<div class="value">
							<h1 class=" count2">
								0
							</h1>
							<p>Surat Keluar</p>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol yellow">
							<i class="icon-bell-alt"></i>
						</div>
						<div class="value">
							<h1 class=" count3">
								0
							</h1>
							<p>Proses Perkara</p>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol blue">
							<i class="icon-bell-alt"></i>
						</div>
						<div class="value">
							<h1 class=" count4">
								0
							</h1>
							<p>Proses Penahanan</p>
						</div>
					</section>
				</div>
			</div>
			<!--state overview end-->	
			
			<div class="row">				
				<div class="col-lg-6">
					<!--tab nav start-->
					<section class="panel wow slideInLeft" data-wow-duration="2s">
						<header class="panel-heading tab-bg-dark-navy-blue ">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#disposi">Disposisi</a>
								</li> 
								<li class="">
									<a data-toggle="tab" href="#home">Surat Masuk</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#about">Surat Keluar</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#profile">Posisi Penahanan</a>
								</li>
								<li class="">
									<a data-toggle="tab" href="#contact">Posisi Perkara</a>
								</li>
							</ul>
						</header>
						<div class="panel-body">
							<div class="tab-content">
								<div id="disposisi" class="tab-pane active">
									<table class="table table-hover personal-task">
										<tbody>
											<tr>
												<td>1</td>
												<td>
													Disposisi
												</td>
												<td>
													<span class="badge bg-important">75%</span>
												</td>
												<td>
													<div id="work-progress1"></div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
													Product Delivery
												</td>
												<td>
													<span class="badge bg-success">43%</span>
												</td>
												<td>
													<div id="work-progress2"></div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
													Payment Collection
												</td>
												<td>
													<span class="badge bg-info">67%</span>
												</td>
												<td>
													<div id="work-progress3"></div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
													Work Progress
												</td>
												<td>
													<span class="badge bg-warning">30%</span>
												</td>
												<td>
													<div id="work-progress4"></div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
													Delivery Pending
												</td>
												<td>
													<span class="badge bg-primary">15%</span>
												</td>
												<td>
													<div id="work-progress5"></div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div id="home" class="tab-pane">
									<table class="table table-hover personal-task">
										<tbody>
											<tr>
												<td>1</td>
												<td>
													Surat Masuk
												</td>
												<td>
													<span class="badge bg-important">75%</span>
												</td>
												<td>
													<div id="work-progress1"></div>
												</td>
											</tr>
											<tr>
												<td>2</td>
												<td>
													Product Delivery
												</td>
												<td>
													<span class="badge bg-success">43%</span>
												</td>
												<td>
													<div id="work-progress2"></div>
												</td>
											</tr>
											<tr>
												<td>3</td>
												<td>
													Payment Collection
												</td>
												<td>
													<span class="badge bg-info">67%</span>
												</td>
												<td>
													<div id="work-progress3"></div>
												</td>
											</tr>
											<tr>
												<td>4</td>
												<td>
													Work Progress
												</td>
												<td>
													<span class="badge bg-warning">30%</span>
												</td>
												<td>
													<div id="work-progress4"></div>
												</td>
											</tr>
											<tr>
												<td>5</td>
												<td>
													Delivery Pending
												</td>
												<td>
													<span class="badge bg-primary">15%</span>
												</td>
												<td>
													<div id="work-progress5"></div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div id="about" class="tab-pane"><table class="table table-hover personal-task">
									<tbody>
										<tr>
											<td>1</td>
											<td>
												Surat Keluar
											</td>
											<td>
												<span class="badge bg-important">75%</span>
											</td>
											<td>
												<div id="work-progress1"></div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												Product Delivery
											</td>
											<td>
												<span class="badge bg-success">43%</span>
											</td>
											<td>
												<div id="work-progress2"></div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												Payment Collection
											</td>
											<td>
												<span class="badge bg-info">67%</span>
											</td>
											<td>
												<div id="work-progress3"></div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>
												Work Progress
											</td>
											<td>
												<span class="badge bg-warning">30%</span>
											</td>
											<td>
												<div id="work-progress4"></div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>
												Delivery Pending
											</td>
											<td>
												<span class="badge bg-primary">15%</span>
											</td>
											<td>
												<div id="work-progress5"></div>
											</td>
										</tr>
									</tbody>
								</table></div>
								<div id="profile" class="tab-pane"><table class="table table-hover personal-task">
									<tbody>
										<tr>
											<td>1</td>
											<td>
												Posisi Penahanan
											</td>
											<td>
												<span class="badge bg-important">75%</span>
											</td>
											<td>
												<div id="work-progress1"></div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												Product Delivery
											</td>
											<td>
												<span class="badge bg-success">43%</span>
											</td>
											<td>
												<div id="work-progress2"></div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												Payment Collection
											</td>
											<td>
												<span class="badge bg-info">67%</span>
											</td>
											<td>
												<div id="work-progress3"></div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>
												Work Progress
											</td>
											<td>
												<span class="badge bg-warning">30%</span>
											</td>
											<td>
												<div id="work-progress4"></div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>
												Delivery Pending
											</td>
											<td>
												<span class="badge bg-primary">15%</span>
											</td>
											<td>
												<div id="work-progress5"></div>
											</td>
										</tr>
									</tbody>
								</table></div>
								<div id="contact" class="tab-pane"><table class="table table-hover personal-task">
									<tbody>
										<tr>
											<td>1</td>
											<td>
												Posisi Perkara
											</td>
											<td>
												<span class="badge bg-important">75%</span>
											</td>
											<td>
												<div id="work-progress1"></div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												Product Delivery
											</td>
											<td>
												<span class="badge bg-success">43%</span>
											</td>
											<td>
												<div id="work-progress2"></div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												Payment Collection
											</td>
											<td>
												<span class="badge bg-info">67%</span>
											</td>
											<td>
												<div id="work-progress3"></div>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>
												Work Progress
											</td>
											<td>
												<span class="badge bg-warning">30%</span>
											</td>
											<td>
												<div id="work-progress4"></div>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>
												Delivery Pending
											</td>
											<td>
												<span class="badge bg-primary">15%</span>
											</td>
											<td>
												<div id="work-progress5"></div>
											</td>
										</tr>
									</tbody>
								</table></div>
							</div>
						</div>
					</section>
					<!--tab nav start-->
				</div>
				
				<div class="col-lg-6">
					<!--Grafik Rekapitulasi-->
					<div id="grafik" class="wow slideInRight" data-wow-duration="2s" ></div>
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-lg-12">
					<!--timeline start-->
					<section class="panel wow slideInLeft" data-wow-duration="3s">
						<header class="panel-heading">
							Jadwal Sidang
							<span class="tools pull-right">
                                <a class="icon-chevron-down" href="javascript:;"></a>
                                <a class="icon-remove" href="javascript:;"></a>
							</span>
						</header>
						<div class="panel-body">
							<div class="timeline">
								<article class="timeline-item">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow"></span>
												<span class="timeline-icon red"></span>
												<span class="timeline-date">08:25 am</span>
												<h1 class="red">12 July | Sunday</h1>
												<p>Lorem ipsum dolor sit amet consiquest dio</p>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item alt">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow-alt"></span>
												<span class="timeline-icon green"></span>
												<span class="timeline-date">10:00 am</span>
												<h1 class="green">10 July | Wednesday</h1>
												<p><a href="#">Jonathan Smith</a> added new milestone <span><a href="#" class="green">ERP</a></span></p>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow"></span>
												<span class="timeline-icon blue"></span>
												<span class="timeline-date">11:35 am</span>
												<h1 class="blue">05 July | Monday</h1>
												<p><a href="#">Anjelina Joli</a> added new album <span><a href="#" class="blue">PARTY TIME</a></span></p>
												<div class="album">
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-1.jpg">
													</a>
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-2.jpg">
													</a>
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-3.jpg">
													</a>
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-1.jpg">
													</a>
													<a href="#">
														<img alt="" src="<?php echo base_url(); ?>aset/img/sm-img-2.jpg">
													</a>
												</div>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item alt">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow-alt"></span>
												<span class="timeline-icon purple"></span>
												<span class="timeline-date">3:20 pm</span>
												<h1 class="purple">29 June | Saturday</h1>
												<p>Lorem ipsum dolor sit amet consiquest dio</p>
												<div class="notification">
													<i class=" icon-exclamation-sign"></i> New task added for <a href="#">Denial Collins</a>
												</div>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow"></span>
												<span class="timeline-icon light-green"></span>
												<span class="timeline-date">07:49 pm</span>
												<h1 class="light-green">10 June | Friday</h1>
												<p><a href="#">Jonatha Smith</a> added new milestone <span><a href="#" class="light-green">prank</a></span> Lorem ipsum dolor sit amet consiquest dio</p>
											</div>
										</div>
									</div>
								</article>
							</div>
							
							<div class="clearfix">&nbsp;</div>
						</div>
					</section>
					<!--timeline end-->
				</div>
				
			</div>
			
		</section>
	</section>
</div>
<script type="text/javascript">
	
	$(document).ready(function () {
		
		
		$(function () {
			$('#grafik').highcharts({
				title: {
					text: 'Grafik Rekapitulasi',
					x: -20 //center
				},
				subtitle: {
					text: 'Tahun 2015',
					x: -20
				},
				xAxis: {
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
					'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
				},
				yAxis: {
					title: {
						text: 'Jumlah'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' data'
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series: [{
					name: 'Surat Masuk',
					data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
					}, {
					name: 'Surat Keluar',
				data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
				}, {
				name: 'Proses Perkara',
				data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
				}, {
				name: 'Proses Penahanan',
				data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
				}]
				});
				});
				});
				</script>
				<?php $this->load->view('admin/notifikasi/notifikasi'); ?>				