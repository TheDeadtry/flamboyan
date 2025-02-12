<div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Rekapitulasi</span> - Jompo</h4>

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
                                <h5 class="panel-title"> </h5>
                            </div>
                            <div class="panel-body">								
                            		<table id="exs" class="table table-bordered text-center">
                            			<thead>
											<tr>
												<th colspan="12" bgcolor="#43f6f9" class="text-center">DARI A-MARKETING AWAL</th>
												<th bgcolor="#d2f6f7" class="text-center">DICOPI KE A-MARK AWAL</th>
												<th bgcolor="#91ffb4" class="text-center">FIFI ISI : COPY DARI A-MARK AWAL</th>
												<th bgcolor="#ffa100" class="text-center">INTAN ISI : COPY DARI B-DOK DURASI</th>
												<th colspan="2" bgcolor="#f7ca9e" class="text-center">INTAN ISI : COPY DARI DOK DURASI</th>
												<th colspan="2" bgcolor="#f5f902" class="text-center">MARKETING ISI : COPY DARI A-MARK AWAL</th>
												<th colspan="3" bgcolor="#85f901" class="text-center">COPY DARI 1 BLK ABSENSI : UPDATE ABSENSI BLK</th>
												<?php
												//for ($fd=1;$fd<=$count->total;$fd++) {
													foreach ($get_tata_boga as $tb) {
												?>
												<th colspan="5">Materi : <?php echo $tb->kode_materi.' - '.$tb->nama_materi ?></th>
												<?php
													}
												//}
												?>
												<th colspan="5"></th>
											</tr>
											<tr>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">ID</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">NEG</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">NAMA</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">PL</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">TGL DFTR</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">FOTO</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">UMUR (TAHUN)</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">TINGGI (CM)</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">BERAT (KG)</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">PENDIDIKAN</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">STATUS S/N/CH/CM</th>
												<th rowspan="2" bgcolor="#43f6f9" class="text-center">NO. HP</th>
												<th rowspan="2" bgcolor="#d2f6f7" class="text-center">ANGKAT KG</th>
												<th rowspan="2" bgcolor="#91ffb4" class="text-center">STATUS</th>
												<th rowspan="2" bgcolor="#ffa100" class="text-center">ONLINE DURASI (ID)</th>
												<th colspan="2" bgcolor="#9debf7" class="text-center">UPDATE DURASI</th>
												<th colspan="2" bgcolor="#f5f902" class="text-center">DAPAT MAJIKAN</th>
												<th rowspan="2" bgcolor="#85f901" class="text-center">PERTAMA HADIR</th>
												<th colspan="2" bgcolor="#85f901" class="text-center">JUMLAH KEHADIRAN</th>
												<?php
													foreach ($get_tata_boga as $tb) {
												?>
												<th colspan="5" class="text-center"><?php echo $tb->tgl ?></th>
												<?php
													}
												?>
												<th rowspan="2" class="text-center">TOTAL </th>
												<th rowspan="2" class="text-center">KERAPIAN</th>
												<th rowspan="2" class="text-center">KEBERSIHAN</th>
												<th rowspan="2" class="text-center">RATA2 PENILAIAN</th>
												<th rowspan="2" class="text-center">KETERANGAN</th>
											</tr>
											<tr>
												<th bgcolor="#9debf7" class="text-center">TGL UPDATE</th>
												<th bgcolor="#9debf7" class="text-center">TGL HABIS DURASI</th>
												<th bgcolor="#f5f902" class="text-center">MINTA TERBANG TGL</th>
												<th bgcolor="#f5f902" class="text-center">TGL</th>
												<th bgcolor="#85f901" class="text-center">TGL</th>
												<th bgcolor="#85f901" class="text-center">HARI</th>
												<?php
													foreach ($get_tata_boga as $tb) {
												?>
												<th class="text-center">NO</th>
												<th class="text-center">KERAPIAN</th>
												<th class="text-center">KEBERSIHAN</th>
												<th class="text-center">KESIMPULAN</th>
												<th class="text-center">KET</th>
												<?php
												}
												?>
											</tr>
										</thead>
										<tbody>
											<?php 
											foreach ($tampil_personal as $bn) {
												$lahiran	= new DateTime($bn->tgllahir);
												$now 		= new DateTime();

												$umur = $now->diff($lahiran);
											?>
											<tr>
												<td class="text-center"><?php echo $bn->nodaftar ?></td>
												<td class="text-center"><?php echo $bn->negara ?></td>
												<td class="text-center"><?php echo $bn->nama ?></td>
												<td class="text-center"><?php echo $bn->sponsor ?></td>
												<td class="text-center"><?php echo $bn->tanggaldaftar ?></td>
												<td class="text-center"><?php echo $bn->foto ?></td>
												<td class="text-center"><?php echo $umur->y ?></td>
												<td class="text-center"><?php echo $bn->tinggi.'cm' ?></td>
												<td class="text-center"><?php echo $bn->berat.'kg' ?></td>
												<td class="text-center"><?php echo $bn->pendidikan ?></td>
												<td class="text-center"><?php //echo $bn-> ?></td>
												<td class="text-center"><?php echo $bn->notelp ?></td>
												<td class="text-center"><?php //echo $bn-> ?></td>
												<td class="text-center"><?php //echo $bn-> ?></td>
												<td bgcolor="#ffa100" class="text-center"><?php //echo  ?></td>
												<td class="text-center"><?php //  echo  ?></td>
												<td class="text-center"><?php //echo  ?></td>
												<td class="text-center"><?php //echo  ?></td>
												<td class="text-center"><?php //echo  ?></td>
												<td class="text-center"><?php //echo  ?></td>
												<td class="text-center"><?php //echo  ?></td>
												<td class="text-center"><?php //echo  ?></td>

												<?php
													foreach ($get_tata_boga as $tb) {
												?>
												<td><?php //echo $ ?></td>
												<td><?php //echo  ?></td>
												<td><?php //echo  ?></td>
												<td><?php //echo  ?></td>
												<td><?php //echo  ?></td>
												<?php
												}
												?>
												<td><?php //echo $ ?></td>
												<td><?php //echo  ?></td>
												<td><?php //echo  ?></td>
												<td><?php //echo  ?></td>
												<td><?php //echo  ?></td>
											</tr>
											<?php 
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
<script>
    $('#exs').DataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 4,
            rightColumns: 0
        }
    });
</script>