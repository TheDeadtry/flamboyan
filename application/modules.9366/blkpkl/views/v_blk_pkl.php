<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Administrasi </span>
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
                    <li class='active'>Detail Administrasi </li>
                </ul>
            </div>
        </div>
    </div>
</div>                     

                <div class="row-fluid">
                   
            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Blk PKL</div>
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
                                <?php if($hitung_data_blkpkl == 0) { ?>
                                   
            <div class='span8 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Tambah Data PKL</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                                                <div class="accordion " id="accordion1">
                                                <?php echo form_open('blkpkl/tambahpkl', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> PKL </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																
															<div class="control-group">
															<label class="control-label">Tempat PKL</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="tempat" data-trigger="hover" data-content="Tempat PKL" data-original-title="" />
															</div>
															</div>
																
																
																<div class="control-group">
																<label class="control-label">Mulai Tanggal</label>
																	<div class="controls">
																		 <div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' data-format='yyyy.MM.dd' id="mulai_tgl" name="mulai_tgl"  placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																	<!-- 	<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="mulai_tgl" name="mulai_tgl" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
																</div>
															
															<div class="control-group">
															<label class="control-label">Selesai Tanggal</label>
															
																<div class="controls">
																	 <div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' data-format='yyyy.MM.dd' id="selesai_tgl" name="selesai_tgl"  placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="selesai_tgl" name="selesai_tgl" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
															
															</div>
															
															
															<div class="control-group">
															<label class="control-label">Jumlah Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="jml_hari" data-trigger="hover" data-content="Jumlah Hari" data-original-title="" />
															</div>
															</div>
															<div class="control-group">
																<label class="control-label">Penilaian</label>
																<div class="controls">
																	<select class="span5 " data-placeholder="Choose a Category" tabindex="1" name="penilaian">
																		<option value="" />Select...
																		<option value="Baik" />Baik
																		<option value="Cukup" />Cukup
																		<option value="Kurang" />Kurang
																	</select>
																</div>
															</div>
															<div class="control-group">
															<label class="control-label">Total PKL Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="total_hari" data-trigger="hover" data-content="Total PKL Hari" data-original-title="" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">Keterangan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket" data-trigger="hover" data-content="Keterangan" data-original-title="" />
															</div>
															</div>
															
															
															
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                    </div>
                                                <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    
            <div class='span8 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Tambah Data PKL</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                                                <div class="accordion " id="accordion1">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> PKL </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
														<?php echo form_open('blkpkl/tambahpkl', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
															<div class="control-group">
															<label class="control-label">Tempat PKL</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="tempat" data-trigger="hover" data-content="Tempat PKL" data-original-title="" />
															</div>
															</div>
																
																
																<div class="control-group">
																<label class="control-label">Mulai Tanggal</label>
																	<div class="controls">
																		<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="mulai_tgl" name="mulai_tgl" data-date-format="yyyy.mm.dd" type="text"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
																</div>
															
															<div class="control-group">
															<label class="control-label">Selesai Tanggal</label>
															
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="selesai_tgl" name="selesai_tgl" data-date-format="yyyy.mm.dd" type="text"  /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
															
															
															<div class="control-group">
															<label class="control-label">Jumlah Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="jml_hari" data-trigger="hover" data-content="Jumlah Hari" data-original-title="" />
															</div>
															</div>
															<div class="control-group">
																<label class="control-label">Penilaian</label>
																<div class="controls">
																	<select class="span5 " data-placeholder="Choose a Category" tabindex="1" name="penilaian">
																		<option value="" />Select...
																		<option value="Baik" />Baik
																		<option value="Cukup" />Cukup
																		<option value="Kurang" />Kurang
																	</select>
																</div>
															</div>
															<div class="control-group">
															<label class="control-label">Total PKL Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="total_hari" data-trigger="hover" data-content="Total PKL Hari" data-original-title="" />
															</div>
															</div>
															<div class="control-group">
															<label class="control-label">Keterangan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket" data-trigger="hover" data-content="Keterangan" data-original-title="" />
															</div>
															</div>
															<div class="form-actions">
																<button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
															</div>
														<?php echo form_close(); ?>
															
															
									 <table class="table table-striped table-bordered" id="sample_10">
																		<thead>

																			
																			<tr>
																				<th>#</th>
																				<td>Tempat PKL</td>
																				<td>Mulai Tanggal</td>
																				 <td>Selesai Tanggal</td>
																				 <td>Jumlah Hari</td>
																				 <td>Penilaian</td>
																				 <td>Total PKL Hari</td>
																				 <td>Ket</td>
																				 <td>Action</td>
																			</tr>
																		</thead>
																		<tbody>
																		 <?php $no = 1; 
																					foreach ($data_blkpkl as $row) { ?>
																			<tr>
																			   <td><?php echo $no;?></td>
																				<td><?php echo $row->tempat;?></td>
																				<td><?php echo $row->mulai_tgl;?></td>
																				<td><?php echo $row->selesai_tgl;?></td>
																				<td><?php echo $row->jml_hari;?></td>
																				<td><?php echo $row->penilaian;?></td>
																				<td><?php echo $row->total_hari;?></td>
																				<td><?php echo $row->ket;?></td>
																				<td><a href="<?php echo site_url('blkpkl/ubahblkpkl/'.$row->id_blk_pkl); ?>"class="btn-blue"><i class="icon-edit"></i>Edit</a>
																					<a href="<?php echo site_url('blkpkl/hapus_data/'.$row->id_blk_pkl); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
																				</td>
																				
																			</tr>
																			<?php $no++;
																			} ?>

																		</tbody>
																	</table>
																
															
															
															</div>
                                                        </div>
                                                    </div>
                                                  
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                    <div class="space5"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>