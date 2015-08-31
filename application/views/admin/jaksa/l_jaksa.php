<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Daftar Nama Jaksa</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>jaksa/olah_jaksa/add" class="btn-info"><i class="icon-plus-sign icon-white"> </i> Tambah Data</a></li>
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
			<table  class="display table table-bordered table-striped table-condensed table-hover" id="example">
				<thead>
					<tr>
						<th width="10%">No.</th>
						<th width="21%">NIP</th>
						<th width="30%">Nama Jaksa</th>
						<th width="25%">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						//$disposisi = array("1" => "Proses Kasi Pidum", "2" => "Approve Kasi Pidum", "3" => "Approve Kajari", "4" => "Sudah Dilaksanakan", "5" => "Tidak Dilaksanakan");
						
						
						if (empty($data)) {
							echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} else {
							$no 	= ($this->uri->segment(4) + 1);
							foreach ($data as $b) {
							?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $b->nip;?></td>
								<td><?php echo $b->nama_jaksa; ?></td>
								<td>									
										<div class="btn-group">
											<a href="<?php echo base_URL()?>jaksa/olah_jaksa/edt/<?php echo $b->id_jaksa?>" class="btn btn-success btn-sm" title="Edit Data"><i class="icon-edit icon-white"> </i> Edt</a>
											<a href="<?php echo base_URL()?>jaksa/olah_jaksa/del/<?php echo $b->id_jaksa?>" class="btn btn-warning btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="icon-trash icon-remove">  </i> Del</a>	
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
