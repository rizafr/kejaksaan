

<?php
	$mode		= $this->uri->segment(3);
	
	if ($mode == "edt" || $mode == "act_edt") {
		$act				= "act_edt";
		$id_perkara			= $data->id_perkara;
		$no_agenda			= $data->no_agenda;
		$tanggal_perkara	= $data->tanggal_perkara;
		$nama_tersangka		= $data->nama_tersangka;
		$perkara			= $data->perkara;
		$id_jaksa			= $data->id_jaksa;
		
		} else {
		$act				= "act_add";
		$id_perkara			= "";
		$no_agenda			= "";
		$tanggal_perkara 	= "";
		$nama_tersangka		= "";
		$perkara			= "";
		$id_jaksa			= "";
	}
?>
<div class="navbar navbar-inverse navJudul">
	<div class="container z0">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">SPDP</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->


<form action="<?php echo base_URL(); ?>manajemen_perkara/perkara/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="id_perkara" value="<?php echo $id_perkara; ?>">
	<div class="row-fluid well" style="overflow: hidden">
		
		<div class="col-lg-8">
			<table class="table-form">
				<tr><td width="20%">No. Agenda</td><td><b><input type="text" name="no_agenda" id="getAgenda" autofocus tabindex="1" value="<?php echo $no_agenda; ?>" style="width: 100px" class="form-control"></b></td></tr>
				<tr><td width="20%">Tanggal Sidang</td><td><b><input type="text" id="tanggal_perkara" name="tanggal_perkara" autofocus tabindex="1" value="<?php echo $tanggal_perkara; ?>"  class="form-control"></b></td></tr>
				<tr><td width="20%">Nama Tersangka</td><td><b><input type="text" name="nama_tersangka" autofocus tabindex="1" value="<?php echo $nama_tersangka; ?>"  class="form-control"></b></td></tr>
				<tr><td width="20%">Nama Jaksa</td><td><b>
					<?php echo form_dropdown('id_jaksa', $jaksa_list, set_value('id_jaksa', isset($id_jaksa) ? $id_jaksa : ''), 'class="form-control m-bot15"'); ?>
				</td></b></tr>
				<tr><td width="20%">Perkara</td><td><b><textarea  name="perkara" tabindex="5" required style="width: 400px; height: 90px" class="form-control"><?php echo $perkara; ?></textarea></b></td></tr>	
				<tr><td colspan="2">
					<br><button type="submit" class="btn btn-primary"tabindex="10" ><i class="icon icon-ok icon-white"></i> Simpan</button>
					<a href="<?php echo base_URL(); ?>manajemen_perkara/perkara" class="btn btn-success" tabindex="11" ><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
				</td></tr>
			</table>
		</div>
		
		
	</div>
	
</form>
<script type="text/javascript">
	$(function() {
		$( "#tanggal_perkara" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
	});
</script>
