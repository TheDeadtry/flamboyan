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
                                <div class="modal-dialog modal-full">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h5 class="modal-title">TAMBAH JADWAL/HARI</h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_jadwal2/add_hari_simpan/'.$zid_paket); ?>" class="form-horizontal" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-1">Hari</label>
                                                    <div class="col-sm-5">
                                                        <select class="select-search" name="hari" required="required">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_hari as $vhari) {
                                                            ?>
                                                                <option value="<?php echo $vhari->kode_hari ?>" ><?php echo $vhari->kode_hari.' - '.$vhari->hari; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <label class="control-label col-sm-1">Jam</label>
                                                    <div class="col-sm-5">
                                                        <select class="select-search" name="jam" required="required">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_jam as $vhari) {
                                                            ?>
                                                                <option value="<?php echo $vhari->kode_jam ?>" ><?php echo $vhari->kode_jam.' - '.$vhari->jam; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-1">Minggu</label>
                                                    <div class="col-sm-11">
                                                        <select class="txx" name="minggu[]" required="required" multiple="multiple">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_minggu as $vminggu) {
                                                            ?>
                                                                <option value="<?php echo $vminggu->kode_minggu ?>"><?php echo $vminggu->kode_minggu.' - '.$vminggu->minggu; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-1">Materi</label>
                                                    <div class="col-sm-11">
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
                                                    <a type="button" class="btn btn-success btn-sm" href="<?php echo site_url('blk_jadwal2_print/detailpaket_word/'.$zid_paket) ?>">PRINT</a>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td max-width="100%" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center">HARI</td>
                                                <td max-width="100%" style="text-align:center">JAM</td>
                                                <td max-width="100%" style="text-align:center">MINGGU</td>
                                                <td max-width="100%" style="text-align:center">MATERI</td>
                                                <td style="text-align:center">ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                $no = 1;
                                                foreach ($tampil_data_paketjadwal as $pkt) {
                                                    $hari_nama      = $this->M_session->select_row("SELECT hari FROM blk_hari where kode_hari='".$pkt->hari."'");

                                                    $ambil_paket_harijam = $this->M_session->select("SELECT * FROM blk_jadwal_paketjadwal WHERE paket_id='".$zid_paket."' AND hari='".$pkt->hari."' ORDER BY jam ASC");
                                                    $total_paket_harijam = count($ambil_paket_harijam);

                                                    $no2 = 1;
                                                    foreach ($ambil_paket_harijam as $terrabite) {
                                                        $jam_nama       = $this->M_session->select_row("SELECT jam FROM blk_jam where kode_jam='".$terrabite->jam."'");
                                                        $minggu_nama    = $this->M_session->select_row("SELECT minggu FROM blk_minggu where kode_minggu='".$terrabite->minggu."'");
                                                        $materi_exp     = explode(",", $terrabite->materi);
                                            ?>
                                                        <tr>
                                                            <?php 
                                                                if ($no2 == 1) {
                                                            ?>
                                                                    <td style="text-align:center" rowspan="<?php echo $total_paket_harijam; ?>"><?php echo $no; ?></td>
                                                                    <td style="text-align:center" rowspan="<?php echo $total_paket_harijam; ?>"><?php echo $hari_nama->hari; ?></td>
                                                            <?php 
                                                                }
                                                            ?>
                                                            
                                                            <td style="text-align:center"><?php if ($jam_nama != NULL) echo $terrabite->jam.'<br/>'.$jam_nama->jam; ?></td>
                                                            <td style="text-align:center"><?php echo $terrabite->minggu ?></td>
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
                                                                <a class="btn btn-xxs btn-primary" data-toggle="modal" data-target="#ubah<?php echo $no.'_'.$no2; ?>"><i class="icon-pencil3"></i><span> Ubah</span></a>
                                                                <a class="btn btn-xxs btn-danger" data-toggle="modal" data-target="#hapus<?php echo $no.'_'.$no2; ?>"><i class="icon-eraser"></i><span> Hapus</span></a>
                                                            </td>  
                                                        </tr>  
                                                        <?php 
                                                        $minggu_exp     = explode(",", $terrabite->minggu);
                                                        $mng = "";
                                                        for ($c=0; $c<count($minggu_exp); $c++) {
                                                            $mng = $mng.',"'.$minggu_exp[$c].'"';
                                                        }
                                                        $mngi = substr($mng, 1);
                                                        $tyui = substr($tyu, 1);
                                                        ?>
                                                        <div id="ubah<?php echo $no.'_'.$no2; ?>" class="modal fade">
                                                            <div class="modal-dialog modal-full">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h5 class="modal-title">UBAH JADWAL/HARI</h5>
                                                                    </div>
                                                                    <form action="<?php echo site_url('blk_jadwal2/add_hari_ubah/'.$zid_paket); ?>" class="form-horizontal" method="post">
                                                                        <input type="hidden" name="id" value="<?php echo $terrabite->id_jadwal_paket_jadwal ?>" />
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="control-label col-sm-1">Hari</label>
                                                                                    <div class="col-sm-5">
                                                                                        <select class="select-search" name="hari" required="required">
                                                                                            <?php 
                                                                                                foreach ($tampil_data_hari as $vhari) {
                                                                                                    $seltf  = "";
                                                                                                    if ($vhari->kode_hari == $pkt->hari) {
                                                                                                        $seltf = 'selected="selected"';
                                                                                                    }
                                                                                            ?>
                                                                                                <option value="<?php echo $vhari->kode_hari ?>" <?php echo $seltf; ?> ><?php echo $vhari->kode_hari.' - '.$vhari->hari; ?></option>
                                                                                            <?php 
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                    <label class="control-label col-sm-1">Jam</label>
                                                                                    <div class="col-sm-5">
                                                                                        <select class="select-search" name="jam" required="required">
                                                                                            <option></option>
                                                                                            <?php 
                                                                                                foreach ($tampil_data_jam as $vhari) {
                                                                                                    $seltf  = "";
                                                                                                    if ($vhari->kode_jam == $terrabite->jam) {
                                                                                                        $seltf = 'selected="selected"';
                                                                                                    }
                                                                                            ?>
                                                                                                <option value="<?php echo $vhari->kode_jam ?>" <?php echo $seltf; ?> ><?php echo $vhari->kode_jam.' - '.$vhari->jam; ?></option>
                                                                                            <?php 
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="control-label col-sm-1">Minggu</label>
                                                                                    <div class="col-sm-11">
                                                                                        <select class="txx" name="minggu[]" required="required" multiple="multiple" id="ubah124x<?php echo $no.'_'.$no2 ?>">
                                                                                            <option></option>
                                                                                            <?php 
                                                                                                foreach ($tampil_data_minggu as $vminggu) {
                                                                                            ?>
                                                                                                <option value="<?php echo $vminggu->kode_minggu ?>"><?php echo $vminggu->kode_minggu.' - '.$vminggu->minggu; ?></option>
                                                                                            <?php 
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <label class="control-label col-sm-1">Materi</label>
                                                                                    <div class="col-sm-11">
                                                                                        <select class="tyy" name="materi[]" required="required" multiple="multiple" id="ubah123x<?php echo $no.'_'.$no2 ?>">
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
                                                            $("#ubah124x<?php echo $no.'_'.$no2 ?>").val([<?php echo $mngi ?>]).trigger("change");
                                                            $("#ubah123x<?php echo $no.'_'.$no2 ?>").val([<?php echo $tyui ?>]).trigger("change");
                                                        </script>
                                            
                                                        <div id="hapus<?php echo $no.'_'.$no2; ?>" class="modal fade">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h5 class="modal-title">HAPUS JADWAL/HARI</h5>
                                                                    </div>
                                                                    <form action="<?php echo site_url('blk_jadwal2/add_hari_hapus/'.$zid_paket); ?>" class="form-horizontal" method="post">
                                                                        <input type="hidden" name="id" value="<?php echo $terrabite->id_jadwal_paket_jadwal ?>" />
                                                                        <div class="modal-body">
                                                                            <p>
                                                                                Apakah anda yakin akan menghapus data dengan ID 
                                                                                <code class="danger" ><?php echo $terrabite->id_jadwal_paket_jadwal ?></code> ?
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
                                                    $no2++;
                                                    }
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
            $(".txx").select2();
            $(".tyy").select2();
        });
    </script>