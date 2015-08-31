<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse animated ">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Klasifikasi Surat </a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						
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
						<th width="10%">Kode</th>
						<th width="20%">Nama</th>
						<th width="60%">Bobot</th>
						<th width="10%">Aksi</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						if (empty($data)) {
							echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
							} else {
							$no 	= ($this->uri->segment(4) + 1);
							foreach ($data as $b) {
							?>
							<tr>
								<td><?php echo $b->kode; ?></td>
								<td><?php echo $b->nama; ?></td>
								<td><?php echo $b->uraian; ?></td>
								
								<?php 
									if ($this->session->userdata('admin_level') == "Super Admin") {
									?>
									<td class="ctr">
										<div class="btn-group">
											<a href="<?php echo base_URL(); ?>klasifikasi_surat/klas_surat/edt/<?php echo $b->id; ?>" class="btn btn-success btn-sm"><i class="icon-edit icon-white"> </i> Edit</a>
										</div>					
									</td>
									<?php 
										} else {
										echo "<td class='ctr'> -- </td>";
									}
								?>
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
