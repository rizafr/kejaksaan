<?php
	$mode		= $this->uri->segment(4);
	
	if ($mode == "edt" || $mode == "act_edt") {
		$act				= "act_edt";
		$id_disposisi		= $datpil->id_disposisi;
		$id_surat_masuk		= $datpil->id_surat_masuk;
		$tujuan_disposisi 	= $datpil->tujuan_disposisi;
		$isi_instruksi		= $datpil->isi_instruksi;
		$tgl_instruksi		= $datpil->tgl_instruksi;
		$waktu_lama_instruksi = $datpil->waktu_lama_instruksi;
		$batas_waktu		= $datpil->batas_waktu;
		$paraf_kasi			= $datpil->paraf_kasi;
		$paraf_kajari		= $datpil->paraf_kajari;
		$tgl_disposisi		= $datpil->tgl_disposisi;
		$catatan			= $datpil->catatan;
		
		} else {
		$act				= "act_add";
		$id_disposisi		= "";
		$id_surat_masuk		= $this->uri->segment(3);
		$tujuan_disposisi 	= "";
		$isi_instruksi		= "";
		$tgl_instruksi		= "";
		$waktu_lama_instruksi = "";
		$batas_waktu		= "";
	$paraf_kasi			= "";
	$paraf_kajari		= "";
	$tgl_disposisi		= "";
	$catatan			= "";
	}
?>
<div class="navbar navbar-inverse navJudul">
	<div class="container">
		<div class="navbar-header">
			<span class="navbar-brand" href="#">Disposisi Surat</span>
		</div>
	</div><!-- /.container -->
</div><!-- /.navbar -->

<form action="<?php echo base_URL(); ?>disposisi/surat_disposisi/<?php echo $this->uri->segment(3)?>/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<input type="hidden" name="id_disposisi" value="<?php echo $id_disposisi; ?>">
	<input type="hidden" name="id_surat_masuk" value="<?php echo $id_surat_masuk; ?>">
	
<div class="alert alert-info">Perihal Surat</b> : <i><?php echo $judul_surat; ?></i></div>

<div class="row-fluid well" style="overflow: hidden">
	
	<div class="col-lg-6">
		<table width="100%" class="table-form">
			<tr><td width="20%">Disposisi Ke: </td>
				<td><select name="tujuan_disposisi" class="form-control" tabindex="3" style="width: 200px" required><option value=""> - Status Disposisi - </option>
					<?php
						$diposisi	= array('Kasi Pidum','Kajari');
						
						for ($i = 0; $i < sizeof($diposisi); $i++) {
							if ($diposisi[$i] == $tujuan_disposisi) {
								echo "<option selected value='".$diposisi[$i]."'>".$diposisi[$i]."</option>";
								} else {
								echo "<option value='".$diposisi[$i]."'>".$diposisi[$i]."</option>";
							}				
						}			
					?>			
				</select></td></tr>
				<tr><td width="20%">Isi Disposisi</td><td><b><textarea name="isi_instruksi" tabindex="2" required style="width: 400px; height: 60px" class="form-control"><?php echo $isi_instruksi; ?></textarea></b></td></tr>	
				<tr><td colspan="2">
					<br><button type="submit" class="btn btn-primary" tabindex="6" ><i class="icon icon-ok icon-white"></i> Simpan</button>
					<a href="<?php echo base_URL(); ?>disposisi/surat_disposisi/<?php echo $this->uri->segment(3); ?>" tabindex="7" class="btn btn-success"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
				</td></tr>
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">
			<tr><td width="20%">Batas Waktu</td><td><b><input type="text" tabindex="4" name="batas_waktu" required value="<?php echo $batas_waktu; ?>"  id="tgl_surat" style="width: 100px" class="form-control"></b></td></tr>	
			<tr><td width="20%">Catatan</td><td><b><input type="text" tabindex="5" name="catatan" value="<?php echo $catatan; ?>" style="width: 400px" class="form-control"></b></td></tr>				
		</table>
	</div>
	
	<div class="col-lg-6">	
		<table width="100%" class="table-form">
			<tr><td width="20%"><tr><td width="60%"><input id="paraf_kasi" type="checkbox" value="1" name="paraf_kasi" <?php echo set_checkbox('paraf_kasi', '1'); ?> > Paraf Kasi Pidum <br/>
			<input id="paraf_kajari" type="checkbox" value="1" name="paraf_kajari" <?php echo set_checkbox('paraf_kajari', '1'); ?>> Paraf Kajari <br/></td></tr>	</td></tr>	
		</table>
	</div>
	
</div>

</form>

<script>
	$(document).ready(function () {
		$(function () {
			var kajari, kasi;
			kajari = <?php echo (empty($datpil->paraf_kajari)) ? '0' : $datpil->paraf_kajari;  ?>;
			kasi = <?php echo (empty($datpil->paraf_kasi)) ?  '0' : $datpil->paraf_kasi; ?>;			
			if(kasi==1){
				$('#paraf_kasi').prop('checked', true);
			}
			if(kajari==1){
				$('#paraf_kajari').prop('checked', true);
			}
			
		});
	});
</script>
