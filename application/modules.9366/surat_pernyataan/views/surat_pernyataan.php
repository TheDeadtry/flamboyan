<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Surat pernyataan Ahli Waris <strong>Banyuwangi</strong></span>
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
                    <li class='active'>Print Surat pernyataan Ahli Waris (Banyuwangi)</li>
                </ul>
            </div>
        </div>
    </div>
</div>


                            <div class='row-fluid'>
                            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                            <div class='box-header blue-background'>
                            	<div class='title'>Data TKI</div>
                                <div class='actions'>
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
                                            <th>Nama Lengkap</th>
                                            <th colspan="2">Tempat & Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Nama Orang Tua / Wali</th>
                                            <th colspan="2">Tempat & Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->tgllahir;?></td>
                                            <td><?php echo $row->alamatlengkap;?></td>
                                            <td><?php echo $row->nama_bapak;?></td>
                                            <td><?php echo $row->tempat;?></td>
                                            <td><?php echo $row->tgl;?></td>
                                            <td><?php echo $row->alamat2;?></td>
                                            <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>printdata/cetak1/<?php echo $row->id_pernyataan;?>"  class="btn btn-warning">Print</a></td>                                           
                                            
                                        </tr>

                                        </tbody>
                                            
                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_pernyataan/edit_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	<input type="hidden" class="form-control" name="id_pernyataan" value="<?php echo $row->id_pernyataan; ?>">
                                            <div class="control-group">
                                                <label class="control-label">Nama TKI</label>
                                                <div class="controls">
                                                    			 <select class="span10 popovers" name="id_tki" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_personal;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nama Ahli Waris</label>
                                                        <div class="controls">
                                                    			 <select class="span10 popovers" name="id_keluarga" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_ahli as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_family;?>"><?php echo $row1->nama_bapak;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tempat Lahir</label>
                                                      <div class="controls">
                                                        <input type="text" name="tempat" class="span10 popovers"  value="<?php echo $row->id_family;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tanggal Lahir</label>
                                                      <div class="controls">
                                                        <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium span10 popovers' data-format='yyyy.MM.dd' name="tgl"  value="<?php echo $row->tgl;?>" type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Alamat</label>
                                                      <div class="controls">
                                                        <input type="text" name="alamat2" class="span10 popovers"  value="<?php echo $row->alamat2;?>" class="form-control" required>
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
                                            	<form action="<?php echo site_url('surat_pernyataan/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                  <input type="hidden" class="form-control" name="id_pernyataan" value="<?php echo $row->id_pernyataan; ?>">
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
                                                <form action="<?php echo site_url('surat_pernyataan/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	
                                            <div class="control-group">
                                                <label class="control-label">Nama TKI</label>
                                                <div class="controls">
                                                    			 <select  class="span10 popovers"  name="id_tki" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_personal;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nama Ahli Waris</label>
                                                        <div class="controls">
                                                    			 <select class="span10 popovers"  name="id_keluarga" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_ahli as $row2) { ?>
                                                                              <option value="<?php echo $row2->id_family;?>"><?php echo $row2->nama_bapak;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tempat Lahir</label>
                                                      <div class="controls">
                                                        <input type="text" name="tempat" class="span10 popovers"  placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tanggal Lahir</label>
                                                      <div class="controls">
                                                        <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium span10 popovers' data-format='yyyy.MM.dd' name="tgl"  placeholder="Berisi Data Surat" type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Alamat</label>
                                                      <div class="controls">
                                                        <input type="text" name="alamat2" class="span10 popovers"  placeholder="Berisi Data Surat" class="form-control" required>
                                                      </div>
                                                    </div>
                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>