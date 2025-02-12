	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">DATA INVENTARIS BLK</span></h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Inventaris BLK</span></a>
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
								<h5 class="modal-title">Tambah Data Inventaris</h5>
							</div><form action="<?php echo site_url('blk_inventaris/simpan_data_blk_inventaris'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Masuk </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control dewdate2" name="tglmasuk" placeholder="Tanggal Masuk" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="control-label col-sm-3"> Nama Barang </label>
											<div class="col-sm-9">
												<select class="select-menu-color" name="id_barang"  required="required">
													<option value=""/>Pilih barang...</option>
													<?php  
														foreach ($tampil_data_barang as $pilihan) { 
													?>
															<option value="<?php echo $pilihan->id_barang;?>" /><?php echo $pilihan->nama;?>
													<?php  
														} 
													?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Keluar </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control dewdate2" name="tglkeluar" placeholder="Tanggal Keluar" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jumlah Awal</label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"></span>
												<input type="text" class="form-control" name="jumlah" placeholder="Jumlah Awal Barang" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jumlah Keluar</label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"></span>
												<input type="text" class="form-control" name="jumlahkeluar" placeholder="Jumlah Keluar Barang" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Pemohon </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"></i></span>
												<input type="text" class="form-control" name="pemohon" placeholder="Pemohon" />
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
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA INVENTARIS</button>
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
									<th>Tanggal Masuk</th>
									<th>Barang Masuk</th>
									<th>Tanggal Keluar</th>
									<th>Pemohon</th>
									<th>Jumlah Awal</th>
									<th>Jumlah Keluar</th>
									<th>Sisa Barang</th>
									<th class="text-center">ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 1; 
	                                foreach ($tampil_data_inventaris as $row) 
	                                { 
	                            ?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $row->tglmasuk;?></td>
											<td><?php echo $row->nama;?></td>
											<td><?php echo $row->tglkeluar;?></td>
											<td><?php echo $row->pemohon;?></td>
											<td><?php echo $row->jumlah;?></td>
											<td><?php echo $row->jumlahkeluar;?></td>
											<td><?php echo $row->sisanya;?></td>
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
														<h5 class="modal-title">Update Inventaris BLK</h5>
													</div>
													<div class="modal-body">
													<form action="<?php echo site_url('blk_inventaris/ubah_data_blk_inventaris'); ?>" class="form-horizontal" method="post">										
														<input type="hidden" class="form-control" name="idnyainventaris"  value="<?php echo $row->idnyainventaris; ?>">
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Tanggal Masuk</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		<input type="text" class="form-control dewdate2" name="tglmasuk" placeholder="Tanggal Masuk" value="<?php echo $row->tglmasuk;?>" />
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3"> Nama Barang </label>
																<div class="col-sm-9">
																	<select class="select-menu-color" name="id_barang"  required="required">
																		<option value="<?php echo $row->id_barang;?>" ><?php echo $row->nama;?></option>
																		<?php  
																			foreach ($tampil_data_barang as $pilihan) { 
																		?>
																				<option value="<?php echo $pilihan->id_barang;?>" /><?php echo $pilihan->nama;?>
																		<?php  
																			} 
																		?>
																	</select>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Tanggal Keluar </label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		<input type="text" class="form-control dewdate2" name="tglkeluar" placeholder="Tanggal Keluar" value="<?php echo $row->tglkeluar; ?>" />
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Jumlah Awal</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"></span>
																		<input type="text" class="form-control" name="jumlah" placeholder="Jumlah Awal barang" value="<?php echo $row->jumlah; ?>" />
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Jumlah Keluar</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"></span>
																		<input type="text" class="form-control" name="jumlahkeluar" placeholder="Jumlah Keluar Barang" value="<?php echo $row->jumlahkeluar; ?>" />
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Pemohon</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"></span>
																		<input type="text" class="form-control" name="pemohon" placeholder="Pemohon" value="<?php echo $row->pemohon; ?>" />
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
													<form action="<?php echo site_url('blk_inventaris/hapus_data_blk_inventaris'); ?>" class="form-horizontal" method="post">										
														<div class="modal-body">
															<input type="hidden" class="form-control" name="idnyainventaris" value="<?php echo $row->idnyainventaris; ?>">
															<p>Anda yakin ingin menghapus data<code class="text-danger">Tanggal Masuk: <?php echo $row->tglmasuk; ?> Nama Barang: <?php echo $row->nama;?></code> ?</p>
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