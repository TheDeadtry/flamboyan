<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-star'></i>
                <span>Print Surat Rekomendasi Paspor</span>
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
                    <li class='active'>Print Surat Rekomendasi Paspor</li>
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
                                            <th>No.</th>
                                            <th>Opsi</th>
                                            <th>Print</th>
                                            <th>No. Dokumen</th>
                                            <th>Nama Lengkap</th>
                                            <th colspan="2">Tempat & Tanggal Lahir</th>
                                            <th>No. KTP</th>
                                            <th>Tempat Rekom</th>
                                            <th>Tempat Rekom</th>
                                            <th>Tanggal Dokumen</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; 
                                                foreach ($tampil_data_personal as $row) {
                                                    $namadww = "";
                                                    $btnprint = '<a href="'.base_url().'index.php/printdata/cetakpaspor/'.$row->id_pembuatan.'" 
                                                    target="_blank" class="btn btn-warning">Print Rekom Luar Malang</a>';
                                                    if ($row->kantorpaspor != 0)
                                                    {
                                                        $dww = $this->M_surat_rekom_paspor->tampil_data_kantorpaspor2($row->kantorpaspor);
                                                        $namadww = $dww->nama;
                                                        $btnprint = '<a href="'.base_url().'index.php/new_rekom_malang_baru/print_pdf/'.$row->id_pembuatan.'/2" 
                                                        target="_blank" class="btn btn-info">Print Rekom Luar Malang</a>';
                                                    }
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                             <td><a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-primary">Edit</a>
                                                <a href="#hapus<?php echo $no; ?>" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a></td>
                                            <td><?php echo $btnprint;?></td>
                                            <td><?php echo $row->nomor;?></td>
                                            <td><?php echo $row->nama;?></td>
                                            <td><?php echo $row->tempatlahir;?></td>
                                            <td><?php echo $row->tgllahir;?></td>
                                            <td><?php echo $row->noktp;?></td>
                                            <td><?php echo $row->tempat_rekom;?></td>
                                            <td><?php echo $namadww;?></td>
                                            <td><?php echo $row->tanggal;?></td>
                                                                                      
                                            
                                        </tr>

                                        

                                            <div id="myModal2<?php echo $no; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">ubah Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_paspor/edit_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                    		<input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan; ?>">
                                                    <div class="control-group">
                                                        <label class="control-label span4">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor"  class="span6 popovers"  value="<?php echo $row->nomor;?>" class="form-control" >
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4">Tempat Rekom (manual)</label>
                                                      <div class="controls">
                                                        <input type="text" name="tempat_rekom"  class="span6 popovers"  value="<?php echo $row->tempat_rekom;?>" class="form-control" >
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4">Tempat Rekom (dari setting)</label>
                                                      <div class="controls">
                                                        <select name="kantorpaspor" class="span6 popovers form-control" >
                                                            <option value="<?php echo $row->kantorpaspor; ?>"><?php echo $namadww; ?></option>
                                                        <?php
                                                                    foreach ($tampil_data_kantorpaspor as $rowz) { 
                                                            ?>
                                                            <option value="<?php echo $rowz->id_setting_kantorpaspor; ?>"><?php echo $rowz->nama; ?></option>
                                                            <?php } ?>
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
                                            
                                            <div id="hapus<?php echo $no; ?>" class="modal hide fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel1">Hapus Data</h3></div>
                                            <div class="modal-body">
                                                <form action="<?php echo site_url('surat_rekom_paspor/hapus_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
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
                                                <form action="<?php echo site_url('surat_rekom_paspor/simpan_data_surat_paspor/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                
                                                    <div class="control-group">
                                                        <label class="control-label">Nomer Surat</label>
                                                      <div class="controls">
                                                        <input type="text" name="nomor" class="span10 popovers" value="........./TKI/FGJ/...../......."placeholder="Berisi Data Surat" class="form-control" >
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label">Tempat Rekom (manual)</label>
                                                      <div class="controls">
                                                        <input type="text" name="tempat_rekom" class="span10 popovers" class="form-control" >
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label span4">Tempat Rekom (dari setting)</label>
                                                      <div class="controls">
                                                        <select name="kantorpaspor" class="span6 popovers form-control" >
                                                            <option></option>
                                                            <?php
                                                                    foreach ($tampil_data_kantorpaspor as $rowd) { ?>
                                                            <tr>
                                                            <option value="<?php echo $rowd->id_setting_kantorpaspor ?>"><?php echo $rowd->nama ?></option>
                                                            <?php } ?>
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