	<div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Rekapitulasi</span> - Izin Keluar</h4>

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
		                        <h5 class="panel-title">DATA IZIN KELUAR</h5>
                            </div>
                            <div class="panel-body">				
		                    	<div class="table-responsive">
		                        <table class="table table-lg table-bordered table-striped" id="exs">
									<thead>
										<tr>
											<th class="text-center">NO.</th>
											<th class="text-center">NO DAFTAR</th>
											<th class="text-center">NAMA</th>

											<th class="text-center">TGL IZIN</th>
											<th class="text-center">JAM KELUAR</th>
											<th class="text-center">JAM KEMBALI</th>
											<th class="text-center">TERLAMBAT (AKM)</th>
											<th class="text-center">BLK PEMBERI IZIN</th>
											<th class="text-center">KET</th>

										</tr>
									</thead>
									<tbody>
										<?php 
										$no=1;
										foreach ($get_table as $kp) {
										?>
										<tr>
											<td ><?php echo $no; ?></td>
											<td ><?php echo $kp->nodaftar ?></td>
											<td ><?php echo $kp->nama ?></td>
											<td>
											<?php 
											$oun = $this->M_blk_rekapitulasi->pemb_count('blk_izin_keluar', $kp->nodaftar);
											$adv9 = $this->M_blk_rekapitulasi->select_adv("SELECT tgl FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'");
											$no9=1;
											foreach ($adv9 as $mmn9) {
												if ($mmn9->tgl != NULL) {
													$mmn9b = $mmn9->tgl;
												} else {
													$mmn9b = '-';
												}
												if ($oun->total != $no9) {
													$style9 = "border-bottom:1px solid black";
												} elseif ($oun->total == $no9) {
													$style9 = "";
												}
												echo '<div style="'.$style9.'">'.$mmn9b.$oun->total.'</div>';
											$no9++;
											}
											?>
											</td>
											<td>
											<?php 
											$adv6 = $this->M_blk_rekapitulasi->select_adv("SELECT jam_keluar FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'");
											$no6=1;
											foreach ($adv6 as $mmn6) {
												if ($mmn6->jam_keluar != NULL) {
													$mmn6a = $mmn6->jam_keluar;
												} else {
													$mmn6a = '-';
												}
												if ($oun->total != $no6) {
													$style6 = "border-bottom:1px solid black";
												} elseif ($oun->total == $no6) {
													$style6 = "";
												}
												echo '<div style="'.$style6.'">'.$mmn6a.'</div>';
											$no6++;
											}
											?>
											</td>
											<td>
											<?php 
											$adv1 = $this->M_blk_rekapitulasi->select_adv("SELECT jam_kembali FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'");
											$no1=1;
											foreach ($adv1 as $mmn1) {
												if ($mmn1->jam_kembali != NULL) {
													$mmn1a = $mmn1->jam_kembali;
												} else {
													$mmn1a = '-';
												}
												if ($oun->total != $no1) {
													$style1 = "border-bottom:1px solid black";
												} elseif ($oun->total == $no1) {
													$style1 = "";
												}
												echo '<div style="'.$style1.'">'.$mmn1a.'</div>';
											$no1++;
											}
											?>
											</td>
											<td>
											<?php 
											$adv2 = $this->M_blk_rekapitulasi->select_adv("SELECT terlambat, akm_terlambat FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'");
											$no2=1;
											foreach ($adv2 as $mmn2) {
												if ($mmn2->terlambat != NULL) {
													$mmn2a = $mmn2->terlambat;
												} else {
													$mmn2a = '-';
												}
												if ($mmn2->akm_terlambat != NULL) {
													$mmn2b = $mmn2->akm_terlambat;
												} else {
													$mmn2b = '-';
												}
												if ($oun->total != $no2) {
													$style2 = "border-bottom:1px solid black";
												} elseif ($oun->total == $no2) {
													$style2 = "";
												}
												echo '<div style="'.$style2.'">'.$mmn2a.' ('.$mmn2b.')</div>'; 
											$no2++;
											}
											?>
											</td>
											<td>
											<?php 
											$adv4 = $this->M_blk_rekapitulasi->select_adv("SELECT blk_pemberi_izin as blk FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'");
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
											$adv5 = $this->M_blk_rekapitulasi->select_adv("SELECT ket FROM blk_izin_keluar where nodaftar='".$kp->nodaftar."'");
											$no5=1;
											foreach ($adv5 as $mmn5) {
												if ($mmn5->ket != NULL) {
													$mmn5a = $mmn5->ket;
												} else {
													$mmn5a = '-';
												}
												if ($oun->total != $no5) {
													$style5 = "border-bottom:1px solid black";
												} elseif ($oun->total == $no5) {
													$style5 = "";
												}
												echo '<div style="'.$style5.'">'.$mmn5a.'</div>';
											$no5++;
											}
											?>
											</td>
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