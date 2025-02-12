
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Detail Permintaan Dokumen Majikan </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-info panel-bordered">

                        <div class="panel-heading">
                            <a class='btn btn-success' data-toggle='modal' href='#tambahagama' role='button'>Tambah Dokumen</a>
                            <a href="<?php echo site_url('new_majikans/'); ?>" class='btn btn-warning' type="button">Kembali</a>
                            <h5 class="panel-title ">Detail Permintaan Dokumen <?php echo $tampil_nama_agree;?><br> </h5><br/>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>    
                        <div class="panel-body">
                            <table class='table table-bordered table-striped' id="fixedeks" style='margin-bottom:0;'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Dokumen</th>
                                        <th>Status Dokumen</th>
                                        <th>Sektor Dokumen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; 
                                    foreach ($tampil_data_detail as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td>
                                                <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>">
                                                    <span>Edit</span>
                                                </a>  
                                                <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>">
                                                    <span>Hapus</span>
                                                </a>
                                            </td>
                                            <td><?php echo $row->dokumen;?></td>
                                            <td><?php echo $row->stats;?></td>
                                            <td><?php echo $row->status;?></td>
                                        </tr>


                                        <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog'  style='width:700px' tabindex='-1'>
                                            <div class='modal-header'>
                                                <button class='close' data-dismiss='modal' type='button'>&times;</button>
                                                <h3>Update Dokumen <?php echo $tampil_nama_agree;?> </h3>
                                            </div>  
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/updatedokumen/'.$id_majikan); ?>">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                <div class="form-group">
                                                    <label class="control-label"> Pilih Dokumen) </label>
                                                    <div class="col-sm-3">
                                                        <select class="col-sm-9" name="dokumen" data-placeholder="Choose a Category" tabindex="1">
                                                        <option value="<?php echo $row->dokumen;?>" /><?php echo $row->dokumen;?>
                                                        <?php foreach ($tampil_data_dok as $pilihan) { ?>
                                                            <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                        <?php } ?> 
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label">Status Dokumen</label>
                                                    <div class="col-sm-3">
                                                        <select class="col-sm-9" data-placeholder="Choose a Category" tabindex="1" name="stats"  >
                                                             <option value="<?php echo $row->stats;?>" /> <?php echo $row->stats;?>
                                                                <option value="" />
                                                            <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                            <option value="影本-COPY" />影本-COPY
                                                            <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label"> Sektor Dokumen </label>
                                                    <div class="col-sm-3">
                                                        <select class="col-sm-9" name="status" data-placeholder="Choose a Category" tabindex="1">
                                                            <option value="<?php echo $row->status;?>" /><?php echo $row->status;?>
                                                            <option value="" />
                                                            <option value="formal" />Formal
                                                            <option value="informal" />Informal
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('majikans/hapusdokumen/'.$id_majikan); ?>">
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
<form action="<?php echo site_url('majikans/simpandokumen/'.$id_majikan);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />


<input type="hidden" class="form-control" name="id_majikan" value="<?php echo $id_majikan; ?>">
<code class="text-danger">PILIH Dokumen Dengan Teliti</code>

                                 <div class="control-group">
                                                                <label class="control-label"> PILIH Dokumen </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="dokumen" data-placeholder="Choose a Category" tabindex="1">
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
                                                <select class="span10 " data-placeholder="Choose a Category" tabindex="1" name="stats"  >
                                                        <option value="" />
                                                    <option value="正本-ORIGINAL" />正本-ORIGINAL
                                                    <option value="影本-COPY" />影本-COPY
                                                    <option value="沒有-TIDAK ADA" />沒有-TIDAK ADA
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

                                                             
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                <script type="text/javascript">
                    $('#fixedeks').dataTable({
                        scrollX: true,
                        scrollY: true,
                        "searchable": false,
                        fixedColumns: {
                            leftColumns: 0,
                            rightColumns: 0
                        },
                        processing: true,
                        bFilter: true,
                        "lengthChange": false,
                        serverSide: true,
                        ajax: {
                            "url"       : "<?php echo site_url('new_majikans/show_suhan/'.$kodemajikan.'/'.$kodeagen.'/'.$kodegroup) ?>",
                            "type"      : "POST"
                        }
                    });
                </script>