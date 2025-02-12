
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data VisaPermit </span>
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
                    <li class='active'>Data VisaPermit </li>
                </ul>
            </div>
        </div>
    </div>
</div>  
<a target="_blank" href="<?php echo site_url('pdf9/cetakvisapermit/'); ?>" class="btn btn-large btn-primary" type="button">Print Data VisaPermit</a>
<br><br>
 <div class="row-fluid">
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Visa Permit</div>
                                <div class='actions'>
                                    <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                                    </a>
                                    <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                                    </a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
   <thead>
                                            <tr>
                                                <th>#</th>
                                                 <!-- <th>Dokumen</th> -->
                                                <th></th>  
                                                   <th></th>  
                                                <th>File</th>
                                                
                                                <th>No Suhan</th>
                                                <th>No Visa Permit</th>
                                                  <th>Nama Group</th>
                                                  <th>Nama Agen</th>
                                                  <th>Nama Majikan</th>
                                                <th>tgl terbit</th>
                                                <th>tgl exp</th>
                                               <!--  <th>tgl terima</th> -->
                                               <!--  <th>tgl simpan</th> -->
                                               <!--  <th>tgl bawa</th> -->
                                               <!--  <th>tgl minta</th> -->
                                                <!--  <th>Quota</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_visapermit as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>

                                        <td> <a href="<?php echo site_url('majikans/update_data_visapermit/'.$row->id_visapermit); ?>" class="btn btn-mini btn-primary" type="button">Ubah</a>
                                           <a href="<?php echo site_url('majikans/ubahagenvisapermit/'.$row->id_visapermit); ?>"class="btn btn-mini btn-primary"></i>Ubah SUHAN/VP </a>
                                           <a class="btn btn-mini btn-primary" href="<?php echo site_url('majikans/tampilvisapermit/'.$row->id_visapermit); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">Tanggal Terima</a>
                                                <a class="btn btn-mini btn-primary" href="<?php echo site_url('majikans/tampiltkivisapermit/'.$row->id_visapermit); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">Data TKI</a></td>
                                     <td><a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapusvisapermit<?php echo $no; ?>"><span>Hapus</span></td>
                                     <td><a target="_blank" href="<?php echo base_url().'/assets/dokvisapermit/'.$row->filevisapermit;?>"<?php echo $row->filevisapermit;?>><img src="<?php echo base_url(); ?>assets/dokvisapermit/<?php echo "".$row->filevisapermit ?> "/></a> </td>
                                                <td><?php echo $row->no_suhan;?></td>
                                                <td><?php echo $row->no_visapermit;?></td>
                                                 <td><?php echo $row->namagroupnya;?></td>
                                                  <td><?php echo $row->namaagen;?></td>
                                                   <td><?php echo $row->namamajikannya;?></td>
                                               
                                                <td><?php echo $row->tglterbitvs;?></td>
                                                <td><?php echo $row->tglexpvs;?></td>
                                                <!-- <td><?php echo $row->tglterimavs;?></td> -->
                                               <!--  <td><?php echo $row->tglsimpanvs;?></td> -->
                                                <!-- <td><?php echo $row->tglbawavs;?></td>
                                                <td><?php echo $row->tglmintavs;?></td> -->
                                               <!--  <td><?php echo $row->quotavs;?></td> -->
                                            </tr>


<div class='modal hide fade' id='editvisapermit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/update_visapermit'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_visapermit" value="<?php echo $row->id_visapermit; ?>">
                                        <div class="control-group">
                                            <label class="control-label">No Visa Permit </label>
                                            <div class="controls">
                                                <input type="text" name="no" class="span10 popovers" value="<?php echo $row->no_visapermit; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terbit</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbit"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbitvs; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                  <div class="control-group">
                                                                <label class="control-label">Tgl Expired </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglexp"  placeholder='Select datepicker' type='text'value="<?php echo $row->tglexpvs; ?>" />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                             <!--   <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterimavs; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->
                                                           <!--  <div class="control-group">
                                                                <label class="control-label">Tgl Simpan </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsimpan"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglsimpanvs; ?>" />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->

                                                         <!--    <div class="control-group">
                                                                <label class="control-label">Tgl Bawa </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglbawa"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglbawavs; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->
<!-- 
                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Minta </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglmintavs; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers" value="<?php echo $row->quotavs; ?>"/>
                                            </div>
                                        </div>
                                         -->
                                         <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select File</span><span class="fileupload-exists">Change</span>
                                                 <input type="file" class="default" name="filenya"/>
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div></div>
                                </div>
                             
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                          </div>
                       </div>
                     </div>



 <div class="modal fade" id="hapusvisapermit<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapus_visapermit'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data SUHAN</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_visapermit" value="<?php echo  $row->id_visapermit; ?>">
                            <input type="hidden" class="form-control" name="file" value="<?php echo $row->filevisapermit; ?>">

                              <p>Apakah anda yakin akan menghapus data SUHAN ini? : <?php echo  $row->id_visapermit; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>



                                            <?php 
                                            $no++;
                                            } 
                                            ?>
                                        </tbody>
                                 </table>    
                        </div>
                     </div>
                 </div>
             </div>
 </div>
</br>
 <div class="row-fluid">

                                            <div class='span6 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Input Visa Permit</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                            </br>
    

                                      <form action="<?php echo site_url('majikans/simpan_data_visapermit');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                     <!--    <div class="control-group">
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="" />Select...
                                                    <?php foreach($tampil_data_majikan as $row) { ?>
                                                    <option value="<?php echo $row->id_majikan; ?>"/><?php echo $row->nama; ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div> -->

                                       <div class="control-group">
                                          <label class="control-label"> Pilih Group </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("group",$option_group,"","id='group_id4'"); ?>
                                          <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                         </div>
                                         </div>

                                         <div class="control-group" id="jelasin_agen">
                                         <label class="control-label">Pilih Agen </label>
                                         <div class="controls">
                                         <?php    echo form_dropdown("kode_group",array('Pilih Group'=>'Pilih Group Terkebih Dahulu'),'','disabled'); ?>
                                         </div>
                                           </div>

                                        <div class="control-group">
                                            <label class="control-label">No Visa Permit </label>
                                            <div class="controls">
                                                <input type="text" name="no" class="span10 popovers"/>
                                            </div>
                                        </div>
<div class="control-group">
                                                                <label class="control-label">Tgl Terbit</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbit"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                  <div class="control-group">
                                                                <label class="control-label">Tgl Expired </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglexp"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
<!-- 
                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Simpan </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsimpan"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Bawa </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglbawa"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label">Tgl Minta </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                             <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers"/>
                                            </div>
                                        </div> -->

                                         <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select File</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="filenya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                        </div>
                                      </form>

                            </div>
        </div>
                            </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>