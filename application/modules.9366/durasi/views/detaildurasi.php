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
</div>
                                    
                            <div class='span8 box bordered-box blue-border' style='margin-bottom:0;'>
                                            <div class='box-header orange-background'>
                            <div class='title'>Pengajuan durasi</div>
                            <div class='actions'>
                                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                </a>
                                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                </a>
                            </div>
                        </div>
                                            <div class='box-content box-no-padding'>
                                            </br>
<?php echo form_open('durasi/updatedurasidetail', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
 <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
              <?php foreach ($tampil_data_durasidetail as $row) { ?>          
                                 <div class="control-group">
                                <label class="control-label">Status Durasi</label>
                                <div class="controls">
                                  <select class="span5 " name="statusp" data-placeholder="Choose a Category" tabindex="1">
                                  <option value="<?php echo $row->status;?>" /><?php echo $row->status;?>
                                    <option value="actual" />Actual
                                    <option value="calculation" />Calculation
                                    </select>
                                </div>
                              </div>

                                     <div class="control-group">
            <label class="control-label"> Tanggal Registrasi </label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='dd/MM/yyyy'id='tgl_registrasi' value="<?php echo $row->tgl_registrasi;?>" name="tgl_registrasi"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

<div class="control-group">
                            <label class="control-label">Jumlah Durasi</label>
                              <div class="controls">
                                <input type="text" class=" popovers" id='jml_hari' name="jml_hari" data-trigger="hover" data-content="" data-original-title="Agen" value="<?php echo $row->jml_hari;?>" />
                                </div>
                            </div>   


  <?php } ?>

                                                            <div class="form-actions">
                                                                <?php echo form_submit('submit', 'Update', " class = 'btn blue'"); ?>
                                                            </div> 
                                                        <?php echo form_close(); ?>
                                                        </br>

                       <?php echo form_open('durasi/tambahdurasi', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                     <input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />
                               

                                 <div class="control-group">
            <label class="control-label"> Tanggal durasi</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='dd/MM/yyyy'id='tgl_update'  name="tgl_update"  placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>
    
                                 <div class="control-group">
            <label class="control-label"> Tanggal Habi Durasi</label>
               <div class="controls">
             <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='dd/MM/yyyy' id='tgl_habisdurasi' name="tgl_habisdurasi" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
          </div>
          </div>

 
                        
<!--                                                     <div class="space5"></div>
 -->                                           
    <div class="form-actions">
                                                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                                                </div>
                                                                    <?php echo form_close(); ?>

                                                                       <table class="table table-striped table-bordered" id="sample_2">
                                                                        <thead>

                                                                            
                                                                            <tr>
                                                                                <td>#</td>
                                                                                <td>Tgl update</td>
                                                                                <td>Tgl habisdurasi</td>
                                                                 
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                         <?php $no = 1; 
                                                                                    foreach ($tampil_data_durasi as $row) { ?>
                                                                            <tr>
                                                                               <td><?php echo $no;?></td>
  
                                                                                <td><?php echo $row->tgl_update;?></td>
                                                                                <td><?php echo $row->tgl_habisdurasi;?></td>
                                                                           <td>  <a type="button" class="btn btn-mini" href="<?php echo base_url()."index.php/durasi/v_ubahdurasi/"?><?php echo $row->id_durasi; ?>"> ubah </a>
                                                                                    <a href="<?php echo site_url('durasi/hapusdurasi/'.$row->id_durasi); ?>"class="btn-red"><i class="icon-trash"></i>Hapus</a>
                                                                                </td>
                                                                                
                                                                            </tr>
                                                                            <?php $no++;
                                                                            } ?>

                                                                        </tbody>
                                                                    </table>

                                            </div>
                                        </div>
                    </div>
                </div>

                </div>