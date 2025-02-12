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
                                                <div class='title'>Dokumen VISA</div>
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
                                                <div class='title'>Kelola Dokumen VISA</div>
                                                <div class='actions'>
                                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                                    </a>
                                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='box-content box-padding'>
                                                <?php foreach($tampil_data_markvisa as $row) { ?>
                                                    <?php if($keterangan == 'kocokan') { ?>
                                                        <?php echo form_open('markvisa/updatekocokan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_kocokan" value="<?php echo $row->tgl_kocokan; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                   
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div>     
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'fp') { ?>
                                                        <?php echo form_open('markvisa/updatefingerprint', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_fp" value="<?php echo $row->tgl_finger; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Foto</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokfp' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>  
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div>  
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'visa') { ?> 
                                                        <?php echo form_open('markvisa/updatevisa', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Tombol Update berada Di bawah (Data Tidak Harus Diisi Semua.. Diisi Sesuai Dengan Data Yang ada)
                        </div>
                                                            <div class="form-actions">
                                                                 <label class="control-label">PERKIRAAN</label>
                                                            </div> 
                                                            <div class="control-group">
                                                                <label class="control-label">Perkiraan Kocokan</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="kira_kocok" value="<?php echo $row->kira_kocokan; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Perkiraan Finger Print</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="kira_finger" value="<?php echo $row->kira_finger; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Perkiraan Terima visa</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="kira_terima" value="<?php echo $row->kira_visa; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Perkiraan Terbang</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="kira_terbang" value="<?php echo $row->kira_terbang; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                 <label class="control-label">ACTUAL </label>
                                                            </div> 

                                                            <div class="control-group">
                                                                <label class="control-label">Actual Kocokan</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="actual_kocok" value="<?php echo $row->tgl_kocokan; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Actual Finger Print</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="actual_finger" value="<?php echo $row->tgl_finger; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Actual Terima Visa</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="actual_terima" value="<?php echo $row->trm_visa; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                 <label class="control-label">DETAIL VISA </label>
                                                            </div> 

                                                            <div class="control-group">
                                                            <label class="control-label">No Visa</label>
                                                            <div class="controls">
                                                                <input type="text" name="no_visa" value="<?php echo $row->no_visa; ?>"  class="span7 popovers" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Berlaku Dari </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_berlaku" value="<?php echo $row->tgl_berlaku; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Sampai </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_sampai" value="<?php echo $row->tgl_sampai; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Actual Terbang</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terbang" value="<?php echo $row->terbang_perkiraan; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Actual PAP</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_pap" value="<?php echo $row->pap_perkiraan; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Dokumen</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokvisa' role='button'>Lihat Foto dokumen</a>
                                                                </div>
                                                            </div> 
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'pap') { ?> 
                                                        <?php echo form_open('markvisa/updatepap', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">PAP</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="pap" value="<?php echo $row->pap_perkiraan; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Dokumen</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokpap' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div> 
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                    <?php } ?>
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

            <!-- Modal Update Finger Print -->
            <div class='modal hide fade' id='dokfp' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen Finger Print</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="SKCK" href="<?php echo base_url(); ?>assets/fingerprint/<?php echo "".$row->fingerprint; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/fingerprint/<?php echo "".$row->fingerprint; ?>" alt="SKCK" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markvisa/updatedokfingerprint');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="fingerprint"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_fingerprint; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update VISA -->
            <div class='modal hide fade' id='dokvisa' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen VISA</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="VISA" href="<?php echo base_url(); ?>assets/visa/<?php echo "".$row->visa; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/visa/<?php echo "".$row->visa; ?>" alt="VISA" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markvisa/updatedokvisa');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="visa"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_visa; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update PAP -->
            <div class='modal hide fade' id='dokpap' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen PAP</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="PAP" href="<?php echo base_url(); ?>assets/pap/<?php echo "".$row->pap; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/pap/<?php echo "".$row->pap; ?>" alt="PAP" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markvisa/updatedokpap');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="pap"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_pap; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>