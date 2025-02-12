    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">Detail Personal</span> - BLK</h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="index.html">Personal BLK</a></li>
                    <li><a href="user_pages_profile.html">Detail Personal</a></li>
                </ul>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-user"></i><span>Detail Personal</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Toolbar -->
                
                <!-- /toolbar -->


                <!-- User profile -->
            <div class="row">
            <div class="col-lg-9">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">PEMBINAAN BLK</h5>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    

                    

                        <div class="panel-group" id="accordion-styled">
                            <div class="panel">
                                <div class="panel-heading bg-danger">
                                    <h6 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">DATA KB (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA JENIS KB</button>
                                       <table class="table datatable-basic table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>JENIS KB</th>
                                <th>TANGGAL SUNTIK</th>
                                <th>KB SUNTIK(BULAN)</th>
                                <th>MASA KADALUWARSA</th>
                                <th>BLK</th>
                                <th>KETERANGAN</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_kb as $row) { ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->kode_jenis_kb;?> <?php echo $row->ket_kb;?></td>
                                <td><?php echo $row->tgl_suntik;?></td>
                                <td><?php echo $row->kb_suntik;?></td>
                                <td><?php echo $row->masa_kadaluwarsa;?></td>
                                <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ketnya;?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i></button> 
                                    </td> 
                            </tr>
                        <!-- UPDATE jenis_kb TKI -->
                            <div id="edit<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update KB <?php echo $idbio; ?></h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_kb'); ?>" class="form-horizontal" method="post">                                        
                                            <input type="hidden" class="form-control" name="id_kb" value="<?php echo $row->id_kb; ?>">
                                            <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Kode Jenis KB </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="id_jenis_kb" >
                                                                <option value="<?php echo $row->id_jenis_kb;?>"><?php echo $row->kode_jenis_kb." <br>".$row->ket;?></option>
                                                                <?php  foreach ($tampil_data_Jenis_kb as $pilihan) { ?>
                                                                <option value="<?php echo $pilihan->id_jenis_kb;?>" /><?php echo $pilihan->kode_jenis_kb." <br>".$pilihan->ket;?>
                                                                <?php   } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Suntik </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Tanggal Suntik" class="form-control" name="tgl_suntik" data-format='yyyy.MM.dd' value="<?php echo $row->tgl_suntik;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">KB Suntik</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="KB Suntik" class="form-control" name="kb_suntik" value="<?php echo $row->kb_suntik;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Masa Kadaluwarsa</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Masa Kadaluwarsa" class="form-control" name="masa_kadaluwarsa" value="<?php echo $row->masa_kadaluwarsa;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> BLK </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="id_instruktur" >
                                                                <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->nama." - ".$row->jabatan_tugas;?></option>
                                                                <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                                <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                                 <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> Keterangan </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Keterangan" class="form-control" name="ket" value="<?php echo $row->ketnya;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /UPDATE jenis_kb TKI -->
                        <!-- HAPUS jenis_kb TKI -->
                            <div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Hapus KB <?php echo $idbio; ?></h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_personaldetail/hapus_data_kb'); ?>" class="form-horizontal" method="post">                                     
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <input type="hidden" class="form-control" name="id_kb" value="<?php echo $row->id_kb; ?>">
                                                <p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->kode_jenis_kb; ?> - <?php echo $row->ket; ?></code> ?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- /HAPUS jenis_kb TKI -->
                        <?php $no++;  } ?>
                        </tbody>
                    </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group2">IJIN KELUAR  (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading bg-primary">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3">Accordion Item #3</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /accordion with different panel styling -->
                </div>
            </div>
                    
        <?php 
                            foreach ($tampil_data_blk_personaldetail as $row) { ?>             <div class="col-lg-3">

                        <!-- User thumbnail -->
                        <div class="thumbnail">
                            <div class="thumb thumb-rounded thumb-slide">
                                <img src="assets/images/placeholder.jpg" alt="">
                                <div class="caption">
                                    <span>
                                        <a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                        <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin"><?php echo $row->namanya;?> <small class="display-block">Calon CTKI</small></h6>
                                <ul class="icons-list mt-15">
                                    <li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="Github"><i class="icon-github"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /user thumbnail -->


                        <!-- Navigation -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Navigation</h6>
                                <div class="heading-elements">
                                    <a href="#" class="heading-text"> &rarr;</a>
                                </div>
                            </div>

                            <div class="list-group list-group-borderless no-padding-top">
                                <a href="<?php echo site_url('blk_personaldetail/index/'.$idbio); ?>" class="list-group-item"><i class="icon-cog3"></i> Data Personal</a>
                                <div class="list-group-divider"></div>
                                <a href="<?php echo site_url('blk_personaldetail/pembinaan/'.$idbio); ?>" class="list-group-item"><i class="icon-bed2"></i> Pembinaan BLK </a>
                                <div class="list-group-divider"></div>
                                <a href="<?php echo site_url('blk_penilaiandetail/index/'.$idbio); ?>" class="list-group-item"><i class="icon-pencil3"></i> Data Penilaian Mental & Fisik</a>
                                <a href="<?php echo site_url('blk_penilaiantatagraha/index/'.$idbio); ?>" class="list-group-item"><i class="icon-pencil4"></i> Data Penilaian Tata Graha Laundry</a>
                                <a href="<?php echo site_url('blk_penilaiantatagraha/ruang/'.$idbio); ?>" class="list-group-item"><i class="icon-pencil4"></i> Data Penilaian Tata Graha Ruang</a>
                                
                            </div>
                        </div>
                        <!-- /navigation -->
<?php } ?>

                        <!-- Share your thoughts -->
                        
                        <!-- /share your thoughts -->


                        <!-- Balance chart -->
                        <!-- /balance chart -->


                        <!-- Connections -->
                        
                        <!-- /connections -->

                    </div>
            </div>
                <!-- /user profile -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->


        <!-- Footer -->
      <!--   <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
        </div> -->
        <!-- /footer -->

    </div>
    <!-- /page container -->
                <!-- TAMBAH jenis_kb TKI -->
                <div id="modal_form_horizontal" class="modal fade">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah KB <?php echo $idbio; ?></h5>
                            </div>
                            <form action="<?php echo site_url('blk_personaldetail/simpan_data_kb'); ?>" class="form-horizontal" method="post">
                                <div class="modal-body">

                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> Jenis KB </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="id_jenis_kb" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_Jenis_kb as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_jenis_kb;?>" /><?php echo $pilihan->kode_jenis_kb." <br>".$pilihan->ket;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal suntik</label>
                                        <div class="col-sm-9">
                                            <input type="date" placeholder="Tanggal Suntik" class="form-control" name="tgl_suntik" data-format='yyyy.MM.dd'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">KB Suntik</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="KB Suntik" class="form-control" name="kb_suntik" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Masa Kadaluwarsa</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Masa Kadaluwarsa" class="form-control" name="masa_kadaluwarsa" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> BLK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="id_instruktur" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Keterangan </label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Keterangan" class="form-control" name="ket" >
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">OK</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /TAMBAH jenis_kb TKI -->