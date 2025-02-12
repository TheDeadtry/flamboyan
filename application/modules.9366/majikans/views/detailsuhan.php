<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Suhan </span>
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
                    <li class='active'>Data Suhan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  
 <div class="row-fluid">

                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                                <button data-dismiss="alert" class="close"> x </button><a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Data</a>
                               <a target="_blank" href="<?php echo site_url('pdf9/cetaksuhan/'); ?>" class="btn btn-large btn-primary" type="button">Print Data Suhan</a>

                            <div class='box-header orange-background'>
                                <div class='title'>Data Suhan</div>
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
                                                 
                                                <th>Majikan</th>
                                                <th>tgl terbit</th>
                                                <th>tgl exp</th>
                                               <!--  <th>tgl terima</th>
                                                <th>tgl simpan</th> -->
                                               <!--  <th>tgl bawa</th> -->
                                                <!-- <th>tgl minta</th> -->
                                               <!--  <th>Quota</th> -->
                                                <th>AGEN</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_suhan as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                 <td>
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapussuhan<?php echo $no; ?>"><span>Hapus</span></a>
                                     <a href="<?php echo site_url('majikans/ubahagensuhan/'.$row->id_suhan); ?>"class="btn btn-mini btn-primary"></i>Edit Agen </a></br>
                                            <a href="<?php echo site_url('majikans/update_data_suhan/'.$row->id_suhan); ?>" class="btn btn-mini btn-primary" type="button">Ubah  Data</a></br>
                                           

                                        </td>
                                            <td>  <a class="btn btn-mini btn-primary" href="<?php echo site_url('majikans/tampilsuhan/'.$row->id_suhan); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">Tanggal Terima</a>
                                                <a class="btn btn-mini btn-primary" href="<?php echo site_url('majikans/tampiltki/'.$row->id_suhan); ?>" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">Data TKI</a>

                                            <!-- <a href="<?php echo site_url('majikans/tampilsuhan/'.$row->id_suhan); ?>"class="btn btn-mini btn-primary"></i>Tanggal Terima </a> -->
                                        <!-- <a href="<?php echo site_url('majikans/tampiltki/'.$row->id_suhan); ?>"class="btn btn-mini btn-primary"></i>Data TKI </a> -->
                                    </td>
                                            


                                            
                                         <td><a target="_blank" href="<?php echo base_url().'/assets/doksuhan/'.$row->filesuhan;?>"<?php echo $row->filesuhan;?>><img src="<?php echo base_url(); ?>assets/doksuhan/<?php echo "".$row->filesuhan;?>"/></a></td>
                                                <td><?php echo $row->no_suhan;?></td>
                                                 <td><?php echo $row->namamajikannya;?></td> 
                                                <td><?php echo $row->tglterbit;?></td>
                                                <td><?php echo $row->tglexp;?></td>
                                               <!--  <td><?php echo $row->tglterima;?></td>
                                                <td><?php echo $row->tglsimpan;?></td> -->
                                                <!-- <td><?php echo $row->tglbawa;?></td> -->
                                              <!--   <td><?php echo $row->tglminta;?></td> -->
                                                <!-- <td><?php echo $row->quotasuhan;?></td> -->
                                                <td><?php echo $row->namaagen;?></td>

                                            </tr>



<div class='modal hide fade' id='editsuhan<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Ubah Data SUhan</h3>
                </div>  

<form action="<?php echo site_url('majikans/update_suhan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_suhan" value="<?php echo $row->id_suhan; ?>">

 <div class="control-group">
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="<?php echo $row->id_majikan; ?>" /><?php echo $row->nama; ?>
                                                    <?php foreach($tampil_data_majikan as $row2) { ?>
                                                    <option value="<?php echo $row2->id_majikan; ?>"/><?php echo $row2->nama; ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                  


                                        <div class="control-group">
                                            <label class="control-label">No Suhan </label>
                                            <div class="controls">
                                                <input type="text" name="no" class="span10 popovers" value="<?php echo $row->no_suhan; ?>"/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                                                <label class="control-label">Tgl Terbit</label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterbit"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit; ?>"/>
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
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglexp"  placeholder='Select datepicker' type='text'value="<?php echo $row->tglexp; ?>" />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                           <!--     <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
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
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglsimpan"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglsimpan; ?>" />
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
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglbawa"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglbawa; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->

                                                       <!--      <div class="control-group">
                                                                <label class="control-label">Tgl Minta </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglminta; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->
                                                           <!--  <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers" value="<?php echo $row->quotasuhan; ?>"/>
                                            </div>
                                        </div> -->
 <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/doksuhan/<?php echo "".$row->filesuhan?>" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" value="<?php echo $row->filesuhan; ?>" name="gambarnya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
                                </div>


                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>


 <div class="modal fade" id="hapussuhan<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapus_suhan'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data SUHAN</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_suhan" value="<?php echo  $row->id_suhan; ?>">
                            <input type="text" class="form-control" name="file" value="<?php echo $row->filesuhan; ?>">
                              <p>Apakah anda yakin akan menghapus data SUHAN ini? : <?php echo  $row->id_suhan; ?></p>
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
  <div class='modal hide fade' id='tambaha' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Data Marketing Awal</h3>
                </div>
                <div class='modal-body'>

                                <form action="<?php echo site_url('majikans/simpan_data_suhan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                         <div class="control-group">
                                          <label class="control-label"> Pilih Group </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("group",$option_group,"","id='group_id3'"); ?>
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
                                            <label class="control-label">No Suhan </label>
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

                                                             <!--   <div class="control-group">
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
 -->
                                                           <!--  <div class="control-group">
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
 -->
                                                          <!--   <div class="control-group">
                                                                <label class="control-label">Tgl Minta </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tglminta"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div> -->

                                                       <!--       <div class="control-group">
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

                                        </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>

