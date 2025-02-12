<?php $this->load->helper("sesi"); ?>
<?php unset($_SESSION["sesi-link"]); ?>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Detail Permintaan Dokumen </span>
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
                    <li class='active'>Detail Permintaan Dokumen </li>
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
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahagama' role='button'>Tambah Dokumen</a>
<a class='btn btn-info btn-large' href="<?php echo site_url(); ?>/dokdibawa/index/agen-detaildokumen-<?= $id_agen; ?>" >Tambah Pilihan Document</a>
<a href="<?php echo site_url('agen/'); ?>" class='btn btn-info btn-large' type="button">Kembali</a>

</div>  </div> 
</br>
    <div class="row-fluid">
        <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data Permintaan Dokumen <?php echo $tampil_nama_agree;?></div>
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
                                             <th>Dokumen</th>
                                             <th>Status Dokumen</th>
                                             <th>Sektor</th>
                                             <th>Type Permintaan</th>
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
                                              <td><?php echo $row->dokumen;?></td>
                                              <td><?php echo $row->stats;?></td>
                                              <td><?php echo $row->status;?></td>
                                              <td><?php echo $row->type_permintaan;?></td>
                                        </tr>
            <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog'  style='width:700px' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update Dokumen <?php echo $tampil_nama_agree;?> </h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('agen/updatedokumen/'.$id_agen); ?>">
                   <div class="modal-body">
                          <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                             <div class="control-group">
                                                                <label class="control-label"> Pilih Dokumen) </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="dokumen" data-placeholder="Choose a Category" tabindex="1">
                                                                      <option value="<?php echo $row->dokumen;?>" /><?php echo $row->dokumen;?>
                                                                  <?php  foreach ($tampil_data_dok as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                            <label class="control-label">Status Dokumen</label>
                                            <div class="controls">
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="stats"  >
                                                     <option value="<?php echo $row->stats;?>" /> <?php echo $row->stats;?>
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA 
                                                    <option value="根據要求-SESUAI PERMINTAAN" />根據要求-SESUAI PERMINTAAN
                                                </select>
                                            </div>
                                        </div>

                                      <div class="control-group">
                                            <label class="control-label"> Sektor Dokumen </label>
                                            <div class="controls">
                                                <select class="span 12 " name="status" data-placeholder="Choose a Category" tabindex="1">
                                                 <option value="<?php echo $row->status;?>" /><?php echo $row->status;?>
                                               <option value="" />
                                                <option value="formal" />Formal
                                                 <option value="informal" />Informal
                                                    </select>
                                            </div>
                                        </div>
                <div class="control-group">
                    <label class="control-label"> Type Permintaan </label>
                        <div class="controls">
                        <select class="span 12 " required name="type_permintaan" data-placeholder="Choose a Category" tabindex="1">
                            <option value="<?php echo $row->type_permintaan;?>" /><?php echo $row->type_permintaan;?>
                            <option value="" />
                            <option value="Permintaan Majikan" />Permintaan Majikan
                            <option value="Permintaan Agen" />Permintaan Agen
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('agen/hapusdokumen/'.$id_agen); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Dokumen</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                              <p>Apakah anda yakin akan menghapus data Dokumen ini? : <?php echo $row->dokumen; ?></p>
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

<div class='modal hide fade' id='tambahagama' role='dialog' tabindex='-2' style='width:700px'>
    <div class='modal-header'>
        <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah Dokumen  <?php echo $tampil_nama_agree;?></h3>
    </div>
    <div class='modal-body'>
        <form action="<?php echo site_url('agen/simpandokumen/'.$id_agen);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
            <input type="hidden" class="form-control" name="id_agen" value="<?php echo $id_agen; ?>">
            <code class="text-danger">PILIH Dokumen Dengan Teliti</code>
                <div class="control-group">
                    <label class="control-label"> PILIH Dokumen </label>
                        <div class="controls">
                            <select class="span 12 " name="dokumen" required data-placeholder="Choose a Category" tabindex="1">
                                   <option value="" />
                             <?php  foreach ($tampil_data_dok as $pilihan) { ?>
                                    <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                             <?php
                                 } ?> 
                                </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Status Dokumen</label>
                    <div class="controls">
                        <select class="span10 " required data-placeholder="Choose a Category" tabindex="1" name="stats"  >
                                <option value="" />
                            <option value="正本-ORIGINAL" />正本-ORIGINAL
                            <option value="影本-COPY" />影本-COPY
                            <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                            <option value="根據要求-SESUAI PERMINTAAN" />根據要求-SESUAI PERMINTAAN
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"> Sektor Dokumen </label>
                        <div class="controls">
                        <select class="span 12 " name="status" data-placeholder="Choose a Category" tabindex="1">
                            <option value="" />
                            <option value="formal" />Formal
                            <option value="informal" />Informal
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label"> Type Permintaan </label>
                        <div class="controls">
                        <select class="span 12 " required name="type_permintaan" data-placeholder="Choose a Category" tabindex="1">
                            <option value="" />
                            <option value="Permintaan Majikan" />Permintaan Majikan
                            <option value="Permintaan Agen" />Permintaan Agen
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
                      