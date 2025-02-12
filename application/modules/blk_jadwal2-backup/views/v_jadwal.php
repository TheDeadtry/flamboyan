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
                                <div class="panel-heading bg-teal">
                                    <h5 class="panel-title">
                                        DATA JADWAL
                                    </h5>

                                    <div class="heading-elements">

                                        <div id="tambah69" class="modal fade">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">TAMBAH JADWAL/HARI</h5>
                                                    </div>
                                                    <form action="<?php echo site_url('blk_jadwal2/jadwal_add') ?>" method="POST">
                                                        <div class="modal-body" style="color:black;">

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
                                                        <td max-width="100%" style="text-align:center">INSTRUKTUR</td>
                                                        <!--<td max-width="100%" style="text-align:center">TIPE HARI (HARI)</td>-->
                                                        <td style="text-align:center">ACTION</td>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                    <?php 
                                                        $no = 1; 
                                                        foreach ($tampil_data_jadwaldata as $pkt) {
                                                            $ins = "SELECT *
                                                                    FROM blk_instruktur 
                                                                    WHERE kode_instruktur='$pkt->instruktur_kode'
                                                                    ";
                                                            $instruktur = $this->M_session->select_row($ins);
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo $no; ?></td>
                                                        <td style="text-align:center"><?php echo date("d/m/Y", strtotime($pkt->tanggal)); ?></td>
                                                        <td style="text-align:center"><?php echo $pkt->nama_full; ?></td>
                                                        <td style="text-align:center"><?php echo $instruktur->nama; ?></td>
                                                        <td style="text-align:center">
                                                            <a class="btn btn-xxs bg-purple" data-target="#edit_<?php echo $no ?>" data-toggle="modal">
                                                                <span>UBAH</span>
                                                            </a>
                                                            <a class="btn btn-xxs btn-danger" data-target="#delete_<?php echo $no ?>" data-toggle="modal">
                                                                <span>HAPUS</span>
                                                            </a>
                                                            <a class="btn btn-xxs btn-primary" href="<?php echo site_url('blk_jadwal2/jadwal_detail_prolog/'.$pkt->id_jadwal_data) ?>">
                                                                <span>DETAIL</span>
                                                            </a>
                                                            <a class="btn btn-xxs btn-info" href="<?php echo site_url('blk_jadwal2/print_full_hari/'.$pkt->id_jadwal_data) ?>">
                                                                <span>PRINT FULL HARI</span>
                                                            </a>
                                            
                                                            <div id="edit_<?php echo $no ?>" class="modal fade">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-primary">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h5 class="modal-title">UBAH JADWAL/HARI</h5>
                                                                        </div>
                                                                        <form action="<?php echo site_url('blk_jadwal2/jadwal_edit') ?>" method="POST">
                                                                            <div class="modal-body" style="color:black;">
                                                                                <input type="hidden" name="xsys_id" value="<?php echo $pkt->id_jadwal_data ?>">

                                                                                <div class="form-group">
                                                                                    <div class="row">   
                                                                                        <label class="control-label col-sm-3">Pilih Tanggal</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" name="pil_tgl" class="form-control dewdate2" required="required" disabled="disabled" value="<?php echo $pkt->tanggal; ?>"/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <div class="row">   
                                                                                        <label class="control-label col-sm-3">Pilih Paket</label>
                                                                                        <div class="col-sm-9">
                                                                                            <select name="pil_paket" class="select-search" required="required" disabled="disabled">
                                                                                                <option></option>
                                                                                                <?php 
                                                                                                    foreach($tampil_data_paket as $baris) {
                                                                                                        $selects = "";
                                                                                                        if ($baris->id_paket == $pkt->id_paket) {
                                                                                                            $selects = 'selected="selected"';
                                                                                                        }
                                                                                                ?>
                                                                                                        <option value="<?php echo $baris->id_paket; ?>" <?php echo $selects; ?> ><?php echo $baris->nama_full; ?></option>
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
                                                                                                        $selects = "";
                                                                                                        if ($guru->kode_instruktur == $pkt->instruktur_kode) {
                                                                                                            $selects = 'selected="selected"';
                                                                                                        }
                                                                                                ?>
                                                                                                        <option value="<?php echo $guru->kode_instruktur; ?>" <?php echo $selects; ?> ><?php echo $guru->kode_instruktur.' - '.$guru->nama; ?></option>
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

                                                            <div id="delete_<?php echo $no ?>" class="modal fade">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-primary">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h5 class="modal-title">HAPUS JADWAL</h5>
                                                                        </div>
                                                                        <form action="<?php echo site_url('blk_jadwal2/jadwal_delete/'); ?>" class="form-horizontal" method="post">
                                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_jadwal_data ?>" />
                                                                            <div class="modal-body">
                                                                                <p>
                                                                                    Apakah anda yakin akan menghapus data dengan ID 
                                                                                    <code class="danger" ><?php echo $pkt->id_jadwal_data ?></code> ?
                                                                                </p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-link" data-dismiss="modal">Tutup</button>
                                                                                <button type="submit" class="btn btn-primary">OK</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div> 

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