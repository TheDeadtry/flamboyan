<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Print Surat Rekomendasi SKCK</span>
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
                    <li class='active'>Print Surat Rekomendasi SKCK</li>
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
                                            <th>Lampiran</th>
                                            <th>Perihal</th>
                                            <th>POLDA</th>
                                            <th>POLSEK</th>
                                            <th>POLRES</th>
                                             <th>DESA</th>
                                            <th>Nama Lengkap</th>
                                            <th colspan="2">Tempat & Tanggal Lahir</th>
                                            <th>Jabatan</th>
                                            <th>Alamat</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/printdata/cetakskck/<?php echo $row->id_pembuatan;?>"  class="btn btn-warning">Print</a></td>
                                            <td><?php echo $row->nomor;?></td>
                                            <td><?php echo $row->lampiran;?></td>
                                            <td><?php echo $row->perihal;?></td>
                                            <td><?php echo $row->kepada1;?></td>
                                            <td><?php echo $row->kepada2;?></td>
                                            <td><?php echo $row->kepada3;?></td>
                                            <td><?php echo $row->kepada4;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->tgllahir;?></td>
                                            <td><?php echo $row->jabatan;?></td>
                                            <td><?php echo $row->alamat;?></td>
                                                                                      
                                            
                                        </tr>

                                        

                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Ubah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_skck/edit_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                    		<input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor"  class="span10 popovers"  value="<?php echo $row->nomor;?>" class="form-control" required>
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Lampiran</label>
                                                      <div class="controls">
                                                        <input type="text" name="lampiran" class="span10 popovers"  value="<?php echo $row->lampiran;?>" class="form-control" required>
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Perihal</label>
                                                      <div class="controls">
                                                        <input type="text" name="perihal" class="span10 popovers" value="<?php echo $row->perihal;?>" class="form-control" required>
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Jabatan</label>
                                                      <div class="controls">
                                                        <input type="text" name="jabatan" class="span10 popovers"  value="<?php echo $row->jabatan;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    
                                                    <code class="text-danger">PILIH SALAH SATU,POLDA SAJA,POLRES SAJA ATAU POLSEK SAJA,KOSONGI JIKA TIDAK DIPILIH</code>
                                                    <div class="control-group">
                                                                <label class="control-label"> Kepada (POLDA)</label>
                                                                <div class="controls">
                                                                    <select class="span7 js-example-basic-single" name="kepada1" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->kepada1;?>" /><?php echo $row->kepada1;?>
                                                                   <?php  foreach ($tampil_data_polda as $pilihan) { 
                                                                    ?>
                                                                        <option value="<?php echo $pilihan->namapolda." <br>".$pilihan->alamat;?>" /><?php echo $pilihan->namapolda." <br>".$pilihan->alamat;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Kepada (POLSEK)</label>
                                                                <div class="controls">
                                                                    <select class="span7 js-example-basic-single" name="kepada2" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->kepada2;?>" /><?php echo $row->kepada2;?>
                                                                   <?php  foreach ($tampil_data_polsek as $pilihan) { 
                                                                    ?>
                                                                        <option value="<?php echo $pilihan->namapolsek." <br>".$pilihan->alamat;?>" /><?php echo $pilihan->namapolsek." <br>".$pilihan->alamat;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Kepada (POLRES)</label>
                                                                <div class="controls">
                                                                    <select class="span7 js-example-basic-single" name="kepada3" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->kepada3;?>" /><?php echo $row->kepada3;?>
                                                                   <?php  foreach ($tampil_data_polres as $pilihan) {                                                               
                                                                    ?>
                                                                        <option value="<?php echo $pilihan->namapolres." <br>".$pilihan->alamat;?>" /><?php echo $pilihan->namapolres." <br>".$pilihan->alamat;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Kepada (DESA)</label>
                                                                <div class="controls">
                                                                  <select class="span7 js-example-basic-single" name="kepada4" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->kepada4;?>" /><?php echo $row->kepada4;?>
                                                                     <?php  foreach ($tampil_data_namadesa as $pilihan) { 
                                                                    ?>
                                                                        <option value="<?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>" /><?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
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
                                                <form action="<?php echo site_url('surat_rekom_skck/hapus_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
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
 <div id="myModal1" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_skck/simpan_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                     
                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor" class="span10 popovers"  placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Lampiran</label>
                                                      <div class="controls">
                                                        <input type="text" name="lampiran" class="span10 popovers"   value="-" placeholder="Berisi Data Surat" class="form-control" required>      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Perihal</label>
                                                      <div class="controls">
                                                        <input type="text" name="perihal" class="span10 popovers"   value="Surat Rekomendasi Untuk Pembuatan SKCK"  placeholder="Berisi Data Surat" class="form-control" required>     <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Jabatan</label>
                                                      <div class="controls">
                                                        <input type="text" name="jabatan"  class="span10 popovers" value="Calon Tenaga Kerja Indonesia (CTKI)" class="form-control" required>      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>
                                                    
                                                    <!-- div class="control-group">
                                                        <label class="control-label">Kepada</label>
                                                      <div class="controls">
                                                        <input type="text" name="kepada" class="span10 popovers"  placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div> -->
 <code class="text-danger">PILIH SALAH SATU,POLDA SAJA,POLRES SAJA ATAU POLSEK SAJA,KOSONGI JIKA TIDAK DIPILIH</code>
                                                    <div class="control-group">
                                                                <label class="control-label"> Kepada (POLDA)</label>
                                                                <div class="controls">
                                                                    <select class="span7 js-example-basic-single" name="kepada1" data-placeholder="Choose a Category" tabindex="1" id="kkk1">
                                                                         <option value="" />
                                                                   <?php  foreach ($tampil_data_polda as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namapolda." <br>".$pilihan->alamat;?>" /><?php echo $pilihan->namapolda." <br>".$pilihan->alamat;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Kepada (POLSEK)</label>
                                                                <div class="controls">
                                                                    <select class="span7 js-example-basic-single" name="kepada2" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="" />
                                                                   <?php  foreach ($tampil_data_polsek as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namapolsek." <br>".$pilihan->alamat;?>" /><?php echo $pilihan->namapolsek." <br>".$pilihan->alamat;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Kepada (POLRES)</label>
                                                                <div class="controls">
                                                                    <select class="span7 js-example-basic-single" name="kepada3" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="" />
                                                                   <?php  foreach ($tampil_data_polres as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namapolres." <br>".$pilihan->alamat;?>" /><?php echo $pilihan->namapolres." <br>".$pilihan->alamat;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label"> Kepada (DESA)</label>
                                                                <div class="controls">
                                                                   <select class="span7 js-example-basic-single" name="kepada4" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="" />
                                                                     <?php  foreach ($tampil_data_namadesa as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>" /><?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                       
                                                                </div>
                                                            </div>

                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>