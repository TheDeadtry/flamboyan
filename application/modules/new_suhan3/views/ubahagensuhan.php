
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Ubah Data Majikan Suhan </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-warning panel-bordered">

                        <div class="panel-heading">
                            <button class="btn btn-lg btn-info" data-toggle='modal' data-target='#tambaha' role='button'>TAMBAH DATA</button>
                            <a class="btn btn-lg btn-primary" href="<?php echo site_url('pdf9/cetaksuhan/'); ?>">PRINT DATA SUHAN</a>
                            <h5 class="panel-title text-center ">Ubah Data Majikan Suhan <br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">

                         <?php foreach($tampil_data_suhan as $row) { ?>
                            <div class="alert alert-info">
                                <a>Data Awal Yang Akan di ubah</a>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Data Grup</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namagroupnya; ?>" disabled/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Data Agen</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namaagen; ?>" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Data Agen</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namamajikannya; ?>" disabled/>
                                    </div>
                                </div>
                            </div>
                                 <?php }?>
                            <div class="alert alert-info">
                                <a>Update Data Agen</a>
                            </div>
                            <?php echo form_open('new_suhan/ubahagensuhan/',array('class'=>'form-horizontal')); ?>     
                                <input type="hidden" class="span5 popovers" name="idnya" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $idnya; ?>" />
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Group </label>
                                    <div class="col-sm-9">
                                        <?php   echo form_dropdown("group",$option_group,"","id='group_id3' class='form-control'"); ?>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>
                                    </div>
                                </div>

                                <div class="form-group" id="jelasin_agen">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9">
                                        <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <?php echo form_submit('submit', 'Update', "class = 'btn btn-primary'"); ?>
                                    <a href="<?php echo site_url('new_suhan'); ?>" class="btn btn-success">Batal</a>
                                </div>
                                                            
                            <?php echo form_close(); ?>

                        </div>
                    </div>
                </div>
                                    
                                    
            </div>
        </div>
    </div>
</div>