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

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>
                         <div class="row-fluid ">


            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Profile</div>
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
                        $this->load->view('template/menudalam');
                    ?>

                                </div>
     <div class="span6">
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4> 
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> Data Biodata yang belum di Inputkan Harus di inputkan terlebih dahulu....
                        </div>


                                </div>
                        
                                <?php }?>


                                        <div class="span9">
                                            <div class="tabbable tabbable-custom tabs-right">
                                                <ul class="nav nav-tabs tabs-right">
                                                    <li class="active"><a href="#tab_3_1" data-toggle="tab"> KTP </a></li>
                                                    <li><a href="#tab_3_2" data-toggle="tab">Kartu Keluarga</a></li>
                                                    <li><a href="#tab_3_4" data-toggle="tab">Akte Kelahiran</a></li>
                                                    <li><a href="#tab_3_5" data-toggle="tab">Ijazah</a></li>
                                                    <li><a href="#tab_3_6" data-toggle="tab">Paspor</a></li>
                                                    <li><a href="#tab_3_7" data-toggle="tab">ARC</a></li>



                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_3_1">
<form action="<?php echo site_url('Dokumen/ubahktp');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                              <?php  foreach ($tampil_data_dokumen as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                    <div class="control-group">
                                    <label class="control-label">Upload Dokumen KTP</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/ktp/<?php echo $row->ktp; ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="ktp" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span>   Gambar Berformat JPG atau PNG </span></div>
                                </div>

                                                            <?php }?>

                                                             <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <input type="reset" value="Reset" class = "btn btn-success">
                                            </div>

                                                    <?php echo form_close(); ?>
                                                       </div>





                                                    <div class="tab-pane" id="tab_3_2">
<form action="<?php echo site_url('Dokumen/ubahkk');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                              <?php  foreach ($tampil_data_dokumen as $row) { ?>
                    <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                      <div class="control-group">
                                    <label class="control-label">Upload Dokumen KK</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/kk/<?php echo $row->kk; ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="kk" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span>   Gambar Berformat JPG atau PNG </span></div>
                                </div>

     <?php }?>
                                                             <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <input type="reset" value="Reset" class = "btn btn-success">
                                            </div>

                                                    <?php echo form_close(); ?>

                                                        </div>

                                                        <div class="tab-pane" id="tab_3_4">
                                                        
<form action="<?php echo site_url('Dokumen/ubahakte');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
  <?php  foreach ($tampil_data_dokumen as $row) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">

                                                     <div class="control-group">
                                    <label class="control-label">Upload Dokumen AKTE</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/akte/<?php echo $row->akte; ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="akte" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span>   Gambar Berformat JPG atau PNG </span></div>
                                </div>

<?php }?>
                                                             <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <input type="reset" value="Reset" class = "btn btn-success">
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>
</div>
                                                        <div class="tab-pane" id="tab_3_5">
<form action="<?php echo site_url('Dokumen/ubahijazah');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
  <?php  foreach ($tampil_data_dokumen as $row2) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                                                       <div class="control-group">
                                    <label class="control-label">Upload Dokumen IJAZAH</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/ijazah/<?php echo $row->ijazah; ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="ijazah" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span>   Gambar Berformat JPG atau PNG </span></div>
                                </div>

<?php }?>
                                                             <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <input type="reset" value="Reset" class = "btn btn-success">
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_6">
                                                        
<form action="<?php echo site_url('Dokumen/ubahpaspor');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
  <?php  foreach ($tampil_data_dokumen as $visapermit) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />

                                                    <div class="control-group">
                                    <label class="control-label">Upload Dokumen PASPOR</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/paspor/<?php echo $row->paspor; ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="paspor" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span>   Gambar Berformat JPG atau PNG </span></div>
                                </div>

<?php }?>
                                                             <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <input type="reset" value="Reset" class = "btn btn-success">
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        <div class="tab-pane" id="tab_3_7">
                                                        
<form action="<?php echo site_url('Dokumen/ubaharc');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                           <?php  foreach ($tampil_data_dokumen as $paspor) { ?>
<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />  

                           <div class="control-group">
                                    <label class="control-label">Upload Dokumen ARC</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/arc/<?php echo $row->arc; ?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Pilih Gambar</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="arc" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span>   Gambar Berformat JPG atau PNG </span></div>
                                </div>

<?php }?>
                                                             <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <input type="reset" value="Reset" class = "btn btn-success">
                                            </div>

                                                    <?php echo form_close(); ?>




                                                        </div>

                                                        

                                                </div>
                                            </div>
                                        </div>
                                        <div class="space10 visible-phone"></div>
                                        

                            </div>
        </div>



                    </div>