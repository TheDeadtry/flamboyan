<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>JADWAL PELATIHAN </h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data Jadwal</span></a>
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
								<h5 class="modal-title">Tambah Grup Jadwal</h5>
							</div>
							<form action="<?php echo site_url('setting_adm_blk/simpan_data_jadwal'); ?>" class="form-horizontal" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label class="control-label col-sm-3">Kode Jadwal</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Kode Jadwal" class="form-control" name="kode_jadwal">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama Jadwal</label>
										<div class="col-sm-9">
											<input type="text" placeholder="Nama Jadwal" class="form-control" name="nama_jadwal">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Minggu</label>
										<div class="col-sm-6">
											<select multiple="multiple" class="txx" name="minggu[]">
												<?php 
													foreach ($tampil_data_blk_minggu as $minggu) {
												?>
													<option value="<?php echo $minggu->id_minggu ?>"><?php echo $minggu->kode_minggu; ?></option>
												<?php 
													}
												?>
											</select>
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
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH GRUP JADWAL </button>
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
								<th>KODE JADWAL</th>
								<th>NAMA JADWAL</th>
								<th>MINGGU</th>
								<th>TAMPIL DETAIL JADWAL</th>
								<th class="text-center">ACTIONS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no = 1; 
                            foreach ($tampil_data_jadwal as $row) { 
						?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $row->kode_jadwal;?></td>
								<td><?php echo $row->nama_jadwal;?></td>
								<td>
									<?php 
										$minggus = $this->M_setting_adm_blk->jadwal_minggu_get($row->kode_jadwal);
										foreach ($minggus as $yeyek) {
											echo $yeyek->kode_minggu.'<br/>';
										}
									?>
								</td>
								<td>
									<A class="btn btn-warning btn-sm" href="<?php echo site_url('setting_adm_blk/jadwaldetail/'.$row->kode_jadwal) ?>">TAMPIL DETAIL JADWAL</A>
								</td>
								<td class="text-center">
									<a class="btn btn-primary btn-sm" href="<?php echo site_url('setting_adm_blk/jadwalprintdata/'.$row->kode_jadwal) ?>" target="_blank"><i class="fa fa-print position-right"></i>Print</a> 
									<button class="btn btn-warning btn-sm editt" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
									<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
								</td> 
							</tr><!--
							<script type="text/javascript">
	   							//$(document).ready(function(){
									$(".js-example-basic-multiple<?php echo $no ?>").select2();
									$(".js-example-basic-multiple<?php echo $no ?>").val([<?php echo $resz ?>]).trigger("change");
								//});
							</script>-->
						<!-- UPDATE jadwal -->
							<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update Grup Jadwal</h5>
										</div>
										<div class="modal-body">
										<form action="<?php echo site_url('setting_adm_blk/update_data_jadwal/'.$row->kode_jadwal); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $row->id_jadwal; ?>">
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Kode Jadwal</label>
														<div class="col-sm-9">
															<input type="text" placeholder="Kode Jadwal" class="form-control" name="kode_jadwal" value="<?php echo $row->kode_jadwal; ?>" disabled="disabled">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Nama Jadwal</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="jadwal" value="<?php echo $row->nama_jadwal; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">Minggu</label>
														<div class="col-sm-9">
															<select multiple="multiple" class="js-example-programmatic-multi-s1-<?php echo $no ?>" name="minggu[]">
																<?php 
																	foreach ($tampil_data_blk_minggu as $minggu) {
																?>
																	<option value="<?php echo $minggu->id_minggu ?>"><?php echo $minggu->kode_minggu; ?></option>
																<?php 
																	}
																?>
															</select>
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
											<h5 class="modal-title">Hapus Grup Jadwal </h5>
										</div>
										<form action="<?php echo site_url('setting_adm_blk/hapus_data_jadwal'); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $row->id_jadwal; ?>">
												<p>Apakah anda yakin akan menghapus data<code class="text-danger"> <?php echo $row->kode_jadwal.' : '.$row->nama_jadwal; ?></code> ?</p>
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
						<tfoot>
							<tr>
								<td class="text-center" colspan="6"></td>
							</tr>
						</tfoot>
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
		<script type="text/javascript">
				var $txx = $(".txx").select2();

				$(".js-programmatic-multi-clear_<?php echo $no ?>").on("click", function () { $exampleMulti.val(null).trigger("change"); });
				<?php
					$nov = 1;
                    foreach ($tampil_data_jadwal as $row) { 
	                    $diko = $this->M_setting_adm_blk->distinct_jadwal($row->kode_jadwal);
	                    $jid = "";
	                    if ($diko != NULL) {
	                        foreach ($diko as $ee3) {
	                        	$jid   = '"'.$ee3->minggu_id.'", '.$jid;
							}
	                    	$resz = substr($jid , 0, -2);
	                    	echo '
							var $exampleMulti = $(".js-example-programmatic-multi-s1-'.$nov.'").select2();
							$exampleMulti.val(['.$resz.']).trigger("change"); 
							';
	                    } else {
	                    	echo '
							var $exampleMulti = $(".js-example-programmatic-multi-s1-'.$nov.'").select2();
							$exampleMulti.val([]).trigger("change"); 
							';
	                    }
	                $nov++;
                	}
	            ?>
				//for ($noh=1;$noh<count(resz);$noh++) {
				//}
		</script>