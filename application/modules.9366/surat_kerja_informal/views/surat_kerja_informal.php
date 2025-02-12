<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>SURAT PERJANJIAN KERJA <strong>Informal</strong></span>
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
                    <li class='active'>Print Surat kerja Ahli Waris (Banyuwangi)</li>
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
                                 	 <a href="<?php echo site_url().'/dashboard_surat_kerja'; ?>" role="button" class="btn btn-danger" data-toggle="modal">Kembali</a>
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
                                            
                                            <th>Nama Majikan</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            
                                            <th>Nama TKI</th>
                                            <th>Alamat di Indonesia</th>
                                            <th colspan="2">Tempat & Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Perkawinan</th>
                                            <th>Jumlah Anak > 18 Tahun</th>
                                            
                                            <th>Nama Ahli Waris</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Hubungan</th>
                                            
                                            <th>Opsi</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            
                                            <td><?php echo $row->namanya;?></td>
                                            <td><?php echo $row->alamatnya;?></td>
                                            <td><?php echo $row->hpnya;?></td>
                                            
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->alamat;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->tgllahir;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
                                            <td><?php echo $row->status;?></td>
                                            <td><?php echo $row->jmanak;?></td>
                                            
                                            <td><?php echo $row->nama_bapak;?></td>
                                            <td><?php echo $row->alamat2;?></td>
                                            <td><?php echo $row->hp2;?></td>
                                            <td><?php echo $row->hubungan2;?></td>
                                            <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>printdata/cetak8/<?php echo $row->id_kerja;?>"  class="btn btn-warning">Print</a></td>                                           
                                            
                                        </tr>

                                        </tbody>
                                            
                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_kerja_informal/edit_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	<input type="hidden" class="form-control" name="id_kerja" value="<?php echo $row->id_kerja; ?>">
                                            <div class="control-group">
                                                <label class="control-label">Nama Majikan</label>
                                                <div class="controls">
                                                    			 <select  class="span10 popovers"  name="id_majikan" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_majikan as $row0) { ?>
                                                                              <option value="<?php echo $row0->id_majikan;?>"><?php echo $row0->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                     <div class="control-group">
                                                                <label class="controls">------------------------------------------------------------------</label>
                                                            </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nama TKI</label>
                                                        <div class="controls">
                                                    			 <select class="span10 popovers"  name="id_tki" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_personal;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">No Paspor</label>
                                                      <div class="controls">
                                                        <input type="text" name="nopass"  class="span10 popovers" value="<?php echo $row->nopass;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah Anak <code class="text-danger">JUMLAH ANAK DIBAWAH 18TH</code></label>
                                                      <div class="controls">
                                                        <input type="text" name="jmanak" class="span10 popovers"  value="<?php echo $row->jmanak;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                     <div class="control-group">
                                                                <label class="controls">------------------------------------------------------------------</label>
                                                            </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nama Ahli Waris</label>
                                                        <div class="controls">
                                                    			 <select class="span10 popovers"  name="id_keluarga" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_ahli as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_family;?>"><?php echo $row1->nama_bapak;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">Alamat</label>
                                                      <div class="controls">
                                                        <input type="text" name="alamat2"  class="span10 popovers" value="<?php echo $row->alamat2;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">No Telepon</label>
                                                      <div class="controls">
                                                        <input type="text" name="hp2"  class="span10 popovers" value="<?php echo $row->hp2;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Hubungan</label>
                                                      <div class="controls">
                                                        <input type="text" name="hubungan2" class="span10 popovers"  value="<?php echo $row->hubungan2;?>" class="form-control" required>
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
                                            	<form action="<?php echo site_url('surat_kerja_informal/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                  <input type="hidden" class="form-control" name="id_kerja" value="<?php echo $row->id_kerja; ?>">
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
                                                <form action="<?php echo site_url('surat_kerja_informal/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	
                                                <div class="control-group">
                                                <label class="control-label">Nama Majikan</label>
                                                <div class="controls">
                                                    			 <select class="span10 popovers"  name="id_majikan" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_majikan as $row0) { ?>
                                                                              <option value="<?php echo $row0->id_majikan;?>"><?php echo $row0->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                     <div class="control-group">
                                                                <label class="controls">------------------------------------------------------------------</label>
                                                            </div>
                                                            
                                                    <code class="text-danger">Data TKI</code>
                                                    <div class="control-group">
                                                        <label class="control-label">Nama TKI</label>
                                                        <div class="controls">
                                                    			 <select class="span10 popovers"  name="id_tki" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_personal;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">No Paspor</label>
                                                      <div class="controls">
                                                        <input type="text" name="nopass" class="span10 popovers"  placeholder="Berisi Data" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah Anak <code align="center" class="text-danger">JUMLAH ANAK DIBAWAH 18TH</code></label>
                                                      <div class="controls">
                                                        <input type="text" name="jmanak" class="span10 popovers"  placeholder="Berisi Data" class="form-control" required>
                                                      </div>
                                                    </div>
                                                     <div class="control-group">
                                                                <label class="controls">------------------------------------------------------------------</label>
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
                                                        <label class="control-label">Alamat</label>
                                                      <div class="controls">
                                                        <input type="text" name="alamat2" class="span10 popovers"  placeholder="Berisi Data" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">No Telepon</label>
                                                      <div class="controls">
                                                        <input type="text" name="hp2" class="span10 popovers"  placeholder="Berisi Data" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Hubungan</label>
                                                      <div class="controls">
                                                        <input type="text" name="hubungan2" class="span10 popovers"  placeholder="Berisi Data" class="form-control" required>
                                                      </div>
                                                    </div>
                                           	</div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>