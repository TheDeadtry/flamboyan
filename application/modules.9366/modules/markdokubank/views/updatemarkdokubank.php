                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail Dokumen Visa</h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail Dokumen Visa</a><span class="divider-last">&nbsp;</span></li>
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
                                        <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                    </div>
                                    <div class="span9">
                                        <div class="widget">
                                            <div class="widget-title">
                                                <h4><i class="icon-reorder"></i>Update Dokumen Visa</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                            <div class="widget-body">
                                                <?php foreach($tampil_data_markvisa as $row) { ?> 
                                                <div class="accordion " id="accordion1">
                                                <?php echo form_open('markvisa/updatemarkvisa', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Kocokan </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
                                                                <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="tgl_kocokan" value="<?php echo date('d/m/Y', strtotime($row->tgl_kocokan)); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">PT</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="pt" class="span10 popovers" value="<?php echo $row->pt_kocokan; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Finger Print </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="tgl_fp" value="<?php echo date('d/m/Y', strtotime($row->tgl_finger)); ?>"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"><i class=" icon-plus"></i> Perkiraan </a></div>
                                                        <div id="collapse_3" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <div class="control-group">
                                                                    <label class="control-label">Terima Visa</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="tgl_terima" value="<?php echo date('d/m/Y', strtotime($row->trm_visa)); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">PAP</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="pap" class="span10 popovers" value="<?php echo $row->pap_perkiraan; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Terbang</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="tgl_terbang" value="<?php echo date('d/m/Y', strtotime($row->terbang_perkiraan)); ?>"/>
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space5"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>