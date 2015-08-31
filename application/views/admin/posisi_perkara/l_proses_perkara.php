<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Posisi Proses Perkara</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_URL(); ?>manajemen_perkara/perkara" class="btn-info"><i class="icon-share icon-white"> </i> Kembali</a></li>
						</ul>
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	
	<?php echo $this->session->flashdata("k");?>
	
	<div class="container">
		<div class="row">
			<section>
				<div class="wizard">
					<div class="wizard-inner">
						<div class="connecting-line"></div>
						<ul class="nav nav-tabs" role="tablist">
							<?php 
								$no=1;
								$jumlah = count($data);
								foreach ($data as $p) { ?>
								<li role="presentation" class="<?php if($no==1){echo "active";}else{echo "disabled";} ?>">
									<a href="<?php if($no==$jumlah){echo "#complete";}else{echo "#step".$no;} ?>" data-toggle="tab" aria-controls="<?php if($no==$jumlah){echo "#complete";}else{echo "#step".$no;} ?>" role="tab" title="<?php echo $p->nama_posisi_perkara?>">
										<span class="round-tab">
											<i class="glyphicon glyphicon-folder-open"><?php echo $no ?></i>
										</span>
									</a>
								</li>
							<?php $no++;  }?>
						</ul>
					</div>
					
					<form role="form">
						<div class="tab-content">
							<div class="tab-pane active" role="tabpanel" id="step1">
								
								<div class="row">
									<div class="col-lg-6">
										
										<section class="panel">
											<header class="panel-heading">
												SPDP
											</header>
											<div class="panel-body">
												<form role="form">
													<div class="form-group">
														<label class="col-sm-2 control-label">Tanggal</label>
														<div class="col-sm-10">
															<input type="text" placeholder="" data-mask="99/99/9999" class="form-control">
															<span class="help-inline">dd/mm/yyyy</span>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Tersangka</label>
														<div class="col-sm-10">
															<input type="text" placeholder=""  class="form-control">
															
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Perkara</label>
														<div class="col-sm-10">
															<input type="text" placeholder=""  class="form-control">
															
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Jaksa</label>
														<div class="col-sm-10">
															<input type="text" placeholder=""  class="form-control">
															
														</div>
													</div>
													<button type="submit" class="btn btn-info">Submit</button>
												</form>
												
											</div>
										</section>
									</div>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" role="tabpanel" id="step2">
								<h3>Step 2</h3>
								<p>This is step 2</p>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
									<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" role="tabpanel" id="step3">
								<h3>Step 3</h3>
								<p>This is step 3</p>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
									<li><button type="button" class="btn btn-default next-step">Skip</button></li>
									<li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" role="tabpanel" id="complete">
								<h3>Complete</h3>
								<p>You have successfully completed all steps.</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>	
</div>	