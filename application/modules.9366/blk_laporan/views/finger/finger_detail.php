
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-primary-400">
		                        <h5 class="panel-title">
		                            DATA FINGERPRINT <?php echo $id_tki; ?>
		                        </h5>
                                <div class="heading-elements">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH</button>
                                </div>       
                            </div>
                            <div class="panel-body">				
								<table id="exs2" class="table table-bordered">
									<thead>
										<tr>
											<th rowspan="2" class="text-center">NO.</th>
											<th rowspan="2" class="text-center">TAHUN</th>
											<th rowspan="2" class="text-center">BULAN</th>
											<th rowspan="2" class="text-center">TOTAL/BLN</th>
											<?php 
												for($d=1; $d<=31; $d++) {
											?>
													<th colspan="2" class="text-center"><?php echo $d ?></th>
											<?php 
												}
											?>
										</tr>
										<tr>
											<?php 
												for($d=1; $d<=31; $d++) {
											?>
													<th>PAGI</th>
													<th>SORE</th>
											<?php 
												}
											?>
										</tr>
									</thead>
									<tbody>
										<?php 
											$no=1;
											foreach($tampil_data_rekap_finger as $row) {
												$total_per_bln = $this->M_session->select_row("SELECT count(*) as total FROM tblattendance WHERE idblk='$id_tki' and month(dteDate)='$row->bulan'");
												
												$list = array();
												for($d=1; $d<=31; $d++)
												{
												    $time=mktime(12, 0, 0, $row->bulan, $d, $row->tahun);          
												    if (date('m', $time)==$row->bulan) {      
												        $list[]=date('d.m.Y', $time);
												    }
												}
												$tgl_per_bln = $list;
												$bulan_array = array (
													'1'  => 'Januari',
													'2'  => 'Febuari',
													'3'  => 'Maret',
													'4'  => 'April',
													'5'  => 'Mei',
													'6'  => 'Juni',
													'7'  => 'Juli',
													'8'  => 'Agustus',
													'9'  => 'September',
													'10' => 'Oktober',
													'11' => 'November',
													'12' => 'Desember',
												);

												$total = 0;
												foreach ($tgl_per_bln as $yt) {
													$blnn = $row->tahun.'-'.sprintf('%02d', $row->bulan).'-'.date("d",strtotime($yt));
													$rt = $this->M_session->select_row("SELECT count(*) as tot FROM tblattendance where idblk='$id_tki' and dteDate like '$blnn'");
													if ($rt->tot >= 1) {
														$total = $total + 1;
													} elseif ($rt->tot == 0) {
														$total = $total + 0;
													}
												}
													
										?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo $row->tahun; ?></td>
													<td><?php echo $bulan_array[$row->bulan]; ?></td>
													<td><?php echo $total ?></td>

											<?php 
												foreach ($tgl_per_bln as $key) {
													$date = date("Y-m-d",strtotime($key));
													$w = $this->M_session->select_row("SELECT tmeTime FROM tblattendance where idblk='$id_tki' and dteDate='$date' and waktu='pagi' ORDER BY dteDate DESC");
				 									$d = $this->M_session->select_row("SELECT tmeTime FROM tblattendance where idblk='$id_tki' and dteDate='$date' and waktu='sore' ORDER BY dteDate ASC");

													if ($w != NULL) {
														$pagi = $w->tmeTime;
														$attr = '#acf9af';
													} else {
														$pagi = '-';
														$attr = '#f49f9f';
													}

													if ($d != NULL) {
														$sore = $d->tmeTime;
														$attrb = '#acf9af';
													} else {
														$sore = '-';
														$attrb = '#f49f9f';
													}
											?>
													<th bgcolor="<?php echo $attr ?>" class="text-center"><?php echo $pagi; ?></th>
													<th bgcolor="<?php echo $attrb ?>" class="text-center"><?php echo $sore; ?></th>
											<?php 
												}
												$total_hari_per_bulan = count($tgl_per_bln);
												if ($total_hari_per_bulan < 31) {
													$sisa_kolom = 31-$total_hari_per_bulan;
													for ($x=0;$x<$sisa_kolom;$x++) {
											?>
													<th bgcolor="#75777a" class="text-center">-</th>
													<th bgcolor="#75777a" class="text-center">-</th>
											<?php
													}
												}
											?>
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

							<div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH FINGER MANUAL (ADMIN) [ <?php echo $id_tki; ?> ] </h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_rekapitulasi/finger_detail_add/'.$id_tki); ?>" class="form-horizontal" method="post">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label class="control-label col-sm-12">Tanggal</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control dewdate" type="text" name="dteDate" required="required" placeholder="Dari Tanggal" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input class="form-control dewdate" type="text" name="dteDate2" required="required" placeholder="Hingga Tanggal" />
                                                    </div>
                                                </div>

												<div class="form-group">
													<label class="control-label col-sm-12">Waktu/Jam</label>
                                                    <div class="col-sm-6">
														<input type="checkbox" name="waktuJam[]" class="styled" checked="checked" value="pagi,07.00">Pagi ( 07.00 )
													</div>

                                                    <div class="col-sm-6">
														<input type="checkbox" name="waktuJam[]" class="styled" checked="checked" value="sore,18.30">Sore ( 18.30 )
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
<script>
    $('#exs2').DataTable({
        scrollX: true,
        scrollY: true,
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 4,
            rightColumns: 0
        },
        columnDefs: [
            {
                render: function (data, type, full, meta) {
                    return "<div class='text-wrap width-160'>" + data + "</div>";
                },
                targets: 1
            },
            {
                render: function (data, type, full, meta) {
                    return "<div class='text-wrap width-200'>" + data + "</div>";
                },
                targets: 2
            },
            {
                render: function (data, type, full, meta) {
                    return "<div class='text-wrap width-200'>" + data + "</div>";
                },
                targets: 3
            }
        ],
		"autoWidth": true,
        "ordering": false,
        "info":     false,
        "bFilter": false, 
        "bLengthChange": false,  
        "paging" : false
    });
</script>