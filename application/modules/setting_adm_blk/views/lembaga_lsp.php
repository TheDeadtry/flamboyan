<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>Data Lembaga LSP </h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Lembaga LSP</span></a>
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
								<h5 class="modal-title">Tambah Lembaga LSP</h5>
							</div>
							<form action="<?php echo site_url('setting_adm_blk/simpan_data_lembaga_lsp'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Nama" class="form-control" name="nama">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Alamat" class="form-control" name="alamat">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Bank</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Bank" class="form-control" name="bank">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Ket</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Ket" class="form-control" name="ket">
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
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH LEMBAGA LSP </button>
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
								<th>NAMA</th>
								<th>ALAMAT</th>
								<th>BANK</th>
								<th>KETERANGAN</th>
								<th class="text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; 
                                    foreach ($tampil_data_lembaga_lsp as $row) { ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->nama;?></td>
								<td><?php echo $row->alamat;?></td>
								<td><?php echo $row->bank;?></td>
								<td><?php echo $row->ket;?></td>
									<td class="text-center">
										<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
										<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
									</td> 
							</tr>
						<!-- UPDATE LEMBAGA LSP -->
							<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update Lembaga LSP TKI</h5>
										</div>
										<div class="modal-body">
										<form action="<?php echo site_url('setting_adm_blk/update_data_lembaga_lsp'); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_lembaga_lsp" value="<?php echo $row->id_lembaga_lsp; ?>">
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Nama</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="nama" value="<?php echo $row->nama; ?>">
														</div>
													</div>
													<div class="row">
														<label class="control-label col-sm-3">Alamat</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat; ?>">
														</div>
													</div>
													<div class="row">
														<label class="control-label col-sm-3">Bank</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="bank" value="<?php echo $row->bank; ?>">
														</div>
													</div>
													<div class="row">
														<label class="control-label col-sm-3">Keterangan</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="ket" value="<?php echo $row->ket; ?>">
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
						<!-- /UPDATE LEMBAGA LSP -->
						<!-- HAPUS LEMBAGA LSP -->
							<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Hapus Bahasa </h5>
										</div>
										<form action="<?php echo site_url('setting_adm_blk/hapus_data_lembaga_lsp'); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_lembaga_lsp" value="<?php echo $row->id_lembaga_lsp; ?>">
												<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->nama; ?> <br> <?php echo $row->alamat; ?> <br> <?php echo $row->bank; ?></code> ?</p>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- /HAPUS LEMBAGA LSP -->
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