                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail Dokumen Online</h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail Dokumen Online</a><span class="divider-last">&nbsp;</span></li>
                        </ul>
                    </div>
                </div>                    

                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-title">
                                <h4><i class="icon-user"></i>Profile</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span>
                            </div>
                            <div class="widget-body">
                                <?php foreach ($tampil_data_personal as $row) { ?>
                                    <div class="span3">
                                        <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row->foto ?>" alt="" /></div>
                                        <?php 
                                            $this->load->view('template/menuadministrasi');
                                        ?>
                                    </div>
                                    <div class="span6">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                    </div>
                               
                                    <div class="span9">
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4><i class="icon-reorder"></i>Ubah Data Marketing Awal</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                            <div class="widget-body">
                                                <div class="accordion " id="accordion1">
                                              <?php echo form_open('markawal/ubahmarkawal/'.$id_marka->id_marka,array('class'=>'form-horizontal')); ?>		
                                                    <div class="accordion-group">
														<?php foreach($data_marka as $row) { ?>
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dapat Majikan </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
																
																<div class="control-group">
																<label class="control-label">Majikan Minta Tanggal Terbang</label>
																	<div class="controls">
																		<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-small date-picker span9" size="27" id="majmntgl" name="mtgl_terbang" data-date-format="yyyy.mm.dd" type="text" value="<?php echo $row->mtgl_terbang;?>"/><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
																</div>
															
															<div class="control-group">
															<label class="control-label">Tanggal</label>
															
																<div class="controls">
																<div class="input-append date date-picker"  data-date="2012-02-22" data-date-format="yyyy.mm.dd" data-date-viewmode="years">
																		<input class=" m-ctrl-medium date-picker span9" size="27" id="tgl" name="tgl" data-date-format="yyyy.mm.dd" type="text" value="<?php echo $row->tgl;?>" /><span class="add-on"><i class="icon-calendar"></i></span></div>
																</div>
															
															</div>
															
															
															<div class="control-group">
															<label class="control-label">Nama Majikan</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="nama" value="<?php echo $row->nama;?>"data-trigger="hover" data-content="Nama Majikan" data-original-title="Majikan" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Agen</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="agen" value="<?php echo $row->agen;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Grup</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="grup" value="<?php echo $row->grup;?>" data-trigger="hover" data-content="" data-original-title="Grup" />
															</div>
															</div>
															
															<div class="control-group">
															<label class="control-label">Ket</label>
															<div class="controls">
																<input type="text" class="span5 popovers" name="ket" value="<?php echo $row->ket;?>" data-trigger="hover" data-content="" data-original-title="Keterangan" />
															</div>
															</div>
															
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php } ?>
													
                                                    <div class="form-actions">
                                                      <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
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