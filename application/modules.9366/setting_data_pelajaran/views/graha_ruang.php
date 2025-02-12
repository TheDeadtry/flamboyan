<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>GRAHA RUANG </h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Graha Ruang</span></a>
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
				
				<!-- TAMBAH LEMBAGA LSP TKI -->
				<div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah Materi</h5>
							</div>
							<form action="<?php echo site_url('setting_data_pelajaran/simpan_data_graha_ruang'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Kode Materi</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kode Materi" class="form-control" name="kode_materi">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Materi</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Nama Materi" class="form-control" name="nama_materi">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Buku Halaman</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Buku Halaman" class="form-control" name="buku_hal">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Penjelasan Materi</label>
										<div class="col-sm-9">
											<textarea placeholder="Penjelasan Materi" class="form-control" name="penjelasan"></textarea> 
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Keterangan" class="form-control" name="ket">
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
				<!-- /TAMBAH LEMBAGA LSP TKI -->
				
				
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH MATERI</button>
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
								<th>MATERI</th>
								<th>BUKU HAL.</th>
								<th>PENJELASAN MATERI</th>
								<th>KETERANGAN</th>
								<th class="text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; 
                            foreach ($tampil_data_graha_ruang as $row) { 
                            ?>			
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row['kode_materi'].' : '.$row['nama_materi'];?></td>
								<td><?php echo $row['buku_hal'];?></td>
								<td><?php echo $row['penjelasan'];?></td>
								<td><?php echo $row['keterangan'];?></td>
								
								<td class="text-center">
									<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
									<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</button> 
								</td> 
							</tr>
						<!-- UPDATE MATERI TATA GRAHA RUANG -->
							<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update Materi</h5>
										</div>
										<form action="<?php echo site_url('setting_data_pelajaran/update_data_graha_ruang'); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_graha_ruang" value="<?php echo $row['id_graha_ruang']; ?>">
											<div class="modal-body">
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-3">Kode Materi</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" name="kode_materi" value="<?php echo $row['kode_materi']; ?>">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-3">Nama Materi</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" name="nama_materi" value="<?php echo $row['nama_materi']; ?>">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-3">Buku Halaman</label>
															<div class="col-sm-9">
																<input type="text" placeholder="Buku Halaman" class="form-control" name="buku_hal" value="<?php echo $row['buku_hal'] ?>">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="form-group">
																<label class="control-label col-sm-3">Penjelasan Materi</label>
																<div class="col-sm-9">
																	<textarea placeholder="Penjelasan Materi" class="form-control" name="penjelasan"><?php echo $row['penjelasan']; ?></textarea> 
																</div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-3">Keterangan</label>
															<div class="col-sm-9">
																<input type="text" class="form-control" name="ket" value="<?php echo $row['keterangan']; ?>">
															</div>
														</div>
													</div>
												<hr>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Simpan</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- /UPDATE MATERI TATA GRAHA RUANG -->
						<!-- HAPUS MATERI TATA GRAHA RUANG -->
							<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Hapus Materi</h5>
										</div>
										<form action="<?php echo site_url('setting_data_pelajaran/hapus_data_graha_ruang'); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_graha_ruang" value="<?php echo $row['id_graha_ruang']; ?>">
												<p>Apakah anda yakin akan menghapus data <br> <code class="text-danger"><?php echo $row['kode_materi']; ?>  :  <?php echo $row['nama_materi']; ?></code> Beserta semua sub-materi ?</p>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- /HAPUS MATERI TATA GRAHA RUANG -->
						<?php $no++; 
                                    	} ?>
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