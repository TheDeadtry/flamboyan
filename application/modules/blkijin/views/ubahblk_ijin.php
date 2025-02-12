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
                                <div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                   
                                </div>
                                <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                </div>

									<div class='row-fluid'>
										<div class='span8 box'>
											<div class='box-header'>
												<div class='title'>
													<div class='icon-inbox'></div>
													Ubah data KB
												</div>
												
											</div>
											<div class='row-fluid'>
												<div class='span12'>
													 <?php echo form_open('blkijin/ubahdata/'.$id_blk_ijin->id_blk_ijin,array('class'=>'form-horizontal')); ?>		
															<div class="control-group">
																<label class="control-label">Tanggal Suntik</label> &nbsp &nbsp
																	<div class='datepicker input-append' id='tgl_suntik_kb'>
																	<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="tgl_suntik_kb"  value="<?php echo $id_blk_ijin->tgl_suntik_kb;?>"/>
																		<span class='add-on'>
																		  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
																		</span>
																	</div>
																	
															</div>

															            <div class="control-group">
                                <label class="control-label">Pilihan KB</label>
                                <div class="controls">
                                  <select class="span5 " name="statusp" data-placeholder="Choose a Category" tabindex="1">
                                  <option value="<?php echo $id_blk_ijin->status;?>" /><?php echo $id_blk_ijin->status;?>
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
																	<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="berakhir_kb"  value="<?php echo $id_blk_ijin->berakhir_kb;?>"/>
																		<span class='add-on'>
																		  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
																		</span>
																	</div>
																
															</div>
			
															<div class="control-group">
																<label class="control-label">Keterangan</label>
																<div class="controls">
																	<input type="text" name="ket_kb" class="input-large"  value="<?php echo $id_blk_ijin->ket_kb;?>"/>
																</div>
															</div>
															
															<div class="form-actions">
																<?php echo form_submit('submit', 'Update', " class = 'btn blue' "); ?>
																<a href="<?php echo site_url('blkijin/detail')?>" class="btn btn">Kembali</a>
															</div>
														<?php echo form_close(); ?>
													
													
														
												</div>

											</div>
										</div>

									</div>                 
                                
                                <?php } ?>

                            </div>
    </div>
</div>

