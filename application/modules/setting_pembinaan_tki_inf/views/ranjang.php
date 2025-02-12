<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Data Ranjang</span> - TKI</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Ranjang</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Basic datatable -->
				<!-- /basic datatable -->

				<!-- Striped rows -->				
				<!-- /striped rows -->

				<!-- Hover rows -->
				<!-- /hover rows -->

				<!-- Bordered table -->
				<!-- /bordered table -->


				<!-- Style combinations -->
				
				<!-- TAMBAH ranjang TKI -->
				<div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah Ranjang </h5>
							</div>
							<form action="<?php echo site_url('setting_pembinaan_tki_inf/simpan_data_ranjang'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Kode Ranjang</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kode" class="form-control" name="kode_no_ranjang">
										</div>
									</div>
								
									<div class="form-group">
										<label class="control-label col-sm-3">Lokasi </label>
										<div class="col-sm-9">
											<input type="text" placeholder="Lokasi " class="form-control" name="lokasi">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Ranjang</label>
										<div class="col-sm-9">
											<input type="text" placeholder="ranjang" class="form-control" name="ranjang">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3">Kasur</label>
										<div class="col-sm-9">
											<input type="text" placeholder="kasur" class="form-control" name="kasur">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3">Sprei</label>
										<div class="col-sm-9">
											<input type="text" placeholder="sprei" class="form-control" name="sprei">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3">Bantal</label>
										<div class="col-sm-9">
											<input type="text" placeholder="bantal" class="form-control" name="bantal">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-sm-3">Sarung Bantal</label>
										<div class="col-sm-9">
											<input type="text" placeholder="sarung bantal" class="form-control" name="sarung_bantal">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
									<button type="submit" class="btn btn-primary">OK</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /TAMBAH ranjang TKI -->
				
				
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA RANJANG</button>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					<table class="table datatable-basic table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>NO </th>
								<th>KODE</th>
								<th>LOKASI</th>
								<th>RANJANG</th>
								<th>KASUR</th>
								<th>SPREI</th>
								<th>BANTAL</th>
								<th>SARUNG BANTAL</th>
								<th class="text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; 
                                    foreach ($tampil_data_ranjang as $row) { ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->kode_no_ranjang;?></td>
								<td><?php echo $row->lokasi;?></td>
								<td><?php echo $row->ranjang;?></td>
								<td><?php echo $row->kasur;?></td>
								<td><?php echo $row->sprei;?></td>
								<td><?php echo $row->bantal;?></td>
								<td><?php echo $row->sarung_bantal;?></td>
									<td class="text-center">
										<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
										<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
									</td> 
							</tr>
						<!-- UPDATE ranjang TKI -->
							<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update Ranjang</h5>
										</div>
										<div class="modal-body">
										<form action="<?php echo site_url('setting_pembinaan_tki_inf/update_data_ranjang'); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_no_ranjang" value="<?php echo $row->id_no_ranjang; ?>">
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Kode ranjang </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="kode_no_ranjang" value="<?php echo $row->kode_no_ranjang; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Lokasi </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="lokasi" value="<?php echo $row->lokasi; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Ranjang </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="ranjang" value="<?php echo $row->ranjang; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Kasur </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="kasur" value="<?php echo $row->kasur; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Sprei </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="sprei" value="<?php echo $row->sprei; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Bantal </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="bantal" value="<?php echo $row->bantal; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Sarung Bantal </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="sarung_bantal" value="<?php echo $row->sarung_bantal; ?>">
														</div>
													</div>
												</div>
											<hr>
											<div class="modal-footer">
												<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Simpan</button>
											</div>
										</form>
										</div>
									</div>
								</div>
							</div>
						<!-- /UPDATE ranjang TKI -->
						<!-- HAPUS ranjang TKI -->
							<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Hapus Ranjang </h5>
										</div>
										<form action="<?php echo site_url('setting_pembinaan_tki_inf/hapus_data_ranjang'); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_no_ranjang" value="<?php echo $row->id_no_ranjang; ?>">
												<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->kode_no_ranjang; ?> - <?php echo $row->lokasi; ?> - <?php echo $row->ranjang; ?> - <?php echo $row->kasur; ?></code> ?</p>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- /HAPUS ranjang TKI -->
						<?php $no++;  } ?>
						</tbody>
					</table>
				</div>
				<!-- /style combinations -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->