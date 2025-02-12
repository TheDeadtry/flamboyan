<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data Majikan </span>
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
                    <li class='active'>Data Majikan </li>
                </ul>
            </div>
        </div>
    </div>
</div>  


                <div class="row-fluid">


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
                                    <div class='box-content'>
            <div class='row-fluid'>
                <div class='span12'>
                    <div class='tabbable'>
                        <ul class='nav nav-tabs'>
                            <li class='active'>
                                <a data-toggle='tab' href='#tab1'>
                                    <i class='icon-edit text-red'></i>
                                    Data Majikan
                                </a>
                            </li>
                            <li>
                                <a data-toggle='tab' href='#tab2'>
                                    <i class='icon-edit text-red'></i>
                                    Data Suhan
                                </a>
                            </li>
                            <li>
                                <a data-toggle='tab' href='#tab3'>
                                    <i class='icon-edit text-red'></i>
                                    Data Visa Permit
                                </a>
                            </li>
                        </ul>
                        <div class='tab-content'>

                            <div class='tab-pane active' id='tab1'>


                                 <div class="row-fluid">
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Majikan</div>
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
                                                <th>Kode</th>
                                                <th>Nama</th>
                                                 <th>Hadphone</th>
                                                 <th>Email</th>
                                                 <th>Alamat</th>
                                                 <th>Kode Agen</th>
                                                 <th>Dokumen</th>
                                                 <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_majikan as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->kode_majikan;?></td>
                                                <td><?php echo $row->nama;?></td>
                                                <td><?php echo $row->hp;?></td>
                                                <td><?php echo $row->email;?></td>
                                                <td><?php echo $row->alamat;?></td>
                                                <td><?php echo $row->kode_agen;?></td>
                                                <td><a href="<?php echo base_url().'/assets/dokmajikan/'.$row->file;?>"><?php echo $row->file;?></td>
                                                <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            </tr>

<div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/update_majikan'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $row->id_majikan; ?>">



                                        <div class="control-group">
                                        <label class="control-label">Kode </label>
                                        <div class="controls">
                                            <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->kode_majikan; ?>"/>
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Nama </label>
                                        <div class="controls">
                                            <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->nama; ?>"/>
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Handphone </label>
                                        <div class="controls">
                                            <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->hp; ?>"/>
                                        </div>
                                        </div>

                                        <div class="control-group">
                                        <label class="control-label">Email </label>
                                        <div class="controls">
                                            <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->email; ?>"/>
                                        </div>
                                        </div>

                                         <div class="control-group">
                                        <label class="control-label">Alamat </label>
                                        <div class="controls">
                                            <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" value="<?php echo $row->alamat; ?>"/>
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="status">
                                                    <option value="<?php echo $row->status; ?>" /><?php echo $row->status; ?>
                                                    <option value="majikan" />majikan
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                                            <label class="control-label"> Pilih Agen</label>
                                                            <div class="controls">
                                                                <select data-placeholder="Pilih No suhan" name="kode_agen" id="kode_agen" s tabindex="6">
                                                              <option value="<?php echo $row->kode_agen; ?>" /><?php echo $row->kode_agen; ?>
                                                                        <?php foreach ($tampil_data_agen as $daftar_list): ?>
                                                                            <option value="<?php echo $daftar_list->kode_agen;?>"><?php echo $daftar_list->nama;?></option>
                                                                        <?php endforeach; ?>    

                                                                  
                                                                </select>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                    <label class="control-label">File Upload</label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>assets/dokmajikan/nodok.png" alt="" /></div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div><span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="filenya" />
                                                </span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a></div>
                                        </div><span class="label label-important">NOTE!</span><span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span></div>
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


 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapus_majikan'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Majikan</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_majikan" value="<?php echo $row->id_majikan; ?>">
                              <p>Apakah anda yakin akan menghapus data Majikan ini? : <?php echo $row->id_majikan; ?></p>
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
            <div class='title'>Input Majikan</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                            </br>
                            <form action="<?php echo site_url('majikans/simpan_data_majikan');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<!--     <?php echo form_open('majikans/simpan_data_majikan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?> -->
                                        <div class="control-group">
                                          <label class="control-label"> Pilih Group (jika tidak ada... Pilih Tidak Ada grup) </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("group",$option_group,"","id='group_id'"); ?>
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
                                        <label class="control-label">Kode </label>
                                        <div class="controls">
                                            <input type="text" name="kode" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Nama </label>
                                        <div class="controls">
                                            <input type="text" name="nama" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                            <div class="control-group">
                                        <label class="control-label">Handphone </label>
                                        <div class="controls">
                                            <input type="text" name="hp" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                        <div class="control-group">
                                        <label class="control-label">Email </label>
                                        <div class="controls">
                                            <input type="text" name="email" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>

                                         <div class="control-group">
                                        <label class="control-label">Alamat </label>
                                        <div class="controls">
                                            <input type="text" name="alamat" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                        </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="status" disabled >
                                                    <option value="majikan" />majikan
                                                </select>
                                            </div>
                                        </div>

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
                                        <?php echo form_close(); ?>


                            </div>
        </div>

                            </div>




                              </div>
                            <div class='tab-pane' id='tab2'>
                                <div class="row-fluid">
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
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
                                                <th>Majikan</th>
                                                <th>No Suhan</th>
                                                <th>tgl terbit</th>
                                                <th>tgl exp</th>
                                                <th>tgl terima</th>
                                                <th>tgl simpan</th>
                                                <th>tgl bawa</th>
                                                <th>tgl minta</th>
                                                <th>Quota</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_suhan as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->nama;?></td>
                                                <td><?php echo $row->no_suhan;?></td>
                                                <td><?php echo $row->tglterbit;?></td>
                                                <td><?php echo $row->tglexp;?></td>
                                                <td><?php echo $row->tglterima;?></td>
                                                <td><?php echo $row->tglsimpan;?></td>
                                                <td><?php echo $row->tglbawa;?></td>
                                                <td><?php echo $row->tglminta;?></td>
                                                <td><?php echo $row->quota;?></td>
                                                 <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#editsuhan<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapussuhan<?php echo $no; ?>"><span>Hapus</span></td>
                                            </tr>



<div class='modal hide fade' id='editsuhan<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Form in modal</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/update_suhan'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_suhan" value="<?php echo $row->id_suhan; ?>">

 <div class="control-group">
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="<?php echo $row->id_majikan; ?>" /><?php echo $row->id_majikan; ?>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterbit"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit; ?>"/>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglexp"  placeholder='Select datepicker' type='text'value="<?php echo $row->tglexp; ?>" />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglsimpan"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglsimpan; ?>" />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglbawa"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglbawa; ?>"/>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglminta"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglminta; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers" value="<?php echo $row->quota; ?>"/>
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
                                                <div class="row-fluid">

                                            <div class='span6 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Input Suhan</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>
                            </br>
    
                                        <?php echo form_open('majikans/simpan_data_suhan', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
                                        <div class="control-group">
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="" />Select...
                                                    <?php foreach($tampil_data_majikan as $row) { ?>
                                                    <option value="<?php echo $row->id_majikan; ?>"/><?php echo $row->nama; ?>
                                                    <?php } ?>
                                                </select>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterbit"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglexp"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglsimpan"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglbawa"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglminta"  placeholder='Select datepicker' type='text' />
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
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                        </div>
                                        <?php echo form_close(); ?>


                            </div>
        </div>
                            </div>



                            </div>
                            <div class='tab-pane' id='tab3'>
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
                                                <th>Majikan</th>
                                                <th>No Visa Permit</th>
                                                <th>tgl terbit</th>
                                                <th>tgl exp</th>
                                                <th>tgl terima</th>
                                                <th>tgl simpan</th>
                                                <th>tgl bawa</th>
                                                <th>tgl minta</th>
                                                 <th>Quota</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1; 
                                                foreach ($tampil_data_visapermit as $row) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $no;?></td>
                                                <td><?php echo $row->nama;?></td>
                                                <td><?php echo $row->no_visapermit;?></td>
                                                <td><?php echo $row->tglterbit;?></td>
                                                <td><?php echo $row->tglexp;?></td>
                                                <td><?php echo $row->tglterima;?></td>
                                                <td><?php echo $row->tglsimpan;?></td>
                                                <td><?php echo $row->tglbawa;?></td>
                                                <td><?php echo $row->tglminta;?></td>
                                                <td><?php echo $row->quota;?></td>
                                                 <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#editvisapermit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapusvisapermit<?php echo $no; ?>"><span>Hapus</span></td>
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
                                            <label class="control-label">Pilih Majikan </label>
                                            <div class="controls">
                                                <select class="chosen" data-placeholder="Choose a Category" tabindex="1" name="majikan">
                                                    <option value="<?php echo $row->id_majikan; ?>" /><?php echo $row->id_majikan; ?>
                                                    <?php foreach($tampil_data_majikan as $row2) { ?>
                                                    <option value="<?php echo $row2->id_majikan; ?>"/><?php echo $row2->nama; ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterbit"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterbit; ?>"/>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglexp"  placeholder='Select datepicker' type='text'value="<?php echo $row->tglexp; ?>" />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglterima; ?>"/>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglsimpan"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglsimpan; ?>" />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglbawa"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglbawa; ?>"/>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglminta"  placeholder='Select datepicker' type='text' value="<?php echo $row->tglminta; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>
                                                            <div class="control-group">
                                            <label class="control-label">Quota </label>
                                            <div class="controls">
                                                <input type="text" name="quota" class="span10 popovers" value="<?php echo $row->quota; ?>"/>
                                            </div>
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
    
      <?php echo form_open('majikans/simpan_data_visapermit', array('class' => "form-horizontal", 'autocomplete' => 'off', 'role'=>'form')) ?>
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
                                          <label class="control-label"> Pilih Majikan </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("majikan",$option_majikan,"","id='majikan_id'"); ?>
                                          <div id="load" style="display:none"><img src="<?php echo base_url(); ?>assets/assets/pre-loader/Whirlpool.gif" alt="Whirlpool" /></div>

                                         </div>
                                         </div>

                                         <div class="control-group" id="jelasin_suhan">
                                         <label class="control-label">Pilih Suhan </label>
                                         <div class="controls">
                                         <?php    echo form_dropdown("id_suhan",array('Pilih Suhan'=>'Pilih Majikan Terkebih Dahulu'),'','disabled'); ?>
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterbit"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglexp"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                            </div>
                                                            </div>

                                                               <div class="control-group">
                                                                <label class="control-label">Tgl Terima </label>
                                                                <div class="controls">
                                                                        <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglterima"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglsimpan"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglbawa"  placeholder='Select datepicker' type='text' />
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
                                                                            <input class='input-medium' data-format='dd/MM/yyyy' name="tglminta"  placeholder='Select datepicker' type='text' />
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
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn blue"><i class="icon-ok"></i> Save</button>
                                            <button type="button" class="btn"><i class=" icon-remove"></i> Batal</button>
                                        </div>
                                        <?php echo form_close(); ?>


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


    </div>

