<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <head>
		<title>.:: SIAPRA (Sistem Informasi Administrasi dan Penanganan Perkara) ::.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<style type="text/css">
			@font-face {
			font-family: 'Cabin';
			font-style: normal;
			font-weight: 400;
			src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo base_url(); ?>aset/font/satu.woff) format('woff');
			}
			@font-face {
			font-family: 'Cabin';
			font-style: normal;
			font-weight: 700;
			src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo base_url(); ?>aset/font/dua.woff) format('woff');
			}
			@font-face {
			font-family: 'Lobster';
			font-style: normal;
			font-weight: 400;
			src: local('Lobster'), url(<?php echo base_url(); ?>aset/font/tiga.woff) format('woff');
			}	
			
		</style>
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap-reset.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/animate.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/style.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/js/jquery/jquery-ui-1.10.1.custom.css" />	
		<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/step.css" media="screen">
		<link href="<?php echo base_url(); ?>aset/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>aset/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>aset/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
			<script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url(); ?>aset/js/jquery.js"></script>		
		<script src="<?php echo base_url(); ?>aset/js/jquery-1.11.1.min.js"></script>		
		<script src="<?php echo base_url(); ?>aset/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>aset/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>aset/js/jquery/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>aset/js/loading.js"></script>
		<script src="<?php echo base_url(); ?>aset/js/bootswatch.js"></script>
		<script src="<?php echo base_url(); ?>aset/js/step.js"></script>
		<script src="<?php echo base_url(); ?>aset/js/bootstrap-tooltip.js"></script>
		<script src="<?php echo base_url() ?>aset/js/wow.min.js"></script>
		<script src="<?php echo base_url(); ?>aset/css/vertical-timeline/js/main.js"></script> <!-- Resource jQuery -->
		<script src="<?php echo base_url(); ?>aset/css/vertical-timeline/js/modernizr.js"></script> <!-- Modernizr -->
		
		
		
		<script type="text/javascript">
			// <![CDATA[
			$(document).ready(function () {
				new WOW().init();
				$(function () {
					$( "#kode_surat_masuk" ).autocomplete({
						source: function(request, response) {
							$.ajax({ 
								url: "<?php echo site_url('klasifikasi_surat/get_klasifikasi'); ?>",
								data: { kode: $("#kode_surat_masuk").val()},
								dataType: "json",
								type: "POST",
								success: function(data){
									response(data);
								}    
							});
						},
					});
				});
				
				$(function () {
					$( "#kode_surat" ).autocomplete({
						source: function(request, response) {
							$.ajax({ 
								url: "<?php echo site_url('klasifikasi_surat/get_klasifikasi'); ?>",
								data: { kode: $("#kode_surat").val()},
								dataType: "json",
								type: "POST",
								success: function(data){
									response(data);
								}    
							});
						},
					});
				});
				
				$(function () {
					$( "#getAgenda" ).autocomplete({
						source: function(request, response) {
							$.ajax({ 
								url: "<?php echo site_url('klasifikasi_surat/get_agenda'); ?>",
								data: { getAgenda: $("#getAgenda").val(),tanggal_perkara: $("#tanggal_perkara").val()},
								dataType: "json",
								type: "POST",
								success: function(data){
									response(data);
								}    
							});
						},
					});
				});
				
				$(function () {
					$( "#dari" ).autocomplete({
						source: function(request, response) {
							$.ajax({ 
								url: "<?php echo site_url('klasifikasi_surat/get_instansi_lain'); ?>",
								data: { kode: $("#dari").val()},
								dataType: "json",
								type: "POST",
								success: function(data){
									response(data);
								}    
							});
						},
					});
				});
				
				
				$(function() {
					$( "#tgl_surat" ).datepicker({
						changeMonth: true,
						changeYear: true,
						dateFormat: 'yy-mm-dd'
					});
				});
			});
			// ]]>
		</script>
		
	</head>
	
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<span class="navbar-brand"><strong style="font-family: verdana;">SIAPRA</strong></span>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">	
						<li><a href="<?php echo base_url(); ?>admin"><i class="icon-home icon-white"> </i> Beranda</a></li>
						<div class="nav notify-row" id="top_menu">
							<!--  notification start -->
							<ul class="nav top-menu">              
								<!-- notification dropdown start-->
								<li id="header_notification_bar" class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">
										
										<i class="icon-envelope icon-white"></i>
										<span class="badge bg-important">7</span>
									</a>
									<ul class="dropdown-menu extended notification">
										<div class="notify-arrow notify-arrow-red"></div>
										<li>
											<p class="red">You have 7 new notifications</p>
										</li>
										<li>
											<a href="#">
												<span class="label label-danger"><i class="icon-bolt"></i></span>
												Server #3 overloaded.
												<span class="small italic">34 mins</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="label label-warning"><i class="icon-bell"></i></span>
												Server #10 not respoding.
												<span class="small italic">1 Hours</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="label label-danger"><i class="icon-bolt"></i></span>
												Database overloaded 24%.
												<span class="small italic">4 hrs</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="label label-success"><i class="icon-plus"></i></span>
												New user registered.
												<span class="small italic">Just now</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="label label-info"><i class="icon-bullhorn"></i></span>
												Application error.
												<span class="small italic">10 mins</span>
											</a>
										</li>
										<li>
											<a href="#">See all notifications</a>
										</li>
									</ul>
								</li>
								<!-- notification dropdown end -->
							</ul>
						</div>
						
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-th-list icon-white"> </i> Referensi <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1" href="<?php echo base_url(); ?>klasifikasi_surat/klas_surat">Klasifikasi Surat</a></li>
								<li><a tabindex="-1" href="<?php echo base_url(); ?>jaksa/olah_jaksa">Jaksa</a></li>
							</ul>
						</li>
						
						
						
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-random icon-white"> </i> Manajemen Surat <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1" href="<?php echo base_url(); ?>surat_masuk/masuk">Surat Masuk</a></li>
								<li><a tabindex="-1" href="<?php echo base_url(); ?>surat_keluar/keluar">Surat Keluar</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-briefcase icon-white"> </i> Manajemen Perkara <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1"  href="<?php echo base_url(); ?>manajemen_perkara/perkara">Perkara & Penahanan </a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-file icon-white"> </i> Laporan<span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1" href="<?php echo base_url(); ?>agenda/agenda_surat_masuk"> Surat Masuk</a></li>
								<li><a tabindex="-1" href="<?php echo base_url(); ?>agenda/agenda_surat_keluar"> Surat Keluar</a></li>
								<li><a tabindex="-1" href="<?php echo base_url(); ?>agenda/agenda_jaksa">Data Jaksa</a></li>
							</ul>
						</li>
						
						<?php
							if ($this->session->userdata('admin_id_level') == "1") {
							?>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-wrench icon-white"> </i> Pengaturan <span class="caret"></span></a>
								<ul class="dropdown-menu" aria-labelledby="themes">
									<li><a tabindex="-1" href="<?php echo base_url(); ?>pengaturan/pengguna">Instansi Pengguna</a></li>
									<li><a tabindex="-1" href="<?php echo base_url(); ?>pengaturan/manage_admin">Manajemen Admin</a></li>
								</ul>
							</li>
							<?php 
							}
						?>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-user icon-white"></i> <?php echo $this->session->userdata('admin_nama'); ?> <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1" href="<?php echo base_url(); ?>pengaturan/passwod">Ubah Password</a></li>
								<li><a tabindex="-1" href="<?php echo base_url(); ?>logins/logout">Logout</a></li>
								<li><a tabindex="-1"  data-toggle="modal" href="#help">Help</a></li>
							</ul>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
		<?php $this->load->view('admin/help/help'); ?>
		<?php 
			$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		?>
		<div class="container">
			<div class="wrap">
				<div class="page-header animated fadeIn" data-wow-duration="2s" id="banner">
					<div class="row">
						<div class="" style="padding: 15px 15px 0 15px;">
							<div class="well well-sm">
								<img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
								<h2 style="margin: 15px 0 10px 0; color: #000;"><?php echo $q_instansi->nama; ?></h2>
								<div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : <?php echo $q_instansi->alamat; ?></b></div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- DINAMIC CONTENT PAGE-->				
				<?php $this->load->view('admin/'.$page); ?>	
				<!-- END DINAMIC CONTENT PAGE-->				
				
			</div>
		</div>
		<div class="footer">
			<h4 style="font-weight: bold">Proyek Perubahan Diklatpim IV - Sulta </h4>
			<h6>&copy;  2015. Waktu Eksekusi : {elapsed_time}, Penggunaan Memori : {memory_usage}</h6>
			<a href="#" class="go-top">
				<i class="icon-angle-up"></i>
			</a>
		</div>
		
	</body>
	<script src="<?php echo base_url(); ?>aset/js/common-scripts.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>aset/js/jquery.dcjqaccordion.2.7.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>aset/js/owl.carousel.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>aset/js/count.js" type="text/javascript"></script>
	
	<script src="<?php echo base_url(); ?>aset/js/highcharts.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>aset/js/exporting.js" type="text/javascript"></script>
	
	<!--common script for all pages-->
	
	<!--script for this page only-->
	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example').dataTable( {
				"aaSorting": [[ 1, "asc" ]]
			} );
		} );
	</script>
	
	<!--main content end-->
	
	
	<script type="text/javascript" src="<?php echo base_url(); ?>aset/data-tables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>aset/data-tables/DT_bootstrap.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(" #alert" ).fadeOut(5000);
		});
	</script>
	
</html>