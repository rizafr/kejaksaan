<?php include "jam.php" ?>
<!DOCTYPE html>
<html lang="en"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>
		SIAPRA - Daftar Sidang Perkara Hari ini
	</title>
	<meta charset="UTF-8">
	<link rel="icon" href="">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">    
	<link rel="stylesheet" href="<?php echo base_url(); ?>aset/sidang/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>aset/sidang/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>aset/sidang/font-awesome.css">
	<script src="<?php echo base_url(); ?>aset/sidang/jquery.js"></script>		
	<script src="<?php echo base_url(); ?>aset/sidang/jquery-1.11.3.min.js"></script>		
	
	<style type="text/css">
		#loading{
		display:none;
		position:fixed;
		top:50%;
		left:50%;
		margin:-35px 0px 0px -35px;
		
		width:70px;
		height:70px;
		z-index:999;
		opacity:0.7;
		-moz-border-radius:10px;
		-webkit-border-radius:10px;
		border-radius:10px;
		
		opacity:0;  /* make things invisible upon start */
		animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
		
		animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
		
		animation-duration:1s;
		animation-delay: 1.5s
		}
		
		/* make keyframes that tell the start state and the end state of our object */
		@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		
		.fade-in {
		opacity:0;  /* make things invisible upon start */
		-webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
		-moz-animation:fadeIn ease-in 1;
		animation:fadeIn ease-in 1;
		
		-webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
		-moz-animation-fill-mode:forwards;
		animation-fill-mode:forwards;
		
		-webkit-animation-duration:1s;
		-moz-animation-duration:1s;
		animation-duration:1s;
		}
		
		.fade-in.one {
		-webkit-animation-delay: 0.7s;
		-moz-animation-delay: 0.7s;
		animation-delay: 0.7s;
		}
		
		.fade-in.two {
		-webkit-animation-delay: 1.2s;
		-moz-animation-delay:1.2s;
		animation-delay: 1.2s;
		}
		
		.fade-in.three {
		-webkit-animation-delay: 1.6s;
		-moz-animation-delay: 1.6s;
		animation-delay: 1.6s;
		}
		.content{
		opacity:0;  /* make things invisible upon start */
		animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
		
		animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
		
		animation-duration:1s;
		animation-delay: 1s
		
		}
		.jam{
		padding-top: 15px;
		color: #fff;
		}
		
		
	</style>
	
	<script>
		(function ($)
		{
			$(document).ready(function ()
			{
				$.ajaxSetup(
				{
					cache: false,
					beforeSend: function () {
						$('#content').hide();
						$('#loading').show();
					},
					complete: function () {
						$('#loading').hide();
						$('#content').show();
					},
					success: function () {
						$('#loading').hide();
						$('#content').show();
					}
				});
				var $container = $("#content");
				$container.load("<?php echo base_url(); ?>publik/table1/>");
				var refreshId = setInterval(function ()
				{
					$container.load('<?php echo base_url(); ?>publik/table1/>');
					
				}, 30000); //1 menit
				$.ajaxSetup({cache: false});
			});
		})(jQuery);
		
	</script>
	
	<?php 
		$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
	?>
</head>
<body onload="setInterval('displayServerTime()', 1000);">
	<div style="display: none;" class="se-pre-con"></div>
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="col-md-12">
			<div class="navbar-header">
				<a href="#" class="navbar-brand visible-lg visible-md center">
					<strong></strong> .:: SIAPRA ::. <br /><?php echo $q_instansi->nama; ?>
				</a>
				<a href="<?php echo base_url(); ?>admin/homes" class="navbar-brand visible-sm">
				</a>
				<a href="<?php echo base_url(); ?>admin/homes" class="navbar-brand visible-xs">
					<small><strong>.:: SIAPRA ::.</strong></small>
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
					<i class="glyphicon glyphicon-search"></i>
				</button>				
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse1">
				<ul class="nav pull-right">
					<div class="jam">
						<?php echo $hari . "," . " " . $tanggal . " " . $bulan . " " . $tahun." | "; ?>
						<i id="clock"> <?php print  date('H:i:s'); ?></i> 
					</div>
						<a href="<?php echo base_url() ?>logins"><button class="btn btn-info btn-xs"  id="themes"><i class="icon-user icon-white"></i> Login </button></a>
					 
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid" id="main">
		<!-- will be used to show any messages -->
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<img src="<?php echo base_url(); ?>aset/sidang/loader2.gif" id="loading" alt="loading" style="display:none;" />
			<div style="width: 800px; margin: 0 auto; text-align:center">
				<div class="well well-sm wow fadeInDown">
					<h3>.:: SELAMAT DATANG ::.</h3>
				<h4>DAFTAR SIDANG HARI INI </h4>
				<h4><?php echo $tanggal . " " . $bulan . " " . $tahun; ?></h4>
				</div>
				</div>					
				<div id="content">
				</div>
				</div>
				
				</div>
				
				<!--<script src="<?php echo base_url(); ?>aset/sidang/jquery.js"></script>-->
				<script>
				/* Preloader */
				//paste this code under head tag or in a seperate js file.
				// Wait for window load
				$(window).load(function () {
				// Animate loader off screen
				$(".se-pre-con").fadeOut("slow");
				$('.row-item').fadeIn("slow");
				});
				
				function calcHeight()
				{
				//find the height of the internal page
				var the_height =
				document.getElementById('the_iframe').contentWindow.
				document.body.scrollHeight;
				
				//change the height of the iframe
				document.getElementById('the_iframe').height =
				the_height;
				}
				
				
				/* jQuery toggle layout */
				$('#btnToggle').click(function () {
				if ($(this).hasClass('on')) {
				$('#main .col-md-6').addClass('col-md-4').removeClass('col-md-6');
				$(this).removeClass('on');
				}
				else {
				$('#main .col-md-4').addClass('col-md-6').removeClass('col-md-4');
				$(this).addClass('on');
				}
				});
				</script>
				
				
				</body>
				</html>
								