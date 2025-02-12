
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">UBAH AGEN MAJIKAN </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-info panel-bordered">

                        <div class="panel-heading">
                            <a href="<?php echo site_url('new_majikans') ?>" class="btn btn-danger">Kembali</a>
                            <h5 class="panel-title text-center">Ubah Agen Majikan<br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class='panel-body'>
                            <?php foreach($tampil_data_majikan as $row) { ?>
                            <div class="alert alert-info">
                                <a>Data Awal Yang Akan di ubah</a>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Data Grup</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namagrup; ?>" disabled/>
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
                            <?php }?>
                            <div class="alert alert-info">
                                <a>Update Data Agen</a>
                            </div>

                            <?php echo form_open('new_majikans/ubahagens/',array('class'=>'form-horizontal')); ?>

                                <input type="hidden" class="form-control" name="idnya" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $idnya; ?>" />
                                <div class="form-group">
                                    <label class="control-label col-sm-3"> Pilih Group </label>
                                    <div class="col-sm-9">
                                        <?php   echo form_dropdown("nama_agen",$option_group,"","id='group_id2' class='form-control'"); ?>
                                        <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
                                        </div>
                                    </div>
                                </div>
                                </br>
                                <div class="form-group" id="jelasin_agen">
                                    <label class="control-label col-sm-3">Pilih Agen </label>
                                    <div class="col-sm-9">
                                         <?php    echo form_dropdown("id_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled class="form-control"'); ?>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <?php echo form_submit('submit', 'Update', "class = 'btn btn-primary'"); ?>
                                </div>
                                                            
                            <?php echo form_close(); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>