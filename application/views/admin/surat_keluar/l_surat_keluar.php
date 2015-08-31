<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Surat Keluar</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>surat_keluar/keluar/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
						</ul>
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	
	<?php echo $this->session->flashdata("k");?>
	
	<div class="adv-table">		
		<section id="unseen">
			<table  class="display table table-bordered table-striped table-condensed table-hover" id="example">
				<thead>
					<tr>
						<th width="10%">No. Agd/Kode</th>
						<th width="30%">Isi Ringkas, File</th>
						<th width="25%">Tujuan Surat</th>
						<th width="20%">Nomor, Tgl. Surat</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						if (empty($data)) {
							echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} else {
							$no 	= ($this->uri->segment(4) + 1);
							foreach ($data as $b) {
							?>
							<tr>
								<td><?php echo $b->no_agenda."/".$b->kode;?></td>
								<td><?php echo $b->isi_ringkas."<br><b>File : </b><i><a href='".base_URL()."upload/surat_keluar/".$b->file."' target='_blank'>".$b->file."</a>"?></td>
								<td><?php echo $b->tujuan?></td>
								<td><?php echo $b->no_surat."<br><i>".tgl_jam_sql($b->tgl_surat)."</i>"?></td>
								<td class="ctr">
									<?php  
										if ($b->pengolah == $this->session->userdata('admin_id')) {
										?>
										<div class="btn-group">
											<a href="<?php echo base_URL()?>surat_keluar/keluar/edt/<?php echo $b->id?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
											<a href="<?php echo base_URL()?>surat_keluar/keluar/del/<?php echo $b->id?>" class="btn btn-warning btn-sm" onclick="return confirm('Anda Yakin..?')">
											<i class="icon-trash icon-white"> </i> Hapus</a>
										</div>	
										<?php } else { ?>
										<div class="label label-danger">No Action</div>
									<?php } ?>
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
