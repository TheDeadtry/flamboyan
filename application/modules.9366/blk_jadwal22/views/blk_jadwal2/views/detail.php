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
                        <a type="button" href="<?php echo site_url('blk_jadwal/') ?>" class="btn btn-primary"><i class="icon-arrow-left16"></i>  BACK</a>
                        <h5 class="panel-title text-center"><?php echo $tampil_data_jadwal->nama_jadwal.' ('.$tampil_data_jadwal->minggu_id.')'?></h5>

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
                                        <td max-width="100%" style="text-align:center">NAMA JADWAL</td>
                                        <td style="text-align:center">MINGGU</td>
                                        <td max-width="100%" style="text-align:center">HARI</td>
                                        <td max-width="100%" style="text-align:center; display:none;">MATERI</td>
                                        <td style="display:none"></td>
                                        <td style="text-align:center">ACTION</td>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php 
                                        $no = 1;
                                        foreach ($tampil_data_jadwaldetail as $jdw) {
                                            $fhari    = $jdw->hari_id;
                                            $fkode    = $jdw->kode_jadwal;
                                    ?>
                                    <tr>
                                        <td style="text-align:center"><?php echo $no ?></td>
                                        <td style="text-align:center"><?php echo $jdw->nama_jadwal ?></td>  
                                        <td style="text-align:center"><?php echo $jdw->minggu_id ?></td>  
                                        <td style="text-align:center"><?php echo $fhari ?></td>
                                        <td style="text-align:center; display:none;">
                                        </td>
                                        <td style="display:none"></td>
                                        <td style="text-align:center" >
                                            <ul class="icons-list"><!--
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#" data-toggle="modal" data-target="#ubah<?php echo $no; ?>"><i class="icon-pencil3"></i><span>Ubah</span></a></li>
                                                        <li><a href="#" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="icon-eraser"></i><span>Hapus</span></a></li>
                                                    </ul>
                                                </li>-->
                                            </ul>
                                            <a class="btn btn-sm btn-success" href="<?php echo site_url('blk_jadwal/materi/'.$fkode.'/'.$fhari) ?>">TAMBAH MATERI</a>
                                            <a class="btn btn-sm btn-primary" href="<?php echo site_url('blk_jadwal/tki/'.$fkode.'/'.$fhari) ?>">TAMBAH TKI MANUAL</a>
                                                <a class="btn btn-danger" href="<?php echo site_url('blk_jadwal/printjadwal/'.$zkode.'/'.$fhari) ?>">PRINT</a>
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