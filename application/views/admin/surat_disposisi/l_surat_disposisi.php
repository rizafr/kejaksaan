<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Disposisi Surat</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>disposisi/surat_disposisi/<?php echo $this->uri->segment(3)?>/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
						</ul>
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	
	<?php echo $this->session->flashdata("k");?>
	
<div class="alert alert-info">Perihal Surat</b> : <i><?php echo $judul_surat; ?></i></div>
	<div class="adv-table">		
		<section id="unseen">
			<table class="display table table-bordered table-striped table-condensed table-hover" id="example">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="15%">Tujuan Disposisi</th>
						<th width="30%">Isi Instruksi</th>
						<th width="20%">Tanggal Instruksi</th>
						<th width="14%">Waktu Lama Instruksi</th>
						<th width="25%">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						if (empty($data)) {
							echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} else {
							$no 	= ($this->uri->segment(4) + 1);
							foreach ($data as $b) {
							?>
							<tr>
								<td class="ctr"><?php echo $no;?></td>
								<td><?php echo $b->tujuan_disposisi; ?></td>
								<td><?php echo $b->isi_instruksi; ?></td>
								<td><?php echo tgl_jam_sql($b->tgl_instruksi)?></td>
								<td><?php echo $b->waktu_lama_instruksi ." hari <br />". tgl_jam_sql($b->tgl_instruksi) ." s/d ".tgl_jam_sql($b->batas_waktu)?></td>
								<td class="ctr">
									<div class="btn-group">
										<a href="<?php echo base_URL(); ?>disposisi/surat_disposisi/<?php echo $this->uri->segment(3)?>/edt/<?=$b->id_disposisi?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
										<a href="<?php echo base_URL(); ?>disposisi/surat_disposisi/<?php echo $this->uri->segment(3)?>/del/<?=$b->id_disposisi?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
										<i class="icon-trash icon-white"> </i> Hapus</a>
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
