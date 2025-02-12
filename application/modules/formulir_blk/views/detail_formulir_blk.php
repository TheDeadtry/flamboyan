<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Data Formulir ( <?php echo $tampil_data_formulir->tipe ?> )</span> - TKI</h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Data detail Formulir BLK</span></a>
				</div>
			</div>
		</div>
	</div>

	<div class="page-container">

		<div class="page-content">

			<div class="content-wrapper">

					<div class="col-md-4">

						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">DATA CTKI</h5>
								<div class="heading-elements">
									<a href="<?php echo site_url('formulir_blk/printlulus/'.$id_formulir); ?>" class="btn bg-indigo btn-sm">PRINT KELULUSAN</a> 
			                	</div>
							</div>

							<div class="panel-body">
								<ul class="media-list">
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA CTKI</button>
									<a href="<?php echo site_url('formulir_blk/blk_cetak_semua/'.$id_formulir); ?>" class="btn btn-danger btn-sm"><i class="icon-printer2"></i>PRINT PENDAFTAR UJK</a> 
									<a style="padding:5px;" href="<?php echo site_url('formulir_blk/blk_cetak_pendaftar/'.$id_formulir); ?>" class="btn btn-danger btn-sm"><i class="icon-printer2"></i>PRINT PENDAFTAR UJK BARU</a> 
									<?php 
										$no = 1; 
                                    	foreach ($tampil_data_detail as $row) 
                                    	{ 
                                    ?>
											<li class="media">
												<div class="media-left"><img src="<?php echo base_url().'/assets/uploads/'.$row->person_fotonya; ?>" class="img-circle" alt=""></div>
												<div class="media-body">
													<?php 

													$zyxpilsek = substr($row->nodaftar, 0, 2);
														if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') 
														{
															$aslineg = $row->negaradituju;
														} 
														else 
														{
															$aslineg = $row->negara;
														}
													?>

													<div class="media-heading text-semibold"><?php echo $row->namazz." ";?> 
														<span class="label label-success"><?php echo $row->ket." ";?> </span> 
														<span class="label label-danger"><?php echo $aslineg;?> </span>
													</div>
													<span class="text-muted"><?php echo $row->nodaftar;?></span>
													<div class="media-heading text-muted">Bahasa : <?php echo $row->bahasa." ";?> 
														<a href="#" data-toggle="modal" data-target="#editbahasa<?php echo $no; ?>">
															<i class="icon-pencil3"></i>
															<span></span>
														</a>
													</div>
													<div class="media-heading text-muted">Cluster: <?php echo $row->cluster." ";?> </div>
													<div class="media-heading text-muted">KELULUSAN : <b class="kelulusan<?= $row->nodaftar; ?>"><?php echo $row->statujk." ";?></b> 
														<?php if($row->statujk == 'LULUS') : ?>
															<input formulir="<?= $row->id_detail_formulir; ?>" idtkw="<?= $row->nodaftar; ?>"  checked class="lulus" id="centang<?= $no; ?>" style="font-size: 25px;" type="checkbox">
															<?php else : ?>
															<input class="lulus" formulir="<?= $row->id_detail_formulir; ?>" idtkw="<?= $row->nodaftar; ?>" id="centang<?= $no; ?>" style="font-size: 25px;" type="checkbox">
														<?php endif; ?>
														<label for="centang<?= $no; ?>">centang jika lulus</label>
													</div>
												</div>
												<div class="media-right media-middle">
													<ul class="icons-list text-nowrap">
														<li><a data-toggle="collapse" data-target="#james<?php echo $no; ?>"><i class="icon-menu7"></i></a></li>
													</ul>
												</div>

												<div class="collapse" id="james<?php echo $no; ?>">
													<div class="contact-details">
														<ul class="list-extended list-unstyled list-icons">
															<li></li>
															<li>
																<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
																<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
																<a href="<?php echo site_url('formulir_blk/blk_cetak_sertifikat/'.$row->id_detail_formulir); ?>" class="btn btn-primary btn-sm"><i class="icon-printer2"></i>PRINT SERTIFIKAT</a> 
															</li>
														</ul>
													</div>
												</div>
											</li>

											<div id="editnilai<?php echo $no; ?>" class="modal fade" role="dialog" tabindex='-1'>
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">UPDATE KELULUSAN UJK <?php echo $row->nodaftar; ?></h5>
														</div>
														<div class="modal-body">
														<form action="<?php echo site_url('formulir_blk/update_detail_formulir_blk_nilai/'.$id_formulir); ?>" class="form-horizontal" method="post">										
															<input type="hidden" class="form-control" name="nodaftar" value="<?php echo $row->nodaftar; ?>">
														
																<div class="form-group">
																	<div class="row">
																		<label class="control-label col-sm-3">KELULUSAN </label>
																		<div class="col-sm-8">
																			<select class="select-menu-color" name="nilai" >
																				<option value="<?php echo $row->statujk;?>"/><?php echo $row->statujk;?>
																				<option value="LULUS"/>LULUS
																				<option value="TIDAK LULUS"/>TIDAK LULUS
																			</select>
																		</div>
																	</div>
																</div>
																
															<hr>
															<div class="modal-footer">
																<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-primary">Simpan</button>
															</div>
														</form>
														</div>
													</div>
												</div>
											</div>

											<div id="editbahasa<?php echo $no; ?>" class="modal fade" role="dialog" tabindex='-1'>
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">UPDATE BAHASA <?php echo $row->nodaftar; ?></h5>
														</div>
														<div class="modal-body">
														<form action="<?php echo site_url('formulir_blk/update_detail_formulir_blk_bahasa/'.$id_formulir); ?>" class="form-horizontal" method="post">										
															<input type="hidden" class="form-control" name="nodaftar" value="<?php echo $row->nodaftar; ?>">
														
																<div class="form-group">
																	<div class="row">
																		<label class="control-label col-sm-3">BAHASA </label>
																		<div class="col-sm-8">
																			<select class="select-menu-color" name="bahasa" >
																				<option value="<?php echo $row->bahasa;?>"/><?php echo $row->bahasa;?>
																				<?php  
																					foreach ($tampil_data_bahasa_tki as $pilihan) 
																					{ 
																				?>
																						<option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
																				<?php 
																					} 
																				?>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row">
																		<label class="control-label col-sm-3">Cluster </label>
																		<div class="col-sm-8">
																			<select class="select-menu-color" name="cluster" >
																				<option value="<?php echo $row->cluster;?>"/><?php echo $row->cluster;?>
																				<?php  
																					foreach ($tampil_data_cluster_tki as $pilihan) 
																					{ 
																				?>
																						<option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
																				<?php 
																					} 
																				?>
																			</select>
																		</div>
																	</div>
																</div>
															<hr>
															<div class="modal-footer">
																<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
																<button type="submit" class="btn btn-primary">Simpan</button>
															</div>
														</form>
														</div>
													</div>
												</div>
											</div>

											<div id="edit<?php echo $no; ?>" class="modal fade" role="dialog" tabindex='-1'>
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h5 class="modal-title">UPDATE SURAT PELATIHAN BLK <?php echo $row->id_detail_formulir; ?></h5>
														</div>
														<div class="modal-body">
														<form action="<?php echo site_url('formulir_blk/update_detail_formulir_blk/'.$id_formulir); ?>" class="form-horizontal" method="post">										
															<input type="hidden" class="form-control" name="id_detail_formulir" value="<?php echo $row->id_detail_formulir; ?>">
														
																<div class="form-group">
																	<div class="row">
																		<label class="control-label col-sm-3">No Serlok </label>
																		<div class="col-sm-8">
																			<input type="text" class="form-control"  name="noserlok"  value="<?php echo $row->noserlok;?>" placeholder="470/BLK-LN /FGJM/III/2017">
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row">
																		<label class="control-label col-sm-3">Jenis Ujian </label>
																		<div class="col-sm-8">
																			<select class="select-menu-color" name="ket" >
																				<option value="<?php echo $row->ket;?>"/><?php echo $row->ket;?>
																				<?php  
																					foreach ($tampil_data_jenisujian as $pilihan) 
																					{ 
																				?>
																						<option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
																				<?php 
																					} 
																				?>
																			</select>
																		</div>
																	</div>
																</div>
															<hr>
															<div class="modal-footer">
																<button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
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
															<h5 class="modal-title">Hapus CTKI </h5>
														</div>
															<form action="<?php echo site_url('formulir_blk/hapus_detail_formulir_blk/'.$id_formulir); ?>" class="form-horizontal" method="post">										
															<div class="modal-body">
																<input type="hidden" class="form-control" name="id_detail_formulir" value="<?php echo $row->id_detail_formulir; ?>">
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

									<?php 
										$no++;  
										} 
									?>
									
								</ul>
							</div>
						</div>
						
					</div>
					<div class="col-md-8">
						<div class="panel panel-flat">
						<h6 class="content-group text-semibold">&nbsp FORMULIR PENGAJUAN <small class="display-block">&nbsp TKI</small></h6>

						<div class="panel-group" id="accordion-styled">
							<div class="panel">
								<div class="panel-heading bg-primary">
									<h6 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">FORM PENGAJUAN UJK (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group1" class="panel-collapse collapse">
									<div class="panel-body">

										<?php 
											if($hitung_data_pengajuanujk==0)
											{
										?>
												<form action="<?php echo site_url('formulir_blk/simpan_detailpengajuanujk/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

													<div class="form-group">
														<div class="row">
															<label class="col-lg-2 control-label">No. Pengajuan </label>
															<div class="col-lg-8">
																<input type="text" name="no_pengajuan" class="form-control" placeholder="470/BLK-LN /FGJM/III/2017">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div class="row">
															<label class="col-lg-2 control-label">Nama LSP </label>
															<div class="col-lg-8">
																<select class="select-results-color" name="lembagalsp">
																	<option value=""></option>
																	<?php  
																		foreach ($tampil_data_lsp as $pilihan) 
																		{ 
																	?>
																			<option value="<?php echo $pilihan->id_lembaga_lsp;?>" /><?php echo $pilihan->nama; echo " - ".$pilihan->alamat;?>
																	<?php 
																		} 
																	?>
																</select>
															</div>
														</div>
													</div>

													<div class="text-right">
														<button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button>>
													</div>

												</form>

										<?php 
											}
											else
											{
												foreach ($tampil_data_pengajuanujk as $rows) 
												{ 
										?>
													<form action="<?php echo site_url('formulir_blk/ubah_detailpengajuanujk/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

														<div class="form-group">
															<div class="row">
																<label class="col-lg-2 control-label">No Pengajuan </label>
																<div class="col-lg-8">
																	<input type="text" name="no_pengajuan" value="<?php echo $rows->no_pengajuan;?>" class="form-control" placeholder="470/BLK-LN /FGJM/III/2017">
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="row">
																<label class="col-lg-2 control-label">Nama LSP </label>
																<div class="col-lg-8">
																	<select class="select-results-color" name="lembagalsp">
																		<option value="<?php echo $rows->lembagalsp;?>"><?php echo $rows->nama; echo " - ".$rows->alamat;?></option>
																	   	<?php  
																	   		foreach ($tampil_data_lsp as $pilihan) 
																	   		{ 
																	   	?>
																				<option value="<?php echo $pilihan->id_lembaga_lsp;?>" /><?php echo $pilihan->nama; echo " - ".$pilihan->alamat;?>
																	   	<?php 
																			} 
																		?>
																	</select>
																</div>
															</div>
														</div>
										
														<div class="text-right">
															<button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
															<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_pengajuan_ujk/<?php echo $id_formulir;?>" class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
														</div>
													</form>

										<?php 
												} 
											}
										?>
										
									</div>
								</div>
							</div>

							<div class="panel">
								<div class="panel-heading bg-teal">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group2">RAPORT PELATIHAN (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group2" class="panel-collapse collapse">
									<div class="panel-body">
								
									<form action="<?php echo site_url('formulir_blk/blk_cetak_raport/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" id="search-theme-form" />					
										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Cluster </label>
												<div class="col-lg-8">
													<select class="select-results-color" name="cluster">
															<option value="">Select....</option>
														   <?php  foreach ($tampil_data_cluster_tki as $pilihan) { ?>
															<option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
														   <?php } ?>
													</select>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Negara </label>
												<div class="col-lg-8">
													<select class="select-results-color" name="negara">
															<option value="">Select....</option>
														   <?php  foreach ($tampil_data_negara as $pilihan) { ?>
															<option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
														   <?php } ?>
													</select>
												</div>
											</div>
										</div>
										
										<div class="text-center">
												<button type="submit" class="btn btn-primary" target="_blank"><i class="fa fa-print position-right"></i> PRINT</button>
												<!-- <button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
												<button type="submit" class="btn btn-danger">Print <i class="fa fa-print position-right"></i></button> -->
										</div>
									</form>

									</div>
								</div>
							</div>

							<div class="panel">
								<div class="panel-heading bg-danger">
									<h6 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group5">PEMBAYARAN BIAYA UJK (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group5" class="panel-collapse collapse">
									<div class="panel-body">
										<?php if($hitung_data_bayarujk==0){?>
										<form action="<?php echo site_url('formulir_blk/simpan_detailbayarujk/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Resi : </label>
												<div class="col-lg-8">
													<input type="text" name="noresi" class="form-control" placeholder="25/III/2017" value="<?php echo $dew_no_resi ?>">
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
												<label class="col-lg-2 control-label">Biaya Murni:</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biayamurni" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya Ulang:</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biayaulang" placeholder="250000">
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
								<form action="<?php echo site_url('formulir_blk/ubah_detailbayarujk/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

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
												<label class="col-lg-2 control-label">Biaya Murni:</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biayamurni"  value="<?php echo $rows->biayamurni;?>" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">Biaya Ulang:</label>
												<div class="col-lg-8">
													<input type="text" class="form-control"  name="biayaulang"  value="<?php echo $rows->biayaulang;?>" placeholder="250000">
												</div>
											</div>
										</div>
										<div class="text-right">
										<!-- <button type="submit" class="btn btn-primary">Simpan <i class="icon-arrow-right14 position-right"></i></button> -->
										<button type="submit" class="btn btn-primary">Ubah <i class="fa fa-edit position-right"></i></button>
										<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_biaya_ujk/<?php echo $id_formulir;?>" class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
									</div>
								</form>

								<?php } }?>
										
									</div>
								</div>
							</div>


							<div class="panel">
								<div class="panel-heading bg-danger">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group6">INVOICE BIAYA UJK (Klik Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group6" class="panel-collapse collapse">
									<div class="panel-body">

										<?php if($hitung_data_invoiceujk==0){?>
										<form action="<?php echo site_url('formulir_blk/simpan_detailinvoiceujk/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

										<div class="form-group">
											<div class="row">
												<label class="col-lg-2 control-label">No Invoice :</label>
												<div class="col-lg-8">
													<input type="text" name="noinvoice_ujk" class="form-control" placeholder="25/III/2017" value="<?php echo $dew_no_resi ?>">
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
								<form action="<?php echo site_url('formulir_blk/ubah_detailinvoiceujk/'.$id_formulir);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

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
										<a href="<?php echo base_url(); ?>index.php/pdf7/blk_cetak_invoice_ujk/<?php echo $id_formulir.'-'.$rows->id_pemilik;?>"  class="btn btn-warning">Print <i class="fa fa-print position-right"></i></a>
									</div>
								</form>

								<?php } }?>
										
									</div>
								</div>
							</div>

							<div class="panel">
								<div class="panel-heading bg-success">
									<h6 class="panel-title">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3">VIEW UJK-001: (UNTUK COPY PASTE KE SISTEM LSP DAN BNSP)(Click Disini)</a>
									</h6>
								</div>
								<div id="accordion-styled-group3" class="panel-collapse collapse">
									<div class="panel-body">
									
				<div class="panel panel-flat">
					<div class="panel-heading">
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>

					
						  <table class="table" id="table1" >
						<thead>
							<tr>
								<th>NO </th>
								<th>NO DIPNAKER</th>
								<th>ID DAFTAR</th>
								<th>NAMA</th>
								<th>TEMPAT LAHIR</th>
								<th>TANGGAL LAHIR</th>
								<th>JENIS KELAMIN</th>
								<th>ALAMAT</th>
								<th>TELEPON</th>
								<th>PENDIDIKAN</th>
								<th>NO KTP</th>
								<th>NO SHERLOK</th>
								<th>TGL MASUK</th>
								<th>TGL KELUAR</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; 
                                foreach ($tampil_data_detailnya as $row) { 
                                    $idbio 			= $row->nodaftar;
                                    $ubah_tipe 		= substr($idbio, 0, 2);
                                    if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                                    	$nodisnaker 	= $row->personal_nodisnaker;
                                    	$nama 			= $row->personal_nama;
                                    	$tempatlahir 	= $row->personal_tempatlahir;
                                    	$tanggallahir 	= $row->personal_tanggallahir;
                                    	$jeniskelamin2 	= $row->personal_jeniskelamin;
                                    	$alamat 		= $row->personal_alamat;
                                    	$notelp 		= $row->personal_notelp;
                                    	$pendidikan 	= $row->personal_pendidikan;
                                    	$noktp 			= $row->personal_noktp;
                                    	if ($jeniskelamin2 == '女') {
                                    		$jeniskelamin = 'Perempuan';
                                    	} elseif ($jeniskelamin2 == '男')  {
                                    		$jeniskelamin = 'Laki-laki';
                                    	} else {
                                    		$jeniskelamin = '';
                                    	}
                                    } else {
                                    	$nodisnaker 	= $row->blk_nodisnaker;
                                    	$nama 			= $row->blk_nama;
                                    	$tempatlahir 	= $row->blk_tempatlahir;
                                    	$tanggallahir 	= $row->blk_tanggallahir;
                                    	$jeniskelamin 	= $row->blk_jeniskelamin;
                                    	$alamat 		= $row->blk_alamat;
                                    	$notelp 		= $row->blk_notelp;
                                    	$pendidikan 	= $row->blk_pendidikan;
                                    	$noktp 			= $row->blk_noktp;
                                    }
                            ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $nodisnaker;?></td>
								<td><?php echo $idbio;?></td>
								<td><?php echo $nama;?></td>			
								<td><?php echo $tempatlahir;?></td>
								<td><?php echo $tanggallahir;?></td>
								<td><?php echo $jeniskelamin;?></td>
								<td><?php echo $alamat;?></td>
								<td><?php echo $notelp;?></td>
								<td><?php echo $pendidikan;?></td>
								<td><?php echo $noktp;?></td>
								<td><?php echo $row->noserlok;?></td>
								<td><?php echo $row->adm_tglreg;?></td>
								<td><?php echo $row->tgl_keluar;?></td>
							</tr>
							<?php 
								$no++;  
								} 
							?>
						</tbody>
					</table>

				</div>
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

		<div id="modal_form_horizontal" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">TAMBAH CTKI</h5>
					</div>
					<form action="<?php echo site_url('formulir_blk/simpan_detail_formulir_blk/'.$id_formulir);?>"  method="post" class="form-horizontal">
						<div class="modal-body">
							<input type="hidden" class="form-control" name="id_formulir" value="<?php echo $id_formulir; ?>">
							
							<div class="form-group">
								<label class="control-label col-sm-3"> PILIH CTKI </label>
								<div class="col-sm-9">
									<select class="select-results-color" name="id1" >
										 <option value=""></option>
										<?php  foreach ($tampil_data_all as $pilihan) { 
											$zyxpilsek = substr($pilihan->nodaftar, 0, 2);
											if ($zyxpilsek == 'FI' || $zyxpilsek == 'MI' || $zyxpilsek == 'FF' || $zyxpilsek == 'MF' || $zyxpilsek == 'JP') {
												$asliname = $pilihan->personal_nama;
											} else {
												$asliname = $pilihan->hk_nama;
											}
										?>
										<option value="<?php echo $pilihan->nodaftar;?>" /><?php echo $pilihan->nodaftar." - ".$asliname;?>
										 <?php	} ?>
									</select>
								</div>
							</div>
									
							<div class="form-group">
								<label class="control-label col-sm-3">No. Serlok :</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="noserlok" placeholder="470/BLK-LN /FGJM/III/2017" >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3"> Jenis Ujian </label>
								<div class="col-sm-9">
									<select class="select-menu-color" name="ket" >
										<option value="" />Select...
										<?php  
											foreach ($tampil_data_jenisujian as $pilihan) 
											{ 
										?>
												<option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
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

	</div>

<script type="text/javascript">
	$('#table1').dataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true
	})

	$(".lulus").click(function(){
		if ($(this).is(":checked")) {
			var text = "LULUS"
			var id = $(this).attr("formulir");
			var idtkw = $(this).attr("idtkw");
			$(".kelulusan"+idtkw).text(text);
			$.ajax({
				url: "<?= site_url() ?>/formulir_blk/ubahdatakelulusan/",
				method: "POST",
				dataType: "text",
				data : {
					datanya: text,
					idtkwnya: idtkw,
					idformulir: id
				}
			})
		}else{
			var text = "TIDAK LULUS"
			var id = $(this).attr("formulir");
			var idtkw = $(this).attr("idtkw");
			$(".kelulusan"+idtkw).text(text);
			$.ajax({
				url: "<?= site_url() ?>/formulir_blk/ubahdatakelulusan/",
				method: "POST",
				dataType: "text",
				data : {
					datanya: text,
					idtkwnya: idtkw,
					idformulir: id
				}
			})
		}
	})
</script>