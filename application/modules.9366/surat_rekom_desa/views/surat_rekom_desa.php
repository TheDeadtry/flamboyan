
<div class="page-container">
    <div class="page-content">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h2> <span class="text-semibold">Print Surat Rekomendasi Ijin </span></h2>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-primary panel-bordered">

                        <div class="panel-heading">
                            <h5 class="panel-title text-center ">SURAT UNTUK <?php echo $id_bio;?> <br> </h5><br/>
                            <a href="<?php echo base_url()."index.php/detaildisnaker/"?>" role="button" class="btn bg-teal-400"> Kembali</a>
                            <a href="#myModal1" role="button" class="btn bg-teal-400" data-toggle="modal">Tambah Data</a>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class='table table-bordered table-striped' id="fixedeks">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Opsi</th>
                                        <th>Print</th>
                                        <th>Nomor Surat</th>
                                        <th>Lampiran</th>
                                        <th>Perihal</th>
                                        <th>Kepada</th>
                                        <th>Nama Lengkaps</th>
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
                                        <td>
                                            <a href="#myModal2<?php echo $no; ?>" role="button" data-toggle="modal" class="btn btn-primary">Edit</a>
                                            <a href="#hapus" role="button" data-toggle="modal"  class="btn btn-danger">Hapus</a>
                                        </td>
                                        <td><a href="<?php echo base_url(); ?>index.php/printdata/cetak_rekom_desa/<?php echo $row->id_pembuatan_desa;?>"  target="_blank" class="btn btn-warning">Print</a></td> 
                                        <td><?php echo $row->nomor;?></td>
                                        <td><?php echo $row->lampiran;?></td>
                                        <td><?php echo $row->perihal;?></td>
                                        <td><?php echo $row->kepada;?></td>
                                        <td><?php echo $row->nama;?></td>
                                        <td><?php echo $row->tempatlahir;?></td>
                                        <td><?php echo $row->tgllahir;?></td>
                                        <td><?php echo $row->jabatan;?></td>
                                        <td><?php echo $row->alamat;?></td>
                                                                                  
                                        
                                    </tr>

                                    <div id="myModal2<?php echo $no; ?>" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 id="myModalLabel1">Ubah Data</h3>
                                                </div>
                                                <form action="<?php echo site_url('surat_rekom_desa/edit_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                        
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan_desa; ?>">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-4">Nomer Surat</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="nomor"  class="form-control span10 popovers"  value="<?php echo $row->nomor;?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-4">Lampiran</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="lampiran" class="form-control span10 popovers"  value="<?php echo $row->lampiran;?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-4">Perihal</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="perihal" class="form-control span10 popovers" value="<?php echo $row->perihal;?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-4">Jabatan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" name="jabatan" class="form-control span10 popovers"  value="<?php echo $row->jabatan;?>" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-4"> Kepada </label>
                                                                <div class="col-sm-8">
                                                                    <select class="select-search" name="kepada">
                                                                         <option value="<?php echo $row->kepada;?>" /><?php echo $row->kepada;?>
                                                                        <?php  
                                                                            foreach ($tampil_data_namadesa as $pilihan) { 
                                                                        ?>
                                                                            <option value="<?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>" /><?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>
                                                                        <?php
                                                                            } 
                                                                        ?> 
                                                                    </select>
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
                                        
                                    <div id="hapus" class="modal fade" tabindex="-hapus" role="dialog" aria-labelledby="hapus" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h3 id="myModalLabel1">Hapus Data</h3>
                                                </div>
                                                <form action="<?php echo site_url('surat_rekom_desa/hapus_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="id_pembuatan" value="<?php echo $row->id_pembuatan_desa; ?>">
                                                        <p>Apakah anda yakin akan menghapus Data dari: <code class="text-danger"><?php echo $row->nama; ?></code> ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php 
                                        $no++;
                                        } 
                                    ?>

                                </tbody>
                            </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="myModal1" class="modal fade" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel1">Tambah Data</h3>
                        </div>
                        <form action="<?php echo site_url('surat_rekom_desa/simpan_data_surat/'.$id_bio);?>" enctype="multipart/form-data" method="post" class="form-horizontal" />
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-sm-4">Nomer Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nomor" class="form-control span10 popovers"  placeholder="Berisi Data Surat" required>
                                    </div>
                                </div>
                                                            
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Lampiran</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="lampiran" class="form-control span10 popovers"   value="-" placeholder="Berisi Data Surat" required>      <code class="text-danger">Ubah Jika berbeda</code>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Perihal</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="perihal" class="form-control span10 popovers"   value="Surat Rekomendasi Untuk Pembuatan Ijin"  placeholder="Berisi Data Surat" required>     <code class="text-danger">Ubah Jika berbeda</code>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-4">Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="jabatan"  class="form-control span10 popovers" value="Calon Tenaga Kerja Indonesia (CTKI)" required>      <code class="text-danger">Ubah Jika berbeda</code>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4"> Kepada </label>
                                    <div class="col-sm-8">
                                        <select class="select-search" name="kepada" data-placeholder="Choose a Category" tabindex="1">
                                            <?php  
                                                foreach ($tampil_data_namadesa as $pilihan) { 
                                            ?>
                                                <option value="<?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>" /><?php echo $pilihan->namadesa." <br>".$pilihan->alamatdesa;?>
                                            <?php
                                                } 
                                            ?> 
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



                <script type="text/javascript">
                    $('#fixedeks').dataTable();
                    $('.dewselect').select2();
                </script>