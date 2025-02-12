<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Marketing Awal </span>
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
                    <li class='active'>>Data Marketing Awal </li>
                </ul>
            </div>
        </div>
    </div>
</div>  



                    <div class="row-fluid">


            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Marketing Awal</div>
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

                                <div class="span9">
                                      <?php if($row->skill1==""){?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                    <?php }else{?>
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid."".$row->negara1."".$row->negara2."".$row->calling."-".$row->skill1."".$row->skill2."".$row->skill3; ?></small></h4>
                                     <?php }?>                                <?php }?>
                                   
                               
            <div class='span12 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Ubah Grup </div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>

                                   <?php echo form_open('detailmajikan/ubahgrupmajikan/'.$detailpersonalid,array('class'=>'form-horizontal')); ?>     
                                  <?php foreach($tampil_data_majikanfi as $row) { ?>
 <div class="alert alert-info">
                        
                        <a>Data Yang Akan di ubah</a>
                        </div>
                                            <div class="control-group">
                                                            <label class="control-label span4">Data Grup</label>
                                                            <div class="controls">
                                                                <input type="text" class="span5 popovers" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namagroupnya; ?>" disabled/>
                                                            </div>
                                                            </div>

                                                             <div class="control-group">
                                                            <label class="control-label span4">Data Agen</label>
                                                            <div class="controls">
                                                                <input type="text" class="span5 popovers" name="nama_pabriks" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->namaagennya; ?>" disabled/>
                                                            </div>
                                                            </div>
                                                             <?php }?>
                           <div class="alert alert-info">
                        
                        <a>Update Data Grup Marketing Awal</a>
                        </div>

                        <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $detailpersonalid; ?>">

                                  <div class="control-group">
                                          <label class="control-label"> Pilih Groupsdasdsad </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("group",$option_group,"","id='group_id2'"); ?>
                                          <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                         </div>
                                         </div>

                                         <div class="control-group" id="jelasin_agen">
                                         <label class="control-label">Pilih Agen </label>
                                         <div class="controls">
                                         <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled'); ?>
                                         </div>
                                           </div>

                                                            <div class="form-actions">
                                                <?php echo form_submit('submit', 'Update', "class = 'btn blue'"); ?>
                                                <a href="<?php echo site_url('detailmajikan/'); ?>" class="btn red btn-medium">Batal</a>
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