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
		                        <h5 class="panel-title">
		                            <div class="btn-group btn-group-animated">
	                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">PILIH BULAN <span class="caret"></span></button>
	                                    <ul class="dropdown-menu">
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/01'); ?>"><i class="icon-arrow-right13"></i> BULAN 1</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/02'); ?>"><i class="icon-arrow-right13"></i> BULAN 2</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/03'); ?>"><i class="icon-arrow-right13"></i> BULAN 3</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/04'); ?>"><i class="icon-arrow-right13"></i> BULAN 4</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/05'); ?>"><i class="icon-arrow-right13"></i> BULAN 5</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/06'); ?>"><i class="icon-arrow-right13"></i> BULAN 6</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/07'); ?>"><i class="icon-arrow-right13"></i> BULAN 7</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/08'); ?>"><i class="icon-arrow-right13"></i> BULAN 8</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/09'); ?>"><i class="icon-arrow-right13"></i> BULAN 9</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/10'); ?>"><i class="icon-arrow-right13"></i> BULAN 10</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/11'); ?>"><i class="icon-arrow-right13"></i> BULAN 11</a></li>
	                                        <li><a href="<?php echo site_url('blk_rekapitulasi/finger/12'); ?>"><i class="icon-arrow-right13"></i> BULAN 12</a></li>
	                                    </ul>
		                            </div>
		                        </h5>
                            </div>
                            <div class="panel-body">				
								<table id="exs" class="table table-bordered differentTable">
									<thead>
										<tr>
											<th rowspan="2" class="text-center">NO.</th>
											<th rowspan="2" class="text-center">NO DAFTAR</th>
											<th rowspan="2" class="text-center">NAMA</th>
											<th rowspan="2" class="text-center">TOTAL (/Bln)</th>
											<?php 
											foreach ($tgl_per_bln as $key) {
											?>
											<th colspan="2" class="text-center">
												<?php echo $key ?>
											</th>
											<?php 
											}
											?>
										</tr>
										<tr>	
											<?php 
											foreach ($tgl_per_bln as $key) {
											?>
											<th class="text-center">PAGI</th>
											<th class="text-center">SORE</th>
											<?php 
											}
											?>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no=1;
										foreach ($get_table as $kp) {
										?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $kp->idblk ?></td>
											<td><?php echo $kp->nama ?></td>
											<td><?php 
											$total = 0;
											foreach ($tgl_per_bln as $yt) {
												$blnn = $blnvv.'-'.date("d",strtotime($yt));
												$rt = $this->M_blk_rekapitulasi->get_count('tblattendance',$kp->idblk,$blnn);
												if ($rt->tot >= 1) {
													$total = $total + 1;
												} elseif ($rt->tot == 0) {
													$total = $total + 0;
												}
											}
											echo $total;
											?></td>

											<?php 
											foreach ($tgl_per_bln as $yt) {
			 									//$this->M_blk_rekapitulasi->get_tgl('tblattendance',$yt);
			 									$w = $this->M_blk_rekapitulasi->get_finger_time('tblattendance',$kp->idblk,date("Y-m-d",strtotime($yt)),'pagi');
			 									$d = $this->M_blk_rekapitulasi->get_finger_time('tblattendance',$kp->idblk,date("Y-m-d",strtotime($yt)),'sore');

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
													<td bgcolor="<?php echo $attr ?>" class="text-center"><?php echo $pagi; ?></td>
													<td bgcolor="<?php echo $attrb ?>" class="text-center"><?php echo $sore; ?></td>
											<?php
												//} else {
											?>
											<?php
												//}
			 								//$get_table_child 	= $this->M_blk_rekapitulasi->get_tgl('tblattendance',$kp->idblk);
											//foreach ($get_table_child as $jl) {
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