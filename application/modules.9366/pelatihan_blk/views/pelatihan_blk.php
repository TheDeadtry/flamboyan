<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">DATA PELATIHAN BLK</span> - TKI</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Pelatihan BLK</span></a>
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
				
				<!-- TAMBAH ADM kantor TKI -->
				<div id="modal_form_horizontal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah Laporan Bulanan </h5>
							</div>
							<form action="<?php echo site_url('pelatihan_blk/simpan_data_laporan_pelatihan_blk'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<input type="hidden" class="form-control" name="jml" value="0">
									<div class="form-group">
									<label class="control-label col-sm-3">Tanggal </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="date" class="form-control daterange-single" name="tanggal" data-format='yyyy.MM.dd' />
											</div>
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
				<!-- /TAMBAH laporan_bulanan TKI -->
				
				
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH PELATIHAN TKI</button>
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
								<th>Tanggal</th>
								<th>Tampil CTKI</th>
								<th style="display:none;">Print</th>
								<th class="text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; 
                                    foreach ($tampil_data_laporan as $row) { ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->tanggal;?></td>
								<!-- <td style="display:none;"></td> -->
								<!-- <td style="display:none;"></td> -->
								<td style="display:none;"></td>
								<td><a href="<?php echo site_url('pelatihan_blk/detail_laporan_pelatihan_blk/'.$row->idnyabuat); ?>" class="btn btn-primary" type="button">Tampil CTKI</a>
								<td style="display:none;"><a href="<?php echo base_url(); ?>index.php/pdf13/cetak/<?php echo $row->idnyabuat;?>" target="_blank" class="btn btn-info"><i class="icon-printer2"></i> Print</a></td>                                         								
								<td class="text-center">
										<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
										<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
									</td> 
							</tr>
						<!-- UPDATE laporan_bulanan TKI -->
							<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update Laporan Bulanan</h5>
										</div>
										<div class="modal-body">
										<form action="<?php echo site_url('pelatihan_blk/update_data_laporan_pelatihan_blk'); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_laporan_blk" value="<?php echo $row->idnyabuat; ?>">
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Tanggal Dokumen </label>
														<div class="col-sm-9">
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																<input type="date" class="form-control daterange-single" data-format='yyyy.MM.dd' name="tanggal" value="<?php echo $row->tanggal; ?>" />
															</div>
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
						<!-- /UPDATE laporan_bulanan TKI -->
						<!-- HAPUS laporan_bulanan TKI -->
							<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Hapus Laporan Bulanan </h5>
										</div>
										<form action="<?php echo site_url('pelatihan_blk/hapus_data_laporan_pelatihan_blk'); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_laporan_blk" value="<?php echo $row->idnyabuat; ?>">
												<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->idnyabuat; ?> </code> ?</p>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- /HAPUS laporan_bulanan TKI -->
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