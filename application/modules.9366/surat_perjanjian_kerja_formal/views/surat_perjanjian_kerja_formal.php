<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <h3><span>SURAT NOTARISAN KELUARGA <strong>( formal )</strong></span></h3>
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
                    <li class='active'>Print Surat Perjanjian Penempatan <code class="text-danger">formal</code></li>
                </ul>
            </div>
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
                                            <th>Nama Agen Taiwan</th>
                                            <th>Nama Majikan</th>
                                            <th>No Pendaftaran TKI</th>
                                            
                                            <th>No Id TKI</th>
                                            <th>Nama Tki</th>
                                            <th>Jabatan</th>
                                            <th>Alamat</th>
                                            <th>No Paspor</th>
                                            <th>Tgl Pengeluaran Paspor</th>
                                            <th>Tempat Pengeluaran</th>
                                            <th>Tgl Lahir </th>
                                            <th>Tempat Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status Perkawinan</th>
                                            <th>Jumlah anak dibawah umur 18 tahun dan belum menikah</th>
                                            <th>Nama ahli waris</th>
                                            <th>Nama Kontak Darurat</th>
                                            <th>Alamat</th>
                                            <th>Telepon Kontak Darurat</th>
                                            <th>Hubungan Kontak Darurat</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama_agen;?></td>
                                            <td><?php echo $row->namamajikan;?></td>
                                            <td><?php echo $row->id_biodata;?></td>
                                            <td><?php echo $row->nodisnaker;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->jabatan;?></td>
                                            <td><?php echo $row->alamat;?></td>
                                            <td><?php echo $row->nopaspor;?></td>
                                            <td><?php echo $row->tglterima;?></td>
                                            <td><?php echo $row->office;?></td>
                                            <td><?php echo $row->tanggallahir;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->jeniskelamin;?></td>
                                            <td><?php echo $row->status;?></td>
                                            <td><?php echo $row->jumlah_anak;?></td>
                                            <td><?php echo $row->namaahli;?></td>
                                            <td><?php echo $row->namakontak;?></td>
                                            <td><?php echo $row->alamatkontak;?></td>
                                            <td><?php echo $row->telpkontak;?></td>
                                            <td><?php echo $row->hubkontak;?></td>
                                            <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-primary">Edit</a>
                                            	<a href="#hapus<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-danger">Hapus</a></td>
                                            
                                            <td><a href="<?php echo base_url(); ?>tambah2/cetak/<?php echo $row->id_biodata;?>" class="btn btn-warning">Print</a></td>                                           
                                            
                                        </tr>
                                        
                                            
                                             <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_perjanjian_kerja_formal/edit_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	<input type="hidden" class="form-control" name="id_surat_perjanjian_kerja" value="<?php echo $row->id_surat_perjanjian_kerja; ?>">
                                          
                                            <div class="control-group">
                                                <label class="control-label">Nama TKI</label>
                                                <div class="controls">
                                                    			 <select class="span10 popovers" name="id_biodata" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_biodata;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah anak umur dibbawah 18 tahun dan belum menikah</label>
                                                      <div class="controls">
                                                        <input type="text" name="jumlah_anak"  class="span6 popovers" value="<?php echo $row->jumlah_anak;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                        
                                            </div>
                                            </div>
                                            
                                             <div id="hapus<?php echo $no; ?>" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Hapus Data</h3></div>
                                            <div class="modal-body">
                                            	<form action="<?php echo site_url('surat_perjanjian_kerja_formal/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                 <input type="hidden" class="form-control" name="id_surat_perjanjian_kerja" value="<?php echo $row->id_surat_perjanjian_kerja; ?>">
                                          
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
                                
                                 <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_perjanjian_kerja_formal/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	
                                            <div class="control-group">
                                                <label class="control-label">Nama TKI</label>
                                                <div class="controls">
                                                    			 <select  class="span10 popovers"  name="id_biodata" tabindex="1" required>
                                        
                                                                                <?php foreach ($tampil_data_tki as $row1) { ?>
                                                                              <option value="<?php echo $row1->id_biodata;?>"><?php echo $row1->nama;?></option>
                                                              <?php }?>
                                                                          </select>
                                                  			</div>
                                         			</div>
                                                     <div class="control-group">
                                                        <label class="control-label">Jumlah anak umur dibawah 18 tahun dan belum menikah</label>
                                                      <div class="controls">
                                                        <input type="text" name="jumlah_anak"  class="span6 popovers" placeholder="Berisi Jumlah Anak" class="form-control" required>
                                                      </div>
                                                    </div>
                                                  </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div>
                                                </form>
                                            </div>