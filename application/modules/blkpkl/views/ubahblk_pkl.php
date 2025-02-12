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
                               
                                     <div class='span8 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
            <div class='title'>Ubah Data PKL</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                                                <div class="accordion " id="accordion1">
                                              <?php echo form_open('blkpkl/ubahblkpkl/'.$id_blkpkl->id_blk_pkl,array('class'=>'form-horizontal')); ?>		
                                                    <div class="accordion-group">
														<?php foreach($data_blkpkl as $row) { ?>
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dapat Majikan </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																
															<div class="control-group">
															<label class="control-label">Tempat</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="tempat" value="<?php echo $row->tempat;?>"data-trigger="hover" data-content="Tempat PKL" data-original-title="" />
															</div>
															</div>
																
																<div class="control-group">
																<label class="control-label">Mulai Tanggal</label>
																	<div class="controls">
																		<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' data-format='yyyy.MM.dd' id="mulai_tgl" name="mulai_tgl"  value="<?php echo $row->mulai_tgl;?>" placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="mulai_tgl" name="mulai_tgl" data-date-format="yyyy.mm.dd" type="text" value="<?php echo $row->mulai_tgl;?>"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
																</div>
															
															<div class="control-group">
															<label class="control-label">Selesai Tanggal</label>
															
																<div class="controls">
																	<div class='datepicker input-append' id='datepicker'>
															              <input class='input-medium' data-format='yyyy.MM.dd' id="selesai_tgl" name="selesai_tgl"  value="<?php echo $row->selesai_tgl;?>" placeholder='Select datepicker' type='text' />
															            <span class='add-on'>
															                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
															             </span>
															                       </div>

																<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="selesai_tgl" name="selesai_tgl" data-date-format="yyyy.mm.dd" type="text" value="<?php echo $row->selesai_tgl;?>" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
																</div>
															
															</div>
															
															
															<div class="control-group">
															<label class="control-label">Jumlah Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="jml_hari" value="<?php echo $row->jml_hari;?>" data-trigger="hover" data-content="" data-original-title="Jumlah Hari" />
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
															<label class="control-label">Total Hari</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="total_hari" value="<?php echo $row->total_hari;?>" data-trigger="hover" data-content="" data-original-title="Keterangan" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Keterangan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket" value="<?php echo $row->ket;?>" data-trigger="hover" data-content="" data-original-title="Keterangan" />
															</div>
															</div>
															
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php } ?>
													
                                                    <div class="form-actions">
                                                      <?php echo form_submit('submit', 'Update', " class = 'btn blue' "); ?>
                                                    </div>
													
                                                <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              
                                    
                                <?php } ?>
                                    <div class="space5"></div>
                            </div>
                        </div>
                    </div>
                </div>