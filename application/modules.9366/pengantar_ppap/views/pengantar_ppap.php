<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Surat Pengajuan E KTKLN FGJ SURABAYA</strong></span>
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
                    <li class='active'>Print Surat Pengajuan E KTKLN FGJ SURABAYA</li>
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
                                            <th>Jumlah TKI</th>
                                            <th>Nomor Surat</th>
                                            <th>Tanggal Akhir Pembekalan</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) { ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->tki_2;?></td>
                                            <td><?php echo $row->nomor_2;?></td>
                                            <td><?php echo $row->tanggal_2;?></td>
                                            <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><a href="<?php echo base_url(); ?>printdata/cetak14/<?php echo $row->id_ppap;?>"  class="btn btn-warning">Print</a></td>                                           
                                            
                                        </tr>
                                        </tbody>
                                            
                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Tambah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('pengantar_ppap/edit_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	<input type="hidden" class="form-control" name="id_ppap" value="<?php echo $row->id_ppap; ?>">
                                           
                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah TKI</label>
                                                      <div class="controls">
                                                        <input type="text" name="tki_2" class="span10 popovers"  value="<?php echo $row->tki_2;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nomor Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor_2" class="span10 popovers"  value="<?php echo $row->nomor_2;?>" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tanggal Akhir Pemberangkatan</label>
                                                      <div class="controls">
                                                        <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium span10 popovers' data-format='yyyy.MM.dd' name="tanggal_2" value="<?php echo $row->tanggal_2;?>" type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
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
                                            
                                            <div id="hapus<?php echo $no; ?>" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Hapus Data</h3></div>
                                            <div class="modal-body">
                                            	<form action="<?php echo site_url('pengantar_ppap/hapus_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                  <input type="hidden" class="form-control" name="id_ppap" value="<?php echo $row->id_ppap; ?>">
                                                    <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->tki_2; ?></code> ?</p>
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
                                                <form action="<?php echo site_url('pengantar_ppap/simpan_data_surat');?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                            	
                                           
                                                    <div class="control-group">
                                                        <label class="control-label">Jumlah TKI</label>
                                                      <div class="controls">
                                                        <input type="text" name="tki_2" class="span10 popovers"  placeholder="Isikan Data" class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Nomor Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor_2" class="span10 popovers"  placeholder="Isikan Data"  class="form-control" required>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tanggal Akhir Pemberangkatan</label>
                                                      <div class="controls">
                                                        <div class='datepicker input-append' id='datepicker'>
                                                          <input class='input-medium span10 popovers' data-format='yyyy.MM.dd' name="tanggal_2" placeholder="Tanggal Akhir Pemberangkatan" type='text' />
                                                        <span class='add-on'>
                                                            <i data-date-icon='icon-calendar' data-time-icon='icon-time'></i>
                                                         </span>
                                                                   </div>
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