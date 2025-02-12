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
                                    <?php } ?>
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
                                                <?php foreach($tampil_data_markonline as $row) { ?> 
                                                <div class="accordion " id="accordion1">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Dokumen Rumah </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <form action="<?php echo site_url('markonline/updatedokrumah');?>" method="post" class="form-horizontal"/>
                                                            <div class="accordion-inner">
                                                                <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden"> 
                                                                <div class="control-group">
                                                                    <label class="control-label">Keterangan</label>
                                                                    <div class="controls">
                                                                        <select name="bkl" class="form-control">
                                                                            <option value="belum">Belum Lengkap</option>
                                                                            <option value="kurang">Kurang Lengkap</option>
                                                                            <option value="lengkap">Lengkap</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">SI</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="si" value="<?php echo $row->si_rumah; ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">SN</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="sn" value="<?php echo $row->sn_rumah; ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">PP LM EXP</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="pp_lm_exp" value="<?php echo $row->pp_lm_exp; ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">KTKLN EXP</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="ktkln_exp" value="<?php echo $row->ktkln_exp; ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Khusus</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="khusus" class="span10 popovers" value="<?php echo $row->khusus; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions">
                                                                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                                                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/markonline/"?>"><i class=" icon-remove"></i> Kembali </a>
                                                                </div>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Surat Kehilangan </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner"> 
                                                                <?php foreach ($tampil_data_markonline as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Keterangan Surat :</td>
                                                                            <td> <?php if($row->ket_sk == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->ket_sk; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Tanggal Aju :</td>
                                                                            <td> <?php if($row->tgl_aju_sk == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_aju_sk; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Tanggal Terima :</td>
                                                                            <td> <?php if($row->tgl_trm_sk == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_trm_sk; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td> 
                                                                                <a href="<?php echo site_url('markonline/update_suratsk'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
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
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="space5"></div>
                            </div>
                        </div>
                    </div>
                </div>