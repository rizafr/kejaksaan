

<?php
$mode		= $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
	$act				= "act_edt";
	$id_surat_masuk				= $datpil->id_surat_masuk;
	$no_agenda			= $datpil->no_agenda;
	$index_surat_masuk	= $datpil->index_surat_masuk;
	$kode_surat_masuk	= $datpil->kode_surat_masuk;
	$asal_surat_masuk	= $datpil->asal_surat_masuk;
	$no_surat_masuk		= $datpil->no_surat_masuk;
	$status_surat_masuk		= $datpil->status_surat_masuk;
	$tgl_surat_masuk	= $datpil->tgl_surat_masuk;
	$perihal_surat_masuk	= $datpil->perihal_surat_masuk;
	$keterangan			= $datpil->keterangan;
	$lampiran			= $datpil->lampiran;
	
} else {
	$act				= "act_add";
	$id_surat_masuk		= "";
	$no_agenda			= gli("surat_masuk", "no_agenda", 4);
	$index_surat_masuk 	="";
	$kode_surat_masuk	= "";
	$asal_surat_masuk	= "";
	$no_surat_masuk		= "";
	$status_surat_masuk = "";
	$tgl_surat_masuk	= "";
	$perihal_surat_masuk = "";
	$keterangan			= "";
	$lampiran			= "";
}
?>
<div class="navbar navbar-inverse navJudul">
	<div class="container z0">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Surat Masuk</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->

	
	<form action="<?php echo base_URL(); ?>index.php/surat_masuk/masuk/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="id_surat_masuk" value="<?php echo $id_surat_masuk; ?>">
	
	
	<div class="row-fluid well" style="overflow: hidden">
		
	<div class="col-lg-6">
		<table  class="table-form">
		<tr><td width="20%">No. Agenda</td><td><b><input type="text" name="no_agenda" autofocus tabindex="1" readonly value="<?php echo $no_agenda; ?>" style="width: 100px" class="form-control"></b></td></tr>
		<tr><td width="20%">Status Surat</td><td><b>
			<select name="status_surat_masuk" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Status Surat - </option>
			<?php
				$l_status_surat_masuk	= array('Penting','Biasa','Rahasia');
				
				for ($i = 0; $i < sizeof($l_status_surat_masuk); $i++) {
					if ($l_status_surat_masuk[$i] == $status_surat_masuk) {
						echo "<option selected value='".$l_status_surat_masuk[$i]."'>".$l_status_surat_masuk[$i]."</option>";
					} else {
						echo "<option value='".$l_status_surat_masuk[$i]."'>".$l_status_surat_masuk[$i]."</option>";
					}				
				}			
			?>			
			</select>
		<tr><td width="20%">Asal Surat</td><td><b><input type="text" name="asal_surat_masuk" tabindex="3" required value="<?php echo $asal_surat_masuk; ?>" id="asal_surat_masuk" style="width: 400px" class="form-control"></b></td></tr>		
		<tr><td width="20%">Nomor Surat</td><td><b><input type="text" name="no_surat_masuk" tabindex="4" required value="<?php echo $no_surat_masuk; ?>"  id="no_surat_masuk" style="width: 300px" class="form-control"></td></tr>	
		<tr><td width="20%">Perihal</td><td><b><textarea name="perihal_surat_masuk" tabindex="5" required style="width: 400px; height: 90px" class="form-control"><?php echo $perihal_surat_masuk; ?></textarea></b></td></tr>	
		<tr><td colspan="2">
		<br><button type="submit" class="btn btn-primary"tabindex="10" ><i class="icon icon-ok icon-white"></i> Simpan</button>
		<a href="<?php echo base_URL(); ?>index.php/surat_masuk/masuk" class="btn btn-success" tabindex="11" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
		</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table  class="table-form">
		<tr><td width="20%">Kode Surat</td><td><b><input type="text" name="kode_surat_masuk" tabindex="6" id="kode_surat_masuk" required value="<?php echo $kode_surat_masuk; ?>" style="width: 100px" class="form-control"></b></td></tr>
		<tr><td width="20%">Indeks Surat</td><td><b><input type="text" name="index_surat_masuk" tabindex="7" value="<?php echo $index_surat_masuk; ?>" style="width: 300px" class="form-control"></b></td></tr>
		<tr><td width="20%">Tanggal Surat</td><td><b><input type="text" name="tgl_surat_masuk" tabindex="8" required value="<?php echo $tgl_surat_masuk; ?>" id="tgl_surat_masuk" style="width: 100px" class="form-control"></b></td></tr>	
		<tr><td width="20%">File Surat (Scan)</td><td><b><input type="file" name="lampiran" tabindex="9" class="form-control" style="width: 200px"></b><br /><?php echo "<a href='".base_URL()."upload/surat_masuk/".$lampiran."' target='_blank'> <button type='button' class='btn btn-info '><i class='icon-cloud-upload'></i> ".$lampiran."</button></a>";?></td></tr>
		<tr><td width="20%">Keterangan</td><td><b><input type="text" name="keterangan" value="<?php echo $keterangan; ?>" tabindex="10" style="width: 400px" class="form-control"></b></td></tr>	
		</table>	
	</div>

	</div>
	
	</form>
<script type="text/javascript">
$(function() {
	$( "#tgl_surat_masuk" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});
});
</script>
