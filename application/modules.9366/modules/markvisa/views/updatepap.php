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
                                                <h4><i class="icon-reorder"></i>Detail</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a class="icon-remove" href="javascript:;"></a></span></div>
                                            <div class="widget-body">
                                                <div class="accordion " id="accordion1">
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"><i class=" icon-plus"></i> Kocokan </a></div>
                                                        <div id="collapse_1" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markvisa as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal :</td>
                                                                            <td> <?php echo $row->tgl_kocokan; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2">PT :</td>
                                                                            <td> <?php echo $row->pt_kocokan; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span2"></td>
                                                                            <td> 
                                                                            <a href="<?php echo site_url('markvisa/update_kocokan'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"><i class=" icon-plus"></i> Finger Print </a></div>
                                                        <div id="collapse_2" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markvisa as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Tanggal :</td>
                                                                            <td> <?php echo $row->tgl_finger; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span3">Foto :</td>
                                                                            <td> 
                                                                                <?php 
                                                                                if($row->fingerprint == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else {
                                                                                ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="Finger Print" href="<?php echo base_url(); ?>assets/fingerprint/<?php echo "".$row->fingerprint; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/fingerprint/<?php echo "".$row->fingerprint; ?>" alt="Finger Print" />
                                                                                                                <div class="zoom-icon"></div>
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
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_fingerprint; ?></label>
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
                                                                            <td> 
                                                                                <a href="<?php echo site_url('markvisa/update_fingerprint'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"><i class=" icon-plus"></i> VISA </a></div>
                                                        <div id="collapse_3" class="accordion-body collapse">
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markvisa as $row) { ?>
                                                                <table class="table table-borderless">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="span3">Terima Visa:</td>
                                                                            <td> <?php echo $row->trm_visa; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span3">Terbang Perkiraan:</td>
                                                                            <td> <?php echo $row->terbang_perkiraan; ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="span3">Dokumen:</td>
                                                                            <td>
                                                                                <?php 
                                                                                if($row->visa == NULL) { 
                                                                                    echo "Belum Ada Keterangan"; 
                                                                                } else {
                                                                                ?>
                                                                                    <div class="control-group">
                                                                                        <div class="controls">
                                                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                <div class="fileupload-new thumbnail">
                                                                                                    <div class="item" style="width: 100px;">
                                                                                                        <a class="fancybox-button" data-rel="fancybox-button" title="VISA" href="<?php echo base_url(); ?>assets/visa/<?php echo "".$row->visa; ?>">
                                                                                                            <div class="zoom"><img src="<?php echo base_url(); ?>assets/visa/<?php echo "".$row->visa; ?>" alt="VISA" />
                                                                                                                <div class="zoom-icon"></div>
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
                                                                                                        <label>Terakhir upload : <?php echo $row->terakhir_visa; ?></label>
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
                                                                            <td> 
                                                                                <a href="<?php echo site_url('markvisa/update_visa'); ?>" class="btn btn-primary"><i class="icon-ok"></i> Update</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-group">
                                                        <div class="accordion-heading"><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4"><i class=" icon-plus"></i> PAP </a></div>
                                                        <div id="collapse_4" class="accordion-body collapse in">
                                                            <form action="<?php echo site_url('markvisa/updatepap');?>" method="post" class="form-horizontal"/>
                                                            <div class="accordion-inner">
                                                                <?php foreach ($tampil_data_markvisa as $row) { ?>
                                                                <div class="control-group">
                                                                    <label class="control-label">PAP</label>
                                                                    <div class="controls">
                                                                        <input class="input-medium date-picker" size="16" type="text" name="pap" value="<?php echo date('d/m/Y', strtotime($row->pap_perkiraan)); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-actions">
                                                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                                    <a type="button" class="btn" href="<?php echo base_url()."index.php/markvisa/"?>"><i class=" icon-remove"></i> Kembali </a>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            </form>
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