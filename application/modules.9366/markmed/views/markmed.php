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
                                                <div class='title'>Dokumen Medikal, PP, SKCK</div>
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
                                                <div class='title'>Kelola Dokumen </div>
                                                <div class='actions'>
                                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                                    </a>
                                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='box-content box-padding'>
                                                <?php foreach($tampil_data_markmed as $row) { ?>
                                                    <?php if($keterangan == 'legalitas') { ?>
                                                        <?php echo form_open('markmed/updatelegal', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden">
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_legal" value="<?php echo $row->tgl_legal; ?>" placeholder="Belum ada keterangan" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Nama</label>
                                                                <div class="controls">
                                                                    <input type="text" name="nama_legal" class="span10 popovers" value="<?php echo $row->nama_legal; ?>" placeholder="Belum ada keterangan">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Hubungan</label>
                                                                <div class="controls">
                                                                    <select name="hub_legal">
                                                                        <?php if($row->hub_legal == 'Bapak / Ibu Kandung' || $row->hub_legal == NULL) { ?>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Bapak / Ibu Tiri / Angkat') { ?>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Kakak Adik Kandung') { ?>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Mertua') { ?>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Ipar') { ?>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Adik / Kakak Misan') { ?>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Paman / Tante') { ?>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_legal == 'Kakek / Nenek') { ?>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Khusus</label>
                                                                <div class="controls">
                                                                    <input type="text" name="khusus_legal" class="span10 popovers" value="<?php echo $row->khusus_legal; ?>" placeholder="Belum ada keterangan">
                                                                </div>
                                                            </div>
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div>     
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'notaris') { ?>
                                                        <?php echo form_open('markmed/updatenota', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden">
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_nota" value="<?php echo $row->tgl_nota; ?>" placeholder="Belum ada keterangan" type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Nama</label>
                                                                <div class="controls">
                                                                    <input type="text" name="nama_nota" class="span10 popovers" value="<?php echo $row->nama_nota; ?>" placeholder="Belum ada keterangan">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Hubungan</label>
                                                                <div class="controls">
                                                                    <select name="hub_nota">
                                                                        <?php if($row->hub_nota == 'Bapak / Ibu Kandung' || $row->hub_nota == NULL) { ?>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Bapak / Ibu Tiri / Angkat') { ?>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Kakak Adik Kandung') { ?>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Mertua') { ?>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Ipar') { ?>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Adik / Kakak Misan') { ?>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Paman / Tante') { ?>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                        <?php } elseif($row->hub_nota == 'Kakek / Nenek') { ?>
                                                                            <option value="Kakek / Nenek">Kakek / Nenek</option>
                                                                            <option value="Bapak / Ibu Kandung">Bapak / Ibu Kandung</option>
                                                                            <option value="Bapak / Ibu Tiri / Angkat">Bapak / Ibu Tiri / Angkat</option>
                                                                            <option value="Kakak Adik Kandung">Kakak / Adik Kandung</option>
                                                                            <option value="Mertua">Mertua</option>
                                                                            <option value="Ipar">Ipar</option>
                                                                            <option value="Adik / Kakak Misan">Adik / Kakak Misan</option>
                                                                            <option value="Paman / Tante">Paman / Tante</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Khusus</label>
                                                                <div class="controls">
                                                                    <input type="text" name="khusus_nota" class="span10 popovers" value="<?php echo $row->khusus_nota; ?>" placeholder="Belum ada keterangan">
                                                                </div>
                                                            </div>  
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div>  
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'pramed') { ?> 
                                                        <?php echo form_open('markmed/updatepram', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_pram" value="<?php echo $row->tgl_pram; ?>" placeholder='Select datepicker' type='text'/>
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Hasil</label>
                                                                <div class="controls">
                                                                    <select name="hasil_pram">
                                                                        <?php if($row->hasil_pram == 'Unfit' || $row->hasil_pram == NULL) { ?>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Fit') { ?>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending HBSAG') { ?>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending TPHA') { ?>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending VDRL') { ?>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending Paru') { ?>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending Gula Darah') { ?>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending Tensi') { ?>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending Kencing Keruh') { ?>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_pram == 'Pending Protein') { ?>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                            <div class="control-group">
                                                                <label class="control-label">Dokumen</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokmedikal1' role='button'>Lihat dokumen</a>
                                                                    <!--
                                                                    <div class="controls">
                                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                            <div class="fileupload-new thumbnail">
                                                                                <div class="item" style="width: 100px;">
                                                                                    <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="<?php echo base_url(); ?>assets/medikal1/<?php echo "".$row->medikal1; ?>">
                                                                                        <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal1/<?php echo "".$row->medikal1; ?>" alt="KTP" />
                                                                                            <div class="zoom-icon"></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                            <div>
                                                                                <form method="post" action="<?php echo site_url('markonline/updatepram');?>" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                                                                    <span class="btn btn-file">
                                                                                    <span class="fileupload-new">Ganti Gambar</span>
                                                                                    <span class="fileupload-exists">Ubah</span>
                                                                                    <input type="file" class="default" name="medikal1"/>
                                                                                    </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                    <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                    <label>Tanggal upload : <?php echo $row->terakhir_medikal1; ?></label>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    -->
                                                                </div>
                                                            </div> 
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'sambungmed') { ?> 
                                                        <?php echo form_open('markmed/updatesamm', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_samm" value="<?php echo $row->tgl_samm; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Hasil</label>
                                                                <div class="controls">
                                                                    <select name="hasil_samm">
                                                                        <?php if($row->hasil_samm == 'Unfit' || $row->hasil_samm == NULL) { ?>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Fit') { ?>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending HBSAG') { ?>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending TPHA') { ?>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending VDRL') { ?>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending Paru') { ?>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending Gula Darah') { ?>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending Tensi') { ?>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending Kencing Keruh') { ?>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_samm == 'Pending Protein') { ?>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                            <div class="control-group">
                                                                <label class="control-label">Expired</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="exp_samm" value="<?php echo $row->exp_samm; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Dokumen</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokmedikal2' role='button'>Lihat dokumen</a>
                                                                    <!--
                                                                    <div class="controls">
                                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                            <div class="fileupload-new thumbnail">
                                                                                <div class="item" style="width: 100px;">
                                                                                    <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="<?php echo base_url(); ?>assets/medikal2/<?php echo "".$row->medikal2; ?>">
                                                                                        <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal2/<?php echo "".$row->medikal2; ?>" alt="KTP" />
                                                                                            <div class="zoom-icon"></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                            <div>
                                                                                <form method="post" action="<?php echo site_url('markmed/updatesamm');?>" enctype="multipart/form-data">
                                                                                    <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                                                                    <span class="btn btn-file">
                                                                                    <span class="fileupload-new">Ganti Gambar</span>
                                                                                    <span class="fileupload-exists">Ubah</span>
                                                                                    <input type="file" class="default" name="medikal2"/>
                                                                                    </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                    <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                    <label>Tanggal upload : <?php echo $row->terakhir_medikal2; ?></label>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    -->
                                                                </div>
                                                            </div> 
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'murni') { ?> 
                                                        <?php echo form_open('markmed/updatemurm', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_murm" value="<?php echo $row->tgl_murm; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Hasil</label>
                                                                <div class="controls">
                                                                    <select name="hasil_murm">
                                                                        <?php if($row->hasil_murm == 'Unfit' || $row->hasil_murm == NULL) { ?>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Fit') { ?>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending HBSAG') { ?>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending TPHA') { ?>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending VDRL') { ?>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending Paru') { ?>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending Gula Darah') { ?>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending Tensi') { ?>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending Kencing Keruh') { ?>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                        <?php } elseif($row->hasil_murm == 'Pending Protein') { ?>
                                                                            <option value="Pending Protein">Pending Protein</option>
                                                                            <option value="Unfit">Unfit</option>
                                                                            <option value="Fit">Fit</option>
                                                                            <option value="Pending HBSAG">Pending HBSAG</option>
                                                                            <option value="Pending TPHA">Pending TPHA</option>
                                                                            <option value="Pending VDRL">Pending VDRL</option>
                                                                            <option value="Pending Paru">Pending Paru</option>
                                                                            <option value="Pending Gula Darah">Pending Gula Darah</option>
                                                                            <option value="Pending Tensi">Pending Tensi</option>
                                                                            <option value="Pending Kencing Keruh">Pending Kencing Keruh</option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div> 
                                                            <div class="control-group">
                                                                <label class="control-label">Expired</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="exp_murm" value="<?php echo $row->exp_murm; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Dokumen</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokmedikal3' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div> 
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'paspor') { ?> 
                                                        <?php echo form_open('markmed/updatepaspor', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Pengajuan</label>
                                                                <div class="controls">
                                                                    <input type="text" name="in_paspor" class="span10 popovers" value="<?php echo $row->in_paspor; ?>" placeholder="Belum ada keterangan">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Terima Buku</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="bk_paspor" value="<?php echo $row->bk_paspor; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Foto</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokpaspor' role='button'>Lihat dokumen</a>
                                                                </div>
                                                            </div> 
                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                    <?php } elseif($keterangan == 'skck') { ?> 
                                                        <?php echo form_open('markmed/updateskck', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                                            <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Aju</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="aju_skck" value="<?php echo $row->aju_skck; ?>" placeholder='Belum ada keterangan' type='text' />
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
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="trm_skck" value="<?php echo $row->trm_skck; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Tanggal Expired</label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                        <input class='input-medium' data-format='yyyy.MM.dd' name="exp_skck" value="<?php echo $row->exp_skck; ?>" placeholder='Belum ada keterangan' type='text' />
                                                                        <span class='add-on'>
                                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="controls">
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Foto</label>
                                                                <div class="controls">
                                                                    <a class='btn btn-small' data-toggle='modal' href='#dokskck' role='button'>Lihat dokumen</a>
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

            <!-- Modal Update Medikal 1 -->
            <div class='modal hide fade' id='dokmedikal1' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen Pra-Medikal</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="Pra-Medikal" href="<?php echo base_url(); ?>assets/medikal1/<?php echo "".$row->medikal1; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal1/<?php echo "".$row->medikal1; ?>" alt="Pra-Medikal" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markmed/updatemedikal1');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="medikal1"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_medikal1; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Medikal 2 -->
            <div class='modal hide fade' id='dokmedikal2' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen Medikal Full Sambung Pra-Medikal</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="Medikal Full Sambung Pra" href="<?php echo base_url(); ?>assets/medikal2/<?php echo "".$row->medikal2; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal2/<?php echo "".$row->medikal2; ?>" alt="Medikal Full Sambung Pra" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markmed/updatemedikal2');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="medikal2"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_medikal2; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Medikal 3 -->
            <div class='modal hide fade' id='dokmedikal3' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen Medikal Full Murni</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="Medikal Full Sambung Pra" href="<?php echo base_url(); ?>assets/medikal3/<?php echo "".$row->medikal3; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal3/<?php echo "".$row->medikal3; ?>" alt="Medikal Full Sambung Pra" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markmed/updatemedikal3');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="medikal3"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_medikal3; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update Paspor -->
            <div class='modal hide fade' id='dokpaspor' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen Paspor</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="Paspor" href="<?php echo base_url(); ?>assets/paspor/<?php echo "".$row->paspor; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/paspor/<?php echo "".$row->paspor; ?>" alt="Paspor" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markmed/updatedokpas');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="paspor"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_paspor; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>

            <!-- Modal Update SKCK -->
            <div class='modal hide fade' id='dokskck' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen SKCK</h3>
                </div>
                <div class='modal-body'>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-new thumbnail">
                            <div class="item" style="width: 100px;">
                                <a class="fancybox-button" data-rel="fancybox-button" title="SKCK" href="<?php echo base_url(); ?>assets/skck/<?php echo "".$row->skck; ?>">
                                    <div class="zoom"><img src="<?php echo base_url(); ?>assets/skck/<?php echo "".$row->skck; ?>" alt="SKCK" />
                                        <div class="icon-zoom"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                        <div>
                            <form method="post" action="<?php echo site_url('markmed/updatedokskck');?>" enctype="multipart/form-data">
                                <input type="hidden" name="biodata" value="<?php echo $detailpersonalid; ?>">
                                <span class="btn btn-file">
                                <span class="fileupload-new">Ganti Gambar</span>
                                <span class="fileupload-exists">Ubah</span>
                                <input type="file" class="default" name="skck"/>
                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                <label>Tanggal upload : <?php echo $row->terakhir_skck; ?></label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                </div>
            </div>