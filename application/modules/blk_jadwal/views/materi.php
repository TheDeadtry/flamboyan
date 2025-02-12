    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
            </div>

            <div class="heading-elements">
            </div>
        </div>
    </div>
    <!-- /page header -->


    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">

            <div class="row">
            
            <div class="col-lg-3">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <?php 
                            $jokowi = ">>HARUS ISI SETTING INI DAHULU!<<";
                            if ($this->session->userdata('kode_penilai') != NULL && $this->session->userdata('kode_jam') != NULL) {
                                $jokowi = "";
                            } else {
                                $jokowi = ">>HARUS ISI SETTING INI DAHULU!<<";
                            }
                        ?>
                        <h5 class="panel-title">Setting Data Awal</h5>
                        <h6 style="color:red;"><?php echo $jokowi ?></h6>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo site_url('blk_jadwal/setdata/'.$zkode.'/'.$zhari) ?>" method="POST">
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label">Penilai </label>
                                    <div class="">
                                        <select name="penilai" class="select-results-color">
                                            <?php 
                                                foreach ($tampil_data_blk_instruktur as $instruktur) {
                                                $selectors = '';
                                                if ($this->session->userdata('kode_penilai') == $instruktur->kode_instruktur) {
                                                    $selectors = 'selected="selected"';
                                                } 
                                            ?>
                                                <option value="<?php echo $instruktur->kode_instruktur.','.$instruktur->nama ?>" <?php echo $selectors ?>><?php echo $instruktur->nama ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="control-label">Jam </label>
                                    <div class="">
                                        <select name="jam" class="select-results-color">
                                            <?php 
                                                foreach ($tampil_data_blk_jam as $jam) {
                                                $selectors = '';
                                                if ($this->session->userdata('kode_jam') == $jam->kode_jam) {
                                                    $selectors = 'selected="selected"';
                                                }   
                                            ?>
                                                <option value="<?php echo $jam->kode_jam.','.$jam->jam ?>" <?php echo $selectors ?>><?php echo $jam->jam ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>  
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
            </div>

            <div class="col-lg-9">


                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <a type="button" href="<?php echo site_url('blk_jadwal/detail/'.$zkode) ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                        <?php 
                            $jokowi = "disabled='disabled'";
                            if ($this->session->userdata('kode_penilai') != NULL && $this->session->userdata('kode_jam') != NULL) {
                                $jokowi = "";
                            } else {
                                $jokowi = "disabled='disabled'";
                            }
                        ?>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahmateri" <?php echo $jokowi ?>>TAMBAH MATERI</button>
                        <h5 class="panel-title text-center"><?php echo $tampil_data_jadwal->nama_jadwal.' ('.$tampil_data_jadwal->minggu_id.')'?><br/><?php echo $zhari ?></h5>

                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="reload"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>


                    <div id="tambahmateri" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Tambah Materi untuk Jadwal </h5>
                                </div>
                                <form action="<?php echo site_url('blk_jadwal/simpanmateri/'.$zkode.'/'.$zhari); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" name="kode_instruktur" value="<?php echo $this->session->userdata('kode_penilai') ?>">
                                        <input type="hidden" class="form-control" name="kode_jam" value="<?php echo $this->session->userdata('kode_jam') ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Materi</label>
                                            <div class="col-sm-9">
                                                <select class="select-results-color" name="materi">
                                                    <option></option>
                                                    <?php 
                                                        foreach ($tampil_data_all_materi as $vmateri) {
                                                    ?>
                                                        <option value="<?php echo $vmateri->id ?>"><?php echo $vmateri->kode_materi.' - '.$vmateri->nama_materi; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Instruktur</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('penilai') ?>" disabled="disabled">
                                                <!--
                                                <select class="form-control" name="instruktur">
                                                    <?php 
                                                        foreach ($tampil_data_instruktur as $vinstruktur) {
                                                    ?>
                                                        <option value="<?php echo $vinstruktur->kode_instruktur ?>"><?php echo $vinstruktur->kode_instruktur.' - '.$vinstruktur->nama; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                                -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">Jam</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="<?php echo $this->session->userdata('jam') ?>" disabled="disabled">
                                                <!--
                                                <select class="form-control" name="jam">
                                                    <?php 
                                                        foreach ($tampil_data_jam as $vjam) {
                                                    ?>
                                                        <option value="<?php echo $vjam->kode_jam ?>"><?php echo $vjam->jam; ?></option>
                                                    <?php 
                                                        }
                                                    ?>
                                                </select>
                                                -->
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

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-lg datatable-basic table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td style="text-align:center">NO</td>
                                        <td style="text-align:center">INSTRUKTUR</td>
                                        <td style="text-align:center">MATERI</td>
                                        <td style="text-align:center">JAM</td>
                                        <td style="display:none"></td>
                                        <td style="text-align:center;">ACTION</td>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php 
                                        $no = 1;
                                        foreach ($tampil_data_jadwalmateri as $jdw) {
                                            $fmateri        = $jdw->materi_id;
                                            $finstruktur    = $jdw->instruktur_id;
                                            $fjam           = $jdw->jam_id;
                                            $fkode          = $jdw->kode_jadwal;
                                            $fhari          = $jdw->kode_detail;
                                            
                                            $exp_materi     = explode("||", $fmateri);

                                            $table          = "blk_pelajaran_".$exp_materi[1];
                                            $fkode_materi   = $exp_materi[0];

                                            $get_inst   = $this->M_blk_jadwal->select_row("SELECT * FROM blk_instruktur where kode_instruktur='".$finstruktur."'");
                                            $get_jam    = $this->M_blk_jadwal->select_row("SELECT * FROM blk_jam where kode_jam='".$fjam."'");
                                            $get_materi = $this->M_blk_jadwal->select_row("SELECT * FROM $table where kode_materi='".$fkode_materi."'");

                                            if ($get_inst != NULL) {
                                                $zinst = $get_inst->nama;
                                            } else {
                                                $zinst = '-';
                                            }

                                            if ($get_jam != NULL) {
                                                $zjam = $get_jam->jam;
                                            } else {
                                                $zjam = '-';
                                            }

                                            if ($get_materi != NULL) {
                                                $zmateri = $get_materi->nama_materi;
                                            } else {
                                                $zmateri = '-';
                                            }
                                    ?>
                                    <tr>
                                        <td style="text-align:center"><?php echo $no ?></td>
                                        <td style="text-align:center"><?php echo $zinst ?></td>  
                                        <td style="text-align:center"><?php echo $zmateri ?></td>
                                        <td style="text-align:center"><?php echo $zjam ?></td>
                                        <td style="display:none"></td>
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

                                    <div id="ubah<?php echo $no; ?>" class="modal fade">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">UBAH MATERI </h5>
                                                </div>
                                                <form action="<?php echo site_url('blk_jadwal/ubahmateri/'.$zkode.'/'.$zhari); ?>" class="form-horizontal" method="post">
                                                    <div class="modal-body">
                                                        <input type="text" name="id_ubah" value="<?php echo $jdw->id_blk_jadwalmateri ?>"/>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-3">Materi</label>
                                                                <div class="col-sm-9">
                                                                    <select class="select-results-color" name="materi">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach ($tampil_data_all_materi as $vmateri) {
                                                                                $sel44 = '';
                                                                                if ($zmateri != '-') {
                                                                                    if ($get_materi->kode_materi == $vmateri->kode_materi) {
                                                                                        $sel44 = 'selected="selected"';
                                                                                    }
                                                                                }
                                                                        ?>
                                                                            <option value="<?php echo $vmateri->id ?>" <?php echo $sel44 ?>><?php echo $vmateri->kode_materi.' - '.$vmateri->nama_materi; ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-3">Instruktur</label>
                                                                <div class="col-sm-6">
                                                                    <select class="select-results-color" name="instruktur">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_instruktur as $vinstruktur) {
                                                                                $sel45 = '';
                                                                                if ($zinst != '-') {
                                                                                    if ($get_inst->kode_instruktur == $vinstruktur->kode_instruktur) {
                                                                                        $sel45 = 'selected="selected"';
                                                                                    }
                                                                                }
                                                                        ?>
                                                                            <option value="<?php echo $vinstruktur->kode_instruktur ?>" <?php echo $sel45 ?>><?php echo $vinstruktur->kode_instruktur.' - '.$vinstruktur->nama; ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-sm-3">Jam</label>
                                                                <div class="col-sm-6">
                                                                    <select class="select-results-color" name="jam">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach ($tampil_data_blk_jam as $vjam) {
                                                                                $sel46 = '';
                                                                                if ($zjam != '-') {
                                                                                    if ($get_jam->kode_jam == $vjam->kode_jam) {
                                                                                        $sel46 = 'selected="selected"';
                                                                                    }
                                                                                }
                                                                        ?>
                                                                            <option value="<?php echo $vjam->kode_jam ?>" <?php echo $sel46 ?>><?php echo $vjam->jam; ?></option>
                                                                        <?php 
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
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

                                    <div id="hapus<?php echo $no; ?>" class="modal fade">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">HAPUS MATERI </h5>
                                                </div>
                                                <form action="<?php echo site_url('blk_jadwal/hapusmateri/'.$zkode.'/'.$zhari); ?>" class="form-horizontal" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_hapus" value="<?php echo $jdw->id_blk_jadwalmateri ?>"/>
                                                        Apakah anda yakin menghapus record ini ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">OK</button>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var txx = $(".txx").select2();
            $(".js-programmatic-multi-clear").on("click", function () { txx.val(null).trigger("change"); });
            $(".tyy").select2({
                maximumSelectionLength: 1
            });
        });
    </script>