<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/style.css" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
		<script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
	<![endif]-->
    <script src="<?php echo base_url(); ?>aset/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>aset/js/bootswatch.js"></script>
   <body style="">
		<!--<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
			<div class="navbar-header">
			<span class="navbar-brand judul">.:: SIAPRA (Sistem Informasi Administrasi dan Penanganan Perkara) ::.</span>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
			</button>
			</div>
			
			</div>
		</div>-->
		
		<?php 
			$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
		?>
		<div class="container">
			
			<div class="container-fluid" style="margin-top: 30px">
				
				<div class="row-fluid">
					<div style="width: 800px; margin: 0 auto; text-align:center">
						<div class="well well-sm wow fadeInDown">
							<h3>SELAMAT DATANG </h3>
							<h4>.:: SIAPRA (Sistem Informasi Administrasi dan Penanganan Perkara) ::.</h4>
						</div>
					</div>
					<div style="width: 400px; margin: 0 auto;">
						<div class="well well-sm">
							<img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 80px; height: 80px">
							<h3 style="margin: 5px 0 0.4em 0; font-size: 21px; color: #000; font-weight: bold"><?php echo $q_instansi->nama; ?></h3>
							<div style="color: #000; font-size: 13px" class="clearfix"><?php echo $q_instansi->alamat; ?></div>
						</div>
					</div>
					
					<div class="login animated flipInX">
						<form action="<?php echo base_URL(); ?>logins/do_login" method="post">
							<div class="headerLogin">Silakan Login</div>	
							<?php echo $this->session->flashdata("k"); ?>
							<table align="center" style="margin-bottom: 0" class="table-form" width="90%">
								<tr><td width="40%">Username</td><td><input type="text" autofocus name="u" required style="width: 200px" autofocus class="form-control"></td></tr>
								<tr><td>Password</td><td><input type="password" name="p" required style="width: 200px" class="form-control"></td></tr>
								<tr><td>Tahun</td><td><select name="ta" class="form-control" required><option value="">--</option>
									<?php 
										for ($i = 2012; $i <= (date('Y')); $i++) {
											if (date('Y') == $i) {
												echo "<option value='$i' selected>$i</option>";
												} else {
												echo "<option value='$i'>$i</option>";
											}
										}
									?>
								</select>
								</td></tr>
								<tr>
									<td></td>
									<td><input type="submit" class="btn btn-success" value="Login"></td>
								</tr>
								
							</table>
							
						</form>
					</div><!--/span-->
				</div><!--/row-->
				
			</div><!--/.fluid-container-->
			<br/>
			<center style="margin-top: -15px;">Proyek Perubahan Diklatpim IV - Sulta <br>
				<span> Developed by Ratih Pujihati dan Riza Fauzi Rahman</span>
			</center>
			
			<script type="text/javascript">
				$(document).ready(function(){
					$(" #alert" ).fadeOut(3000);
					 new WOW().init();
				});
			</script>
			
			
		</div>
		
	</body></html>