<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Data Surat Pelatihan</span> - TKI</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data detail pelatihan BLK</span></a>
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

					<div class="col-md-4">

						<!-- Custom handle -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">DATA CTKI</h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<ul class="media-list">
							<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA CTKI</button>

							<?php $no = 1; 
                                    foreach ($tampil_data_detail as $row) { ?>
									<li class="media">
										<div class="media-left"><img src="<?php echo base_url().'/assets/uploads/'.$row->foto; ?>" class="img-circle" alt=""></div>
										<div class="media-body">
											<div class="media-heading text-semibold"><?php echo $row->nama;?></div>
											<span class="text-muted"><?php echo $row->nodaftar;?></span>
										</div>
										<div class="media-right media-middle">
											<ul class="icons-list text-nowrap">
												<li><a data-toggle="collapse" data-target="#james<?php echo $no; ?>"><i class="icon-menu7"></i></a></li>
											</ul>
										</div>

										<div class="collapse" id="james<?php echo $no; ?>">
											<div class="contact-details">
												<ul class="list-extended list-unstyled list-icons">
													<!-- <li><i class="icon-pin position-left"></i> Amsterdam</li>
													<li><i class="icon-user-tie position-left"></i> Senior Designer</li> -->
													<li> </li>
													<li>
														<!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button>  -->
														<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
													</li>
												</ul>
											</div>
										</div>
									</li>

									<!-- UPDATE tampil_ctki TKI -->
							<div id="edit<?php echo $no; ?>" class="modal fade">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Update Surat Pelatihan BLK <?php echo $row->id_laporan_blk; ?></h5>
										</div>
										<div class="modal-body">
										<form action="<?php echo site_url('pelatihan_blk/update_detail_laporan_pelatihan_blk/'.$id_laporan_blk); ?>" class="form-horizontal" method="post">										
											<input type="hidden" class="form-control" name="id_laporan_blk" value="<?php echo $row->id_laporan_blk; ?>">
												<div class="form-group">
													<div class="row">
														<label class="control-label col-sm-3">PILIH CTKI </label>
														<div class="col-sm-9">
															<select class="select-results-color" name="id1" >
																<option value=""></option>
																<?php  foreach ($tampil_data_all as $pilihan) { ?>
																<option value="<?php echo $pilihan->nodaftar;?>" /><?php echo $pilihan->nama." - ".$pilihan->nodaftar;?>
																<?php } ?>
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
						<!-- /UPDATE tampil_ctki TKI -->
						<!-- HAPUS tampil_ctki TKI -->
							<div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
										<div class="modal-header bg-danger">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h5 class="modal-title">Hapus CTKI </h5>
										</div>
											<form action="<?php echo site_url('pelatihan_blk/hapus_detail_laporan_pelatihan_blk/'.$id_laporan_blk); ?>" class="form-horizontal" method="post">										
											<div class="modal-body">
												<input type="hidden" class="form-control" name="id_laporan_blk" value="<?php echo $row->id_laporan_blk; ?>">
												<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->nodaftar; ?> </code> ?</p>
												<div class="modal-footer">
													<button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
													<button type="submit" class="btn btn-primary">Ya</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

									<?php $no++;  } ?>
									
									
								</ul>
							</div>
						</div>
						<!-- /custom handle -->
						
					</div>
					<div class="col-md-8">
						<div class="panel panel-flat">
						<h6 class="content-group text-semibold">&nbsp Administrasi Keuangan<small class="display-block">&nbsp Keuangan dan Akunting BLK</small></h6>

						<div class="panel-group" id="accordion-styled">
							<div class="panel">
								<div class="panel-heading bg-danger">
									<h6 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">PEMBAYARAN BIAYA UJK (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group1" class="panel-collapse collapse">
									<div class="panel-body">

										<?php if($hitung_data_bayarujk==0){?>
										<form action="<?php echo site_url('pelatihan_blk/simpan_detailbayarujk/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Resi :</label>
												<div class="col-lg-8">
													<input type="text" name="noresi" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" class="form-control" placeholder="27-03-1989">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama LSP :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="lembagalsp">
														<option value=""></option>
														<?php  foreach ($tampil_data_lsp as $pilihan) { ?>
														<option value="<?php echo $pilihan->id_lembaga_lsp;?>" /><?php echo $pilihan->nama; echo " - ".$pilihan->alamat;?>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
										<!-- <button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<button type="submit" class="btn btn-danger">Print <i class="fa fa-print position-right"></i></button> -->
									</div>
								</form>

								<?php }else{?>
								<?php foreach ($tampil_data_bayarujk as $rows) { ?>
								<form action="<?php echo site_url('pelatihan_blk/ubah_detailbayarujk/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Resi :</label>
												<div class="col-lg-8">
													<input type="text" name="noresi" value="<?php echo $rows->noresi;?>" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" value="<?php echo $rows->tglsurat;?>"  class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama LSP :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="lembagalsp">
															<option value="<?php echo $rows->lembagalsp;?>"><?php echo $rows->nama; echo " - ".$rows->alamat;?></option>
														   <?php  foreach ($tampil_data_lsp as $pilihan) { ?>
															<option value="<?php echo $pilihan->id_lembaga_lsp;?>" /><?php echo $pilihan->nama; echo " - ".$pilihan->alamat;?>
														   <?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya"  value="<?php echo $rows->biaya;?>" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<!-- <button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button> -->
										<button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_biaya_ujk/<?php echo $rows->id_bayar_ujk;?>" target="_blank" class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
									</div>
								</form>

								<?php } }?>
										
									</div>
								</div>
							</div>

							<div class="panel">
								<div class="panel-heading bg-teal">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group2">INVOICE BIAYA UJK (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group2" class="panel-collapse collapse">
									<div class="panel-body">

										<?php if($hitung_data_invoiceujk==0){?>
										<form action="<?php echo site_url('pelatihan_blk/simpan_detailinvoiceujk/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_ujk" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" class="form-control" placeholder="27-03-1989">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama Pemilik :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="blk_pemilik">
														<option value=""></option>
														<?php  foreach ($tampil_data_pemilik as $pilihan) { ?>
														<option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " - ".$pilihan->negara;?>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
										<!-- <button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<button type="submit" class="btn btn-danger">Print <i class="fa fa-print position-right"></i></button> -->
									</div>
								</form>

								<?php }else{?>
								<?php foreach ($tampil_data_invoiceujk as $rows) { ?>
								<form action="<?php echo site_url('pelatihan_blk/ubah_detailinvoiceujk/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_ujk" value="<?php echo $rows->noinvoice_ujk;?>" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" value="<?php echo $rows->tglsurat;?>"  class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama Pemilik :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="blk_pemilik">
															<option value="<?php echo $rows->id_pemilik;?>"><?php echo $rows->isi; echo " - ".$rows->negara;?></option>
														   <?php  foreach ($tampil_data_pemilik as $pilihan) { ?>
															<option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " - ".$pilihan->negara;?>
														   <?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya"  value="<?php echo $rows->biaya;?>" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<!-- <button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button> -->
										<button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_invoice_ujk/<?php echo $rows->id_invoice_ujk;?>"  target="_blank" class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
									</div>
								</form>

								<?php } }?>
										
									</div>
								</div>
							</div>

							<div class="panel">
								<div class="panel-heading bg-primary">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3">INVOICE REFUND TUK (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group3" class="panel-collapse collapse">
									<div class="panel-body">

										<?php if($hitung_data_invoice_reftuk==0){?>
										<form action="<?php echo site_url('pelatihan_blk/simpan_detailinvoice_reftuk/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_reftuk" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" class="form-control" placeholder="27-03-1989">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama LSP :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="lembagalsp">
														<option value=""></option>
														<?php  foreach ($tampil_data_lsp as $pilihan) { ?>
														<option value="<?php echo $pilihan->id_lembaga_lsp;?>" /><?php echo $pilihan->nama; echo " - ".$pilihan->alamat;?>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
										<!-- <button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<button type="submit" class="btn btn-danger">Print <i class="fa fa-print position-right"></i></button> -->
									</div>
								</form>

								<?php }else{?>
								<?php foreach ($tampil_data_invoice_reftuk as $rows) { ?>
								<form action="<?php echo site_url('pelatihan_blk/ubah_detailinvoice_reftuk/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_reftuk" value="<?php echo $rows->noinvoice_reftuk;?>" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" value="<?php echo $rows->tglsurat;?>"  class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama LSP :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="lembagalsp">
															<option value="<?php echo $rows->lembagalsp;?>"><?php echo $rows->nama; echo " - ".$rows->alamat;?></option>
														   <?php  foreach ($tampil_data_lsp as $pilihan) { ?>
															<option value="<?php echo $pilihan->id_lembaga_lsp;?>" /><?php echo $pilihan->nama; echo " - ".$pilihan->alamat;?>
														   <?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya"  value="<?php echo $rows->biaya;?>" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<!-- <button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button> -->
										<button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_invoice_reftuk/<?php echo $rows->id_invoice_reftuk;?>"  target="_blank" class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
									</div>
								</form>

								<?php } }?>
										
									</div>
								</div>
							</div>

							<div class="panel">
								<div class="panel-heading bg-warning">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group4">INVOICE BIAYA PELATIHAN (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group4" class="panel-collapse collapse">
									<div class="panel-body">

										<?php if($hitung_data_invoice_pelatihan==0){?>
										<form action="<?php echo site_url('pelatihan_blk/simpan_detailinvoice_pelatihan/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_pelatihan" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" class="form-control" placeholder="27-03-1989">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama Pemilik :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="blk_pemilik">
														<option value=""></option>
														<?php  foreach ($tampil_data_pemilik as $pilihan) { ?>
														<option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " - ".$pilihan->negara;?>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>
										<!-- <button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<button type="submit" class="btn btn-danger">Print <i class="fa fa-print position-right"></i></button> -->
									</div>
								</form>

								<?php }else{?>
								<?php foreach ($tampil_data_invoice_pelatihan as $rows) { ?>
								<form action="<?php echo site_url('pelatihan_blk/ubah_detailinvoice_pelatihan/'.$id_laporan_blk);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_pelatihan" value="<?php echo $rows->noinvoice_pelatihan;?>" class="form-control" placeholder="25/III/2017">
												</div>
											</div>
										</div>

										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Tanggal Surat :</label>
												<div class="col-lg-8">
													<input type="date" name="tglsurat" value="<?php echo $rows->tglsurat;?>"  class="form-control">
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Nama Pemilik :</label>
												<div class="col-lg-8">
													<select class="select-results-color" name="blk_pemilik">
															<option value="<?php echo $rows->id_pemilik;?>"><?php echo $rows->isi; echo " - ".$rows->negara;?></option>
														   <?php  foreach ($tampil_data_pemilik as $pilihan) { ?>
															<option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->isi; echo " - ".$pilihan->negara;?>
														   <?php } ?>
													</select>
												</div>
											</div>
										</div>

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya :</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biaya"  value="<?php echo $rows->biaya;?>" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<!-- <button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button> -->
										<button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_invoice_pelatihan/<?php echo $rows->id_invoice_pelatihan;?>"  target="_blank" class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
									</div>
								</form>

								<?php } }?>
										
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- /accordion with different panel styling -->


					</div>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->
<!-- TAMBAH detail pelatihan TKI -->
				<div id="modal_form_horizontal" class="modal fade">
					<div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah CTKI</h5>
                            </div>
							<form action="<?php echo site_url('pelatihan_blk/simpan_detail_laporan_pelatihan_blk/'.$id_laporan_blk);?>"  method="post" class="form-horizontal">
								<div class="modal-body">
								<input type="hidden" class="form-control" name="id_laporan_blk" value="<?php echo $id_laporan_blk; ?>">
									
									<div class="form-group">
									<label class="control-label col-sm-3"> PILIH CTKI </label>
										<div class="col-sm-9">
											<select class="select-results-color" name="id1" >
												 <option value=""></option>
												<?php  foreach ($tampil_data_all as $pilihan) { ?>
												<option value="<?php echo $pilihan->nodaftar;?>" /><?php echo $pilihan->nama." - ".$pilihan->nodaftar;?>
												 <?php	} ?>
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
				<!-- /TAMBAH tampil_ctki TKI -->

		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
		</div>
		<!-- /footer -->

	</div>
	<!-- /page container -->