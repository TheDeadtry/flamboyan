    <style type="text/css">
        #jadwaltables .dropdown-menu {
            position: relative;
            float: none;
            width: 160px;
            z-index: 300px;
        }
    </style>

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
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading bg-primary">
                                <h5 class="panel-title">
                                    SEARCH FORM
                                </h5>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>Pilih Paket</label>
                                                    <select name="pil_paket" class="select-search">
                                                        <option></option>
                                                        <?php 
                                                            foreach($tampil_data_paket as $baris) {
                                                        ?>
                                                                <option value="<?php echo $baris->id_paket; ?>"><?php echo $baris->nama_paket; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Pilih Tanggal</label>
                                                    <input type="date" name="pil_tgl" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="pull-right">
                                                        <button class="btn btn-xxs bg-primary">Cari!</button>
                                                        <a class="btn btn-xxs bg-warning" data-toggle="modal" data-target="#tambah">Tambah</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="tambah" class="modal fade">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h5 class="modal-title">TAMBAH JADWAL/HARI</h5>
                                                </div>
                                                <form action="<?php echo site_url('blk_jadwal2/jadwal_add') ?>" method="POST">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <div class="row">   
                                                                <label class="control-label col-sm-3">Pilih Tanggal</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="pil_tgl" class="form-control dewdate3" required="required"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">   
                                                                <label class="control-label col-sm-3">Pilih Paket</label>
                                                                <div class="col-sm-9">
                                                                    <select name="pil_paket" class="select-search" required="required">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach($tampil_data_paket as $baris) {
                                                                        ?>
                                                                                <option value="<?php echo $baris->id_paket; ?>"><?php echo $baris->nama_paket; ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
<!--
                                                        <div class="form-group">
                                                            <div class="row">   
                                                                <label class="control-label col-sm-3">Pilih Instruktur/Guru</label>
                                                                <div class="col-sm-9">
                                                                    <select name="pil_instruktur" class="select-search" required="required">
                                                                        <option></option>
                                                                        <?php 
                                                                            foreach($tampil_data_instruktur as $guru) {
                                                                        ?>
                                                                                <option value="<?php echo $guru->kode_instruktur; ?>"><?php echo $guru->kode_instruktur.' - '.$guru->nama; ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>-->

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">OK</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        DATA JADWAL
                                    </h5>

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
                                            <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                                <thead>
                                                    <tr>
                                                        <td max-width="100%" style="text-align:center">NO</td>
                                                        <td max-width="100%" style="text-align:center">TGL JADWAL</td>
                                                        <td max-width="100%" style="text-align:center">NAMA PAKET</td>
                                                        <td max-width="100%" style="text-align:center">JAM PAKET</td>
                                                        <!--<td max-width="100%" style="text-align:center">TIPE HARI (HARI)</td>-->
                                                        <td max-width="100%" style="text-align:center">DETAIL</td>
                                                        <td style="text-align:center">ACTION</td>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php 
                                                        $no = 1;
                                                        foreach ($tampil_data_jadwaldata as $pkt) {
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo $no; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->tgl; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->nama; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->jam; ?></td>
                                                        <!--<td style="text-align:center"><?php echo $pkt->tipe_hari.' ('.$pkt->hari_value.')'; ?></td>-->
                                                        <td style="text-align:center">                                                            <?php 
                                                                $subpaket       = "SELECT 
                                                                                    * 
                                                                                    FROM blk_jadwal_paketjadwal 
                                                                                    WHERE paket_id='$pkt->paket_id'";
                                                                $ambil_subpaket = $this->M_session->select($subpaket);
                                                                foreach($ambil_subpaket as $subs) {
                                                            ?>
                                                                    <a class="btn btn-xxs btn-primary" href="<?php echo site_url('blk_jadwal2/jadwal_detail/'.$pkt->id.'/'.$subs->hari) ?>">
                                                                        <span><?php echo $subs->hari ?></span>
                                                                    </a><!--
                                                                    <a class="btn btn-xxs btn-primary" data-toggle="modal" data-target="#instruktur<?php echo $no ?>">
                                                                        <span><?php echo $subs->hari ?></span>
                                                                    </a>
                                                                    <div id="instruktur<?php echo $no ?>" class="modal fade">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-primary">
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    <h5 class="modal-title">PILIH INSTRUKTUR</h5>
                                                                                </div>
                                                                                <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_2/'.$pkt->id.'/'.$subs->hari); ?>" class="form-horizontal" method="post">
                                                                                    <div class="modal-body">

                                                                                        <div class="form-group">
                                                                                            <div class="col-sm-12">
                                                                                                <select class="select-search" name="instruktur" required="required">
                                                                                                    <option></option>
                                                                                                    <?php 
                                                                                                        foreach ($tampil_data_instruktur as $vinstruktur) {
                                                                                                    ?>
                                                                                                        <option value="<?php echo $vinstruktur->kode_instruktur ?>"><?php echo $vinstruktur->kode_instruktur.' - '.$vinstruktur->nama; ?></option>
                                                                                                    <?php 
                                                                                                        }
                                                                                                    ?>
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
                                                                    </div>  --> 
                                                                    <!--
                                                                    <a class="btn btn-xxs btn-primary" href="<?php echo site_url('blk_jadwal2/jadwal_detail/'.$pkt->id.'/'.$subs->hari) ?>">
                                                                        <span><?php echo $subs->hari ?></span>
                                                                    </a>-->
                                                            <?php       
                                                                }
                                                            ?>
                                                            
                                                        </td>


                                                        <td style="text-align:center">
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal<?php echo $no ?>">TAMBAH TKI</button>
                                                            
                                                            <div id="modal_form_horizontal<?php echo $no ?>" class="modal fade">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h5 class="modal-title">TAMBAH TKW MANUAL</h5>
                                                                        </div>
                                                                        <form action="<?php echo site_url('blk_jadwal2/jadwal_detail_simpan/'); ?>" class="form-horizontal" method="post">
                                                                            <input type="hidden" name="id" value="<?php echo $pkt->id ?>"/>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <table class="table table-xxs table-bordered table-striped table-hover">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <td>No</td>
                                                                                                <td>ID</td>
                                                                                                <td>Nama</td>
                                                                                                <td>Hari</td>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php 
                                                                                                $ttki = "SELECT 
                                                                                                        *
                                                                                                        FROM blk_jadwal_data_tki 
                                                                                                        where jadwal_data_id='$pkt->id'";

                                                                                                $tampil_data_ttki = $this->M_session->select($ttki);

                                                                                                $no=1;
                                                                                                $data_bioid = array();
                                                                                                foreach ($tampil_data_ttki as $tki) {
                                                                                                    $sektor = substr($tki->biodata_id, 2, 0);
                                                                                                    if ($sektor == 'FI' || $sektor == 'FF' || $sektor == 'MF' || $sektor == 'MI' || $sektor == 'JP') {
                                                                                                        $ambil_tw = $this->M_session->select_row("SELECT nama FROM personal where id_biodata='$tki->biodata_id'");
                                                                                                        $biodata_nama    = $ambil_tw->nama;
                                                                                                    } else {
                                                                                                        $ambil_hk = $this->M_session->select_row("SELECT nama FROM personalblk where nodaftar='$tki->biodata_id'");
                                                                                                        $biodata_nama    = $ambil_hk->nama;
                                                                                                    }
                                                                                                    $xxhari     = "SELECT 
                                                                                                                    * 
                                                                                                                    FROM blk_jadwal_data a
                                                                                                                    LEFT JOIN blk_jadwal_paketjadwal b
                                                                                                                    ON a.paket_id=b.paket_id
                                                                                                                    WHERE a.id_jadwal_data='$pkt->id'
                                                                                                                    ";
                                                                                                    $cchari     = $this->M_session->select($xxhari);
                                                                                                    $zz3_hari   = "";
                                                                                                    foreach ($cchari as $xt) {
                                                                                                        $zz3_hari = $zz3_hari.",".$xt->hari;
                                                                                                    }
                                                                                                    $data_bioid[] = $tki->biodata_id;
                                                                                            ?>
                                                                                            <tr>
                                                                                                <td><?php echo $no; ?></td>
                                                                                                <td><?php echo $tki->biodata_id; ?></td>
                                                                                                <td><?php echo $biodata_nama; ?></td>
                                                                                                <td><?php echo substr($zz3_hari, 1); ?></td>
                                                                                            </tr>
                                                                                            <?php 
                                                                                                $no++;
                                                                                                }
                                                                                            ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-sm-3">TKW</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="tyy" name="dt_tkw[]" required="required" multiple="multiple">
                                                                                            <?php 
                                                                                                foreach ($tampil_data_tkw as $vtki) {
                                                                                                    if (substr($vtki->id, 2, 0) == 'FI') {
                                                                                                        $tki_nama = $vtki->nama_tw;
                                                                                                    } else {
                                                                                                        $tki_nama = $vtki->nama_hk;
                                                                                                    }
                                                                                                    
                                                                                            ?>
                                                                                                <option value="<?php echo $vtki->id ?>"><?php echo $vtki->id.' - '.$tki_nama; ?></option>
                                                                                            <?php 
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-danger">OK</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                    <!--
                                                            <a class="btn btn-xxs btn-warning" data-toggle="modal" data-target="#ubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span> Ubah</span></a>
                                                            <a class="btn btn-xxs btn-danger" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span> Hapus</span></a>
                                                        -->
                                                        </td>  
                                                    </tr> 


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

            </div>

        </div>


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. <a href="">PT FLAMBOYAN GEMAJASA</a> by <a href="" target="_blank">DKRH</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /page container -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".txx").select2({
                maximumSelectionLength: 2
            });
            $(".tyy").select2();
        });

    </script>