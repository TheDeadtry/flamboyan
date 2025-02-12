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
                            <div class='box-header orange-background'>
            <div class='title'>Blk Perijinan</div>
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
                            <div class='box-header blue-background'>
            <div class='title'>Ubah Ijin Pulang</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                                                <div class="accordion " id="accordion1">
                                              <?php echo form_open('blkijin/ubahdata_b/'.$id_blk_plg->id_blk_plg,array('class'=>'form-horizontal')); ?>	
														<?php foreach($data_blk_ijin_b as $row) { ?>
                                                     <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Ijin Pulang</a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																
																<div class="control-group">
																<label class="control-label">Mulai</label>
																	<div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                          <input class='input-medium' id="mulai_plg" name="mulai_plg" data-format='yyyy.MM.dd' value="<?php echo $row->mulai_plg;?>"placeholder='Select datepicker' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                         </span>
                                                                                   </div>

																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="mulai_plg" name="mulai_plg" data-date-format="yyyy.mm.dd" type="text" value="<?php echo $row->mulai_plg;?>" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
                                                                </div>
																</div>
																<div class="control-group">
																<label class="control-label">Kembali</label>
																	<div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                          <input class='input-medium' id="kembali_plg" name="kembali_plg" data-format='yyyy.MM.dd' value="<?php echo $row->kembali_plg;?>" placeholder='Select datepicker' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                         </span>
                                                                                   </div>

																		<!-- <div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="kembali_plg" name="kembali_plg" data-date-format="yyyy.mm.dd" type="text" value="<?php echo $row->kembali_plg;?>" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																 -->
                                                                </div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Terlambat</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="terlambat_plg" value="<?php echo $row->terlambat_plg;?>" data-trigger="hover" data-content="" data-original-title="Terlambat Pulang" />
																</div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Jumlah Hari</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="hari_plg" value="<?php echo $row->hari_plg;?>" data-trigger="hover" data-content="" data-original-title="Jumlah Hari" />
																</div>
																</div>
																
																<div class="control-group">
																<label class="control-label">Keterangan</label>
																<div class="controls">
																	<input type="text" class="span5 popovers" name="ket_plg" value="<?php echo $row->ket_plg;?>" data-trigger="hover" data-content="" data-original-title="Keterangan" />
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