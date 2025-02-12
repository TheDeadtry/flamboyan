
<div class="row-fluid">
    <div class="span12">
        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
            </span>
        </div>
        <h3 class="page-title">Halaman <small>Absensi</small></h3>
        <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
            <li><a href="#">Absensi</a><span class="divider">&nbsp;</span></li>
            <li><a>Tanggal : <?php echo $tanggal; ?></a><span class="divider-last">&nbsp;</span></li>
        </ul>
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
				<form class="form-horizontal" method="post" action="<?php echo site_url('absensi/tanggal_set'); ?>">
					<div class="control-group span12">
						<label class="control-label span1">Tanggal</label>
						<div class="controls span3">
							<?php $tggl = date("m/d/Y"); ?>
							<input class=" m-ctrl-medium date-picker" size="16" type="text" value="<?php echo $tggl; ?>" name="tanggal"/>
						</div>
						<label class="control-label span1">Sektor</label>
						<div class="controls span3">
							<select name="sektor" class="form-control">
								<option value="">Keseluruhan</option>
								<option value="MF">Male Formal</option>
								<option value="MI">Male Informal</option>
								<option value="FF">Female Formal</option>
								<option value="FI">Female Informal</option>
								<option value="JP">Jompo</option>
							</select>
						</div>
						<button type="submit" class="btn blue"><i class="icon-ok"></i> Atur</button>
					</div>
				</form>
				<div class="widget">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Daftar Personal</h4>
						<span class="tools">

							<a href="javascript:;" class="icon-chevron-down"></a>
							<a href="javascript:;" class="icon-remove"></a>
						</span>
					</div>
					<div class="widget-body">
						<table class="table table-striped table-bordered" id="sample_1">
							<thead>
								<tr>
									<th>No</th>
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
									<td class="hidden-phone"><a href="<?php echo site_url('absensi/tambah_absensi/'.$has1->id_personal); ?>" class="btn btn-primary">Absen</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
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
				<div class="widget">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Daftar Personal</h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
							<a href="javascript:;" class="icon-remove"></a>
						</span>
					</div>
					<div class="widget-body">
						<table class="table table-striped table-bordered" id="sample_1">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Personal</th>
									<th>Nama Personal</th>
									<th>Jenis</th>
									<th>Keterangan</th>
									<th>Tanggal</th>
									<th>Waktu</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($absensi as $has1) {
								?>
								<tr class="odd gradeX">
									<td><?php echo $has1->id_absensi; ?></td>
									<td><?php echo $has1->id_personal; ?></td>
									<td><?php echo $has1->nama; ?></td>
									<?php 
									if($has1->jenis == 'Masuk') {
										$gmbr = "success";
									} else if($has1->jenis == 'Sakit') {
										$gmbr = "primary";
									} else if($has1->jenis == 'Ijin') {
										$gmbr = "warning";
									} else if($has1->jenis == 'Tidak Masuk') {
										$gmbr = "danger";
									}
									?>
									<td><span class="label label-<?php echo $gmbr; ?>"><?php echo $has1->jenis; ?></span></td>
									<td><?php echo $has1->keterangan; ?></td>
									<td><?php echo $has1->tanggal_abs; ?></td>
									<td><?php echo $has1->waktu; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="span3">
				<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
                    <div class="metro-overview green-color clearfix">
                        <div class="display"><i class="icon-group"></i>
                        </div>
                        <div class="details">
                            <div class="numbers"><?php echo $masuk; ?> Orang</div>
                            <div class="title">Masuk</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span3">
				<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
                    <div class="metro-overview turquoise-color clearfix">
                        <div class="display"><i class="icon-group"></i>
                        </div>
                        <div class="details">
                            <div class="numbers"><?php echo $sakit; ?> Orang</div>
                            <div class="title">Sakit</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span3">
				<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
                    <div class="metro-overview gray-color clearfix">
                        <div class="display"><i class="icon-group"></i>
                        </div>
                        <div class="details">
                            <div class="numbers"><?php echo $ijin; ?> Orang</div>
                            <div class="title">Ijin</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span3">
				<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
                    <div class="metro-overview red-color clearfix">
                        <div class="display"><i class="icon-group"></i>
                        </div>
                        <div class="details">
                            <div class="numbers"><?php echo $alpha; ?> Orang</div>
                            <div class="title">Tidak Masuk</div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<?php } else if($status == '2') { ?>
	<div class="tab-pane" id="tambah">
		<div class="row-fluid">
			<div class="span12">
				<form class="form-horizontal" method="post" action="<?php echo site_url('absensi/tanggal_set'); ?>">
					<div class="control-group span12">
						<label class="control-label span1">Tanggal</label>
						<div class="controls span2">
							<?php $tggl = date("m/d/Y"); ?>
							<input class=" m-ctrl-medium date-picker" size="16" type="text" value="<?php echo $tggl; ?>" name="tanggal"/>
							<button type="submit" class="btn blue"><i class="icon-ok"></i> Atur</button>
						</div>
					</div>
				</form>
				<div class="widget">
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Daftar Personal</h4>
						<span class="tools">

							<a href="javascript:;" class="icon-chevron-down"></a>
							<a href="javascript:;" class="icon-remove"></a>
						</span>
					</div>
					<div class="widget-body">
						<table class="table table-striped table-bordered" id="sample_1">
							<thead>
								<tr>
									<th>No</th>
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
									<td class="hidden-phone"><a href="<?php echo site_url('absensi/tambah_absensi/'.$has1->id_personal); ?>" class="btn btn-primary">Absen</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
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
				<div class="widget">
					<div class="widget-title">
						<?php 
							if($bulan == '01') {
								$buln = 'Januari';
							} else if($bulan == '02') {
								$buln = 'Februari';
							} else if($bulan == '03') {
								$buln = 'Maret';
							} else if($bulan == '04') {
								$buln = 'April';
							} else if($bulan == '05') {
								$buln = 'Mei';
							} else if($bulan == '06') {
								$buln = 'Juni';
							} else if($bulan == '07') {
								$buln = 'Juli';
							} else if($bulan == '08') {
								$buln = 'Agustus';
							} else if($bulan == '09') {
								$buln = 'September';
							} else if($bulan == '10') {
								$buln = 'Oktober';
							} else if($bulan == '11') {
								$buln = 'November';
							} else if($bulan == '12') {
								$buln = 'Desember';
							}
						?>
						<h4><i class="icon-reorder"></i> Data Absensi <?php echo $buln." ".$tahun; ?></h4>
						<span class="tools">
							<a href="javascript:;" class="icon-chevron-down"></a>
							<a href="javascript:;" class="icon-remove"></a>
						</span>
					</div>
					<div class="widget-body">
						<table class="table table-striped table-bordered" id="sample_1">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Personal</th>
									<th>Nama Personal</th>
									<th>Jenis</th>
									<th>Keterangan</th>
									<th>Tanggal</th>
									<th>Waktu</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach($absensi as $has1) {
								?>
								<tr class="odd gradeX">
									<td><?php echo $no; ?></td>
									<td><?php echo $has1->id_biodata; ?></td>
									<td><?php echo $has1->nama; ?></td>
									<?php 
									if($has1->jenis == 'Masuk') {
										$gmbr = "success";
									} else if($has1->jenis == 'Sakit') {
										$gmbr = "primary";
									} else if($has1->jenis == 'Ijin') {
										$gmbr = "warning";
									} else if($has1->jenis == 'Tidak Masuk') {
										$gmbr = "danger";
									}
									?>
									<td><span class="label label-<?php echo $gmbr; ?>"><?php echo $has1->jenis; ?></span></td>
									<td><?php echo $has1->keterangan; ?></td>
									<td><?php echo $has1->tanggal_abs; ?></td>
									<td><?php echo $has1->waktu; ?></td>
								</tr>
								<?php $no++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="span3">
				<div class="span12">
					<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
	                    <div class="metro-overview green-color clearfix">
	                        <div class="display"><i class="icon-group"></i>
	                        </div>
	                        <div class="details">
	                            <div class="numbers"><?php echo $masuk; ?> Orang</div>
	                            <div class="title">Masuk</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="span12">
					<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
	                    <div class="metro-overview turquoise-color clearfix">
	                        <div class="display"><i class="icon-group"></i>
	                        </div>
	                        <div class="details">
	                            <div class="numbers"><?php echo $sakit; ?> Orang</div>
	                            <div class="title">Sakit</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="span12">
					<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
	                    <div class="metro-overview gray-color clearfix">
	                        <div class="display"><i class="icon-group"></i>
	                        </div>
	                        <div class="details">
	                            <div class="numbers"><?php echo $ijin; ?> Orang</div>
	                            <div class="title">Ijin</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="span12">
					<div data-desktop="span12" data-tablet="span12" class="span12 responsive">
	                    <div class="metro-overview red-color clearfix">
	                        <div class="display"><i class="icon-group"></i>
	                        </div>
	                        <div class="details">
	                            <div class="numbers"><?php echo $alpha; ?> Orang</div>
	                            <div class="title">Tidak Masuk</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            </div>
		</div>
	</div>
	<?php } ?>
</div>
<!--
<div id="absen" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel1">Absensi</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal" method="post" action="">
			<div class="control-group">
				<label class="control-label">Nama</label>
				<div class="controls">
					<input class="input-medium form-control" readonly name="nama" value=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Jenis</label>
				<div class="controls">
					<select name="jenis" class="form-control">
						<option>Masuk</option>
						<option>Sakit</option>
						<option>Ijin</option>
						<option>Tidak Masuk</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<textarea class="form-control" name="keterangan" size="10"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tanggal</label>
				<div class="controls">
					<input class="input-medium form-control" readonly name="tggl" value="<?php echo date('m-d-Y'); ?>"/>
				</div>
			</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save</button>
	</div>
	</form>
</div>
-->