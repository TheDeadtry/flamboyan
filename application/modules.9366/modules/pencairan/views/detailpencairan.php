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
            <div class='title'>Dokumen Bank</div>
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
                            <div class='title'>Pengajuan pencairan bank</div>
                            <div class='actions'>
                                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                </a>
                                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                </a>
                            </div>
                        </div>
                                            <div class='box-content box-no-padding'>
                                            </br>
                    <?php foreach($tampil_data_pencairan as $row) { ?>

                       <?php echo form_open('pencairan/ubahpencairan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                     <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
    
                                 <div class="control-group">
            <label class="control-label"> Tanggal Pencairan</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_cair"  value="<?php echo $row->tgl_cair;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

 <div class="control-group">
                            <label class="control-label">Nilai TMA</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nilai_tma" value="<?php echo $row->nilai_tma;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>   


                            <div class="control-group">
                            <label class="control-label">Nilai TMI</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nilai_tmi" value="<?php echo $row->nilai_tmi;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>                                 
<!--                                                     <div class="space5"></div>
 -->                                           
                 <div class="form-actions">
                   <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                    </div>     
                                   <?php echo form_close(); }?>         
                                            </div>
                                        </div>
                    </div>
                </div>

                </div>