<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>BLK ~ Perijinan + PKL</span>
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
                    <li class='active'>BLK~ Perijinan + PKL</li>
                </ul>
            </div>
        </div>
    </div>
</div>                
<div class="row-fluid">
    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-content box-no-padding'>

                            <?php foreach ($tampil_data_personal as $row) { ?>
								
                                <div class="span3"><br>
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                   
                                </div>

									<div class='row-fluid'>
										<div class='span6 box'>
											<div class='box-header'>
												<div class='title'>
													<div class='icon-inbox'></div>
													<?php echo $row->nama;?> <br /><h4><small><?php echo "".$detailpersonalid ?></small></h4>
												</div>
												
											</div>
											<div class='row-fluid'>
												<div class='span10'>
													<div class='box-content box-statistic'>
														<h3 class='title text-error'><?php echo $jumlahkb; ?>  Data</h3>
														<small>KB</small>
														<div class='text-error icon-inbox align-right'></div>
													</div>
													<div class='box-content box-statistic'>
														<h3 class='title text-warning'><?php echo $jumlahplg; ?> x</h3>
														<small>Jumlah Ijin Pulang</small>
														<div class='text-warning icon-check align-right'></div>
													</div>
													<div class='box-content box-statistic'>
														<h3 class='title text-info'><?php echo $jumlahinap; ?> x</h3>
														<small>Jumlah Ijin Inap</small>
														<div class='text-info icon-check align-right'></div>
													</div>
													<div class='box-content box-statistic'>
														<h3 class='title text-success'><?php echo $jumlahpkl; ?> x</h3>
														<small>Jumlah PKL</small>
														<div class='text-success icon-time align-right'></div>
													</div>
												</div>
												<div class='span2'>
													<div class='box-content box-statistic'>
														<a class='btn btn-danger btn-medium' data-toggle='modal' href='#kb' role='button'><i class="icon icon-plus"></i></a>
													</div>
												
													<div class='box-content box-statistic'>
														<a class='btn btn-warning btn-medium' data-toggle='modal' href='#pulang' role='button'><i class="icon icon-plus"></i></a>
													</div>
													<br>
													<div class='box-content box-statistic'>
														<a class='btn btn-info btn-medium' data-toggle='modal' href='#in' role='button'><i class="icon icon-plus"></i></a>
													</div>
													<div class='box-content box-statistic'>
														<a class='btn btn-success btn-medium' data-toggle='modal' href='#oioi' role='button'><i class="icon icon-plus"></i></a>
													</div>
												</div>

											</div>
										</div>

									</div>
                                
                                <?php } ?>

                            </div>
    </div>
</div>
<div class="row-fluid">
	<br><br>
							<div class='box-header'>
								<div class='title'>
								<h3>Record Personal</h3>
								</div>			
							</div>
</div>
<div class="row-fluid">
    <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-content box-no-padding'>

											<ul class="nav nav-tabs">
	
														<li class='active'><a href='#llo' data-toggle='tab'>Data KB</a></li>
														<li class=''><a href='#kko' data-toggle='tab'>Data Ijin Pulang</a></li>
														<li class=''><a href='#inap' data-toggle='tab'>Data Ijin Inap</a></li>
														<li class=''><a href='#pkl' data-toggle='tab'>Data PKL</a></li>
	
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="llo">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
							<thead>
								
								<tr>
									<td>#</td>
									<td>Tanggal Suntik</td>
									<td>Masa</td>
									<td>Berakhir Tanggal</td>
									<td>Keterangan</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								 <?php $no = 1; 
									foreach ($data_blk_ijin as $row) { ?>
							 <tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row->tgl_suntik_kb;?></td>
									<td><?php echo $row->status;?>
									</td>
									<td><?php echo $row->berakhir_kb;?></td>
									<td><?php echo $row->ket_kb?></td>
									<td><a href="<?php echo site_url('blkijin/ubahdata/'.$row->id_blk_ijin); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
										<a href="<?php echo site_url('blkijin/hapus_data/'.$row->id_blk_ijin); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
									</td>
																				
							 </tr>
								<?php $no++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="kko">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
							<thead>
								<tr>
									<td>#</td>
									<td>Mulai</td>
									<td>Kembali</td>
									<td>Terlambat</td>
									<td>Jumlah Hari</td> 
									<td>Keterangan</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; 
			                       foreach ($data_blk_ijin_b as $row) { ?>
								<tr>
									<td><?php echo $no;?></td>
						            <td><?php echo $row->mulai_plg;?></td>
									<td><?php echo $row->kembali_plg;?></td>
									<td><?php echo $row->terlambat_plg;?> Hari</td>
									<td>
											<?php
												$tglAwal = $row->mulai_plg;
												$tglAkhir = $row->kembali_plg;
													$query = "SELECT datediff('$tglAkhir', '$tglAwal') as selisih";
													$hasil = Dbs::load($query);
													$data = mysqli_fetch_array($hasil);
													echo $data['selisih']." hari";
											?>
									</td>
									<td><?php echo $row->ket_plg;?></td>
									<td><a href="<?php echo site_url('blkijin/ubahdata_b/'.$row->id_blk_plg); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
										<a href="<?php echo site_url('blkijin/hapus_data_b/'.$row->id_blk_plg); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
									</td>
								</tr>
								<?php $no++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="inap">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
							<thead>
								<tr>
									<td>#</td>
									<td>Mulai</td>
									<td>Kembali</td>
									<td>Terlambat</td>
									<td>Jumlah hari</td>
									<td>Keterangan</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								 <?php $no = 1; 
									foreach ($data_blk_ijin_c as $row) { ?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row->mulai_inap;?></td>
									<td><?php echo $row->kembali_inap;?></td>
									<td><?php echo $row->terlambat_inap;?> Hari</td>
									<td><?php
												$tglAwal = $row->mulai_inap;
												$tglAkhir = $row->kembali_inap;
													$query = "SELECT datediff('$tglAkhir', '$tglAwal') as selisih";
													$hasil = Dbs::load($query);
													$data = mysqli_fetch_array($hasil);
													echo $data['selisih']." hari";
											?>
									</td>
									<td><?php echo $row->ket_inap;?></td>
									<td><a href="<?php echo site_url('blkijin/ubahdata_c/'.$row->id_blk_inap); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
										<a href="<?php echo site_url('blkijin/hapus_data_c/'.$row->id_blk_inap); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
									</td>
								</tr>
									<?php $no++;} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane" id="pkl">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget">
					<div class="widget-body">
						<table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
							<thead>
								<tr>
									<th>#</th>
									<td>Tempat PKL</td>
									<td>Mulai Tanggal</td>
									<td>Selesai Tanggal</td>
									<td>Jumlah Hari</td>
									<td>Penilaian</td>
									<td>Ket</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								 <?php $no = 1; 
									foreach ($data_blk_ijin_d as $row) { ?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row->tempat;?></td>
									<td><?php echo $row->mulai_tgl;?></td>
									<td><?php echo $row->selesai_tgl;?></td>
									<td><?php
												$tglAwal = $row->mulai_tgl;
												$tglAkhir = $row->selesai_tgl;
													$query = "SELECT datediff('$tglAkhir', '$tglAwal') as selisih";
													$hasil = Dbs::load($query);
													$data = mysqli_fetch_array($hasil);
													echo $data['selisih']." hari";
											?>
									</td>
									<td><?php echo $row->penilaian;?></td>
									<td><?php echo $row->ket;?></td>
									<td><a href="<?php echo site_url('blkijin/ubahblkpkl/'.$row->id_blk_pkl); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
										<a href="<?php echo site_url('blkijin/hapus_data_d/'.$row->id_blk_pkl); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
									</td>								
								</tr>
									<?php $no++; } ?>
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
</div>



<!----------------------------------------------------- Modal Here ------------------------------------------------------------>
							
<div class='modal hide fade' id='kb' role='dialog' tabindex='-1'>
	<div class='modal-header'>
		<button class='close' data-dismiss='modal' type='button'>&times;</button>
				<h4>Tambah Data KB</h4>
	</div>
	<div class='modal-body'>
		<?php echo form_open('blkijin/tambahdata', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>	
			<div class="control-group">
				<label class="control-label">Tanggal Suntik</label> &nbsp &nbsp
				<div class='datepicker input-append' id='tgl_suntik_kb'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="tgl_suntik_kb"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>

			                                 <div class="control-group">
                                <label class="control-label">Pilihan KB</label>
                                <div class="controls">
                                  <select class="span5 " name="statusp" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="1 Bulan" />1 Bulan
                                    <option value="2 Bulan" />2 Bulan
                                    <option value="3 Bulan" />3 Bulan
                                    <option value="4 Bulan" />4 Bulan
                                    <option value="5 Bulan" />5 Bulan
                                    </select>
                                </div>
                              </div>
			
			<div class="control-group">
				<label class="control-label">Berakhir Tanggal</label> &nbsp &nbsp
				<div class='datepicker input-append' id='berakhir_kb'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="berakhir_kb"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<input type="text" name="ket_kb" class="input-large"/>
				</div>
			</div>										
	</div>													
	<div class='modal-footer'>
		<button type="submit" name="submit">OK</button>
		<button class='btn' data-dismiss='modal'>Close</button>	
		<?php echo form_close(); ?>		
	</div>
</div>
<!-- ------------------------------------- Modal Here -------------------------------------------------------------------------------------->
<div class='modal hide fade' id='pulang' role='dialog' tabindex='-1'>
	<div class='modal-header'>
		<button class='close' data-dismiss='modal' type='button'>&times;</button>
				<h4>Tambah Data Ijin Pulang</h4>
	</div>
	<div class='modal-body'>
		<?php echo form_open('blkijin/tambahdata_b', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
			<div class="control-group">
				<label class="control-label">Mulai Pulang</label> &nbsp &nbsp
				<div class='datepicker input-append' id='mulai_plg'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="mulai_plg"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>
			
			<div class="control-group">
				<label class="control-label">Kembali Pulang</label> &nbsp &nbsp
				<div class='datepicker input-append' id='kembali_plg'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="kembali_plg"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>
			
			<div class="control-group">
				<label class="control-label">Terlambat</label>
				<div class="controls">
					<input type="text" name="terlambat_plg" class="input-large"/>
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<input type="text" name="ket_plg" class="input-large"/>
				</div>
			</div>										
	</div>													
	<div class='modal-footer'>
		<button type="submit" name="submit">OK</button>
		<button class='btn' data-dismiss='modal'>Close</button>	
		<?php echo form_close(); ?>		
	</div>
</div>
<!-- ------------------------------------- Modal Here -------------------------------------------------------------------------------------->
<div class='modal hide fade' id='in' role='dialog' tabindex='-1'>
	<div class='modal-header'>
		<button class='close' data-dismiss='modal' type='button'>&times;</button>
				<h4>Tambah Data Ijin Inap</h4>
	</div>
	<div class='modal-body'>
		<?php echo form_open('blkijin/tambahdata_c', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
			<div class="control-group">
				<label class="control-label">Mulai Inap</label> &nbsp &nbsp
				<div class='datepicker input-append' id='mulai_inap'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="mulai_inap"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>
			
			<div class="control-group">
				<label class="control-label">Kembali Inap</label> &nbsp &nbsp
				<div class='datepicker input-append' id='kembali_inap'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="kembali_inap"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>
			
			<div class="control-group">
				<label class="control-label">Terlambat</label>
				<div class="controls">
					<input type="text" name="terlambat_inap" class="input-large"/>
				</div>
			</div>
			
			
			
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<input type="text" name="ket_inap" class="input-large"/>
				</div>
			</div>										
	</div>													
	<div class='modal-footer'>
		<button type="submit" name="submit">OK</button>
		<button class='btn' data-dismiss='modal'>Close</button>	
		<?php echo form_close(); ?>		
	</div>
</div>
<!-- ------------------------------------- Modal Here -------------------------------------------------------------------------------------->
<div class='modal hide fade' id='oioi' role='dialog' tabindex='-1'>
	<div class='modal-header'>
		<button class='close' data-dismiss='modal' type='button'>&times;</button>
				<h4>Tambah Data PKL</h4>
	</div>
	<div class='modal-body'>
		<?php echo form_open('blkijin/tambahdata_d', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
			<div class="control-group">
				<label class="control-label">Tempat PKL</label>
				<div class="controls">
					<input type="text" name="tempat" class="input-large"/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mulai Tanggal</label> &nbsp &nbsp
				<div class='datepicker input-append' id='mulai_tgl'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="mulai_tgl"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>
			
			<div class="control-group">
				<label class="control-label">Selesai Tanggal</label> &nbsp &nbsp
				<div class='datepicker input-append' id='selesai_tgl'>
					<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="selesai_tgl"/>
						<span class='add-on'>
							<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
						</span>
				</div>												
			</div>
			
			<div class="control-group">
				<label class="control-label">Penilaian</label>
				<div class="controls">
					<select class="input-large" data-placeholder="Choose a Category" tabindex="1" name="penilaian">
								<option value="" />Select...    
								<option value="Baik" />Baik		
								<option value="Cukup" />Cukup
								<option value="Kurang" />Kurang
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<input type="text" name="ket" class="input-large"/>
				</div>
			</div>										
	</div>													
	<div class='modal-footer'>
		<button type="submit" name="submit">OK</button>
		<button class='btn' data-dismiss='modal'>Close</button>	
		<?php echo form_close(); ?>		
	</div>
</div>