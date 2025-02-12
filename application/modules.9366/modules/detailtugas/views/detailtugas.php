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
            <div class='title'>Detail Nilai tugas</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
<?php foreach ($tampil_data_personal as $row2) { ?>
<div class="span3">
                                    <div class="text-center profile-pic"><img src="<?php echo base_url(); ?>assets/uploads/<?php echo "".$row2->foto ?>" alt="" /></div>
                                     <?php 
                        $this->load->view('template/menudalam');
                    ?>
                                </div>

                                <div class="span6">
                                    <h4><?php echo $row2->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>

                                    <?php if($hitungtugas == 0) { ?>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close"> x </button> silahkan menambahkan data pada tombol ini... 
                                    <a class='btn btn-info btn-large' data-toggle='modal' href='#tambah' role='button'>Tambah Data</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini... 
                                    <a class='btn btn-info btn-large' data-toggle='modal' href='#ubah' role='button'>Ubah Data</a>

                                    </div>
                                    <?php foreach ($tugas as $row) { ?>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="span3">家務 Pekerjaan Rumah Tugas : </td>
                                                <td> <?php echo $row->pekerjaan_rt; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">照顧嬰兒 Merawat Bayi Baru Lahir : </td>
                                                <td> <?php echo $row->merawat_bayi; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">老弱病殘 Merawat Orang Cacat : </td>
                                                <td> <?php echo $row->cacat; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">看護小孩 Merawat Anak Kecil : </td>
                                                <td> <?php echo $row->anak_kecil; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">烹飪 Memasak : </td>
                                                <td> <?php echo $row->memasak; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span3">看護老人 Merawat Orang Jompo : </td>
                                                <td> <?php echo $row->jompo; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="span2"></td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php }} ?>
                                </div>
                                <div class="space5"></div>


                        </div>
        </div>

                </div>

                          <div class='modal hide fade' id='tambah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Tugas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailtugas/tambahtugas');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                    <div class="control-group">
                                        <label class="control-label">家務 Pekerjaan Rumah Tugas</label>
                                        <div class="controls">
                                            <select name="t1" class="form-control">
                                                <?php for($i=1;$i<7;$i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">照顧嬰兒 Merawat Bayi Baru Lahir</label>
                                        <div class="controls">
                                            <select name="t2" class="form-control">
                                                <?php for($i=1;$i<7;$i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">老弱病殘 Merawat Orang Cacat</label>
                                        <div class="controls">
                                            <select name="t3" class="form-control">
                                                <?php for($i=1;$i<7;$i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">看護小孩 Merawat Anak Kecil</label>
                                        <div class="controls">
                                            <select name="t4" class="form-control">
                                                <?php for($i=1;$i<7;$i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">烹飪 Memasak</label>
                                        <div class="controls">
                                            <select name="t5" class="form-control">
                                                <?php for($i=1;$i<7;$i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">看護老人 Merawat Orang Jompo</label>
                                        <div class="controls">
                                            <select name="t6" class="form-control">
                                                <?php for($i=1;$i<7;$i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                   <!--  <div class="form-actions">
                                        <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                        <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
                                    </div> -->
                                
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                </form>
            </div>

                                          <div class='modal hide fade' id='ubah' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Tugas</h3>
                </div>
                <div class='modal-body'>
  <form action="<?php echo site_url('detailtugas/updatetugas');?>" method="post" class="form-horizontal" />
                                    <?php foreach ($tugas as $row) { ?>
                                        <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                        
                                        <div class="control-group">
                                            <label class="control-label span5">家務 Pekerjaan Rumah Tangga</label>
                                            <div class="controls span7">
                                                <select name="t1" class="form-control">
                                            <option value="<?php echo $row->pekerjaan_rt;?>"  /><?php echo $row->pekerjaan_rt;?>
                                                    <?php for($i=1;$i<7;$i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label span5">照顧嬰兒 Merawat Bayi Baru Lahir</label>
                                            <div class="controls span7">
                                                <select name="t2" class="form-control">
                                                    <option value="<?php echo $row->merawat_bayi;?>"  /><?php echo $row->merawat_bayi;?>
                                                    <?php for($i=1;$i<7;$i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label span5">老弱病殘 Merawat Orang Cacat</label>
                                            <div class="controls span7">
                                                <select name="t3" class="form-control">
                                                    <option value="<?php echo $row->cacat;?>"  /><?php echo $row->cacat;?>
                                                    <?php for($i=1;$i<7;$i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label span5">看護小孩 Merawat Anak Kecil</label>
                                            <div class="controls span7">
                                                <select name="t4" class="form-control">
                                                    <option value="<?php echo $row->anak_kecil;?>"  /><?php echo $row->anak_kecil;?>
                                                    <?php for($i=1;$i<7;$i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label span5">烹飪 Memasak</label>
                                            <div class="controls span7">
                                                <select name="t5" class="form-control">
                                                    <option value="<?php echo $row->memasak;?>"  /><?php echo $row->memasak;?>
                                                    <?php for($i=1;$i<7;$i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label span5">看護老人 Merawat Orang Jompo</label>
                                            <div class="controls span7">
                                                <select name="t6" class="form-control">
                                                    <option value="<?php echo $row->jompo;?>"  /><?php echo $row->jompo;?>
                                                    <?php for($i=1;$i<7;$i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <?php } ?>
                                        <!-- <div class="form-actions">
                                            <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                            <a type="button" class="btn" href="<?php echo base_url()."index.php/detailtugas/"?>"><i class=" icon-remove"></i> Kembali </a>
                                        </div> -->
                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>