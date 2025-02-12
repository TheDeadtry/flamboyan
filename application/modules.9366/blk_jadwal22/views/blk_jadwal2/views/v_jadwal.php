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
                                        <form action="<?php echo site_url('blk_jadwal2/search') ?>" method="POST">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>Pilih Paket</label>
                                                        <select name="pil_paket" class="select-search">
                                                            <option value="">SEMUA</option>
                                                            <?php 
                                                                foreach($tampil_data_paket as $baris) {
                                                                    $sol = "";
                                                                    if ($e_paket == $baris->id_paket2) {
                                                                        $sol = 'selected="selected"';
                                                                    }
                                                            ?>
                                                                    <option value="<?php echo $baris->id_paket2; ?>" <?php echo $sol; ?>><?php echo $baris->nama_paket; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Pilih Tanggal</label>
                                                        <input type="text" name="pil_tgl" class="form-control dewdate2" value="<?php echo $e_tgl; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="pull-right">
                                                            <button type="submit" class="btn btn-xxs bg-primary">Cari!</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div id="tambah69" class="modal fade">
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
                                                                    <input type="text" name="pil_tgl" class="form-control dewdate2" required="required"/>
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
                                                                                <option value="<?php echo $baris->id_paket; ?>"><?php echo $baris->nama_full; ?></option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">   
                                                                <label class="control-label col-sm-3">Pilih Instruktur/Guru</label>
                                                                <div class="col-sm-9">
                                                                    <select name="pil_ins" class="select-search" required="required">
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
                                        <a class="btn btn-xxs bg-warning" data-toggle="modal" data-target="#tambah69">Tambah</a>
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
                                                        <td style="text-align:center"><?php echo date("d/m/Y", strtotime($pkt->tgl)); ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->nama; ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->jam; ?></td>
                                                        <td style="text-align:center">
                                                            <a class="btn btn-xxs btn-primary" href="<?php echo site_url('blk_jadwal2/jadwal_detail/'.$pkt->id) ?>">
                                                                <span>DETAIL</span>
                                                            </a>
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

        $('#jadwaltables').dataTable();
    </script>