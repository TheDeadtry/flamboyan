<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Print Surat Rekomendasi Ijin</span>
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
                    <li class='active'>Print Surat Rekomendasi Ijin</li>
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
                                            <th>Kepada</th>
                                            <th>Kantor Imigrasi</th>
                                             <th>Tampilkan (dl06)</th>
                                            <th>Nama Lengkap</th>
                                            <th colspan="2">Tempat & Tanggal Lahir</th>
                                            <th>Jabatan</th>
                                            <th>Alamat</th>
                                            <th>Daerah</th>
                                            <th>Tanggal</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/printdata/cetak2/<?php echo $row->id_pembuatan;?>"  target="_blank" class="btn btn-warning">Print (DL03, DL 07)</a><br>
                                            <a href="<?php echo base_url(); ?>index.php/dl06/cetak/<?php echo $row->id_pembuatan;?>"  target="_blank" class="btn btn-warning">Print (DL 06)</a></td>
                                            <td><?php echo $row->nomor;?></td>
                                            <td><?php echo $row->lampiran;?></td>
                                            <td><?php echo $row->perihal;?></td>
                                            <td><?php echo $row->kepada;?></td>
                                             <td><?php echo $row->imigrasi;?></td>
                                            <td><?php echo $row->tampilkan;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->tgllahir;?></td>
                                            <td><?php echo $row->jabatan;?></td>
                                            <td><?php echo $row->alamat;?></td>
                                            <td><?php echo $row->daerah;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                                                                      
                                            
                                        </tr>

                                        

                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_ijin/edit_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                    		<input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                    <div class="control-group">
                                                        <label class="control-label span4">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor"  class="span6 popovers"  value="<?php echo $row->nomor;?>" class="form-control" >
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label span4">Lampiran</label>
                                                      <div class="controls">
                                                        <input type="text" name="lampiran" class="span6 popovers"  value="<?php echo $row->lampiran;?>" class="form-control" >
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label span4">Perihal</label>
                                                      <div class="controls">
                                                        <input type="text" name="perihal" class="span6 popovers" value="<?php echo $row->perihal;?>" class="form-control" >
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label span4">Jabatan</label>
                                                      <div class="controls">
                                                        <input type="text" name="jabatan" class="span6 popovers"  value="<?php echo $row->jabatan;?>" class="form-control" >
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                                <label class="control-label span4"> Kepada </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="kepada" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->kepada;?>" /><?php echo $row->kepada;?>
                                                                     <?php  foreach ($tampil_data_namadisnaker as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namadisnaker." <br>".$pilihan->alamatdisnaker;?>" /><?php echo $pilihan->namadisnaker." <br>".$pilihan->alamatdisnaker;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label span4"> Kantor Imigrasi </label>
                                                                <div class="controls">
                                                                    <select class="span7 " name="imigrasi" data-placeholder="Choose a Category" tabindex="1">
                                                                         <option value="<?php echo $row->imigrasi;?>" /><?php echo $row->imigrasi;?>
                                                                     <?php  foreach ($tampil_data_imigrasi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                        <label class="control-label span4">Daerah</label>
                                                      <div class="controls">
                                                        <input type="text" name="daerah" value="<?php echo $row->daerah; ?>"class="span6 popovers"  placeholder="Berisi Data Surat" class="form-control" >
                                                      </div>

                                                    </div>

                                                     <div class="control-group span12 ">
                                            <label class="control-label span4">Tampikan Nama Dan Alamat (khusus Dl06 )Di PRINT DATA?</label>
                                            <div class="controls">
                                                <select class="span6 " data-placeholder="Choose a Category" tabindex="1" name="tampilkan"  >
                                                     <option  value="<?php echo $row->tampilkan; ?>" /> <?php echo $row->tampilkan; ?>
                                                    <option value="Suami / Istri" />Suami / Istri
                                                    <option value="Ibu" />Orang Tua (Ibu)
                                                    <option value="Orang Tua" /> Orang Tua
                                                    <option value="wali" /> wali
                                                </select>
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
                                                <form action="<?php echo site_url('surat_rekom_ijin/hapus_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
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
                                                <form action="<?php echo site_url('surat_rekom_ijin/simpan_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                     
                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor" class="span10 popovers" value="........./TKI/FGJ/...../......."placeholder="Berisi Data Surat" class="form-control" >
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Lampiran</label>
                                                      <div class="controls">
                                                        <input type="text" name="lampiran" class="span10 popovers"   value="-" placeholder="Berisi Data Surat" class="form-control" >      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>

                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Perihal</label>
                                                      <div class="controls">
                                                        <input type="text" name="perihal" class="span10 popovers"   value="Surat Rekomendasi Untuk Pembuatan Ijin"  placeholder="Berisi Data Surat" class="form-control" >     <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="control-group">
                                                        <label class="control-label">Jabatan</label>
                                                      <div class="controls">
                                                        <input type="text" name="jabatan"  class="span10 popovers" value="Calon Tenaga Kerja Indonesia (CTKI)" class="form-control" >      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>
                                                    
                                                    <<!-- div class="control-group">
                                                        <label class="control-label">Kepada</label>
                                                      <div class="controls">
                                                        <input type="text" name="kepada" class="span10 popovers"  placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div> -->

                                                    <div class="control-group">
                                                                <label class="control-label"> Kepada </label>
                                                                <div class="controls">
                                                                    <select class="span9 " name="kepada" data-placeholder="Choose a Category" tabindex="1">
                                                                     <?php  foreach ($tampil_data_namadisnaker as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->namadisnaker." <br>".$pilihan->alamatdisnaker;?>" /><?php echo $pilihan->namadisnaker." <br>".$pilihan->alamatdisnaker;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                            <div class="control-group">
                                                                <label class="control-label"> Kantor Imigrasi </label>
                                                                <div class="controls">
                                                                    <select class="span9 " name="imigrasi" data-placeholder="Choose a Category" tabindex="1">
                                                                     <?php  foreach ($tampil_data_imigrasi as $pilihan) { ?>
                                                                        <option value="<?php echo $pilihan->isi;?>" /><?php echo $pilihan->isi;?>
                                                                         <?php
                                                                     } ?> 
                                                                        </select>
                                                                </div>
                                                            </div>

                                                             <div class="control-group">
                                                        <label class="control-label">Daerah</label>
                                                      <div class="controls">
                                                        <input type="text" name="daerah" value="Lawang" class="span10 popovers"  placeholder="Berisi Daerah Cetak Surat (Ubah jika Berbeda)" class="form-control" >
                                                      <code class="text-danger">Ubah Jika berbeda</code>
                                                      </div>
                                                    </div>

                                                    <div class="control-group span12 ">
                                            <label class="control-label span4">Tampikan Nama Dan Alamat (khusus Dl06 )Di PRINT DATA?</label>
                                            <div class="controls">
                                                <select class="span6 " data-placeholder="Choose a Category" tabindex="1" name="tampilkan"  >
                                                     <option  value="" />Pilih
                                                    <option value="Suami / Istri" />Suami / Istri
                                                    <option value="Orang Tua" /> Orang Tua
                                                    <option value="wali" /> wali
                                                </select>
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

                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>
