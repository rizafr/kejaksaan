<?php include "jam.php" ?>
<!DOCTYPE html>
<html lang="en"><head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>.:: SIAPRA (Sistem Informasi Administrasi dan Penanganan Perkara) ::.</title>
    <meta charset="UTF-8">
	<link rel="icon" href="">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">  
	<script src="<?php echo base_url(); ?>aset/js/jquery.js"></script>		
	<script src="<?php echo base_url(); ?>aset/js/jquery-1.11.1.min.js"></script>		
	<script type="text/javascript">
		$.fn.infiniteScrollUp=function(){
			var self=this,kids=self.children()
			kids.slice(25).hide()
			setInterval(function(){
				kids.filter(':hidden').eq(0).slideDown("fast")
				kids.eq(0).slideUp(function(){
					$(this).appendTo(self)
					kids=self.children()
				})
			},3000) // 3 detik
			return this
		}
		function cvt(s){
			return function(){
				return $(s).html( $(this).html())
			}
		}
		$(function(){
			$('tbody').replaceWith(cvt('<section/>'))
			$('tr danger').replaceWith(cvt('<div/>'))
			$('tr').replaceWith(cvt('<div/>'))
			$('td').replaceWith(cvt('<span/>'))
			$('th').replaceWith(cvt('<b/>'))
			$('section').infiniteScrollUp()
		})
	</script>
	<style type="text/css">
		span,b, .danger{
		width: 20%;
		display: inline-block;
		text-align: center;
		background-color : #fafafa;
		border-bottom: 2px solid #00698C ;
		padding-top: 10px ;
		padding-bottom: 10px ;
		color: #333;
		
		animation:fadeIn ease-in 1; /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
		animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
		
		animation-duration:1s;
		}
		
		/* make keyframes that tell the start state and the end state of our object */
		@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		
		b{
		text-align:center;
		background-color : #006064;
		color: #FFFFF2;
		}
		span .danger{
		background-color: red;
		}
	</style>
</head>
<body>
	
	<div class="container" >
		<!-- will be used to show any messages -->
		<div style="display: block;" class="row row-item">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-item">
				<table border="0" width="100%">
					<colgroup><col /><col /><col /><col /><col /><col /></colgroup>
					<thead>
						<tr>
						<th>No Agenda </th><th>Nama Tersangka</th><th>Perkara</th><th>Nama Jaksa</th><th>Status</th></tr>
					</thead>
					<tbody>
						<?php 						
							if (empty($data)) {
								echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} 
							foreach ($data as $b) {
							
							$tgl1 =  date("Y-m-d");  // 1 Oktober 2009
								$tgl2 = $b->tanggal_perkara;  // 10 Oktober 2009
								
								// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
								// dari tanggal pertama
								
								$pecah1 = explode("-", $tgl1);
								$date1 = $pecah1[2];
								$month1 = $pecah1[1];
								$year1 = $pecah1[0];
								
								// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
								// dari tanggal kedua
								
								$pecah2 = explode("-", $tgl2);
								$date2 = $pecah2[2];
								$month2 = $pecah2[1];
								$year2 =  $pecah2[0];
								
								// menghitung JDN dari masing-masing tanggal
								
								$jd1 = GregorianToJD($month1, $date1, $year1);
								$jd2 = GregorianToJD($month2, $date2, $year2);
								
								// hitung selisih hari kedua tanggal
								
								$selisih = $jd2 - $jd1;
								
								if($selisih>0){
									$warna ="danger";
									$status = $selisih ." hari lagi";
									$label ="label label-danger";
								}
								else if($selisih==0){
									$warna =" success";
									$status = "SEDANG BERLANGSUNG";
									$label ="label label-success";
								}else if($selisih<0){
									$warna ="info";
									$status ="SELESAI";
									$label ="label label-info ";
								}
								
							?>
							<tr class="danger">
							<td class="danger"><?php echo $b->no_agenda;?></td><td><?php echo $b->nama_tersangka; ?></td><td><?php echo $b->perkara?></td><td><font color='blue'><?php echo $b->nama_jaksa?></font></td><td><div class="<?php echo $label ?>"><?php echo $status ?></div></td>
							</tr>
							<?php 
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	
	<!--<script src="<?php echo base_url(); ?>aset/sidang/jquery.js"></script>-->
	<script src="<?php echo base_url(); ?>aset/sidang/bootstrap.js"></script>
	<script>
		/* Preloader */
		//paste this code under head tag or in a seperate js file.
		// Wait for window load
		$(window).load(function() {
			// Animate loader off screen
			$(".se-pre-con").fadeOut("slow");
			$('.row-item').fadeIn("slow");
		});
		
		function calcHeight()
		{
			//find the height of the internal page
			var the_height=
			document.getElementById('the_iframe').contentWindow.
			document.body.scrollHeight;
			
			//change the height of the iframe
			document.getElementById('the_iframe').height=
			the_height;
		}
		
		
		/* jQuery toggle layout */
		$('#btnToggle').click(function(){
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
