<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Print Surat Keabsahan</span>
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
                    <li class='active'>Print Surat Keabsahan</li>
                </ul>
            </div>
        </div>
    </div>
</div>


                            <div class='row-fluid'>
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
                                <div class='title'>SURAT UNTUK <?php echo $id_bio;?></div>
                                <div class='actions'>
                                    <a href="<?php echo base_url()."index.php/detaildisnaker/"?>" role="button" class="btn btn-success"> Kembali</a>
                           			 <a href="#myModal1" role="button" class="btn btn-success" data-toggle="modal">Tambah Data</a>
                                </div>
                            </div>
                            <div class='box-content box-no-padding'>
                            <div class='responsive-table'>
                            <div class='scrollable-area'>
                            <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
                                    <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                            <th>Nomor Surat</th>
                                            <th>Kepada</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/new_pdf_pp/keabsahan_akte_kelahiran/<?php echo $row->id_biodata.'/'.$row->id_pembuatan;?>"  target="_blank" class="btn btn-warning">Print Keabsahan Akte Kelahiran</a><br>
                                            <a href="<?php echo base_url(); ?>index.php/new_pdf_pp/keabsahan_nik_ktp/<?php echo $row->id_biodata.'/'.$row->id_pembuatan;?>"  target="_blank" class="btn btn-warning">Print Keabsahan NIK KTP</a></td>
                                            
                                            <td><?php echo $row->daerah;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                            <td><?php echo $row->nomor;?></td>
                                            <td><?php echo $row->kepada;?></td>
                                                                                      
                                            
                                        </tr>

                                        

                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_keabsahan/edit_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                    		<input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                        
                                                        <div class="control-group">
                                                        <label class="control-label span4">Daerah</label>
                                                      <div class="controls">
                                                        <input type="text" name="daerah" value="<?php echo $row->daerah; ?>"class="span6 popovers"  placeholder="Berisi Data Surat" class="form-control" >
                                                      </div>

                                                    </div>
                                                        <div class="control-group">
                                                                <label class="control-label span4"> Tanggal Dokumen </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='dd-MM-yyyy'  name="tanggal"  value="<?php echo $row->tanggal; ?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                       <code class="text-danger">Ubah Jika berbeda</code>
                                                                </div>
                                                            </div>

                                                    <div class="control-group">
                                                        <label class="control-label span4">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor"  class="span6 popovers"  value="<?php echo $row->nomor;?>" class="form-control" >
                                                      </div>
                                                    </div>
                                                    

                                                    <div class="control-group">
                                                                <label class="control-label"> Kepada </label>
                                                                <div class="controls">
                                                        <input type="text" name="kepada" class="span10 popovers" value="<?php echo $row->kepada;?>" placeholder="Kepada" class="form-control" >
                                                                </div>
                                                            </div>



                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                            </div>
                                            
                                            <div id="hapus" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Hapus Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_keabsahan/hapus_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                  <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                    <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->nama; ?></code> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>

                                        <?php $no++;
                                        } ?>

                                        </tbody>
                                </table>    
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
 <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_keabsahan/simpan_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                <div class="control-group">
                                                        <label class="control-label">Daerah</label>
                                                      <div class="controls">
                                                        <input type="text" name="daerah" value="Malang" class="span10 popovers"  placeholder="Berisi Daerah Cetak Surat (Ubah jika Berbeda)" class="form-control" >
                                                      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>
                                                <div class="control-group">
                                                                <label class="control-label span4"> Tanggal Dokumen </label>
                                                                <div class="controls">
                                                                    <div class='datepicker input-append' id='datepicker'>
              <input class='input-medium' data-format='dd-MM-yyyy'  name="tanggal"  value="<?php echo date("d-m-Y")?>" placeholder='Select datepicker' type='text' />
            <span class='add-on'>
                <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
             </span>
                       </div>
                       <code class="text-danger">Ubah Jika berbeda</code>
                                                                </div>
                                                            </div>
                                                     
                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor" class="span10 popovers" value="........./TKI/FGJ/...../......."placeholder="Berisi Data Surat" class="form-control" >
                                                      </div>
                                                    </div>
                                                    

                                                    <div class="control-group">
                                                                <label class="control-label"> Kepada </label>
                                                                <div class="controls">
                                                        <input type="text" name="kepada" class="span10 popovers" value="DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL KAB. BLITAR" placeholder="Kepada" class="form-control" >
                                                                </div>
                                                            </div>


                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
