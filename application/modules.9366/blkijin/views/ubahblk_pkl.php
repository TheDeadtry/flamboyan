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
													Ubah data PKL
												</div>
												
											</div>
											<div class='row-fluid'>
												<div class='span12'>
													 <?php echo form_open('blkijin/ubahblkpkl/'.$id_blkpkl->id_blk_pkl,array('class'=>'form-horizontal')); ?>		
															<div class="control-group">
																<label class="control-label">Tempat PKL</label>
																<div class="controls">
																	<input type="text" name="tempat" class="input-large" value="<?php echo $id_blkpkl->tempat;?>"/>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">Mulai Tanggal</label> &nbsp &nbsp
																<div class='datepicker input-append' id='mulai_tgl'>
																	<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="mulai_tgl" value="<?php echo $id_blkpkl->mulai_tgl;?>"/>
																		<span class='add-on'>
																			<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
																		</span>
																</div>												
															</div>
															
															<div class="control-group">
																<label class="control-label">Selesai Tanggal</label> &nbsp &nbsp
																<div class='datepicker input-append' id='selesai_tgl'>
																	<input class='input-large' data-format='yyyy-MM-dd' placeholder='Select date' type='text' name="selesai_tgl"value="<?php echo $id_blkpkl->selesai_tgl;?>"/>
																		<span class='add-on'>
																			<i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
																		</span>
																</div>												
															</div>
															
															<div class="control-group">
																<label class="control-label">Penilaian</label>
																<div class="controls">
																	<select class="input-large" data-placeholder="Choose a Category" tabindex="1" name="penilaian" value="<?php echo $id_blkpkl->penilaian;?>">
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
																	<input type="text" name="ket" class="input-large"value="<?php echo $id_blkpkl->ket;?>"/>
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

