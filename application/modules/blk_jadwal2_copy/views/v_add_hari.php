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
                                <h5 class="panel-title">DATA JADWAL (PAKET <?php echo $izpaket ?>)</h5>

                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>


                            <div id="modal_form_horizontal" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH JADWAL/HARI</h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_jadwal2/add_hari_simpan/'.$zid_paket); ?>" class="form-horizontal" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Hari</label>
                                                    <div class="col-sm-9">
                                                        <select class="select-search" name="hari" required="required">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_hari as $vhari) {
                                                                    $qq = "SELECT count(*) as count FROM blk_jadwal_paketjadwal where paket_id='".$zid_paket."' and hari='".$vhari->kode_hari."'";
                                                                    $ambil_total = $this->M_session->select_row($qq);

                                                                    $soptz = "";
                                                                    $kettmb = "";
                                                                    if ($ambil_total->count != 0) {
                                                                        $soptz = 'disabled="disabled"';
                                                                        $kettmb = ' (sudah ada)';
                                                                    }
                                                            ?>
                                                                <option value="<?php echo $vhari->kode_hari ?>" <?php echo $soptz ?>><?php echo $vhari->hari.$kettmb; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Materi</label>
                                                    <div class="col-sm-9">
                                                        <select class="tyy" name="materi[]" required="required" multiple="multiple">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_materi as $vmateri) {
                                                            ?>
                                                                <option value="<?php echo $vmateri->id ?>"><?php echo $vmateri->kode_materi.' - '.$vmateri->nama_materi; ?></option>
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
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-xxs table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th colspan="9" class="active">
                                                    <a type="button" class="btn btn-success btn-sm" href="<?php echo site_url('blk_jadwal2/paket') ?>">KEMBALI</a>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH PAKET</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td max-width="100%" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center;">HARI</td>
                                                <td max-width="100%" style="text-align:center">MATERI</td>
                                                <td style="text-align:center">ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                $no = 1;
                                                foreach ($tampil_data_paketjadwal as $pkt) {
                                                    $materi_exp     = explode(",", $pkt->materi);
                                                    $hari_nama      = $this->M_session->select_row("SELECT hari FROM blk_hari where kode_hari='".$pkt->hari."'");

                                                    /*
                                                    $materi_final   = $materi_exp[0];
                                                    $materi_final_exp = explode("|-|", $materi_final);
                                                    $materi_final2  = $materi_final_exp[0];*/
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?php echo $no; ?></td>
                                                <td style="text-align:center"><?php echo $hari_nama->hari; ?></td>
                                                <td>
                                                    <?php
                                                        $tyu = "";
                                                        for ($c=0; $c<count($materi_exp); $c++) {
                                                            $materi_exp2 = explode("|-|", $materi_exp[$c]);

                                                            $ztable = "blk_pelajaran_".$materi_exp2[1];
                                                            $query00 = "SELECT nama_materi FROM $ztable where kode_materi='$materi_exp2[0]'";
                                                            $materi_nama = $this->M_session->select_row($query00);
                                                            echo '<li>'.$materi_exp2[0].' - '.$materi_nama->nama_materi.'</li>'; 
                                                            $tyu = $tyu.',"'.$materi_exp[$c].'"';
                                                        } 
                                                    ?>
                                                </td>
                                                <td style="text-align:center">
                                                    <a class="btn btn-xxs btn-primary" data-toggle="modal" data-target="#ubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span> Ubah</span></a>
                                                    <a class="btn btn-xxs btn-danger" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span> Hapus</span></a>
                                                </td>  
                                            </tr>  
                                            <?php 
                                                $tyui = substr($tyu, 1);
                                            ?>
                                            <div id="ubah<?php echo $no; ?>" class="modal fade">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">UBAH JADWAL/HARI</h5>
                                                        </div>
                                                        <form action="<?php echo site_url('blk_jadwal2/add_hari_ubah/'.$zid_paket); ?>" class="form-horizontal" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_jadwal_paket_jadwal ?>" />
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="control-label col-sm-3">Hari</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="select-search" name="hari" required="required">
                                                                                <?php 
                                                                                    foreach ($tampil_data_hari as $vhari) {
                                                                                        $qq = "SELECT count(*) as count, hari FROM blk_jadwal_paketjadwal where paket_id='".$zid_paket."' and hari='".$vhari->kode_hari."'";
                                                                                        $ambil_total = $this->M_session->select_row($qq);

                                                                                        $soptz  = "";
                                                                                        $kettmb = "";
                                                                                        $seltf  = "";
                                                                                        if ($ambil_total->count != 0) {
                                                                                            if ($ambil_total->hari == $pkt->hari) {
                                                                                                $soptz  = '';
                                                                                                $kettmb = '';
                                                                                            } else {
                                                                                                $soptz  = 'disabled="disabled"';
                                                                                                $kettmb = ' (sudah ada)';
                                                                                            }
                                                                                        }
                                                                                        if ($vhari->kode_hari == $pkt->hari) {
                                                                                            $seltf = 'selected="selected"';
                                                                                        }
                                                                                ?>
                                                                                    <option value="<?php echo $vhari->kode_hari ?>" <?php echo $seltf; ?><?php echo $soptz ?>><?php echo $vhari->hari.$kettmb; ?></option>
                                                                                <?php 
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="control-label col-sm-3">Materi</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="tyy" name="materi[]" required="required" multiple="multiple" id="ubah123x<?php echo $no ?>">
                                                                                <option></option>
                                                                                <?php 
                                                                                    foreach ($tampil_data_materi as $vmateri) {
                                                                                ?>
                                                                                    <option value="<?php echo $vmateri->id ?>"><?php echo $vmateri->kode_materi.' - '.$vmateri->nama_materi; ?></option>
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

                                            <script type="text/javascript">
                                                $("#ubah123x<?php echo $no ?>").val([<?php echo $tyui ?>]).trigger("change");
                                            </script>

                                            <div id="hapus<?php echo $no; ?>" class="modal fade">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">HAPUS JADWAL/HARI</h5>
                                                        </div>
                                                        <form action="<?php echo site_url('blk_jadwal2/add_hari_hapus/'.$zid_paket); ?>" class="form-horizontal" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_jadwal_paket_jadwal ?>" />
                                                            <div class="modal-body">
                                                                <p>
                                                                    Apakah anda yakin akan menghapus data dengan ID 
                                                                    <code class="danger" ><?php echo $pkt->id_jadwal_paket_jadwal ?></code> ?
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