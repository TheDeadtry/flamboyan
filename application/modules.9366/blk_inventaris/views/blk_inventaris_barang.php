	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">DATA BARANG BLK</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Barang BLK</span></a>
				</div>
			</div>
		</div>
	</div>

	<div class="page-container">

		<div class="page-content">

			<div class="content-wrapper">

				<div id="modal_form_horizontal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" >
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Tambah Data Barang</h5>
							</div>
							<form action="<?php echo site_url('blk_inventaris/simpan_data_barang'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Barang </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"></i></span>
												<input type="text" class="form-control" name="nama" placeholder="Nama Barang" />
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
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH SETTING BARANG</button>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>
					<div class="panel-body">
						<table class="table table-bordered" id="fixedeks">
							<thead>
								<tr>
									<th>NO </th>
									<th>Nama Barang</th>
									<th class="text-center">ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 1; 
	                                foreach ($tampil_data_barang as $row) 
	                                { 
	                            ?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $row->nama;?></td>
											<td class="text-center">
												<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $row->idnyainventaris; ?>"><i class="icon-pencil"></i> Edit</button>
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row->idnyainventaris; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
               								</td> 
										</tr>

										<div id="edit<?php echo $row->idnyainventaris; ?>" class="modal fade" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header bg-warning">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">Update Barang Inventaris</h5>
													</div>
													<div class="modal-body">
													<form action="<?php echo site_url('blk_inventaris/ubah_data_barang'); ?>" class="form-horizontal" method="post">										
														<input type="hidden" class="form-control" name="idnyainventaris"  value="<?php echo $row->idnyainventaris; ?>">
													    <div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Nama Barang</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"></span>
																		<input type="text" class="form-control " name="nama" placeholder="Nama Barang" value="<?php echo $row->nama;?>" />
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
										<div id="hapus<?php echo $row->idnyainventaris; ?>" class="modal fade" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header bg-danger">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">Hapus Data Inventaris </h5>
													</div>
													<form action="<?php echo site_url('blk_inventaris/hapus_data_barang'); ?>" class="form-horizontal" method="post">										
														<div class="modal-body">
															<input type="hidden" class="form-control" name="idnyainventaris" value="<?php echo $row->idnyainventaris; ?>>
															<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->nama; ?> </code> ?</p>
															<div class="modal-footer">
																<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-warning">Ya</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
								<?php 
									$no++;  
									} 
								?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- /style combinations -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->


		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2015. <a href="#">Limitless Web App Kit</a> not by<a href="#"> Hendrik RØD</a> but by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->
	<script type="text/javascript">
		$('#fixedeks').dataTable({
			"searchable": true,
			bFilter: true,
			"lengthChange": true,
		});

	</script>