<div class='row-fluid'>
  <div class='span12'>
    <div class='page-header'>
      <h1 class='pull-left'> <i class='icon-star'></i> <span>Data Biodata</span> </h1>
      <div class='pull-right'>
        <ul class='breadcrumb'>
          <li> <a href="<?php echo site_url().'/dashboard'; ?>"><i class='icon-bar-chart'></i> </a> </li>
          <li class='separator'> <i class='icon-angle-right'></i> </li>
          <li class='active'>Print </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class='row-fluid'>
  <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
    <div class='box-header orange-background'>
      <div class='title'>Data TKI</div>
      <div class='actions'>
      <a href="#myModal1" role="button" class="btn btn-primary" data-toggle="modal">Tambah Data</a> </div>
    </div>
    <div class='box-content box-no-padding'>
      <div class='responsive-table'>
        <div class='scrollable-area'>
          <table class='data-table table table-bordered table-striped' style='margin-bottom:0;'>
            <thead>
              <tr align="center">
                                            <th rowspan="2">#</th>
                                            <th colspan="6">Data Keluarga</th>
                                            <th colspan="7">Data TKI</th>
                                            <th rowspan="2" colspan="2">Opsi</th>
                                            <th rowspan="2">Print</th>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>No. KTP / SIM</th>
                                            <th colspan="2">Tempat/Tanggal lahir</th>
                                            <th>Alamat</th>
                                            <th>Mengijinkan Kepada</th>
                                            <th>Nama</th>
                                            <th colspan="2">Tempat/Tanggal lahir</th>
                                            <th>NO. Paspor</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>Sebagai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                        	<td><?php echo $no?></td>      
                                            <td><?php echo $row->nama_bapak;?></td> 
                                            <td><?php echo $row->noktp;?></td> 
                                            <td><?php echo $row->tmp;?></td>     
                                            <td><?php echo $row->tgl;?></td>   
                                            <td><?php echo $row->alamat2;?></td>     
                                            <td><?php echo $row->nama;?></td>  
                                            <td><?php echo $row->nama;?></td>      
                                            <td><?php echo $row->tempatlahir;?></td>     
                                            <td><?php echo $row->tgllahir;?></td>  
                                            <td><?php echo $row->nopass;?></td>     
                                            <td><?php echo $row->alamat;?></td> 
                                            <td><?php echo $row->tujuan;?></td> 
                                            <td><?php echo $row->sebagai;?></td>      
                                            <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal">Edit</a></td>
                							<td><a href="#hapus" role="button" data-toggle="modal">Hapus</a></td>                           
                                            <td><a href="<?php echo base_url(); ?>printdata/cetak5/<?php echo $row->id_surat;?>">Print</a></td>                                           
                                            
                                        </tr>
                                     <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel1">Edit Data</h3>
                                      </div>
                                      <div class="modal-body" >
                                        <form action="<?php echo site_url('surat_ijin_keluarga_banyuwangi/edit_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                        
                                        <input type="hidden" class="form-control" name="id_surat" value="<?php echo $row->id_surat; ?>">
                                        <div class="control-group">
                                          <label class="control-label">Nama Keluarga</label>
                                          <div class="controls">
                                            <select  class="span10 popovers" name="id_keluarga" class="form-control select-search">
                                              <?php foreach ($tampil_data_keluarga as $row3) { ?>
                                              <option value="<?php echo $row3->id_family;?>"><?php echo $row3->nama_bapak;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Nomer KTP / SIM</label>
                                          <div class="controls">
                                            <input type="text"  class="span10 popovers" name="noktp" value="<?php echo $row->noktp;?>" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Tempat Lahir</label>
                                          <div class="controls">
                                            <input type="text" class="span10 popovers"  name="tmp" value="<?php echo $row->tmp;?>" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Tanggal Lahir</label>
                                          <div class="controls">
                                            <div class='datepicker input-append' id='datepicker'>
                                                          <input  class="span10 popovers" class='input-medium' data-format='yyyy.MM.dd' name="tgl"  value="<?php echo $row->tgl;?>" type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Alamat</label>
                                          <div class="controls">
                                            <input type="text" class="span10 popovers"  name="alamat2" value="<?php echo $row->alamat2;?>" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Mengijinkan</label>
                                          <div class="controls">
                                            <select  class="span10 popovers" name="mengijinkan" class="form-control select-search">
                                             <?php foreach ($tampil_data_tki as $row2) { ?>
                                              <option value="<?php echo $row2->id_personal;?>"><?php echo $row2->nama;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label">Nama TKI</label>
                                          <div class="controls">
                                            <select class="span10 popovers"  name="id_tki" class="form-control select-search">
                                              <?php foreach ($tampil_data_tki as $row2) { ?>
                                              <option value="<?php echo $row2->id_personal;?>"><?php echo $row2->nama;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">No Paspor</label>
                                          <div class="controls">
                                            <input  class="span10 popovers" type="text" name="nopass" value="<?php echo $row->nopass;?>" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Sebagai</label>
                                          <div class="controls">
                                            <input class="span10 popovers"  type="text" name="sebagai" value="<?php echo $row->sebagai;?>" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Tujuan</label>
                                          <div class="controls">
                                            <input  class="span10 popovers" type="text" name="tujuan" value="<?php echo $row->tujuan;?>" class="form-control" required>
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
                                        <h3 id="myModalLabel1">Hapus Data</h3>
                                      </div>
                                      <div class="modal-body">
                                        <form action="<?php echo site_url('surat_ijin_keluarga_banyuwangi/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                        
                                        <input type="hidden" class="form-control" name="id_surat" value="<?php echo $row->id_surat; ?>">
                                        <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->nama; ?></code> ?</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button class="btn btn-primary">Hapus</button>
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
                        
                                   <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h3 id="myModalLabel1">Modal Header</h3>
                                      </div>
                                      <div class="modal-body" >
                                        <form action="<?php echo site_url('surat_ijin_keluarga_banyuwangi/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                        
                                      
                                        <div class="control-group">
                                          <label class="control-label">Nama Keluarga</label>
                                          <div class="controls">
                                            <select  class="span10 popovers" name="id_keluarga" class="form-control select-search">
                                              <?php foreach ($tampil_data_keluarga as $row3) { ?>
                                              <option value="<?php echo $row3->id_family;?>"><?php echo $row3->nama_bapak;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Nomer KTP / SIM</label>
                                          <div class="controls">
                                            <input type="text"  class="span10 popovers" name="noktp" placeholder="Berisi Nomer KTP / SIM" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Tempat Lahir</label>
                                          <div class="controls">
                                            <input type="text"  class="span10 popovers" name="tmp" placeholder="Berisi Nomer KTP / SIM" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Tanggal Lahir</label>
                                          <div class="controls">
                                            <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium' data-format='yyyy.MM.dd' name="tgl"  placeholder="Berisi Data Surat" type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Alamat</label>
                                          <div class="controls">
                                            <input type="text"  class="span10 popovers" name="alamat2" placeholder="Berisi Nomer KTP / SIM" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Mengijinkan</label>
                                          <div class="controls">
                                            <select class="span10 popovers"  name="mengijinkan" class="form-control select-search">
                                             <?php foreach ($tampil_data_tki as $row2) { ?>
                                              <option value="<?php echo $row2->id_personal;?>"><?php echo $row2->nama;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label">Nama TKI</label>
                                          <div class="controls">
                                            <select class="span10 popovers"  name="id_tki" class="form-control select-search">
                                              <?php foreach ($tampil_data_tki as $row2) { ?>
                                              <option value="<?php echo $row2->id_personal;?>"><?php echo $row2->nama;?></option>
                                              <?php }?>
                                            </select>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">No Paspor</label>
                                          <div class="controls">
                                            <input class="span10 popovers"  type="text" name="nopass" placeholder="Berisi Nomer KTP / SIM" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Sebagai</label>
                                          <div class="controls">
                                            <input  class="span10 popovers" type="text" name="sebagai" placeholder="Berisi Nomer KTP / SIM" class="form-control" required>
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label">Tujuan</label>
                                          <div class="controls">
                                            <input class="span10 popovers"  type="text" name="tujuan" placeholder="Berisi Nomer KTP / SIM" class="form-control" required>
                                          </div>
                                        </div>
                                        
                                      </div>
                                      <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button class="btn btn-primary">Save</button>
                                      </div>
                                        </form>
                                      
                                    </div>