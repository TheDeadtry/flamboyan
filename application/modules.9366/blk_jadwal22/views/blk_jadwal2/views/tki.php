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
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <a type="button" href="<?php echo site_url('blk_jadwal/detail/'.$zkode) ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahtki">TAMBAH TKI</button>
                        <h5 class="panel-title text-center">
                            <?php echo $tampil_data_jadwal->nama_jadwal.' ('.$tampil_data_jadwal->minggu_id.')'?>
                            <br/>
                            TAMBAH TKI MANUAL
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
                            <table class="table table-lg datatable-basic table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td max-width="100%" style="text-align:center">NO</td>
                                        <td max-width="100%" style="text-align:center">ID PERSONAL</td>
                                        <td max-width="100%" style="text-align:center">NAMA TKI</td>
                                        <td max-width="100%" style="text-align:center">JK</td>
                                        <td max-width="100%" style="display: none"></td>
                                        <td style="text-align:center">ACTION</td>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php 
                                        $no = 1;
                                        foreach ($tampil_data_jadwaltki as $jdw) {
                                            $fnodaftar      = $jdw->nodaftar;
                                            $kode = $zkode;
                                            $hari = $zhari;

                                            $fx = substr($fnodaftar, 0, 2);
                                            if ($fx == 'FI' || $fx == 'MI' || $fx == 'FF' || $fx == 'MF' || $fx == 'JP') {
                                                $query2 = "SELECT * FROM personal where personal.id_biodata='".$fnodaftar."'";
                                            } else {
                                                $query2 = "SELECT * FROM personalblk where personalblk.nodaftar='".$fnodaftar."'";
                                            }
                                            
                                            $ambil_data_tki = $this->M_blk_jadwal->select_row($query2);

                                            $gnama   = $ambil_data_tki->nama;
                                            if ($ambil_data_tki->jeniskelamin == '女') {
                                                $gjk     = 'Perempuan';
                                            } elseif ($ambil_data_tki->jeniskelamin == '男') {
                                                $gjk     = 'Laki-Laki';
                                            } else {
                                                $gjk     = $ambil_data_tki->jeniskelamin;
                                            }
                                    ?>
                                    <tr>
                                        <td style="text-align:center"><?php echo $no ?></td>
                                        <td style="text-align:center"><?php echo $fnodaftar ?></td>  
                                        <td style="text-align:center"><?php echo $gnama ?></td>
                                        <td style="text-align:center"><?php echo $gjk ?></td>
                                        <td max-width="100%" style="display: none"></td>
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
                                                    <h5 class="modal-title">Ubah TKI secara manual u/ Jadwal </h5>
                                                </div>
                                                <form action="<?php echo site_url('blk_jadwal/ubahtki/'.$zkode.'/'.$zhari); ?>" class="form-horizontal" method="post">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input name="idx" type="hidden" value="<?php echo $jdw->id_jadwaltki ?>"/>
                                                            <label class="control-label col-sm-3">TKI</label>
                                                            <div class="col-sm-9">
                                                                <select class="select-results-color form-control" name="idtki">
                                                                    <?php 
                                                                        foreach ($tampil_data_blk_tki as $xtki) {
                                                                            $viktor = "";
                                                                            if ($fnodaftar == $xtki->nodaftar) {
                                                                                $viktor = "selected='selected'";
                                                                            }
                                                                    ?>
                                                                        <option value="<?php echo $xtki->nodaftar ?>" <?php echo $viktor ?>><?php echo $xtki->nodaftar.' - '.$xtki->nama; ?></option>
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


                                    <div class="modal fade" id="hapus<?php echo $no; ?>" tabindex="-2" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal" method="post" action="<?php echo site_url('blk_jadwal/hapustki/'.$zkode.'/'.$zhari); ?>">
                                                    <div class="modal-header bg-primary">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h5 class="modal-title">HAPUS TKI</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" name="idxd" value="<?php echo $jdw->id_jadwaltki ?>">
                                                        <p>Apakah anda yakin akan menghapus data ini ? </p>
                                                        <code class="text-danger">
                                                        <?php
                                                            echo $fnodaftar.' - '.$gnama.'('.$gjk.')';
                                                        ?>
                                                        </code>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" name="submit">Hapus</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
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


                    <div id="tambahtki" class="modal fade">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Tambah Tki secara manual u/ Jadwal </h5>
                                </div>
                                <form action="<?php echo site_url('blk_jadwal/simpantki/'.$zkode.'/'.$zhari); ?>" class="form-horizontal" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-3">TKI</label>
                                            <div class="col-sm-9">
                                                <select class="select-results-color form-control" name="idtki">
                                                    <option>Pilih TKI</option>
                                                    <?php 
                                                        foreach ($tampil_data_blk_tki as $xtki) {
                                                    ?>
                                                        <option value="<?php echo $xtki->nodaftar ?>"><?php echo $xtki->nodaftar.' - '.$xtki->nama; ?></option>
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