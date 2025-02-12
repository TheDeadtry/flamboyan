                <div class="row-fluid">
                    <div class="span12">
                        <div id="theme-change" class="hidden-phone"><i class="icon-cogs"></i><span class="settings"><span class="text">Theme:</span><span class="colors"><span class="color-default" data-style="default"></span><span class="color-gray" data-style="gray"></span><span class="color-purple" data-style="purple"></span><span class="color-navy-blue" data-style="navy-blue"></span></span>
                            </span>
                        </div>
                        <h3 class="page-title"> Detail Legalitas Dan Notaris</h3>
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Admin</a><span class="divider">&nbsp;</span></li>
                            <li><a href="#">Detail Legalitas Dan Notaris</a><span class="divider-last">&nbsp;</span></li>
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
                                                <h4><i class="icon-reorder"></i>Detail</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                            <div class="widget-body">
                                                <div class="accordion " id="accordion1">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Legalitas </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse in">
                                                            <div class="accordion-inner">
                                                            <form action="<?php echo site_url('markmed/updatelegal');?>" method="post" class="form-horizontal"/>
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <input type="text" name="biodata" value="<?php echo $detailpersonalid; ?>" class="hidden">
                                                                <div class="control-group">
                                                                    <label class="control-label">Tanggal</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="tgl_legal" value="<?php echo date('d/m/Y', strtotime($row->tgl_legal));?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Nama</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="nama_legal" class="span10 popovers" value="<?php echo $row->nama_legal; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Hubungan</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="hub_legal" class="span10 popovers" value="<?php echo $row->hub_legal; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label">Khusus</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="khusus_legal" class="span10 popovers" value="<?php echo $row->khusus_legal; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions">
                                                                    <button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Simpan</button>
                                                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/markmed/"?>"><i class=" icon-remove"></i> Kembali </a>
                                                                </div>
                                                                <?php } ?>
                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Notaris </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal :</td>
                                                                            <td> <?php if($row->tgl_nota == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_nota; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Nama :</td>
                                                                            <td> <?php if($row->nama_nota == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->nama_nota; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Hubungan :</td>
                                                                            <td> <?php if($row->hub_nota == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->hub_nota; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Khusus :</td>
                                                                            <td> <?php if($row->khusus_nota == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->khusus_nota; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td><a href="<?php echo site_url('markmed/update_nota'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"><i class=" icon-plus"></i> Pra-Medikal </a></div>
                                                        <div id="collapse_3" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal :</td>
                                                                            <td> <?php if($row->tgl_pram == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_pram; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Hasil :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->hasil_pram == NULL) {
                                                                                    echo "Belum Ada Keterangan";
                                                                                } else { ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Hasil Pra-Medikal" href="<?php echo base_url(); ?>assets/medikal1/<?php echo "".$row->medikal1; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal1/<?php echo "".$row->medikal1; ?>" alt="Pra-Medikal" />
                                                                                                                <div class="zoom-icon"></div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                                <div>
                                                                                                    <form method="post" action="<?php echo site_url('markmed/updatemedikal1');?>" enctype="multipart/form-data">
                                                                                                        <span class="btn btn-file">
                                                                                                        <span class="fileupload-new">Ganti Gambar</span>
                                                                                                        <span class="fileupload-exists">Ubah</span>
                                                                                                        <input type="file" class="default" name="medikal1"/>
                                                                                                        </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                                        <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_medikal1; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td><a href="<?php echo site_url('markmed/update_pram'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4"><i class=" icon-plus"></i> Medikal Full Sambung Dari Pra </a></div>
                                                        <div id="collapse_4" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal :</td>
                                                                            <td> <?php if($row->tgl_samm == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_samm; }?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Hasil :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->hasil_samm == NULL) { 
                                                                                    echo "Belum Ada Keterangan";
                                                                                } else { ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Hasil Medikal Full Sambung Dari Pra" href="<?php echo base_url(); ?>assets/medikal2/<?php echo "".$row->medikal2; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal2/<?php echo "".$row->medikal2; ?>" alt="Medikal Full Sambung Dari Pra" />
                                                                                                                <div class="zoom-icon"></div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                                <div>
                                                                                                    <form method="post" action="<?php echo site_url('markmed/updatemedikal2');?>" enctype="multipart/form-data">
                                                                                                        <span class="btn btn-file">
                                                                                                        <span class="fileupload-new">Ganti Gambar</span>
                                                                                                        <span class="fileupload-exists">Ubah</span>
                                                                                                        <input type="file" class="default" name="medikal2"/>
                                                                                                        </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                                        <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_medikal2; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Tanggal Expired :</td>
                                                                            <td> <?php if($row->exp_samm == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->exp_samm; }?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td><a href="<?php echo site_url('markmed/update_samm'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5"><i class=" icon-plus"></i> Medikal Full Murni </a></div>
                                                        <div id="collapse_5" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal :</td>
                                                                            <td> <?php if($row->tgl_murm == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->tgl_murm; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Hasil :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->hasil_murm == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else { ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Hasil Medikal Full Sambung Dari Pra" href="<?php echo base_url(); ?>assets/medikal3/<?php echo "".$row->medikal3; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/medikal3/<?php echo "".$row->medikal3; ?>" alt="Medikal Full Sambung Dari Pra" />
                                                                                                                <div class="zoom-icon"></div>
                                                                                                            </div>
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                                                                <div>
                                                                                                    <form method="post" action="<?php echo site_url('markmed/updatemedikal3');?>" enctype="multipart/form-data">
                                                                                                        <span class="btn btn-file">
                                                                                                        <span class="fileupload-new">Ganti Gambar</span>
                                                                                                        <span class="fileupload-exists">Ubah</span>
                                                                                                        <input type="file" class="default" name="medikal3"/>
                                                                                                        </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Hapus</a>
                                                                                                        <button type="submit" class="btn btn-primary fileupload-exists">OK</button>
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_medikal3; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Tanggal Expired :</td>
                                                                            <td> <?php if($row->exp_murm == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->exp_murm; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td><a href="<?php echo site_url('markmed/update_murm'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6"><i class=" icon-plus"></i> Paspor </a></div>
                                                        <div id="collapse_6" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Pengajuan :</td>
                                                                            <td> <?php if($row->in_paspor == NULL) { echo "Belum Ada Keterangan";} else { echo $row->in_paspor; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Foto :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                    if($row->paspor == NULL) { 
                                                                                        echo "Belum Ada Keterangan";
                                                                                    } else { ?>
                                                                                        <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Hasil Foto Paspor" href="<?php echo base_url(); ?>assets/paspor/<?php echo "".$row->paspor; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/paspor/<?php echo "".$row->paspor; ?>" alt="Foto Paspor" />
                                                                                                                <div class="zoom-icon"></div>
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
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_paspor; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Terima Buku :</td>
                                                                            <td> <?php if($row->bk_paspor == NULL) { echo "Belum Ada Keterangan";} else { echo $row->bk_paspor; } ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td><a href="<?php echo site_url('markmed/update_paspor'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7"><i class=" icon-plus"></i> SKCK </a></div>
                                                        <div id="collapse_7" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markmed as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal Aju :</td>
                                                                            <td> <?php if($row->aju_skck == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->aju_skck;} ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Terima :</td>
                                                                            <td> <?php if($row->trm_skck == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->trm_skck;} ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">Dokumen :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                    if($row->skck == NULL) { 
                                                                                        echo "Belum Ada Keterangan";
                                                                                    } else { ?>
                                                                                        <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Hasil Foto SKCK" href="<?php echo base_url(); ?>assets/skck/<?php echo "".$row->skck; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/skck/<?php echo "".$row->skck; ?>" alt="Foto SKCK" />
                                                                                                                <div class="zoom-icon"></div>
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
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_skck; ?></label>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?> 
                                                                            </td>
                                                                        <tr>
                                                                            <td class="span2">Expired :</td>
                                                                            <td> <?php if($row->exp_skck == NULL) { echo "Belum Ada Keterangan"; } else { echo $row->exp_skck;} ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td><a href="<?php echo site_url('markmed/update_skck'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a></td>
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