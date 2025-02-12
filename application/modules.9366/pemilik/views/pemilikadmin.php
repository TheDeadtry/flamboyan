                <div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Data pemilik </span>
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
                    <li class='active'>Data pemilik </li>
                </ul>
            </div>
        </div>
    </div>
</div>  

<div class="alert alert-info">
                        
						<button data-dismiss="alert" class="close"> x </button> Welcome <strong> <?php echo $tampil_nama_user; ?> </strong> PT Flamboyan Gema Jasa 
						</div>

                          <div class='span10 box bordered-box blue-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
            <div class='title'>Detail Disnaker</div>
            <div class='actions'>
                <a href="#" class="btn box-remove btn-mini btn-link"><i class='icon-remove'></i>
                </a>
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i>
                </a>
            </div>
        </div>
                            <div class='box-content box-no-padding'>      

<form action="<?php echo site_url('pemilik/updatebiaya');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
<br>
<?php foreach ($tampil_biaya as $biayax) { ?>
 <div class="control-group">
                                                            <label class="control-label">Set Jumlah Biaya</label>
                                                            <div class="controls">
                                                                <input type="text" value="<?php echo $biayax->biaya; ?>" name="biaya" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                  <?php } ?>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Set Biaya</button>
                                </div>
                                                            </form>
                                 </div>

                                  </div>
                          <div class='row-fluid'>
<br>
<br>

    <div class='span12'>
<a class='btn btn-info btn-large' data-toggle='modal' href='#tambahpemilik' role='button'>Tambah pemilik</a>

</div>  </div> 
</br>
                    <div class="row-fluid">
<div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header orange-background'>
                                <div class='title'>Data pemilik</div>
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
                                            <th>pemilik</th>
                                            <th>Bhs Taiwan</th>
                                             <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_pemilik as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama_pemilik;?></td>
                                            <td><?php echo $row->negara;?></td>
                                            <td>
                                            <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><span>Edit</span></a>  
                                        <a href="#" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><span>Hapus</span></td>
                                            
                                        </tr>

 <div class='modal hide fade' id='edit<?php echo $no; ?>' role='dialog' tabindex='-1'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Update pemilik</h3>
                </div>  
                <form class="form-horizontal" method="post" action="<?php echo site_url('pemilik/update_data_pemilik'); ?>">
                           <div class="modal-body">
                           
                          <input type="hidden" class="form-control" name="id_pemilik" value="<?php echo $row->id_pemilik; ?>">

                                         <div class="control-group">
                                                            <label class="control-label">Nama pemilik</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pemilik" class="span10 popovers" value="<?php echo $row->nama_pemilik; ?>"/>
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Nama pemilik (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="negara" class="span10 popovers" value="<?php echo $row->negara; ?>"/>
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
                           <form class="form-horizontal" method="post" action="<?php echo site_url('pemilik/hapus_data_pemilik'); ?>">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                             <h4 class="modal-title">Hapus Data pemilik</h4>
                           </div>
                           <div class="modal-body">
                             <input type="hidden" class="form-control" name="id_pemilik" value="<?php echo $row->id_pemilik; ?>">
                              <p>Apakah anda yakin akan menghapus data pemilik ini? : <?php echo $row->nama_pemilik; ?></p>
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

                                         <div class='modal hide fade' id='tambahpemilik' role='dialog' tabindex='-2'>
                <div class='modal-header'>
                    <button class='close' data-dismiss='modal' type='button'>&times;</button>
                    <h3>Tambah pemilik</h3>
                </div>
                <div class='modal-body'>
<form action="<?php echo site_url('pemilik/simpan_data_pemilik');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />

                                 <div class="control-group">
                                                            <label class="control-label">Nama pemilik</label>
                                                            <div class="controls">
                                                                <input type="text" name="nama_pemilik" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal" data-original-title="Nama Sektor" />
                                                            </div>
                                                            </div>
                                                             
                                    <div class="control-group">
                                                            <label class="control-label">Nama pemilik (Bahasa Taiwan)</label>
                                                            <div class="controls">
                                                                <input type="text" name="negara" class="span10 popovers" data-trigger="hover" data-content="Isi sesuai nama misal : Male Formal, Female Formal Dalam Bahasa Taiwan" data-original-title="Nama Sektor (Bahsa Taiwan)" />
                                                            </div>
                                                            </div>
                                                          
                <div class='modal-footer'>
                    <button class='btn' data-dismiss='modal'>Close</button>
                    <button class='btn btn-primary'>Save changes</button>
                </div>
                                                    </form>

            </div>
            </div>
                      