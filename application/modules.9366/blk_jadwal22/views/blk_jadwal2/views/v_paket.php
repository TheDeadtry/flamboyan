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
                                <h5 class="panel-title">DATA PAKET</h5>

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
                                            <h5 class="modal-title">TAMBAH PAKET</h5>
                                        </div>
                                        <form action="<?php echo site_url('blk_jadwal2/paket_simpan'); ?>" class="form-horizontal" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Nama Paket</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama_full" class="form-control" required="required">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="nama" value="1">
                                                <!--
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Tipe Paket</label>
                                                    <div class="col-sm-9">
                                                        <select class="select-search" name="nama" required="required">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_setting_paket as $vnama) {
                                                            ?>
                                                                <option value="<?php echo $vnama->id_setting_paket ?>"><?php echo $vnama->nama_paket; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>--><!--
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Minggu</label>
                                                    <div class="col-sm-9">
                                                        <select class="txx" name="minggu[]" required="required" multiple="multiple">
                                                            <?php 
                                                                foreach ($tampil_data_minggu as $vminggu) {
                                                            ?>
                                                                <option value="<?php echo $vminggu->kode_minggu ?>"><?php echo $vminggu->minggu; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Tipe Hari</label>
                                                    <div class="col-sm-9">
                                                        <select class="select-search" name="tipe_hari">
                                                            <?php 
                                                                foreach ($tampil_data_tipe_hari as $vtipehari) {
                                                            ?>
                                                                <option value="<?php echo $vtipehari->kode_tipe_hari ?>"><?php echo $vtipehari->tipe_hari; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Hari Value</label>
                                                    <div class="col-sm-9">
                                                        <select class="select-search" name="hari_value">
                                                            <?php 
                                                                foreach ($tampil_data_hari_value as $vharivalue) {
                                                            ?>
                                                                <option value="<?php echo $vharivalue->kode_hari_value ?>"><?php echo $vharivalue->hari_value; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Jam Paket</label>
                                                    <div class="col-sm-9">
                                                        <select class="select-search" name="jam" required="required">
                                                            <option></option>
                                                            <?php 
                                                                foreach ($tampil_data_jam as $vjam) {
                                                            ?>
                                                                <option value="<?php echo $vjam->kode_jam ?>"><?php echo $vjam->jam; ?></option>
                                                            <?php 
                                                                }
                                                            ?>
                                                        </select>
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

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-xxs table-bordered table-striped table-hover" id="jadwaltables">
                                        <thead>
                                            <tr>
                                                <th colspan="9" class="active">
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_form_horizontal">TAMBAH PAKET</button>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td max-width="100%" style="text-align:center">NO</td>
                                                <td max-width="100%" style="text-align:center">NAMA PAKET</td>
                                                <!--<td max-width="100%" style="text-align:center">MINGGU</td>
                                                <td max-width="100%" style="text-align:center">JAM</td>
                                                <td max-width="100%" style="text-align:center">TIPE HARI (HARI)</td>-->
                                                <td style="text-align:center">ACTION</td>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php 
                                                $no     = 1;
                                                foreach ($tampil_data_paket as $pkt) {
                                                    $minggu_exp = explode(",", $pkt->minggu);
                                                    $tyu    = "";
                                                    for($pcc=0; $pcc<count($minggu_exp); $pcc++) {
                                                        $tyu = $tyu.',"'.$minggu_exp[$pcc].'"';
                                                    }

                                                    $tyui = substr($tyu, 1);
                                            ?>
                                            <tr>
                                                <td style="text-align:center"><?php echo $no; ?></td>
                                                <td style="text-align:center"><?php echo $pkt->nama_full; ?></td>
                                                <!--<td style="text-align:center"><?php echo $pkt->minggu; ?></td>
                                                <td style="text-align:center"><?php echo $pkt->jam; ?></td>
                                                <td style="text-align:center"><?php echo $pkt->tipe_hari.' ('.$pkt->hari_value.')'; ?></td>-->
                                                <td style="text-align:center">
                                                    <a class="btn btn-xxs btn-success" href="<?php echo site_url('blk_jadwal2/add_hari/'.$pkt->id_paket) ?>"><span> TAMPIL HARI</span></a>
                                                    <a class="btn btn-xxs btn-primary" data-toggle="modal" data-target="#zubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span> Ubah</span></a>
                                                    <a class="btn btn-xxs btn-danger" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span> Hapus</span></a>
                                                </td>  
                                            </tr>    

                                            <div id="zubah<?php echo $no; ?>" class="modal fade">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">UBAH PAKET</h5>
                                                        </div>
                                                        <form action="<?php echo site_url('blk_jadwal2/paket_ubah'); ?>" class="form-horizontal" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_paket ?>" />
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="control-label col-sm-3">Nama Paket</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="nama_full" class="form-control" required="required" value="<?php echo $pkt->nama_full; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="nama" value="1">
                                                                <!--
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="control-label col-sm-3">Nama Paket</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="select-search" name="nama" required="required">
                                                                                <option></option>
                                                                                <?php 
                                                                                    foreach ($tampil_data_setting_paket as $vnama) {
                                                                                        $selo = "";
                                                                                        if ($vnama->id_setting_paket == $pkt->kode_paket) {
                                                                                            $selo = 'selected="selected"';
                                                                                        }
                                                                                ?>
                                                                                    <option value="<?php echo $vnama->id_setting_paket ?>" <?php echo $selo ?>><?php echo $vnama->nama_paket; ?></option>
                                                                                <?php 
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
<!--
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="control-label col-sm-3">Minggu</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="txx" name="minggu[]" required="required" multiple="multiple" id="ubah123x<?php echo $no ?>">
                                                                                <?php 
                                                                                    foreach ($tampil_data_minggu as $vminggu) {
                                                                                        if ($vminggu->kode_minggu == $pkt->minggu)
                                                                                ?>
                                                                                    <option value="<?php echo $vminggu->kode_minggu ?>"><?php echo $vminggu->minggu; ?></option>
                                                                                <?php 
                                                                                    }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="control-label col-sm-3">Jam Paket</label>
                                                                        <div class="col-sm-9">
                                                                            <select class="select-search" name="jam" required="required">
                                                                                <?php 
                                                                                    foreach ($tampil_data_jam as $vjam) {
                                                                                        $root = "";
                                                                                        if ($vjam->kode_jam == $pkt->kode_jam) {
                                                                                            $root = 'selected="selected"';
                                                                                        }
                                                                                ?>
                                                                                    <option value="<?php echo $vjam->kode_jam ?>" <?php echo $root ?>><?php echo $vjam->jam; ?></option>
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

                                            <script type="text/javascript">
                                                $("#ubah123x<?php echo $no ?>").val([<?php echo $tyui ?>]).trigger("change");
                                            </script>

                                            <div id="hapus<?php echo $no; ?>" class="modal fade">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h5 class="modal-title">HAPUS PAKET</h5>
                                                        </div>
                                                        <form action="<?php echo site_url('blk_jadwal2/paket_hapus/'); ?>" class="form-horizontal" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $pkt->id_paket ?>" />
                                                            <div class="modal-body">
                                                                <p>
                                                                    Apakah anda yakin akan menghapus data dengan ID 
                                                                    <code class="danger" ><?php echo $pkt->id_paket ?></code> ?
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
                maximumSelectionLength: 3
            });
            $(".tyy").select2();
        });

        $('#jadwaltables').dataTable();
    </script>