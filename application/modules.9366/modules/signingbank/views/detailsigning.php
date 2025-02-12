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
                            <div class='title'>Pengajuan Signing bank</div>
                            <div class='actions'>
                                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                </a>
                                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                </a>
                            </div>
                        </div>
                                            <div class='box-content box-no-padding'>
                                            </br>
                    <?php foreach($tampil_data_signing as $row) { ?>

                       <?php echo form_open('signingbank/ubahsigning', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                     <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                     <div class="control-group">
                            <label class="control-label">Nama Bank</label>
                              <div class="controls">
                                <select class="span7 " id="nama_bank"name="nama_bank" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $row->nama_bank;?>" /><?php echo $row->nama_bank;?>
                                    <?php  foreach ($tampil_data_bank as $pilihan) { ?>
                                     <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                      <?php
                                     } ?>
                                    </select> 
                              </div>

                              </div>
<!-- 
                         <div class="control-group">
                            <label class="control-label">Nama Bank</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="nama_bank" value="<?php echo $row->nama_bank;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>  -->    
                                 <div class="control-group">
            <label class="control-label"> Tanggal Bank</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_bank"  value="<?php echo $row->tgl_bank;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>
          <div class="control-group">
            <label class="control-label">Tanggal Tki Tandatangan </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_tki_ttd"  value="<?php echo $row->tgl_tki_ttd;?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>  

          <div class="control-group">
                            <label class="control-label">Jenis Kredit </label>
                              <div class="controls">
                                <select class="span7 " id="periode_kredit"name="periode_kredit" data-placeholder="Choose a Category" tabindex="1">
                                    <option value="<?php echo $row->periode_kredit;?>" /><?php echo $row->periode_kredit;?>
                                    <?php  foreach ($tampil_data_kredit as $pilihan) { ?>
                                     <option value="<?php echo $pilihan->namakredit;?>" /><?php echo $pilihan->namakredit; echo " - ".$pilihan->isikredit; echo " - ".$pilihan->nilaikredit;?>
                                      <?php
                                     } ?>
                                    </select> 
                              </div>

                              </div>

<!--  <div class="control-group">
                            <label class="control-label">Periode Kerdit</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="periode_kredit" value="<?php echo $row->periode_kredit;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>   


                            <div class="control-group">
                            <label class="control-label">Jumlah Kredit</label>
                              <div class="controls">
                                <input type="text" class=" popovers" name="jumlah_kredit" value="<?php echo $row->jumlah_kredit;?>" data-trigger="hover" data-content="" data-original-title="Agen" />
                                </div>
                            </div>  -->                                
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