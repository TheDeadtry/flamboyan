<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Dashboard</span>
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
                    <li class='active'>Dashboard Admin</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

  <div class='row-fluid'>
    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahpersonalblk' role='button'>Tambah personalblk</a>

</div>  </div> 
</br>
                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data personalblk</div>
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
                                            <th>Pemilik</th>
                                            <th>nodaftar</th>
                                             <th>nama</th>
                                             <th>Option</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personalblk as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama_pemilik." - ".$row->negara;?></td>
                                            <td><?php echo $row->nodaftar;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update personalblk</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('dashboard/update_data_personalblk'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->id_personalblk; ?>">

                                         <div class="control-group">
                                                            <label class="control-label">Pemilik</label>
                                                            <div class="controls">
                                                                <input type="text" name="pemilik" class="span10 popovers" value="<?php echo $row->pemilik; ?>"/>
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">No Daftar</label>
                                                            <div class="controls">
                                                                <input type="text" name="nodaftar" class="span10 popovers" value="<?php echo $row->nodaftar; ?>"/>
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nama personal</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama" class="span10 popovers" value="<?php echo $row->nama; ?>"/>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('dashboard/hapus_data_personalblk'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data personalblk</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $row->id_personalblk; ?>">
                              <p>Apakah anda yakin akan menghapus data personalblk ini? : <?php echo $row->id_personalblk; ?></p>
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

                                         <div class='modal hide fade' id='tambahpersonalblk' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah personalblk</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('dashboard/simpan_data_personalblk');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />


                                <div class="control-group">
                                                                <label class="control-label"> PILIH TKI </label>
                                                                <div class="controls">
                                                                    <select class="span 12 " name="id1" data-placeholder="Choose a Category" tabindex="1">
                                                                     <option value="" />
                                                                     <?php  foreach ($tampil_data_personal as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_biodata;?>" /><?php echo $pilihan->nama." <br>".$pilihan->id_biodata;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>




                                <div class="control-group">
                                                                <label class="control-label span4"> Pemilik </label>
                                                      <div class="controls">
                                                                              <select class="span7 " name="pemilik" data-placeholder="Choose a Category" tabindex="1">
                                                                     <?php  foreach ($tampil_data_pemilik as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->id_pemilik;?>" /><?php echo $pilihan->nama_pemilik." ".$pilihan->negara;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">No Daftar</label>
                                                            <div class="controls">
                                                                <input type="text" name="nodaftar" class="span10 popovers" />
                                                            </div>
                                                            </div>

                                                            <div class="control-group">
                                                            <label class="control-label">Nama personal</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama" class="span10 popovers" />
                                                            </div>
                                                            </div>
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                      