                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Personal </span>
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
                    <li class='active'>Detail Personal </li>
                </ul>
            </div>
        </div>
    </div>
</div>                   

                <div class="row-fluid">

                	            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>BLK Perijinan</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                                <?php foreach ($tampil_data_personal as $row) { ?>
                                    <div class="span3">
                                        <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                        <?php 
                                            $this->load->view('template/menuadministrasi');
                                        ?>
                                    </div>
                                    <div class="span6">
                                        <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                    </div>



                                                <div class='span9 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
            <div class='title'>Tambah Perijinan</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                                                <div class="accordion " id="accordion1">
                                                    <?php if($hitung_data_blkijin == 0) { ?>
													<div class="accordion-group">
													<?php echo form_open('blkijin/tambahdata', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> KB </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																
																<div class="control-group">
																<label class="control-label">Tanggal Suntik</label>
																	<div class="controls">
																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="tgl_suntik_kb" name="tgl_suntik_kb" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>
																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="tgl_suntik_kb" name="tgl_suntik_kb" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div> -->
																</div>
																</div>
															
																	<div class="control-group">
																	<label class="control-label">Masa</label>
																	<div class="controls">
																		<input type="text" class="span5 popovers" name="masa_kb" data-trigger="hover" data-content="" data-original-title="Masa Hari" />
																	</div>
																	</div>
																	
																	
																	
																	<div class="control-group">
																	<label class="control-label">Berakhir Tanggal</label>
																		<div class="controls">
																			<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="berakhir_kb" name="berakhir_kb" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																			<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																			<input class=" m-ctrl-small date-picker span9" size="27" id="berakhir_kb" name="berakhir_kb" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																	 -->
																	</div>
																	</div>
																	
																	<div class="control-group">
																	<label class="control-label">Ket</label>
																	<div class="controls">
																		<input type="text" class="span5 popovers" name="ket_kb" data-trigger="hover" data-content="" data-original-title="Keterangan" />
																	</div>
																	</div>
																	
																	<div class="form-actions">
																		<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
																	</div>  
															
                                                                
                                                            </div>
                                                        </div>
														<?php echo form_close(); ?>
                                                    </div>
													
													<?php } else { ?>
													
													<div class="accordion-group">
													
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> KB </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																<?php echo form_open('blkijin/tambahdata', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
																<div class="control-group">
																<label class="control-label">Tanggal Suntik</label>
																	<div class="controls">
																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="tgl_suntik_kb" name="tgl_suntik_kb" data-format='yyyy.MM.dd'  placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="tgl_suntik_kb" name="tgl_suntik_kb" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
																</div>
															
																	<div class="control-group">
																	<label class="control-label">Masa</label>
																	<div class="controls">
																		<input type="text" class="span5 popovers" name="masa_kb" data-trigger="hover" data-content="" data-original-title="Masa Hari" />
																	</div>
																	</div>
																	
																	
																	
																	<div class="control-group">
																	<label class="control-label">Berakhir Tanggal</label>
																		<div class="controls">
																			<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="berakhir_kb" name="berakhir_kb" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																			<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																			<input class=" m-ctrl-small date-picker span9" size="27" id="berakhir_kb" name="berakhir_kb" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																	 -->
																	</div>
																	</div>
																	
																	<div class="control-group">
																	<label class="control-label">Ket</label>
																	<div class="controls">
																		<input type="text" class="span5 popovers" name="ket_kb" data-trigger="hover" data-content="" data-original-title="Keterangan" />
																	</div>
																	</div>
																	
																	<div class="form-actions">
																		<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
																	</div>
																	<?php echo form_close(); ?>
																	
																	
																	   <table class="table table-striped table-bordered" id="sample_1">
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
																				<td><?php echo $row->masa_kb;?></td>
																				<td><?php echo $row->berakhir_kb;?></td>
																				<td><?php echo $row->ket_kb?></td>
																				<td><a href="<?php echo site_url('blkijin/ubahdata/'.$row->id_blk_ijin); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
																					<a href="<?php echo site_url('blkijin/hapus_data/'.$row->id_blk_ijin); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
																				</td>
																				
																			</tr>
																			<?php $no++;
																			} ?>

																		</tbody>
																	</table>
															
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
													
													
													
													<?php } ?>
													
													<?php if($hitung_data_blkijin_b == 0) { ?>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Ijin Pulang </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
															<?php echo form_open('blkijin/tambahdata_b', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
															<div class="control-group">
															<label class="control-label">Mulai</label>
																<div class="controls">

																	<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="mulai_plg" name="mulai_plg" data-format='yyyy.MM.dd'  placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>


																<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="mulai_plg" name="mulai_plg" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
															
															</div>
															
															<div class="control-group">
															<label class="control-label">Kembali</label>
																<div class="controls">
																	<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="kembali_plg" name="kembali_plg" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="kembali_plg" name="kembali_plg" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
															 -->
																</div>
															
															</div>
											
															<div class="control-group">
															<label class="control-label">Terlambat</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="terlambat_plg" data-trigger="hover" data-content="" data-original-title="Terlambat berapa Hari" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Jumlah Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="hari_plg" data-trigger="hover" data-content="" data-original-title="Jumlah Hari Pulang" />
															</div>
															</div>
															
												
															
															<div class="control-group">
															<label class="control-label">Keterangan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket_plg" data-trigger="hover" data-content="" data-original-title="Keterangan" />
															</div>
															</div>
															
															
															<div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
															</div>
															<?php echo form_close(); ?>
                                                              
																
																
                                                            </div>
                                                        </div>
                                                    </div>
													<?php } else { ?>
													
													 <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Ijin Pulang </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
															<?php echo form_open('blkijin/tambahdata_b', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
															<div class="control-group">
															<label class="control-label">Mulai</label>
																<div class="controls">
																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="mulai_plg" name="mulai_plg" data-format='yyyy.MM.dd'  placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="mulai_plg" name="mulai_plg" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
															
															</div>
															
															<div class="control-group">
															<label class="control-label">Kembali</label>
																<div class="controls">
																	<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="kembali_plg" name="kembali_plg" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>
															<!-- 	<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="kembali_plg" name="kembali_plg" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
															
															</div>
											
															<div class="control-group">
															<label class="control-label">Terlambat</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="terlambat_plg" data-trigger="hover" data-content="" data-original-title="Terlambat berapa Hari" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Jumlah Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="hari_plg" data-trigger="hover" data-content="" data-original-title="Jumlah Hari Pulang" />
															</div>
															</div>
				
															
															<div class="control-group">
															<label class="control-label">Keterangan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket_plg" data-trigger="hover" data-content="" data-original-title="Keterangan" />
															</div>
															</div>
															
															
															<div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
															</div>
															<?php echo form_close(); ?>
                                                             
															
															<table class="table table-striped table-bordered" id="sample_2">
																		<thead>

																			
																			<tr>
																				<td>#</td>
																				<td>Mulai</td>
																				<td>Kembali</td>
																				 <td>Terlambat</td>
																				 <td>Jumlah hari</td>
																				 <td>Total Terlambat</td>
																				 <td>Total Ijin Pulang</td>
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
																				<td><?php echo $row->terlambat_plg;?></td>
																				<td><?php echo $row->hari_plg;?></td>
																				<td><?php echo $row->terlambat_plg;?></td>
																				<td><?php echo $row->hari_plg;?></td>
																				
																				<td><?php echo $row->ket_plg;?></td>
																				
																				<td><a href="<?php echo site_url('blkijin/ubahdata_b/'.$row->id_blk_plg); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
																					<a href="<?php echo site_url('blkijin/hapus_data_b/'.$row->id_blk_plg); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
																				</td>
																				
																			</tr>
																			<?php $no++;
																			} ?>

																		</tbody>
																	</table>	
																
                                                            </div>
                                                        </div>
                                                    </div>
													
													<?php } ?>
													
													
													<?php if($hitung_data_blkijin_c == 0) { ?>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"><i class=" icon-plus"></i> Ijin Inap </a></div>
                                                        <div id="collapse_3" class="accordion-body collapse">
                                                            <div class="accordion-inner">
																<?php echo form_open('blkijin/tambahdata_c', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                                <div class="control-group">
																	<label class="control-label">Mulai</label>
																	<div class="controls">

																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="kembali_plg" id="mulai_inap" name="mulai_inap" data-format='yyyy.MM.dd'  placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="mulai_inap" name="mulai_inap" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																	 -->
																	</div>
															
																</div>
															
																<div class="control-group">
																<label class="control-label">Kembali</label>
																	<div class="controls">
																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="kembali_plg" id="kembali_inap" name="kembali_inap" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																	<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																			<input class=" m-ctrl-medium date-picker span9" size="27" id="kembali_inap" name="kembali_inap" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																	 -->
																	</div>
																
																</div>
												
																<div class="control-group">
																<label class="control-label">Terlambat</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="terlambat_inap" data-trigger="hover" data-content="" data-original-title="Terlambat berapa Hari" />
																</div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Jumlah Hari</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="hari_inap" data-trigger="hover" data-content="" data-original-title="Jumlah Hari Inap" />
																</div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Keterangan</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="ket_inap" data-trigger="hover" data-content="" data-original-title="Keterangan" />
																</div>
																</div>
																
																<div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
																</div>
																<?php echo form_close(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
													
													<?php } else { ?>
														
														<div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"><i class=" icon-plus"></i> Ijin Inap</a></div>
                                                        <div id="collapse_3" class="accordion-body collapse">
                                                            <div class="accordion-inner">
																<?php echo form_open('blkijin/tambahdata_c', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                                <div class="control-group">
																	<label class="control-label">Mulai</label>
																	<div class="controls">
																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="kembali_plg" id="mulai_inap" name="mulai_inap" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="mulai_inap" name="mulai_inap" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																	 -->
																	</div>
															
																</div>
															
																<div class="control-group">
																<label class="control-label">Kembali</label>
																	<div class="controls">

																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' id="kembali_plg" id="kembali_inap" name="kembali_inap" data-format='yyyy.MM.dd' placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																<!-- 	<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																			<input class=" m-ctrl-medium date-picker span9" size="27" id="kembali_inap" name="kembali_inap" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																	 -->
																	</div>
																
																</div>
												
																<div class="control-group">
																<label class="control-label">Terlambat</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="terlambat_inap" data-trigger="hover" data-content="" data-original-title="Terlambat berapa Hari" />
																</div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Jumlah Hari</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="hari_inap" data-trigger="hover" data-content="" data-original-title="Jumlah Hari Inap" />
																</div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Keterangan</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="ket_inap" data-trigger="hover" data-content="" data-original-title="Keterangan" />
																</div>
																</div>
																
																<div class="form-actions">
																	<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
																</div>
																<?php echo form_close(); ?>
																
																
																
																<table class="table table-striped table-bordered" id="sample_2">
																		<thead>

																			
																			<tr>
																				<td>#</td>
																				<td>Mulai</td>
																				<td>Kembali</td>
																				 <td>Terlambat</td>
																				 <td>Jumlah hari</td>
																				 <td>Total Terlambat</td>
																				 <td>Total Ijin Inap</td>
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
																				<td><?php echo $row->terlambat_inap;?></td>
																				<td><?php echo $row->hari_inap;?></td>
																				<td><?php echo $row->terlambat_inap;?></td>
																				<td><?php echo $row->hari_inap;?></td>
																				
																				<td><?php echo $row->ket_inap;?></td>
																				
																				<td><a href="<?php echo site_url('blkijin/ubahdata_c/'.$row->id_blk_inap); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
																					<a href="<?php echo site_url('blkijin/hapus_data_c/'.$row->id_blk_inap); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
																				</td>
																				
																			</tr>
																			<?php $no++;
																			} ?>

																		</tbody>
																	</table>	
                                                            </div>
                                                        </div>
                                                    </div>
												   
												   
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                   
                                    <div class="space5"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>