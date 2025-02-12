
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Halaman Absensi</span>
            </h1>
            <div class='pull-right'>
                <ul class='breadcrumb'>
                    <li>
                        <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i>
                        </a>
                    </li>
                    <li class='separator'>
                        <i class='icon-angle-right'></i>
                    </li>
                    <li class='active'>Absensi Tanggal : <?php echo $tanggal; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div> 
<ul class="nav nav-tabs">
	<?php
	if($status == '1' || empty($status)) {
		echo "
	<li class='active'><a href='#tambah' data-toggle='tab'>Tambah Absensi</a></li>
    <li class=''><a href='#daftar' data-toggle='tab'>Daftar Absensi</a></li>
		";
	} else if($status == 2) {
		echo "
	<li class=''><a href='#tambah' data-toggle='tab'>Tambah Absensi</a></li>
    <li class='active'><a href='#daftar' data-toggle='tab'>Daftar Absensi</a></li>
		";
	}
    ?> 
</ul>
<div class="tab-content">
	<?php 
	if($status == '1' || empty($status)) {
	?>
	<div class="tab-pane active" id="tambah">
		<div class="row-fluid">
			<div class="span12">
				<div class="form-group" style="margin-bottom:20px;">
					<a class="btn btn-primary" data-toggle='modal' href='#pengaturan' role='button'><i class="icon-cog"></i> Pengaturan</a>
				</div>
				<div class='modal hide fade' id='pengaturan' role='dialog' tabindex='-1'>
	                <div class='modal-header'>
	                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
	                    <h3>Pengaturan</h3>
	                </div>
	                <div class='modal-body'>
	                    <form class="form-horizontal" method="post" action="<?php echo site_url('absensi/tanggal_set'); ?>">
							<div class="control-group">
								<label class="control-label">Tanggal</label>
								<div class="controls">
									<div class='datepicker input-append' id='datepicker'>
										<input class='input-medium' data-format='yyyy.MM.dd' name="tanggal" placeholder='Pilih Tanggal' type='text' value="<?php echo $tanggal; ?>"/>
										<span class='add-on'>
											<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
										</span>
									</div>	
								</div>
							</div>
							<div class="control-group">						
								<label class="control-label">Sektor</label>
								<div class="controls">
									<select name="sektor" class="form-control">
										<option value="">Keseluruhan</option>
										<option value="MF">Male Formal</option>
										<option value="MI">Male Informal</option>
										<option value="FF">Female Formal</option>
										<option value="FI">Female Informal</option>
										<option value="JP">Jompo</option>
									</select>
								</div>
							</div>
							<div class="control-group">						
								<label class="control-label">Jenis Absen</label>
								<div class="controls">
									<select name="jenis" class="form-control">
										<option value="Pagi">Pagi</option>
										<option value="Sore">Sore</option>
									</select>
								</div>
							</div>
	                </div>
	                <div class='modal-footer'>
	                	<button type="submit" class="btn blue"><i class="icon-ok"></i> Atur</button>
	                    <button class='btn' data-dismiss='modal'>Close</button>
	                    </form>
	                </div>
	            </div>
				<div class='span11 box bordered-box blue-border' style='margin-bottom:0;'>
			        <div class='box-header blue-background'>
			            <div class='title'> Daftar Personal <?php echo $sekt; ?></div>
			            <div class='actions'>
			                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
			                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
			            </div>
			        </div>
			        <div class='box-content box-no-padding'>
			            <div class='responsive-table'>
			                <div class='scrollable-area'>
			                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
			                        <thead>
										<tr>
											<th>ID Biodata</th>
											<th>Nama Personal</th>
											<th class="hidden-phone">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach($personal as $has1) {
										?>
										<tr class="odd gradeX">
											<td><?php echo $has1->id_biodata; ?></td>
											<td><?php echo $has1->nama; ?></td>
											<td class="hidden-phone" width="300">
												<a href="<?php echo site_url('absensi/hadir_konf/'.$has1->id_personal); ?>" class="btn btn-primary">Hadir</a>
												<a class="btn btn-danger" data-toggle='modal' href='#<?php echo $has1->id_biodata; ?>_tidakmasuk' role='button'>Tidak Hadir</a>
												<a href="<?php echo site_url('absensi/detail_kehadiran/'.$has1->id_biodata); ?>" class="btn btn-success">Detail</a>
												<!-- Modal Tidak Masuk -->
												<div class='modal hide fade' id='<?php echo $has1->id_biodata; ?>_tidakmasuk' role='dialog' tabindex='-1'>
									                <div class='modal-header'>
									                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
									                    <h3>Keterangan Tidak Masuk</h3>
									                </div>
									                <div class='modal-body'>
									                    <form class="form-horizontal" name="ket" method="post" action="<?php echo site_url('absensi/tidakhadir_konf'); ?>">
									                    	<input type="text" name="biodata" value="<?php echo $has1->id_biodata; ?>" class="hidden">
															<div class="control-group">
																<label class="control-label">Nama</label>
																<div class="controls">
																	<input type="text" name="nama" class="span10 popovers" value="<?php echo $has1->nama; ?>" readonly>	
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">Jenis</label>
																<div class="controls">
																	<select name="jenis">
																		<option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                                                        <option value="Sakit">Sakit</option>
                                                                        <option value="Ijin">Ijin</option>
                                                                    </select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">Keterangan</label>
																<div class="controls">
																	<textarea class="form-control" name="keterangan" placeholder="Isi keterangan"></textarea>
																</div>
															</div>
									                </div>
									                <div class='modal-footer'>
									                	<button type="submit" class="btn blue"><i class="icon-ok"></i> Oke</button>
									                    <button class='btn' data-dismiss='modal'>Close</button>
									                    </form>
									                </div>
									            </div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
			                    </table>
			                    <!--
			                    <form class="form-horizontal" method="post" name="check" action="<?php echo site_url('absensi/absensi_konf'); ?>">
									<div class="control-grup">
										<div class="control-group">						
											<label class="control-label">Pilih aksi centang</label>
											<div class="controls">
												<select name="sektor" class="form-control">
													<option value="">Hadir</option>
													<option value="MF">Tidak Hadir</option>
												</select>
											</div>
											<div class="controls">
												<br><button type="submit" class="btn btn-primary">Pilih</button>
											</div>
										</div>
									</div>
								</form>
								-->
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="daftar">
		<div class="row-fluid">
			<div class="span9">
				<div class="control-group">
		            <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-cog"></i> Pengaturan</a>
		        </div>
		        <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel1">Pengaturan</h3></div>
                    <div class="modal-body">
                     	<form class="form-horizontal" method="post" action="<?php echo site_url('absensi/detail'); ?>">
                        <div class="control-group">
							<label class="control-label">Tahun</label>
							<div class="controls">
								<select name="tahun">
									<?php foreach($tampt as $row) { ?>
									<option value="<?php echo $row->tanggal_abs; ?>"><?php echo $row->tanggal_abs; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Bulan</label>
							<div class="controls">
								<?php $tggl = date("m/d/Y"); ?>
								<select name="bulan">
									<?php 
									$bln = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									$thn = array("","01","02","03","04","05","06","07","08","09","10","11","12");
									for ($i=1; $i < 13; $i++) { 
										echo "<option value='$thn[$i]'>$bln[$i]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Atur Sektor</label>
							<div class="controls">
								<select name="sektor" class="form-control">
									<option value="">Keseluruhan</option>
									<option value="MF">Male Formal</option>
									<option value="MI">Male Informal</option>
									<option value="FF">Female Formal</option>
									<option value="FI">Female Informal</option>
									<option value="JP">Jompo</option>
								</select>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary" name="bulantahun">Oke</button>
                    </div>
                   	</form>
                </div>
                <div class='span11 box bordered-box blue-border' style='margin-bottom:0;'>
			        <div class='box-header blue-background'>
			            <div class='title'> Data Absensi <?php echo $sekt; ?></div>
			            <div class='actions'>
			                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
			                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
			            </div>
			        </div>
			        <div class='box-content box-no-padding'>
			            <div class='responsive-table'>
			                <div class='scrollable-area'>
			                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
			                        <thead>
										<tr>
											<th>No</th>
											<th>ID Biodata</th>
											<th>Nama Personal</th>
											<th>Jenis</th>
											<th>Keterangan</th>
											<th>Tanggal</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach($absensi as $has1) {
										?>
										<tr class="odd gradeX">
											<td><?php echo $no; ?></td>
											<td><?php echo $has1->id_biodata; ?></td>
											<td><?php echo $has1->nama; ?></td>
											<?php 
											if($has1->jenis == 'Hadir') {
												$gmbr = "success";
											} else if($has1->jenis == 'Sakit') {
												$gmbr = "primary";
											} else if($has1->jenis == 'Ijin') {
												$gmbr = "warning";
											} else if($has1->jenis == 'Tanpa Keterangan') {
												$gmbr = "danger";
											}
											?>
											<td><span class="label label-<?php echo $gmbr; ?>"><?php echo $has1->jenis; ?></span></td>
											<td><?php if($has1->keterangan == NULL) { echo "Tidak ada keterangan"; } else { echo $has1->keterangan; } ?></td>
											<td><?php echo $has1->tanggal_abs; ?></td>
											<td><?php echo $has1->waktu; ?></td>
										</tr>
										<?php $no++; } ?>
									</tbody>
			                    </table>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="span3">
				<div class='box-content box-statistic green-background'>
                    <h3 class='title text-primary'><?php echo $masuk; ?></h3>
                    <small>Masuk</small>
                    <div class='text-success icon-group align-right'></div>
                </div>
                <div class='box-content box-statistic blue-background'>
                    <h3 class='title text-success'><?php echo $sakit; ?></h3>
                    <small>Sakit</small>
                    <div class='text-primary icon-group align-right'></div>
                </div>
                <div class='box-content box-statistic orange-background'>
                    <h3 class='title muted'><?php echo $ijin; ?></h3>
                    <small>Ijin</small>
                    <div class='warning icon-group align-right'></div>
                </div>
                <div class='box-content box-statistic red-background'>
                    <h3 class='title muted'><?php echo $alpha; ?></h3>
                    <small>Tanpa Keterangan</small>
                    <div class='danger icon-group align-right'></div>
                </div>
            </div>
		</div>
	</div>
	<?php } else if($status == '2') { ?>
	<div class="tab-pane" id="tambah">
		<div class="row-fluid">
			<div class="span12">
				<div class="form-group" style="margin-bottom:20px;">
					<a class="btn btn-primary" data-toggle='modal' href='#pengaturan' role='button'><i class="icon-cog"></i> Pengaturan</a>
				</div>
				<div class='modal hide fade' id='pengaturan' role='dialog' tabindex='-1'>
	                <div class='modal-header'>
	                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
	                    <h3>Pengaturan</h3>
	                </div>
	                <div class='modal-body'>
	                    <form class="form-horizontal" method="post" action="<?php echo site_url('absensi/tanggal_set'); ?>">
							<div class="control-group">
								<label class="control-label">Tanggal</label>
								<div class="controls">
									<div class='datepicker input-append' id='datepicker'>
										<input class='input-medium' data-format='yyyy.MM.dd' name="tanggal" placeholder='Pilih Tanggal' type='text' value="<?php echo $tanggal; ?>"/>
										<span class='add-on'>
											<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
										</span>
									</div>	
								</div>
							</div>
							<div class="control-group">						
								<label class="control-label">Sektor</label>
								<div class="controls">
									<select name="sektor" class="form-control">
										<option value="">Keseluruhan</option>
										<option value="MF">Male Formal</option>
										<option value="MI">Male Informal</option>
										<option value="FF">Female Formal</option>
										<option value="FI">Female Informal</option>
										<option value="JP">Jompo</option>
									</select>
								</div>
							</div>
							<div class="control-group">						
								<label class="control-label">Jenis Absen</label>
								<div class="controls">
									<select name="jenis" class="form-control">
										<option value="Pagi">Pagi</option>
										<option value="Sore">Sore</option>
									</select>
								</div>
							</div>
	                </div>
	                <div class='modal-footer'>
	                	<button type="submit" class="btn blue"><i class="icon-ok"></i> Atur</button>
	                    <button class='btn' data-dismiss='modal'>Close</button>
	                    </form>
	                </div>
	            </div>
				<div class='span11 box bordered-box blue-border' style='margin-bottom:0;'>
			        <div class='box-header blue-background'>
			            <div class='title'> Daftar Personal <?php echo $sekt; ?></div>
			            <div class='actions'>
			                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
			                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
			            </div>
			        </div>
			        <div class='box-content box-no-padding'>
			            <div class='responsive-table'>
			                <div class='scrollable-area'>
			                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
			                        <thead>
										<tr>
											<th>ID Biodata</th>
											<th>Nama Personal</th>
											<th class="hidden-phone">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach($personal as $has1) {
										?>
										<tr class="odd gradeX">
											<td><?php echo $has1->id_biodata; ?></td>
											<td><?php echo $has1->nama; ?></td>
											<td class="hidden-phone" width="300">
												<a href="<?php echo site_url('absensi/hadir_konf/'.$has1->id_personal); ?>" class="btn btn-primary">Hadir</a>
												<a class="btn btn-danger" data-toggle='modal' href='#<?php echo $has1->id_biodata; ?>_tidakmasuk' role='button'>Tidak Hadir</a>
												<a href="<?php echo site_url('absensi/detail_kehadiran/'.$has1->id_biodata); ?>" class="btn btn-success">Detail</a>
												<!-- Modal Tidak Masuk -->
												<div class='modal hide fade' id='<?php echo $has1->id_biodata; ?>_tidakmasuk' role='dialog' tabindex='-1'>
									                <div class='modal-header'>
									                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
									                    <h3>Keterangan Tidak Masuk</h3>
									                </div>
									                <div class='modal-body'>
									                    <form class="form-horizontal" name="ket" method="post" action="<?php echo site_url('absensi/tidakhadir_konf'); ?>">
									                    	<input type="text" name="biodata" value="<?php echo $has1->id_biodata; ?>" class="hidden">
															<div class="control-group">
																<label class="control-label">Nama</label>
																<div class="controls">
																	<input type="text" name="nama" class="span10 popovers" value="<?php echo $has1->nama; ?>" readonly>	
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">Jenis</label>
																<div class="controls">
																	<select name="jenis">
																		<option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                                                        <option value="Sakit">Sakit</option>
                                                                        <option value="Ijin">Ijin</option>
                                                                    </select>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">Keterangan</label>
																<div class="controls">
																	<textarea class="form-control" name="keterangan" placeholder="Isi keterangan"></textarea>
																</div>
															</div>
									                </div>
									                <div class='modal-footer'>
									                	<button type="submit" class="btn blue"><i class="icon-ok"></i> Oke</button>
									                    <button class='btn' data-dismiss='modal'>Close</button>
									                    </form>
									                </div>
									            </div>
											</td>
										</tr>
										<?php } ?>
									</tbody>
			                    </table>
			                    <!--
			                    <form class="form-horizontal" method="post" name="check" action="<?php echo site_url('absensi/absensi_konf'); ?>">
									<div class="control-grup">
										<div class="control-group">						
											<label class="control-label">Pilih aksi centang</label>
											<div class="controls">
												<select name="sektor" class="form-control">
													<option value="">Hadir</option>
													<option value="MF">Tidak Hadir</option>
												</select>
											</div>
											<div class="controls">
												<br><button type="submit" class="btn btn-primary">Pilih</button>
											</div>
										</div>
									</div>
								</form>
								-->
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<div class="tab-pane active" id="daftar">
		<div class="row-fluid">
			<div class="span9">
				<div class="control-group">
		            <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-cog"></i> Pengaturan</a>
		        </div>
		        <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel1">Pengaturan</h3></div>
                    <div class="modal-body">
                     	<form class="form-horizontal" method="post" action="<?php echo site_url('absensi/detail'); ?>">
                        <div class="control-group">
							<label class="control-label">Tahun</label>
							<div class="controls">
								<select name="tahun">
									<?php foreach($tampt as $row) { ?>
									<option value="<?php echo $row->tanggal_abs; ?>"><?php echo $row->tanggal_abs; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Bulan</label>
							<div class="controls">
								<?php $tggl = date("m/d/Y"); ?>
								<select name="bulan">
									<?php 
									$bln = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									$thn = array("","01","02","03","04","05","06","07","08","09","10","11","12");
									for ($i=1; $i < 13; $i++) { 
										echo "<option value='$thn[$i]'>$bln[$i]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Atur Sektor</label>
							<div class="controls">
								<select name="sektor" class="form-control">
									<option value="">Keseluruhan</option>
									<option value="MF">Male Formal</option>
									<option value="MI">Male Informal</option>
									<option value="FF">Female Formal</option>
									<option value="FI">Female Informal</option>
									<option value="JP">Jompo</option>
								</select>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button class="btn btn-primary" name="bulantahun">Oke</button>
                    </div>
                   	</form>
                </div>
                <div class='span11 box bordered-box blue-border' style='margin-bottom:0;'>
			        <div class='box-header blue-background'>
			            <div class='title'> Data Absensi <?php echo $sekt; ?></div>
			            <div class='actions'>
			                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i></a>
			                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i></a>
			            </div>
			        </div>
			        <div class='box-content box-no-padding'>
			            <div class='responsive-table'>
			                <div class='scrollable-area'>
			                    <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
			                        <thead>
										<tr>
											<th>No</th>
											<th>ID Biodata</th>
											<th>Nama Personal</th>
											<th>Jenis</th>
											<th>Keterangan</th>
											<th>Tanggal</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach($absensi as $has1) {
										?>
										<tr class="odd gradeX">
											<td><?php echo $no; ?></td>
											<td><?php echo $has1->id_biodata; ?></td>
											<td><?php echo $has1->nama; ?></td>
											<?php 
											if($has1->jenis == 'Hadir') {
												$gmbr = "success";
											} else if($has1->jenis == 'Sakit') {
												$gmbr = "primary";
											} else if($has1->jenis == 'Ijin') {
												$gmbr = "warning";
											} else if($has1->jenis == 'Tanpa Keterangan') {
												$gmbr = "danger";
											}
											?>
											<td><span class="label label-<?php echo $gmbr; ?>"><?php echo $has1->jenis; ?></span></td>
											<td><?php if($has1->keterangan == NULL) { echo "Tidak ada keterangan"; } else { echo $has1->keterangan; } ?></td>
											<td><?php echo $has1->tanggal_abs; ?></td>
											<td><?php echo $has1->waktu; ?></td>
										</tr>
										<?php $no++; } ?>
									</tbody>
			                    </table>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="span3">
				<div class='box-content box-statistic green-background'>
                    <h3 class='title text-primary'><?php echo $masuk; ?></h3>
                    <small>Masuk</small>
                    <div class='text-success icon-group align-right'></div>
                </div>
                <div class='box-content box-statistic blue-background'>
                    <h3 class='title text-success'><?php echo $sakit; ?></h3>
                    <small>Sakit</small>
                    <div class='text-primary icon-group align-right'></div>
                </div>
                <div class='box-content box-statistic orange-background'>
                    <h3 class='title muted'><?php echo $ijin; ?></h3>
                    <small>Ijin</small>
                    <div class='warning icon-group align-right'></div>
                </div>
                <div class='box-content box-statistic red-background'>
                    <h3 class='title muted'><?php echo $alpha; ?></h3>
                    <small>Tanpa Keterangan</small>
                    <div class='danger icon-group align-right'></div>
                </div>
            </div>
		</div>
	</div>
	<?php } ?>
</div>