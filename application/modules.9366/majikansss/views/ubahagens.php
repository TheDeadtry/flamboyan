<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Ubah Agen Majikan </span>
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
                    <li class='active'>Ubah Agen Majikan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  



                    <div class="row-fluid">


            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                           
                            <div class='box-content box-no-padding'>

                               
            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Ubah Agen Majikan  </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                                  <?php foreach($tampil_data_majikan as $row) { ?>
 <div class="alert alert-info">
                        
                        <a>Data Awal Yang Akan di ubah</a>
                        </div>
                                            <div class="control-group">
                                                            <label class="control-label span4">Data Grup</label>
                                                            <div class="controls">
                                                                <input type="text" class="span5 popovers" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namagrup; ?>" disabled/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label span4">Data Agen</label>
                                                            <div class="controls">
                                                                <input type="text" class="span5 popovers" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namaagen; ?>" disabled/>
                                                            </div>
                                                            </div>
                                                             <?php }?>
                           <div class="alert alert-info">
                        
                        <a>Update Data Agen</a>
                        </div>
                                   <?php echo form_open('majikans/ubahagens/',array('class'=>'form-horizontal')); ?>     

        <input type="hidden" class="span5 popovers" name="idnya" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $idnya; ?>" />

                                  <div class="control-group">
                                          <label class="control-label"> Pilih Group </label>
                                          <div class="controls ">
                                          <?php   echo form_dropdown("nama_agen",$option_group,"","id='group_id2'"); ?>
                                          <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" />
                                          </div>

                                         </div>
                                         </div>

                                         </br>
                                         <div class="control-group" id="jelasin_agen">
                                         <label class="control-label">Pilih Agen </label>
                                         <div class="controls">
                                         <?php    echo form_dropdown("id_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled'); ?>
                                         </div>
                                           </div>

                                                            <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <a href="<?php echo site_url('majikans/'); ?>" class="btn red btn-medium">Batal</a>
                                            </div>
                                                            
                              <?php echo form_close(); ?>

                                </div>
                            </div>
                        </div>
                                    
                                    <div class="space5"></div>
                            </div>
                        </div>
                    </div>
                </div>