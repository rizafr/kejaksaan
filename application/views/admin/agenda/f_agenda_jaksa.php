<div class="navbar navbar-inverse navJudul">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Cetak Data</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->

<div class="well">
	<form action="<?php echo base_URL(); ?>agenda/jaksa_cetak" target="blank" method="post" accept-charset="utf-8" enctype="multipart/form-data">	
		<input type="hidden" name="tipe" value="<?php echo $this->uri->segment(2); ?>">
		<div class="container">
			<div class="row">
				<div class="form-group col-lg-6">
					<label for="code">Nama Jaksa</label>
					<?php echo form_dropdown('id_jaksa', $jaksa_list, set_value('id_jaksa', isset($id_jaksa) ? $id_jaksa : ''), 'class="form-control input-medium"','style="width: 150px"'); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-lg-3 ">
					<label for="code">Dari Tanggal</label>
					<input type="text" name="tgl_start" id="tgl_start" class="form-control" required>
				</div> 
				<div class="form-group col-lg-3 ">
					<label for="code">Sampai Tanggal</label>
					<input type="text" name="tgl_end" id="tgl_end" class="form-control" required>
				</div>
			</div>
			<div class="row">
				<button type="submit" class="btn btn-primary"><i class="icon icon-print icon-white"></i> Cetak</button>
				<a href="<?php echo base_URL(); ?>index.php/admin" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
				
			</div>
		</form>
	</div>
	
</form>
</div>

<script type="text/javascript">
	$(function() {
		$( "#tgl_start" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
		$( "#tgl_end" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});
		});
	</script>
		