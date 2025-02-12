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
                    

                    <?php 
                        if ($collapse_form == 'kb') {
                            $kb  = 'in';
                            $ik  = '';
                            $ii  = '';
                            $ip  = '';
                            $ith = '';
                            $pkl = '';
                        } elseif ($collapse_form == 'ik') {
                            $kb  = '';
                            $ik  = 'in';
                            $ii  = '';
                            $ip  = '';
                            $ith = '';
                            $pkl = '';
                        } elseif ($collapse_form == 'ii') {
                            $kb  = '';
                            $ik  = '';
                            $ii  = 'in';
                            $ip  = '';
                            $ith = '';
                            $pkl = '';
                        } elseif ($collapse_form == 'ip') {
                            $kb  = '';
                            $ik  = '';
                            $ii  = '';
                            $ip  = 'in';
                            $ith = '';
                            $pkl = '';
                        } elseif ($collapse_form == 'ith') {
                            $kb  = '';
                            $ik  = '';
                            $ii  = '';
                            $ip  = '';
                            $ith = 'in';
                            $pkl = '';
                        } elseif ($collapse_form == 'pkl') {
                            $kb  = '';
                            $ik  = '';
                            $ii  = '';
                            $ip  = '';
                            $ith = '';
                            $pkl = 'in';
                        } else {
                            $kb  = 'in';
                            $ik  = '';
                            $ii  = '';
                            $ip  = '';
                            $ith = '';
                            $pkl = '';
                        }
                    ?>

                        <div class="panel-group" id="accordion-styled">
                            <div class="panel">
                                <div class="panel-heading bg-danger">
                                    <h6 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group1">DATA KB (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group1" class="panel-collapse collapse <?php echo $kb;?>">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH DATA JENIS KB</button>
                                       <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
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
                                                            <input type="date" placeholder="Masa Kadaluwarsa" class="form-control pickadate-selectors picker__input" name="masa_kadaluwarsa" value="<?php echo $row->masa_kadaluwarsa;?>" >
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
                                <div id="accordion-styled-group2" class="panel-collapse collapse <?php echo $ik;?>">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal2">TAMBAH IJIN KELUAR</button>
                                           <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>TANGGAL</th>
                                <th>JAM KELUAR</th>
                                <th>JAM KEMBALI</th>
                                <th>TERLAMBAT (MENIT)</th>
                                <th>AKM TERLAMBAT</th>
                                <th>BLK PEMBERI IZIN</th>
                                <th>KETERANGAN</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                            foreach ($tampil_data_izin_keluar as $row) { ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->tgl;?></td>
                                <td><?php echo $row->jam_keluar;?></td>
                                <td><?php echo $row->jam_kembali;?></td>
                                <td><?php echo $row->terlambat;?></td>
                                <td><?php echo $row->akm_terlambat;?></td>
                                <td><?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ket;?></td>
                                    <td class="text-center">
                                        <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_keluar/update_data_izin_keluar/'.$row->id_izin_keluar); ?>"><i class="icon-pencil"></i> </a>  -->
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editkeluar<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuskeluar<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> </button> 
                                    </td> 
                            </tr>
                        <!-- UPDATE izin_keluar TKI -->
                            <div id="editkeluar<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update Ijin Keluar</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_izin_keluar'); ?>" class="form-horizontal" method="post">                                        
                                            <input type="hidden" class="form-control" name="id_izin_keluar" value="<?php echo $row->id_izin_keluar; ?>">
                                             <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Tanggal " class="form-control" name="tgl" data-format='yyyy.MM.dd' value="<?php echo $row->tgl;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Jam Keluar" class="form-control" name="jam_keluar" value="<?php echo $row->jam_keluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Jam Kembali" class="form-control" name="jam_kembali" value="<?php echo $row->jam_kembali;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="terlambat" value="<?php echo $row->terlambat;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" value="<?php echo $row->akm_terlambat;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> BLK </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="blk_pemberi_izin" >
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
                                                            <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ><?php echo $row->ket;?></textarea>
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
                        <!-- /UPDATE izin_keluar TKI -->
                        <!-- HAPUS izin_keluar TKI -->
                            <div id="hapuskeluar<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Hapus IjinKeluar </h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_keluar'); ?>" class="form-horizontal" method="post">                                     
                                            <div class="modal-body">
                                                 <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <input type="hidden" class="form-control" name="id_izin_keluar" value="<?php echo $row->id_izin_keluar; ?>">
                                                <p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->id_izin_keluar; ?> - <?php echo $row->tgl; ?></code> ?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- /HAPUS izin_keluar TKI -->
                        <?php $no++;  } ?>
                        </tbody>
                    </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel">
                                <div class="panel-heading bg-primary">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group3">IJIN INAP  (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group3" class="panel-collapse collapse <?php echo $ii;?>">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal3">TAMBAH IJIN INAP</button>
                                       <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>TANGGAL / JAM KELUAR</th>
                                 <th>TANGGAL / JAM KEMBALI</th>
                                <th>TERLAMBAT (MENIT)</th>
                                <th>AKM TERLAMBAT</th>
                                <th>BLK PEMBERI IZIN</th>
                                <th>KETERANGAN</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_izin_inap as $row)    { 
                                  ?>
                            <tr>    
                                
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                                <td><?php echo $row->tglmasuk.'<br>'.$row->jammasuk;?></td>
                                <td><?php echo $row->terlambat;?></td>
                                <td><?php echo $row->akm_terlambat;?></td>
                                <td><?php echo $row->kode_instruktur;?> <?php echo $row->nama;?> <?php echo $row->jabatan_tugas;?></td>
                                <td><?php echo $row->ket;?></td>
                                    <td class="text-center">
                                        <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_inap/update_data_izin_inap/'.$row->id_izin_inap); ?>"><i class="icon-pencil"></i> Edit</a>  -->
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editinap<?php echo $no; ?>"><i class="icon-pencil"></i> Ubah</button> 
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusinap<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</button> 
                                    </td> 
                            </tr>
                        <!-- UPDATE izin_inap TKI -->
                            <div id="editinap<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update Jenis KB</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_izin_inap'); ?>" class="form-horizontal" method="post">                                        
                                           <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                            <input type="hidden" class="form-control" name="id_izin_inap" value="<?php echo $row->id_izin_inap; ?>">
                                        
                                         <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Keluar </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="tglkeluar" value="<?php echo $row->tglkeluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jamkeluar" value="<?php echo $row->jamkeluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Masuk</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="tglmasuk" value="<?php echo $row->tglmasuk;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Masuk</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jammasuk" value="<?php echo $row->jammasuk;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="terlambat" value="<?php echo $row->terlambat;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" value="<?php echo $row->akm_terlambat;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> BLK </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="blk_pemberi_izin" >
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
                                                            <input type="text" placeholder="Keterangan" class="form-control" name="ket" value="<?php echo $row->ket;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /UPDATE izin_inap TKI -->
                        <!-- HAPUS izin_inap TKI -->
                            <div id="hapusinap<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Hapus Jenis KB </h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_inap'); ?>" class="form-horizontal" method="post">                                     
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <input type="hidden" class="form-control" name="id_izin_inap" value="<?php echo $row->id_izin_inap; ?>">
                                                <p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->id_izin_inap; ?> - <?php echo $row->keluar_kembali; ?></code> ?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- /HAPUS izin_inap TKI -->
                        <?php $no++;  } ?>
                        </tbody>
                    </table>
                                    </div>
                                </div>
                            </div>
                             <div class="panel">
                                <div class="panel-heading bg-green">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group4">IJIN PULANG  (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group4" class="panel-collapse collapse <?php echo $ip;?>">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal4">TAMBAH IJIN PULANG</button>
                                      <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>JAM KELUAR</th>
                                <th>JAM KEMBALI</th>
                                <th>JAM KEMBALI(ACTUAL)</th>
                                <th>TERLAMBAT (JAM)</th>
                                <th>AKM </th>
                                <th>BLK PEMBERI IZIN (MARK)</th>
                                <th>BLK PEMBERI IZIN (ADM)</th>
                                <th>BLK PEMBERI IZIN (BLK)</th>
                                <th>KET</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_izin_pulang as $row)  { 
                                   ?>
                            <tr>    
                                
                                <td><?php echo $no;?></td>
                               <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                                <td><?php echo $row->tglkembali.'<br>'.$row->jamkembali;?></td>
                                <td><?php echo $row->tglactual.'<br>'.$row->jamactual;?></td>
                                <td><?php echo $row->terlambat;?></td>
                                <td><?php echo $row->akm_terlambat;?></td>
                                <td><?php echo $row->kode_marketing;?> <?php echo $row->namamark;?> <?php echo $row->jabatanmark;?></td>
                                <td><?php echo $row->kode_adm_kantor;?> <?php echo $row->namaadm;?> <?php echo $row->jabatanadm;?></td>
                                <td><?php echo $row->kode_instruktur;?> <?php echo $row->namablk;?> <?php echo $row->jabatanblk;?></td>
                                <td><?php echo $row->ket;?></td>
                                    <td class="text-center">
                                        <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_pulang/update_data_izin_pulang/'.$row->id_izin_pulang); ?>"><i class="icon-pencil"></i> Edit</a>  -->
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editpulang<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                                       <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapuspulang<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> </button> 
                                    </td> 
                            </tr>
                        <!-- UPDATE izin_pulang TKI -->
                            <div id="editpulang<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update Ijin Pulang</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_izin_pulang'); ?>" class="form-horizontal" method="post">                                        
                                            <input type="hidden" class="form-control" name="id_izin_pulang" value="<?php echo $row->id_izin_pulang; ?>">
                                            <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Keluar </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Terlambat" class="form-control" name="tglkeluar" value="<?php echo $row->tglkeluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jamkeluar" value="<?php echo $row->jamkeluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Kembali</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Terlambat" class="form-control" name="tglkembali" value="<?php echo $row->tglkembali;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jamkembali" value="<?php echo $row->jamkembali;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Kembali (Actual)</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Terlambat" class="form-control" name="tglact" value="<?php echo $row->tglactual;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Kembali (Actual)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jamact" value="<?php echo $row->jamactual;?>" >
                                                        </div>
                                                    </div>
                                                </div><!--
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="terlambat" value="<?php echo $row->terlambat;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" value="<?php echo $row->akm_terlambat;?>" >
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> BLK </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="blk" >
                                                                <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->namablk." - ".$row->jabatanblk;?></option>
                                                                <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                                <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                                 <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> ADM </label>
                                                        <div class="col-sm-9">
                                                             <select class="select-menu-color" name="adm" >
                                                <option value="<?php echo $row->id_adm_kantor;?>" ><?php echo $row->kode_adm_kantor." - ".$row->namaadm." - ".$row->jabatanadm;?></option>
                                                <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                                <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> MARK </label>
                                                        <div class="col-sm-9">
                                                             <select class="select-menu-color" name="mark" >
                                                <option value="<?php echo $row->id_marketing;?>" ><?php echo $row->kode_marketing." - ".$row->namamark." - ".$row->jabatanmark;?></option>
                                                <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> Keterangan </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Keterangan" class="form-control" name="ket" value="<?php echo $row->ket;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /UPDATE izin_pulang TKI -->
                        <!-- HAPUS izin_pulang TKI -->
                            <div id="hapuspulang<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Hapus Jenis KB </h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_pulang'); ?>" class="form-horizontal" method="post">                                     
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_izin_pulang" value="<?php echo $row->id_izin_pulang; ?>">
                                                <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">s
                                                <p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->id_izin_pulang; ?> - <?php echo $row->keluar_kembali; ?></code> ?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- /HAPUS izin_pulang TKI -->
                        <?php $no++;  } ?>
                        </tbody>
                    </table>
                                    </div>
                                </div>
                            </div>

                             <div class="panel">
                                <div class="panel-heading bg-warning">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group5">IJIN TIDAK HADIR  (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group5" class="panel-collapse collapse <?php echo $ith;?>">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal5">TAMBAH IJIN TIDAK HADIR</button>
                                     <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                        <thead>
                            <tr>
                                <th>NO </th>
                                <th>JAM KELUAR</th>
                                <th>JAM KEMBALI</th>
                                <th>KEPERLUAN</th>
                                <th>MARK PEMBERI IZIN</th>
                                <th>ADM PEMBERI IZIN</th>
                                <th>BLK PEMBERI IZIN</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; 
                                    foreach ($tampil_data_izin_tdk_hadir as $row)   { 
                                    ?>
                            <tr>    
                                
                                <td><?php echo $no;?></td>
                               <td><?php echo $row->tglkeluar.'<br>'.$row->jamkeluar;?></td>
                                <td><?php echo $row->tglkembali.'<br>'.$row->jamkembali;?></td>
                                <td><?php echo $row->kode_izin_keperluan;?> - <?php echo $row->ket;?></td>
                                <td><?php echo $row->kode_marketing;?> - <?php echo $row->namamark;?> - <?php echo $row->jabatanmark;?></td>
                                <td><?php echo $row->kode_adm_kantor;?> - <?php echo $row->namaadm;?> - <?php echo $row->jabatanadm;?></td>
                                <td><?php echo $row->kode_instruktur;?> - <?php echo $row->namablk;?> - <?php echo $row->jabatanblk;?></td>
                                    <td class="text-center">
                                        <!-- <a class="btn btn-warning btn-sm" href="<?php echo site_url('izin_tdk_hadir/update_data_izin_tdk_hadir/'.$row->id_izin_tdk_hadir); ?>"><i class="icon-pencil"></i> Edit</a>  -->
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#edittdkhadir<?php echo $no; ?>"><i class="icon-pencil"></i> </button> 
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapustdkhadir<?php echo $no; ?>"><i class="glyphicon glyphicon-trash"></i> </button> 
                                    </td> 
                            </tr>
                        <!-- UPDATE izin_tdk_hadir TKI -->
                            <div id="edittdkhadir<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update IJIN TIDAK HADIR</h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_izin_tdk_hadir'); ?>" class="form-horizontal" method="post">                                      
                                            <input type="hidden" class="form-control" name="id_izin_tdk_hadir" value="<?php echo $row->id_izin_tdk_hadir; ?>">
                                                <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Keluar </label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="tglkeluar" value="<?php echo $row->tglkeluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jamkeluar" value="<?php echo $row->jamkeluar;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Kembali</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="tglkembali" value="<?php echo $row->tglkembali;?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Terlambat" class="form-control" name="jamkembali" value="<?php echo $row->jamkembali;?>" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> KEPERLUAN </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="keperluan" >
                                                <option value="<?php echo $row->id_izin_keperluan;?>" ><?php echo $row->kode_izin_keperluan." - ".$row->ket;?></option>
                                                <?php  foreach ($tampil_data_izin_keperluan as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_izin_keperluan;?>" /><?php echo $pilihan->kode_izin_keperluan." - ".$pilihan->ket;?>
                                                 <?php  } ?>
                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> BLK </label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="blk" >
                                                                <option value="<?php echo $row->id_instruktur;?>" ><?php echo $row->kode_instruktur." - ".$row->namablk." - ".$row->jabatanblk;?></option>
                                                                <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                                <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                                 <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> ADM </label>
                                                        <div class="col-sm-9">
                                                             <select class="select-menu-color" name="adm" >
                                                <option value="<?php echo $row->id_adm_kantor;?>" ><?php echo $row->kode_adm_kantor." - ".$row->namaadm." - ".$row->jabatanadm;?></option>
                                                <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                                <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3"> MARK </label>
                                                        <div class="col-sm-9">
                                                             <select class="select-menu-color" name="mark" >
                                                <option value="<?php echo $row->id_marketing;?>" ><?php echo $row->kode_marketing." - ".$row->namamark." - ".$row->jabatanmark;?></option>
                                                <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            <hr>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- /UPDATE izin_tdk_hadir TKI -->
                        <!-- HAPUS izin_tdk_hadir TKI -->
                            <div id="hapustdkhadir<?php echo $no; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Hapus TIDAK HADOR </h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_personaldetail/hapus_data_izin_tdk_hadir'); ?>" class="form-horizontal" method="post">                                       
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_izin_tdk_hadir" value="<?php echo $row->id_izin_tdk_hadir; ?>">
                                                 <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->id_izin_tdk_hadir; ?> - <?php echo $row->keluar_kembali; ?></code> ?</p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- /HAPUS izin_tdk_hadir TKI -->
                        <?php $no++;  } ?>
                        </tbody>
                    </table>
                                    </div>
                                </div>
                            </div>

                        <div class="panel">
                                <div class="panel-heading bg-primary">
                                    <h6 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-styled" href="#accordion-styled-group6">DATA PKL  (Click Disini!!..)</a>
                                    </h6>
                                </div>
                                <div id="accordion-styled-group6" class="panel-collapse collapse <?php echo $pkl; ?>">
                                    <div class="panel-body">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_pkl">TAMBAH HASIL KEGIATAN PKL</button>
                                        <table class="table datatable-basic table-bordered table-striped table-hover datatable-fixed-complex">
                                            <thead>
                                            <tr>
                                                <th>APRESIASI PKL</th>
                                                <th>Actions</th>
                                                <th>PKL</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Jumlah Hari</th>
                                                <th>Tempat</th>
                                                <?php 
                                                    foreach ($tampil_aspek as $row) {
                                                        echo '<th>'.$row->abjad.'. '.$row->aspek.' (NILAI)</th>';
                                                    }
                                                ?>
                                                <th>Nilai Rata-rata</th>
                                                <th>Pembina (BLK)</th>
                                                <th>No Resi Apresiasi TKI Informal</th>
                                                <th>Kepada</th>
                                                <th>Jumlah</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($tampil_hasilpkl as $row) { 
                                                        $rata2 = $this->M_blk_personaldetail->rata2($row->id_pkl)->rata2;
                                                        $rata = $this->M_blk_personaldetail->rata($row->id_pkl);
                                                        $jumlah = $row->jml_hari*$row->nominal;
                                                        ?>
                                                        <tr>
                                                          <td>  <a href="<?php echo site_url('blk_personaldetail/cetak_pkl/'.$row->id_pkl); ?>" target="_blank" class="btn btn-danger btn-sm"><i class="icon-printer2"></i>PRINT</a> </td>
                                                          <td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_pkl<?php echo $row->id_pkl; ?>"><i class="icon-pencil"></i> </button> 
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_pkl<?php echo $row->id_pkl; ?>"><i class="glyphicon glyphicon-trash"></i></button></td>
                                                        <td><?php echo $row->pkl_ke;?></td>
                                                        <td><?php echo $row->tgl_mulai;?></td>
                                                        <td><?php echo $row->tgl_selesai;?></td>
                                                        <td><?php echo $row->jml_hari;?></td>
                                                        <td><?php echo $row->nama_tempat;?></td>
                                                        <?php
                                                            foreach ($rata as $row2) {
                                                                echo '<td>'.$row2->rata.'</th>';
                                                            }
                                                        ?>
                                                        <td><?php echo $rata2;?></td>
                                                        <td><?php echo $row->nama;?></td>
                                                        <td><?php echo $row->no_resi;?></td>
                                                        <td><?php echo $row->kepada;?></td>
                                                        <td><?php echo $row->nominal?></td>
                                                        
                                                        </tr>
                            <!-- UPDATE pkl TKI -->
                            <div id="edit_pkl<?php echo $row->id_pkl; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Update PKL <?php echo $idbio; ?></h5>
                                        </div>
                                        <div class="modal-body">
                                        <form action="<?php echo site_url('blk_personaldetail/update_data_pkl'); ?>" class="form-horizontal" method="post">                                        
                                            <input type="hidden" class="form-control" name="id_pkl" value="<?php echo $row->id_pkl; ?>">
                                            <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tempat PKL</label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="id_tempatpkl" >
                                                                <?php 
                                                                    foreach ($tampil_tempatpkl as $row2 ) { 
                                                                        $sel = ($row2->id_tempatpkl==$row->id_tempatpkl)?'selected="selected"':'';
                                                                        ?>
                                                                        <option value="<?php echo $row2->id_tempatpkl?>" <?php echo $sel;?>><?php echo $row2->nama_tempat?></option>
                                                                <?php    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Instruktur</label>
                                                        <div class="col-sm-9">
                                                            <select class="select-menu-color" name="id_instruktur" >
                                                                <?php 
                                                                    foreach ($tampil_data_instruktur as $row2 ) { 
                                                                        $sel = ($row2->id_instruktur==$row->id_instruktur)?'selected="selected"':'';
                                                                        ?>
                                                                        <option value="<?php echo $row2->id_instruktur?>"><?php echo $row2->nama?></option>
                                                                <?php    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Mulai </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Tanggal Suntik" class="form-control" name="tgl_mulai" data-format='yyyy-MM-dd' value="<?php echo $row->tgl_mulai;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Tanggal Selesai </label>
                                                        <div class="col-sm-9">
                                                            <input type="date" placeholder="Tanggal Suntik" class="form-control" name="tgl_selesai" data-format='yyyy-MM-dd' value="<?php echo $row->tgl_selesai;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">No Resi Apresiasi PKL</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="No Resi Apresiasi PKL" class="form-control" name="no_resi" value="<?php echo $row->no_resi;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Kepada</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Kepada" class="form-control" name="kepada" value="<?php echo $row->kepada;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="control-label col-sm-3">Nominal</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" placeholder="Nominal" class="form-control" name="nominal" value="<?php echo $row->nominal;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    foreach ($tampil_aspek as $row4) { ?>
                                                    <div class="form-group">
                                                    <div class="row">
                                                        <h5><label class="control-label col-sm-12"><?php echo $row4->abjad.'. '.$row4->aspek?></h5>  
                                                    </div>
                                                                  
                                                    </div>
                                                    <?php

                                                        $no=1;
                                                        $materi = $this->M_blk_personaldetail->tampil_materi($row4->id_aspek);

                                                        foreach ($materi as $row2) { ?>
                                                            <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-6"><?php echo $no.'. '.$row2->materi;?></label>
                                                                <div class="col-sm-2">
                                                                <select class="select-menu-color" name="id_nilai<?php echo $row2->id_materipkl;?>" >
                                                                    <?php
                                                                    $aa = $this->M_blk_personaldetail->tampil_penilaian($row->id_pkl, $row2->id_materipkl);
                                                                        foreach ($tampil_pilihan as $row3) {
                                                                            
                                                                            $sel = ($aa->id_nilai == $row3->id_nilai)?'selected="selected"':'';
                                                                         ?>
                                                                            <option value="<?php echo $row3->id_nilai;?>" <?php echo $sel;?>><?php echo $row3->keterangan?></option>
                                                                    <?php    }
                                                                    ?>
                                                                </select>
                                                                   
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="text" placeholder="Penjelasan" class="form-control" name="penjelasan<?php echo $row2->id_materipkl;?>" value="<?php echo $aa->penjelasan?>" >
                                                                </div>
                                                            </div>
                                                                
                                                            </div> 
                                                    <?php $no++;
                                                       }
                                                    }
                                                ?>
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
                        <!-- /UPDATE pkl TKI -->                            
                            <!-- HAPUS pkl TKI -->
                            <div id="hapus_pkl<?php echo $row->id_pkl; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">Hapus PKL <?php echo $idbio; ?></h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_personaldetail/hapus_data_pkl'); ?>" class="form-horizontal" method="post">                                     
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                                <input type="hidden" class="form-control" name="id_pkl" value="<?php echo $row->id_pkl; ?>">
                                                <p>Apakah anda yakin akan menghapus data<code class="text-danger"><?php echo $row->pkl_ke;?> </code> </p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Ya</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <!-- /HAPUS pkl TKI -->
                
                                                <?php    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /accordion with different panel styling -->
                </div>
            </div>
                    
        <?php 
                            //foreach ($tampil_data_blk_personaldetail as $row) { ?>             <div class="col-lg-3">

                        <!-- User thumbnail -->
                        <div class="thumbnail">
                            <div class="thumb thumb-rounded thumb-slide">
                                <?php 
                                $idbio_explode = explode("-",$idbio);
                                $tipe_id = $idbio_explode[0];
                                    if ($tipe_id == 'FI' || $tipe_id == 'MI' || $tipe_id == 'FF' || $tipe_id == 'MF' || $tipe_id == 'JP' ) {
                                    $qfoto = "SELECT foto FROM personal where id_biodata='".$idbio."'";
                                    $zfoto = $this->M_session->select_row($qfoto);
                                    //print_r($zfoto);
                                ?>
                                <img src="<?php echo base_url()."assets/uploads/".$zfoto->foto ; ?>" alt="">
                                <?php } else { ?>
                                <img src="" alt="">
                                <?php } ?>
                                <div class="caption">
                                    <span>
                                        <a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                        <a href="user_pages_profile.html" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
                                    </span>
                                </div>
                            </div>
                        
                            <div class="caption text-center">
                                <h6 class="text-semibold no-margin"><?php
                                $ubah_tipe = substr($idbio, 0, 2);
                                if ($ubah_tipe == 'FI' || $ubah_tipe == 'FF' || $ubah_tipe == 'MF' || $ubah_tipe == 'MI' || $ubah_tipe == 'JP') {
                                    echo $data_personal->personal_nama;
                                } else {
                                    echo $data_personalblk->hk_nama;
                                }
                                ?> 
                                <small class="display-block">Calon CTKI</small></h6>
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
                            <?php 
                                $idbio_explode = explode("-",$idbio);
                                $tipe_id = $idbio_explode[0];
                            ?>

                            <div class="list-group list-group-borderless no-padding-top">
                                <a href="<?php echo site_url('blk_personaldetail/index/'.$idbio); ?>" class="list-group-item"><i class="icon-cog3"></i> Data Personal</a>
                                <div class="list-group-divider"></div>
                                <a href="<?php echo site_url('blk_personaldetail/pembinaan/'.$idbio); ?>" class="list-group-item"><i class="icon-bed2"></i> Pembinaan BLK </a>
                                <div class="list-group-divider"></div>
                                <a href="<?php echo site_url('blk_fisik_mental/index/'.$idbio); ?>" class="list-group-item"><i class="icon-brain"></i> Data Penilaian Fisik Mental</a>
                                <?php 

                                    if ($tipe_id == 'FI' || $tipe_id == 'MI' || $tipe_id == 'JP') {
                                ?>
                                        <a href="<?php echo site_url('blk_mandarin_inf_jompo/index/'.$idbio); ?>" class="list-group-item"><i class="icon-bookmark"></i> Data Penilaian Mandarin Informal-Jompo</a>
                                        <a href="<?php echo site_url('blk_bhs_taiyu/index/'.$idbio); ?>" class="list-group-item"><i class="icon-tumblr2"></i> Data Penilaian Bahasa Taiyu</a>
                                        <a href="<?php echo site_url('blk_jompo/index/'.$idbio); ?>" class="list-group-item"><i class="icon-accessibility2"></i> Data Penilaian Jompo</a>
                                <?php
                                    }    
                                    if ($tipe_id == 'FI' || $tipe_id == 'MI') {
                                ?>
                                        <a href="<?php echo site_url('blk_graha_laundry/index/'.$idbio); ?>" class="list-group-item"><i class="icon-shutter"></i> Data Penilaian Graha Laundry</a>
                                        <a href="<?php echo site_url('blk_graha_ruang/index/'.$idbio); ?>" class="list-group-item"><i class="icon-cube"></i> Data Penilaian Graha Ruang</a>
                                        <a href="<?php echo site_url('blk_graha_boga/index/'.$idbio); ?>" class="list-group-item"><i class="icon-ampersand"></i> Data Penilaian Graha Boga</a>
                                        <a href="<?php echo site_url('blk_tata_boga/index/'.$idbio); ?>" class="list-group-item"><i class="icon-wave2"></i> Data Penilaian Tata Boga</a>
                                <?php 
                                    } elseif ($tipe_id == 'MF' || $tipe_id == 'FF') {
                                ?>
                                        <a href="<?php echo site_url('blk_mandarin_pabrik/index/'.$idbio); ?>" class="list-group-item"><i class="icon-book3"></i> Data Penilaian Mandarin Pabrik</a>
                                        <a href="<?php echo site_url('blk_olah_raga/index/'.$idbio); ?>" class="list-group-item"><i class="icon-dribbble"></i> Data Penilaian Olah Raga</a>
                                        <a href="<?php echo site_url('blk_berhitung/index/'.$idbio); ?>" class="list-group-item"><i class="icon-seven-segment-4"></i> Data Penilaian Berhitung</a>
                                <?php
                                    } 
                                ?>
                                        <a href="<?php echo site_url('blk_psikotest/index/'.$idbio); ?>" class="list-group-item"><i class="icon-puzzle3"></i> Data Penilaian Psikotest</a>
                                <?php        
                                    if ($tipe_id == 'FI' || $tipe_id == 'MI') {
                                ?>
                                        <a href="<?php echo site_url('blk_umum/index/'.$idbio); ?>" class="list-group-item"><i class="icon-deviantart"></i> Data Penilaian Umum</a>
                                <?php   
                                    } 
                                ?>
                            </div>
                        </div>
                        <!-- /navigation -->
<?php //} ?>

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
                                            <input type="date" placeholder="EX: 2017-05-16 " class="form-control" name="tgl_suntik">
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
                                            <input type="date" placeholder="Masa Kadaluwarsa" class="form-control" name="masa_kadaluwarsa" >
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

                                <!-- TAMBAH jenis_kb TKI -->
                <div id="modal_form_horizontal2" class="modal fade">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah IJIN KELUAR <?php echo $idbio; ?></h5>
                            </div>
                            <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_keluar'); ?>" class="form-horizontal" method="post">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                        <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal </label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tgl" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                <input type="text" placeholder="EX : 12:34" class="form-control" name="jam_keluar" id="anytime-time" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                <input type="text" class="form-control pickatime" name="jam_kembali" placeholder="EX : 12:34">
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($hitung_data_terlambat==null){?>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="EX : 120" class="form-control value" value="0" name="terlambat" id="value1" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Auto" class="form-control" name="akm_terlambat" id="total" readonly="readonly" >
                                        </div>
                                    </div>
                                    <?php }else{?>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Terlambats (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" value="0" id="value2" >
                                        </div>
                                    </div>

                                            <input type="hidden" placeholder="EX : 120" class="form-control value" value="<?php echo $hitung_data_terlambat; ?>" >
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">AKM Terlambats (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Auto" class="form-control" name="akm_terlambat" id="total" readonly="readonly" >
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> BLK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="blk_pemberi_izin" >
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
                                            <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ></textarea>
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

                                                <!-- TAMBAH jenis_kb TKI -->
                <div id="modal_form_horizontal3" class="modal fade">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah IJIN INAP <?php echo $idbio; ?></h5>
                            </div>
                            <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_inap'); ?>" class="form-horizontal" method="post">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                       <!--  <div class="form-group">
                                        <label class="control-label col-sm-3">Waktu Keluar dan Waktu Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="text" class="form-control daterange-time" name="keluar_kembali" data-format='yyyy.MM.dd' > 
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglkeluar" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                <input type="text" placeholder="EX : 12:34" class="form-control" name="jamkeluar" id="anytime-time" >
                                            </div>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglkembali" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                <input type="text" class="form-control pickatime" name="jamkembali" placeholder="EX : 12:34">
                                            </div>
                                        </div>
                                    </div>


                                    <?php if($hitung_data_terlambatinap==null){?>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Terlambat (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" id="lam"  value="0" onblur="recalculateSum();">
                                        </div>
                                    </div>
                                    <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="0" id="tot" >

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">AKM Terlambat (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total2" readonly="readonly" >
                                        </div>
                                    </div>
                                    <?php }else{?>

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Terlambats (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" id="lam"  value="0" onblur="recalculateSum();" >
                                        </div>
                                    </div>
                                    <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="<?php echo $hitung_data_terlambatinap; ?>" id="tot" >
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">AKM Terlambats (Menit)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total2" readonly="readonly" >
                                        </div>
                                    </div>

                                    <?php } ?>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> BLK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="blk_pemberi_izin" >
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
                                            <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ></textarea>
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


                                                <!-- TAMBAH jenis_kb TKI -->
                <div id="modal_form_horizontal4" class="modal fade">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah IJIN PULANG <?php echo $idbio; ?></h5>
                            </div>
                            <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_pulang'); ?>" class="form-horizontal" method="post">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">

                                       <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglkeluar" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                <input type="text" placeholder="EX : 12:34" class="form-control" name="jamkeluar" id="anytime-time" >
                                            </div>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglkembali" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                <input type="text" class="form-control pickatime" name="jamkembali" placeholder="EX : 12:34">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Kembali (Actual)</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglact" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Kembali (Actual)</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                <input type="text" class="form-control pickatime" name="jamact" placeholder="EX : 12:34">
                                            </div>
                                        </div>
                                    </div>
<!--
                                        <?php if($hitung_data_terlambatpulang==null){?>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Terlambat (JAM)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="EX : 120" class="form-control value" name="terlambat" id="lam2"  value="0" onblur="recalculateSum2();"  >
                                        </div>
                                    </div>
                                      <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="0" id="tot2" >
                                     <div class="form-group">
                                        <label class="control-label col-sm-3">AKM Terlambat (JAM)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total3" readonly="readonly" >
                                        </div>
                                    </div>
                                    <?php }else{?>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Terlambats (JAM)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="EX : 2" class="form-control value" name="terlambat" id="lam2"  value="0" onblur="recalculateSum2();" >
                                        </div>
                                    </div>
                                    <input type="hidden" placeholder="EX : 120" class="form-control value" name="jumls" value="<?php echo $hitung_data_terlambatpulang; ?>" id="tot2" >
                                     <div class="form-group">
                                        <label class="control-label col-sm-3">AKM Terlambats (JAM)</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="AKM Terlambat" class="form-control" name="akm_terlambat" id="total3" readonly="readonly" >
                                        </div>
                                    </div>
                                    <?php } ?>
                                   -->
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> ADM </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="adm" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                                <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> MARK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="mark" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> BLK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="blk" >
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
                                            <textarea type="text" placeholder="Keterangan" class="form-control" name="ket" ></textarea>
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


                                                <!-- TAMBAH jenis_kb TKI -->
                <div id="modal_form_horizontal5" class="modal fade">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah IJIN PULANG <?php echo $idbio; ?></h5>
                            </div>
                            <form action="<?php echo site_url('blk_personaldetail/simpan_data_izin_tdk_hadir'); ?>" class="form-horizontal" method="post">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">

                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglkeluar" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Keluar</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                <input type="text" placeholder="EX : 12:34" class="form-control" name="jamkeluar" id="anytime-time" >
                                            </div>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input type="Date" class="form-control pickadate-selectors"  name="tglkembali" placeholder="EX: 2017-05-16 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Jam Kembali</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-alarm"></i></span>
                                                <input type="text" class="form-control pickatime" name="jamkembali" placeholder="EX : 12:34">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Keperluan</label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="keperluan" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_izin_keperluan as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_izin_keperluan;?>" /><?php echo $pilihan->kode_izin_keperluan." - ".$pilihan->ket;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="control-label col-sm-3"> ADM </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="adm" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_adm as $pilihan2) { ?>
                                                <option value="<?php echo $pilihan2->id_adm_kantor;?>" /><?php echo $pilihan2->kode_adm_kantor." - ".$pilihan2->nama." - ".$pilihan2->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> MARK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="mark" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_mark as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_marketing;?>" /><?php echo $pilihan->kode_marketing." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3"> BLK </label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="blk" >
                                                <option value="" />Select...
                                                <?php  foreach ($tampil_data_instruktur as $pilihan) { ?>
                                                <option value="<?php echo $pilihan->id_instruktur;?>" /><?php echo $pilihan->kode_instruktur." - ".$pilihan->nama." - ".$pilihan->jabatan_tugas;?>
                                                 <?php  } ?>
                                            </select>
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

                                <div id="modal_form_pkl" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Tambah Hasil PKL <?php echo $idbio; ?></h5>
                            </div>
                            <form action="<?php echo site_url('blk_personaldetail/simpan_data_pkl'); ?>" class="form-horizontal" method="post">
                                <div class="modal-body">

                                    <input type="hidden" class="form-control" name="id_personalblk" value="<?php echo $idbio; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tempat PKL</label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="id_tempatpkl" >
                                                <?php 
                                                    foreach ($tampil_tempatpkl as $row ) { ?>
                                                        <option value="<?php echo $row->id_tempatpkl?>"><?php echo $row->nama_tempat?></option>
                                                <?php    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Instruktur</label>
                                        <div class="col-sm-9">
                                            <select class="select-menu-color" name="id_instruktur" >
                                                <?php 
                                                    foreach ($tampil_data_instruktur as $row ) { ?>
                                                        <option value="<?php echo $row->id_instruktur?>"><?php echo $row->nama?></option>
                                                <?php    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Mulai</label>
                                        <div class="col-sm-9">
                                            <input type="date" placeholder="Tanggal Mulai" class="form-control" name="tgl_mulai" data-format='yyyy-MM-dd'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Tanggal Selesai</label>
                                        <div class="col-sm-9">
                                            <input type="date" placeholder="Tanggal Selesai" class="form-control" name="tgl_selesai" data-format='yyyy-MM-dd'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">No Resi Apresiasi PKL</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="No Resi Apresiasi PKL" class="form-control" name="no_resi" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Kepada</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Kepada" class="form-control" name="kepada" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Nominal</label>
                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Nominal" class="form-control" name="nominal" >
                                        </div>
                                    </div>
                                    <?php
                                        foreach ($tampil_aspek as $row) { ?>
                                        <div class="form-group">
                                            <h5><label class="control-label col-sm-12"><?php echo $row->abjad.'. '.$row->aspek?></h5>            
                                        </div>
                                        <?php
                                            $no=1;
                                            $materi = $this->M_blk_personaldetail->tampil_materi($row->id_aspek);
                                            foreach ($materi as $row2) { ?>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-6"><?php echo $no.'. '.$row2->materi;?></label>
                                                    <div class="col-sm-2">
                                                    <select class="select-menu-color" name="id_nilai<?php echo $row2->id_materipkl;?>" >
                                                        <?php
                                                            foreach ($tampil_pilihan as $row3) { ?>
                                                                <option value="<?php echo $row3->id_nilai;?>"><?php echo $row3->keterangan?></option>
                                                        <?php    }
                                                        ?>
                                                    </select>
                                                       
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Penjelasan" class="form-control" name="penjelasan<?php echo $row2->id_materipkl;?>" >
                                                    </div>
                                                </div> 
                                        <?php $no++;
                                           }
                                        }
                                    ?>
                                    
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