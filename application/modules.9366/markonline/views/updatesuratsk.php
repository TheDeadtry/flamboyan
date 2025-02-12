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
            <div class='title'>Kelola Dokumen Online</div>
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
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dokumen Rumah </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markonline as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Keterangan Dokumen :</td>
                                                                            <td> <?php if($row->bkl == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->bkl; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">KTP :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->ktp == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else {
                                                                                ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="KTP" href="<?php echo base_url(); ?>assets/ktp/<?php echo "".$row->ktp; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/ktp/<?php echo "".$row->ktp; ?>" alt="KTP" />
                                                                                                                <div class="zoom-icon"></div>
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
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_ktp; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Kartu Keluarga :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->kk == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else { 
                                                                                ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Kartu Keluarga" href="<?php echo base_url(); ?>assets/kk/<?php echo "".$row->kk; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/kk/<?php echo "".$row->kk; ?>" alt="Kartu Keluarga" />
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
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_kk; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Ijazah :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->ijazah == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else { 
                                                                                ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Ijazah" href="<?php echo base_url(); ?>assets/ijazah/<?php echo "".$row->ijazah; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/ijazah/<?php echo "".$row->ijazah; ?>" alt="Ijazah" />
                                                                                                                <div class="zoom-icon"></div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                                <div>
                                                                                                    <form method="post" action="<?php echo site_url('markonline/updateijazah');?>" enctype="multipart/form-data">
                                                                                                        <span class="btn btn-file">
                                                                                                        <span class="fileupload-new">Ganti Gambar</span>
                                                                                                        <span class="fileupload-exists">Ubah</span>
                                                                                                        <input type="file" class="default" name="ijazah"/>
                                                                                                        </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                                        <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_ijazah; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Surat Ijin :</td>
                                                                            <td> <?php if($row->si_rumah == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->si_rumah; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">SN :</td>
                                                                            <td> <?php if($row->sn_rumah == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->sn_rumah; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">PP LM EXP:</td>
                                                                            <td> <?php if($row->pp_lm_exp == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->pp_lm_exp; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">ARC TW :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->arc == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else { ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="ARC" href="<?php echo base_url(); ?>assets/arc/<?php echo "".$row->arc; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/arc/<?php echo "".$row->arc; ?>" alt="ARC" />
                                                                                                                <div class="zoom-icon"></div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                                <div>
                                                                                                    <form method="post" action="<?php echo site_url('markonline/updatearc');?>" enctype="multipart/form-data">
                                                                                                        <span class="btn btn-file">
                                                                                                        <span class="fileupload-new">Ganti Gambar</span>
                                                                                                        <span class="fileupload-exists">Ubah</span>
                                                                                                        <input type="file" class="default" name="arc"/>
                                                                                                        </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                                        <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_arc; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Asuransi TW :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->asuransi == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else { ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Asuransi" href="<?php echo base_url(); ?>assets/asuransi/<?php echo "".$row->asuransi; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/asuransi/<?php echo "".$row->asuransi; ?>" alt="Asuransi" />
                                                                                                                <div class="zoom-icon"></div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                                <div>
                                                                                                    <form method="post" action="<?php echo site_url('markonline/updateasuransi');?>" enctype="multipart/form-data">
                                                                                                        <span class="btn btn-file">
                                                                                                        <span class="fileupload-new">Ganti Gambar</span>
                                                                                                        <span class="fileupload-exists">Ubah</span>
                                                                                                        <input type="file" class="default" name="asuransi"/>
                                                                                                        </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                                        <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_asuransi; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">KTKLN EXP :</td>
                                                                            <td> <?php if($row->ktkln_exp == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->ktkln_exp; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Khusus :</td>
                                                                            <td> <?php if($row->khusus == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->khusus; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td>
                                                                                <a href="<?php echo site_url('markonline/update_dokrumah'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Surat Kehilangan </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse in">
                                                            <form action="<?php echo site_url('markonline/updatesuratsk');?>" method="post" class="form-horizontal"/>
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markonline as $row) { ?>
                                                                <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden">  
                                                                <div class="control-group">
                                                                    <label class="control-label">Keterangan (Perlu Surat Keterangan?)</label>
                                                                    <div class="controls">
                                                                        <select name="ket_sk" class="form-control">
                                                                            <option value="ya">Ya</option>
                                                                            <option value="tidak">Tidak</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal Aju</label>
                                                                    <div class="controls">
                                                                           <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_aju" value="<?php echo date('d/m/Y', strtotime($row->tgl_aju_sk)); ?>"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <!-- <input class="input-medium date-picker" size="16" type="text" name="tgl_aju" value="<?php echo date('d/m/Y', strtotime($row->tgl_aju_sk)); ?>"/> -->
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal Terima</label>
                                                                    <div class="controls">
                                                                           <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_terima" value="<?php echo date('d/m/Y', strtotime($row->tgl_aju_sk)); ?>"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                                                                        <!-- <input class="input-medium date-picker" size="16" type="text" name="tgl_terima" value="<?php echo date('d/m/Y', strtotime($row->tgl_aju_sk)); ?>"/> -->
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions">
                                                                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                                                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/markonline/"?>"><i class=" icon-remove"></i> Kembali </a>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"><i class=" icon-plus"></i> Rekom </a></div>
                                                        <div id="collapse_3" class="accordion-body collapse">
                                                            <div class="accordion-inner"> 
                                                                <?php foreach ($tampil_data_markonline as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span2">Tanggal Buat :</td>
                                                                            <td> <?php if($row->tgl_buat_rekom == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_buat_rekom; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Tanggal Terima :</td>
                                                                            <td> <?php if($row->tgl_trm_rekom == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_trm_rekom; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td>
                                                                                <a href="<?php echo site_url('markonline/update_rekom'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space5"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>