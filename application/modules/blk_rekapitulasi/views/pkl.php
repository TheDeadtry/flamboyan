	<div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Rekapitulasi</span> - PKL</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="index.html">Personal BLK</a></li>
                    <li><a href="user_pages_profile.html">Detail Personal</a></li>
                </ul>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-user"></i><span>Detail Personal</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
		                        <h5 class="panel-title">DATA PKL</h5>
                            </div>
                            <div class="panel-body">				
		                    	<div class="table-responsive">
		                        <table class="table table-lg table-bordered table-striped" id="exs">
									<thead>
										<tr>
											<th class="text-center">NO.</th>
											<th class="text-center">NO DAFTAR</th>
											<th class="text-center">NAMA</th>

											<th class="text-center">PKL</th>
											<th class="text-center">TGL MULAI</th>
											<th class="text-center">TGL SELESAI</th>
											<th class="text-center">JUMLAH HARI</th>
											<th class="text-center">TEMPAT</th>
											<th class="text-center">A. </th>
											<th class="text-center">B.</th>
											<th class="text-center">C.</th>
											<th class="text-center">NILAI RATA-RATA</th>
											<th class="text-center">PEMBINA<br/>(BLK)</th>
											<th class="text-center">NO RESI</th>
											<th class="text-center">KEPADA</th>
											<th class="text-center">JUMLAH</th>

										</tr>
									</thead>
									<tbody>
										<?php 
										$noss=1;
										foreach ($get_table as $kp) {
										?>
										<tr>
											<td ><?php echo $noss; ?></td>
											<td ><?php echo $kp->id_personalblk ?></td>
											<td ><?php echo $kp->nama ?></td>
											<td>
											<?php 
											$oun 	= $this->M_blk_rekapitulasi->pemb_count2('blk_hasilpkl', $kp->id_personalblk);
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT pkl_ke FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->pkl_ke != NULL) {
													$mmna = $mmn->pkl_ke;
												} else {
													$mmna = '';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT tgl_mulai FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->tgl_mulai != NULL) {
													$mmna = $mmn->tgl_mulai;
												} else {
													$mmna = '';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT tgl_selesai FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->tgl_selesai != NULL) {
													$mmna = $mmn->tgl_selesai;
												} else {
													$mmna = '';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT jml_hari FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->jml_hari != NULL) {
													$mmna = $mmn->jml_hari;
												} else {
													$mmna = '';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT id_tempatpkl as tmpt FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											$no=1;
											foreach ($adv as $mmn) {
												$fin = $this->M_blk_rekapitulasi->select_row("SELECT nama_tempat, alamat FROM blk_tempatpkl where id_tempatpkl='$mmn->tmpt'");
												if ($fin->nama_tempat != NULL) {
													$mmna = $fin->nama_tempat;
												} else {
													$mmna = '-';
												}
												if ($fin->alamat != NULL) {
													$mmnb = $fin->alamat;
												} else {
													$mmnb = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.' - '.$mmnb.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php 
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT id_pkl FROM blk_hasilpkl WHERE id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
                                            	$rat1 = $this->M_blk_rekapitulasi->rata($mmn->id_pkl, 'A');
												if ($rat1[0]->rata != NULL) {
													$mmnc = $rat1[0]->rata;
												} else {
													$mmnc = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmnc.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php 
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT id_pkl FROM blk_hasilpkl WHERE id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
                                            	$rat1 = $this->M_blk_rekapitulasi->rata($mmn->id_pkl, 'B');
												if ($rat1[0]->rata != NULL) {
													$mmnc = $rat1[0]->rata;
												} else {
													$mmnc = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmnc.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php 
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT id_pkl FROM blk_hasilpkl WHERE id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
                                            	$rat1 = $this->M_blk_rekapitulasi->rata($mmn->id_pkl, 'C');
												if ($rat1[0]->rata != NULL) {
													$mmnc = $rat1[0]->rata;
												} else {
													$mmnc = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmnc.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php 
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT id_pkl FROM blk_hasilpkl WHERE id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
                                            	$rata2 = $this->M_blk_rekapitulasi->rata2($mmn->id_pkl)->rata2;
												if ($rata2 != NULL) {
													$mmnc = $rata2;
												} else {
													$mmnc = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmnc.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php 
											$adv4 = $this->M_blk_rekapitulasi->select_adv("SELECT id_instruktur as blk FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											$no4=1;
											foreach ($adv4 as $mmn4) {
												$fin = $this->M_blk_rekapitulasi->select_row("SELECT kode_instruktur, nama, jabatan_tugas FROM blk_instruktur where id_instruktur='$mmn4->blk'");
												if ($fin->kode_instruktur!= NULL) {
													$mmn4a = $fin->kode_instruktur;
												} else {
													$mmn4a = '-';
												}
												if ($fin->nama != NULL) {
													$mmn4b = $fin->nama;
												} else {
													$mmn4b = '-';
												}
												if ($fin->jabatan_tugas != NULL) {
													$mmn4c = $fin->jabatan_tugas;
												} else {
													$mmn4c = '-';
												}
												if ($oun->total != $no4) {
													$style4 = "border-bottom:1px solid black";
												} elseif ($oun->total == $no4) {
													$style4 = "";
												}
												echo '<div style="'.$style4.'">'.$mmn4a.' '.$mmn4b.' '.$mmn4c.'</div>';
											$no4++;
											}
											?>
											</td>
											<td>
											<?php
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT no_resi FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->no_resi != NULL) {
													$mmna = $mmn->no_resi;
												} else {
													$mmna = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT kepada FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->kepada != NULL) {
													$mmna = $mmn->kepada;
												} else {
													$mmna = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
											<td>
											<?php
											$no=1;
											$adv = $this->M_blk_rekapitulasi->select_adv("SELECT nominal FROM blk_hasilpkl where id_personalblk='".$kp->id_personalblk."'");
											foreach ($adv as $mmn) {
												if ($mmn->nominal != NULL) {
													$mmna = $mmn->nominal;
												} else {
													$mmna = '-';
												}
												if ($oun->total != $no) {
													$style = "border-bottom:1px solid black";
												} elseif ($oun->total == $no) {
													$style = "";
												}
												echo '<div style="'.$style.'">'.$mmna.'</div>';
											$no++;
											}
											?>
											</td>
										</tr>
										<?php 
										$noss++;
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
		</div>
	</div>
<script>
    $('#exs').DataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 3,
            rightColumns: 0
        }
    });
</script>