<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Manajemen Perkara</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>manajemen_perkara/perkara/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
						</ul>						
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	
	<?php echo $this->session->flashdata("k");?>
	
	<!--	
		<div class="alert alert-dismissable alert-success">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>Well done!</strong> You successfully read <a href="http://bootswatch.com/amelia/#" class="alert-link">this important alert message</a>.
		</div>
		
		<div class="alert alert-dismissable alert-danger">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<strong>Oh snap!</strong> <a href="http://bootswatch.com/amelia/#" class="alert-link">Change a few things up</a> and try submitting again.
		</div>	
	-->
	<div class="adv-table">		
		<section id="unseen">
			<table  class="display table table-bordered  table-condensed table-hover" id="l_perkara">
				<thead>
					<tr>
						<th width="10%">No. Agenda</th>
						<th width="10%">Tanggal Sidang</th>
						<th width="12%">Nama Tersangka</th>
						<th width="20%">Perkara</th>
						<th width="9%">Jaksa</th>
						<th width="9%">Status</th>
						<th width="30%">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						
						if (empty($data)) {
							echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} else {
							$no 	= ($this->uri->segment(4) + 1);
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
							<tr>
								<td><?php echo $b->no_agenda;?></td>
								<td><?php echo tgl_jam_sql($b->tanggal_perkara)?></td>
								<td><?php echo $b->nama_tersangka; ?></td>
								<td><?php echo $b->perkara?></td>
								<td> <?php echo $b->nama_jaksa?></td>		
								<td> <span class="<?php echo $label ?>"> <?php echo $status ?> </span></td>		
								<td>
									<div class="btn-group">
										<a href="<?php echo base_URL()?>manajemen_perkara/perkara/edt/<?php echo $b->id_perkara?>" class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i> Edt</a>
										<a href="<?php echo base_URL()?>manajemen_perkara/perkara/del/<?php echo $b->id_perkara?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Del</a>			
										<a href="<?php echo base_URL()?>posisi_perkara/proses_perkara/<?php echo $b->id_perkara?>" class="btn btn-default btn-sm"  title="Posisi Perkara"><i class="icon-trash icon-list"> </i> Perkara</a>
										<a href="<?php echo base_URL()?>posisi_penahanan/proses_penahanan/<?php echo $b->id_perkara?>" class="btn btn-info btn-sm" title="Posisi Penahanan"><i class="icon-certificate icon-white"> </i> Penahanan</a>
									</div>	
								</td>
							</tr>
							<?php 
								$no++;
							}
						}
						?>
						</tbody>
							</table>
		</section>
	</div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		$('#l_perkara').dataTable( {
			"aaSorting": [[ 0, "asc" ]]
		} );
	} );
</script>