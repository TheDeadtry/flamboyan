    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4> <span class="text-semibold">ABSENSI DAN PENILAIAN PELATIHAN JOMPO</span></h4>

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
                        <h5 class="panel-title text-center">ABSENSI DAN PENILAIAN PELATIHAN JOMPO</h5><br/>
                        <h5 class="panel-title">Setting Data Awal</h5>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo site_url('blk_absensi_pelatihan_jompo/setdata/'.$idbio) ?>" method="POST">
                            <?php 
                                $tgl555         = $this->session->userdata('tgl');
                                $id_penilai     = $this->session->userdata('id_penilai');
                                $nama_penilai   = $this->session->userdata('nama_penilai');
                                $id_minggu     = $this->session->userdata('id_minggu');
                                $nama_minggu   = $this->session->userdata('nama_minggu');

                                if ($tgl555 == NULL) {
                                    $tgl555 = 'BELUM TERISI !';
                                } else {
                                    $tgl555 = $tgl555;
                                    //date("d/m/Y", strtotime(
                                }

                                if ($id_penilai == "none") {
                                    $id_penilai = "BELUM TERISI !";
                                } else {
                                    $id_penilai = $id_penilai;
                                }

                                if ($nama_penilai == "none") {
                                    $nama_penilai = "BELUM TERISI !";
                                } else {
                                    $nama_penilai = $nama_penilai;
                                }
                                if ($id_minggu == "none") {
                                    $id_minggu = "BELUM TERISI !";
                                } else {
                                    $id_minggu = $id_minggu;
                                }

                                if ($nama_minggu == "none") {
                                    $nama_minggu = "BELUM TERISI !";
                                } else {
                                    $nama_minggu = $nama_minggu;
                                }

                            ?>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Tanggal </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <?php 
                                                if ($this->session->userdata('tgl')) {
                                                    $ttggll = $this->session->userdata('tgl');
                                                } else {
                                                    $ttggll = date("Y-m-d");
                                                }
                                            ?>
                                            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                            <input class="form-control" type="date" value="<?php echo $ttggll ?>" id="input_tgl" name="tgl">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Penilai </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <select name="penilai" class="form-control">
                                                <?php 
                                                    if ($this->session->userdata('nama_penilai')) {
                                                        echo '<option value="'.$this->session->userdata('id_penilai').','.$this->session->userdata('nama_penilai').'">'.$this->session->userdata('nama_penilai').'</option>';
                                                    } else {
                                                        echo '<option value="none,none"></option>';
                                                    }
                                                ?>
                                                <div class="list-group-divider"></div>
                                                <?php 
                                                    foreach ($tampil_data_instruktur as $instruktur) {
                                                ?>
                                                    <option value="<?php echo $instruktur->id_instruktur.','.$instruktur->nama ?>"><?php echo $instruktur->nama ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label col-sm-3">Minggu </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-user"></i></span>
                                            <select name="minggu" class="form-control">
                                                <?php 
                                                    if ($this->session->userdata('nama_minggu')) {
                                                        echo '<option value="'.$this->session->userdata('id_minggu').','.$this->session->userdata('nama_minggu').'">'.$this->session->userdata('nama_minggu').'</option>';
                                                    } else {
                                                        echo '<option value="none,none"></option>';
                                                    }
                                                ?>
                                                <div class="list-group-divider"></div>
                                                <?php 
                                                    foreach ($tampil_data_minggu as $minggu) {
                                                ?>
                                                    <option value="<?php echo $minggu->id_minggu.','.$minggu->kode_minggu ?>"><?php echo $minggu->kode_minggu ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="btn-group pull-left">
                                        </div>
                                        <div class="btn-group pull-right">
                                            <button type="submit" class="btn btn-success btn-sm">SET</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h7 class="panel-title">ANGKAT KURSI KE KURSI (KG)</h7>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-lg datatable-basic table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="9" class="active">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah92">TAMBAH PENILAIAN</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td rowspan="2" max-width="100%" style="text-align:center">NO</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">TGL</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">KG</td>
                                    <td style="display:none"></td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">KETERANGAN</td>
                                    <td rowspan="2" style="text-align:center">ACTION</td>
                                </tr>
                            </thead>
                            <tbody> 
                                <div class="modal fade" id="tambah92" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('blk_absensi_pelatihan_jompo/tambah_nilai/'.$idbio); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">TAMBAH DATA NILAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="tgl" value="<?php echo $tgl555 ?>">
                                                    <input type="hidden" class="form-control" name="penilai" value="<?php echo $id_penilai?>">
                                                    <input type="hidden" class="form-control" name="minggu" value="<?php echo $id_minggu?>">
                                                    <input type="hidden" class="form-control" name="tipee" value="1">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Tanggal </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                    <input type="text" value="<?php echo date("d/m/Y", strtotime($tgl555)) ?>" name="x2" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Instruktur Penilai </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" value="<?php echo $nama_penilai ?>" name="x" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Minggu Penilaian </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" value="<?php echo $nama_minggu ?>" name="x" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Berat </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="berat" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="none">Pilih Kelas Berat</option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_berat as $berat) {
                                                                        ?>
                                                                            <option value="<?php echo $berat->id_berat ?>"><?php echo $berat->kode_berat ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Keterangan </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-file-text"></i></span>
                                                                    <textarea value="" name="keterangan" placeholder="Keterangan" class="form-control tatagraha_keterangan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $no=0;
                                foreach ($tampil_data_abs_pel_jompo as $keys) {
                                    $no++;
                                    $id         = $keys->id_penilaian_pel_jompo;
                                    $tgl        = $keys->tgl;
                                    $berat      = $this->M_blk_absensi_pelatihan_jompo->get_data_row('blk_berat','id_berat',$keys->berat_id);
                                    $ket        = $keys->ket;
                                    $mingguu    = $this->M_blk_absensi_pelatihan_jompo->get_data_row('blk_minggu','id_minggu',$keys->minggu_id);
                                    $penilai    = $this->M_blk_absensi_pelatihan_jompo->get_data_row('blk_instruktur','id_instruktur',$keys->penilai_id);
                                ?>
                                <tr>
                                    <td style="text-align:center" ><?php echo $no ?></td>
                                    <td style="text-align:center" ><?php echo $tgl ?></td>
                                    <td style="text-align:center" ><?php echo $berat->kode_berat ?></td>
                                    <td style="display:none"></td> 
                                    <td style="text-align:center" ><?php echo $ket ?></td>  
                                    <td style="text-align:center" >
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#" data-toggle="modal" data-target="#ubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span>Ubah</span></a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span>Hapus</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td> 
                                </tr>   

                                <div class="modal fade" id="ubah<?php echo $no ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('blk_absensi_pelatihan_jompo/ubah_nilai/'.$idbio); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH DATA NILAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control tatagraha_id" name="tatagraha_id" value="<?php echo $id ?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Tanggal </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                    <input type="date" maxlength="30" value="<?php echo $tgl ?>" name="tgl" class="form-control tatagraha_tgl">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Instruktur Penilai </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="penilai" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $penilai->id_instruktur ?>"><?php echo $penilai->nama ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_instruktur as $instruktur) {
                                                                        ?>
                                                                            <option value="<?php echo $instruktur->id_instruktur ?>"><?php echo $instruktur->nama ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Minggu Penilaian </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="minggu" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $mingguu->id_minggu ?>"><?php echo $mingguu->kode_minggu ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_minggu as $minggu) {
                                                                        ?>
                                                                            <option value="<?php echo $minggu->id_minggu ?>"><?php echo $minggu->kode_minggu ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Kelas Berat </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="materi" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $berat->id_berat ?>"><?php echo $berat->kode_berat ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_berat as $berat) {
                                                                        ?>
                                                                            <option value="<?php echo $berat->id_berat ?>"><?php echo $berat->kode_berat ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Keterangan </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-file-text"></i></span>
                                                                    <textarea value="<?php echo $ket ?>" name="keterangan" placeholder="Keterangan" class="form-control tatagraha_keterangan"><?php echo $ket ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div id="hapus<?php echo $no; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">Hapus Aspek </h5>
                                            </div>
                                            <form action="<?php echo site_url('blk_absensi_pelatihan_jompo/hapus_nilai/'.$idbio); ?>" class="form-horizontal" method="post">                                       
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="tatagraha_id" value="<?php echo $id ?>">
                                                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <?php
                                }
                                ?> 

                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h7 class="panel-title">ANGKAT KURSI RODA KE RANJANG DAN SEBALIKNYA (KG)</h7>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-lg datatable-basic table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="9" class="active">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahh">TAMBAH PENILAIAN</button>
                                    </th>
                                </tr>
                                <tr>
                                    <td rowspan="2" max-width="100%" style="text-align:center">NO</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">TGL</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">KG</td>
                                    <td rowspan="2" max-width="100%" style="text-align:center">KETERANGAN</td>
                                    <td rowspan="2" style="text-align:center">ACTION</td>
                                    <td style="display:none"></td>
                                    <td style="display:none"></td> 
                                </tr>
                            </thead>
                            <tbody> 
                                <div class="modal fade" id="tambahh" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('blk_absensi_pelatihan_jompo/tambah_nilai/'.$idbio); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">TAMBAH DATA NILAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="tgl" value="<?php echo $tgl555 ?>">
                                                    <input type="hidden" class="form-control" name="penilai" value="<?php echo $id_penilai?>">
                                                    <input type="hidden" class="form-control" name="minggu" value="<?php echo $id_minggu?>">
                                                    <input type="hidden" class="form-control" name="tipee" value="2">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Tanggal </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                    <input type="text" value="<?php echo date("d/m/Y", strtotime($tgl555)) ?>" name="x2" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Instruktur Penilai </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" value="<?php echo $nama_penilai ?>" name="x" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Minggu Penilaian </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <input type="text" value="<?php echo $nama_minggu ?>" name="x" class="form-control" disabled="disabled">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Berat </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="berat" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="none">Pilih Kelas Berat</option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_berat as $berat) {
                                                                        ?>
                                                                            <option value="<?php echo $berat->id_berat ?>"><?php echo $berat->kode_berat ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Keterangan </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-file-text"></i></span>
                                                                    <textarea value="" name="keterangan" placeholder="Keterangan" class="form-control tatagraha_keterangan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $no=0;
                                foreach ($tampil_data_abs_pel_jompo2 as $keys) {
                                    $no++;
                                    $id         = $keys->id_penilaian_pel_jompo;
                                    $tgl        = $keys->tgl;
                                    $berat      = $this->M_blk_absensi_pelatihan_jompo->get_data_row('blk_berat','id_berat',$keys->berat_id);
                                    $ket        = $keys->ket;
                                    $mingguu    = $this->M_blk_absensi_pelatihan_jompo->get_data_row('blk_minggu','id_minggu',$keys->minggu_id);
                                    $penilai    = $this->M_blk_absensi_pelatihan_jompo->get_data_row('blk_instruktur','id_instruktur',$keys->penilai_id);
                                ?>
                                <tr>
                                    <td style="text-align:center" ><?php echo $no ?></td>
                                    <td style="text-align:center" ><?php echo $tgl ?></td>
                                    <td style="text-align:center" ><?php echo $berat->kode_berat ?></td>
                                    <td style="text-align:center" ><?php echo $ket ?></td>  
                                    <td style="text-align:center" >
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#" data-toggle="modal" data-target="#ubahh<?php echo $no; ?>"><i class="icon-pencil3"></i><span>Ubah</span></a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#hapuss<?php echo $no; ?>"><i class="icon-eraser"></i><span>Hapus</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td> 
                                    <td style="display:none"></td> 
                                    <td style="display:none"></td> 
                                </tr>   

                                <div class="modal fade" id="ubahh<?php echo $no ?>" tabindex="-2" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="post" action="<?php echo site_url('blk_absensi_pelatihan_jompo/ubah_nilai/'.$idbio); ?>">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH DATA NILAI</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control tatagraha_id" name="tatagraha_id" value="<?php echo $id ?>">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Tanggal </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                                    <input type="date" maxlength="30" value="<?php echo $tgl ?>" name="tgl" class="form-control tatagraha_tgl">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Instruktur Penilai </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="penilai" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $penilai->id_instruktur ?>"><?php echo $penilai->nama ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_instruktur as $instruktur) {
                                                                        ?>
                                                                            <option value="<?php echo $instruktur->id_instruktur ?>"><?php echo $instruktur->nama ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Minggu Penilaian </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="minggu" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $mingguu->id_minggu ?>"><?php echo $mingguu->kode_minggu ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_minggu as $minggu) {
                                                                        ?>
                                                                            <option value="<?php echo $minggu->id_minggu ?>"><?php echo $minggu->kode_minggu ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Kelas Berat </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                                    <select name="materi" class="form-control">
                                                                        <option class="tatagraha_penilai" id="namapenilai" value="<?php echo $berat->id_berat ?>"><?php echo $berat->kode_berat ?></option>
                                                                        <div class="list-group-divider"></div>
                                                                        <?php 
                                                                            foreach ($tampil_data_berat as $berat) {
                                                                        ?>
                                                                            <option value="<?php echo $berat->id_berat ?>"><?php echo $berat->kode_berat ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="control-label col-sm-3">Keterangan </label>
                                                            <div class="col-sm-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icon-file-text"></i></span>
                                                                    <textarea value="<?php echo $ket ?>" name="keterangan" placeholder="Keterangan" class="form-control tatagraha_keterangan"><?php echo $ket ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div id="hapuss<?php echo $no; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">Hapus Aspek </h5>
                                            </div>
                                            <form action="<?php echo site_url('blk_absensi_pelatihan_jompo/hapus_nilai/'.$idbio); ?>" class="form-horizontal" method="post">                                       
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="tatagraha_id" value="<?php echo $id ?>">
                                                    <p>Apakah anda yakin akan menghapus data ini ?</p>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                                <?php
                                }
                                ?> 

                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
                    <div class="col-lg-3">

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
                                <h6 class="text-semibold no-margin"><?php echo $namanya;?><small class="display-block">CALON CTKI</small></h6>
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