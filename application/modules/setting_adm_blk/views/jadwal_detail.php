<div class="page-header">
		<div class="page-header-content">
			<div class="page-title">
				<h4>Detail Jadwal </h4>
			</div>

			<div class="heading-elements">
				<div class="heading-btn-group">
					<a href="#" class="btn btn-link btn-float has-text"><i class="icon-people"></i> <span>Detail Jadwal</span></a>
				</div>
			</div>
		</div>
	</div>


	<div class="page-container">
		<div class="page-content">
			<div class="content-wrapper">
				<!-- /TAMBAH LEMBAGA LSP TKI -->
				
				
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<a class="btn btn-warning btn-sm" href="<?php echo site_url('setting_adm_blk/jadwal') ?>">JADWAL</a>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>
                    <div class="panel-body">
							<table class="table table-bordered" id="vv2">
								<thead>
									<tr>
										<th rowspan="2">NO </th>
										<th rowspan="2" class="text-center">MINGGU<br/>(HARI)</th>
										<th rowspan="2" style="display: none">HARI</th>
										<th rowspan="2" class="text-center" style="display: none">ACTIONS</th>
										<th colspan="2" class="text-center">Sesi 1</th>
										<th colspan="2" class="text-center">Sesi 2</th>
										<th colspan="2" class="text-center">Sesi 3</th>
										<th colspan="2" class="text-center">Sesi 4</th>
									</tr>
									<tr>
										<th>Kode Materi</th>
										<th>Waktu Pembelajaran</th>
										<th>Kode Materi</th>
										<th>Waktu Pembelajaran</th>
										<th>Kode Materi</th>
										<th>Waktu Pembelajaran</th>
										<th>Kode Materi</th>
										<th>Waktu Pembelajaran</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; 
										error_reporting();
		                            	foreach ($tampil_data_jadwaldetail as $row) { 
			                            	$minggu = $row->minggu_id;
											$hari = $row->hari_id;
											$idjd = $row->id_jadwal_pelatihan;

											$s1_m = explode(",",$row->sesi1_materi_id);
											$s1_mc = count ($s1_m);
											$s1_w = $row->sesi1_waktu_id;
											$s1_t = explode(",",$row->sesi1_tabel_id);
											$s1_tc = count ($s1_t);

											$s2_m = explode(",",$row->sesi2_materi_id);
											$s2_mc = count ($s2_m);
											$s2_w = $row->sesi2_waktu_id;
											$s2_t = explode(",",$row->sesi2_tabel_id);
											$s2_tc = count ($s2_t);

											$s3_m = explode(",",$row->sesi3_materi_id);
											$s3_mc = count ($s3_m);
											$s3_w = $row->sesi3_waktu_id;
											$s3_t = explode(",",$row->sesi3_tabel_id);
											$s3_tc = count ($s3_t);

											$s4_m = explode(",",$row->sesi4_materi_id);
											$s4_mc = count ($s4_m);
											$s4_w = $row->sesi4_waktu_id;
											$s4_t = explode(",",$row->sesi4_tabel_id);
											$s4_tc = count ($s4_t);

											$xminggu = $this->M_setting_adm_blk->select_per_content_minggu($minggu);
											$xhari	 = $this->M_setting_adm_blk->select_per_content_hari($hari);
											$yminggu = $xminggu->kode_minggu;
											$yhari 	 = $xhari->hari;

											if ($row->sesi1_materi_id != (NULL || 0) && $row->sesi1_tabel_id != (NULL || 0)) {
												for ($tg=0;$tg<$s1_mc;$tg++) {
													$xs1m[$tg] = $this->M_setting_adm_blk->select_per_content_materi('blk_akm_jadwaldetail',$s1_t[$tg],$s1_m[$tg]);
													
													if ($xs1m[$tg] != NULL) {
														$ys1m_2[$tg] = $xs1m[$tg]->kode_materi;
														$ys1m = $s1_mc;
													} else {
														$ys1m_2[$tg] = '';
														$ys1m = '';
													}
												}
											} else {
												$ys1m_2 = '';
												$ys1m = '';
											}
											if ($row->sesi2_materi_id != (NULL || 0) && $row->sesi2_tabel_id != (NULL || 0)) {
												for ($tg=0;$tg<$s2_mc;$tg++) {
													$xs2m[$tg] = $this->M_setting_adm_blk->select_per_content_materi('blk_akm_jadwaldetail',$s2_t[$tg],$s2_m[$tg]);
													
													if ($xs2m[$tg] != NULL) {
														$ys2m_2[$tg] = $xs2m[$tg]->kode_materi;
														$ys2m = $s2_mc;
													} else {
														$ys2m_2[$tg] = '';
														$ys2m = '';
													}
												}
											} else {
												$ys2m_2 = '';
												$ys2m = '';
											}
											if ($row->sesi3_materi_id != (NULL || 0) && $row->sesi3_tabel_id != (NULL || 0)) {
												for ($tg=0;$tg<$s3_mc;$tg++) {
													$xs3m[$tg] = $this->M_setting_adm_blk->select_per_content_materi('blk_akm_jadwaldetail',$s3_t[$tg],$s3_m[$tg]);
													
													if ($xs3m[$tg] != (NULL || 0)) {
														$ys3m_2[$tg] = $xs3m[$tg]->kode_materi;
														$ys3m = $s3_mc;
													} else {
														$ys3m_2[$tg] = '';
														$ys3m = '';
													}
												}
											} else {
												$ys3m_2 = '';
												$ys3m = '';
											}
											if ($row->sesi4_materi_id != (NULL || 0) && $row->sesi4_tabel_id != (NULL || 0)) {
												for ($tg=0;$tg<$s4_mc;$tg++) {
													$xs4m[$tg] = $this->M_setting_adm_blk->select_per_content_materi('blk_akm_jadwaldetail',$s4_t[$tg],$s4_m[$tg]);
													
													if ($xs4m[$tg] != NULL) {
														$ys4m_2[$tg] = $xs4m[$tg]->kode_materi;
														$ys4m = $s4_mc;
													} else {
														$ys4m_2[$tg] = '';
														$ys4m = '';
													}
												}
											} else {
												$ys4m_2 = '';
												$ys4m = '';
											}

											if ($s1_w != '') {
												$xs1w = $this->M_setting_adm_blk->select_per_content_waktu($s1_w);
												if ($xs1w != NULL) {
													$ys1w = $xs1w->waktu;
												} else {
													$ys1w = '';
												}
											} else {
												$ys1w = '';
											}
											if ($s2_w != '') {
												$xs2w = $this->M_setting_adm_blk->select_per_content_waktu($s2_w);
												if ($xs2w != NULL) {
													$ys2w = $xs2w->waktu;
												} else {
													$ys2w = '';
												}
											} else {
												$ys2w = '';
											}
											if ($s3_w != '') {
												$xs3w = $this->M_setting_adm_blk->select_per_content_waktu($s3_w);
												if ($xs3w != NULL) {
													$ys3w = $xs3w->waktu;
												} else {
													$ys3w = '';
												}
											} else {
												$ys3w = '';
											}
											if ($s4_w != '') {
												$xs4w = $this->M_setting_adm_blk->select_per_content_waktu($s4_w);
												if ($xs4w != NULL) {
													$ys4w = $xs4w->waktu;
												} else {
													$ys4w = '';
												}
											} else {
												$ys4w = '';
											}

											if ($yhari == 'Minggu') {
												$bgs = 'red';
												$fontt = 'white';
											} else {
												$bgs = '';
												$fontt = 'black';
											}
			                            ?>
										<tr>
											<td rowspan="" bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>;"><?php echo $no;?></td>
											<td rowspan="" bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>"><?php echo $yminggu;?><br/><?php echo '('.$yhari.')' ?></td>
											<td bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>;display: none"><?php echo '('.$yhari.')' ?></td>
											<td style="display: none">
											</td>
											<td bgcolor="<?php echo $bgs ?>">
												<?php 
													if ($row->sesi1_materi_id != (NULL || 0) && $row->sesi1_tabel_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" 
													data-popup="popover-custom" 
													data-html="true"
													title="" 
													data-trigger="hover" 
													data-content="
													<?php 
														for($kl=0;$kl<$s1_mc;$kl++) { 
															echo $ys1m_2[$kl].' : '.$xs1m[$kl]->nama_materi."<br>";
														}
													?>" 
													data-original-title="Detail">
													<?php echo $ys1m ?> Materi
												</button>
												<?php 
													}
												?>
											</td>
											<td bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>">
												<?php 
													if ($row->sesi1_waktu_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" >
													<?php echo $ys1w ?> Menit
												</button>
												<?php 
													}
												?>
												<a data-target="#edit11v<?php echo $no ?>" data-toggle="modal" ><i class="icon-pencil5"></i></a>
											</td>
											<td bgcolor="<?php echo $bgs ?>">
												<?php 
													if ($row->sesi2_materi_id != (NULL || 0) && $row->sesi2_tabel_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" 
													data-popup="popover-custom" 
													data-html="true"
													title="" 
													data-trigger="hover" 
													data-content="
													<?php 
														for($kl=0;$kl<$s2_mc;$kl++) { 
															echo $ys2m_2[$kl].' : '.$xs2m[$kl]->nama_materi."<br>";
														}
													?>" 
													data-original-title="Detail">
													<?php echo $ys2m ?> Materi
												</button>
												<?php 
													}
												?>
											</td>
											<td bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>">
												<?php 
													if ($row->sesi2_waktu_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" >
													<?php echo $ys2w ?> Menit
												</button>
												<?php 
													}
												?>
												<a data-target="#edit12v<?php echo $no ?>" data-toggle="modal"><i class="icon-pencil5"></i></a>
											</td>
											<td bgcolor="<?php echo $bgs ?>">
												<?php 
													if ($row->sesi3_materi_id != (NULL || 0) && $row->sesi3_tabel_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" 
													data-popup="popover-custom" 
													data-html="true"
													title="" 
													data-trigger="hover" 
													data-content="
													<?php 
														for($kl=0;$kl<$s3_mc;$kl++) { 
															echo $ys3m_2[$kl].' : '.$xs3m[$kl]->nama_materi."<br>";
														}
													?>" 
													data-original-title="Detail">
													<?php echo $ys3m ?> Materi
												</button>
												<?php 
													}
												?>
											</td>
											<td bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>">
												<?php 
													if ($row->sesi3_waktu_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" >
													<?php echo $ys3w ?> Menit
												</button>
												<?php 
													}
												?>
												<a data-target="#edit13v<?php echo $no ?>" data-toggle="modal"><i class="icon-pencil5"></i></a>
											</td>
											<td bgcolor="<?php echo $bgs ?>">
												<?php 
													if ($row->sesi4_materi_id != (NULL || 0) && $row->sesi4_tabel_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" 
													data-popup="popover-custom" 
													data-html="true"
													title="" 
													data-trigger="hover" 
													data-content="
													<?php 
														for($kl=0;$kl<$s4_mc;$kl++) { 
															echo $ys4m_2[$kl].' : '.$xs4m[$kl]->nama_materi."<br>";
														}
													?>" 
													data-original-title="Detail">
													<?php echo $ys4m ?> Materi
												</button>
												<?php 
													}
												?>
											</td>
											<td bgcolor="<?php echo $bgs ?>" style="color:<?php echo $fontt?>">
												<?php 
													if ($row->sesi4_waktu_id != (NULL || 0)) {
												?>
												<button type="button" class="btn btn-default btn-sm" >
													<?php echo $ys4w ?> Menit
												</button>
												<?php 
													}
												?>
												<a data-target="#edit14v<?php echo $no ?>" data-toggle="modal"><i class="icon-pencil5"></i></a>
											</td>
										</tr>

										<!--
										<td>
											<A class="btn btn-warning btn-sm" href="<?php //echo site_url('setting_adm_blk/jadwaldetail/'.$row->kode_jadwal) ?>">TAMPIL DETAIL JADWAL</A>
										</td>
										<td class="text-center">
											<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> Edit</button> 
											<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i>Hapus</button> 
										</td> -->
								<!-- UPDATE jadwal -->
									<?php 
										$array1 = array (
											0 => 'berhitung',
											1 => 'bhs_taiyu',
											2 => 'fisik_mental',
											3 => 'graha_boga',
											4 => 'graha_laundry',
											5 => 'graha_ruang',
											6 => 'jompo',
											7 => 'mandarin_inf_jompo',
											8 => 'mandarin_pabrik',
											9 => 'olah_raga',
											10 => 'tata_boga'
										);
										$array2 = array (
											0 => 'berhitung',
											1 => 'bhs_taiyu',
											2 => 'fisik_mental',
											3 => 'graha_boga',
											4 => 'graha_laundry',
											5 => 'graha_ruang',
											6 => 'jompo',
											7 => 'mandarin_inf_jompo',
											8 => 'mandarin_pabrik',
											9 => 'olah_raga',
											10 => 'tata_boga'
										);
										$resss = "";
										for ($tr=0;$tr<$s1_mc;$tr++) {
											$resss = '"'.$s1_m[$tr].'||'.$s1_t[$tr].'", '.$resss;
										}
										$resssf = substr($resss, 0, -2);
										$resss2 = "";
										for ($tr=0;$tr<$s2_mc;$tr++) {
											$resss2 = '"'.$s2_m[$tr].'||'.$s2_t[$tr].'", '.$resss2;
										}
										$resss2f = substr($resss2, 0, -2);
										$resss3 = "";
										for ($tr=0;$tr<$s3_mc;$tr++) {
											$resss3 = '"'.$s3_m[$tr].'||'.$s3_t[$tr].'", '.$resss3;
										}
										$resss3f = substr($resss3, 0, -2);
										$resss4 = "";
										for ($tr=0;$tr<$s4_mc;$tr++) {
											$resss4 = '"'.$s4_m[$tr].'||'.$s4_t[$tr].'", '.$resss4;
										}
										$resss4f = substr($resss4, 0, -2);
									?>
									<script type="text/javascript">
	   									$(document).ready(function(){
											var $exampleMulti = $(".js-example-programmatic-multi-s1_<?php echo $no ?>").select2();
											var $exampleMulti2 = $(".js-example-programmatic-multi-s2_<?php echo $no ?>").select2();
											var $exampleMulti3 = $(".js-example-programmatic-multi-s3_<?php echo $no ?>").select2();
											var $exampleMulti4 = $(".js-example-programmatic-multi-s4_<?php echo $no ?>").select2();

											$(".js-programmatic-multi-clear_<?php echo $no ?>").on("click", function () { $exampleMulti.val(null).trigger("change"); });
											//$(".js-programmatic-multi-clear_<?php echo $no ?>").on("click", function () { $exampleMulti.val(null).trigger("change"); });
											//$(".js-programmatic-multi-clear_<?php echo $no ?>").on("click", function () { $exampleMulti.val(null).trigger("change"); });
											//$(".js-programmatic-multi-clear_<?php echo $no ?>").on("click", function () { $exampleMulti.val(null).trigger("change"); });


											$exampleMulti.val([<?php echo $resssf ?>]).trigger("change");
											$exampleMulti2.val([<?php echo $resss2f ?>]).trigger("change");
											$exampleMulti3.val([<?php echo $resss3f ?>]).trigger("change");
											$exampleMulti4.val([<?php echo $resss4f ?>]).trigger("change");
										});
									</script>
									<div id="edit11v<?php echo $no ?>" class="modal fade" role="dialog" data-backdrop="false" data-keyboard="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Edit</h5>
												</div>
												<div class="modal-body">
												<form action="<?php echo site_url('setting_adm_blk/update_data_jadwaldetail/'.$ukode.'/1'); ?>" class="form-horizontal" method="post">
													<input type="hidden" name="id_jadwal_pelatihan" value="<?php echo $idjd ?>"/>		
													<input type="hidden" name="hari_id" value="<?php echo $hari ?>"/>					
													
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-2">Sesi 1</label>
															<div class="col-sm-7">
																<div class="form-group">
																	<label>Materi Pembelajaran</label>
																	<select multiple="" class="js-example-programmatic-multi-s1_<?php echo $no ?>" tabindex="-1" aria-hidden="true" name="s1_m[]">
																			<?php 
																				foreach ($array1 as $keyys2) {
																					$poli = $this->M_setting_adm_blk->tampil_data_select23($keyys2);
																					echo '<optgroup label="'.$keyys2.'">';
																					foreach ($poli as $keiz) {
																			?>
																					<option value="<?php echo $keiz->id ?>"><?php echo $keiz->kode_materi.' : '.$keiz->nama_materi;?></option>
																			<?php 
																				}
																					echo '</optgroup>';
																			}	
																			?>
																	</select>
																	<button class="btn btn-md btn-primary js-programmatic-multi-clear_<?php echo $no ?>" type="button">Clear</button>
																</div>
															</div>
															<div class="col-sm-3">
																<label>Waktu Pembelajaran</label>
																<select name="s1_w" class="form-control select-results-color">
					                                                <option value="<?php echo $s1_w ?>"><?php echo $ys1w ?></option>
					                                                <?php 
					                                                    foreach ($tampil_data_blk_waktu as $waktu) {
					                                                ?>
					                                                	<option value="<?php echo $waktu->id_waktu ?>"><?php echo $waktu->waktu ?></option>
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
													
									<div id="edit12v<?php echo $no ?>" class="modal fade" role="dialog" data-backdrop="false" data-keyboard="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Edit</h5>
												</div>
												<div class="modal-body">
												<form action="<?php echo site_url('setting_adm_blk/update_data_jadwaldetail/'.$ukode.'/2'); ?>" class="form-horizontal" method="post">
													<input type="hidden" name="id_jadwal_pelatihan" value="<?php echo $idjd ?>"/>		
													<input type="hidden" name="hari_id" value="<?php echo $hari ?>"/>
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-2">Sesi 2</label>
															<div class="col-sm-7">
																<div class="form-group">
																	<label>Materi Pembelajaran</label>
																	<select multiple="" class="js-example-programmatic-multi-s2_<?php echo $no ?>" tabindex="-1" aria-hidden="true" name="s2_m[]">
																			<?php 
																				foreach ($array1 as $keyys2) {
																					$poli = $this->M_setting_adm_blk->tampil_data_select23($keyys2);
																					echo '<optgroup label="'.$keyys2.'">';
																					foreach ($poli as $keiz) {
																			?>
																					<option value="<?php echo $keiz->id ?>"><?php echo $keiz->kode_materi.' : '.$keiz->nama_materi;?></option>
																			<?php 
																				}
																					echo '</optgroup>';
																			}	
																			?>
																	</select>
																	<button class="btn btn-md btn-primary js-programmatic-multi-clear2_<?php echo $no ?>" type="button">Clear</button>
																</div>
															</div>
															<div class="col-sm-3">
																<label>Waktu Pembelajaran</label>
																<select name="s2_w" class="form-control select-results-color">
					                                                <option value="<?php echo $s2_w ?>"><?php echo $ys2w ?></option>
					                                                <?php 
					                                                    foreach ($tampil_data_blk_waktu as $waktu) {
					                                                ?>
					                                                	<option value="<?php echo $waktu->id_waktu ?>"><?php echo $waktu->waktu ?></option>
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

									<div id="edit13v<?php echo $no ?>" class="modal fade" role="dialog" data-backdrop="false" data-keyboard="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Edit</h5>
												</div>
												<div class="modal-body">
												<form action="<?php echo site_url('setting_adm_blk/update_data_jadwaldetail/'.$ukode.'/3'); ?>" class="form-horizontal" method="post">
													<input type="hidden" name="id_jadwal_pelatihan" value="<?php echo $idjd ?>"/>		
													<input type="hidden" name="hari_id" value="<?php echo $hari ?>"/>
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-2">Sesi 3</label>
															<div class="col-sm-7">
																
																<div class="form-group">
																	<label>Materi Pembelajaran</label>
																	<select multiple="" class="js-example-programmatic-multi-s3_<?php echo $no ?>" tabindex="-1" aria-hidden="true" name="s3_m[]">
																			<?php 
																				foreach ($array1 as $keyys2) {
																					$poli = $this->M_setting_adm_blk->tampil_data_select23($keyys2);
																					echo '<optgroup label="'.$keyys2.'">';
																					foreach ($poli as $keiz) {
																			?>
																					<option value="<?php echo $keiz->id ?>"><?php echo $keiz->kode_materi.' : '.$keiz->nama_materi;?></option>
																			<?php 
																				}
																					echo '</optgroup>';
																			}	
																			?>
																	</select>
																	<button class="btn btn-md btn-primary js-programmatic-multi-clear3_<?php echo $no ?>" type="button">Clear</button>
																</div>
															</div>
															<div class="col-sm-3">
																<label>Waktu Pembelajaran</label>
																<select name="s3_w" class="form-control select-results-color">
					                                                <option value="<?php echo $s3_w ?>"><?php echo $ys3w ?></option>
					                                                <?php 
					                                                    foreach ($tampil_data_blk_waktu as $waktu) {
					                                                ?>
					                                                	<option value="<?php echo $waktu->id_waktu ?>"><?php echo $waktu->waktu ?></option>
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

									<div id="edit14v<?php echo $no ?>" class="modal fade" role="dialog" data-backdrop="false" data-keyboard="false">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header bg-warning">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h5 class="modal-title">Edit</h5>
												</div>
												<div class="modal-body">
												<form action="<?php echo site_url('setting_adm_blk/update_data_jadwaldetail/'.$ukode.'/4'); ?>" class="form-horizontal" method="post">
													<input type="hidden" name="id_jadwal_pelatihan" value="<?php echo $idjd ?>"/>		
													<input type="hidden" name="hari_id" value="<?php echo $hari ?>"/>
													<div class="form-group">
														<div class="row">
															<label class="control-label col-sm-2">Sesi 4</label>
															<div class="col-sm-7">
																<div class="form-group">
																	<label>Materi Pembelajaran</label>
																	<select multiple="" class="js-example-programmatic-multi-s4_<?php echo $no ?>" tabindex="-1" aria-hidden="true" name="s4_m[]">
																			<?php 
																				foreach ($array1 as $keyys2) {
																					$poli = $this->M_setting_adm_blk->tampil_data_select23($keyys2);
																					echo '<optgroup label="'.$keyys2.'">';
																					foreach ($poli as $keiz) {
																			?>
																					<option value="<?php echo $keiz->id ?>"><?php echo $keiz->kode_materi.' : '.$keiz->nama_materi;?></option>
																			<?php 
																				}
																					echo '</optgroup>';
																			}	
																			?>
																	</select>
																	<button class="btn btn-md btn-primary js-programmatic-multi-clear4_<?php echo $no ?>" type="button">Clear</button>
																</div>
															</div>
															<div class="col-sm-3">
																<label>Waktu Pembelajaran</label>
																<select name="s4_w" class="form-control select-results-color">
					                                                <option value="<?php echo $s4_w ?>"><?php echo $ys4w ?></option>
					                                                <?php 
					                                                    foreach ($tampil_data_blk_waktu as $waktu) {
					                                                ?>
					                                                	<option value="<?php echo $waktu->id_waktu ?>"><?php echo $waktu->waktu ?></option>
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
													<h5 class="modal-title">Hapus Jadwal </h5>
												</div>
												<form action="<?php echo site_url('setting_adm_blk/hapus_data_jadwal'); ?>" class="form-horizontal" method="post">										
													<div class="modal-body">
														<input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $row->id_jadwal; ?>">
														<p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->tanggal; ?> <br> <?php echo $row->jadwal; ?> <br> <?php echo $row->waktu_pelatihan; ?></code> ?</p>
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
        $(document).ready(function(){
		    $('#vv2').DataTable({
		    	ordering: false,
				pageLength: 7,
				bLengthChange: false,
		        scrollX: true,
		        scrollY: true,
		        scrollCollapse: true,
		        fixedColumns: {
		            leftColumns: 3,
		            rightColumns: 0
		        }
		    });
        });
	</script>