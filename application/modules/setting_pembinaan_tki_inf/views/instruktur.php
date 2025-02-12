<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Data Instruktur</span> - TKI</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Instruktur BLK</span></a>
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
				
				<!-- TAMBAH instruktur TKI -->
				<div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah instruktur </h5>
							</div>
							<form action="<?php echo site_url('setting_pembinaan_tki_inf/simpan_data_instruktur'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Kode Instruktur </label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kode" class="form-control" name="kode_instruktur">
										</div>
									</div>
								
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Lengkap</label>
										<div class="col-sm-9">
											<input type="text" placeholder="nama instruktur TKI" class="form-control" name="nama">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-3">Jabatan</label>
										<div class="col-sm-9">
											<input type="text" placeholder="jabatan" class="form-control" name="jabatan_tugas">
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
				<!-- /TAMBAH instruktur TKI -->
				
				
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA INSTRUKTUR</button>
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
								<th>NAMA INSTRUKTUR</th>
								<th>JABATAN</th>
								<th class="text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; 
                                    foreach ($tampil_data_instruktur as $row) { ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->kode_instruktur;?></td>
								<td><?php echo $row->nama;?></td>
								<td><?php echo $row->jabatan_tugas;?></td>
								<td  style="display:none;"></td>
									<td class="text-center">
										<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
										<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
									</td> 
							</tr>
						<!-- UPDATE instruktur TKI -->
							<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update instruktur</h5>
										</div>
										<div class="modal-body">
										<form action="<?php echo site_url('setting_pembinaan_tki_inf/update_data_instruktur'); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_instruktur" value="<?php echo $row->id_instruktur; ?>">
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Kode Instruktur </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="kode_instruktur" value="<?php echo $row->kode_instruktur; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Nama instruktur </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="nama" value="<?php echo $row->nama; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Jabatan Tugas </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="jabatan_tugas" value="<?php echo $row->jabatan_tugas; ?>">
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
						<!-- /UPDATE instruktur TKI -->
						<!-- HAPUS instruktur TKI -->
							<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Hapus instruktur </h5>
										</div>
										<form action="<?php echo site_url('setting_pembinaan_tki_inf/hapus_data_instruktur'); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_instruktur" value="<?php echo $row->id_instruktur; ?>">
												<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->kode_instruktur; ?> - <?php echo $row->nama; ?></code> ?</p>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- /HAPUS instruktur TKI -->
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