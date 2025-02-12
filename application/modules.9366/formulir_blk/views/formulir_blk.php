	<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">DATA FORMULIR BLK</span> - TKI</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Formulir BLK</span></a>
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
								<h5 class="modal-title">Tambah Formulir</h5>
							</div>
							<form action="<?php echo site_url('formulir_blk/simpan_data_formulir_blk'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Pengajuan </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control dewdate2" name="tgl_pengajuan" placeholder="Tanggal Pengajuan" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Keluar </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control dewdate2" name="tgl_keluar" placeholder="Tanggal Keluar" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal UJK </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<input type="text" class="form-control dewdate2" name="tgl_ujk" placeholder="Tanggal UJK" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tipe </label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
												<select name="tipe" class="select-search" data-placeholder="Pilih Tipe">
													<?php 
														$datan = array('BLK-LN','LPKS');
														for ( $i=0; $i<count($datan); $i++ ) 
														{
															$selector = '';
															if ( $datan[$i] == 'LPKS' ) 
															{
																$selector = 'selected="selected"';
															}
													?>
															<option value="<?php echo $datan[$i]; ?>" <?php echo $selector; ?> ><?php echo $datan[$i]; ?></option>
													<?php
														}
													?>
												</select>
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
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH FORMULIR TKI</button>
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
									<th>Tanggal Pengajuan</th>
									<th>Tanggal Keluar</th>
									<th>Tanggal UJK</th>
									<th>Tipe</th>
									<th>Tampil CTKI</th>
									<th class="text-center">ACTIONS</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$no = 1; 
	                                foreach ($tampil_data_formulir as $row) 
	                                { 
	                            ?>
										<tr>
											<td><?php echo $no;?></td>
											<td><?php echo $row->tgl_pengajuan;?></td>
											<td><?php echo $row->tgl_keluar;?></td>
											<td><?php echo $row->tgl_ujk;?></td>
											<td><?php echo $row->tipe;?></td>
											<td><a href="<?php echo site_url('formulir_blk/detail_formulir_blk/'.$row->idnyabuat); ?>" class="btn btn-primary" type="button">Tampil CTKI</a>                               								
											<td class="text-center">
												<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
											</td> 
										</tr>

										<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header bg-warning">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">Update Formulir BLK</h5>
													</div>
													<div class="modal-body">
													<form action="<?php echo site_url('formulir_blk/update_data_formulir_blk'); ?>" class="form-horizontal" method="post">										
														<input type="hidden" class="form-control" name="id_formulir" value="<?php echo $row->idnyabuat; ?>">
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Tanggal Pengajuan </label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		<input type="text" class="form-control dewdate2" name="tgl_pengajuan" placeholder="Tanggal Pengajuan" value="<?php echo $row->tgl_pengajuan; ?>" />
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Tanggal Keluar </label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		<input type="text" class="form-control dewdate2" name="tgl_keluar" placeholder="Tanggal Keluar" value="<?php echo $row->tgl_keluar; ?>" />
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label class="control-label col-sm-3">Tanggal UJK </label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		<input type="text" class="form-control dewdate2" name="tgl_ujk" placeholder="Tanggal UJK" value="<?php echo $row->tgl_ujk; ?>" />
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

										<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
											<div class="modal-dialog modal-md">
												<div class="modal-content">
													<div class="modal-header bg-danger">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h5 class="modal-title">Hapus Laporan Bulanan </h5>
													</div>
													<form action="<?php echo site_url('formulir_blk/hapus_data_formulir_blk'); ?>" class="form-horizontal" method="post">										
														<div class="modal-body">
															<input type="hidden" class="form-control" name="id_formulir" value="<?php echo $row->idnyabuat; ?>">
															<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $no; ?> </code> ?</p>
															<div class="modal-footer">
																<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-primary">Ya</button>
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
			&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
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