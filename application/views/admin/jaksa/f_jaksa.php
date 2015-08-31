

<?php
	$mode		= $this->uri->segment(3);
	
	if ($mode == "edt" || $mode == "act_edt") {
		$act			= "act_edt";
		$id_jaksa		= $datpil->id_jaksa;
		$nip			= $datpil->nip;
		$nama_jaksa		= $datpil->nama_jaksa;	
		} else {
		$act			= "act_add";
		$id_jaksa		= "";
		$nip 			="";
		$nama_jaksa		= "";
	}
?>
<div class="navbar navbar-inverse navJudul">
	<div class="container z0">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Form Jaksa</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->


<form action="<?php echo base_URL(); ?>index.php/jaksa/olah_jaksa/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="id_jaksa" value="<?php echo $id_jaksa; ?>">	
	
	<div class="row-fluid well" style="overflow: hidden">
		
		<div class="col-lg-6">
			<table  class="table-form">
				<tr><td width="20%">NIP</td><td><b><input type="text" name="nip" autofocus tabindex="1" required value="<?php echo $nip; ?>" style="width: 250px" class="form-control"></b></td></tr>
				<tr><td width="20%">Nama Jaksa</td><td><b><input type="text" name="nama_jaksa" tabindex="3" required value="<?php echo $nama_jaksa; ?>" id="asal_surat_masuk" style="width: 400px" class="form-control"></b></td></tr>		
				<tr><td colspan="2">
					<br><button type="submit" class="btn btn-primary"tabindex="10" ><i class="icon icon-ok icon-white"></i> Simpan</button>
					<a href="<?php echo base_URL(); ?>index.php/jaksa/olah_jaksa/" class="btn btn-success" tabindex="11" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
				</td></tr>
			</table>
		</div>
	</div>
	
</form>