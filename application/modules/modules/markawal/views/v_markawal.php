<div class="row-fluid">

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
                                    <h4><?php echo $row->nama;?> <br /><small><?php echo "".$detailpersonalid ?></small></h4>
                                <?php }?>

                                <div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> silahkan mengubah data pada tombol ini...  <a class='btn btn-info btn-large' data-toggle='modal' href='#tambaha' role='button'>Tambah Data</a>
                        </div>



  <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Marketing Awal</div>
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
                                                                                <td>#</td>
                                                                                <td>Tanggal</td>
                                                                                <td>Grup</td>
                                                                                 <td>Agen</td>
                                                                                 <td>Nama Pabrik</td>
                                                                                 <td>Tanggal Pauliu</td>
                                                                                 <td>Tanggal Interview</td>
                                                                                 <td>Action</td>
                                                                            </tr>
                                                                        </thead>
                                   <tbody>
                                                                         <?php $no = 1; 
                                                                                    foreach ($data_marka_b as $row) { ?>
                                                                            <tr>
                                                                               <td><?php echo $no;?></td>
                                                                                <td><?php echo $row->tgl_to_agen;?></td>
                                                                                <td><?php echo $row->nama_agen;?></td>
                                                                                <td><?php echo $row->nama;?></td>
                                                                                <td><?php echo $row->nama_pabrik;?></td>
                                                                                <td><?php echo $row->tgl_pauliu;?></td>
                                                                                <td><?php echo $row->tgl_inter;?></td>
                                                                               <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a> 
                                                    <a href="<?php echo site_url('markawal/ubahmarkawal_bio/'.$row->id_marka_bioagen); ?>"class="btn btn-mini btn-primary"></i>Edit Grup</a>
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                                                                
                                                                            </tr>
 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Marketing Awal</h3>
                </div>  
                <form action="<?php echo site_url('markawal/edit_markawal');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_marka_bioagen" value="<?php echo $row->id_marka_bioagen; ?>">

                                         <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_to_agen"  placeholder='Select datepicker' type='text' value="<?php echo $row->tgl_to_agen; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                                                            

                                        <div class="control-group">
                                                            <label class="control-label span4">Nama Pabrik</label>
                                                            <div class="controls">
                                                                <input type="text" class="span5 popovers" name="nama_pabrik" data-trigger="hover" data-content="" data-original-title="Grup" value="<?php echo $row->nama_pabrik; ?>"/>
                                                            </div>
                                                            </div>
                                                            
                                                             
                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Pauliu </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_pauliu"  placeholder='Select datepicker' type='text' value="<?php echo $row->tgl_pauliu; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                                                              

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Interview </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_inter"  placeholder='Select datepicker' type='text' value="<?php echo $row->tgl_inter; ?>"/>
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                             
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>





 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('markawal/hapus_markawal'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data Marketing</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_marka_bioagen" value="<?php echo $row->id_marka_bioagen; ?>">
                              <p>Apakah anda yakin akan menghapus data Marketing ini? : <?php echo $row->id_marka_bioagen; ?></p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                           </div>
                           </form>
                         </div>
                       </div>
                     </div>

 

                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>



                                </div>
                            </div>
                        </div>



  <div class='modal hide fade' id='tambaha' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Data Marketing Awal</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('markawal/tambahbiotoagen');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

<input type="text" id="idbiodata" name="idbiodata" value="<?php echo "".$detailpersonalid ?>" class="hidden" />


                                                            <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_to_agen"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label"> Pilih Group </label>
                                          <div class="controls span7">
                                          <?php   echo form_dropdown("nama_agen",$option_group,"","id='group_id'"); ?>
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
                                                            <label class="control-label">Nama Pabrik</label>
                                                            <div class="controls">
                                                                <input type="text" class="span9 popovers" name="nama_pabrik" data-trigger="hover" data-content="" data-original-title="Grup" />
                                                            </div>
                                                            </div>
                                                            
                                                             
                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Pauliu </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_pauliu"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                                                              

                                                             <div class="control-group" id="berlaku">
                                                                <label class="control-label span4">Tanggal Interview </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
                                                                            <input class='input-medium' data-format='yyyy.MM.dd' name="tgl_inter"  placeholder='Select datepicker' type='text' />
                                                                <span class='add-on'>
                                                                  <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                                </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                          
                                                            

                </div>
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
