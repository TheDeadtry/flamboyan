                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Daftar CTKI </span>
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
                    <li class='active'>Detail Dafatr CTKI </li>
                </ul>
            </div>
        </div>
    </div>
</div>  
<div class="alert alert-info">
                        
                        <button data-dismiss="alert" class="close"> x </button> 
                        </div>
                        <div class='row-fluid'>

                          <div class='row-fluid'>
    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahagama' role='button'>Tambah CTKI</a>
 <a href="<?php echo site_url('surat_rekom_tabelhapap/'); ?>" class='btn btn-info btn-large' type="button">Kembali</a>

</div>  </div> 
</br>
                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Daftar CTKI </div>
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
                                              <th>Status</th>

                                            <th>ID BIODATA</th>
                                             <th>NAMA</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_detail as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>

                                             <td><?php echo $row->id_biodata;?></td>
                                              <td><?php echo $row->nama;?></td>
                                           
                                            
                                        </tr>


                                          <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Agreement <?php echo $row->id_pembuatan; ?> </h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('surat_rekom_tabelhapap/update_tabelhapap/'.$id_pembuatan); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">

                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (FEMALE FORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id1" data-placeholder="Choose a Category" tabindex="1">
                                                                     <option value="" />
                                                                     <?php  foreach ($tampil_data_ff as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (FEMALE INFORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id2" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="" />
                                                                     <?php  foreach ($tampil_data_fi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (MALE FORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id3" data-placeholder="Choose a Category" tabindex="1">
                                                                     <option value="" />
                                                                     <?php  foreach ($tampil_data_mf as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (MALE INFORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id4" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="" />
                                                                     <?php  foreach ($tampil_data_mi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (PANTI JOMPO) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id5" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="" />
                                                                     <?php  foreach ($tampil_data_jp as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
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


 <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                       <div class="modal-dialog">
                         <div class="modal-content">
                           <form class="form-horizontal" method="post" action="<?php echo site_url('surat_rekom_tabelhapap/hapus_tabelhapap/'.$id_pembuatan); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data CTKI</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                              <p>Apakah anda yakin akan menghapus data CTKI ini? : <?php echo $row->id_biodata; ?></p>
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

                    </div>

                                         <div class='modal hide fade' id='tambahagama' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Agreement  <?php echo $id_pembuatan; ?></h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('surat_rekom_tabelhapap/simpan_data_tabelhapap/'.$id_pembuatan);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />


<input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $id_pembuatan; ?>">
<code class="text-danger">PILIH SALAH SATU,dari 5 PILIHAN CTKI BERDASARKAN SEKTORNYA</code>

                                 <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (FEMALE FORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id1" data-placeholder="Choose a Category" tabindex="1">
                                                                     <option value="" />
                                                                     <?php  foreach ($tampil_data_ff as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (FEMALE INFORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id2" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="" />
                                                                     <?php  foreach ($tampil_data_fi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (MALE FORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id3" data-placeholder="Choose a Category" tabindex="1">
                                                                     <option value="" />
                                                                     <?php  foreach ($tampil_data_mf as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (MALE INFORMAL) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id4" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="" />
                                                                     <?php  foreach ($tampil_data_mi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                                <label class="control-label"> PILIH CTKI (PANTI JOMPO) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id5" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="" />
                                                                     <?php  foreach ($tampil_data_jp as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->id_biodata." <br>".$pilihan->nama;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>

<script>

alert("ok");

</script>