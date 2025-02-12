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
                                                <div class='title'>Dokumen Online</div>
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
                                                <div class='title'>Kelola Dokumen Online <?php echo $keterangan; ?></div>
                                                <div class='actions'>
                                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                                    </a>
                                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='box-content box-padding'>
                                                <?php foreach($tampil_data_markonline as $row) { ?>
                                                    <?php if($keterangan == 'dokrumah') { ?>
                                                        <?php echo form_open('markonline/updatedokrumah', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" id="idbiodata" name="biodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                            <div class="control-group">
                                                                <label class="control-label">Keterangan</label>
                                                                <div class="controls">
                                                                    <select name="bkl" class="form-control">
                                                                        <?php if($row->bkl == 'Belum' || $row->bkl == NULL) { ?> 
                                                                            <option value="Belum">Belum Lengkap</option>
                                                                            <option value="Kurang">Kurang Lengkap</option>
                                                                            <option value="Lengkap">Lengkap</option>
                                                                        <?php } elseif($row->bkl == 'Kurang') { ?>
                                                                            <option value="Kurang">Kurang Lengkap</option>
                                                                            <option value="Belum">Belum Lengkap</option>
                                                                            <option value="Lengkap">Lengkap</option>
                                                                        <?php } elseif($row->bkl == 'Lengkap') { ?>
                                                                            <option value="Lengkap">Lengkap</option>
                                                                            <option value="Kurang">Kurang Lengkap</option>
                                                                            <option value="Belum">Belum Lengkap</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">KTP</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokktp' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Kartu Keluarga</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokkk' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Ijazah</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokijazah' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Surat Ijin</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#doksi' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">SN</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#doksn' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">PP LM EXP</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="pp_lm_exp" value="<?php echo $row->pp_lm_exp; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">ARC TW</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokarc' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Asuransi TW</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokasuransi' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">KTKLN EXP</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="ktkln_exp" value="<?php echo $row->ktkln_exp; ?>" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Khusus</label>
                                                                <div class="controls">
                                                                    &nbsp;<input type="text" name="khusus" class="span10 popovers" value="<?php echo $row->khusus; ?>">
                                                                </div>
                                                            </div>                         
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div>     
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'doksurat') { ?>
                                                        <?php echo form_open('markonline/updatesuratsk', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden">  
                                                                <div class="control-group">
                                                                    <label class="control-label">Keterangan (Perlu Surat Keterangan?)</label>
                                                                    <div class="controls">
                                                                        <select name="ket_sk" class="form-control">
                                                                            <?php if($row->ket_sk == 'Ya' || $row->ket_sk == NULL) { ?>
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                            <?php } elseif($row->ket_sk == 'Tidak') { ?>
                                                                                <option value="Tidak">Tidak</option>
                                                                                <option value="Ya">Ya</option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal Aju</label>
                                                                    <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_aju" value="<?php echo $row->tgl_aju_sk; ?>"  placeholder='Belum ada keterangan' type='text' />
                                                                            <span class='add-on'>
                                                                                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal Terima</label>
                                                                    <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terima" value="<?php echo $row->tgl_trm_sk; ?>"  placeholder='Belum ada keterangan' type='text' />
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
                                                    <?php } elseif($keterangan == 'rekom') { ?> 
                                                        <?php echo form_open('markonline/updaterekom', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Buat</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_buat" value="<?php echo $row->tgl_buat_rekom; ?>" placeholder='Select datepicker' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Terima</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terima_rekom" value="<?php echo $row->tgl_trm_rekom; ?>" placeholder='Select datepicker' type='text' />
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

            <!-- Modal Update KTP -->
            <div class='modal hide fade' id='dokktp' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update KTP</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="<?php echo base_url(); ?>assets/ktp/<?php echo "".$row->ktp; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/ktp/<?php echo "".$row->ktp; ?>" alt="KTP" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updatektp');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="ktp"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_ktp; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Kartu Keluarga -->
            <div class='modal hide fade' id='dokkk' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Kartu Keluarga</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KK" href="<?php echo base_url(); ?>assets/kk/<?php echo "".$row->kk; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/kk/<?php echo "".$row->kk; ?>" alt="KK" />
                                        <div class="zoom-icon"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updatekk');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="kk"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_ktp; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Ijazah -->
            <div class='modal hide fade' id='dokijazah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Ijazah</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="<?php echo base_url(); ?>assets/ijazah/<?php echo "".$row->ijazah; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/ijazah/<?php echo "".$row->ijazah; ?>" alt="KTP" />
                                        <div class="zoom-icon"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updateijazah');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="ijazah"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_ijazah; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Surat Ijin -->
            <div class='modal hide fade' id='doksi' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Surat Ijin</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="Surat Ijin" href="<?php echo base_url(); ?>assets/si/<?php echo "".$row->si; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/si/<?php echo "".$row->si; ?>" alt="Surat Ijin" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updatesi');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="si"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_si; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update SN -->
            <div class='modal hide fade' id='doksn' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update SN</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="SN" href="<?php echo base_url(); ?>assets/sn/<?php echo "".$row->sn; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/sn/<?php echo "".$row->sn; ?>" alt="SN" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updatesn');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="sn"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_sn; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update ARC TW -->
            <div class='modal hide fade' id='dokarc' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update ARC TW</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="ARC TW" href="<?php echo base_url(); ?>assets/arc/<?php echo "".$row->arc; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/arc/<?php echo "".$row->arc; ?>" alt="ARC TW"/>
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updatearc');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="arc"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_arc; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Asuransi TW -->
            <div class='modal hide fade' id='dokasuransi' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Asuransi TW</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="Asuransi TW" href="<?php echo base_url(); ?>assets/asuransi/<?php echo "".$row->asuransi; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/asuransi/<?php echo "".$row->asuransi; ?>" alt="Asuransi TW" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markonline/updateasuransi');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="asuransi"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_asuransi; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>